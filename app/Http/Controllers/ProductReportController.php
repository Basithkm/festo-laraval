<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\Brands;
use App\Models\ProductImages;
use App\Models\ProductsAttributes;
use App\Models\AttributesValue;
use App\Models\Currency;
use DB;
use Illuminate\Support\Facades\Auth;
class ProductReportController extends Controller
{
    //
    
    public function de_active_product_list()
        {
         
            try {
                if (session('adminusername')) {
                  
                    $data['products']= Products::select('id','product_id','product_name')->where('products.status','!=',1)->orWhere('products.status',null)->orderBy('products.id', 'desc') ->get();
                                  
                    return view('product-report.deactive-product',$data);
                      }
                    else {
                         return redirect('/my-admin');
                    }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
    public function featured_product()
        {
         
            try {
                if (session('adminusername')) {
                  
                    $data['products']= Products::where('featured',1)->where('products.status',1)->orderBy('products.id', 'desc') ->get();
                                       
                    return view('product-report.featured-product',$data);
                      }
                    else {
                         return redirect('/my-admin');
                    }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

        public function category_wise_product(Request $request)
        {
            try {
                if (session('adminusername')) {
                     $category=$request->category_id;
                    $data['category']=Category::get();
                    $data['products']= Products::Category($category)->where('products.status',1)->orderBy('products.id', 'desc')
                                        ->get();
            
                    return view('product-report.category-product',$data);
                      }
                    else {
                         return redirect('/my-admin');
                    }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

        public function brand_wise_product(Request $request)
        {
            try {
                if (session('adminusername')) {
                    $brand=$request->brand_id;
                    $data['brand']=Brands::get();
                    $data['products']= Products::Brand($brand)->where('products.status',1)->orderBy('products.id', 'desc')
                                        ->get();           
                    return view('product-report.brand-product',$data);
                      }
                    else {
                         return redirect('/my-admin');
                    }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        
        public function last_add_n_product(Request $request)
        {
            try {
                if (session('adminusername')) {
                    $no=$request->nproduct;
                    if($no){}else{$no=0;}
                    $data['products']= Products::where('products.status',1)->orderBy('products.id', 'desc')
                                       ->take($no)->get();           
                    return view('product-report.last-add-n-product',$data);
                      }
                    else {
                         return redirect('/my-admin');
                    }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

        public function country_wise_active_product(Request $request)
        {
            try {
                // return $request->all();
                if (session('adminusername')) {
                    $country=$request->country_id;
                    $data['currency']=Currency::get();
                    if($country){
                    $data['products']= Products::where($country,'1')->where('products.status',1)->orderBy('products.id', 'desc')
                                        ->paginate('25');  
                                     
                    }else{$data['products']=Products::where('products.status',1)->orderBy('products.id', 'desc')
                                        ->paginate('25'); }         
                    return view('product-report.country-active-product',$data);
                      }
                    else {
                         return redirect('/my-admin');
                    }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

        public function country_wise_deactive_product(Request $request)
        {
            try {
                //  return $request->all();
                if (session('adminusername')) {
                    $country=$request->country_id;
                    $data['currency']=Currency::get();
                    if($country){
                    $data['products']= Products::where($country,'0')->where('products.status',1)->orderBy('products.id', 'desc')
                                        ->limit('1000')->get(); 
                                        
                    }else{$data['products']=[];}          
                    return view('product-report.country-deactive-product',$data);
                      }
                    else {
                         return redirect('/my-admin');
                    }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

        public function single_image_product(Request $request)
        {
            try {
                //  return $request->all();
                if (session('adminusername')) {
                    $data['products']= Products::where($country,'0')->orderBy('products.id', 'desc')
                                        ->get(); 
                    return view('product-report.country-deactive-product',$data);
                      }
                    else {
                         return redirect('/my-admin');
                    }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

        
        

       



      
    
}
