@extends('layout.layout')
@section('content')

<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin createtable">
              <div class="card">
                <div class="card-body">
           
                  
                        <div class="row">
                        <div class="col-md-6">
                                 <h4 class="card-title">Edit Brand</h4>
                        </div>
                           <div class="col-md-6 heading">
                             <a href="{{URL::to('brands')}}" class="backicon"><i class="mdi mdi-backburger"></i></a>
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
        <form action="{{url('update-brands')}}" method="post" enctype="multipart/form-data">

        @foreach($ed_brand as $ed_brand)
                           {{csrf_field()}}
                           <input type="hidden" name="brand_id" value="{{ $ed_brand->brands_id}}">
                    <div class="row">
                        
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Brand Name</label>
                          <div class="col-sm-9">
                          <input type="text" name="brand_name" placeholder="Enter Brand name" class="form-control" value="{{ $ed_brand->brands_name}}" required="">
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Brand Name (Arabic)</label>
                          <div class="col-sm-9">
                          <input type="hidden" name="brand_id" value="{{ $ed_brand->brands_id}}">

                                <input type="text" name="brand_name_arabic" placeholder="Enter Brand name" class="form-control" value="{{ $ed_brand->brands_name_arabic}}" required="">
                          </div>
                        </div>
                      </div>
                           
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">URL Word</label>
                          <div class="col-sm-9">
                          <input type="text" name="url_word" value="{{ $ed_brand->url_word}}" placeholder="Enter URL word for the brand" class="form-control"  required="">
                          </div>
                        </div>
                      </div>
            
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Logo</label>
                          <div class="col-sm-9">
                          <input type="file" name="logo" id="imgInp" class="dropzone dz-clickable" placeholder="Meta Tag Keywords" value="{{ $ed_brand->brand_image}}"><br>
                                <span><img src="{{url('/uploads/brands/logo/'.$ed_brand->brand_image) }}" alt="" width="150px" height="100px"></span>
                          </div>
                        </div>
                      </div>
             
                        
                        
                      </div>
              
                
                    
                    
                    
                
                <div class="submitbutton">
                    <button type="submit" class="btn btn-primary mb-2 submit">Submit<i class="fas fa-save"></i>


</button>
                    </div>
                    @endforeach          
                    
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
            </div>
               
@endsection
@section('script')

@endsection