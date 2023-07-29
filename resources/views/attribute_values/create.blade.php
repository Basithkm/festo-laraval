@extends('layout.layout')
@section('content')

<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin createtable">
              <div class="card">
                <div class="card-body">
           
                  
                        <div class="row">
                        <div class="col-md-6">
                                 <h4 class="card-title">Add Attribute</h4>
                        </div>
                           <div class="col-md-6 heading">
                             <a href="{{URL::to('attribute-values')}}" class="backicon"><i class="mdi mdi-backburger"></i></a>
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
                  <form class="form-sample"  action="{{url('add-new-value')}}" method="post" enctype="multipart/form-data"  >
                          {{csrf_field()}}
                    <div class="row">
                        
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Attribute Name</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <input type="text" name="attr_val" class="form-control"  required="">
                          </div>
                        </div>
                      </div>
                                            
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label"> Category</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <select class="form-control" name="attr_name" required="">
                                          <option value="0">Select</option>
                                            @foreach($attributes as $attri)

                                           
                                    <option value="{{$attri->attribute_id}}">{{ $attri->attribute_name }}</option>
                                           

                                           @endforeach
                                    
                                        </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Color Code</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <input type="text" name="hex_val" class="form-control">
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