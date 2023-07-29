<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cluster;
use App\Models\Branch;
use App\Models\BranchRoute;
use App\Models\RoutePlace;
use App\Models\BranchManager;
use App\Models\MarketingExecutive;
use DB;
use Illuminate\Support\Facades\Auth;
class RoutePlaceController extends Controller
{
    //
    public function index()
        {
            try {
               $me=MarketingExecutive::where('account_id',Auth::user()->id)->first();
            $place = RoutePlace::with('cluster','branch','route')->where('branch_id',$me->branch_id)->get();
            return view('route-place.index', ['place' => $place]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

        public function create()
        {
            try {
                $me=MarketingExecutive::where('account_id',Auth::user()->id)->first(); 
                $route=BranchRoute::active()->where('branch_id',$me->branch_id)->get();
            return view('route-place.create', ['route'=>$route]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function store(Request $request)
        {
          
            $this->validate($request, [
                'place_name' => 'required|unique:route_place',
                'route_id' => 'required|numeric',
 
            ]);
            try {
                DB::transaction(function ()  use($request) {
                    $me=MarketingExecutive::where('account_id',Auth::user()->id)->first();
                    $place = new RoutePlace;
                    $place->place_name=$request->place_name;
                    $place->route_id=$request->route_id;
                    $place->cluster_id=$me->cluster_id;
                    $place->branch_id =$me->branch_id;
                    $place->status=1;
                    $place->under_of_user=Auth::user()->id;
                    $place->save();
                });
                return redirect('route-place');

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

        public function edit(Request $request,$id)
        {
            try {
           $me=MarketingExecutive::where('account_id',Auth::user()->id)->first();
            $route=BranchRoute::active()->where('branch_id',$me->branch_id)->get();
            $place = RoutePlace::find($id);
            return view('route-place.edit', ['place' => $place,'route'=>$route]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function update(Request $request)
        {
          
            $this->validate($request, [
                'place_name' => 'required',
                'route_id' => 'required|numeric'
               
            ]);
            try {
            
                DB::transaction(function ()  use($request) {
                    $place = RoutePlace::find($request->id);
                    $place->place_name=$request->place_name;
                    $place->route_id=$request->route_id;
                    $place->save();
                });
                return redirect('route-place'); 
            
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

        public function active(Request $request,$id)
        {
          
           
            try {
                DB::transaction(function ()  use($id) {
                    $place = RoutePlace::find($id);
                    $place->status=1;
                    $place->save();
                });
                return redirect('route-place'); 
           
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

        public function deactive(Request $request,$id)
        {
           
            try {

                DB::transaction(function ()  use($id) {
                    $place = RoutePlace::find($id);
                    $place->status=0;
                    $place->save();
                });
                return redirect('route-place');  
           
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

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
      
    
}
