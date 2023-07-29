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
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HWHH8934S5"></script>
    <style>


.scract-container {
  position: relative;
  width: 38px;
  height: 300px;
  margin: 0 auto;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none; 
  -o-user-select: none;
  user-select: none;
  border:2px solid #f5f5f5;
  box-shadow:inset 0 0 10px #000000;
}

.canvas {
  position: absolute;
  top: 0;
}
h2,h1{
	text-align: center;
}
.scract-form {
  padding: 20px;
}
img{
	width: 150px;
}
</style>
</head>

<body>
<script src="{{url('front-end/js/jquery-3.3.1.js')}}"></script>
<script>
  $(function(){ // this will be called when the DOM is ready
  $('#conf_pass').keyup(function(){
    var conf_pass=$(this).val();

var new_pass=$('#new_pass').val();

if(conf_pass==new_pass){
 $("#myBtn").removeAttr("disabled");
$("#conf_msg").css("display", "");
  $("#conf_msg").css("color", "green");
  $('#conf_msg').html('Password matched!.');
}else{

$("#conf_msg").css("display", "");
  $("#conf_msg").css("color", "red");
  $('#conf_msg').html('Password not matched!.');
 $("#myBtn").attr("disabled", "disabled");
}
  });
});
</script>
<script>
$(document).ready(function(){
    $('input:checkbox').click(function() {
        $('input:checkbox').not(this).prop('checked', false);
         $("#pass_show").hide();
    });
});
</script>

<script type="text/javascript">
function valueChanged()
{
    if($('#defaultCheck2').is(":checked"))   
        $("#pass_show").show();
    else
        $("#pass_show").hide();
}
</script>
@include('frontend/includes/header')
  <form action="{{url('shop-complete')}}" method="post" id="theform" class="text-start">
    {{csrf_field()}}
    <div class="   row  payment-payment">
        <div class="text-start px-4 col-lg-4 col-md-12 col-sm-12 col-12">
            <h4 class="fw-bold mb-4">Shipping Address</h4>
           



    
      @if(session('username'))
      @if($users)
      <span style="color:red;">NOTE: Please Complete/update Your Shipping Address</span>
       <div class="mb-3  required form-floating"><input name="c_name" placeholder="Customer Name"
                        type="text" id="customer_name" class="form-control" value="{{$users->customer_name}}"><label for="floatingInput">Customer
                        Name</label></div>


                <div class="mb-3  required form-floating"><input placeholder="Mobile number"
                        type="number" name="c_mobile" id="mobile" value="{{$users->customer_mobile}}"  class="form-control"><label for="floatingInput">Mobile
                        number</label><span id="errmsg" style="color:red;">
</span></div>
                <div class="mb-3  required form-floating">
                <textarea class="form-control"  required="" name="district">{{$users->customer_dist}}</textarea>
                 <label for="floatingInput">Address(Street/ Avenue Number)</label></div>
                 
                      <div class="mb-3  required form-floating">
                <textarea class="form-control"  required="" name="state">{{$users->customer_state}}</textarea>
                 <label for="floatingInput">Place / Area</label></div>
                 
                 <div class="mb-3  required form-floating"><input name="secountry" placeholder="Country"
                        type="text" id="customer_name" class="form-control" value="" readonly><label for="floatingInput">Country</label></div>
                       
                        <div class="mb-3  required form-floating">
                        <textarea class="form-control"   name="remarks">{{$users->remarks}}</textarea>     
                        <label for="floatingInput"> Remarks (optional)</label></div>
      @endif
      @else
      
             <div class="mb-3  required form-floating"><input name="c_name" placeholder="Customer Name"
                        type="text" id="customer_name" required class="form-control" ><label for="floatingInput">Customer
                        Name</label></div>
                        
                        <div class="mb-3  required form-floating"><input name="c_email" placeholder="name@example.com"
                        type="email" id="customer_email" required="" class="form-control"><label for="floatingInput">Email
                        Address</label> <span style="color:red">{{session('emailexist')}}</span>
 <span id="emailmsg"></span><br></div>

                <div class="mb-3  required form-floating"><input placeholder="Mobile number"
                        type="number" name="c_mobile" required="" id="mobile"   class="form-control"><label for="floatingInput">Mobile
                        number</label><span id="errmsg" style="color:red;">
