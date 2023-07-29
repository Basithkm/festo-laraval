@extends('layout.layout')
@section('content')

<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin createtable">
              <div class="card">
                <div class="card-body">
           
                  
                        <div class="row">
                        <div class="col-md-6">
                                 <h4 class="card-title">Add Category</h4>
                        </div>
                           <div class="col-md-6 heading">
                             <a href="{{URL::to('category/categories')}}" class="backicon"><i class="mdi mdi-backburger"></i></a>
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
                  <form class="form-sample"  action="{{url('add-new-category')}}" method="post" enctype="multipart/form-data"  >
                          {{csrf_field()}}
                    <div class="row">
                        
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Category Name</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <input type="text" name="category" class="form-control"  required="">
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Category Name (Arabic)</label>
                          <div class="col-sm-9">
                          <input type="text" name="category_arabic" class="form-control"  required="">
                          </div>
                        </div>
                      </div>
                           
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Parent category</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <select class="form-control" name="parent_category" >
                                    <option value="0">---Select---</option>
                                    @foreach($category as $category)

                                    <option value="{{$category->cat_id}}">{{$category->cat_name}}</option>
                                    @endforeach
                                   
                                </select>
                          </div>
                        </div>
                      </div>
            
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Category Display Image</label>
                          <div class="col-sm-9">
                          <input type="file"  name="image" required="" value=""/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                           
                    
                          <label class="col-sm-2 col-form-label">  <label for="exampleInputCity1">Status</label></label>
                          <div class="col-sm-9">
                          <select class="form-control" name="status" placeholder="Meta Tag Keywords" required="">
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
              </div>
            </div>
          </div>
            </div>
               
@endsection
@section('script')

@endsection