@extends('layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <h4 class="card-title">Purchase List (Last 100 Records)</h4></h4>
                        </div>
                           <div class="col-md-6 col-sm-6 col-xs-12   heading">
                          
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                 
                  <p class="card-description">
                
                  </p>
                  <form class="form-sample"  action="{{url('purchase-date-wise')}}" method="get" >
                          {{csrf_field()}}
                    <div class="row">
                        
                        <div class="col-md-4 col-sm-6 col-xs-12 mt-2">
                        <input type="date" name="from_date" value="{{ now()->format('Y-m-d') }}" class="form-control">
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 mt-2">
                        <input type="date" name="to_date" value="{{ now()->format('Y-m-d') }}" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12 mt-2">
                    <div class="submitbutton">
                    <button type="submit" class="btn btn-primary mb-2 submit">Get


</button>
</div>

                    </div>
                    </div>
</form>
                  <div class="table-responsive">
                    <table class="table table-hover" id="value-table">
                      <thead>
                        <tr>
                        <th width="5%">Id</th>
                                        <th width="5%">Purchase Id</th>
                                        <th width="20%">User Name</th>
                                       
                                        <th width="15%">Sub Total</th>
                                        <th width="25%">Purchase On</th>                                     
                                        <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $i='0'; ?>
                                    @foreach($purchase as $purchase)
                                    <?php $i++; ?>
                                    <tr>
                                         <td>{{$i}}</td>
                                         <td>{{ $purchase->purchase_id}}</td>
                                        <td> <?php
                                $customer = DB::table('customer_registration')
                                            ->where('customer_id',$purchase->customer_id)
                                            ->first();
                                ?>{{ $customer->customer_name}}</td>
                                     
                                        <td>{{ $purchase->product_sub_total}}</td>
                                        <td>{{ $purchase->purchase_date}}</td>
                                        <td>

                                        <a href="{{url('view-purchase-list/'.$purchase->purchase_id)}}" class="btn btnsmall btn-outline-secondary btn-icon-text"><i class="zmdi zmdi-eye zmdi-hc-fw"></i>View</a></td>
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
