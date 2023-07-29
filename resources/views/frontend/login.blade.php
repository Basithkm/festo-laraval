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
<script src="{{url('front-end/js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript">
    

    $(document).ready(function(){
    
    $('#ck').click(function(){
    
    alert('hiii');
    
    
    });
    
    $('#mobile').change(function(){
    
    
    
    var mobile = $(this).val();
    var num=mobile.toString().length;
    
    if(num=='10'){
      $("#mobmsg").css("display", "");
      $("#mobmsg").css("color", "Green");
      $('#mobmsg').html('Valid Mobile number');
    }
    
    if(mobile){
    
    var num=mobile.toString().length;
    if(num=='10'){
    
        $.ajax({
               type:"GET",
               url:"{{url('/check-mobile')}}?mobile="+mobile,
               success:function(res){               
                if(res.length > 0){
                   
      $("#mobmsg").css("display", "");
      $("#mobmsg").css("color", "red");
      $('#mobmsg').html('Sorry!.This mobile number already used!');
      $('#submit').attr("disabled", "disabled");
      $('#email').attr("disabled", "disabled");
                   
               
                }else{
                   $("#mobmsg").css("display", "");
                   $("#submit").removeAttr( "disabled");
                   $("#email").removeAttr( "disabled");
                }
               }
            });
    
    
      }else if(num==''){
    
    $("#mobmsg").css("display", "none");
    
      }else{
    
    $("#mobmsg").css("display", "");
     $("#mobmsg").css("color", "red");
      $('#mobmsg').html('Invalid Mobile number');
        $('#email').attr("disabled", "disabled");
    
      }
    
    }
    
    
    });
    
    
    
    
    
    $('#email').keyup(function(){
    var email = $(this).val();

    function isValidEmailAddress(emailAddress) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(emailAddress);
    }
    
    
    if( !isValidEmailAddress( email ) ) {
    
      $("#emailmsg").css("display", "");
      $("#emailmsg").css("color", "red");
      $('#emailmsg').html('Invalid email!');
      $('#submit').attr("disabled", "disabled");
    
    }else if(!email){
    
      $("#emailmsg").css("display", "none");
      $("#emailmsg").css("color", "green");
      $('#emailmsg').html('Valid email.');
      $("#submit").removeAttr( "disabled");
    
    }else{
    
      $("#emailmsg").css("display", "");
      $("#emailmsg").css("color", "green");
      $('#emailmsg').html('Valid email.');
      $("#submit").removeAttr( "disabled");
    
    }
    
    
    $.ajax({
               type:"GET",
               url:"{{url('/check-email')}}?email="+email,
               success:function(res){  
     if(res.length > 0){
         
         var em='0';
    
      $("#emailmsg").css("display", "");
      $("#emailmsg").css("color", "red");
      $('#emailmsg').html('This email is already used!');
      $('#submit').attr("disabled", "disabled");
    
    }else{
     var em='1';
      $("#emailmsg").css("display", "");
      $("#submit").removeAttr( "disabled");
    }
    
               }
    
             });
    });
    
    
    
    
    
    $('#conf_pass').keyup(function(){
    
    var conf_pass=$(this).val();
    var new_pass=$('#new_pass').val();
    
    if(conf_pass==new_pass){
     $("#submit").removeAttr("disabled");
    $("#conf_msg").css("display", "");
      $("#conf_msg").css("color", "green");
      $('#conf_msg').html('Password matched!.');
    }else{
    
    $("#conf_msg").css("display", "");
      $("#conf_msg").css("color", "red");
      $('#conf_msg').html('Password not matched!.');
     $("#submit").attr("disabled", "disabled");
    }
    
    });
    
    $('#forget').click(function(){
    
    $("#log").css("display", "none");
     $("#pass").fadeIn()
    
    });
    
    
        });
    
    </script>
     <script type="text/javascript">
                               function limit(element)
                                 {
                                  var max_chars = 10;
    
                                   if(element.value.length > max_chars) {
                                   element.value = element.value.substr(0, max_chars);
                                   }
                                 }
                             </script>
                             
                             <script language="javascript">
    
    function checkEmail() {
        var emaill = document.getElementById('email');
        var filter = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    
        if (!filter.test(emaill.value)) {
        document.getElementById("submit").disabled = true;
        
     }
    }
    </script>
@include('frontend/includes/header')
    <div class="container payment">
        <div class="registration row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 px-4">
                <h5 class="cart-modal-title fw-7 fs-15 font-manrope text-center">Log in or register</h5>
                <div class="cart-modal-list grid">
                    <div class="text-capitalize view-cart-btn bg-orange fs-15 font-manrope ">
                    <form  class="login-form" role="form" action="{{url('customer-login')}}" method="post">
   {{csrf_field()}}
                            <div><input name="username" placeholder="Enter your email" type="email"
                                    class="rounded-0 my-2 form-control"></div>
                            <div><input name="password" placeholder="Enter your  password" type="password"
                                    class="rounded-0 my-2 form-control"></div>
                            <div class="loginbutton"><button type="submit" class="btn btn-dark">Login</button></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" registerform  col-lg-6 col-md-6 col-sm-6 col-12 px-4">
                <h5 class="cart-modal-title fw-7 fs-15 font-manrope text-center">Register</h5>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="login-form" role="form" action="{{url('customer-registration')}}" method="post" name="form1">
   {{csrf_field()}}
                    <div><input placeholder="Enter your your name" type="text" 
                            class="rounded-0 my-2 form-control"value="{{ old('name') }}" placeholder="Username" required="" name="name" onkeydown="return myf(event)">
                            <span id="error" style="color:red;display:none">Please Enter Only Alphabets...</span></div>
                    <div><input placeholder="Enter your  email" type="email" value="{{ old('email') }}" placeholder="Email" required="" name="email" id="email"
                            class="rounded-0 my-2 form-control"> <span style="color:red">{{session('emailexist')}}</span>
                            <span id="emailmsg"></span></div>
                    <div><input placeholder="Enter your  password" type="password" id="password" name="password"
                            class="rounded-0 my-2 form-control"></div>
                            <div><input placeholder="Confirm Password" type="password" id="password" name="password"
                            class="rounded-0 my-2 form-control"></div>
                    <div class="loginbutton"><button type="submit" class="btn btn-dark" onclick='Javascript:checkEmail();'>Register</button></div>
                </form>
            </div>
        </div>
    </div>
    @include('frontend/includes/footer')
</body>
<script src="{{url('front-end/js/bootstrap.min.js')}}"></script>
  <script src="{{url('front-end/js/scriptfont.js')}}"></script>
  <script src="{{url('front-end/js/jquery.min.js')}}"></script>

</html>