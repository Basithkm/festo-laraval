<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Image;
class CategoryController extends Controller
{
    //
    public function index()
        {
            try {
                if (session('adminusername')) {

                    $data['category']=Category::orderBy('cat_id', 'desc')  
                                    ->get();
                    return view('category/index',$data);
                    
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
                    $data['category']=Category::where('parent_id','=','0')
                                    ->get();
                    return view('category/create',$data);
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
               
                $photo = $request->file('image'); 
        $storyimagename = time().'.'.$photo->getClientOriginalExtension();
        $destinationPath = 'uploads/category/thumb_images';
        $thumb_img = Image::make($photo->getRealPath())->resize(117,99);
        $thumb_img->save($destinationPath.'/'.$storyimagename,80);

        Category::insert([

'cat_name'=>$request->input('category'),
'cat_name_arabic'=>$request->input('category_arabic'),
'category_for' => $request->input('category_for'),
'parent_id'=>$request->input('parent_category'),
'cat_desc'=>$request->input('description'),
'sort_order'=>$request->input('order'),
'cat_image' => $storyimagename,
'status'=>$request->input('status'),
'created_at' =>\Carbon\Carbon::now()


    ]);

 $request->session()->flash('succ','Successfully Added New Category');
    return back();

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

        public function edit(Request $request,$id)
        {
            try {
         
                if (session('adminusername')) {
                    $data['ed_cat'] = Category::where('cat_id','=',$id)
                                    ->get();
                    $data['category']=Category::where('parent_id','=','0')
                    ->get();
                    return view('category.edit',$data);
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
            
                $cid = $request->input('category_id');
                $category = $request->input('category');
                $category_for = $request->input('category_for');
                $parent_category = $request->input('parent_category_ed');
                $description = $request->input('description');
                
                if ($request->hasFile('image'))
                            {
                                if ($request->file('image')->isValid()) 
                                    {
            
                                        $catimage=DB::select('select * from category where cat_id = ?',[$cid]);
                                        foreach ($catimage as $key => $value) 
                                        {
                                            $proimg=$value->cat_image;
                                            
                                        }
                                        
                                        if($proimg!="")
                                        {
                                            unlink('uploads/category/thumb_images/'.$proimg);
                                        }
            
            
                                        $photo=$request->file('image');
                                        $storyimagename = time().'.'.$photo->getClientOriginalExtension();
                                            $destinationPath = 'uploads/category/thumb_images';
                                            $thumb_img = Image::make($photo->getRealPath())->resize(117,99);
                                            $thumb_img->save($destinationPath.'/'.$storyimagename,80);
            
                                           
            
                                            Category::where('cat_id', '=', $cid)
                                            ->update([ 
                                                'cat_image' =>$storyimagename
                                            ]);                   
                                    }
                            }
                
                
                
                
                $status = $request->input('status');
            
            
                Category::where('cat_id', '=', $cid)
                                ->update([
                                    'cat_name' => $category, 
                                    'cat_name_arabic' => $request->input('category_arabic'),  
                                    'category_for' => $category_for, 
                                    'sort_order'=> $request->input('order'),
                                    'parent_id' => $parent_category,
                                    'cat_desc' => $description,
                                    'status' => $status,
                                    'updated_at' =>\Carbon\Carbon::now()
                                        ]);  
            
                                          $request->session()->flash('succ','Succesfully Updated!');    
            
                                    return redirect('category/categories');  
              
            
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function delete_category($id, Request $request)
        {
            try {
                Category::where('cat_id','=',$id)->delete();       
               
                $request->session()->flash('succ','Succesfully Deleted!');
                return redirect('category/categories');
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
    
}
