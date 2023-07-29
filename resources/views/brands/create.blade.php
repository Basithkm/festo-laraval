@extends('layout.layout')
@section('content')

<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin createtable">
              <div class="card">
                <div class="card-body">
           
                  
                        <div class="row">
                        <div class="col-md-6">
                                 <h4 class="card-title">Add Brand</h4>
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
        <form action="{{url('add-new-brand')}}" method="post" enctype="multipart/form-data">

{{csrf_field()}}
                    <div class="row">
                        
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Brand Name</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <input type="text" name="brand_name" placeholder="Enter Brand name" class="form-control"  required="">
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Brand Name (Arabic)</label>
                          <div class="col-sm-9">
                          <input type="text" name="brand_name_arabic" placeholder="Enter Brand name" class="form-control"  required="">
                          </div>
                        </div>
                      </div>
                           
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">URL Word</label>
                          <div class="col-sm-9">
                          <input type="text" name="url_word" placeholder="Enter URL word for the brand" class="form-control"  required="">
                          </div>
                        </div>
                      </div>
            
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Logo</label>
                          <div class="col-sm-9">
                          <input type="file" name="logo" id="imgInp" class="dropzone dz-clickable" required="" placeholder="Meta Tag Keywords">
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