<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerRegistration;
use DB;
use Illuminate\Support\Facades\Crypt;
class UserLoginController extends Controller
{
    //
    public function my_login(){


        return view('frontend.login');
      }
      public function customer_registration(Request $request){
     
        try {
       $pass=$request->input('password');
       $password = Crypt::encryptString($pass);
       $from=$request->input('from');
       
       $emcheck=CustomerRegistration::where('customer_email',$request->input('email'))->get();
    
       if($emcheck->isEmpty()){
       DB::table('customer_registration')->insert([
       'customer_name'=>$request->input('name'),
       'customer_email'=>$request->input('email'),
       'customer_mobile'=>$request->input('customer_mobile'),
       'customer_type'=>'1',
       'password'=>$password,
       'status'=>'1'
       ]);
   
       if($from=='checkout'){
       $request->session()->put('user',$request->input('name'));
         $request->session()->put('username',$request->input('email'));
       
         $request->session()->flash('succ_title','Congratulations.Your Account has been Created Successfully.');
       return redirect('checkout');
       }else{
         $request->session()->put('user',$request->input('name'));
         $request->session()->put('username',$request->input('email'));
          $request->session()->flash('succ_title','Congratulations.Your Account has been Created Successfully.');
       return redirect('/'); 
       }
       }else{
           
          $request->session()->flash('emailexist','Sorry.This Email already used by another user.');
          return back()->withInput();;
       }
        } catch (\Exception $e) {
              
               return $e->getMessage();
             }
       
         }

         public function login(Request $request){
            try {
            $username=$request->input('username');
            $password=$request->input('password');
            
            $from=$request->input('from');
            
            $log=CustomerRegistration::where('customer_email','=',$username)->orWhere('customer_mobile', '=', $username)->get();
            
            if(!$log->isEmpty()){
            foreach ($log as $logs) {
             $pswd=$logs->password;
             $user=$logs->customer_name;
             $cu_type='1';
            }
            
            $pass = Crypt::decryptString($pswd);
            
            if($password==$pass){
            
              if($logs->status=='1'){
            
            if($from=='checkout'){
            $request->session()->put('user',$user);
            $request->session()->put('username',$username);
            $request->session()->put('user_type',$cu_type);
            return redirect('checkout');
            }else{
            $request->session()->put('user',$user);
            $request->session()->put('username',$username);
            $request->session()->put('user_type',$cu_type);
              return redirect('/');
            }
            }else{
            
             $request->session()->flash('error_login','Your Account has been Temporarly Blocked');
            return back();
            }
            }else{
            
              $request->session()->flash('error_login','Invalid username/ Password');
            return back();
            
            } 
            
            }else{
            
            $request->session()->flash('error_login','Invalid username/ Password');
            return back();
            }
        } catch (\Exception $e) {

            return $e->getMessage();
           }
            }
            public function logout(Request $request){
                try {
                  
                if(session('username')){
                
                  $request->session()->forget('username');
                  Cart::destroy();
                
                  return redirect('/');
                }
                else{
                    
                
                  return redirect('/');
                }
            } catch (\Exception $e) {

                return $e->getMessage();
               }
                }
}
