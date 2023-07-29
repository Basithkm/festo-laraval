<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use App\Models\Brands;
use App\Models\HomeImages;
use App\Models\Currency;
use DB;
use App\Models\TodaysDeals;
use App\Models\Adds;
use App\Models\CustomerRegistration;
use App\Models\Orders;
use App\Models\Purchase;
use Carbon\Carbon;
use Cart;
use Illuminate\Support\Facades\App;
class HomeController extends Controller
{
    //

     public function lang_change($id)
    {
       
        App::setLocale($id);
        session()->put('locale', $id);

        return redirect()->back();  
    }
   

    public function index(Request $request)
    {
        //
        try {
        
      $men = Products::where('products.category_id','=',1)->where('products.status',1) 
       ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image',
      'products.status','products.id','products.sort_order','products.product_price','products.product_price_offer','products.product_premium_offer',
      DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
      DB::raw('((products.product_premium_offer-products.product_price)/products.product_price)*100 *-1 as product__premium_percentage')
      )->orderBy('products.id','DESC')->limit(7)->get();

      $women = Products::where('products.category_id','=',2)->where('products.status',1) 
       ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image',
      'products.status','products.id','products.sort_order','products.product_price','products.product_price_offer','products.product_premium_offer',
      DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
      DB::raw('((products.product_premium_offer-products.product_price)/products.product_price)*100 *-1 as product__premium_percentage')
      )->orderBy('products.id','DESC')->limit(7)->get();

