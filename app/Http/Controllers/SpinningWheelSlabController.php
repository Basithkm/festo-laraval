<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\SpinningSlab;
use Image;
class SpinningWheelSlabController extends Controller
{
    //
    public function index()
        {
            try {
                if (session('adminusername')) {

                    $data['slab']=SpinningSlab::orderBy('id', 'desc')  
                                    ->get();
                    return view('spinning-slab/index',$data);
                    
                     }
                        else {
                             return redirect('/my-admin');
                        }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

        public function create()
        {
            try {
                if (session('adminusername')) {
                    
                    return view('spinning-slab/create');
                     }
                        else {
                             return redirect('/my-admin');
                        }
              
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function store(Request $request)
        {
          
            $data = request()->validate([
                'name' => 'required',
                'min_price' => 'required',
                'max_price' => 'required',
            ]);
            try {
               
$spinning=new SpinningSlab;
$spinning->name=$request->name;
$spinning->min_price=$request->min_price;
$spinning->max_price=$request->max_price;
$spinning->save();

 $request->session()->flash('succ','Successfully Added New Slab');
    return back();

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

        public function edit(Request $request,$id)
        {
            try {
         
                if (session('adminusername')) {
                    $data['slab'] = SpinningSlab::find($id);
                    return view('spinning-slab.edit',$data);
                    }
                    else {
                         return redirect('/my-admin');
                    }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function update(Request $request)
        {
          
           
            
            
               
                $data = request()->validate([
                    'id'=>'required',
                    'name' => 'required',
                    'min_price' => 'required',
                    'max_price' => 'required',
                ]);
                $id = $request->input('id');
                try {
                   
    $spinning= SpinningSlab::find($id);
    $spinning->name=$request->name;
    $spinning->min_price=$request->min_price;
    $spinning->max_price=$request->max_price;
    $spinning->save();
     
            
                                    return redirect('spinning-wheel-slab/index');  
              
            
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function delete($id, Request $request)
        {
            try {
                SpinningSlab::where('id','=',$id)->delete();       
               
                $request->session()->flash('succ','Succesfully Deleted!');
                return redirect('spinning-wheel-slab/index');
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
    
}
