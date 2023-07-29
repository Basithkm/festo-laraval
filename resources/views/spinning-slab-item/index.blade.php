@extends('layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <h4 class="card-title">slab-item List</h4></h4>
                        </div>
                           <div class="col-md-6 col-sm-6 col-xs-12   heading">
                             <a href="{{URL::to('spinning-wheel-slab-item/create')}}" class="newicon"><i class="mdi mdi-new-box"></i></a>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                 
                  <p class="card-description">
                
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover" id="value-table">
                      <thead>
                        <tr>
                       
                        <th width="30%">Product</th>
                                        <th width="30%"> Slab</th>
                                                                   
                                        <th  width="20%"> Image</th>
                                        <th  width="20%"> Action</th>
                        </tr>
                      </thead>
                      <tbody>
                 
                            @if(count($category))
                            @foreach($category as $category)
                            <tr>
                              
                            <td>{{$category->name}}</td>

                                    @foreach($category->slab as $slabitem)
                                     <td>{{$slabitem->slab_name}}</td>
                                     @endforeach
                                       
                            
                                        <td> <img src="{{url('/uploads/spinning/'.$category->image) }}" alt="" width="130px" height="130px"></td>

                                        <td><a href="{{url('spinning-wheel-slab-edit/'.$sla->id)}}" class="btn btnsmall btn-outline-secondary btn-icon-text">Edit<i class="zmdi zmdi-edit zmdi-hc-fw"></i></a>

                                            <a href="{{url('spinning-wheel-slab-item-delete/'.$category->id)}}"  onclick="return confirm('Are you sure you want to delete');" class="btn btnsmall btn-outline-secondary btn-icon-text"><i class="zmdi zmdi-delete zmdi-hc-fw"></i>Delete</a></td>

                                       
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
let button = document.querySelector("#myexel");

button.addEventListener("click", e => {
  let table = document.querySelector("#value-table");
  TableToExcel.convert(table);
});
</script>
@endsection
