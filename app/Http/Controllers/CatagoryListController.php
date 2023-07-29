<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brands;
use App\Models\AttributesValue;
use App\Models\Products;
use App\Models\Currency;
use App\Models\SubCategory;
use App\Models\GroupCategory;
use DB;
class CatagoryListController extends Controller
{
    //
    
     public function category()
    {
        try {
               return view('frontend.category');
        } catch (\Exception $e) {
    
            return $e->getMessage();
          }
    }
    public function mens_wear()
    {
        try {
            $data = Products::where('products.category_id','=',1)->where('products.status',1) 
            ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image',
           'products.status','products.id','products.sort_order','products.product_price','products.product_price_offer','products.product_premium_offer',
           DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
           DB::raw('((products.product_premium_offer-products.product_price)/products.product_price)*100 *-1 as product__premium_percentage')
           )->orderBy('products.id','DESC')->paginate(1000);
            $sub_category=SubCategory::where('category_id',1)->get();
            return view('frontend.products-category',array('results'=>$data,'sub_category'=>$sub_category));

        } catch (\Exception $e) {
    
            return $e->getMessage();
          }
    }
    public function womens_wear()
    {
        try {
            $data = Products::where('products.category_id','=',2)->where('products.status',1) 
            ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image',
           'products.status','products.id','products.sort_order','products.product_price','products.product_price_offer','products.product_premium_offer',
           DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
           DB::raw('((products.product_premium_offer-products.product_price)/products.product_price)*100 *-1 as product__premium_percentage')
           )->orderBy('products.id','DESC')->paginate(1000);
            $sub_category=SubCategory::where('category_id',2)->get();
            return view('frontend.products-category',array('results'=>$data,'sub_category'=>$sub_category));

        } catch (\Exception $e) {
    
            return $e->getMessage();
          }
    }
    public function kids_wear()
    {
        try {
            $data = Products::where('products.category_id','=',3)->where('products.status',1) 
            ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image',
           'products.status','products.id','products.sort_order','products.product_price','products.product_price_offer','products.product_premium_offer',
           DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
           DB::raw('((products.product_premium_offer-products.product_price)/products.product_price)*100 *-1 as product__premium_percentage')
           )->orderBy('products.id','DESC')->paginate(1000);
            $sub_category=SubCategory::where('category_id',3)->get();
            return view('frontend.products-category',array('results'=>$data,'sub_category'=>$sub_category));

        } catch (\Exception $e) {
    
            return $e->getMessage();
          }
    }
    public function footweare()
    {
        try {
            $data = Products::where('products.category_id','=',4)->where('products.status',1) 
            ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image',
           'products.status','products.id','products.sort_order','products.product_price','products.product_price_offer','products.product_premium_offer',
           DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
           DB::raw('((products.product_premium_offer-products.product_price)/products.product_price)*100 *-1 as product__premium_percentage')
           )->orderBy('products.id','DESC')->paginate(1000);
            $sub_category=SubCategory::where('category_id',4)->get();
            return view('frontend.products-category',array('results'=>$data,'sub_category'=>$sub_category));

        } catch (\Exception $e) {
    
            return $e->getMessage();
          }
    }
    public function bags()
    {
        try {
            $data = Products::where('products.category_id','=',5)->where('products.status',1) 
            ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image',
           'products.status','products.id','products.sort_order','products.product_price','products.product_price_offer','products.product_premium_offer',
           DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
           DB::raw('((products.product_premium_offer-products.product_price)/products.product_price)*100 *-1 as product__premium_percentage')
           )->orderBy('products.id','DESC')->paginate(1000);
            $sub_category=SubCategory::where('category_id',5)->get();
            return view('frontend.products-category',array('results'=>$data,'sub_category'=>$sub_category));

        } catch (\Exception $e) {
    
            return $e->getMessage();
          }
    }
    public function kitchen_home_appliances()
    {
        try {
            $data = Products::where('products.category_id','=',6)->where('products.status',1) 
            ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image',
           'products.status','products.id','products.sort_order','products.product_price','products.product_price_offer','products.product_premium_offer',
           DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
           DB::raw('((products.product_premium_offer-products.product_price)/products.product_price)*100 *-1 as product__premium_percentage')
           )->orderBy('products.id','DESC')->paginate(1000);
            $sub_category=SubCategory::where('category_id',6)->get();
            return view('frontend.products-category',array('results'=>$data,'sub_category'=>$sub_category));

        } catch (\Exception $e) {
    
            return $e->getMessage();
          }
    }
    public function sports()
    {
        try {
            $data = Products::where('products.category_id','=',7)->where('products.status',1) 
            ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image',
           'products.status','products.id','products.sort_order','products.product_price','products.product_price_offer','products.product_premium_offer',
           DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
           DB::raw('((products.product_premium_offer-products.product_price)/products.product_price)*100 *-1 as product__premium_percentage')
           )->orderBy('products.id','DESC')->paginate(1000);
            $sub_category=SubCategory::where('category_id',7)->get();
            return view('frontend.products-category',array('results'=>$data,'sub_category'=>$sub_category));

        } catch (\Exception $e) {
    
            return $e->getMessage();
          }
    }
    public function toys()
    {
        try {
            $data = Products::where('products.category_id','=',8)->where('products.status',1) 
            ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image',
           'products.status','products.id','products.sort_order','products.product_price','products.product_price_offer','products.product_premium_offer',
           DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
           DB::raw('((products.product_premium_offer-products.product_price)/products.product_price)*100 *-1 as product__premium_percentage')
           )->orderBy('products.id','DESC')->paginate(1000);
            $sub_category=SubCategory::where('category_id',8)->get();
            return view('frontend.products-category',array('results'=>$data,'sub_category'=>$sub_category));

        } catch (\Exception $e) {
    
            return $e->getMessage();
          }
    }




   
    public function sub_category_products($id)
    {
        try {
            $sub=SubCategory::where('sub_cate_slug',$id)->first();
            $data = Products::where('products.sub_category_id','=',$sub->id)->where('products.status',1) 
            ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image',
           'products.status','products.id','products.sort_order','products.product_price','products.product_price_offer','products.product_premium_offer',
           DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
           DB::raw('((products.product_premium_offer-products.product_price)/products.product_price)*100 *-1 as product__premium_percentage')
           )->orderBy('products.id','DESC')->paginate(1000);
  
            $group_category=GroupCategory::where('sub_categoryid',$sub->id)->get();
            return view('frontend.products-sub-category',array('results'=>$data,'group_category'=>$group_category));

        } catch (\Exception $e) {
    
            return $e->getMessage();
          }
    }
    public function group_category_products($id)
    {
        try {
            $group=GroupCategory::where('group_cat_slug',$id)->first();
            $data = Products::where('products.group_category_id','=',$group->id)->where('products.status',1) 
            ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image',
           'products.status','products.id','products.sort_order','products.product_price','products.product_price_offer','products.product_premium_offer',
           DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
           DB::raw('((products.product_premium_offer-products.product_price)/products.product_price)*100 *-1 as product__premium_percentage')
           )->orderBy('products.id','DESC')->paginate(1000);
  
           $attribute=AttributesValue::get();
          return view('frontend.products-group-category',array('results'=>$data,'attribute'=>$attribute));

        } catch (\Exception $e) {
    
            return $e->getMessage();
          }
    }
    
      public function search_category(Request $request)
    {
        //   return $request->all();
        try {
            $brand=$request->brand;
            
            $color=$request->color;
            $min_price=$request->minprice;
            $max_price=$request->maxprice;
            $user = Currency::where('code',session('activecountry'))->first();
            $code=session('activecountry');
            $cu_rate=$user->kwd_convert_rate;  
    
            // ->whereBetween('product_price', [$min_price, $max_price])
            // ->whereBetween('product_price_offer',[1,4])
            //  ->PriceBetween($min_price,$max_price)
            //  ->BrandIn($brand)
            //  ->ColorIn($color)
            $query= Products::join('category','category.cat_id','=','products.category_id')
            ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image','products.product_brand',
            'products.status','products.id','products.sort_order',
            DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
            DB::raw('products.product_price * '.$cu_rate.' as product_price'),
            DB::raw('products.product_price_offer * '.$cu_rate.' as product_price_offer'));
            if($brand){
                $query=$query->where('product_brand','=',$brand); 
                }
            if($color){
                $query=$query->where('color_id','=',$color); 
                    }
             if($min_price&&$max_price){
                //  return 'ok';
                $min_price=$min_price/$cu_rate;
                $max_price=$max_price/$cu_rate;
            $query=$query->whereBetween('product_price_offer',[$min_price, $max_price]);
                    }
                   
            $query=$query->orderBy('products.id','DESC') ->where('category.parent_id','=',$request->category) ->where('products.status',1)->paginate(24);
            $data=$query;
            $sub_category=Category::where('parent_id',$request->category)->get();
            $brands=Brands::get();
            $attribute=AttributesValue::get();
            // return $data;
            return view('frontend.products-category',array('results'=>$data,'sub_category'=>$sub_category,'brands'=>$brands,'attribute'=>$attribute,'country'=>$code));

        } catch (\Exception $e) {
    
            return $e->getMessage();
          }
    }

}
