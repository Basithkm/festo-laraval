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
    <div id="productslider" class="owl-carousel owl-theme">
    @foreach($homeimage as $data)
      <div class="item">
        <div class="shopbycollection">
        <?php $pro_id = $data->url; 
  $pro=DB::table('products')->where('product_id',$pro_id)->first();
 $pro_id=$pro->product_slug;?>     
        <a href="{{url('product-view/'.$pro_id)}}">
          <img  src="{{url('uploads/home-slider/'.$data->img_name)}}" alt="">
        </a>
        </div>
      </div>
      @endforeach

    </div>
  </section>
  <section>
    <div class="container p-0 " >
      <div class="row">
        <div class="col-md-12">
          <div class="main-categories ">
            <div class="main-categories-sub">
            <a href="{{url('category-products/accessories')}}">  
              <img src="{{URL::to('/')}}/front-end/images/itcityimages/app_image/accessories.png" alt="">
             
              <p>{{ __('main.Accessories') }}</p> </a>
            </div>
            <div class="main-categories-sub">
            <a href="{{url('category-products/computers')}}">    
              <img src="{{URL::to('/')}}/front-end/images/itcityimages/app_image/computers.png" alt="">
              
              <p>{{ __('main.Computers') }}</p></a>
            </div>
            <div class="main-categories-sub">
            <a href="{{url('category-products/mobiles')}}"> 
              <img src="{{URL::to('/')}}/front-end/images/itcityimages/app_image/mobile.png" alt="">
           
              <p>{{ __('main.Mobiles') }}</p>   </a>
            </div>
            <div class="main-categories-sub">
            <a href="{{url('category-products/tablets')}}"> 
              <img src="{{URL::to('/')}}/front-end/images/itcityimages/app_image/tabe.png" alt="">
             
              <p>{{ __('main.Tablets') }}</p> </a>
            </div>
            <div class="main-categories-sub">
            <a href="{{url('category-products/home-appliances')}}"> 
              <img src="{{URL::to('/')}}/front-end/images/itcityimages/app_image/home.png" alt="">
              
              <p>{{ __('main.Home_Appliances') }}</p></a>
            </div>
            <div class="main-categories-sub">
            <a href="{{url('category-products/watches-perfume')}}"> 
              <img src="{{URL::to('/')}}/front-end/images/itcityimages/app_image/watch.png" alt="">
             
              <p>{{ __('main.Watches') }} & {{ __('main.Perfumes') }}</p> </a>
            </div>
            <div class="main-categories-sub">
            <a href="{{url('category-products/travel-bags')}}"> 
              <img src="{{URL::to('/')}}/front-end/images/itcityimages/app_image/travel.png" alt="">
             
              <p>{{ __('main.Travel_Bags') }}</p> </a>
            </div>
            <div class="main-categories-sub">
            <a href="{{url('category-products/personal-care')}}"> 
              <img src="{{URL::to('/')}}/front-end/images/itcityimages/app_image/personal.png" alt="">
             
              <p>{{ __('main.Personal_Care') }}</p> </a>
            </div>
            <div class="main-categories-sub">
            <a href="{{url('category-products/cameras-drones')}}"> 
              <img src="{{URL::to('/')}}/front-end/images/itcityimages/app_image/camera.png" alt="">
             
              <p>{{ __('main.Cameras') }} & {{ __('main.Drones') }}</p> </a>
            </div>
            <div class="main-categories-sub">
            <a href="{{url('category-products/gaming')}}"> 
              <img src="{{URL::to('/')}}/front-end/images/itcityimages/app_image/offer.png" alt="">
             
              <p>{{ __('main.Gaming') }}</p> </a>
            </div>
          


          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
  <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31316.25632760775!2d75.94560578946152!3d11.14818780081418!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba64ee2471144f5%3A0x8692de4117c315d!2sKondotty%2C%20Kerala%20673638!5e0!3m2!1sen!2sin!4v1689072973161!5m2!1sen!2sin" width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
    <div class="container-fluid">
      <div class="row home-sub-head" style="padding-top:0px;">
        <div class="col-6 text-start home-sub">
          <h1>
           Men
          </h1>
        </div>
        <div class="col-6 text-end">
          <div class="view-all">
          <a  href="{{url('category-products/mens-wear')}}"> View All</a>
          </div>
        </div>
      </div>
          <div class='bannerimage'>
            @if($men_web)
        <img src="{{url('uploads/ads/'.$men_web->image)}}" alt=""></img>
           @endif
      </div>
      <div class='content'>
        @if($men)
      @foreach($men as $data)
        <div class='newdesign'>
          <a href="{{url('product-view/'.$data->product_slug)}}">
          <img src="{{url('uploads/product/single-product/'.$data->product_image)}}">
          <p style="font-size:14px;margin-bottom:0.5rem;">{{$data->product_name}}
          </p>
          <p style="font-weight:600;font-size:18px;color: #f5831a;margin-bottom: 4px;" class="  ">{{number_format($data->product_price_offer, 2, '.', ',')}} </p>
          <div class="font-body"><span
              style="font-weight:600;font-size:14px;color: #000;margin-bottom: 4px;text-decoration: line-through;"
              class=" ">{{number_format($data->product_price, 2, '.', ',')}} </span> <span class="offer-class"
              style="">{{number_format($data->product_percentage, 0, '.', ',')}}%</span></div>
              <p class="newbtn ">{{number_format($data->product_premium_offer, 2, '.', ',')}}<span class="offer-class"style="">{{number_format($data->product__premium_percentage, 0, '.', ',')}}%</span></p>
