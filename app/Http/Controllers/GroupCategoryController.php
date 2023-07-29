<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\GroupCategory;
use App\Models\SubCategory;
class GroupCategoryController extends Controller
{
    //
    public function index()
        {
            try {
                if (session('adminusername')) {

                    $data['category']=GroupCategory::with('SubCategory')->orderBy('id', 'desc')  
                                    ->get();
                    return view('group-category/index',$data);
                    
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
                    $data['category']=SubCategory::get();
                    return view('group-category/create',$data);
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
                'sub_cate_name' => 'required|numeric',
            ]);

    $sucategory=SubCategory::find($request->input('sub_cate_name'));
    $category_list=Category::find($sucategory->category_id);
    $slug=$category_list->cat_name.'-'.$sucategory->sub_cat_name.'-'.$request->input('category');
    $prod_slug = preg_replace('~[^\pL\d]+~u', '-',$slug);  
    $prod_slug = iconv('utf-8', 'us-ascii//TRANSLIT', $prod_slug);  
    $prod_slug = preg_replace('~[^-\w]+~', '', $prod_slug);
    $prod_slug = trim($prod_slug, '-');  
    $prod_slug = preg_replace('~-+~', '-', $prod_slug);  
    $prod_slug = strtolower($prod_slug);

            try {
                GroupCategory::insert([

'group_name'=>$request->input('category'),
'sub_categoryid'=>$request->input('sub_cate_name'),
'group_cat_slug'=>$prod_slug,


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
                    $data['ed_cat'] = GroupCategory::where('id','=',$id)
                                    ->first();
                    $data['category']=SubCategory::get();

                    return view('group-category.edit',$data);
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
                $sub_cate_name = $request->input('sub_cate_name');

    $sucategory=SubCategory::find($request->input('sub_cate_name'));
    $category_list=Category::find($sucategory->category_id);
    $slug=$category_list->cat_name.'-'.$sucategory->sub_cat_name.'-'.$request->input('category');
    $prod_slug = preg_replace('~[^\pL\d]+~u', '-',$slug);  
    $prod_slug = iconv('utf-8', 'us-ascii//TRANSLIT', $prod_slug);  
    $prod_slug = preg_replace('~[^-\w]+~', '', $prod_slug);
    $prod_slug = trim($prod_slug, '-');  
    $prod_slug = preg_replace('~-+~', '-', $prod_slug);  
    $prod_slug = strtolower($prod_slug);

                GroupCategory::where('id', '=', $cid)
                                ->update([
                                    'group_name' => $category, 
                                    'sub_categoryid' =>$sub_cate_name,
                                    'group_cat_slug'=>$prod_slug,
                                        ]);  
            
                                          $request->session()->flash('succ','Succesfully Updated!');    
            
                                    return redirect('group-category/categories');  
              
            
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function delete_category($id, Request $request)
        {
            try {
                GroupCategory::where('id','=',$id)->delete();       
               
                $request->session()->flash('succ','Succesfully Deleted!');
                return redirect('group-category/categories');
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
    
}
