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
       
              
               <h1 style="padding-left:0">Return Policy</h1>
           
                    <ol style="text-align: initial;">
                        <li>Returns are acceptable within 24 hours from the date of purchase ,if it is physically damage with free of cost</li>
                         <li>Please save all packaging and accessories for any item that is returned. All original equipment, components, manuals, cables, documents and packaging must be returned with your item in order to process your return order</li>
                          <li>Part must be undamaged and completely serviceable</li>
                           <li>The customer is responsible for packaging and return shipping cost</li>
                            <li>If you don't like unopend product and you would like to return it within 2 day's, we will charge 2kd for pickup</li>
                             <li>Don't hesitate to contact us for any clarification about our online store : Our customer care :90019287 (10am-10pm)</li>
                    
                    </ol>
                

    



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