<div class="footer-icons  mobilediv">
    <div class="footer-icons-link nav">
     
        <ul class="navbar-nav" style="display:contents;">
        <li class="nav-item active">
            <a class="nav-link" href="{{url('/')}}">
               <img style="width:15px;" src="{{URL::to('/')}}/front-end/images/itcity/home.png" alt="">
               <h6>{{ __('main.Home') }}</h6>
               <!--Home-->
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('search')}}">
                <img style="width:15px;" src="{{URL::to('/')}}/front-end/images/itcity/search.png" alt="">
              <h6>{{ __('main.Search') }}</h6>  
              <!--Search-->
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('category')}}">
                <img style="width:15px;" src="{{URL::to('/')}}/front-end/images/itcity/categories.png" alt="">
              <h6>{{ __('main.Categories') }}</h6>  
              <!--Categories-->
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('my-cart')}}">
                <img style="width:15px;" src="{{URL::to('/')}}/front-end/images/itcity/shopping.png" alt="">
                <h6>{{ __('main.Cart') }}</h6> 
                <!--Cart-->
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link"  href="{{url('my-account')}}">
            <img style="width:15px;" src="{{URL::to('/')}}/front-end/images/itcity/userone.png" alt="">
            <h6>{{ __('main.Profile') }}</h6> 
            <!--Profile-->
               </a>
        </li>
    </ul>
    
    
    
        
 <!--       <div class="nav-item active">-->
 <!--           <a href="{{url('/')}}">-->
 <!--               <i class="fas fa-home"></i>-->
 <!--<span class="sr-only">-->
 <!--                   (current)-->
 <!--               </span>-->
 <!--               <h6>Home</h6>-->
 <!--           </a></div>-->
 <!--       <div class="nav-item"><a eventkey="link-1" href="{{url('search')}}">-->
 <!--               <i class="fas fa-search"></i>-->

 <!--               <h6>Search</h6>-->
 <!--           </a></div>-->
 <!--       <div class="nav-item"><a href="{{url('category')}}">-->
 <!--               <i class="fas fa-th"></i>-->
 <!--               <h6>Categories</h6>-->
 <!--           </a></div>-->
 <!--       <div class="nav-item"><a href="{{url('my-cart')}}">-->
 <!--               <i class="fas fa-cart-plus"></i>-->
 <!-- <img src="{{URL::to('/')}}/front-end/images/itcity/shopping-cart.png" alt="">-->
 <!--               <h6>Cart</h6>-->
 <!--           </a></div>-->
 <!--       <div class="nav-item"><a href="{{url('my-account')}}">-->

 <!--               <i class="fas fa-user"></i>-->

 <!--               <h6>Profile</h6>-->
 <!--           </a>-->
 <!--           </div>-->
    </div>
</div>



<div class="footer-div desktopview pt-3">
    <div class="container">
        <div class=" p-0 m-0 row">

            <div class=" p-0 m-0 col-lg-3 col-md-6 col-sm-6">
                <ul>
                    <img src="{{URL::to('/')}}/front-end/images/itcityimages/main-logo-footer.png" alt="">


<address style="font-weight: 600;
    text-align: initial;">
 
