@extends('layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <h4 class="card-title">View Customers</h4></h4>
                        </div>
                           <div class="col-md-6 col-sm-6 col-xs-12   heading">
                            
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                 
                  <p class="card-description">
                
                  </p>
                  
  <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Customer  Details</h4>
                         @foreach($view_cust as $view_cust)
                        
                        <table class="table table-dark mb-0">
                            
                            <tbody>
                            <tr>
                                <th scope="row">Customer Name</th>
                                <td>{{ $view_cust->customer_name}}</td>
                                
                            </tr>
                            
                            <tr>
                              <th scope="row">Customer Email</th>
                               <td>
                              <?php if (!$view_cust->customer_email) {
                                    echo "Not Specified";
                                } ?>
                             
                             
                             {{ $view_cust->customer_email}}</td>
                            
                                
                            </tr>
                            <tr>
                                <th scope="row">Mobile</th>
                                <td>
                                <?php if (!$view_cust->customer_mobile) {
                                    echo "Not Specified";
                                } ?>
                                {{ $view_cust->customer_mobile}}</td>
                                
                            </tr>
                             <tr>
                                <th scope="row">Address</th>
                                <td><?php if (!$view_cust->customer_address) {
                                    echo "Not Specified";

                                } ?>{{ $view_cust->customer_address}}</td>
                                
                            </tr>
                            
                            <tr>
                                <th scope="row">City</th>
                                <td><?php if (!$view_cust->customer_dist) {
                                    echo "Not Specified";
                                } ?>{{ $view_cust->customer_dist}}</td>
                                
                            </tr>

                             
                             <tr>
                                <th scope="row">Pin Number</th>
                                <td><?php if (!$view_cust->customer_pincode) {
                                    echo "Not Specified";
                                } ?>{{ $view_cust->customer_pincode}}</td>
                                
                            </tr>
                          
                           
                             
                            </tbody>
                        </table>
                        @endforeach
                    </div>
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
