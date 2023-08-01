@extends('layout.layout')
@section('content')

<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin createtable">
              <div class="card">
                <div class="card-body">
           
                  
                        <div class="row">
                        <div class="col-md-6">
                                 <h4 class="card-title">Add Item</h4>
                        </div>
                           <div class="col-md-6 heading">
                             <a href="{{URL::to('spinning-wheel-slab-item/index')}}" class="backicon"><i class="mdi mdi-backburger"></i></a>
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
                  <form class="form-sample"  action="{{url('spinning-wheel-slab-item-store')}}" method="post" enctype="multipart/form-data"  >
                          {{csrf_field()}}
                    <div class="row">
                        
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label" >Name</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                          <input type="text" name="name" class="form-control"  required="">
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label" >Slab</label><span style="color:red">*</span>
                          <div class="col-sm-9">
                       
                          <select class="form-control" name="slab_id" required="">
                                          <option value="0">Select</option>
                                            @foreach($slab as $slabitem)
                                           
                                    <option value="{{$slabitem->id}}">{{ $slabitem->name }} ({{ $slabitem->min_price }}-{{ $slabitem->max_price }})</option>

                                           @endforeach
                                    
                                        </select>
                                       
                           
             
                                    
                                        </select>
                          </div>
                        </div>
                      </div>
                      
            
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label"> Display Image</label>
                          <div class="col-sm-9">
                          <input type="file"  name="image" required="" value=""/>
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