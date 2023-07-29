<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MyAdmin;
use App\Models\Orders;
use App\Models\CustomerRegistration;
use Carbon\Carbon;
use DB;
class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        try {
        if (Auth::attempt($credentials)) {
            return 'ok';
            $request->session()->regenerate();

            return redirect('/rrr')->intended();
        }
    } catch (\Exception $e) {
        return $e->getMessage();
    }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function check_login(Request $request){

        $username=$request->input('email');
        $password=$request->input('password');

        $result=MyAdmin::where('email','=',$username)->where('password','=',$password)->get();

        if(!$result->isEmpty()){

        $request->session()->put('adminusername',$username);
        return redirect('admin/dash-board');
        }else{

        $request->session()->flash('logerror','1');
        return redirect('/my-admin');
   
 
        }
   
    }

public function myadmin_logout(Request $request){


    $request->session()->forget('adminusername');
    return redirect('/my-admin');
}
public function dash_board(Request $request){

    if (session('adminusername')) {
        $data['now']=Carbon::now();
        $data['orders'] = DB::table('orders')
        ->count();
$data['purchase'] = DB::table('purchase')
        ->count();
$data['customers'] = DB::table('customer_registration')
        ->count();
$data['products'] = DB::table('products')
    ->count();

    
        $data['latest_orders'] = Orders::orderBy('order_id','desc')
                                ->limit(5)
                                ->get();
        $data['recent_reg'] = CustomerRegistration::orderBy('customer_id','desc')
                            ->limit(5)
                            ->get();
        $data['user']=session('adminusername');
        return view('admin',$data);
    
        }
        else {
             return redirect('/my-admin');
        }
  
}

}