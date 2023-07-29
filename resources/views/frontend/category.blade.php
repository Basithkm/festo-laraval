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
    <link rel="stylesheet" href="{{url('front-end/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{url('front-end/css/owl.theme.default.min.css')}}">
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

@include('frontend/includes/header')

    <section>
       <div class="mb-5 footerclass container">
           <h3 class="text-center">{{ __('main.Categories') }}</h3><div class="category-main  ">
               <div class="categoriesfooter flex-wrap justify-content-center;">
                    <a href="{{url('category-products/accessories')}}">  
                   <div class="dd ">
           <img src="{{URL::to('/')}}/front-end/images/itcityimages/app_image/accessories.png" alt="itcity">
           <p class="fw-bold">{{ __('main.Accessories') }}</p></div></a>
             <a href="{{url('category-products/computers')}}"> 
           <div class="dd"><img 
           src="{{URL::to('/')}}/front-end/images/itcityimages/app_image/computers.png" alt="itcity"><p class="fw-bold">{{ __('main.Computers') }}</p></div></a>
            <a href="{{url('category-products/mobiles')}}"> 
           <div class="dd">
               <img src="{{URL::to('/')}}/front-end/images/itcityimages/app_image/mobile.png" alt="itcity"><p class="fw-bold">{{ __('main.Mobiles') }}</p></div></a>
                 <a href="{{url('category-products/tablets')}}"> 
               <div class="dd">
                   <img src="{{URL::to('/')}}/front-end/images/itcityimages/app_image/tabe.png" alt="itcity"><p class="fw-bold">{{ __('main.Tablets') }}</p></div></a>
                     <a href="{{url('category-products/home-appliances')}}"> 
                   <div class="dd">
                       <img src="{{URL::to('/')}}/front-end/images/itcityimages/app_image/home.png" alt="itcity"><p class="fw-bold">{{ __('main.Home_Appliances') }}</p> </div></a>
                       
                            <a href="{{url('category-products/watches-perfume')}}"> 
                       <div class="dd">
                       <img src="{{URL::to('/')}}/front-end/images/itcityimages/app_image/watch.png" alt="itcity"><p class="fw-bold">{{ __('main.Watches') }} &amp; {{ __('main.Perfumes') }}</p> </div></a>
                           <a href="{{url('category-products/travel-bags')}}"> 
                       <div class="dd">
                           <img src="{{URL::to('/')}}/front-end/images/itcityimages/app_image/travel.png" alt="itcity"><p class="fw-bold">{{ __('main.Travel_Bags') }}</p> </div></a>
                               <a href="{{url('category-products/personal-care')}}"> 
                           <div class="dd">
                               <img src="{{URL::to('/')}}/front-end/images/itcityimages/app_image/personal.png" alt="itcity"><p class="fw-bold">{{ __('main.Personal_Care') }}</p> </div></a>
                                  <a href="{{url('category-products/cameras-drones')}}"> 
                               <div class="dd">
                                   <img src="{{URL::to('/')}}/front-end/images/itcityimages/app_image/camera.png" alt="itcity"><p class="fw-bold">{{ __('main.Cameras') }} &amp; {{ __('main.Drones') }}</p> </div></a>
                                      <a href="{{url('category-products/gaming')}}"> 
                                   <div class="dd">
                                       <img src="{{URL::to('/')}}/front-end/images/itcityimages/app_image/offer.png" alt="itcity"><p class="fw-bold">{{ __('main.Gaming') }}</p></div></a>
                                       </div></div></div>
    </section>
    <div class="paginationclass">
           
    </div>
    @include('frontend/includes/footer')
    <!-- for filtration -->
    <script>
        function toggleDiv() {
            var div = document.getElementById("myDiv");
            if (div.classList.contains("hidden")) {
                div.classList.remove("hidden");
            } else {
                div.classList.add("hidden");
            }
        }
        function toggleDivtwo() {
            var div = document.getElementById("myDivtwo");
            if (div.classList.contains("hidden")) {
                div.classList.remove("hidden");
            } else {
                div.classList.add("hidden");
            }
        }
        function toggleDivthree() {
            var div = document.getElementById("myDivthree");
            if (div.classList.contains("hidden")) {
                div.classList.remove("hidden");
            } else {
                div.classList.add("hidden");
            }
        }
        function toggleDivfour() {
            var div = document.getElementById("myDivfour");
            if (div.classList.contains("hidden")) {
                div.classList.remove("hidden");
            } else {
                div.classList.add("hidden");
            }
        }
    </script>
  <script src="{{url('front-end/js/bootstrap.min.js')}}"></script>
  <script src="{{url('front-end/js/scriptfont.js')}}"></script>
  <script src="{{url('front-end/js/jquery.min.js')}}"></script>
  <script src="{{url('front-end/js/owl.carousel.min.js')}}"></script>

</body>

</html>