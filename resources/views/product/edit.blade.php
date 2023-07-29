@extends('layout.layout')
@section('content')

<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin createtable">
              <div class="card">
                <div class="card-body">
           
                  
                        <div class="row">
                        <div class="col-md-6">
                                 <h4 class="card-title">New Product</h4>
                        </div>
                           <div class="col-md-6 heading">
                           
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                    
                    <div class="row">
                    <br>
                   </div>
                
                  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
           
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div><br />
          @endif
          
        </div>
                  <form class="form-sample"  action="{{url('/update-product')}}" method="post" enctype="multipart/form-data"  id="theform">
                          {{csrf_field()}}
                    <div class="row">
                        
                <input type="hidden" name="id" value="{{$ed_prod->id}}">
        
              <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Product Name </label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <input type="text" name="product_name" class="form-control"  required="" value="{{$ed_prod->product_name}}">
                          </div>
                        </div>
                      </div>
                      
            
                      <div class="col-md-12">
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Description</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <textarea class="form-control" name="product_desc" id="body" >{!!$ed_prod->product_desc!!}</textarea>
                          </div>
                        </div>
                      </div>
 

                      <div class="col-md-12">
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Product Price</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <input type="number" name="product_price" id="product_price" class="form-control" step=".001" value="{{$ed_prod->product_price}}"  required="" min="0">
                                <span id="errmsg" style="color:red;"></span>
                          </div>
                        </div>
                      </div>


                      
                      <div class="col-md-12">
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Product Offer Price</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <input type="number" name="product_offer" id="product_price_offer"  class="form-control" step=".001" value="{{$ed_prod->product_price_offer}}"  required="">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Product Premium Price</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <input type="number" name="product_premium_offer" id="product_premium_offer"  class="form-control" step=".001" value="{{$ed_prod->product_premium_offer}}"  required="">
                          </div>
                        </div>
                      </div>
                      
                    <div class="col-md-12">
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Quantity</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <input type="number" name="product_qty" min="0" max="100" class="form-control" value="{{$ed_prod->product_qty}}"  required=""> 
                          </div>
                        </div>
                      </div>
                     
    

                        
                      </div>
                
                <div class="submitbutton">
                    <button type="submit" class="btn btn-primary mb-2 submit">Submit<i class="fas fa-save"></i>


</button>
                    </div>
                    
                    
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
            </div>
               
@endsection
@section('script')
<!-- <script src="{{url('front-end/assets/js/jquery-3.3.1.js')}}"></script> -->
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

<script>
    
  $(function()
  {
  
    $('#theform').submit(function(){
    
    $("input[type='submit']", this)
      
    .val("Please Wait...")
    
    .css("cursor", "not-allowed")
      
    .attr('disabled', 'disabled');
    
    return true;
  
    });
  
});
    

</script>


<script type="text/javascript">

    $(document).ready(function(){
      
     
      // $('textarea').ckeditor();
 
    });
      </script>
         <!-- App functions and actions -->
        <!-- <script src="{{url('assets/vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
         <script src="{{url('assets/vendors/bower_components/dropzone/dist/min/dropzone.min.js')}}"></script>

        <script src="{{url('assets/vendors/bower_components/autosize/dist/autosize.min.js')}}"></script> -->

         <!-- <script src="{{url('assets/js/app.min.js')}}"></script>
        <script src="{{url('assets/js/bootstrap-wysiwyg.js')}}"></script> -->
        <script>
ClassicEditor
.create( document.querySelector( '#body' ) )
.catch( error => {
console.error( error );
} );
</script>
<script>
ClassicEditor
.create( document.querySelector( '#body1' ) )
.catch( error => {
console.error( error );
} );
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

       
@endsection