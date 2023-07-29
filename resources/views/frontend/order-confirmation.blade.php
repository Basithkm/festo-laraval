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
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-HWHH8934S5');
</script>
</head>

<body>
<script src="{{url('front-end/js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript">
    

    
    </script>
     <script type="text/javascript">
                               function limit(element)
                                 {
                                  var max_chars = 10;
    
                                   if(element.value.length > max_chars) {
                                   element.value = element.value.substr(0, max_chars);
                                   }
                                 }
                             </script>
                             
                             <script language="javascript">
    
    function checkEmail() {
        var emaill = document.getElementById('email');
        var filter = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    
        if (!filter.test(emaill.value)) {
        document.getElementById("submit").disabled = true;
        
     }
    }
    </script>
@include('frontend/includes/header')

    <div class="container payment">
        <div style="justify-content: center;" class="row order-confirmation" >
            
            <img style="width:200px;" src="/front-end/images/itcityimages/order-confirmation.png"></img>
            <h1 style="text-align:center">Thank You For Placing Your Order With IT City </h1>
            <br>
            <h6 style="text-align:center;margin: 30px 0px 0px 0px;">ORDER ID:{{$order->order_number}} </h6>
             <h6 style="text-align:center;margin: 30px 0px 0px 0px;">ORDER AMOUNT:{{$order->currency}} {{$order->total_amnt}} </h6>
        </div>
        
 
    </div>
    @include('frontend/includes/footer')
</body>
<script src="{{url('front-end/js/bootstrap.min.js')}}"></script>
  <script src="{{url('front-end/js/scriptfont.js')}}"></script>
  <script src="{{url('front-end/js/jquery.min.js')}}"></script>

</html>