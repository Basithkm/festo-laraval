@extends('layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <h4 class="card-title">Product Details</h4></h4>
                        </div>
                           <div class="col-md-6 col-sm-6 col-xs-12   heading">
                           
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                 
                  <p class="card-description">
                
                  </p>
                  <div class="table-responsive">
                  <table class="table table-dark mb-0">
                            <thead>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Price</th>
                            </thead>
                            @foreach($product as $productss)
                            <tbody>
                            <tr>
                                <td>{{$productss->product_id}}</td>
                                <td>{{$productss->product_name}}</td>
                                <td>{{$productss->product_price}}</td>
                                
                            </tr>
                            
                           
                            
                             

                             
                            </tbody>
                             @endforeach
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
