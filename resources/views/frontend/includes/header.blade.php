

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" rel="stylesheet" />

<script src="{{url('front-end/js/jquery-3.3.1.js')}}"></script>



<!--newfeature dropdown flag--->
<script>
  $(document).ready(function() {
    $('.selectpicker').selectpicker();
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#country').change(function(){
     var code=$(this).val();
     $('#countrycode').val(code);
    });
    
    
    
   $('#searchQueryInput').keyup(function(){
   
 $('#home').hide();

var key=$(this).val();
    $.ajax({

               type:'get',
               url:'{{url('searchproduct')}}',
               data:({key:key}),
               success:function(data){

$('#srchrlt').html(data);

                 }

    });

}); 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
   
  });
  $(".popupcancel").click(function(){
    // alert('ok');
   $(".popupcancel").fadeOut().removeClass("active");
});
</script>

<div class="container-fluid top  ps-0 pe-0 " style="z-index:9999">
        <div class="row">
            
            <div class="col-md-2 col-sm-12 col-12 logo">
            <div> 
    <button class="hamburger-btn" onclick="toggleSidebar()">&#9776;</button>
     </div>  
 
             <div> 
            <a  href="{{url('/')}}">
                 <img src="{{URL::to('/')}}/front-end/images/itcityimages/logo-it.png" alt="">
            </a>
            </div> 
              <div class="top-icons">
                  
                <div class="top-cart-icons">
                <a class="cart-btn" href="{{url('my-cart')}}">
                 <img src="{{URL::to('/')}}/front-end/images/itcity/shopping-cart.png" alt="">
                  <div id="mcart" class="cart-items-value">{{Cart::content()->groupBy('id')->count()}}</div>
                  </a>
                </div>
                <div class="top-user-icons">
                  @if(session('username'))
                  <div class=" hover-box" >
                   <a class="cart-btn" href="{{url('my-account')}}">
                        <img src="{{URL::to('/')}}/front-end/images/itcity/user.png" alt="">
                    </a>
                    </div>
                  @else
                <a class="cart-btn" href="{{url('my-login')}}">
                     <img src="{{URL::to('/')}}/front-end/images/itcity/user.png" alt="">
                    </a>
                    @endif
                </div>
            </div>
            </div>
            <div class="col-md-8 header">

                <div class='search'>
                <form action="{{url('/search')}}" method="get">
                     {{ csrf_field() }}
                    <div class="searchBar">

                        <input id="searchQueryInput"  name="value" type="text" placeholder="Search Products,Brands and More" />
                        <div className='d-flex'>

                            <button id="searchQuerySubmit" type="submit" name="searchQuerySubmit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                </div>
            </div>

            <div class="col-md-2 d-flex header-icons ">
                  
                <div class="cart-icons">
                <a class="cart-btn" href="{{url('my-cart')}}">
                  <i class="fas fa-shopping-cart"></i>
                  <div id="mcartweb" class="cart-items-value">{{Cart::content()->groupBy('id')->count()}}</div>
                  </a>
                </div>
                <div class="user-icons">
                  @if(session('username'))
                  <div class=" hover-box" >
                   <a href="{{url('my-account')}}"><i class="fas fa-user"></i></a>
                    </div>
                  @else
                <a class="cart-btn" href="{{url('my-login')}}">
                    <i class="fas fa-user"></i>
                    </a>
                    @endif
                </div>
            </div>
        </div>

        <nav class="main-navbar navbar navbar-expand-lg navbar-light p-0">
            <div class="container">
 
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">


                    <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                         
                    <li class="nav-item">
                           <div class="dropdown">
                    <a href="{{url('category-products/mens-wear')}}">Mens Wear</a>
                    <div class="dropdown-content ">
                        <div class="d-flex">
                      <ul>
                      <a href="{{url('sub-category-products/men-top-wear')}}"> <h4>Top Wear</h4></a>

                      <a href="{{url('group-category-products/men-top-wear-t-shirts')}}"> <li>Tshirts</li></a>
                      <a href="{{url('group-category-products/men-top-wear-shirts')}}"><li>Shirts</li></a>
                      </ul>
                      <ul>
                      <a href="{{url('sub-category-products/men-bottom-wear')}}"> <h4>Bottom Wear</h4></a>

                      <a href="{{url('group-category-products/men-bottom-wear-track-pants')}}"> <li>Track Pants</li></a>
                      <a href="{{url('group-category-products/men-bottom-wear-jeans')}}"><li>Jeans</li></a>
                      <a href="{{url('group-category-products/men-bottom-wear-trousers')}}"><li>Trousers</li></a>
                      </ul>

                      <ul>
                      <a href="{{url('sub-category-products/men-inner-sleep-wear')}}"> <h4>Inner & Sleep Wear</h4></a>

                      <a href="{{url('group-category-products/men-inner-sleep-wear-all-inner-sleep-wear')}}"> <li>All Inner & Sleep Wear</li></a>
                      <a href="{{url('group-category-products/men-inner-sleep-wear-vests')}}"><li>Vests</li></a>
                      </ul>

                      </div>
                    </div>
                  </div>
                        </li>
                        <li class="nav-item">
                           <div class="dropdown">
                    <a href="{{url('category-products/womens-wear')}}">Womens Wear</a>
                    <div class="dropdown-content ">
                        <div class="d-flex">
                      <ul>
                      <a href="{{url('sub-category-products/womens-sarees')}}"> <h4>Sarees</h4></a>

                      <a href="{{url('group-category-products/womens-sarees-silk')}}"> <li>Silk Sarees</li></a>
                      <a href="{{url('group-category-products/womens-sarees-cotton-silk')}}"><li>Cotton Silk Sarees</li></a>
                      <a href="{{url('group-category-products/womens-sarees-georgette')}}"><li>Georgette Sarees</li></a>
                      <a href="{{url('group-category-products/womens-sarees-chiffon')}}"><li>Chiffon Sarees</li></a>
                      </ul>
                      <ul>
                      <a href="{{url('sub-category-products/womens-kurtis')}}"> <h4>Kurtis</h4></a>

                      <a href="{{url('group-category-products/womens-kurtis-anarkali')}}"> <li>Anarkali Kurtis</li></a>
                      <a href="{{url('group-category-products/womens-kurtis-rayon')}}"><li>Rayon Kurtis</li></a>
                      <a href="{{url('group-category-products/womens-kurtis-kurta-set')}}"><li>Kurta Sets</li></a>
                      </ul>

                      <ul>
                      <a href="{{url('sub-category-products/womens-other-ethnic')}}"> <h4>Other Ethnic</h4></a>

                      <a href="{{url('group-category-products/womens-other-ethnic-Blouses')}}"> <li>Blouses</li></a>
                      <a href="{{url('group-category-products/womens-other-ethnic')}}"><li>Dupattas</li></a>
                      </ul>
                      <ul>
                      <a href="{{url('sub-category-products/womens-top-wear')}}"> <h4>Topwear</h4></a>

                      <a href="{{url('group-category-products/womens-top-wear-tops')}}"> <li>Tops</li></a>
                      <a href="{{url('group-category-products/womens-top-wear-dresses')}}"><li>Dresses</li></a>
                      </ul>
                      <ul>
                      <a href="{{url('sub-category-products/womens-bottom-wear')}}"> <h4>Bottomwear</h4></a>

                      <a href="{{url('group-category-products/womens-bottom-wear-jeans')}}"> <li>Jeans</li></a>
                      <a href="{{url('group-category-products/womens-bottom-wear-jeggings')}}"><li>Jeggings</li></a>
                      <a href="{{url('group-category-products/womens-bottom-wear-palazzos')}}"><li>Palazzos</li></a>
                      <a href="{{url('group-category-products/womens-bottom-wear-shorts')}}"><li>Shorts</li></a>
                      <a href="{{url('group-category-products/womens-bottom-wear-skirts')}}"><li>Skirts</li></a>
                      </ul>

                      <ul>
                      <a href="{{url('sub-category-products/womens-inner-sleep-wear')}}"> <h4>Innerwear</h4></a>

                      <a href="{{url('group-category-products/womens-inner-sleep-wear-bra')}}"> <li>Bra</li></a>
                      <a href="{{url('group-category-products/womens-inner-sleep-wear-briefs')}}"><li>Briefs</li></a>
                      </ul>

                      </div>
                    </div>
                  </div>
                        </li>
               

                        <li class="nav-item">
                           <div class="dropdown">
                    <a href="{{url('category-products/kids-wear')}}">Kids Wear</a>
                    <div class="dropdown-content ">
                        <div class="d-flex">
                      <ul>
                      <a href="{{url('sub-category-products/kids-boys-girls-2plus-year')}}"> <h4>Boys & Girls 2+ Years</h4></a>

                      <a href="{{url('group-category-products/kids-boys-girls-dresses')}}"> <li>Dresses</li></a>
                      </ul>
                      <ul>
                      <a href="{{url('sub-category-products/kids-infant-0-2-year')}}"> <h4>Infant 0-2 Years</h4></a>

                      <a href="{{url('group-category-products/kids-infant-rompers')}}"> <li>Rompers</li></a>

                      </ul>

                      <ul>
                      <a href="{{url('sub-category-products/kids-baby-wear')}}"> <h4>Baby Care</h4></a>

                      <a href="{{url('group-category-products/kids-bags-backpacks')}}"> <li>Bags & Backpacks</li></a>
                      </ul>

                      </div>
                    </div>
                  </div>
                        </li>

                        <li class="nav-item">
                           <div class="dropdown">
                    <a href="{{url('category-products/footweare')}}">Footweare</a>
                    <div class="dropdown-content ">
                        <div class="d-flex">
                      <ul>
                      <a href="{{url('sub-category-products/footweare-women-footwear-2plus-year')}}"> <h4>Women Footwear</h4></a>

                      <a href="{{url('group-category-products/footweare-women-footwear-flats')}}"> <li>Flats</li></a>
                      <a href="{{url('group-category-products/footweare-women-footwear-bellies')}}"> <li>Bellies</li></a>
                      <a href="{{url('group-category-products/footweare-women-footwear-juttis')}}"> <li>Juttis</li></a>
                      <a href="{{url('group-category-products/footweare-women-footwear-sports-shoes')}}"> <li>Sports Shoes</li></a>
                      
                      </ul>
                      <ul>
                      <a href="{{url('sub-category-products/footweare-men-footwear')}}"> <h4>Men Footwear</h4></a>

                      <a href="{{url('group-category-products/footweare-men-footwear-casual-shoes')}}"> <li>Casual Shoes</li></a>
                      <a href="{{url('group-category-products/footweare-men-footwear-formal-shoes')}}"> <li>Formal Shoes</li></a>
                      <a href="{{url('group-category-products/footweare-men-footwear-sports-shoes')}}"> <li>Sports Shoes</li></a>
                      <a href="{{url('group-category-products/footweare-men-footwear-sandals')}}"> <li>Sandals</li></a>

                      </ul>

                      </div>
                    </div>
                  </div>
                        </li>

                        <li class="nav-item">
                           <div class="dropdown">
                    <a href="{{url('category-products/toys')}}">Toys</a>
                    <div class="dropdown-content ">
                        <div class="d-flex">
                      <ul>
                      <a href="{{url('sub-category-products/toys-all')}}"> <h4>All Toys</h4></a>

                      <a href="{{url('group-category-products/toys-all-remote-control')}}"> <li>Remote Control Toys</li></a>
                      <a href="{{url('group-category-products/toys-all-educational')}}"> <li>Educational Toys</li></a>
                      <a href="{{url('group-category-products/toys-all-soft')}}"> <li>Soft Toys</li></a>
                      <a href="{{url('group-category-products/toys-all-cars-die-cast-vechicles')}}"> <li>Cars & Die-cast Vehicles</li></a>
                      
                      </ul>
                     
                      </div>
                    </div>
                  </div>
                        </li>

                        <li class="nav-item">
                           <div class="dropdown">
                    <a href="{{url('category-products/bags')}}">Bag</a>
                    <div class="dropdown-content ">
                        <div class="d-flex">
                      <ul>
                      <a href="{{url('sub-category-products/bags-women-bags')}}"> <h4>Women Bags</h4></a>

                      <a href="{{url('group-category-products/bags-women-handbags')}}"> <li>Handbags</li></a>
                      <a href="{{url('group-category-products/bags-women-clutches')}}"> <li>Clutches</li></a>
                      <a href="{{url('group-category-products/bags-women-slingbags')}}"> <li>Slingbags</li></a>
                    
                      
                      </ul>
                      <ul>
                      <a href="{{url('sub-category-products/bags-men-bags')}}"> <h4>Men Bags</h4></a>

                      <a href="{{url('group-category-products/bags-men-wallets')}}"> <li>Men Wallets</li></a>
              

                      </ul>

                      </div>
                    </div>
                  </div>
                        </li>

                        <li class="nav-item">
                           <div class="dropdown">
                    <a href="{{url('category-products/kitchen-home-appliances')}}">Kitchen & Home</a>
                    <div class="dropdown-content ">
                        <div class="d-flex">
                      <ul>
                      <a href="{{url('sub-category-products/kitchen-home-appliances-kitchen-dining')}}"> <h4>Kitchen & Dining</h4></a>

                      <a href="{{url('group-category-products/kitchen-home-appliances-kitchen-dining-kitchen-storage')}}"> <li>Kitchen Storage</li></a>
                      <a href="{{url('group-category-products/kitchen-home-appliances-kitchen-dining-cookware-bakeware')}}"> <li>Cookware & Bakeware</li></a>
                      </ul>
                      <ul>
                      <a href="{{url('sub-category-products/kitchen-home-appliances-home-decor')}}"> <h4>Home Decor</h4></a>

                      <a href="{{url('group-category-products/kitchen-home-appliances-home-decor-stickers')}}"> <li>Stickers</li></a>
              

                      </ul>

                      </div>
                    </div>
                  </div>
                        </li>

                        <li class="nav-item">
                           <div class="dropdown">
                    <a href="{{url('category-products/sports')}}">Sports</a>
                    <div class="dropdown-content ">
                        <div class="d-flex">
                      <ul>
                      <a href="{{url('sub-category-products/sports-all')}}"> <h4>All Sports</h4></a>

                      <a href="{{url('group-category-products/sports-all-cricket')}}"> <li>Cricket</li></a>
                      <a href="{{url('group-category-products/sports-all-badminton')}}"> <li>Badminton</li></a>
                      <a href="{{url('group-category-products/sports-all-cycling')}}"> <li>Cycling</li></a>
                      <a href="{{url('group-category-products/sports-all-football')}}"> <li>Football</li></a>
                      <a href="{{url('group-category-products/sports-all-skating')}}"> <li>Skating</li></a>
                      <a href="{{url('group-category-products/sports-all-camping-hiking')}}"> <li>Camping & Hiking</li></a>
                      <a href="{{url('group-category-products/sports-all-swimming')}}"> <li>Swimming</li></a>
                    
                      </ul>
                     

                      </div>
                    </div>
                  </div>
            
                       
                </div>
            </div>
        </nav>
      