      $kids = Products::where('products.category_id','=',3)->where('products.status',1) 
       ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image',
      'products.status','products.id','products.sort_order','products.product_price','products.product_price_offer','products.product_premium_offer',
      DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
      DB::raw('((products.product_premium_offer-products.product_price)/products.product_price)*100 *-1 as product__premium_percentage')
      )->orderBy('products.id','DESC')->limit(7)->get();

      $footweare = Products::where('products.category_id','=',4)->where('products.status',1) 
       ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image',
      'products.status','products.id','products.sort_order','products.product_price','products.product_price_offer','products.product_premium_offer',
      DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
      DB::raw('((products.product_premium_offer-products.product_price)/products.product_price)*100 *-1 as product__premium_percentage')
      )->orderBy('products.id','DESC')->limit(7)->get();

      $bags = Products::where('products.category_id','=',5)->where('products.status',1) 
       ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image',
      'products.status','products.id','products.sort_order','products.product_price','products.product_price_offer','products.product_premium_offer',
      DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
      DB::raw('((products.product_premium_offer-products.product_price)/products.product_price)*100 *-1 as product__premium_percentage')
      )->orderBy('products.id','DESC')->limit(7)->get();

      $kitchen_home = Products::where('products.category_id','=',6)->where('products.status',1) 
       ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image',
      'products.status','products.id','products.sort_order','products.product_price','products.product_price_offer','products.product_premium_offer',
      DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
      DB::raw('((products.product_premium_offer-products.product_price)/products.product_price)*100 *-1 as product__premium_percentage')
      )->orderBy('products.id','DESC')->limit(7)->get();

      $sports = Products::where('products.category_id','=',7)->where('products.status',1) 
       ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image',
      'products.status','products.id','products.sort_order','products.product_price','products.product_price_offer','products.product_premium_offer',
      DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
      DB::raw('((products.product_premium_offer-products.product_price)/products.product_price)*100 *-1 as product__premium_percentage')
      )->orderBy('products.id','DESC')->limit(7)->get();

      $toys = Products::where('products.category_id','=',8)->where('products.status',1) 
       ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image',
      'products.status','products.id','products.sort_order','products.product_price','products.product_price_offer','products.product_premium_offer',
      DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
      DB::raw('((products.product_premium_offer-products.product_price)/products.product_price)*100 *-1 as product__premium_percentage')
      )->orderBy('products.id','DESC')->limit(7)->get();

      
      $homeimage =HomeImages::where('img_for','english')->get();
      
      
      $men_web=Adds::where('page','men-web')->orderBy('add_id','DESC')->first();
      $women_web=Adds::where('page','women-web')->orderBy('add_id','DESC')->first();
      $kids_web=Adds::where('page','kids-web')->orderBy('add_id','DESC')->first();
      $footweare_web=Adds::where('page','footweare-web')->orderBy('add_id','DESC')->first();
      $bags_web=Adds::where('page','bags-web')->orderBy('add_id','DESC')->first();
      $kitchen_home_web=Adds::where('page','kitchen_home-web')->orderBy('add_id','DESC')->first();
      $sports_web=Adds::where('page','sports-web')->orderBy('add_id','DESC')->first();
      $toys_web=Adds::where('page','toys-web')->orderBy('add_id','DESC')->first();
      

      return view('frontend.index',array('homeimage'=>$homeimage,'men'=>$men,'women'=>$women,'kids'=>$kids,'footweare'=>$footweare,'bags'=>$bags,'kitchen_home'=>$kitchen_home,'sports'=>$sports,'toys'=>$toys,
      'men_web'=>$men_web,'women_web'=>$women_web,'kids_web'=>$kids_web,'footweare_web'=>$footweare_web,'bags_web'=>$bags_web,'kitchen_home_web'=>$kitchen_home_web,'sports_web'=>$sports_web,'toys_web'=>$toys_web));
         } catch (\Exception $e) {
    
    return $e->getMessage();
  }
    }
    public function search(Request $request)
    {
      try {
          // return $request->all();
        
        $value=$request->value;
        if($value){
        $data =Products::where('products.status','=','1')
                ->where('products.product_name','like','%'.$value.'%')
                ->orderBy('products.sort_order','asc')
                ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image',
                'products.status','products.id','products.sort_order','products.product_price','products.product_price_offer','products.product_premium_offer',
                DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
                DB::raw('((products.product_premium_offer-products.product_price)/products.product_price)*100 *-1 as product__premium_percentage'),
                )->where('products.status','=','1')
                ->paginate('60');
                
        }
        else{
           
           $data =Products::select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image',
           'products.status','products.id','products.sort_order','products.product_price','products.product_price_offer','products.product_premium_offer',
           DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
           DB::raw('((products.product_premium_offer-products.product_price)/products.product_price)*100 *-1 as product__premium_percentage'))
           ->where('products.status','=','12') ->paginate('60');
        }
       
                return view('frontend.search',array('results'=>$data));
      } catch (\Exception $e) {
    
        return $e->getMessage();
      }
    }
    
    
        public function searchproduct(Request $request){
         
        $key=$request->key;
        
        $n=strlen($key);
 
        if($n!=0){
            
$product = Products::where('products.status','=','1')
                ->where('products.product_name','like','%'.$key.'%')
                ->orderBy('products.sort_order','asc')
                ->select('products.product_name as product_name','products.category_id','products.product_id as product_id','products.product_slug','products.product_image',
                'products.status','products.id','products.sort_order','products.product_price','products.product_price_offer','products.product_premium_offer',
                DB::raw('((products.product_price_offer-products.product_price)/products.product_price)*100 *-1 as product_percentage'),
                DB::raw('((products.product_premium_offer-products.product_price)/products.product_price)*100 *-1 as product__premium_percentage'),
                )->get();

                
$html="";
if($product){


  foreach ($product as $products) {
     
       $pro_id = $products->product_slug;



$html.='
 <div class="col-md-3">
                        <div class="newdesign">
                        <a href="'.url('product-view/'.$pro_id).'">
          <img src="'.url('uploads/product/single-product/'.$products->product_image).'">
                                <p style="font-weight:600;font-size:14px;margin-bottom:0.5rem;">'.$products->product_name.'
                                </p>
                                <p style="font-weight:600;font-size:18px;color: #f5831a;margin-bottom: 4px;" class="  ">
                                '.number_format($products->product_price_offer, 2, '.', ',').' </p>
                                <div class="font-body"><span
                                        style="font-weight:600;font-size:14px;color: #000;margin-bottom: 4px;text-decoration: line-through;"
                                        class=" ">'.number_format($products->product_price, 2, '.', ',').' </span> <span class=""
                                        style="background-color: #f5831a;font-size: 12px;color: white;padding: 3px;">'.number_format($products->product_percentage, 2, '.', ',').'%</span>
                                </div>
                            </a>
                            <br>
                            <p class="newbtn ">'.number_format($products->product_premium_offer, 2, '.', ',').'<span class="offer-class"style="">'.number_format($products->product__premium_percentage, 2, '.', ',').'%</span></p>
                             <a  href="'.url('product-view/'.$pro_id).'" class="w-100 newbtn1"><Button style="margin-bottom:10px;" type="button" class="w-100 newbtn addCart">view details</Button></a>
                            <br>
                        </div>
                    </div>

             ';


}



}else{

$html.='<center><p>No results Fount.</center></p>';

}

}else{

 $html.=''; 
}
echo $html;
        }
        
         public function order_confirmation(Request $request)
    {
         try {
            if(session('username')){
        $ord=CustomerRegistration::where('customer_email','=',session('username'))->first();
          $data['order']=Orders::where('customer_id','=',$ord->customer_id)->orderBy('order_id','DESC')->first();
            return view('frontend.order-confirmation',$data);
        }
        else{
           
            $data['order']=Orders::orderBy('order_id','DESC')->first();
              return view('frontend.order-confirmation',$data);
        }
      
           
             
         }
              catch (\Exception $e) {
    
          return $e->getMessage();
        }
    }

    
}
