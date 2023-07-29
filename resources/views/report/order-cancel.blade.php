@extends('layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <h4 class="card-title">Cancel Order List (Last 100 Records)</h4></h4>
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
                                        <th width="5%">Id</th>
                                        <th width="14%">Order Number</th>
                                        <th width="19%">Customer Name</th>
                                        <th width="10%">Mobile</th>
                                        <th width="3%">Currency</th>
                                        <th width="8%">Amount</th>
                                        <th width="9%">Status</th>
                                        <th width="20%">Added Date</th>                                     
                                        <th>Action</th>
                                    </tr>
                      </thead>
                      <tbody>
<?php $i='0'; ?>
            @foreach($ad_orders as $ad_orderss)  
          
     <?php $i++; ?>                                <tr>
                                       <td>{{$i}}</td>
                                        <td>{{ $ad_orderss->order_number}}</td>
                                        <td>{{ $ad_orderss->customer_name}}</td>
                                        <td>{{ $ad_orderss->customer_mob}}</td>
                                        <td>{{ $ad_orderss->currency}}</td>
                                        <td>{{ $ad_orderss->total_amnt}}</td>
                                        <td>@if($ad_orderss->name=='Canceled') <span style="color:red;">Canceled</span> @elseif($ad_orderss->name=='Complete') <span style="color:green;">Complete</span> @else <span style="color:blue;">{{ $ad_orderss->name }}</span>  @endif</td>
                                        <td>{{ $ad_orderss->created_at}}</td>


                                        

                                        <td>
                                            
                                    <a href="{{url('view-order-list/'.$ad_orderss->order_id)}}" class="btn btnsmall btn-outline-secondary btn-icon-text"><i class="zmdi zmdi-eye zmdi-hc-fw"></i>View</a>                                      
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
