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
<script src="{{url('front-end/js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function(){
    // $('#country').change(function(){
    //  var code=$(this).val();
    //  $('#countrycode').val(code);
    // });
    var cart_pro=[];
$('.addCart').click(function(){ 

var product_id=$(this).data("pro_id");
var qty='1';
var price=$(this).data("price");
     $.ajax({

               type:'get',
               url:'{{url('addcart')}}',
               data:({product_id:product_id,qty:qty,price:price}),
               success:function(data){

            

   $.ajax({

               type:'get',
               url:'{{url('addcart-count')}}',
               data:({}),
               success:function(data){
                $('#mcart').html(data);
                 $('#mcartweb').html(data);
                 }

    });

   } 

    });
    

});
  });
</script>
    <div class="container ">
        <div class="row">
        @foreach($cart as $cart)
        <?php 

$img=DB::table('products')->where('id','=',$cart->id)->get();

foreach ($img as $img) {
  
  $imgs=$img->product_image;
  $qty=$img->product_qty;
  $prices=$img->product_price;
  $offers=$img->product_price_offer;
   $pid=$img->product_id;

}


?>
<form action="{{url('update-cart')}}" method="post">
    {{csrf_field()}}
       <input type="hidden" name="rid" value="{{$cart->rowId}}">
    
    <input type="hidden" name="pid" value="{{$pid}}">

            <div class="col-md-6 view-cart " >
                <div class="cartpage">
                    <div class="cartpageimg">
                    <?php  if($cart->price!=$offers){ ?> 
                          <div class="parent" style="position:relative;">
                          <img src="{{url('front-side/images/cancelled.png')}}" alt="Product" style="width: 150px;">
                          <a>
                              <img src="{{url('uploads/product/single-product/'.$imgs)}}" alt="Product">
                          </a>
                          </div>
                          <?php }else{ ?>
                           <a>
                              <img src="{{url('uploads/product/single-product/'.$imgs)}}" alt="Product">
                          </a>
                          <?php } ?>

                        <!-- <img alt="itcity"
                            src="https://dashboard.itcityonlinestore.com/uploads/product/thumb_images/1631174140.jpg"
                            style="width: 150px;"> -->
                    </div>
                    <input type="hidden" name="rid" value="{{$cart->rowId}}">
    
    <input type="hidden" name="pid" value="{{$pid}}">
                    <div class="cartpagecontent text-start  px-3">
                    <?php  if($cart->price!=$offers){ $dis_offer = "1"; ?> 
                        <p class="product-name"><strike style="color:red;"><a href="#">{{$cart->name}} {{$cart->options->size}}</a></strike></p>
                        <span style="color:red;font-weight:1000">This item has been removed from offers recently.Please delete the product.</span>
                      <?php }else{ ?>
                        <h5 class="mt-2" style="font-weight: bold; font-size: 18px; margin-bottom: 0.5rem;">
                        {{$cart->name}} {{$cart->options->size}}</h5>
                          <h5>Qty: {{$cart->qty}}</h5>
                          
                

                        <?php } ?>
                        <div class="update-cart d-flex">
            
                          <input style="height:max-content;" class="form-control input-sm w-auto"   name="qty" type="number" value="{{$cart->qty}}"  min="1">
                         
              
                          
                          <!--background-color:#0f99de;-->
                          
                            <input type="submit"  style="background-color: #f5831a;color:#fff;" class="btn rd-stroke-btn border_1px dart-btn-xs mx-2 w-auto" value="{{ __('main.Update_Cart') }}">
                        </div>

                        <h5>Total Price:{{number_format(($cart->qty*$cart->price), 3, '.', ',')}}</h5>
                        <a href="{{url('remove-cart/'.$cart->rowId)}}" t class=" bg-dark border-0  btn btn-primary removecart">Remove</a>
                    </div>
                </div>

            </div>
                    </form>
            @endforeach  
            <div class="col-md-6  view-cart">
                <div class="table-responsive">
                    <table class="px-5 cartpagetable table">
                        <tbody>
                            <tr>
                                <td class=" text-start py-2">{{ __('main.Sub_total') }}</td>
                                <td class=" text-end py-2">{{Cart::subtotal()}}</td>
                            </tr>
                            <tr>
                                <td class=" text-start py-2">{{ __('main.Est_total') }}</td>
                                <td class=" text-end py-2">{{Cart::subtotal()}} </td>
                            </tr>
                            <tr>
                                
                            </tr>
                        </tbody>
                        
                    </table>
                    <div class="py-4">
                        <a href="Payment.html">
                            <a href="{{url('checkout')}}"
                                style="background: rgb(245, 131, 26);"
                                class="border-0 btn btn-primary proceed-to-buy">{{ __('main.Proceed_To_Buy') }}</a> 
                            </a>
                      </div>
                </div>
            </div>
        </div>
    </div>

@include('frontend/includes/footer')
</body>

<script src="{{url('front-end/js/bootstrap.min.js')}}"></script>
  <script src="{{url('front-end/js/scriptfont.js')}}"></script>
  <script src="{{url('front-end/js/jquery.min.js')}}"></script>
</html>