<!--Mobileresponsive-->
 
  <div class="sidebar" id="sidebar">
      <span  class="popup-close" onclick="myFun()">&times;</span>
   <div>
                    <ul class="navbar-nav m-auto mb-2 mb-lg-0 py-5 px-3">
                        <h6>All Categories</h6>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{url('category-products/mens-wear')}}">Mens wear</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('category-products/womens-wear')}}">Womens Wear</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="{{url('category-products/kids-wear')}}">Kids Wear</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="{{url('category-products/footweare')}}">Footweare</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="{{url('category-products/bags')}}">Bags</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="{{url('category-products/kitchen-home-appliances')}}">Kitchen & Home</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="{{url('category-products/sports')}}">Sports</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="{{url('category-products/toys')}}">Toys</a>
                        </li>
                       
                        <hr>
                                               <li class="nav-item">
                            <a class="nav-link" href="" style="font-weight: 600;">Download App</a>
                        </li>
                         <li class="nav-item">
                          <a href='https://play.google.com/store/apps/details?id=com.itcityonlinestore.itcity_online_store&pcampaignid=pcampaignidMKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'><img style="width:100px;" alt='Get it on Google Play' src='https://play.google.com/intl/en_us/badges/static/images/badges/en_badge_web_generic.png'/></a>
                        </li>
                          
                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link" href="" style="font-weight: 600;">Add ITCITY To Home Screen  </a>-->
                        <!--</li>-->
                        
                        </ul>
                        

                </div>
  </div>
  
  
  <div class="content">
    <!-- Main content goes here -->
  </div>
  

