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

@include('frontend/includes/header')
<script src="{{url('front-end/js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript">

</script>
    <div class="container payment">
        <div class="row">
            <div class="col-md-12 empty-cart">
                <i class="fas fa-shopping-cart"></i>
                <h1>Cart Is Empty</h1>
                <p>Please log in / Sign up to add products to cart</p>
                <Button>LOGIN/SIGNUP</Button>
            </div>
       
      
        </div>
    </div>

@include('frontend/includes/footer')
</body>

  <script src="{{url('front-end/js/bootstrap.min.js')}}"></script>
  <script src="{{url('front-end/js/scriptfont.js')}}"></script>
  <script src="{{url('front-end/js/jquery.min.js')}}"></script>

</html>