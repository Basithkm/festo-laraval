@extends('layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <h4 class="card-title">View Purchase</h4></h4>
                        </div>
                           <div class="col-md-6 col-sm-6 col-xs-12   heading">
                          
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                 
                  <p class="card-description">
                
                  </p>
                  <div class="form-group">
                                <label>Customer</label>
                                <?php
                                $customer = DB::table('customer_registration')
                                            ->where('customer_id',$view_purchase->customer_id)
                                            ->first();
                                ?>
                               
                                <h5>{{ $customer->customer_name}}</h5>
                         
                                <i class="form-group__bar"></i>
                            </div>
                            <div class="form-group">
                              <?php
                              $customer  = DB::table('customer_group')
                                          ->where('group_id','=',$view_purchase->customer_type)
                                          ->get();
                              ?>
                                <label>Customer Type</label>
                                @foreach($customer as $customer)
                                <h5>{{ $customer->group_name }}</h5>
                               @endforeach
                                <i class="form-group__bar"></i>
                            </div>
                  <div class="table-responsive">
                    <table class="table table-hover" id="value-table">
                      <thead>
                      <tr class="text-uppercase">
                                    <th>ITEM DESCRIPTION</th>
                                    <th>QUANTITY</th>
                                    <th>ADDON</th>
                                    <th>UNIT PRICE</th>
                                    <th>TOTAL</th>
                                </tr>
                      </thead>
                      <tbody>
                      <?php
                                     
                                  $arr_product = $view_purchase->products;

                                  $exp_product = json_decode($arr_product);
                                  $dat = gettype($exp_product);
                                 $tottal ="0";
                                    
                                  ?>
                                 
                                 @foreach($exp_product as $exp_product)
                                 <?php
                                  $tottal = $tottal+ $exp_product->subtotal;
                                  

                                  ?>


                                    <tr>

                                        <td>{{ $exp_product->name }} {{ $exp_product->options->size}}</td>
                                        <td class="text-right">{{ $exp_product->qty }}</td>
                                       
                                     

                                        <td class="text-right">{{ $exp_product->price }}</td>
                                        
                                        <td class="text-right">{{ $exp_product->qty*$exp_product->price }}</td>
                                        <?php  $b = str_replace( ',', '', $tottal ); ?>


                                       
                                    </tr>
                                  @endforeach

                                
                                <tr>
                                        <td class="text-right" colspan="4" >
                                          Shipping Charge
                                        </td>
                                          @if($b>=30)
                                    <?php $a='0'; ?>
                                        <td class="text-right">Free</td>

                                        @else
                                          <?php $a='1'; ?>
                                        <td class="text-right">KWD 1.00 </td>

                                        @endif
                                  </tr>
                                  <tr>
                                        <td class="text-right" colspan="4" >
                                          Total Amount
                                        </td>
                                        <td class="text-right">KWD
                                          <?php
                                          echo $b+$a;
                                          ?>
                                        </td>
                                  </tr>

                       
                      </tbody>
                    </table>
                  </div>
                  
                  <div class="form-group">
                                <label>Purchase Date</label>
                                <h5>{{ $view_purchase->purchase_date}}</h5>
                                <i class="form-group__bar"></i>
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