<section class="country-lang">
    <div class="container-fluid" style="padding:'0px'">
      <div class="row">

        <div class="col-6 text-start">


  


        </div>
        
        <div id="popup" class="popupup">
       <form action="{{url('country-change')}}" method="post">
        {{csrf_field()}}
        <h2>Are you sure want to change your country</h2>
         <input type="hidden" id="countrycode" class="countrycode" name="countrycode" value="KWD" readonly>
        <button type="submit" class="popupok" >Yes</button>
        <button type="button" class="popupcancel" onclick="myFunction()">No</button>
       </form>
       </div>
        <div class="col-6 text-end">
            @if(session('locale')=='ar')
            <a style="text-decoration:none;color:white;" class="col-6 text-end" href="{{url('lang/change/en')}}">English</a>

            @else
            <a style="text-decoration:none;color:white;" class="col-6 text-end" href="{{url('lang/change/ar')}}">عربى</a>

            @endif
  
        </div>
      </div>
    </div>
  </section>
    </div>
    

<div class="container">
  <div id="srchrlt" class="d-flex flex-wrap"></div>
</div>



<script>
  function showPopupcountry() {
  var popup = document.getElementById('popup');
  popup.style.display = 'flex';
}
</script>



<script>
  function myFunction() {
  var popup = document.getElementById('popup');
   popup.style.display = 'none';
}
</script>



