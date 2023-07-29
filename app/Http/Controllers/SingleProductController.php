<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Currency;
use App\Models\Review;
use App\Models\ProductImages;
use App\Models\ProductsAttributes;
use DB;
class SingleProductController extends Controller
{
    //
    public function product_view($id){
        try{
            

            $productimage=[]; 
        if($product=Products::where('product_slug','=',$id)->where('products.status','=','1')->first()){
            $results = Products::where('product_id',$product->product_id)->where('products.status',1) 
            ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image',
           'products.status','products.id','products.sort_order','products.product_price','products.product_price_offer','products.product_premium_offer',
           DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
           DB::raw('((products.product_premium_offer-products.product_price)/products.product_price)*100 *-1 as product__premium_percentage')
           )->first();
        
        }else{return 'this product not available';}
        $url = "https://www.myfezto.com/product-view/$id";
        
        $img = "https://www.myfezto.com/uploads/product/thumb_images/$results->product_image";
        $metatitle = $results->product_name;

        $data['related_product']= Products::where('product_id',$product->product_id)->where('products.status',1) 
        ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image',
       'products.status','products.id','products.sort_order','products.product_price','products.product_price_offer','products.product_premium_offer',
       DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
       DB::raw('((products.product_premium_offer-products.product_price)/products.product_price)*100 *-1 as product__premium_percentage')
       )->orderBy('products.id','DESC')->limit(7)->get();

        $data['addon_product']= Products::join('attributes_value','attributes_value.attribute_value_id','=','products.color_id')
        ->where('products.parent_id',$product->id)->orwhere('products.parent_id','=',$product->parent_id)->where('products.status',1) 
        ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image','products.product_brand','attributes_value.attribute_value','attributes_value.attribute_color_code',
       'products.id','products.sort_order'
       )->orderBy('products.id','DESC')->limit(7)->get();
        $data['attribute']=ProductsAttributes::where('pro_id',$product->id)->where('available_qty','>',0)->get();
       
        $ProductImages=ProductImages::where('product_id',$product->product_id)->get();
        $productimage[]=[$results->product_id,$results->product_image];
        foreach($ProductImages as $pro){
            $productimage[]=[$pro->product_id,$pro->images];
        }
      
        $data['review']=Review::where('product_id','=',$product->product_id)->limit(10)->get();
        return view('frontend.view-details',$data,compact('url','img','metatitle','results','ProductImages','productimage'));
    } catch (\Exception $e) {

        return $e->getMessage();
       }  
        
        }
        public function add_review(Request $request){

            try{
                Review::insert([
            
            'text'=>$request->input('text'),
            'author_name'=>$request->input('author'),
            'product_id'=>$request->input('product_id')
            
            ]);
        } catch (\Exception $e) {

            return $e->getMessage();
           }  
            
            return back();
            
            }
}
