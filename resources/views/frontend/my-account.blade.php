<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT City online store</title>
    <link rel="stylesheet" href="{{url('front-end/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('front-end/css/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="icon" type="image/x-icon" href="/front-end/images/itcityimages/favicon.png">
      <script async src="https://www.googletagmanager.com/gtag/js?id=G-HWHH8934S5"></script>

</head>

<body>
@include('frontend/includes/header')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <ul class="nav flex-column nav-tabs" style="background-color:#f5831a;">
                    
                    
                    
                    <li class="nav-item nav-link-tab">
                        <a class="nav-link active" data-bs-toggle="tab" href="#tab1">Profile</a>
                    </li>
                    <li class="nav-item nav-link-tab">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab2">Edit Profile</a>
                    </li>
                    <li class="nav-item nav-link-tab">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab3">My Orders</a>
                    </li>
                    <!--<li class="nav-item nav-link-tab">-->
                    <!--    <a class="nav-link"  href="{{url('logout')}}">Logout</a>-->
                    <!--</li>-->
                </ul>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade myaccount show active px-4" id="tab1">
                       
                            <h1 style="padding-left:0">My Profile</h1>
                            <p>
                                <span>Name : </span> {{$user->customer_name}}
                            </p>
                            <hr>

                            <p>
                                <span>Mobile Number : {{$user->customer_mobile}}</span>
                            </p>
                            <hr>
                            <p>
                                <span>Email : </span> {{$user->customer_email}}
                            </p>
                            <hr>
                            <p>
                                <span>Place / Area :{{$user->customer_state}} </span>
                            </p>
                            <hr>
                            <p>
                                <span>Block number :{{$user->customer_address}} </span>
                            </p>
                            <hr>
                            <p>
                                <span>House / Building Number : {{$user->customer_pincode}}</span>
                            </p>
                            <hr>
                            <p>
                                <span>Street/ Avenue Number : {{$user->customer_dist}}</span>
                            </p>
                            <hr>
                        
                    </div>
                    <div class="tab-pane fade   myaccount px-4" id="tab2">
                        <h1>Edit Profile</h1>
                        <form action="{{url('update-profile')}}" method="post">

                        {{csrf_field()}}
                  
                            <div class="col-md-12 form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" value="{{$user->customer_name}}" pattern="^[^-\s][a-zA-Z0-9_\s-]+$" onkeydown="return myf(event)"><span id="error" style="color:red;display:none">Please Enter Only Alphabets...</span>
               
                            </div>
                            <h1>Shipping Details</h1>
                            <div class="col-md-6 form-group">
                                <label>Place / Area</label>
                                <input class="form-control" type="text" name="state" value="{{$user->customer_state}}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile number</label>
                                <input class="form-control" type="text" name="mobile" value="" id="mobile" value="{{$user->customer_mobile}}">&nbsp;<span
                                    id="errmsg" style="color:red;"></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Block number</label>
                                <input class="form-control" type="text" name="address" value="{{$user->customer_address}}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>House / Building Number</label>
                                <input class="form-control" type="text" name="pincode" value="{{$user->customer_pincode}}">
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Street/ Avenue Number</label>
                                <textarea class="form-control" type="text" name="district">{{$user->customer_dist}}</textarea>
                            </div>
                            <div class="col-md-12 form-group">

                                <button type="submit" id="submit" class="btn btn-dark mt-2 disabled"
                                    style="pointer-events: all; cursor: pointer;">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade  myaccount    px-4 " id="tab3">                      
                       
                            <h1 style="padding-left:0">My Order</h1>
                          
@if($history->isEmpty())

<p>You dont have any history.</p>

@else


@foreach($history as $historys)



<div class="checkout-basket">
<div class="head">
<div class="row">
<div class="col-md-6">
<p style="margin-top:0">Date: {{$historys->purchase_date}}</p>

</div>
<div class="col-md-6"><div class="price_total_payment"><span>Total Price: </span>{{$historys->product_sub_total}} KWD</div></div>
<?php $order = $historys->purchase_id;  ?>


<?php $order_st = DB::table('orders')->where('purchase_id','=',$order)->get(); 
foreach($order_st as $order_st) {
  $status = $order_st->order_status_id;  
}

$stat_name = DB::table('order_status')->where('order_status_id','=',$status)->get();

?>
@if($stat_name!="")
@foreach($stat_name as $stat_name)
    <span>
        <p style="color: #31a570;font-weight: 1000;">{{$stat_name->name}}</p>
    </span>
@endforeach
@endif




                                              
</div>  
                                        
</div>
<div class="content" style="display: block;">




<?php $product=json_decode($historys->products);
if($product!="") {
foreach ($product as $product) {


  $img=DB::table('products')->where('product_id','=',$product->id)->get();
  if(!$img->isEmpty())
  {}else{$img=DB::table('products')->where('id','=',$product->id)->get();}
 if(!$img->isEmpty()){
     
foreach ($img as $imgs) {
 $im=$imgs->product_image;
}
$img=$im;

 }else{

$img="null";

 }
     ?>

                                        <div class="basket-product">
                                            <div class="row">
                                               <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                    <div class="bask-prod-images">
                                                      @if($img!='null')
                                                   <img src="{{url('uploads/product/thumb_images/'.$img)}}">
                                                    @endif

                                                    </div>

                                                </div>
                                               
                                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6">
                                                    <div class="bask-prod-name">
                                                        <p>{{$product->name}} {{$product->options->size}}</p>
                                                    </div>
                                                </div>
                                    
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-4">
                                                    <div class="bask-prod-quantity">
                                                        <p>Qty:{{$product->qty}}</p>
                                                    </div>
                                                </div>
                                    
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                                                    <div class="bask-prod-price">
                                                        <p>KWD:{{$product->price}}</p>
                                                    </div>
                                                </div>
                                              
                                               
                                            </div>
                                        </div>
                                       
                                        
<?php }} ?>








</div>
</div>


@endforeach


@endif
                            <br>
                       
                    </div>
                    <div class="tab-pane fade myaccount  px-5 " id="tab4">                      
                            
                           
                            <p style="text-align:center;">Are you want to logout.</p>
                            
                             <div class="empty-cart">
                                 <button>LOGOUT</button>
                             </div>
                       
                    </div>
                </div>
                
                
                <div class="footer-mob">
        <div class="footerlink">
        
               <a class="nav-link"  href="{{url('return-policy')}}">Return Policy</a>
               <a class="nav-link" href="{{url('delivery-information')}}">Delivery Information</a>
               <a class="nav-link"  href="{{url('privacy-policy')}}">Privacy Polic</a>
               <a class="nav-link"  href="{{url('terms-conditions')}}">Terms&amp;Condition</a>
                 <a class="nav-link"  href="{{url('logout')}}">Log Out</a>
            
        </div>
    </div>
            </div>
        </div>
       
        </div>
       
 


    @include('frontend/includes/footer') 
    <script src="{{url('front-end/js/bootstrap.min.js')}}"></script>
  <script src="{{url('front-end/js/scriptfont.js')}}"></script>
  <script src="{{url('front-end/js/jquery.min.js')}}"></script>
</body>

</html>