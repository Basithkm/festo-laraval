@extends('layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <h4 class="card-title">Normal Customers</h4></h4>
                        </div>
                           <div class="col-md-6 col-sm-6 col-xs-12   heading">
                           
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                 
                  <p class="card-description">
                
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover" id="value-table">
                      <thead>
                      <tr >      
                                        <th  width="3%">Id</th>
                                        <th width="15%">Name</th>
                                        <th width="5%">Type</th>
                                        <th width="10%">Email</th>
                                        <th width="10%">Mobile</th>
                                        <th width="10%"> Date</th>
                                        <th width="5%">Status</th>                                     
                                        <th>Action</th>
                                    </tr>
                      </thead>
                      <tbody>
<?php $i='0'; ?>
                                    @foreach($customers as $customers)
                                     <?php $i++; ?>
                                    <tr>
                                        <td>{{ $customers->customer_id }}</td>
                                        <td>{{ $customers->customer_name}}</td>
                                        <td>{{ $customers->group_name}}</td>
                                        <td>{{ $customers->customer_email}}</td>
                                        <td>{{ $customers->customer_mobile}}</td>
                                        <td>{{ $customers->created_at}}</td>
                                        <?php  
                                        $stat = $customers->status;
                                        if ($stat=='0') { ?>

                                            <td><img src="{{url('/uploads/images/disable.png') }}" alt="" width="30px" height="30px"></td>

                                       <?php }else{ ?>

                                        <td><img src="{{url('/uploads/images/enable.png') }}" alt="" width="30px" height="30px"></td>

                                     <?php  }
                                        ?>


                                        

                                         <td>

                                        <a href="{{url('view-ad-customer/'.$customers->customer_id)}}" class="btn btnsmall btn-outline-secondary btn-icon-text">View</a>
                                         <?php  
                                        $stat = $customers->status;
                                        if ($stat=='0') { ?>

                                           <a href="{{url('unblock-customer/'.$customers->customer_id)}}" onclick="return confirm('Are you sure you want to unblock this User');" class="btn btn-outline-success btn-fw">Unblock</a>

                                       <?php }else{ ?>

                                      <a href="{{url('block-customer/'.$customers->customer_id)}}" onclick="return confirm('Are you sure you want to block this User');" class="btn btn-outline-danger btn-fw">Block</a>

                                     <?php  }
                                        ?>
                                        

                                        
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
