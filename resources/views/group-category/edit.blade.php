@extends('layout.layout')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin createtable">
              <div class="card">
                <div class="card-body">
           
                  
                        <div class="row">
                        <div class="col-md-6">
                                 <h4 class="card-title">Edit Category</h4>
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
        <form action="{{url('group-update-category')}}" method="post" enctype="multipart/form-data">
                          
                           {{csrf_field()}}
                    <div class="row">
                    <input type="hidden" name="category_id" value="{{ $ed_cat->id}}">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Category Name</label>
                          <div class="col-sm-9">
                          <input type="text" name="category" class="form-control" data-toggle="tooltip" data-placement="bottom" title="Category Name" value="{{ $ed_cat->group_name}}">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Group Category</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <select class="form-control" name="sub_cate_name" required="">
                                          <option value="0">Select</option>
                                            @foreach($category as $category)

                                           @if($category->id==$ed_cat->sub_categoryid)
                                           <option selected value="{{$category->id}}">{{ $category->sub_cat_name }}</option>
                                           @else
                                    <option value="{{$category->id}}">{{ $category->sub_cat_name }}</option>
                                           @endif

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