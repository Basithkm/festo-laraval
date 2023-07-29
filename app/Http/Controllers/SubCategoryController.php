<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\SubCategory;
class SubCategoryController extends Controller
{
    //
    public function index()
        {
           
            try {
                if (session('adminusername')) {

                    $data['category']=SubCategory::with('Category')->orderBy('id', 'desc')  
                                    ->get();
                    return view('sub-category/index',$data);
                    
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
                    $data['category']=Category::get();
                    return view('sub-category/create',$data);
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
                'category' => 'required',
                'category_id'=> 'required|numeric'
            ]);
    $category=Category::find($request->input('category_id'));
    $slug=$category->cat_name.'-'.$request->input('category');
    $prod_slug = preg_replace('~[^\pL\d]+~u', '-',$slug);  
    $prod_slug = iconv('utf-8', 'us-ascii//TRANSLIT', $prod_slug);  
    $prod_slug = preg_replace('~[^-\w]+~', '', $prod_slug);
    $prod_slug = trim($prod_slug, '-');  
    $prod_slug = preg_replace('~-+~', '-', $prod_slug);  
    $prod_slug = strtolower($prod_slug);

            try {
                SubCategory::insert([

'sub_cat_name'=>$request->input('category'),
'category_id'=>$request->input('category_id'),
'sub_cate_slug'=>$prod_slug,

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
                    $data['ed_cat'] = SubCategory::where('id','=',$id)
                                    ->first();
                    $data['category']=Category::get();
            
                    return view('sub-category.edit',$data);
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
                $sub_category=$request->input('sub_cate_name');

    $category_list=Category::find($request->input('sub_cate_name'));
    $slug=$category_list->cat_name.'-'.$request->input('category');
    $prod_slug = preg_replace('~[^\pL\d]+~u', '-',$slug);  
    $prod_slug = iconv('utf-8', 'us-ascii//TRANSLIT', $prod_slug);  
    $prod_slug = preg_replace('~[^-\w]+~', '', $prod_slug);
    $prod_slug = trim($prod_slug, '-');  
    $prod_slug = preg_replace('~-+~', '-', $prod_slug);  
    $prod_slug = strtolower($prod_slug);


                SubCategory::where('id', '=', $cid)
                                ->update([
                                    'sub_cat_name' => $category,
                                    'category_id'=>$sub_category,
                                    'sub_cate_slug'=>$prod_slug,
                                        ]);  
            
                                          $request->session()->flash('succ','Succesfully Updated!');    
            
                                    return redirect('sub-category/categories');  
              
            
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function delete_category($id, Request $request)
        {
            try {
                SubCategory::where('id','=',$id)->delete();       
               
                $request->session()->flash('succ','Succesfully Deleted!');
                return redirect('sub-category/categories');
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
    
}