<!---Mobileresponsive-->
<script>

    function toggleSidebar() {
        
        // var sidebar = document.getElementById("sidebar");
//   sidebar.style.display = 'block';

  var sidebar = document.getElementById("sidebar");
   sidebar.style.display = 'block';
   var sidebar = document.getElementById("sidebar");
  var content = document.getElementsByClassName("content");
  sidebar.classList.toggle("active");

  content.classList.toggle("active");
  
//   event.preventDefault();
}
</script>


<script>
function myFun() {
  var sidebar = document.getElementById("sidebar");
  sidebar.style.display = 'none';
}
</script>
<script>
    if ($(".dropdown").length) {
    $(document).on("click", ".dropdown-menu .dropdown-item", function (e) {
        e.preventDefault();
        if (!$(this).hasClass("active")) {
            var swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-danger me-3",
                },
                buttonsStyling: false,
            });
            swalWithBootstrapButtons
                .fire({
                    title: "Are you sure?",
                    text: "Do you really want to change your current language!",
                    icon: "warning",
                    confirmButtonText: "<i class='fas fa-check-circle me-1'></i> Yes, I am!",
                    cancelButtonText: "<i class='fas fa-times-circle me-1'></i> No, I'm Not",
                    showCancelButton: true,
                    reverseButtons: true,
                    focusConfirm: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        if (!$(this).hasClass("active")) {
                            $(".dropdown-menu .dropdown-item").removeClass("active");
                            $(this).addClass("active");
                            $(this)
                                .parents(".dropdown")
                                .find(".btn")
                                .html("<span class='flag-icon flag-icon-us me-1'></span>" + $(this).text());
                        }
                        Swal.fire({
                            icon: "success",
                            title: "Amazing!",
                            text: "Your current language has been changed successfully.",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    }
                });
        }
    });
}
</script>
<script>
//     document.addEventListener("DOMContentLoaded", function() {
//   var popup = document.getElementById('popup-blink');
//   setTimeout(function() {
//     popup.style.display = 'block';
//   }, 1000); // 5 minutes in milliseconds
// });
// 
</script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



