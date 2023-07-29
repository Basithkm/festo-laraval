<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Myfezto</title>
    <link rel="stylesheet" href="{{url('front-end/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('front-end/css/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('front-end/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{url('front-end/css/owl.theme.default.min.css')}}">
   <link rel="icon" type="image/x-icon" href="/front-end/images/itcityimages/favicon.png">

</head>

<body>
<script src="{{url('front-end/js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function(){
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
@include('frontend/includes/header')

    <section>
        <div class="row">
           
            <div class="col-md-12">

                <div class="row">
                   @if(count($results))
                @foreach($results as $data)
                <div class="col-md-3 col-sm-6 col-6">
                        <div class='newdesign-product'>
                        <a href="{{url('product-view/'.$data->product_slug)}}">
                <img src="{{url('uploads/product/single-product/'.$data->product_image)}}">
                                <p style="">{{$data->product_name}}
                                </p>
                                <p class="price-offer" style="" class="  ">
                                {{number_format($data->product_price_offer, 2, '.', ',')}} </p>
                                <div class="font-body">
                                    <span class="product-price"
                                        style=""
                                        class=" ">{{number_format($data->product_price, 2, '.', ',')}} </span> <span class="offer-class"
                                        style="">{{number_format($data->product_percentage, 0, '.', ',')}}%</span>
                                </div>
                            </a>
                            <p class="newbtn ">{{number_format($data->product_premium_offer, 2, '.', ',')}}<span class="offer-class"style="">{{number_format($data->product__premium_percentage, 0, '.', ',')}}%</span></p>
                        
                        </div>
                    </div>
                    @endforeach
                    @endif
                    
                </div>

    



            </div>
        </div>
    </section>
    <div class="paginationclass">
                 {{ $results->links() }}
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
    
    <!--add to cart message -->
<script>
    function showPopup() {
      // Display the popup box
      document.getElementById("popup-box").style.display = "block";

      // Automatically close the popup after 3 seconds
      setTimeout(function() {
        hidePopup();
      }, 2000);
    }

    function hidePopup() {
      // Hide the popup box
      document.getElementById("popup-box").style.display = "none";
    }
</script>
  <script src="{{url('front-end/js/bootstrap.min.js')}}"></script>
  <script src="{{url('front-end/js/scriptfont.js')}}"></script>
  <script src="{{url('front-end/js/jquery.min.js')}}"></script>
  <script src="{{url('front-end/js/owl.carousel.min.js')}}"></script>

</body>

</html>