<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Products;
use App\Models\CustomerRegistration;
use App\Models\Currency;
use App\Models\ProductsAttributes;
class CartController extends Controller
{
    //
    public function addcart(Request $request){
      try {
        $product_id=$request->product_id;
        $size=$request->size;
        if($size!=0)
        {
          $Prttributes=ProductsAttributes::find($size);
          $sizedetail=$Prttributes->attribute_value;
        }
        else{
          $sizedetail='';
        }
       
        // Cart::destroy();
     
        $pro=Products::where('product_id','=',$product_id)->first();
         
        $price=$pro->product_price_offer;
        $min_pur_qty=$pro->min_pur_qty;
        Cart::add($pro->id, $pro->product_name, 1, $price, $size,['size' => $sizedetail]);
        // Cart::add($pro->id, $name,1, $price, 550);
    
        $cck=Cart::content();
        foreach ($cck as $ccks) {
         $rid= $ccks->rowId;
        $img=Products::where('id','=',$ccks->id)->get();
        
        foreach ($img as $img) {
             if($img->min_pur_qty=='1'){
            Cart::update($rid,'1');
        } 
            
        }
        
        }
      } catch (\Exception $e) {

        return $e->getMessage();
       }
          }
     public function addcart_count(){
            try {
           $count=Cart::content()->groupBy('id')->count();
           echo $count;
            } catch (\Exception $e) {
                  
                   return $e->getMessage();
                 }
           
          }
      public function my_cart(){
                try {
              
                  
                  if(Cart::count()==0)
                  {
                       return view('frontend.empty-cart');
                  
                  }
                  else
                  {
                 
               if(session('username')){
              
        $users=CustomerRegistration::where('customer_email','=',session('username'))->first();
     
        if($users->premium_customer==1){
            $result=Cart::content();
          foreach ($result as $ccks) {
            $rid= $ccks->rowId;
              $pro=Products::where('id','=',$ccks->id)->first();
              // weight
              $price=$pro->product_premium_offer;
              $weight=$ccks->weight;
              $Prttributes=ProductsAttributes::find($weight);
              if($Prttributes){
                $price=$Prttributes->product_premium_offer;
              }
            Cart::update($rid, ['price' => $price]);
           }
        }
       

        }
       
         $data['cart']=Cart::content();
                   return view('frontend.viewcart',$data);
                  }
                    } catch (\Exception $e) {
                      
                       return $e->getMessage();
                     }
          }
          public function remove_cart($id){
            try {
              Cart::remove($id);
              return redirect('my-cart');
                } catch (\Exception $e) {
                  
                   return $e->getMessage();
                 }
      }
      public function remove_all_cart(){
        try {
          Cart::destroy();
          return redirect('/');
            } catch (\Exception $e) {
              
               return $e->getMessage();
             }
  }
  public function update_cart(Request $request){
    try {
    $qty=$request->input('qty');
    $rid=$request->input('rid');
    $pid=$request->input('pid');
    
    $pro=Products::where('product_id',$pid)->get();
    foreach($pro as $pros){
        
        $max_limit=$pros->min_pur_qty;
    }
    
    if($max_limit=='1'){
    Cart::update($rid,'1');
    $request->session()->flash('succ_title','Cart Successfully Updated');
        return back();
    
        return back(); 
    }else{
              Cart::update($rid,$qty);
    $request->session()->flash('succ_title','Cart Successfully Updated');
        return back();
    }
  } catch (\Exception $e) {

    return $e->getMessage();
   }
      }
}
