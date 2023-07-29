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
        <form action="{{url('update-values')}}" method="post" enctype="multipart/form-data">
                          
                           {{csrf_field()}}
                    <div class="row">
                    <input type="hidden" name="attr_value_id" value="{{ $attributes_value->attribute_value_id}}">

                    <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Attribute Name</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <input type="text" name="attr_val" class="form-control" value="{{$attributes_value->attribute_value}}"  required="">
                          </div>
                        </div>
                      </div>
                                            
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label"> Category</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <select class="form-control" name="attr_name" required="">
                                         
                                            @foreach($attributes as $attri)

                                           @if($attributes_value->attribute_id==$attri->attribute_id)
                                    <option seleted value="{{$attri->attribute_id}}">{{ $attri->attribute_name }}</option>
                                    @else
                                    <option  value="{{$attri->attribute_id}}">{{ $attri->attribute_name }}</option>
                                    @endif
                                           

                                           @endforeach
                                    
                                        </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Color Code</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <input type="text" name="hex_val_ed" value="{{$attributes_value->attribute_color_code}}" class="form-control">
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