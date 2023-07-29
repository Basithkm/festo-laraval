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
                             <a href="{{URL::to('customer')}}" class="backicon"><i class="mdi mdi-backburger"></i></a>
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
                  <form class="form-sample"  action="{{url('/add-new-color-product')}}" method="post" enctype="multipart/form-data"  id="theform">
                          {{csrf_field()}}
                    <div class="row">
                        
                    <input type="hidden" name="product_id" class="form-control" value="{{$view_prod->id}}" readonly >
                    <input type="hidden" name="product_code" class="form-control" value="{{$view_prod->product_id}}" readonly >
              

                      
                    <div class="col-md-12">
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Select Color</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                     
                        <input type="text" name="product_name" id="product_name" class="form-control" value="{{$view_prod->product_name}}"   required="">
                        </div>
                      </div>
                      </div>
                      
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Select Color</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <select class="form-control" name="color_name" required="">
                            <option value="0">Select Color</option>
                             @foreach($attribute as $attri)
                             <option value="{{$attri->attribute_value_id}}">{{ $attri->attribute_value}}</option>
                                @endforeach
                             </select>
                          </div>
                        </div>
                      </div>


                      <div class="col-md-12">
                        <div class="form-group row">
                        
                        <label class="col-sm-2 col-form-label">Main Images</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <input type="file"  name="image" required="" value=""/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Images 1</label>
                          <div class="col-sm-9">
                          <input type="file"  name="image1"  value=""/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Images 2</label>
                          <div class="col-sm-9">
                          <input type="file"  name="image2"  value=""/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Images 3</label>
                          <div class="col-sm-9">
                          <input type="file"  name="image3"  value=""/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Images 4</label>
                          <div class="col-sm-9">
                          <input type="file"  name="image4"  value=""/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Description</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <textarea class="form-control" name="product_desc" id="body" >{{$view_prod->product_desc}}</textarea>
                          </div>
                        </div>
                      </div>
                    

                      <div class="col-md-12">
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Product Price</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <input type="number" name="product_price" id="product_price" class="form-control" value="{{$view_prod->product_price}}" step=".001"  required="" min="0">
                                <span id="errmsg" style="color:red;"></span>
                          </div>
                        </div>
                      </div>

           


                      
                      <div class="col-md-12">
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Product Offer Price</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <input type="number" name="product_offer" id="product_price_offer" class="form-control" value="{{$view_prod->product_price_offer}}" step=".001"  required="">
                          </div>
                        </div>
                      </div>

                                       
                      <div class="col-md-12">
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Product Premium Price</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <input type="number" name="product_premium_offer" id="product_premium_offer" value="{{$view_prod->product_premium_offer}}" class="form-control" step=".001"  required="">
                          </div>
                        </div>
                      </div>
                   


                      <div class="col-md-12">
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Quantity</label>
                          <div class="col-sm-9">
                          <input type="number" name="product_qty" min="0" max="100" class="form-control"  required=""> 
                          </div>
                        </div>
                      </div>
                     
                      <div class="col-md-12">
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <select class="form-control" name="pro_status" placeholder="Meta Tag Keywords" required="">
                                    <option value="">---Select---</option>
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                </select>
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
                <div class="table-responsive">
             
                    <table class="table table-hover" >
                      <thead>
                        <tr>
                       
                                  
                                        <th>ID</th>
                                        <th>Sort</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                        
                                       
                        </tr>
                      </thead>
                      <tbody>
                          @if($products)
                        @foreach($products as $key=>$product)
                        <tr>
                          
                       
                             <td>{{$product->product_id}}</td>
                             <td>{{$product->sort_order}}</td>
                             <td>{{$product->product_name}}</td>
                            <td> <a href="{{url('view-product/'.$product->id)}}" class="btn btnsmall btn-outline-secondary btn-icon-text" >View</a>
                           
                        <a href="{{url('add-image/'.$product->id)}}" class="btn btnsmall  btn-outline-secondary btn-icon-text">
                          Add Image
                          <i class="ti-reload btn-icon-prepend"></i>

                        </a>
                          </td>
                           
                        </tr>
                         @endforeach
                         @endif
                       
                      </tbody>
                    </table>
         
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