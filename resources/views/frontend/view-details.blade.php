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
     <link rel="stylesheet" href="{{url('front-end/css/jquery.exzoom.css')}}">

   <link rel="icon" type="image/x-icon" href="/front-end/images/itcityimages/favicon.png">
   <script async src="https://www.googletagmanager.com/gtag/js?id=G-HWHH8934S5"></script>



</head>

<body>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<script src="{{url('front-end/js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function(){
    var cart_pro=[];
$('.addCart').click(function(){ 

var product_id=$(this).data("pro_id");
var size=0;
var ele = document.getElementsByName('attri');
 
            for (i = 0; i < ele.length; i++) {
                if (ele[i].checked)
               size=ele[i].value;
            }



var qty='1';
var price=$(this).data("price");
     $.ajax({

               type:'get',
               url:'{{url('addcart')}}',
               data:({product_id:product_id,qty:qty,price:price,size:size}),
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
    <section class="view-cart">
        <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <div class="product-detail">
                    
<div class="exzoom" id="exzoom">
  <!-- Images -->
  <div class="exzoom_img_box">
    <ul class='exzoom_img_ul'>
         @foreach($productimage as $data)
      <li>
          <img  src="{{url('uploads/product/single-product/'.$data[1])}}"/>
     </li>
          @endforeach
     
     
    </ul>
  </div>
  <!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> Nav-->
  <div class="exzoom_nav"></div>
  <!-- Nav Buttons -->
  <p class="exzoom_btn">
      <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
      <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
  </p>
</div>
    




                 
                </div>
            










            </div>
            <div class="col-md-6 py-5">

                <div class="row">
                    <div class="col-md-12">
                        <div class="detail-sub-head d-flex">
                            <!-- <h6>APPLE</h6> -->
                            <span class="instock">instock </span>
                        </div>
                        <div class="details-head">
                            <h1>{{$results->product_name}}</h1>
                        </div>
                        <div class="details-sub-price">
                            <p>{{number_format($results->product_price, 3, '.', ',')}} </p>
                            <h3> {{number_format($results->product_price_offer, 3, '.', ',')}} </h3>
          <span class="discount-percent offer-class">17%</span>
                        </div>

</br>
<p class="newbtn ">{{number_format($results->product_premium_offer, 2, '.', ',')}}<span class="offer-class"style="">{{number_format($results->product__premium_percentage, 0, '.', ',')}}%</span></p>
                        <div class="detailcart">
                        <Button onclick="showPopup()" type="button" data-pro_id="{{$results->product_id}}" data-price="{{$results->product_price_offer}}" class='newbtn m-auto addCart' >{{ __('main.Add_to_cart') }}</Button>
                        </div>
                        <div id="popup-box" class="popup-box">
                       <p style="margin-bottom:0px;"><i class="fas fa-check-circle"></i> {{ __('main.Added_to_cart') }}</p>
                       </div>
                       
                       @if($addon_product)
                        <div class="colorfilter">
                        @foreach($addon_product as $addon)
                      
                            <a href="{{url('product-view/'.$addon->product_slug)}}" style="background-color:{{$addon->attribute_color_code}}">{{$addon->attribute_value}}</a>
                            <img src="{{url('uploads/product/single-product/small/'.$addon->product_image)}}">
                            @endforeach
                        </div>
                        @endif
                        @if($attribute)
                        <div class="colorfilter">
                        @foreach($attribute as $attri)
                      
                         
                        <label for="html">{{$attri->attribute_value}}<input type="radio" id="attri" class="attri" name="attri"value="{{$attri->id}}"></label>
                            @endforeach
                        </div>
                        @endif
                        
                        <hr>
                        <div class="details-para">
                            <h6>{{ __('main.Product_Details') }}</h6>
                            <ul>
                                <li>{!!$results->product_desc!!} </li>
                                
                            </ul>
                         
                        </div>



                    </div>
                </div>

            </div>
        </div>
        <div class="container">
            <hr>
        </div>

        <div class="container">
            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">Description</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">Reviews</button>
                </li>

            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="details-para">
                        <h6> {{ __('main.Product_Details') }}</h6>
                        <ul>
                            <li>{!!$results->product_desc!!} </li>
                            
                            
                        </ul>
                    </div>

                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="container px-5">
                    <h2 class="customer-review">Customer Reviews</h2>
                    @if(session('username'))
                  <form class="form-horizontal" action="{{url('add-review')}}" method="post">
  {{csrf_field()}}                 
                    <input type="hidden" name="product_id" value="{{$results->product_id}}">
                    <div class="form-area">
 <h2 class="write-review">Write Your Own Review</h2>
                      <div class="form-element">
                        <label>Nickname <em>*</em></label><br>
                        <input type="text" name="author" required="" autofocus="">
                      </div>
                      
                      <div class="form-element">
                        <label>Review <em>*</em></label><br>
                        <textarea required="" name="text"></textarea>
                      </div>

                      <div class="buttons-set">
                        <button class="button submit review-button" title="Submit Review" type="submit" ><span><i class="fa fa-thumbs-up"></i> &nbsp;Review</span></button>
                      </div>

                     </div>
                   </form>

                  @endif
                    @if($review->isEmpty())
                    <div class="customer py-3">
                    <p>No reviews</p>
                    </div>
                     @endif
                      @if(session('username'))
                 
                  @else
                  <a href="{{url('/my-login')}}" class="btn btn-dark">Login To Customer Reviews</a>
                  @endif
                    @foreach($review as $reviews)
                   <div class="customer py-3" style="text-transform: capitalize;">
                       <h6>{{$reviews->author_name}}</h6>
                    <!-- <div class="rating">
                           <label for="star5"><i class="fas fa-star"></i></label>
                         <label for="star4"><i class="fas fa-star"></i></label>
                         <label for="star3"><i class="fas fa-star"></i></label>
                         <label for="star2"><i class="fas fa-star"></i></label>
                         <label for="star1"><i class="fas fa-star"></i></label>
                  </div> -->
                       <p>{{$reviews->text}}<small>(Posted on {{$reviews->created_at}})</small></p>
                   </div>
                  
                 


</div>
                </div>

            </div>
            @endforeach   
        </div>
        </div>
       
            
      
        <div class="row">
            <div class="col-md-12">
                <div class="related-product">
                     <h1>{{ __('main.Related_Products') }}</h1>
                </div>
            
            </div>
        </div>
        <div class="row py-5">
        @foreach($related_product as $data)
             <div class="col-md-3 col-sm-6 col-6">
                        <div class='newdesign related'>
                        <a href="{{url('product-view/'.$data->product_slug)}}">
                        <img src="{{url('uploads/product/single-product/'.$data->product_image)}}">
                                <p style="font-size:14px;margin-bottom:0.5rem;">{{$data->product_name}}
                                </p>
                                <p style="font-weight:600;font-size:18px;color: #f5831a;margin-bottom: 4px;" class="  ">
                                {{number_format($data->product_price_offer, 3, '.', ',')}} 
                              </p>
                                <div class="font-body"><span
                                        style="font-weight:600;font-size:14px;color: #f5831a;margin-bottom: 4px;text-decoration: line-through;"
                                        class=" ">{{number_format($data->product_price, 3, '.', ',')}} </span> 
                                        <span class=""
                                        style="background-color: #f5831a;font-size: 12px;color: white;padding: 3px;">{{number_format($data->product_percentage, 0, '.', ',')}}%</span>
                                </div>
                            </a>
                            <p class="newbtn ">{{number_format($data->product_premium_offer, 2, '.', ',')}}<span class="offer-class"style="">{{number_format($data->product__premium_percentage, 0, '.', ',')}}%</span></p>
                        </div>
                </div>
                    @endforeach
        </div> 
        
    </section>
    <script>
        
        $(function(){

  $("#exzoom").exzoom({

    // thumbnail nav options
    "navWidth": 60,
    "navHeight": 60,
    "navItemNum": 5,
    "navItemMargin": 7,
    "navBorder": 1,

    // autoplay
    "autoPlay": false,

    // autoplay interval in milliseconds
    "autoPlayTimeout": 2000
    
  });

});
        
    </script>
    
    
    
    
    
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





<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>

@include('frontend/includes/footer')
        
    <script src="{{url('front-end/js/bootstrap.min.js')}}"></script>
  <script src="{{url('front-end/js/scriptfont.js')}}"></script>
  <script src="{{url('front-end/js/jquery.min.js')}}"></script>
   <script src="{{url('front-end/js/jquery.exzoom.js')}}"></script>


    


</body>

</html>