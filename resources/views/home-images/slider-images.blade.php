@extends('layout.layout')
@section('content')

<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin createtable">
              <div class="card">
                <div class="card-body">
           
                  
                        <div class="row">
                        <div class="col-md-6">
                                 <h4 class="card-title">Add Slider image</h4>
                        </div>
                           <div class="col-md-6 heading">
                             <a href="{{URL::to('slider-images')}}" class="backicon"><i class="mdi mdi-backburger"></i></a>
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
        ADD HOME SLIDER IMAGE --WEB ( 1268 X 330 ) 
        <!-- ----- APP ( 708 X 369 ) -->

                  <form class="form-sample"  action="{{url('/add-slider-img')}}" method="post" enctype="multipart/form-data"  >
                          {{csrf_field()}}
                    <div class="row">
                        
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Choose language</label>
                          <div class="col-sm-9">
                          <select name="image_for" required class="form-control">
                
                   <option selected value="english">English</option>
              
                    <!-- <option value="app">App (Size 708*369)</option> -->
               </select>
                                <i class="form-group__bar"></i>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Slider Images</label>
                          <div class="col-sm-9">
                          <input type="file" class="form-control"   name="image" required value=""/>
                         
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