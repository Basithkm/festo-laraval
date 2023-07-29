<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brands;
use DB;
use Image;
use Illuminate\Support\Facades\Auth;
class BrandController extends Controller
{
    //
    public function index()
        {
            try {
                if (session('adminusername')) {
                    $data['brands']=Brands::get();
                    return view('brands.index',$data);
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
                    return view('brands.create');
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
                'brand_name' => 'required'
            ]);
            try {
               
                $brand_name = $request->input('brand_name');
                $url_word = $request->input('url_word');    
                $photo = $request->file('logo'); 
                    $storyimagename = time().'.'.$photo->getClientOriginalExtension();
                    $destinationPath = 'uploads/brands/logo';
                    $thumb_img = Image::make($photo->getRealPath())->resize(118,55);
                    $thumb_img->save($destinationPath.'/'.$storyimagename,80);
             
            
                    Brands::insert([
                    'brands_name' => $brand_name,
                    'brands_name_arabic' => $request->input('brand_name_arabic'),
                    'brand_image' => $storyimagename,
                    'url_word' => $url_word,  
                    'created_at' =>\Carbon\Carbon::now()
                ]);
                
               
            
                return back();

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function brand_set_featured($id, Request $request)
        {
            if (session('adminusername')) {
            
               $checked = Brands::where('brands_id','=',$id)
                ->update([
        
                   'featured'=> 1
        
                            ]);
               
                return redirect('brands');
            }
            else {
                return redirect('/my-admin');
            }
        
        }
        
        public function brand_set_unfeatured($id, Request $request)
        {
            if (session('adminusername')) {
            
               $checked = Brands::where('brands_id','=',$id)
                ->update([
        
                   'featured'=> 0
        
                            ]);
               
                return redirect('brands');
            }
            else {
                return redirect('/my-admin');
            }
        
        }
        public function edit(Request $request,$id)
        {
            try {
                if (session('adminusername')) {
                    $data['ed_brand'] = Brands::where('brands_id','=',$id)
                                    ->get();
                   
                    return view('brands.edit',$data);
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
          
           
            try {
            
                $bid = $request->input('brand_id');
                $brand_name = $request->input('brand_name');
                $url_word = $request->input('url_word');
            
                 if ($request->hasFile('logo'))
                            {
                                if ($request->file('logo')->isValid()) 
                                    {
            
                                        $catimage=DB::select('select * from brands where brands_id = ?',[$bid]);
                                        foreach ($catimage as $key => $value) 
                                        {
                                            $proimg=$value->brand_image;
                                            
                                        }
                                        
                                       if($proimg!="") {
            
                                        unlink('uploads/brands/logo/'.$proimg);
                                      
                                            $photo=$request->file('logo');
                                            $logoimagename = time().'.'.$photo->getClientOriginalExtension(); 
                                            $destinationPath = 'uploads/brands/logo';
                                            $thumb_img = Image::make($photo->getRealPath())->resize(118,55);
                                            $thumb_img->save($destinationPath.'/'.$logoimagename,80);
            
                                        DB::table('brands')
                                            ->where('brands_id', '=', $bid)
                                            ->update([ 
                                                'brand_image' =>$logoimagename
                                            ]);
                                       }else{
                                           
                                           $photo=$request->file('logo');
                                            $logoimagename = time().'.'.$photo->getClientOriginalExtension(); 
                                            $destinationPath = 'uploads/brands/logo';
                                            $thumb_img = Image::make($photo->getRealPath())->resize(118,55);
                                            $thumb_img->save($destinationPath.'/'.$logoimagename,80);
            
                                            Brands::where('brands_id', '=', $bid)
                                            ->update([ 
                                                'brand_image' =>$logoimagename
                                            ]);
                                           
                                       }
                                        
                                            
                                    }
                            }
                
                                           
            
                        
                            Brands::where('brands_id', '=', $bid)
                                ->update([
                                    'brands_name' => $brand_name, 
                                    'brands_name_arabic' => $request->input('brand_name_arabic'),                     
                                    'url_word' => $url_word,
                                    
                                        ]);  
             
            
                                    return redirect('/brands');  
              
            
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

        public function view_brands($id)
        {
            $data['view_brands'] =Brands::where('brands_id','=',$id)
                            ->get();
        
            return view('brands.view-brand',$data);
        }
        
        public function delete_brands($id,Request $request)
        {
            if (session('adminusername')) {
               
                Brands::where('brands_id','=',$id)->delete();
                
               
                return redirect('brands');
            }
            else {
                return redirect('/my-admin');
            }
        }



      
    
}