</a>

             
        </div>
        @endforeach
        @endif

  
      </div>
    </div>
  </section>

<!-- women collections -->
<section>
    <div class="container-fluid">
      <div class="row home-sub-head" style="padding-top:0px;">
        <div class="col-6 text-start home-sub">
          <h1>
          Women
          </h1>
        </div>
        <div class="col-6 text-end">
          <div class="view-all">
          <a  href="{{url('category-products/womens-wear')}}"> View All</a>
          </div>
        </div>
      </div>
          <div class='bannerimage'>
            @if($women_web)
        <img src="{{url('uploads/ads/'.$women_web->image)}}" alt=""></img>
           @endif
      </div>
      <div class='content'>
        @if($women)
      @foreach($women as $data)
        <div class='newdesign'>
          <a href="{{url('product-view/'.$data->product_slug)}}">
          <img src="{{url('uploads/product/single-product/'.$data->product_image)}}">
          <p style="font-size:14px;margin-bottom:0.5rem;">{{$data->product_name}}
          </p>
          <p style="font-weight:600;font-size:18px;color: #f5831a;margin-bottom: 4px;" class="  ">{{number_format($data->product_price_offer, 2, '.', ',')}} </p>
          <div class="font-body"><span
              style="font-weight:600;font-size:14px;color: #000;margin-bottom: 4px;text-decoration: line-through;"
              class=" ">{{number_format($data->product_price, 2, '.', ',')}} </span> <span class="offer-class"
              style="">{{number_format($data->product_percentage, 0, '.', ',')}}%</span></div>
              <p class="newbtn ">{{number_format($data->product_premium_offer, 2, '.', ',')}}<span class="offer-class"style="">{{number_format($data->product__premium_percentage, 0, '.', ',')}}%</span></p>
