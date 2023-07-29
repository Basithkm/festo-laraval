@extends('layout.layout')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin createtable">
              <div class="card">
                <div class="card-body">
           
                  
                        <div class="row">
                        <div class="col-md-6">
                                 <h4 class="card-title">Edit Route Place</h4>
                        </div>
                           <div class="col-md-6 heading">
                             <a href="{{URL::to('route-place')}}" class="backicon"><i class="mdi mdi-backburger"></i></a>
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
                  <form class="form-sample"  action="{{url('route-place/update')}}" method="post" enctype="multipart/form-data"  >
                          {{csrf_field()}}
                    <div class="row">
                    <input type="hidden" value="{{$place->id}}" name="id">
                    <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Place Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Place Name" name="place_name" value="{{$place->place_name}}"  required  />
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Route </label>
                          <div class="col-sm-9">
                          <select class="form-control" name="route_id" id="route_id">
                    @foreach($route as $rout)
                    @if($place->cluster_id==$rout->id)
                    <option selected value="{{$place->route_id}}">{{$rout->route_name}}</option>
                @else
                      <option value="{{$rout->id}}">{{$rout->route_name}}</option>
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
<script src="{{url('front-end/assets/js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $('#cluster_id').change(function(){
        var cluster_id=$(this).val();

$.ajax({
         type:"GET",
         url:"{{url('/get-branch')}}?cluster_id="+cluster_id,
         success:function(res){  

console.log(res);

 if(res){
   $("#branch_id").empty();

              $("#branch_id").append('<option value="">Select Branch</option>');
              $.each(res, function (id, value)  
              {  

                   $("#branch_id").append('<option style="text-transform: uppercase;" value="'+id+'">'+value+'</option>'); 
              });  
         
          }else{
             $("#branch_id").empty();
          }

         }

       });
      });
 
    });
      </script>
@endsection