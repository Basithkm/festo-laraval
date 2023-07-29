<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerRegistration;
use App\Models\Orders;
use App\Models\Purchase;
use App\Models\Products;
use App\Models\Currency;
use App\Models\ScrachCard;
use App\Models\ProductsAttributes;
use Carbon\Carbon;
use Cart;
use DB;
class CheckoutController extends Controller
{
    //
    public function checkout(){

        try {
                
        if(session('username')){
        $data['users']=CustomerRegistration::where('customer_email','=',session('username'))->first();
        $user=CustomerRegistration::where('customer_email','=',session('username'))->first();
     
        if($user->premium_customer==1){
           $result=Cart::content();
          foreach ($result as $ccks) {
            $rid= $ccks->rowId;
              $pro=Products::where('id','=',$ccks->id)->first();
              $price=$pro->product_premium_offer;
              $weight=$ccks->weight;
              $Prttributes=ProductsAttributes::find($weight);
              if($Prttributes){
                $price=$Prttributes->product_premium_offer;
              }
            Cart::update($rid, ['price' => $price]);

          
           }
        }
        $data['scrach']=ScrachCard::inRandomOrder()->first();
        }
        else{
            $data['users']=[];
            $data['scrach']=[];
        }
 
          $data['cart']=Cart::content();

        return view('frontend.payment',$data);
    } catch (\Exception $e) {

        return $e->getMessage();
       }

          }
          public function shop_complete(Request $request){
               if(session('username')){
                 $data = request()->validate([
            'district' => 'required',
            'state' => 'required'
        ]);
               }else
               {
           $data = request()->validate([
            'c_name' => 'required',
            'c_email' => 'required|email',
            'c_mobile' => 'required',
            'district' => 'required',
            'state' => 'required'
        ]);
               }
           

            try {
           
            $pay_method=$request->payment;
            $products=Cart::content();
            $subtotal=Cart::subtotal();
            
            if($subtotal<0) {
                return back();
                
            }else {
            $b = str_replace( ',', '', Cart::subtotal() );
            
            $tot_shipping=$b+1;
            
            $mode = $request->input('mod');
            
            $usercs=CustomerRegistration::where('customer_email','=',session('username'))->get();
            
            foreach ($usercs as $usercss) {
              $ussid = $usercss->customer_id; 
            }
            
            
            if(session('username')){
            
              $uid = $ussid;
            
            }elseif($mode=="guest"){
             
            $uid  = CustomerRegistration::insertGetId([
            
              'customer_name' => $request->input('c_name'),
              'customer_type' => "2",
              'customer_email' => $request->input('c_email'),
              'customer_mobile' => $request->input('c_mobile'),
               'customer_address'=>'',
              'customer_state'=>$request->input('state'),
              'customer_dist'=>$request->input('district'),
               'customer_pincode'=>'',
              'remarks'=>$request->input('remarks'),
              'created_at' =>\Carbon\Carbon::now()
            
            ]);
            
            }elseif($mode=="account"){
            
            
              $pass=$request->input('password');
              $password = Crypt::encryptString($pass);
            
            $uid  = CustomerRegistration::insertGetId([
            
              'customer_name' => $request->input('c_name'),
              'customer_type' => "1",
              'password'=>$password,
              'status'=>'1',
              'customer_email' => $request->input('c_email'),
              'customer_mobile' => $request->input('c_mobile'),
              'customer_address'=>'',
              'customer_state'=>$request->input('state'),
              'customer_dist'=>$request->input('district'),
              'customer_pincode'=>'',
              'remarks'=>$request->input('remarks'),
              'created_at' =>\Carbon\Carbon::now()
              ]);
            }
            
            
            $user=CustomerRegistration::where('customer_id','=',$uid)->get();
            
            
            
            foreach ($user as $users) {
             $cust_id=$users->customer_id;
             $customer_type=$users->customer_type;
             $shipping_address=$users->customer_address;
             $state=$users->customer_state;
             $dist=$users->customer_dist;
             $pin=$users->customer_pincode;
            }
            
            
          
            $purchase_id=Purchase::insertGetId([
            
            'customer_id'=>$cust_id,
            'customer_type'=>$customer_type,
            'products'=>$products,
            'product_sub_total'=>$tot_shipping
            
            ]);
            
            $pay_address=$shipping_address.",".$dist.",".$state.",".$pin;
            // $or_id=new Orders;
            // $or_id->customer_id=$cust_id;
            // $or_id->customer_group_id=$customer_type;
            // $or_id->purchase_id=$purchase_id;
            // $or_id->customer_name=$users->customer_name;
            // $or_id->customer_email=$users->customer_email;
            // $or_id->customer_mob=$users->customer_mobile;
            // $or_id->payment_name=$users->customer_name;
            // $or_id->payment_address=$pay_address;
            // $or_id->payment_region_id=$users->customer_pincode;
            // $or_id->payment_method=$pay_method;
            // $or_id->shipping_name=$users->customer_name;
            // $or_id->shipping_address=$shipping_address;
            // $or_id->currency='INR';
            // $or_id->shipping_region_id=$users->customer_pincode;
            // $or_id->shipping_zone_id=$users->customer_pincode;
            // $or_id->remarks=$users->remarks;
            // $or_id->total_amnt=$tot_shipping;
            // $or_id->created_at=Carbon::now('Asia/Qatar');
            // $or_id->save();
        
            $or_id=Orders::insertGetId([
            
            'customer_id'=>$cust_id,
            'customer_group_id'=>$customer_type,
            'purchase_id'=>$purchase_id,
            'customer_name'=>$users->customer_name,
            'customer_email'=>$users->customer_email,
            'customer_mob'=>$users->customer_mobile,
            'payment_name'=>$users->customer_name,
            'payment_address'=>$pay_address,
            'payment_region_id'=>$users->customer_pincode,
            'payment_method'=>$pay_method,
            'shipping_name'=>$users->customer_name,
            'shipping_address'=>$shipping_address,
            'currency'=>'INR',
            'shipping_region_id'=>$users->customer_pincode,
            'shipping_zone_id'=>$users->customer_pincode,
            'remarks'=>$users->remarks,
            'total_amnt'=>$tot_shipping,
            'created_at'=>Carbon::now('Asia/Qatar')
            ]);
              
            $ord_id='FZTOORDER'.$or_id;
            Orders::where('order_id','=',$or_id)->update([
            
            'order_number'=>$ord_id
            ]);
          
            foreach ($products as $stock) {
            
              $remain=Products::where('id','=',$stock->id)->get();
              $attribute_remain=ProductsAttributes::find($stock->weight);
              if($attribute_remain)
              {
                $atri_qty=$attribute_remain->available_qty-$stock->qty;
                ProductsAttributes::where('id','=',$stock->weight)->update([
                
                  'available_qty'=>$atri_qty
                  
                  ]);
              }
              foreach ($remain as $remains) {
               $remainingqty=$remains->product_qty;
               $tot_sale=$remains->views;
              }
            
              $rqty=$remainingqty-$stock->qty;
              
              Products::where('id','=',$stock->id)->update([
                
            'product_qty'=>$rqty,
            'views'=>$tot_sale+1
            
            ]);
            
            }
            
            $request->session()->flash('shopping_succ','succ');
             Cart::destroy();
            return redirect('order-confirmation');
            
            
            //   $data = array('name'=>"Itcity",'to_mail'=>$users->customer_email,'user_name'=>$users->customer_name,'order_id'=>$ord_id,'address'=>$pay_address,'mobile'=>$users->customer_mobile,'purchase_id'=>$purchase_id,'pay_method'=>$pay_method);
             
                //   Mail::send('mail-templates/invoice', $data, function($message) use ($data){
            
                //       $message->to($data['to_mail'],'itcity')->subject
                //          ('Invoice');
                //       $message->from('info@itcityonlinestore.com','IT City Online Store');
            
                //   });
            
            
            
            
            
            
            }
        } catch (\Exception $e) {

            return $e->getMessage();
           }
            }
}
