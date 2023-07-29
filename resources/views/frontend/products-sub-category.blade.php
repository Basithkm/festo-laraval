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
  <link rel="icon" type="image/x-icon" href="/front-end/images/itcityimages/favicon.png">
  <style>
    .hidden {
      display: none;
    }
  </style>

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

    <section >
        <button id="sidebar-toggle-cat">
            <i class="fas fa-sort-amount-down-alt"></i>Filtration</button>
  <div id="sidebar-cat">
    <ul>
      <div class="filter">
                
                    
                    <div class="product-cat-head d-flex ">
                        <h6>{{ __('main.Categories') }}</h6>
                        <span onclick="toggleDiv()"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    
                    
                    
                    <div id="myDiv"  >
                        <div class="product-list-category" >
                            <ul style="padding-left:0px;display: none" >
                            @foreach($group_category as $data)
                                <a href="{{url('group-category-products/'.$data->group_cat_slug)}}"><li>{{$data->group_name}}</li></a>
                                @endforeach
                            </ul>

                        </div>
                    </div>
       

     
      
          
    
                  
              
               


                </div>
    </ul>
  </div>
  
  
  
        <div class="row filter-main">
            <div class="col-md-3 filter-desktop">
                <div class="filter">
                 
                    
                    <div class="product-cat-head d-flex ">
                        <h6>{{ __('main.Categories') }}</h6>
                        <span onclick="toggleDivfive()"><i class="fas fa-chevron-down"></i></span>
                    </div>
               
                    <div id="myDivfive" class="hidden" >
                        <div class="product-list-category" >
                            <ul style="padding-left:0px;">
                            @foreach($group_category as $data)
                                <a href="{{url('group-category-products/'.$data->group_cat_slug)}}"><li>{{$data->group_name}}</li></a>
                              
                                @endforeach
                            </ul>

                        </div>
                    </div>
    
                  
            
     
                    


                </div>

            </div>
            <div class="col-md-9  ">

                <div class="row">
                @foreach($results as $data)
                    <div class="col-md-3 col-sm-6 col-6">
                        <div class='newdesign-product'>
                        <a href="{{url('product-view/'.$data->product_slug)}}">
                <img src="{{url('uploads/product/single-product/'.$data->product_image)}}">
                                <p style="">{{$data->product_name}}
                                </p>
                                <p class="price-offer" style="" class="  ">
                                {{number_format($data->product_price_offer, 3, '.', ',')}} </p>
                                <div class="font-body">
                                    <span class="product-price"
                                        style=""
                                        class=" ">{{number_format($data->product_price, 3, '.', ',')}} </span> <span class="offer-class"
                                        style="">{{number_format($data->product_percentage, 0, '.', ',')}}%</span>
                                </div>
                            </a>
                            <p class="newbtn ">{{number_format($data->product_premium_offer, 2, '.', ',')}}<span class="offer-class"style="">{{number_format($data->product__premium_percentage, 0, '.', ',')}}%</span></p>
                        
                        </div>
                    </div>
                    @endforeach
                    
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
         
            
            if (div.classList.contains("hidden")) 
            {
                div.classList.remove("hidden");
            } 
            else 
            {
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
        
        
        function toggleDivfive() {
            var div = document.getElementById("myDivfive");
            //   div.classList.add("hidden");
            if (div.classList.contains("hidden")) {
                div.classList.remove("hidden");
            } else {
                div.classList.add("hidden");
            }
        }
        
        function toggleDivsix() {
            var div = document.getElementById("myDivsix");
            if (div.classList.contains("hidden")) {
                div.classList.remove("hidden");
            } else {
                div.classList.add("hidden");
            }
        }
        
         function toggleDivseven() {
            var div = document.getElementById("myDivseven");
            if (div.classList.contains("hidden")) {
                div.classList.remove("hidden");
            } else {
                div.classList.add("hidden");
            }
        }
        
         function toggleDiveight() {
            var div = document.getElementById("myDiveight");
            if (div.classList.contains("hidden")) {
                div.classList.remove("hidden");
            } else {
                div.classList.add("hidden");
            }
        }
    </script>
    <script>
        document.getElementById('sidebar-toggle-cat').addEventListener('click', function() {
  var body = document.body;
  body.classList.toggle('sidebar-open');
});
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