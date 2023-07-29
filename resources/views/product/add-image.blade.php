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
                             <!-- <a href="{{URL::to('customer')}}" class="backicon"><i class="mdi mdi-backburger"></i></a> -->
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
                  <form class="form-sample"  action="{{url('/add-new-image-product')}}" method="post" enctype="multipart/form-data"  id="theform">
                          {{csrf_field()}}
                    <div class="row">
                        
                    <input type="hidden" name="product_id" class="form-control" value="{{$view_prod->id}}" readonly required="">
                    <input type="hidden" name="product_code" class="form-control" value="{{$view_prod->product_id}}" readonly  required="">
              

                      <div class="col-md-12">
                        <div class="form-group row">
                        
                        <label style="color: Red;">{{$view_prod->product_name}}</label>
                        </div>
                      </div>



   

                      <div class="col-md-12">
                        <div class="form-group row">
                        
                        <label class="col-sm-2 col-form-label">Images</label><span style="color:red">*</span>
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



                        
                        
                        
                      </div>
                
                <div class="submitbutton">
                    <button type="submit" class="btn btn-primary mb-2 submit">Submit<i class="fas fa-save"></i>


</button>
                    </div>
                    
                    
                    
                  </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover" id="value-table">
                      <thead>
                        <tr>
                                        <th>Image</th>
                                        <th>Action</th>
                                              
                        </tr>
                      </thead>
                      <tbody>
                          @if($img)
                        @foreach($img as $mg)
                        <tr>
                          
                       
                             <td><img src="{{url('/uploads/product/thumb_images/'.$mg->images) }}" alt="" width="130px" height="130px"></td>
                             
                            <td> <a href="{{url('delete-product-image/'.$mg->image_id)}}" class="btn btnsmall btn-outline-warning btn-icon-text" >Delete</a>
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
</body>
</html>

       
@endsection