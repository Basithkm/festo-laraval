<?php

namespace App\Http\Controllers;
use App\Models\RoutePlace;
use App\Models\BranchScheme;
use App\Models\BranchRoute;
use Illuminate\Http\Request;
use App\Models\MeCollection;
use App\Models\CustomerRegistration;
class GetListController extends Controller
{
    //
    
    public function get_place(Request $request)
    {
      
        $route_id=$request->route_id;
        try {
            $place = RoutePlace::where("status",'=',1)->
            where("route_id",'=',$route_id)
            ->pluck('place_name','id');
            return response()->json($place);
    } catch (\Exception $e) {
        return $e->getMessage();
    }
    }
    public function get_referral_customer_custid(Request $request)
    {
      
       
        $cust_id=$request->search_customer_id;
      
        try {  
            $customer = CustomerRegistration:: Where("code",$cust_id)->first();
            return response()->json($customer);
    } catch (\Exception $e) {
        return $e->getMessage();
    }
    }
    public function get_referral_customer_mobile(Request $request)
    {
      
        $mobileno=$request->search_mobile;
     
        try {  
            
                $customer = CustomerRegistration:: where("mobile",$mobileno)->first();
          
            return response()->json($customer);
    } catch (\Exception $e) {
        return $e->getMessage();
    }
    }
    public function get_scheme(Request $request)
        {
          
            $branch_id=$request->branch_id;
            try {
                $scheme = BranchScheme::where("status",'=',1)->
                where("branch_id",'=',$branch_id)
                ->pluck('name','id');
                return response()->json($scheme);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function topay($id)
        {

            try {
                $me_colection = MeCollection::find($id);
                $me_colection->payment_status='payed';
                $me_colection->save();
                return redirect('pending-colletion');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        
        public function get_route(Request $request)
        {
          
            $route=$request->branch_id;
            try {
                $routedata = BranchRoute::where("status",'=',1)->
                where("branch_id",'=',$route)
                ->pluck('route_name','id');
                return response()->json($routedata);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function get_collection_day(Request $request)
        {
          
            $route_id=$request->route_id;
            try {
                $routedata = BranchRoute::where("status",'=',1)->
                where("id",'=',$route_id)
                ->first();
                return response()->json($routedata);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
}
