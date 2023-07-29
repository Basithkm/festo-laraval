@extends('layout.layout')
@section('content')

<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin createtable">
              <div class="card">
                <div class="card-body">
           
                  
                        <div class="row">
                        <div class="col-md-6">
                                 <h4 class="card-title">Add Advertisment</h4>
                        </div>
                           <div class="col-md-6 heading">
                             <a href="{{URL::to('advertisment')}}" class="backicon"><i class="mdi mdi-backburger"></i></a>
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
                  <form class="form-sample"  action="{{url('/add-new-ads')}}" method="post" enctype="multipart/form-data"  >
                          {{csrf_field()}}
                    <div class="row">
                        
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Select Page</label>
                          <div class="col-sm-9">
                          <select  name="page" class="form-control" placeholder="Advertisment Page" required="">
                                  <option value="">Select Page</option>
                                     <!-- <option value="accessories-app">App(small) Accessories - 708*369</option> -->
                                    

                                     <option value="men-web">Web(Large) Men - 1349*369</option>
                                     <option value="women-web">Web(Large) Women - 1349*369</option>
                                     <option value="kids-web">Web(Large) Kids - 1349*369</option>
                                     <option value="footweare-web">Web(Large) Footweare - 1349*369</option>
                                     <option value="bags-web">Web(Large) Bags - 1349*369</option>
                                     <option value="kitchen_home-web">Web(Large) Kitchen& Home Appliance - 1349*369</option>
                                     <option value="sports-web">Web(Large) Sports - 1349*369</option>
                                     <option value="toys-web">Web(Large) Toys - 1349*369</option>
                                   

                                </select>
                                <i class="form-group__bar"></i>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Image</label>
                          <div class="col-sm-9">
                          <input type="file" name="image" id="dropzone-upload" class="dropzone dz-clickable" placeholder="image">
                          </div>
                        </div>
                      </div>
                           
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Product</label>
                          <div class="col-sm-9">
                          <select class="form-control" name="url" required="">
                                    <option value="">----Select Ad URL Link----</option>
                                    @foreach($products as $productss)
                                    <option value="{{$productss->product_id}}">{{$productss->product_name}}</option>
                                    @endforeach
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
              </div>
            </div>
          </div>
            </div>
               
@endsection
@section('script')

@endsection