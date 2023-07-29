@extends('layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                     <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">Route Place</h4>
                    </div>
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12  heading" style="text-align:end;">
                    <a href="{{URL::to('route-place/create')}}" class="newicon"><i class="mdi mdi-new-box"></i></a>
                    </div>
                       
                   
                </div>
                    

              

                    <!-- <div class="row ">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <h4 class="card-title">Route Place</h4></h4>
                        </div>
                           <div class="col-md-6 col-sm-6 col-xs-12   heading">
                             <a href="{{URL::to('route-place/create')}}" class="newicon"><i class="mdi mdi-new-box"></i></a>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div> -->
                 
                  <p class="card-description">
                
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover" id="value-table">
                      <thead>
                        <tr>
                          <th>Place Name</th>
                          <th>Route </th>
                          <th>Cluster</th>
                          <th>Branch</th>
                          <th>Status</th>
                           <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                            @if(count($place))
                        @foreach($place as $key=>$plce)
                        <tr>
                          <td>{{$plce->place_name}}</td>
                          @foreach($plce->route as $rt)
                          <td>{{$rt->route_name}}</td>
                          @endforeach
                          @foreach($plce->cluster as $cluster)
                          <td>{{$cluster->cluster_name}}</td>
                          @endforeach
                          @foreach($plce->branch as $branch)
                          <td>{{$branch->branch_name}}</td>
                          @endforeach
                        
                          <td>@if($plce->status==0)<label class="badge badge-danger">Deactive</label>@else<label class="badge badge-success">Active</label>@endif</td>
                          <td> 
                          <a href="route-place/edit/{{$plce->id}}" class="btn btnsmall  btn-outline-secondary btn-icon-text">
                          Edit
                          <i class="ti-file btn-icon-append"></i>                          
                        </a>
                        <!--@if($plce->status==0) <a href="route-place/active/{{$plce->id}}" class="btn btnsmall btn-outline-secondary btn-icon-text">Enable<i class="mdi mdi-account"></i> </a> @else <a href="route-place/deactive/{{$plce->id}}" class="btn  btnsmall btn-outline-secondary btn-icon-text">Disable<i class="mdi mdi-account-off"></i></a> @endif-->
                        </td>
                        </tr>
                         @endforeach
                          @endif
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
            
@endsection
@section('script')
<script>
    $(document).ready( function () {
    $('#value-table').DataTable();
} );
</script>
@endsection
