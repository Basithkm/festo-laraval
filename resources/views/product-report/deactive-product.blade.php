@extends('layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">Product List</h4>
                    </div>
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12 exelbuton" style="text-align:end;">
                             <button type="button" class="btn btn-sm btn-primary toexel" id="myexel" target="_blank"><i class="fa fa-file-excel-o" aria-hidden="true"></i> To Excel</button>
                    </div>
                       
                   
                </div>
                  <p class="card-description">
                
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover" id="value-table">
                      <thead>
                        <tr>
                       
                                  <td></td>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                        
                                       
                        </tr>
                      </thead>
                      <tbody>
                          
                        @foreach($products as $key=>$product)
                        <tr>
                          
                       <td><a href="{{url('view-product/'.$product->id)}}" class="btn btnsmall btn-outline-secondary btn-icon-text" >View</a></td>
                             <td>{{$product->product_id}}</td>
                             <td>{{$product->product_name}}</td>
                            <td> 
                            <a href="{{url('add-color/'.$product->id)}}" class="btn btnsmall btn-outline-warning btn-icon-text">
                          Add Color
                          <i class="ti-reload btn-icon-prepend"></i>

                        </a>
                        <a href="{{url('add-image/'.$product->id)}}" class="btn btnsmall  btn-outline-secondary btn-icon-text">
                          Add Image
                          <i class="ti-reload btn-icon-prepend"></i>

                        </a>
                          </td>
                           
                        </tr>
                         @endforeach
                        
                       
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
