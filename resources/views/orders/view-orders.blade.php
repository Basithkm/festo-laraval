@extends('layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <h4 class="card-title">Order Details</h4></h4>
                        </div>
                           <div class="col-md-6 col-sm-6 col-xs-12   heading">
                          
                        </div>
                        <div class="col-md-6">
                        <a href="{{ url('/order_invoice/'. $view_orders->order_id)}}" class="btn btnsmall btn-outline-secondary btn-icon-text"  title="Print Invoice">Print Invoice</a>
                        </div>
                    </div>
                 
                  <p class="card-description">
                  <ul class="icon-list">
                                <li><i class="zmdi zmdi-card-travel zmdi-hc-fw"></i> IT CITY Online Store</li>
                                <li><i class="zmdi zmdi-money zmdi-hc-fw"></i>Amount: {{ $view_orders->currency }} {{ $view_orders->total_amnt }}</li>
                                <li><i class="zmdi zmdi-account-calendar zmdi-hc-fw"></i>Ordered Date: {{ $view_orders->created_at}}</li>
                                <li><i class="zmdi  zmdi-local-shipping zmdi-hc-fw"></i>Payment Method: {{ $view_orders->payment_method}}</li>
                            </ul>
                  </p>
                  <div class="card profile">
                        
                        <div class="profile__info">
                          <h3>Customer Details</h3>
                            
                            <ul class="icon-list">
                             

                                <li><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i>{{ $view_orders->customer_name}}</li>
                                <li><i class="zmdi zmdi-email-open zmdi-hc-fw"></i>{{ $view_orders->customer_email}}</li>
                                <li><i class="zmdi zmdi-phone-ring zmdi-hc-fw"></i>{{ $view_orders->customer_mob}}</li>
                                 <li><i class="zmdi zmdi-phone-ring zmdi-hc-fw"></i>{{ $view_orders->remarks}}</li>
                            </ul>
                        </div>
                        
                    </div>
                    <?php
                          $cust_id = $view_orders->customer_id;
                          $cust_det = DB::table('customer_registration')->where('customer_id','=',$cust_id)->get();
                          
                     ?>
                       <div class="row">
                       @foreach($cust_det as $cust_detail)
                   <div class="col-md-6">
                    <div class="card profile">
                        <div class="profile__info">
                          <h3>Payment Address</h3>
                            
                            <ul class="icon-list">
                             

                                <li><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i>{{$cust_detail->customer_name}}</li>

                                <li> <i class="zmdi zmdi-email-open zmdi-hc-fw"></i>Email: {{$cust_detail->customer_email}}, Contact: {{$cust_detail->customer_mobile}}</li>
                                
                                <li><i class="zmdi zmdi-pin zmdi-hc-fw"></i>Block Number: {{$cust_detail->customer_address}}, House/Building No:{{$cust_detail->customer_pincode}}, Place/area: {{$cust_detail->customer_state}}</li>
                                
                                <li><i class="zmdi zmdi-pin zmdi-hc-fw"></i>Address(street/Avenue number): {{$cust_detail->customer_dist}} </li>
                             
                          
                                <li><i class="zmdi zmdi-pin zmdi-hc-fw"></i>Kuwait</li>
                               
                               
                            </ul>
                        </div>
                       
                    </div>
                    </div>
                   
                    
                    <div class="col-md-6">
                     <div class="card profile">
                        
                        <div class="profile__info">
                          <h3>Shipping Address</h3>
                            
                            <ul class="icon-list">
                             
                                <li><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i>{{$cust_detail->customer_name}}</li>

                                <li> <i class="zmdi zmdi-email-open zmdi-hc-fw"></i>Email: {{$cust_detail->customer_email}}, Contact: {{$cust_detail->customer_mobile}}</li>
                                
                                <li><i class="zmdi zmdi-pin zmdi-hc-fw"></i>Block Number: {{$cust_detail->customer_address}}, House/Building No:{{$cust_detail->customer_pincode}}, Place/area: {{$cust_detail->customer_state}}</li>
                                
                                <li><i class="zmdi zmdi-pin zmdi-hc-fw"></i>Address(street/Avenue number): {{$cust_detail->customer_dist}} </li>
                             
                          
                                <li><i class="zmdi zmdi-pin zmdi-hc-fw"></i>Kuwait</li>
                              
                               
                            </ul>
                        </div>
                      
                    </div>
                   </div>
                    @endforeach
                   </div>
                   <h5>Order List</h5>
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered table-dark mb-0">
                                <thead class="thead-default">
                                    <tr>                                        
                                        <th width="15%">Product Name</th>
                                        <th width="10%">Quantity</th>
                                        <th>Unit Price</th>
                                      
                                        <th>Sub Total</th>                                     
                                       
                                    </tr>
                                </thead>
                              
                                <tbody>
                                 
                                  <?php


                                      $product_details = $view_orders->purchase_id;
                                      $products_det = DB::table('purchase')
                                                  ->where('purchase_id','=',$product_details)
                                                  
                                                  ->get();
                            $pu_det = DB::table('purchase')
                                                  ->where('purchase_id','=',$product_details)
                                                  
                                                  ->first();
                                                     

                                      foreach ($products_det as $products_det) {
                                        $order_history = $products_det->products;
                                      }



                                      $exp_product = json_decode($order_history);



                                      $tottal ="0";
                                  ?>
                                  @foreach($exp_product as $exp_product)
                                  <?php
                                  $tottal = $tottal+ $exp_product->subtotal;
                                  

                                  ?>


                                    <tr>

                                        <td>{{ $exp_product->name }} {{ $exp_product->options->size }}</td>
                                        <td class="text-right">{{ $exp_product->qty }}</td>
                                       
                                      
                                        <td class="text-right">{{ $exp_product->price }}</td>
                                         
                                        
                                        <td class="text-right">{{ $exp_product->qty*$exp_product->price }}</td>
<!--<?php  $b = str_replace( ',', '', $tottal ); ?>-->

                                       
                                    </tr>
                                  @endforeach

                                  <tr>
                                        <td class="text-right" colspan="4" >
                                          Shipping Charge
                                        </td>
                                       
<?php $a=$pu_det->shipping_charge; ?>

                                        <td class="text-right">{{ $view_orders->currency }} {{$pu_det->shipping_charge}} </td>

                                      
                                  </tr>
                                  <tr>
                                        <td class="text-right" colspan="4" >
                                          Total Amount
                                        </td>
                                        <td class="text-right">{{ $view_orders->currency }}
                                          <?php
                                        //   echo $b=0;$a=1;
                                          ?>
                                       
                                        </td>
                                  </tr>
                                    
                                   
                                </tbody>
                            </table>
                        </div>
                        <div class="card">
                        <div class="card-body">

                          <h5>Order Status</h5>
                            

                         <form action="{{url('/update-order-status')}}" method="post" enctype="multipart/form-data">

                           {{csrf_field()}}

   
                         
                            <div class="form-group">
                              <input type="hidden" name="order_id" value="{{$view_orders->order_id}}">
                                <select class="form-control" name="order_status" placeholder="Meta Tag Keywords" required="">
                                  <?php
                               $status_id =  $view_orders->order_status_id;
                               $status = DB::table('order_status')
                                          ->where('order_status_id','=',$status_id)
                                          ->get();
                              ?>

                                 @foreach($status as $status)
                                    <option value="{{$status->order_status_id}}">{{$status->name}}</option>
                                    @endforeach  
                                    <option value="">Select a Status</option>
                                    @foreach($order_stat as $order_stat)
                                    <option value="{{$order_stat->order_status_id}}">{{ $order_stat->name }}</option>
                                    @endforeach  
                                </select>
                                <i class="form-group__bar"></i>
                            </div>

                            


                            <button type="submit" class="btn btn-primary btn-block"><i class="zmdi zmdi-floppy zmdi-hc-fw"></i> update</button>

                          

                          </form>
                      
                      
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
