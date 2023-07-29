<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerRegistration;
use App\Models\Purchase;
use DB;
class AccountController extends Controller
{
    //
    public function my_account(){
        try {
           
        if(session('username')){
      
      $data['user']=$user=CustomerRegistration::where('customer_email','=',session('username'))->first();
      $customer_id=$user->customer_id;

      $data['history']=Purchase::where('customer_id','=',$customer_id)->orderBy('purchase_date','desc')->get();
          
        return view('frontend.my-account',$data);
      }else{
      
      
        return redirect('my-login');
      }
    } catch (\Exception $e) {
              
        return $e->getMessage();
      }
      
      }
      public function update_profile(Request $request){
        try {
        
        CustomerRegistration::where('customer_email','=',session('username'))->update([
        
        'customer_name'=>$request->input('name'),
        'customer_mobile'=>$request->input('mobile'),
        'customer_address'=>$request->input('address'),
        'customer_state'=>$request->input('state'),
        'customer_dist'=>$request->input('district'),
        'customer_pincode'=>$request->input('pincode')
        
        ]);
         $request->session()->flash('succ_title','Profile Data Updated Successfully.');
        return back();
        
    } catch (\Exception $e) {
              
        return $e->getMessage();
      }
        
        }
}
