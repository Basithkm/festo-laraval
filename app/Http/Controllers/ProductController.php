<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\GroupCategory;
use App\Models\Brands;
use App\Models\ProductImages;
use App\Models\ProductsAttributes;
use App\Models\AttributesValue;
use DB;

use Illuminate\Support\Facades\Auth;
use Image;
class ProductController extends Controller
{
    //
    public function index()
        {
            try {
                
                if (session('adminusername')) {
               
                     $data['products']= Products::select('id','product_id','product_name')->where('products.status',1)->orderBy('id', 'desc')
                                        ->WhereBetween('id',[1,2000])->get();
                    return view('product.index',$data);
                      }
                    else {
                         return redirect('/my-admin');
                    }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
     public function index_to_2000()
        {
            try {
                
                if (session('adminusername')) {
               
                     $data['products']= Products::select('id','product_id','product_name')->where('products.status',1)->orderBy('id', 'desc')
                                        ->WhereBetween('id',[2001,4000])->get();
                    return view('product.index',$data);
                      }
                    else {
                         return redirect('/my-admin');
                    }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
             public function index_to_4000()
        {
            try {
                
                if (session('adminusername')) {
               
                     $data['products']= Products::select('id','product_id','product_name')->where('products.status',1)->orderBy('id', 'desc')
                                        ->WhereBetween('id',[4001,6000])->get();
                    return view('product.index',$data);
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

                    $data['category'] = GroupCategory::with('SubCategory')->get();
                    $data['attribute']=AttributesValue::where('attribute_id',2)->get();
               
                    return view('product.create',$data);
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
        //   return  $request->all();
        
            try {
                $data = request()->validate([
                    'category_name' => 'required|numeric|min:0|not_in:0',
                    'product_name' => 'required',
                    'product_offer' => 'required|numeric|min:0',
                    'product_price' => 'required|numeric|min:0',
                    'product_premium_offer' => 'required|numeric|min:0',
                    'image' => 'required',
                    'product_desc'=> 'required'
                ]);
        
    $group_category_id = $request->input('category_name');

    $GroupCategory=GroupCategory::find($group_category_id);
    $SubCategory=SubCategory::find($GroupCategory->sub_categoryid);
    $Category=Category::find($SubCategory->category_id);

    $prod_slug = preg_replace('~[^\pL\d]+~u', '-',$request->input('product_name'));  
    
    $prod_slug = iconv('utf-8', 'us-ascii//TRANSLIT', $prod_slug);  
    $prod_slug = preg_replace('~[^-\w]+~', '', $prod_slug);
    $prod_slug = trim($prod_slug, '-');  
    $prod_slug = preg_replace('~-+~', '-', $prod_slug);  
    $prod_slug = strtolower($prod_slug);
    
  
$product_name = $request->input('product_name');
$product_price = $request->input('product_price');
$product_offer = $request->input('product_offer');
$product_premium_offer = $request->input('product_premium_offer');
$addon=0;
$color=0;
if($request->input('addon'))
{
    $addon=1;
    $color=$request->input('color_name');
}

$photo = $request->file('image'); 

$storyimagename = time().'.'.$photo->getClientOriginalExtension();

$destinationPath = 'uploads/product/thumb_images';

$thumb_img = Image::make($photo->getRealPath())->resize(293,293);
$thumb_img->save($destinationPath.'/'.$storyimagename,80);


$destinationPath2 = 'uploads/product/single-product';
$thumb_img2 = Image::make($photo->getRealPath())->resize(293,293);
$thumb_img2->save($destinationPath2.'/'.$storyimagename,80);


$destinationPath3 = 'uploads/product/single-product/small';
$thumb_img3 = Image::make($photo->getRealPath())->resize(100,100);
$thumb_img3->save($destinationPath3.'/'.$storyimagename,80);



$product_desc = $request->input('product_desc');  

$pro_status = $request->input('pro_status');



$id = Products::insertGetId([

'category_id' => $Category->id,
'sub_category_id' =>$SubCategory->id,
'group_category_id' =>$group_category_id,
'product_image' => $storyimagename,
'product_name' =>$product_name,
'product_slug' => $prod_slug,
'product_price' => $product_price,
'product_desc' => $product_desc,
'product_qty' => $request->input('product_qty'),   
'product_price_offer' => $product_offer,
'product_premium_offer' => $product_premium_offer,
'color_id'=>$color,
'if_attribute'=>$addon,
'status' => $pro_status,
'created_at' =>\Carbon\Carbon::now()
]);
$productid='PRDCTF'.$id;


Products::where('id','=',$id)->update([

'product_id'=>$productid,

]);

ProductsAttributes::where('products_attributes_id','=',$id)->insert([

'product_id'=>$productid,

]);


ProductImages::insertGetId([

'product_id' => $productid,
'images' => $storyimagename,
'created_at' =>\Carbon\Carbon::now()
]);
if($request->file('image1')){
$randomId       =   rand(2,499);
$photoadd = $request->file('image1'); 
$storyimageaddimag = time().$randomId.'.'.$photoadd->getClientOriginalExtension();

$destinationPath1 = 'uploads/product/thumb_images';
$thumb_img1 = Image::make($photoadd->getRealPath())->resize(293,293);
$thumb_img1->save($destinationPath1.'/'.$storyimageaddimag,80);

$destinationPath21 = 'uploads/product/single-product';
$thumb_img21 = Image::make($photoadd->getRealPath())->resize(293,293);
$thumb_img21->save($destinationPath21.'/'.$storyimageaddimag,80);

$destinationPath31 = 'uploads/product/single-product/small';
$thumb_img31 = Image::make($photoadd->getRealPath())->resize(100,100);
$thumb_img31->save($destinationPath31.'/'.$storyimageaddimag,80);

ProductImages::insertGetId([

'product_id' => $productid,
'images' => $storyimageaddimag,
'created_at' =>\Carbon\Carbon::now()
]);
}


if($request->file('image2')){
 $random       =   rand(499,999);
$photoimg2 = $request->file('image2'); 
$storyimagename201 = time().$random.'.'.$photoimg2->getClientOriginalExtension();

$destinationPath201 = 'uploads/product/thumb_images';
$thumb_img201 = Image::make($photoimg2->getRealPath())->resize(293,293);
$thumb_img201->save($destinationPath201.'/'.$storyimagename201,80);

$destinationPath22 = 'uploads/product/single-product';
$thumb_img22 = Image::make($photoimg2->getRealPath())->resize(293,293);
$thumb_img22->save($destinationPath22.'/'.$storyimagename201,80);

$destinationPath32 = 'uploads/product/single-product/small';
$thumb_img32 = Image::make($photoimg2->getRealPath())->resize(100,100);
$thumb_img32->save($destinationPath32.'/'.$storyimagename201,80);

ProductImages::insertGetId([

'product_id' => $productid,
'images' => $storyimagename201,
'created_at' =>\Carbon\Carbon::now()
]);
}

if($request->file('image3')){
$rand       =   rand(1001,1500);
$photo3 = $request->file('image3'); 
$storyimagename3 = time().$rand.'.'.$photo3->getClientOriginalExtension();

$destinationPath3 = 'uploads/product/thumb_images';
$thumb_img3 = Image::make($photo3->getRealPath())->resize(293,293);
$thumb_img3->save($destinationPath3.'/'.$storyimagename3,80);

$destinationPath23 = 'uploads/product/single-product';
$thumb_img23 = Image::make($photo3->getRealPath())->resize(293,293);
$thumb_img23->save($destinationPath23.'/'.$storyimagename3,80);

$destinationPath33 = 'uploads/product/single-product/small';
$thumb_img33 = Image::make($photo3->getRealPath())->resize(100,100);
$thumb_img33->save($destinationPath33.'/'.$storyimagename3,80);

ProductImages::insertGetId([

'product_id' => $productid,
'images' => $storyimagename3,
'created_at' =>\Carbon\Carbon::now()
]);
}

if($request->file('image4')){
$ra       =   rand(1500,1999);
$photo4 = $request->file('image4'); 
$storyimagename4 = time().$ra.'.'.$photo4->getClientOriginalExtension();

$destinationPath4 = 'uploads/product/thumb_images';
$thumb_img4 = Image::make($photo4->getRealPath())->resize(293,293);
$thumb_img4->save($destinationPath4.'/'.$storyimagename4,80);

$destinationPath24 = 'uploads/product/single-product';
$thumb_img24 = Image::make($photo4->getRealPath())->resize(293,293);
$thumb_img24->save($destinationPath24.'/'.$storyimagename4,80);

$destinationPath34 = 'uploads/product/single-product/small';
$thumb_img34 = Image::make($photo4->getRealPath())->resize(100,100);
$thumb_img34->save($destinationPath34.'/'.$storyimagename4,80);

ProductImages::insertGetId([

'product_id' => $productid,
'images' => $storyimagename4,
'created_at' =>\Carbon\Carbon::now()
]);
}




$request->session()->put('product_id', $productid);

return back();


        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

 public function add_stock($id)
        {
            try {
                if (session('adminusername')) {
                    $data['ed_prod'] = Products::where('id','=',$id)
                                    ->first();
                   
                    return view('product.add-stock',$data);
                     }
                    else {
                         return redirect('/my-admin');
                    }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
          public function update_add_stock(Request $request)
        {
          
           
            try {
                 $product_id = $request->input('id');
                $stock = $request->input('stock');
                 $ed_prod = Products::where('id','=',$product_id)
                                    ->first();
                      $stock=$stock+$ed_prod->product_qty;              
                 Products::where('id','=',$product_id)->update([

                    'product_qty' => $stock,
                    'updated_at' => \Carbon\Carbon::now()
                ]);
            
                return redirect('/product');
            } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

        public function edit(Request $request,$id)
        {
            try {
                if (session('adminusername')) {
                    $data['ed_prod'] = Products::where('id','=',$id)
                                    ->first();
                    $data['category']=Category::where('parent_id','!=',0)
                    ->get();
                    $data['brands'] =  Brands::get();
                    return view('product.edit',$data);
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
            
                $product_id = $request->input('id');
                $product_name = $request->input('product_name');
                $product_desc = $request->input('product_desc');
                $product_price = $request->input('product_price');
                $product_offer = $request->input('product_offer');
                $product_premium_offer = $request->input('product_premium_offer');
            
                 Products::where('id','=',$product_id)->update([
                    'product_name' =>$product_name,
                    'product_premium_offer' => $product_premium_offer,
                    'product_desc' => $product_desc,
                    'product_price' => $product_price,
                    'product_price_offer' => $product_offer,
                    'product_qty' => $request->input('product_qty'),   
                    'updated_at' => \Carbon\Carbon::now()
                ]);
            
                return redirect('/product');
            
              
            
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

        public function active(Request $request,$id)
        {
          
           
            try {
               
              
           
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function delete_product($id, Request $request)
{
    try {
               
       
        $catimage=DB::select('select * from products where id = ?',[$id]);
                            foreach ($catimage as $key => $value) 
                            {
                                $proimg=$value->product_image;
                                
                            }
                            Products::where('id','=',$id)->delete();             
        

        unlink('uploads/product/single-product/'.$proimg);
                            unlink('uploads/product/thumb_images/'.$proimg);
                            unlink('uploads/product/single-product/small/'.$proimg);
        
        return redirect('/product');
             
    } catch (\Exception $e) {
        return $e->getMessage();
    }
}
public function reset_product_stock($id, Request $request)
{
    try {
               
    
        Products::where('id','=',$id)->update([
        
        
        'product_qty' => '0'
        ]);
       
        
        return back();
             
    } catch (\Exception $e) {
        return $e->getMessage();
    }
}
        public function view_product($id)
        {
            try {
               
            $data['view_prod'] = Products::where('id','=',$id)
                            ->first();
            $data['img']=ProductImages::where('product_id','=',$id)->get();
            $data['products']=Products::where('parent_id','=',$id)->get();
     
            return view('product.view-product',$data);
                 
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

        public function add_image($id)
        {
            try {
               
            $data['view_prod'] = Products::where('id','=',$id)
                            ->first();
            $pro=Products::where('id','=',$id)
                            ->first();
            $data['img']=ProductImages::where('product_id','=',$pro->product_id)->get();
            return view('product.add-image',$data);
                 
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function add_color($id)
        {
            try {
               
            $data['view_prod'] = Products::where('id','=',$id)
                            ->first();
            $data['products']=Products::where('parent_id','=',$id)->get();
            $data['attribute']=AttributesValue::where('attribute_id',2)->get();
            return view('product.add-color',$data);
                 
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function add_size($id)
        {
            try {
               
            $data['view_prod'] = Products::where('id','=',$id)
                            ->first();
            $data['products']=ProductsAttributes::where('pro_id','=',$id)->get();
            $data['attribute']=AttributesValue::where('attribute_id',1)->get();
            return view('product.add-size',$data);
                 
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }

        
        public function delete_product_image($id)
        {
            try {
                DB::table('product_images')->where('image_id','=',$id)->delete();       
            // $img=ProductImages::where('image_id',$id)->first();
            // $img->delete();
            return back();
                 
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        public function add_new_image(Request $request)
        {
        //   return $request->all();
        $data = request()->validate([
            'product_code' => 'required',
            'image' => 'required'
        ]);
            try {


$productid = $request->input('product_code');

if($request->file('image')){
$photo = $request->file('image'); 

$storyimagename = time().'.'.$photo->getClientOriginalExtension();
$destinationPath = 'uploads/product/thumb_images';
$thumb_img = Image::make($photo->getRealPath())->resize(293,293);
$thumb_img->save($destinationPath.'/'.$storyimagename,80);

$destinationPath2 = 'uploads/product/single-product';
$thumb_img2 = Image::make($photo->getRealPath())->resize(293,293);
$thumb_img2->save($destinationPath2.'/'.$storyimagename,80);

$destinationPath3 = 'uploads/product/single-product/small';
$thumb_img3 = Image::make($photo->getRealPath())->resize(100,100);
$thumb_img3->save($destinationPath3.'/'.$storyimagename,80);


ProductImages::insertGetId([

'product_id' => $productid,
'images' => $storyimagename,
'created_at' =>\Carbon\Carbon::now()
]);

}
if($request->file('image1')){
$randomId       =   rand(2,499);
$photoadd = $request->file('image1'); 
$storyimageaddimag = time().$randomId.'.'.$photoadd->getClientOriginalExtension();

$destinationPath1 = 'uploads/product/thumb_images';
$thumb_img1 = Image::make($photoadd->getRealPath())->resize(293,293);
$thumb_img1->save($destinationPath1.'/'.$storyimageaddimag,80);

$destinationPath21 = 'uploads/product/single-product';
$thumb_img21 = Image::make($photoadd->getRealPath())->resize(293,293);
$thumb_img21->save($destinationPath21.'/'.$storyimageaddimag,80);

$destinationPath31 = 'uploads/product/single-product/small';
$thumb_img31 = Image::make($photoadd->getRealPath())->resize(100,100);
$thumb_img31->save($destinationPath31.'/'.$storyimageaddimag,80);

ProductImages::insertGetId([

'product_id' => $productid,
'images' => $storyimageaddimag,
'created_at' =>\Carbon\Carbon::now()
]);
}


if($request->file('image2')){
 $random       =   rand(499,999);
$photoimg2 = $request->file('image2'); 
$storyimagename201 = time().$random.'.'.$photoimg2->getClientOriginalExtension();

$destinationPath201 = 'uploads/product/thumb_images';
$thumb_img201 = Image::make($photoimg2->getRealPath())->resize(293,293);
$thumb_img201->save($destinationPath201.'/'.$storyimagename201,80);

$destinationPath22 = 'uploads/product/single-product';
$thumb_img22 = Image::make($photoimg2->getRealPath())->resize(293,293);
$thumb_img22->save($destinationPath22.'/'.$storyimagename201,80);

$destinationPath32 = 'uploads/product/single-product/small';
$thumb_img32 = Image::make($photoimg2->getRealPath())->resize(100,100);
$thumb_img32->save($destinationPath32.'/'.$storyimagename201,80);

ProductImages::insertGetId([

'product_id' => $productid,
'images' => $storyimagename201,
'created_at' =>\Carbon\Carbon::now()
]);
}

if($request->file('image3')){
$rand       =   rand(1001,1500);
$photo3 = $request->file('image3'); 
$storyimagename3 = time().$rand.'.'.$photo3->getClientOriginalExtension();

$destinationPath3 = 'uploads/product/thumb_images';
$thumb_img3 = Image::make($photo3->getRealPath())->resize(293,293);
$thumb_img3->save($destinationPath3.'/'.$storyimagename3,80);

$destinationPath23 = 'uploads/product/single-product';
$thumb_img23 = Image::make($photo3->getRealPath())->resize(293,293);
$thumb_img23->save($destinationPath23.'/'.$storyimagename3,80);

$destinationPath33 = 'uploads/product/single-product/small';
$thumb_img33 = Image::make($photo3->getRealPath())->resize(100,100);
$thumb_img33->save($destinationPath33.'/'.$storyimagename3,80);

ProductImages::insertGetId([

'product_id' => $productid,
'images' => $storyimagename3,
'created_at' =>\Carbon\Carbon::now()
]);
}

if($request->file('image4')){
$ra       =   rand(1500,1999);
$photo4 = $request->file('image4'); 
$storyimagename4 = time().$ra.'.'.$photo4->getClientOriginalExtension();

$destinationPath4 = 'uploads/product/thumb_images';
$thumb_img4 = Image::make($photo4->getRealPath())->resize(293,293);
$thumb_img4->save($destinationPath4.'/'.$storyimagename4,80);

$destinationPath24 = 'uploads/product/single-product';
$thumb_img24 = Image::make($photo4->getRealPath())->resize(293,293);
$thumb_img24->save($destinationPath24.'/'.$storyimagename4,80);

$destinationPath34 = 'uploads/product/single-product/small';
$thumb_img34 = Image::make($photo4->getRealPath())->resize(100,100);
$thumb_img34->save($destinationPath34.'/'.$storyimagename4,80);

ProductImages::insertGetId([

'product_id' => $productid,
'images' => $storyimagename4,
'created_at' =>\Carbon\Carbon::now()
]);
}

return back();


        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
        
        public function add_new_size_product(Request $request)
        {
            $data = request()->validate([
                'product_id' => 'required|numeric|min:0|not_in:0',
                'product_code' => 'required',
                'size_id'=>'required|numeric',
                'product_qty' => 'required|numeric|min:0',
                'product_offer' => 'required|numeric|min:0',
                'product_price' => 'required|numeric|min:0',
                'product_premium_offer' => 'required|numeric|min:0',
            ]);
            try {
            $product = Products::find($request->input('product_id'));
            $attributevalue = AttributesValue::where('attribute_value_id',$request->input('size_id'))->first();
            $ProductsAttributes=new ProductsAttributes;
            $ProductsAttributes->pro_id=$request->input('product_id');
            $ProductsAttributes->product_id=$request->input('product_code');
            $ProductsAttributes->attrbute_type=1;
            $ProductsAttributes->attribute_id=$request->input('size_id');
            $ProductsAttributes->attribute_value=$attributevalue->attribute_value;
            $ProductsAttributes->product_price=$request->input('product_price');
            $ProductsAttributes->product_price_offer=$request->input('product_offer');
            $ProductsAttributes->product_premium_offer=$request->input('product_premium_offer');
            $ProductsAttributes->available_qty=$request->input('product_qty');
            $ProductsAttributes->save();

            return back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }
   public function add_new_color_product(Request $request)
        {
          
            // return $request->all();
            $data = request()->validate([
                'product_id' => 'required|numeric|min:0|not_in:0',
                'color_name' => 'required',
                'product_name'=>'required',
                'image' => 'required',
                'product_desc'=> 'required',
                'product_offer' => 'required|numeric|min:0',
                'product_price' => 'required|numeric|min:0',
                'product_premium_offer' => 'required|numeric|min:0',
            ]);
    
            try {


$product = Products::find($request->input('product_id'));
    
$attributevalue = AttributesValue::where('attribute_value_id',$request->input('color_name'))->first();;

$proname=$product->product_name.$attributevalue->attribute_value;
    $prod_slug = preg_replace('~[^\pL\d]+~u', '-',$proname);  
    
    $prod_slug = iconv('utf-8', 'us-ascii//TRANSLIT', $prod_slug);  
    $prod_slug = preg_replace('~[^-\w]+~', '', $prod_slug);
    $prod_slug = trim($prod_slug, '-');  
    $prod_slug = preg_replace('~-+~', '-', $prod_slug);  
    $prod_slug = strtolower($prod_slug);

    $product_price = $request->input('product_price');
    $product_offer = $request->input('product_offer');
    $product_premium_offer = $request->input('product_premium_offer');
    $product_name =$request->input('product_name');

$category_name = $product->category_id;
$product_name = $product->product_name;
$product_brand = $product->product_brand;
$sub_category_id=$product->sub_category_id;
$group_category_id=$product->group_category_id;

$photo = $request->file('image'); 
$storyimagename = time().'.'.$photo->getClientOriginalExtension();
$destinationPath = 'uploads/product/thumb_images';
$thumb_img = Image::make($photo->getRealPath())->resize(293,293);
$thumb_img->save($destinationPath.'/'.$storyimagename,80);


$destinationPath2 = 'uploads/product/single-product';
$thumb_img2 = Image::make($photo->getRealPath())->resize(293,293);
$thumb_img2->save($destinationPath2.'/'.$storyimagename,80);


$destinationPath3 = 'uploads/product/single-product/small';
$thumb_img3 = Image::make($photo->getRealPath())->resize(100,100);
$thumb_img3->save($destinationPath3.'/'.$storyimagename,80);

$product_desc = $request->input('product_desc');  
$pro_status = $request->input('pro_status');



$id = Products::insertGetId([

'category_id' => $category_name,
'sub_category_id' => $sub_category_id,
'group_category_id' => $group_category_id,
'product_image' => $storyimagename,
'product_name' =>$product_name,
'product_slug' => $prod_slug,
'product_price' => $product_price,
'product_desc' => $product_desc,
'product_qty' => $request->input('product_qty'),   
'product_price_offer' => $product_offer,
'product_premium_offer'=>$product_premium_offer,
'status' => $pro_status,
'parent_id'=> $product->id,
'parent_product_id'=> $product->product_id,
'color_id'=>$attributevalue->attribute_value_id,
'color_code'=>$attributevalue->attribute_color_code,
'created_at' =>\Carbon\Carbon::now()
]);
$productid='PRDCTF'.$id;


Products::where('id','=',$id)->update([

'product_id'=>$productid,

]);
Products::where('id','=',$request->input('product_id'))->update([

    'if_attribute'=>1,
    
    ]);

ProductImages::insertGetId([

'product_id' => $productid,
'images' => $storyimagename,
'created_at' =>\Carbon\Carbon::now()
]);
if($request->file('image1')){
$randomId       =   rand(2,499);
$photoadd = $request->file('image1'); 
$storyimageaddimag = time().$randomId.'.'.$photoadd->getClientOriginalExtension();

$destinationPath1 = 'uploads/product/thumb_images';
$thumb_img1 = Image::make($photoadd->getRealPath())->resize(293,293);
$thumb_img1->save($destinationPath1.'/'.$storyimageaddimag,80);

$destinationPath21 = 'uploads/product/single-product';
$thumb_img21 = Image::make($photoadd->getRealPath())->resize(293,293);
$thumb_img21->save($destinationPath21.'/'.$storyimageaddimag,80);

$destinationPath31 = 'uploads/product/single-product/small';
$thumb_img31 = Image::make($photoadd->getRealPath())->resize(100,100);
$thumb_img31->save($destinationPath31.'/'.$storyimageaddimag,80);

ProductImages::insertGetId([

'product_id' => $productid,
'images' => $storyimageaddimag,
'created_at' =>\Carbon\Carbon::now()
]);
}


if($request->file('image2')){
 $random       =   rand(499,999);
$photoimg2 = $request->file('image2'); 
$storyimagename201 = time().$random.'.'.$photoimg2->getClientOriginalExtension();

$destinationPath201 = 'uploads/product/thumb_images';
$thumb_img201 = Image::make($photoimg2->getRealPath())->resize(293,293);
$thumb_img201->save($destinationPath201.'/'.$storyimagename201,80);

$destinationPath22 = 'uploads/product/single-product';
$thumb_img22 = Image::make($photoimg2->getRealPath())->resize(293,293);
$thumb_img22->save($destinationPath22.'/'.$storyimagename201,80);

$destinationPath32 = 'uploads/product/single-product/small';
$thumb_img32 = Image::make($photoimg2->getRealPath())->resize(100,100);
$thumb_img32->save($destinationPath32.'/'.$storyimagename201,80);

ProductImages::insertGetId([

'product_id' => $productid,
'images' => $storyimagename201,
'created_at' =>\Carbon\Carbon::now()
]);
}

if($request->file('image3')){
$rand       =   rand(1001,1500);
$photo3 = $request->file('image3'); 
$storyimagename3 = time().$rand.'.'.$photo3->getClientOriginalExtension();

$destinationPath3 = 'uploads/product/thumb_images';
$thumb_img3 = Image::make($photo3->getRealPath())->resize(293,293);
$thumb_img3->save($destinationPath3.'/'.$storyimagename3,80);

$destinationPath23 = 'uploads/product/single-product';
$thumb_img23 = Image::make($photo3->getRealPath())->resize(293,293);
$thumb_img23->save($destinationPath23.'/'.$storyimagename3,80);

$destinationPath33 = 'uploads/product/single-product/small';
$thumb_img33 = Image::make($photo3->getRealPath())->resize(100,100);
$thumb_img33->save($destinationPath33.'/'.$storyimagename3,80);

ProductImages::insertGetId([

'product_id' => $productid,
'images' => $storyimagename3,
'created_at' =>\Carbon\Carbon::now()
]);
}

if($request->file('image4')){
$ra       =   rand(1500,1999);
$photo4 = $request->file('image4'); 
$storyimagename4 = time().$ra.'.'.$photo4->getClientOriginalExtension();

$destinationPath4 = 'uploads/product/thumb_images';
$thumb_img4 = Image::make($photo4->getRealPath())->resize(293,293);
$thumb_img4->save($destinationPath4.'/'.$storyimagename4,80);

$destinationPath24 = 'uploads/product/single-product';
$thumb_img24 = Image::make($photo4->getRealPath())->resize(293,293);
$thumb_img24->save($destinationPath24.'/'.$storyimagename4,80);

$destinationPath34 = 'uploads/product/single-product/small';
$thumb_img34 = Image::make($photo4->getRealPath())->resize(100,100);
$thumb_img34->save($destinationPath34.'/'.$storyimagename4,80);

ProductImages::insertGetId([

'product_id' => $productid,
'images' => $storyimagename4,
'created_at' =>\Carbon\Carbon::now()
]);
}




$request->session()->put('product_id', $productid);

return back();


        } catch (\Exception $e) {
            return $e->getMessage();
        }
        }




   public function product_active($id)
        {
               
                                    
            Products::where('id','=',$id)->update([
                    'status' => 1
                ]);
                return back();
        }
           public function product_deactive($id)
        {
               
                                    
            Products::where('id','=',$id)->update([
                    'status' => 0
                ]);
                return back();
        }


        public function set_product_featured($id, Request $request)
        {
               
                                    
            Products::where('id','=',$id)->update([
                    'featured' => 1
                ]);
                return back();
        }
        
        
        public function set_product_unfeatured($id, Request $request)
        {
               
                                    
            Products::where('id','=',$id)->update([
                    'featured' => 0
                ]);
                return back();
        }

        public function country_deactive($code,$id)
        {
               try{
                                    
                Products::where('id','=',$id)->update([
                $code => 0
                ]);
                return back();
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        public function country_active($code,$id)
        {
               try{
                                    
                Products::where('id','=',$id)->update([
                $code => 1
                ]);
                return back();
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        public function set_color_product($id)
        {
               try{
            $color=Products::where('id','=',$id)->first();
            if($color->color_id!=0)
            {
            $data['set_color']=AttributesValue::where('attribute_value_id',$color->color_id)->first();
            }
            else{
                $data['set_color']=null;
            }
                       
            $data['view_prod']=Products::where('id','=',$id)->first();
            $data['attribute']=AttributesValue::where('attribute_id',2)->get();
            return view('product.set-color',$data);
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        
        public function set_color_product_post(Request $request)
        {
            try{
                                    
                Products::where('id','=',$request->product_id)->update([
                    'color_id' => $request->color_name
                    ]);
                    return back();
                } catch (\Exception $e) {
                    return $e->getMessage();
                }
        }
        public function autocomplete(Request $request)
        {
            $data = Products::select("product_name as value", "product_id")
                        ->where('product_name', 'LIKE', '%'. $request->get('search'). '%')
                        ->get();
        
            return response()->json($data);
        }




      
    
}