</a>

             
        </div>
        @endforeach
        @endif

  
      </div>
    </div>
  </section>
  <!-- kids collections -->

  <section>
    <div class="container-fluid">
      <div class="row home-sub-head" style="padding-top:0px;">
        <div class="col-6 text-start home-sub">
          <h1>
           Kids
          </h1>
        </div>
        <div class="col-6 text-end">
          <div class="view-all">
          <a  href="{{url('category-products/kids-wear')}}"> View All</a>
          </div>
        </div>
      </div>
          <div class='bannerimage'>
            @if($kids_web)
        <img src="{{url('uploads/ads/'.$kids_web->image)}}" alt=""></img>
           @endif
      </div>
      <div class='content'>
        @if($kids)
      @foreach($kids as $data)
        <div class='newdesign'>
          <a href="{{url('product-view/'.$data->product_slug)}}">
          <img src="{{url('uploads/product/single-product/'.$data->product_image)}}">
          <p style="font-size:14px;margin-bottom:0.5rem;">{{$data->product_name}}
          </p>
          <p style="font-weight:600;font-size:18px;color: #f5831a;margin-bottom: 4px;" class="  ">{{number_format($data->product_price_offer, 2, '.', ',')}} </p>
          <div class="font-body"><span
              style="font-weight:600;font-size:14px;color: #000;margin-bottom: 4px;text-decoration: line-through;"
              class=" ">{{number_format($data->product_price, 2, '.', ',')}} </span> <span class="offer-class"
              style="">{{number_format($data->product_percentage, 0, '.', ',')}}%</span></div>
              <p class="newbtn ">{{number_format($data->product_premium_offer, 2, '.', ',')}}<span class="offer-class"style="">{{number_format($data->product__premium_percentage, 0, '.', ',')}}%</span></p>
</a>

             
        </div>
        @endforeach
        @endif

  
      </div>
    </div>
  </section>
  
<!-- footweare Collections -->
<section>
    <div class="container-fluid">
      <div class="row home-sub-head" style="padding-top:0px;">
        <div class="col-6 text-start home-sub">
          <h1>
          Footweare
          </h1>
        </div>
        <div class="col-6 text-end">
          <div class="view-all">
          <a  href="{{url('category-products/footweare')}}"> View All</a>
          </div>
        </div>
      </div>
          <div class='bannerimage'>
            @if($footweare_web)
        <img src="{{url('uploads/ads/'.$footweare_web->image)}}" alt=""></img>
           @endif
      </div>
      <div class='content'>
        @if($footweare)
      @foreach($footweare as $data)
        <div class='newdesign'>
          <a href="{{url('product-view/'.$data->product_slug)}}">
          <img src="{{url('uploads/product/single-product/'.$data->product_image)}}">
          <p style="font-size:14px;margin-bottom:0.5rem;">{{$data->product_name}}
          </p>
          <p style="font-weight:600;font-size:18px;color: #f5831a;margin-bottom: 4px;" class="  ">{{number_format($data->product_price_offer, 2, '.', ',')}} </p>
          <div class="font-body"><span
              style="font-weight:600;font-size:14px;color: #000;margin-bottom: 4px;text-decoration: line-through;"
              class=" ">{{number_format($data->product_price, 2, '.', ',')}} </span> <span class="offer-class"
              style="">{{number_format($data->product_percentage, 0, '.', ',')}}%</span></div>
              <p class="newbtn ">{{number_format($data->product_premium_offer, 2, '.', ',')}}<span class="offer-class"style="">{{number_format($data->product__premium_percentage, 0, '.', ',')}}%</span></p>
</a>

             
        </div>
        @endforeach
        @endif

  
      </div>
    </div>
  </section>
  <!-- bags -->
  <section>
    <div class="container-fluid">
      <div class="row home-sub-head" style="padding-top:0px;">
        <div class="col-6 text-start home-sub">
          <h1>
          Bags
          </h1>
        </div>
        <div class="col-6 text-end">
          <div class="view-all">
          <a  href="{{url('category-products/bags')}}"> View All</a>
          </div>
        </div>
      </div>
          <div class='bannerimage'>
            @if($bags_web)
        <img src="{{url('uploads/ads/'.$bags_web->image)}}" alt=""></img>
           @endif
      </div>
      <div class='content'>
        @if($bags)
      @foreach($bags as $data)
        <div class='newdesign'>
          <a href="{{url('product-view/'.$data->product_slug)}}">
          <img src="{{url('uploads/product/single-product/'.$data->product_image)}}">
          <p style="font-size:14px;margin-bottom:0.5rem;">{{$data->product_name}}
          </p>
          <p style="font-weight:600;font-size:18px;color: #f5831a;margin-bottom: 4px;" class="  ">{{number_format($data->product_price_offer, 2, '.', ',')}} </p>
          <div class="font-body"><span
              style="font-weight:600;font-size:14px;color: #000;margin-bottom: 4px;text-decoration: line-through;"
              class=" ">{{number_format($data->product_price, 2, '.', ',')}} </span> <span class="offer-class"
              style="">{{number_format($data->product_percentage, 0, '.', ',')}}%</span></div>
              <p class="newbtn ">{{number_format($data->product_premium_offer, 2, '.', ',')}}<span class="offer-class"style="">{{number_format($data->product__premium_percentage, 0, '.', ',')}}%</span></p>
