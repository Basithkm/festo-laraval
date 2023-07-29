<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cluster;
use App\Models\Branch;
use App\Models\BranchScheme;
use App\Models\BranchRoute;
use App\Models\CustomerRegistration;
use App\Models\RoutePlace;
use App\Models\MarketingExecutive;
use App\Models\CustomerWeek;
use App\Models\OtpMobile;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Craftsys\Msg91\Facade\Msg91;
use Illuminate\Support\Facades\Crypt;
use sendotp\sendotp;
class CustomerRegistrationController extends Controller
{
    //
    public function index()
        {
   

            try {
                $products= DB::table('products')->select('id','product_id','sort_order','product_name','product_image','product_price','product_price_offer','product_qty','status','featured')
                ->orderBy('products.id', 'desc')
                                    ->get();
            return view('report.today-joining',['products'=>$products]);
      
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
 public function otp_list()
        {
            try {
                
        
         $list=OtpMobile::with('user')->orderBy('id', 'desc')->limit(10)->get();
 
            return view('customer.otp-list', ['list' => $list]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

        public function create()
        {
            try {
                
                $me=MarketingExecutive::where('account_id',Auth::user()->id)->first();
                if($me){}else{return 'no data exixt';}
 
            $scheme=BranchScheme::where('cluster_id',$me->cluster_id)->active()
             -> where('start_date','>=',Carbon::now())
            ->where('joining_date','<=',Carbon::now())->get();
            $route=BranchRoute::where('branch_id',$me->branch_id)->active()->get();
            return view('customer.create', ['scheme' => $scheme,'route'=>$route]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function store(Request $request)
        {
          
            $this->validate($request, [
                'mobile' => 'required|numeric|unique:users',
                'name' => 'required',
                 'land_mark' => 'required',
                 'post' => 'required',
                'payment_method' => 'required',      
                'collection_amount' => 'required|numeric|between:0,9999999999.99',
                'collection_day'=> 'required',
                'route_id'=>'required|numeric',
                'place_id'=>'required|numeric',
                'scheme_id'=>'required|numeric',
              
                
                
            ]);
            try {
                $me=MarketingExecutive::where('account_id',Auth::user()->id)->first();
                $BranchScheme=BranchScheme::find($request->scheme_id);
                $Branch=Branch::find($me->branch_id);
                $count=CustomerRegistration::where('scheme_id',$request->scheme_id)->count('id');
                $count=$count+1;
                $CUSTOMER_CODE='00';
                if($count<10){$CUSTOMER_CODE=$BranchScheme->code.'00'.$count;}
                if($count>=10){$CUSTOMER_CODE=$BranchScheme->code.'0'.$count;}
                if($count>=100){$CUSTOMER_CODE=$BranchScheme->code.$count;}
                $today=Carbon::now()->toDateString();
                DB::transaction(function ()  use($request,$me,$CUSTOMER_CODE,$today,&$customer) {
                    $randomId  = rand(1000,9000);
                    if($request->search_cust_val){$refral=$request->search_cust_val;}else{$refral=0;}
                    
                    $customer = new CustomerRegistration;
                    $customer->code=$CUSTOMER_CODE;
                    $customer->in_date=$today;
                    $customer->name=$request->name;
                    $customer->mobile=$request->mobile;
                    $customer->gardian_name=$request->gardian_name;
                    $customer->house_name=$request->house_name;
                    $customer->post=$request->post;
                    $customer->pin=$request->pin;
                    $customer->added_by='me';
                    $customer->buliding_comany_shop=$request->buliding_comany_shop;
                    $customer->land_mark =$request->land_mark;
                    $customer->town =$request->town;
                    $customer->whatsapp_no =$request->whatsapp_no;
                    $customer->payment_method =$request->payment_method;
                    $customer->transaction_id =$request->transaction_id;
                    $customer->collection_amount =$request->collection_amount;
                    $customer->collection_day =$request->collection_day;
                    $customer->route_id =$request->route_id;
                    $customer->place_id =$request->place_id;
                    $customer->scheme_id =$request->scheme_id;
                    $customer->cluster_id =$me->cluster_id;
                    $customer->branch_id =$me->branch_id;
                    $customer->status=1;
                    $customer->under_of_user=Auth::user()->id;
                    $customer->referral=$refral;
                    $customer->password=$randomId;
                    $customer->status=0;
                    $customer->save();
                    //
                    


                });
                $usr_id = Crypt::encryptString($customer->id);
                return redirect('enter-otp/'.$usr_id); 

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        
        public function enter_otp($id)
        {
            try {

            $user_id = Crypt::decryptString($id);
            $customer = CustomerRegistration::find($user_id);

            return view('customer.enter-otp', ['customer' => $customer]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
         public function enter_otp_mannual($id)
        {
            try {

            $customer = CustomerRegistration::find($id);

            return view('customer.enter-otp', ['customer' => $customer]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function enter_otp_post(Request $request)
        {
            try {
            $ac_id=$request->id;
            $otp=$request->otp;

            $res=OtpMobile::where('otp',$otp)->where('user_id','=',$ac_id)->first();

            if($res)
            {
                $customer = CustomerRegistration::where('account_id','=',$ac_id)->first();
                $customer->status=1;
                $customer->otp_verify=1;
                $customer->save();
                
                $mobb = $customer->whatsapp_no;
                $moble = "91".$mobb;
                
                $customername=$customer->name;
                $schemeno=$customer->code;
                $BranchScheme=BranchScheme::where('id',$customer->scheme_id)->first();
                $scheme_starting_date=$BranchScheme->start_date;
                $user=User::where('id',$customer->account_id)->first();
                $user_name=$user->email;
                $password=$customer->password;
        
              
                
                $welcome_message = "Hi $customername,
Registration for fezto Golden scheme has been completed successfully.
Your Scheme ID is - $schemeno
Scheme starting on $scheme_starting_date
Download MY FEZTO app from play store to log in.
(App link)
Or visit register.myfezto.com
username : $user_name
Password : $password";

$payment_complete="Hi $customername,
You have successfully completed $BranchScheme->name $BranchScheme->sub_name payment of Rs.200 on $customer->in_date
Thank you, Have a nice day";
                
                
           $welcome_message = urlencode($welcome_message);   
             $payment_complete = urlencode($payment_complete);     
                
                 $welcomepage = file_get_contents("https://dealsms.in/api/send.php?number=$moble&type=text&message=$welcome_message&instance_id=641300AA1F054&access_token=ffadfdf8a154f87367c47a66ad73279c");
                
                 $payment = file_get_contents("https://dealsms.in/api/send.php?number=$moble&type=text&message=$payment_complete&instance_id=641300AA1F054&access_token=ffadfdf8a154f87367c47a66ad73279c");
                 
                return redirect('customer'); 
                    
            }else{
                    return back();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function edit(Request $request,$id)
        {
            try {

            $branchroute=BranchRoute::active()->get();
            $routeplace=RoutePlace::active()->get();
            $customer = CustomerRegistration::find($id);
            return view('customer.edit', ['customer' => $customer,'branchroute'=>$branchroute,'routeplace'=>$routeplace]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function update(Request $request)
        {
          
            $this->validate($request, [
                'name' => 'required',
                'payment_method' => 'required',      
                'route_id'=>'required|numeric',
                'place_id'=>'required|numeric'
            ]);
            try {
            
                DB::transaction(function ()  use($request) {
                    $customer = CustomerRegistration::find($request->id);
                    $customer->name=$request->name;
                    $customer->mobile=$request->mobile;
                    $customer->gardian_name=$request->gardian_name;
                    $customer->house_name=$request->house_name;
                    $customer->post=$request->post;
                    $customer->pin=$request->pin;
                    $customer->buliding_comany_shop=$request->buliding_comany_shop;
                    $customer->land_mark =$request->land_mark;
                    $customer->town =$request->town;
                    $customer->whatsapp_no =$request->whatsapp_no;
                    $customer->payment_method=$request->payment_method;
                    $customer->transaction_id=$request->transaction_id;
                    $customer->route_id=$request->route_id;
                    $customer->place_id=$request->place_id;
                    $customer->save();
                });
                return redirect('customer'); 
            
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }



        public function get_customer(Request $request)
        {
          
            $place_id=$request->place_id;
            try {
                $customer = CustomerRegistration::where("status",'=',1)->
                where("place_id",'=',$place_id)
                ->pluck('name','account_id');
                return response()->json($customer);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
       
        
        public function get_week(Request $request)
        {
          
            $customer_id=$request->customer_id;
            $scheme_id=$request->scheme_id;
            try {
                $CustomerWeek=CustomerWeek::where('customer_id',$customer_id)->where('scheme_id',$scheme_id)->where('paid',0)
                ->pluck('week_id','week_id');
                
                return response()->json($CustomerWeek);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
      
    
}
