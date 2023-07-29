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
                             <a href="{{URL::to('accountant')}}" class="backicon"><i class="mdi mdi-backburger"></i></a>
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
        <form action="{{url('update-category')}}" method="post" enctype="multipart/form-data">
                            @foreach($ed_cat as $ed_cat)
                           {{csrf_field()}}
                    <div class="row">
                    <input type="hidden" name="category_id" value="{{ $ed_cat->cat_id}}">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Category Name</label>
                          <div class="col-sm-9">
                          <input type="text" name="category" class="form-control" data-toggle="tooltip" data-placement="bottom" title="Category Name" value="{{ $ed_cat->cat_name}}">
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Category Name (Arabic)</label>
                          <div class="col-sm-9">
                          <input type="hidden" name="category_id" value="{{ $ed_cat->cat_id}}">
                                <input type="text" name="category_arabic" class="form-control" data-toggle="tooltip" data-placement="bottom" title="Category Name" value="{{ $ed_cat->cat_name_arabic}}">
                          </div>
                        </div>
                      </div>
                           
                    

                            <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Sort Order</label>
                          <div class="col-sm-9">
                          <input type="number" min="0"  class="form-control" name="order" value="{{ $ed_cat->sort_order}}">
                          </div>
                        </div>
                      </div>


                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Parent category</label>
                          <div class="col-sm-9">
                          <select class="form-control" name="parent_category_ed" data-toggle="tooltip" title="Parent category">
                                    <?php 
                                        $parnt_nme = DB::table('category')
                                                    ->where('cat_id','=',$ed_cat->parent_id)
                                                    ->get();
                                    ?>
                                    @foreach($parnt_nme as $parnt_nme)
                                    <option selected="" value="{{ $parnt_nme->cat_id }}" style="color: #32c787;">{{ $parnt_nme->cat_name }}</option>
                                    @endforeach
                                    <option value="0">Parent Category</option>
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
                          <input type="file" name="image" value="{{ $ed_cat->cat_image }}" >
                                <span><img src="{{url('/uploads/category/thumb_images/'.$ed_cat->cat_image) }}" alt="" width="100px" height="100px"></span>
                          </div>
                        </div>
                      </div>

                        <div class="col-md-12">
                        <div class="form-group row">
                           
                    
                          <label class="col-sm-2 col-form-label">  <label for="exampleInputCity1">Status</label></label>
                          <div class="col-sm-9">
                          <select class="form-control" name="status" data-toggle="tooltip" title="Status" required="">
                                    <?php
                                    $stat = $ed_cat->status;
                                    if ($stat=='0') { ?>
                                        <option selected="" value="0">Disabled</option>
                                   <?php  }else{ ?>
                                        <option selected="" value="1">Enabled</option>
                                  <?php  }
                                    ?>
                                    <option value="" disabled>--Select Status--</option>
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