</a>

             
        </div>
        @endforeach
        @endif

  
      </div>
    </div>
  </section>
<!-- kitchen & home -->
<section>
    <div class="container-fluid">
      <div class="row home-sub-head" style="padding-top:0px;">
        <div class="col-6 text-start home-sub">
          <h1>
          Kitchen & Home Appliances
          </h1>
        </div>
        <div class="col-6 text-end">
          <div class="view-all">
          <a  href="{{url('category-products/kitchen-home-appliances')}}"> View All</a>
          </div>
        </div>
      </div>
          <div class='bannerimage'>
            @if($kitchen_home_web)
        <img src="{{url('uploads/ads/'.$kitchen_home_web->image)}}" alt=""></img>
           @endif
      </div>
      <div class='content'>
        @if($kitchen_home)
      @foreach($kitchen_home as $data)
        <div class='newdesign'>
          <a href="{{url('product-view/'.$data->product_slug)}}">
          <img src="{{url('uploads/product/single-product/'.$data->product_image)}}">
          <p style="font-size:14px;margin-bottom:0.5rem;">{{$data->product_name}}
          </p>
          <p style="font-weight:600;font-size:18px;color: #f5831a;margin-bottom: 4px;" class="  ">{{number_format($data->product_price_offer, 2, '.', ',')}} </p>
          <div class="font-body"><span
              style="font-weight:600;font-size:14px;color: #000;margin-bottom: 4px;text-decoration: line-through;"
              class=" ">{{number_format($data->product_price, 2, '.', ',')}} </span> <span class="offer-class"
              style="">{{number_format($data->product_percentage, 0, '.', ',')}}%</span></div>
              <p class="newbtn ">{{number_format($data->product_premium_offer, 2, '.', ',')}}<span class="offer-class"style="">{{number_format($data->product__premium_percentage, 0, '.', ',')}}%</span></p>
</a>

             
        </div>
        @endforeach
        @endif

  
      </div>
    </div>
  </section>
<!-- sports Bags -->
<section>
    <div class="container-fluid">
      <div class="row home-sub-head" style="padding-top:0px;">
        <div class="col-6 text-start home-sub">
          <h1>
          Sports
          </h1>
        </div>
        <div class="col-6 text-end">
          <div class="view-all">
          <a  href="{{url('category-products/sports')}}"> View All</a>
          </div>
        </div>
      </div>
          <div class='bannerimage'>
            @if($sports_web)
        <img src="{{url('uploads/ads/'.$sports_web->image)}}" alt=""></img>
           @endif
      </div>
      <div class='content'>
        @if($sports)
      @foreach($sports as $data)
        <div class='newdesign'>
          <a href="{{url('product-view/'.$data->product_slug)}}">
          <img src="{{url('uploads/product/single-product/'.$data->product_image)}}">
          <p style="font-size:14px;margin-bottom:0.5rem;">{{$data->product_name}}
          </p>
          <p style="font-weight:600;font-size:18px;color: #f5831a;margin-bottom: 4px;" class="  ">{{number_format($data->product_price_offer, 2, '.', ',')}} </p>
          <div class="font-body"><span
              style="font-weight:600;font-size:14px;color: #000;margin-bottom: 4px;text-decoration: line-through;"
              class=" ">{{number_format($data->product_price, 2, '.', ',')}} </span> <span class="offer-class"
              style="">{{number_format($data->product_percentage, 0, '.', ',')}}%</span></div>
              <p class="newbtn ">{{number_format($data->product_premium_offer, 2, '.', ',')}}<span class="offer-class"style="">{{number_format($data->product__premium_percentage, 0, '.', ',')}}%</span></p>
