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

<section class="delivery-main">
        <div class="container">
        <div class="row">
           
            <div class="col-md-12 text-center delivery">
       
              
               <h1 style="padding-left:0">About Us</h1>
               <div class="row">
                   <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                        <img style="width:90%;" src="{{url('front-end/images/itcityimages/about.jpg')}}"> 
                   </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                        <p>Itcityonlinestore.com is a division of IT City International Kuwait ,which was a Technology leader last 12 years in Kuwait, IT City International has started a Computer retail outlet in farwaniya ,Kuwait 2004,and showrooms expanted in different areas in Kuwait ., after that they have started a wholesale division and importing computers and laptops ,storage devices, components and accessories and many more consumer products, on 2015 on wards move to the online business and started with social media promotions and online eCommerce platform in the name of itcityonlinestore.com.in Kuwait region, featuring Huge range of products across categories such as consumer electronics, IT products, mobile communication devices & accessories, Health and beauty , sports and fitness, jewellery , perfumes and many more etc…..!<br>

itcityonlinestore.com offers a convenient and safe online shopping experience with express delivery and online payment option to such as pay cash on delivery and knet on delivery , master card, visa, American express etc…and free returns.,<br>

itcityonlinestore.com is located in Farwaniya, utc complex, Ground floor Tel: +965 90019287</p>
                   </div>
               </div>
           
                    
                

    



            </div>
        </div>
        </div>
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