</span></div>
                <div class="mb-3  required form-floating">
                <textarea class="form-control"  required="" name="district"></textarea>
                 <label for="floatingInput">Address(Street/ Avenue Number)</label></div>
                 
                      <div class="mb-3  required form-floating">
                <textarea class="form-control"  required="" name="state"></textarea>
                 <label for="floatingInput">Place / Area</label></div>
                 
                 <div class="mb-3  required form-floating"><input name="secountry" placeholder="Country"
                        type="text" id="customer_name" class="form-control" value=""  required readonly><label for="floatingInput">Country</label></div>
                       
                        <div class="mb-3  required form-floating">
                        <textarea class="form-control"   name="remarks"></textarea>     
                        <label for="floatingInput"> Remarks (optional)</label></div>
      @endif

            
        </div>
        <div class="text-start px-4 col-lg-3 col-md-12 col-sm-12 col-12 mb-4">
            <h4 class="fw-bold mb-4">Payment Method</h4>
            <form class="text-start border border p-3">
            <div class="form-check"><input type="radio" name="payment" checked="" value="cod" required class="payment-radio"> <label class="payment-text">Cash on Delivery</label></div>
            <div class="form-check"><input type="radio" name="payment" value="knet" class="payment-radio" disabled> <label class="payment-text">KNET,or credit card </label><br><lable>right at your doorstep!</lable></div>

            @if(!session('username'))
                <h4 class="fw-bold my-3">Checkout Options</h4>
                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="guest" checked id="defaultCheck1" name="mod">
                                <label class="form-check-label" for="defaultCheck1" >
                                  Guest Checkout
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="account" id="defaultCheck2" onchange="valueChanged()" name="mod">
                                <label class="form-check-label" for="defaultCheck2">
                                  Create an account for later use
                                </label>
                              </div>
                              <div class="col-md-12 form-group" style="display: none;" id="pass_show">
                                 <label>Password</label>
                           <input class="form-control" id="new_pass" type="password"  name="password" value="">
                              <label>Confirm Password</label>
                           <input class="form-control" id="conf_pass" type="password"  name="confirm_password" value="">
                            <span id="conf_msg"></span>
                           </div>
                           @endif

                           <input  type="text"  name="scrach-card" value="{{$scrach->id}}">

                           <a href="{{url('/')}}" style="background: rgb(245, 131, 26); border-color: rgb(245, 131, 26);"
                        class="border-0 me-2 mt-2  btn btn-primary">Continue Shopping</a></a><button type="submit"
                    class="border-0 bg-dark me-2 mt-2  btn btn-primary">Complete Shopping</button>
          
        </div>

          </form>

          <div class="scract-container" id="js-container">
  <canvas class="canvas" id="js-canvas" width="300" height="300"></canvas>
  <div class="scract-form" style="visibility: hidden;">
    <h2>Hurray you won</h2>
	<h1 ><code>{{$scrach->name}}</code></h1>
	<img src="{{url('uploads/scrach/'.$scrach->image)}}" alt="">
    </div>
</div>  

          </div>
        <div class="text-start px-4 col-lg-5 col-md-12 col-sm-12 col-12">
            <h4 class="fw-bold mb-4">Order Summary</h4>
            <p>({{Cart::content()->groupBy('id')->count()}}) Items in Cart</p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $cart)
<?php
  
$img=DB::table('products')->where('id','=',$cart->id)->get();

foreach ($img as $img) {
  
  $imgs=$img->product_image;
  $qty=$img->product_qty;
  $prices=$img->product_price;
  $offers=$img->product_price_offer;
?>
                        <tr>
                            <td>  <img src="{{url('uploads/product/thumb_images/'.$imgs)}}" style="width: 50px;" alt="">
                            </td>
                            <td>{{$cart->name}} {{$cart->options->size}}
</td>
                            <td> @if($cart->qty>$qty) 
                                  <?php  echo "
                                              <script type=\"text/javascript\">
                                              var prop = document.getElementById('#myBtn').disabled = true;
                                             
                                                 if (prop.value=='complete shopping') prop.value = 'Open Curtain';
                                            
                                              </script>
                                          ";
                                     

                                  ?>
  <p style="color:red; font-size:12px;">Limit Exceeded:Maximum available quantity is {{$qty}}.<br>
  <a href="{{url('my-cart')}}" style="color:blue;"> Update Now</a></p>
 @else
 <p>x{{$cart->qty}}</p>
 @endif</td>
                            <td>{{number_format(($cart->price*$cart->qty), 3, '.', ',')}}</td>
                        </tr>
                        <?php  } ?>
                        @endforeach
                    </tbody>
                </table>
                <div class="total-price-new">
    