</a>

             
        </div>
        @endforeach
        @endif

  
      </div>
    </div>
  </section>
<!--    toys-->
<section>
    <div class="container-fluid">
      <div class="row home-sub-head" style="padding-top:0px;">
        <div class="col-6 text-start home-sub">
          <h1>
          Toys 
          </h1>
        </div>
        <div class="col-6 text-end">
          <div class="view-all">
          <a  href="{{url('category-products/toys')}}"> View All</a>
          </div>
        </div>
      </div>
          <div class='bannerimage'>
            @if($toys_web)
        <img src="{{url('uploads/ads/'.$toys_web->image)}}" alt=""></img>
           @endif
      </div>
      <div class='content'>
        @if($toys)
      @foreach($toys as $data)
        <div class='newdesign'>
          <a href="{{url('product-view/'.$data->product_slug)}}">
          <img src="{{url('uploads/product/single-product/'.$data->product_image)}}">
          <p style="font-size:14px;margin-bottom:0.5rem;">{{$data->product_name}}
          </p>
          <p style="font-weight:600;font-size:18px;color: #f5831a;margin-bottom: 4px;" class="  ">{{number_format($data->product_price_offer, 2, '.', ',')}} </p>
          <div class="font-body"><span
              style="font-weight:600;font-size:14px;color: #000;margin-bottom: 4px;text-decoration: line-through;"
              class=" ">{{number_format($data->product_price, 2, '.', ',')}} </span> <span class="offer-class"
              style="">{{number_format($data->product_percentage, 0, '.', ',')}}%</span></div>
              <p class="newbtn ">{{number_format($data->product_premium_offer, 2, '.', ',')}}<span class="offer-class"style="">{{number_format($data->product__premium_percentage, 0, '.', ',')}}%</span></p>
</a>

             
        </div>
        @endforeach
        @endif

  
      </div>
    </div>
  </section>
  


  
  @include('frontend/includes/footer')
  <script src="{{url('front-end/js/bootstrap.min.js')}}"></script>
  <script src="{{url('front-end/js/scriptfont.js')}}"></script>
  <script src="{{url('front-end/js/jquery.min.js')}}"></script>
  <script src="{{url('front-end/js/owl.carousel.min.js')}}"></script>

  <script>
    $(document).ready(function () {
      $('#productslider').owlCarousel({

        loop: true,
        margin: 10,
        nav: false,
        dots: false,
        autoplay: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 1
          }
        }
      })
    })
  </script>
  <script>
    $(document).ready(function () {
      $("#testimonial-slider").owlCarousel({
        items: 1,
        nav: true,
        // nav: false,
        dots: false,
        itemsDesktop: [1000, 1],
        itemsDesktopSmall: [979, 1],
        itemsTablet: [768, 1],
        margin: 10,
        pagination: false,
        navigation: true,
        navigationText: ["", ""],
        autoPlay: true
      });
    });
  </script>
  <script>
    $(document).ready(function () {
      $("#testimonial-slider").owlCarousel({
        items: 1,
        itemsDesktop: [1000, 1],
        itemsDesktopSmall: [979, 1],
        itemsTablet: [768, 1],
        margin: 10,
        pagination: false,
        navigation: true,
        navigationText: ["", ""],
        autoPlay: true
      });
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


  <!-- $(document).ready(function(){
    $(".owl-carousel").owlCarousel({
    autoWidth:true,
  
      margin: 10,
     
     
        items:4,
      loop:true,
      margin:10,
      autoplay:true,
      autoplayTimeout:1000,
      autoplayHoverPause:true
    });
  }); -->

</body>

</html>