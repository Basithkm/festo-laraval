<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\Orders;
use App\Models\OrderStatus;
use App\Models\TodaysDeals;
use App\Models\CustomerRegistration;
use App\Models\Adds;
use App\Models\HomeImages;
use App\Models\Attributes;
use App\Models\AttributesValue;
use DB;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
class ShoppingController extends Controller
{
    //
    public function out_of_stock(){
        try{
        $data['stock']=Category::where('parent_id','=',0)->get();
        return view('out-of-stock/list',$data);
} catch (\Exception $e) {
        return $e->getMessage();
    }
        
        }
        
        
        public function view_out_of_stock($id){
            
                try{
        $cat_id = Crypt::decryptString($id);
        $cat=Category::where('cat_id','=',$cat_id)->get();  
        $data['product']=Products::join('category','category.cat_id','=','products.category_id')
                        ->where('products.status','=','1')
                        ->where('products.category_id','=',$cat_id)
                        ->orwhere('category.parent_id','=',$cat_id)
                        ->where('products.product_qty','=','0')
                        ->orderby('products.id','desc')
                        ->get();
                return view('out-of-stock/view',$data);
        } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        public function ad_purchase(Request $request)
{
        try{
    if (session('adminusername')) {
$data['purchase']=Purchase::
// join('customer_registration','customer_registration.customer_id','=','purchase.customer_id')
//             ->join('customer_group','customer_group.group_id','=','purchase.customer_type')
            orderBy('purchase.purchase_id','desc')->
            select('purchase.purchase_id','purchase.customer_id','purchase.order_id','purchase.customer_type','purchase.product_sub_total','purchase.purchase_date')
            ->paginate(100);
    
return view('purchase.purchase',$data);
 }else {
         return redirect('/my-admin');
    }
} catch (\Exception $e) {
        return $e->getMessage();
    }
}

public function view_purchase_list($id)
{
        try{
    if (session('adminusername')) {
    $data['view_purchase'] = Purchase::where('purchase_id','=',$id)
                        ->first();

    return view('purchase.view-purchase',$data);
     }else {
         return redirect('/my-admin');
    }
} catch (\Exception $e) {
        return $e->getMessage();
    }
}

public function ad_orders()
{
        try{
    if (session('adminusername')) {
         
    $data['ad_orders'] =  Orders::join('order_status','order_status.order_status_id','=','orders.order_status_id')
    ->select('orders.*','order_status.name')
    ->orderBy('orders.order_id', 'desc')
    ->paginate(1000);

    return view('orders.orders',$data);
    }else {
         return redirect('/my-admin');
    }
} catch (\Exception $e) {
        return $e->getMessage();
    }
}

public function view_orders_list($id)
{
        try{
    if (session('adminusername')) {

    $aa=$data['view_orders'] = Orders::where('order_id','=',$id)
                            ->first();



    $bb=$data['order_stat'] = OrderStatus::get();

    return view('orders.view-orders',$data);
    }else {
         return redirect('/my-admin');
    }
} catch (\Exception $e) {
        return $e->getMessage();
    }
}

public function update_order_status(Request $request)
{
        try{
    $order_id = $request->input('order_id');
    $order_status = $request->input('order_status');

    Orders::where('order_id','=',$order_id)
        ->update([

            'order_status_id' => $order_status


        ]);

    return redirect('ad_orders');
} catch (\Exception $e) {
        return $e->getMessage();
    }
   
}

public function order_invoice($id)
{
        try{
    if (session('adminusername')) {
    $data['order_id'] = $id;
    $data['print_invoice'] = Orders::where('order_id','=',$id)
                        ->first();
        
    return view('orders.invoice',$data);
     }else {
         return redirect('/my-admin');
    }
} catch (\Exception $e) {
        return $e->getMessage();
    }
}

public function daily_deals()
{
        try{
    if (session('adminusername')) { 
   $data['daily_deal'] = TodaysDeals::join('products','products.product_id','=','todays_deals.product_id')
                        ->get();
    
    return view('offers.deals.index',$data);
     }
    else {
         return redirect('/my-admin');
    }
} catch (\Exception $e) {
        return $e->getMessage();
    }
}



public function admin_add_Deal(Request $request)
{
        try{
    if (session('adminusername')) { 

    return view('offers.deals.add');
     }
    else {
         return redirect('/my-admin');
    }
} catch (\Exception $e) {
        return $e->getMessage();
    }
}

public function add_new_deal(Request $request)
{
        // return $request->all();
        try{
    $sel_product    = $request->input('sel_product');
    $special_rate   = $request->input('special_rate');
    $special_rate_arabic   = $request->input('special_rate_arabic');

  $pr_id =   TodaysDeals::insertGetId([

            'product_id' => $sel_product,
            'amount_discount' => $special_rate,
            'start_date' => \Carbon\Carbon::now()
            
        ]);
        Products::where('product_id','=',$sel_product)->update([

    'product_price_offer'=>$special_rate,
    'product_price_offer_arabic'=>$special_rate_arabic

]);

        $request->session()->flash('succ','Successfully Added New Deal');
        return back();  
} catch (\Exception $e) {
        return $e->getMessage();
    }
}


public function delete_deal($id, Request $request)
{
        try{
                            
        TodaysDeals::where('deal_id','=',$id)->delete();

        
        $request->session()->flash('succ','Succesfully Deleted!');
        return redirect('admn-daily-deals');
} catch (\Exception $e) {
        return $e->getMessage();
    }
}
public function list_customers(Request $request){
        try{
        if (session('adminusername')) { 
        $data['customers']=CustomerRegistration::join('customer_group','customer_group.group_id','customer_registration.customer_type')
                        ->where('customer_type','=','1')
                        ->orderBy('customer_id', 'desc')  
                        ->take(100)
                        ->get();
        return view('customers.index',$data);
        }else {
                 return redirect('/my-admin');
            }
        } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        public function view_ad_customer($id)
        {
                try{
            if (session('adminusername')) {
            $data['view_cust'] = CustomerRegistration::where('customer_id','=',$id)
                            ->get();
            return view('customers.view-customers',$data);
             }else {
                 return redirect('/my-admin');
            }
        } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        public function block_customer($id)

{
        try{
    if (session('adminusername')) {
        CustomerRegistration::where('customer_id','=',$id)
            ->update([
                   'status'=> 0 
            ]);
    return redirect('/ad_customers');
      }else {
         return redirect('/my-admin');
    }
} catch (\Exception $e) {
        return $e->getMessage();
    }
}

public function unblock_customer($id)
{
        try{
                CustomerRegistration::where('customer_id','=',$id)
            ->update([
                   'status'=> 1 
            ]);
    return redirect('/ad_customers');
} catch (\Exception $e) {
        return $e->getMessage();
    }
}

public function ad_advertisment()
{
    try{
    if (session('adminusername')) {
    $data['advertisment'] =Adds::orderby('page','asc')
            ->get();
    return view('advertisment.advertisment',$data);
     }else {
         return redirect('/my-admin');
    }
} catch (\Exception $e) {
    return $e->getMessage();
}
}



public function add_advertisment()
{
    try{
   if (session('adminusername')) {
       $data['products']=Products::select('product_id','product_name')->orderby('product_name','asc')->get();
    return view('advertisment.add-advertisment',$data);
    }else {
         return redirect('/my-admin');
    }
} catch (\Exception $e) {
    return $e->getMessage();
}
}



public function add_new_ads(Request $request){
    try{
        // return $request->all();
if (session('adminusername')) {
    
    // if($request->page=='computers-app'|| $request->page=='accessories-app'|| $request->page=='camara-drone-app' || $request->page=='mobiles-app'|| $request->page=='tablets-app'|| $request->page=='homeappliances-app'||$request->page=='watchesandperfume-app'||$request->page=='travel-app'||$request->page=='personal-care-app'||$request->page=='game-app'){
    //     if($request->file('image')){
    //     $photo = $request->file('image'); 
    //     $storyimagename = time().'.'.$photo->getClientOriginalExtension(); 
    //     $destinationPath = 'uploads/ads';
    //     $thumb_img = Image::make($photo->getRealPath())->resize(708,369);
    //     $thumb_img->save($destinationPath.'/'.$storyimagename,80);
        
    //     }
    //     Adds::insert([
    //         'page'=>$request->input('page'),
    //         'image'=>$storyimagename,
    //         'url'=>$request->input('url')
    //         ]);
    //      return redirect('/advertisment');
                
    //          }
     if($request->page=='men-web'|| $request->page=='women-web'|| $request->page=='kids-web' || $request->page=='footweare-web'|| $request->page=='bags-web'|| $request->page=='kitchen_home-web'||$request->page=='sports-web'||$request->page=='toys-web'){
                if($request->file('image')){
                $photo = $request->file('image'); 
                $storyimagename = time().'.'.$photo->getClientOriginalExtension(); 
                $destinationPath = 'uploads/ads';
                $thumb_img = Image::make($photo->getRealPath())->resize(1349,369);
                $thumb_img->save($destinationPath.'/'.$storyimagename,80);
                
                }
    // $Adds=Adds::where('page',$request->input('page'))->orderBy('add_id','DESC')->first();
    //   $Adds->delete();
                Adds::insert([
                    'page'=>$request->input('page'),
                    'image'=>$storyimagename,
                    'url'=>$request->input('url')
                    ]);
                 return redirect('/advertisment');
                        
                     }

   
//       if($request->page=='app'){
// if($request->file('image')){
// $photo = $request->file('image'); 
// $storyimagename = time().'.'.$photo->getClientOriginalExtension(); 
// $destinationPath = 'uploads/ads';
// $thumb_img = Image::make($photo->getRealPath())->resize(620,220);
// $thumb_img->save($destinationPath.'/'.$storyimagename,80);

// }
// Adds::insert([
//     'page'=>$request->input('page'),
//     'image'=>$storyimagename,
//     'url'=>$request->input('url')
//     ]);
//  return redirect('/advertisment');
        
//      }
     
//  if($request->page=='home-top-eng' || $request->page=='home-top-arabic'){   
// if($request->file('image')){
// $photo = $request->file('image'); 
// $storyimagename = time().'.'.$photo->getClientOriginalExtension(); 
// $destinationPath = 'uploads/ads';
// $thumb_img = Image::make($photo->getRealPath())->resize(391,178);
// $thumb_img->save($destinationPath.'/'.$storyimagename,80);

// }
// Adds::insert([
//     'page'=>$request->input('page'),
//     'image'=>$storyimagename,
//     'url'=>$request->input('url')
//     ]);
//  return redirect('/advertisment');
    
//  }
//  elseif($request->page=='home-bottom-eng' || $request->page=='home-bottom-arabic'){
     
     
     
//      if($request->file('image')){
// $photo = $request->file('image'); 
// $storyimagename = time().'.'.$photo->getClientOriginalExtension(); 
// $destinationPath = 'uploads/ads';
// $thumb_img = Image::make($photo->getRealPath())->resize(382,310);
// $thumb_img->save($destinationPath.'/'.$storyimagename,80);

// }
// Adds::insert([
//     'page'=>$request->input('page'),
//     'image'=>$storyimagename,
//     ]);
//  return redirect('/advertisment');
     
     
     
//  }
//  elseif($request->page=='best-collection'){
     
     
     
//      if($request->file('image')){
// $photo = $request->file('image'); 
// $storyimagename = time().'.'.$photo->getClientOriginalExtension(); 
// $destinationPath = 'uploads/ads';
// $thumb_img = Image::make($photo->getRealPath())->resize(1920,700);
// $thumb_img->save($destinationPath.'/'.$storyimagename,80);

// }
// Adds::insert([
//     'page'=>$request->input('page'),
//     'image'=>$storyimagename,
//     ]);
//  return redirect('/advertisment');
     
     
     
//  }
//  else{
     
     
//         if($request->file('image')){
// $photo = $request->file('image'); 
// $storyimagename = time().'.'.$photo->getClientOriginalExtension(); 
// $destinationPath = 'uploads/ads';
// $thumb_img = Image::make($photo->getRealPath())->resize(243,366);
// $thumb_img->save($destinationPath.'/'.$storyimagename,80);

// }
// Adds::insert([
//     'page'=>$request->input('page'),
//     'image'=>$storyimagename,
//     ]);
//  return redirect('/advertisment');
     
     
     
//  }
 
    }else {
         return redirect('/my-admin');
    }
} catch (\Exception $e) {
    return $e->getMessage();
}
}


public function delete_adds($id)
{
    try{
    $adsimage=DB::select('select * from adds where add_id = ?',[$id]);
                        foreach ($adsimage as $key => $value) 
                        {
                            $proimg=$value->image;
                            
                        }
                        Adds::where('add_id','=',$id)->delete();
      unlink('uploads/ads/'.$proimg);
            
        return redirect('/advertisment');
    } catch (\Exception $e) {
        return $e->getMessage();
    }
}

public function all_slider_images()
{
    try{
    
    $data['slider']=HomeImages::get();
    return view('home-images/slider_images_list',$data);
} catch (\Exception $e) {
    return $e->getMessage();
}
    
}
public function add_slider_images()
{
    try{
  $data['products']=Products::select('product_id','product_name')->orderby('product_name','asc')->get();
    return view('home-images/slider-images',$data);
} catch (\Exception $e) {
    return $e->getMessage();
}
    
}

public function add_slider_img(Request $request){
    try{
      $photo = $request->file('image'); 
                    $blogimagename = time().'.'.$photo->getClientOriginalExtension(); 
                    $destinationPath = 'uploads/home-slider';
                    if($request->image_for=='app'){
                         $thumb_img = Image::make($photo->getRealPath())->resize(708,369);
                    }
                    else{
                    $thumb_img = Image::make($photo->getRealPath())->resize(1268,330);
                    }
                    $thumb_img->save($destinationPath.'/'.$blogimagename,80);
                    $thumb_img->save($destinationPath.'/'.$blogimagename,80);
                    
                    HomeImages::insert([
                        
                        'img_name'=>$blogimagename,
                        'img_for'=>$request->image_for,
                        'url'=>$request->url
                        ]);
                        
                        return redirect('slider-images');
                    } catch (\Exception $e) {
                        return $e->getMessage();
                    }
    
    
}

public function delete_slider_image($id)
{
    try{
    $adsimage=DB::select('select * from home_images where img_id = ?',[$id]);
                        foreach ($adsimage as $key => $value) 
                        {
                            $proimg=$value->img_name;
                            
                        }
                        HomeImages::where('img_id','=',$id)->delete();
      unlink('uploads/home-slider/'.$proimg);
            
        return redirect('/slider-images');
    } catch (\Exception $e) {
        return $e->getMessage();
    }
}
public function attribute_values(){

    if (session('adminusername')) {

        $data['values']=AttributesValue::
                        join('attributes','attributes.attribute_id','=','attributes_value.attribute_id')
                        ->get();
        return view('attribute_values.index',$data);
    }
    else {
        return redirect('/my-admin');
    }

}

public function add_value(){

    if (session('adminusername')) {

        $data['attributes']=Attributes::get();
        return view('attribute_values.create',$data);
    }
    else {
        return redirect('/my-admin');
    }

}

public function add_new_value(Request $request){

    if (session('adminusername')) {
        $attr_name = $request->input('attr_name');
        $attributes_value = $request->input('attr_val');
        $hex_val = $request->input('hex_val');


        AttributesValue::insert([

        'attribute_id'=> $attr_name,
        'attribute_value'=> $attributes_value,
        'attribute_color_code' => $hex_val,
        'created_at' => \Carbon\Carbon::now()

            ]);

        return back();
    }
    else {
        return redirect('/my-admin');
    }
}

public function edit_values($id){

    if (session('adminusername')) {

        $data['attributes']=Attributes::get();
        $data['attributes_value']=AttributesValue::where('attributes_value.attribute_value_id','=',$id)
                        ->first();
                 
        return view('attribute_values.edit',$data);
    }
    else {
        return redirect('/my-admin');
    }

}

public function update_values(Request $request){

    if (session('adminusername')) {
    try{
        $cid=$request->input('attr_value_id');
        AttributesValue::where('attribute_value_id','=',$cid)->update([

            'attribute_id'=>$request->input('attr_name'),
            'attribute_value'=>$request->input('attr_val'),
            'attribute_color_code'=>$request->input('hex_val_ed')
            ]);
        
    } catch (\Exception $e) {
        return $e->getMessage();
    }
            $request->session()->flash('succ','Succesfully Updated!');

            return redirect('attribute-values');
    }
    else {
        return redirect('/my-admin');
    }


}

public function delete_values($id,Request $request){

    if (session('adminusername')) {
        AttributesValue::where('attribute_value_id','=',$id)->delete();
        $request->session()->flash('succ','Succesfully Deleted!');
        return redirect('attribute-values');
    }
    else {
        return redirect('/my-admin');
    }

}
}