<?php $a=0 ?>


  <?php  $b = str_replace( ',', '', Cart::subtotal() ); ?>
<p>Total Price: <span><b>{{ number_format($b+$a, 2, '.', ',') }}</b>   </span></p> 

<?php  


?>


</div>
            </div>
          
        </div>
    </div>
</form>
    <!--<a href="Mylogin.html">login</a>-->
    @include('frontend/includes/footer')
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script>
(function() {
  
  'use strict';
  
  var isDrawing, lastPoint;
  var container    = document.getElementById('js-container'),
      canvas       = document.getElementById('js-canvas'),
      canvasWidth  = canvas.width,
      canvasHeight = canvas.height,
      ctx          = canvas.getContext('2d'),
      image        = new Image(),
      brush        = new Image();
      
  // base64 Workaround because Same-Origin-Policy
  image.src = 'https://png.pngtree.com/thumb_back/fw800/background/20191009/pngtree-wavy-black-white-line-background-image_318760.jpg';
  image.onload = function() {
    ctx.drawImage(image, 0, 0);
    // Show the form when Image is loaded.
    document.querySelectorAll('.scract-form')[0].style.visibility = 'visible';
  };
  brush.src = 'https://www.nicesnippets.com/image/scarchimagetrans.png';
  
  canvas.addEventListener('mousedown', handleMouseDown, false);
  canvas.addEventListener('touchstart', handleMouseDown, false);
  canvas.addEventListener('mousemove', handleMouseMove, false);
  canvas.addEventListener('touchmove', handleMouseMove, false);
  canvas.addEventListener('mouseup', handleMouseUp, false);
  canvas.addEventListener('touchend', handleMouseUp, false);
  
  function distanceBetween(point1, point2) {
    return Math.sqrt(Math.pow(point2.x - point1.x, 2) + Math.pow(point2.y - point1.y, 2));
  }
  
  function angleBetween(point1, point2) {
    return Math.atan2( point2.x - point1.x, point2.y - point1.y );
  }
  
  // Only test every `stride` pixel. `stride`x faster,
  // but might lead to inaccuracy
  function getFilledInPixels(stride) {
    if (!stride || stride < 1) { stride = 1; }
    
    var pixels   = ctx.getImageData(0, 0, canvasWidth, canvasHeight),
        pdata    = pixels.data,
        l        = pdata.length,
        total    = (l / stride),
        count    = 0;
    
    // Iterate over all pixels
    for(var i = count = 0; i < l; i += stride) {
      if (parseInt(pdata[i]) === 0) {
        count++;
      }
    }
    
    return Math.round((count / total) * 100);
  }
  
  function getMouse(e, canvas) {
    var offsetX = 0, offsetY = 0, mx, my;

    if (canvas.offsetParent !== undefined) {
      do {
        offsetX += canvas.offsetLeft;
        offsetY += canvas.offsetTop;
      } while ((canvas = canvas.offsetParent));
    }

    mx = (e.pageX || e.touches[0].clientX) - offsetX;
    my = (e.pageY || e.touches[0].clientY) - offsetY;

    return {x: mx, y: my};
  }
  
  function handlePercentage(filledInPixels) {
    filledInPixels = filledInPixels || 0;
    console.log(filledInPixels + '%');
    if (filledInPixels > 50) {
      canvas.parentNode.removeChild(canvas);
    }
  }
  
  function handleMouseDown(e) {
    isDrawing = true;
    lastPoint = getMouse(e, canvas);
  }

  function handleMouseMove(e) {
    if (!isDrawing) { return; }
    
    e.preventDefault();

    var currentPoint = getMouse(e, canvas),
        dist = distanceBetween(lastPoint, currentPoint),
        angle = angleBetween(lastPoint, currentPoint),
        x, y;
    
    for (var i = 0; i < dist; i++) {
      x = lastPoint.x + (Math.sin(angle) * i) - 25;
      y = lastPoint.y + (Math.cos(angle) * i) - 25;
      ctx.globalCompositeOperation = 'destination-out';
      ctx.drawImage(brush, x, y);
    }
    
    lastPoint = currentPoint;
    handlePercentage(getFilledInPixels(32));
  }

  function handleMouseUp(e) {
    isDrawing = false;
  }
  
})();
</script>
<script src="{{url('front-end/js/bootstrap.min.js')}}"></script>
  <script src="{{url('front-end/js/scriptfont.js')}}"></script>
  <script src="{{url('front-end/js/jquery.min.js')}}"></script>
</html>