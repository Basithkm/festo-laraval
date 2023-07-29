<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Orders;
use App\Models\Purchase;
use App\Models\OrderStatus;
use App\Models\Currency;
use App\Models\CustomerRegistration;
class ReportController extends Controller
{
    //
    public function order_country_wise(Request $request)
        {
          
            try {

                if (session('adminusername')) {
                    $country=$request->country_id;
                    $data['currency']=Currency::get();
                    if($country){
                        $data['ad_orders'] =  Orders::where('currency',$country)->join('order_status','order_status.order_status_id','=','orders.order_status_id')
                        ->select('orders.*','order_status.name')
                        ->orderBy('orders.order_id', 'desc')
                        ->paginate(1000);
                    }else{$data['ad_orders']=[];}          
                    return view('report.order-country-wise',$data);
                      }
                    else {
                         return redirect('/my-admin');
                    }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
                public function order_mobile_wise(Request $request)
        {
          
            try {
                if (session('adminusername')) {
                    $customer=$request->mobile;
                 
                    if($customer){
                        $data['ad_orders'] =  Orders::where('customer_mob',$customer)->join('order_status','order_status.order_status_id','=','orders.order_status_id')
                        ->select('orders.*','order_status.name')
                        ->orderBy('orders.order_id', 'desc')
                        ->paginate(100);
                    }else{$data['ad_orders']=[];}          
                    return view('report.order-mobile-wise',$data);
                      }
                    else {
                         return redirect('/my-admin');
                    }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function order_customer_wise(Request $request)
        {
          
            try {
                if (session('adminusername')) {
                    $customer=$request->customer_id;
                    $data['customer']=CustomerRegistration::select('customer_id','customer_name')->take('5000')->get();
                    if($customer){
                        $data['ad_orders'] =  Orders::where('customer_id',$customer)->join('order_status','order_status.order_status_id','=','orders.order_status_id')
                        ->select('orders.*','order_status.name')
                        ->orderBy('orders.order_id', 'desc')
                        ->paginate(1000);
                    }else{$data['ad_orders']=[];}          
                    return view('report.order-customer-wise',$data);
                      }
                    else {
                         return redirect('/my-admin');
                    }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function order_processing()
        {
          
            try {
                if (session('adminusername')) {

                        $data['ad_orders'] =  Orders::where('orders.order_status_id',1)->join('order_status','order_status.order_status_id','=','orders.order_status_id')
                        ->select('orders.*','order_status.name')
                        ->orderBy('orders.order_id', 'desc')
                        ->paginate(1000);       
                    return view('report.order-processing',$data);
                      }
                    else {
                         return redirect('/my-admin');
                    }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function order_cancel()
        {
          
            try {
                if (session('adminusername')) {

                    $data['ad_orders'] =  Orders::where('orders.order_status_id',3)->join('order_status','order_status.order_status_id','=','orders.order_status_id')
                    ->select('orders.*','order_status.name')
                    ->orderBy('orders.order_id', 'desc')
                    ->paginate(1000);       
                return view('report.order-cancel',$data);
                  }
                else {
                     return redirect('/my-admin');
                }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function order_complete(Request $request)
        {
    
            try {
                if (session('adminusername')) {

                    $data['ad_orders'] =  Orders::where('orders.order_status_id',4)->join('order_status','order_status.order_status_id','=','orders.order_status_id')
                    ->select('orders.*','order_status.name')
                    ->orderBy('orders.order_id', 'desc')
                    ->paginate(1000);       
                return view('report.order-complete',$data);
                  }
                else {
                     return redirect('/my-admin');
                }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

        public function purchase_date_wise(Request $request)
        {
// return $request->all();
if($request->from_date){
$from_date=$request->from_date;
}else{$from_date=Carbon::now();}
if($request->to_date){
$to_date=$request->to_date;
}else{$to_date=Carbon::now();}

            try {
                if (session('adminusername')) {
                    $data['purchase']=Purchase::Intwodate($from_date,$to_date)->
                                orderBy('purchase.purchase_id','desc')->
                                select('purchase.purchase_id','purchase.customer_id','purchase.order_id','purchase.customer_type','purchase.product_sub_total','purchase.purchase_date')
                                ->paginate(100);
                        
                    return view('report.purchase-date-wise',$data);
                     }else {
                             return redirect('/my-admin');
                        }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

        public function purchase_customer_wise(Request $request)
        {

            try {
                if (session('adminusername')) {
                    $customer=$request->customer_id;
                  
                    $data['customer']=CustomerRegistration::select('customer_id','customer_name')->take('5000')->get();
                   
                    if($customer){
                    $data['purchase']=Purchase::where('customer_id',$customer)->
                                orderBy('purchase.purchase_id','desc')->
                                select('purchase.purchase_id','purchase.customer_id','purchase.order_id','purchase.customer_type','purchase.product_sub_total','purchase.purchase_date')
                                ->paginate(100);
                               
                            }else{$data['purchase']=[];}
                         
                    return view('report.purchase-customer-wise',$data);
                     }else {
                             return redirect('/my-admin');
                        }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
       
      
      
       
        
        
        
        
}
