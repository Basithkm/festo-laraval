<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Auth;
 use App\Models\SpinningSlab;

use App\Models\SpinningSlabItem;

use Image;

class SpinningWheelSlabItemController extends Controller
{
    //
    public function index()
        {
          
            try {
                if (session('adminusername')) {

                    
                    $data['category']=SpinningSlabItem::with('slab')->orderBy('id', 'desc')  
                                    ->get();


                    return view('spinning-slab-item/index',$data);
                    
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

                    $data['slab']=SpinningSlab::get();
                    
                    return view('spinning-slab-item/create',$data);
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
                'image' => 'required',
                'slab_id' => 'required',
            ]);
            try {
                $photo = $request->file('image'); 
                $storyimagename = time().'.'.$photo->getClientOriginalExtension();
                $destinationPath = 'uploads/spinning';
                $thumb_img = Image::make($photo->getRealPath())->resize(117,99);
                $thumb_img->save($destinationPath.'/'.$storyimagename,80);

$spinning=new SpinningSlabItem;
$spinning->name=$request->name;
$spinning->image=$storyimagename;
$spinning->slab_id=$request->slab_id;
$spinning->save();

 $request->session()->flash('succ','Successfully Added New Slab Item');
    return back();

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

        public function edit(Request $request,$id)
        {
            try {
         
                if (session('adminusername')) {
                    // $data['slab'] = SpinningSlabItem::find($id);
                    $data['ed_cat'] = SpinningSlabItem::where('id','=',$id)
                                    ->first();
                    $data['category']=SpinningSlab::get();
            
                    // return view('sub-category.edit',$data);
                    return view('spinning-slab-item.edit',$data);
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
                    'image' => 'required',
                    'slab_id' => 'required',
                ]);
                $id = $request->input('id');
                try {

                    $photo = $request->file('image'); 
                    $storyimagename = time().'.'.$photo->getClientOriginalExtension();
                    $destinationPath = 'uploads/spinning';
                    $thumb_img = Image::make($photo->getRealPath())->resize(117,99);
                    $thumb_img->save($destinationPath.'/'.$storyimagename,80);
                   
    $spinning= SpinningSlabItem::find($id);
    $spinning->name=$request->name;
    $spinning->image=$storyimagename;
    $spinning->slab_id=$request->slab_id;
    $spinning->save();
       
    return redirect('spinning-wheel-slab-item/index');  
              
            
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function delete($id, Request $request)
        {
            try {
                SpinningSlabItem::where('id','=',$id)->delete();       
               
                $request->session()->flash('succ','Succesfully Deleted!');

                return redirect('spinning-wheel-slab-item/index'); 
                
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
    
}