<!--ITCity International Farwaniya<br>Habeeb Al munawar street<br>Maghateer complex<br>Mezzanine floor<br>Farwaniya,kuwait<br> Tel: +965 90019287</address>-->

                    <li><i class="fas fa-envelope" style="color:#f5831a"></i>info@itcityonlinestore.com</li>
                    <li><i class="fas fa-mobile-alt" style="color:#f5831a"></i> +965 90019287</li>
                    <li><i class="fas fa-map-marker-alt" style="color:#f5831a"></i> 
                    {{ __('main.IT_City') }}<br>{{ __('main.Habeeb_Al_munawar_street') }}<br>{{ __('main.Maghateer_complex') }}<br>{{ __('main.Mezzanine_floor') }}<br>{{ __('main.Farwaniya_kuwait') }}</li>
                </ul>
            </div>
            <div class="p-0 m-0 col-lg-3 col-md-6 col-sm-6">
                <ul>
                    <h5>{{ __('main.Information') }}</h5>
                    <li><a href="{{url('delivery-information')}}">{{ __('main.Delivery_Information') }}</a></li>
                    <li><a href="{{url('privacy-policy')}}">{{ __('main.Privacy_Policy') }}</a></li>
                    <li><a href="{{url('terms-conditions')}}">{{ __('main.Terms') }}&amp;{{ __('main.Condition') }}</a></li>
                </ul>
            </div>
            <div class="p-0 m-0 col-lg-3 col-md-6 col-sm-6">
                <ul>
                    <h5>{{ __('main.Categories') }}</h5>
                    <li><a href="{{url('category-products/mens-wear')}}">Mens Wear</a></li>
                    <li><a href="{{url('category-products/womens-wear')}}">Womens Wear</a></li>
                    <li><a href="{{url('category-products/kids-wear')}}">Kids Wear</a></li>
                    <li><a href="{{url('category-products/footweare')}}">Footweare</a></li>
                    <li><a href="{{url('category-products/bags')}}">Bags</a></li>
                    <li><a href="{{url('category-products/kitchen-home-appliances')}}">Kitchen & Home</a></li>
                    <li><a href="{{url('category-products/sports')}}">Sports</a></li>
                    <li><a href="{{url('category-products/toys')}}">Toys</a></li>
                </ul>
            </div>
            <div class="p-0 m-0 col-lg-3 col-md-6 col-sm-6">
                <ul>
                    <h5>Service</h5>
                    <!-- <li><a href="{{url('category')}}">Wish List</a></li> -->
                    <li><a href="{{url('my-cart')}}">{{ __('main.Shopping_Cart') }}</a></li>
                    <li><a href="{{url('return-policy')}}">{{ __('main.Return_Policy') }}</a></li>
                    <li><a href="{{url('about-us')}}">{{ __('main.About_Us') }}</a></li>
                </ul>
                <ul class="footersocial d-flex">
                    <!--style="color:#f48120"-->
                    <li ><a title="Connect us on Facebook" target="_blank" href="https://www.facebook.com/itcityonlinestore"><i  class="fab fa-facebook"></i></a></li>
                    <li ><a title="Connect us on Twitter" target="_blank" href="https://twitter.com/itcitykuwait"><i  class="fab fa-twitter-square"></i></a></li>
                    <li><a title="Connect us on youtube" target="_blank" href="https://www.youtube.com/channel/UCQKb_8AOnVB7euYZWoQke_w?view_as=subscriber"><i  class="fab fa-youtube"></i></a></li>
                    <li><a title="Connect us on Instagram" target="_blank" href="https://www.instagram.com/itcity_international/"><i  class="fab fa-instagram-square"></i></a></li>
                     <li><a title="Connect us on Instagram" target="_blank" href=""><i class="fab fa-tiktok"></i></a></li>
                       <li><a title="Connect us on Instagram" target="_blank" href=""><i class="fab fa-google-plus-square"></i></a></li>
                  
                </ul>
                 <ul class="footerplaystore">
                      <h6 style="color:#fff">{{ __('main.Download_App') }}</h6>
              
                     
                     
                 <a href='https://play.google.com/store/apps/details?id=com.itcityonlinestore.itcity_online_store&pcampaignid=pcampaignidMKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'><img style="width:160px;" alt='Get it on Google Play' src='https://play.google.com/intl/en_us/badges/static/images/badges/en_badge_web_generic.png'/></a>
                
                </ul>
            </div>

            <!--<div class="bottom-footer"><h6>© 2019 IT CITY ONLINE STORE </h6></div>-->


        </div>

    </div>
</div>

<!--<div class="container"><hr></div>-->

<div class="bottom-footer">
    <hr style="margin:0px;opacity:0.9;">
    <h6>© 2023 IT CITY ONLINE STORE </h6>
</div>
  
     <script>
        $(document).ready(function() {
            $('li').click(function() {
                $('li.nav-item.active').removeClass("active");
                $(this).addClass("active");
            });
        });
    </script>
      <script src="{{url('front-end/js/bootstrap.min.js')}}"></script>
  <script src="{{url('front-end/js/scriptfont.js')}}"></script>
  <script src="{{url('front-end/js/jquery.min.js')}}"></script>