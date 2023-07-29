
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ITCITY</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{url('admin/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{url('admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{url('admin/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{url('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{url('admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('admin/js/select.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{url('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{url('admin/css/vertical-layout-light/mystyle.css')}}">
  <link rel="stylesheet" href="{{url('admin/vendors/select2/select2.min.css')}}">
  <link rel="stylesheet" href="{{url('admin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
  


 <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{url('admin/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('/assets/logo/favicon.png')}}" />
  <script src="{{URL::to('/')}}/assets/js/tableToExcel.js"></script>

<style type="text/css">
    body{
        font-family:Verdana;
        font-size:12px;
    }
    @media print{
        #buttons{
            display:none;
        }
    }
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  /*border: 1px solid #dddddd;*/
  /*text-align: left;*/
  padding: 8px;
}

tr:nth-child(even) {
  /*background-color: #dddddd;*/
}
.branding-logos li{
list-style:none;
float:left;
}
.branding-logos li img{
width:90px;
}


</style>
</head>
<body style=" font-family: Times New Roman,Times,serif;font-weight: 400;">
<div class="main-panel" style="width:100%;">
    <div class="content-wrapper">
        
      
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                      <div class="row" id="buttons">
                            <div class="col-md-6 col-sm-6 col-xs-12" style="">
                           <button style="border: 1px solid #f5831a;
    background: #f5831a;padding:5px;margin-bottom:10px;
    color: #fff;" onclick="window.print(); return false">Print</button>
                            <button style="border: 1px solid #000;
    background: #000;padding:5px;margin-bottom:10px;

    color: #fff;" onclick="window.close(); return false">Close</button>
    </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12" style="">
                         
                             <h4 class="card-title">INVOICE No #{{$print_invoice->order_id}}</h4></h4>
                        </div>
                           <div class="col-md-6 col-sm-6 col-xs-12   heading">
                           <p style="font-size: 20px;" text-align="right">Date:  {{date('d/m/Y',strtotime($print_invoice->created_at))}}</p>
                        </div>
                        <div class="col-md-6">
                        <p style="font-size: 20px;" text-align="right">Remark:  {{$print_invoice->remarks}}</p>

                        </div>
                       

                    </div>
                    
                    
                    
                    <div class="row" style="justify-content:center">
                         <div class="invoice__header">
                            <img class="invoice__logo" src="{{url('uploads/images/main-logo.png')}}" width="278px" height="56px" alt="">
                        </div>
                    </div>
                    
                 
                  <p class="card-description">
                
                  </p>
                  <div class="row invoice__address">
                            <div class="col-6">
                                <div class="text-right">
                                    <p style="font-size: 20px;">Invoice from</p>

                                    <h4 style="font-size: 20px;font-weight: 600;">IT City Online Store</h4>

                                    <address style="font-size: 20px;">
                                       
                                       
Habeeb al munawer street.<br>
Maghateer complex<br>
Mezzanine floor <br>
Farwaniya, kuwait
                                    </address>

                                    <p style="font-size: 20px;">+965 90019287</p><br/>
                                    <p style="font-size: 20px;"> support@itcityonlinestore.com</p><br>
                                   <p style="font-size: 20px;"> www.itcityonlinestore.com </p>
                                </div>
                            </div>
                            <?php
                          $cust_id = $print_invoice->customer_id;
                          $cust_det = DB::table('customer_registration')->where('customer_id','=',$cust_id)->get();
                          
                     ?>
                      @foreach($cust_det as $cust_detail)
                            <div class="col-6">
                                <div class="text-left">
                                    <p style="font-size: 20px;">Invoice to</p>

                                    <h4 style="font-size: 20px;font-weight: 600;">{{$cust_detail->customer_name}}</h4>

                                    <address style="font-size: 20px;">
                                         Place/area: {{$cust_detail->customer_state}} <br>
                                        Address(Block, Street, House Number):
                                        <br>
                                        {{$cust_detail->customer_dist}} <br>{{$cust_detail->remarks}}
                                       
                                    </address>

                                   <p style="font-size: 20px;"> {{ $cust_detail->customer_mobile}}</p><br/>
                                   <p style="font-size: 20px;">{{ $cust_detail->customer_email}} </p> 
                                    <br><br>
                                    @endforeach
                                    <h4 style="color:green;">ORDER ID : {{ $print_invoice->order_number}}</h4>
                                </div>
                            </div>
                            
                            
                        </div>
                  <div class="table-responsive" style="overflow-x: hidden">
                    <table class="table table-hover"  style="font-size: 20px;">
                      <thead>
                      <tr class="text-uppercase">
                                    <th>ITEM DESCRIPTION</th>
                                    <th>QUANTITY</th>
                                   
                                    <th>UNIT PRICE</th>
                                    <th colspan="2">TOTAL</th>
                                </tr>
                      </thead>
                      <tbody>
                                 <?php


                                      $product_details = $print_invoice->purchase_id;
                                      $products_det = DB::table('purchase')
                                                  ->where('purchase_id','=',$product_details)
                                                  
                                                  ->get();

                                                     

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

                                        <td>{{ $exp_product->name }}</td>
                                        <td >{{ $exp_product->qty }}</td>
                                        
                                       
                                        <td >KWD {{ number_format($exp_product->price, 3, '.', ',')  }}</td>
                                        
                                        <td >KWD {{ number_format($exp_product->subtotal, 3, '.', ',') }}</td>


                                       
                                    </tr>
                                  @endforeach

                                
                                <tr>
                                        <td class="text-right" colspan="4" >
                                          Shipping Charge
                                        </td>
  
<?php $a='1'; ?>
                                        <td class="text-right">KWD 1.00 </td>

                                  </tr>
                                  <tr>
                                        <td class="text-right" colspan="4" >
                                          Total Amount
                                        </td>
                                        <td class="text-right">KWD
                                          <?php
                                          echo number_format($tottal+$a, 3, '.', ',');
                                          ?>
                                        </td>
                                  </tr>
                            </tbody>
                    </table>
                  </div>
                  <footer class="invoice__footer" style="text-align:center">
                            
                            <a href="#">www.itcityonlinestore.com</a>
                            <br><span>Thank you for shopping With IT City...!</span>
                        </footer>
                </div>
              </div>
            </div>
            </div>
            </div>
            
  <script src="{{url('admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{url('admin/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{url('admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{url('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{url('admin/js/dataTables.select.min.js')}}"></script>
    <script src="{{url('admin/js/scriptfont.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{url('admin/js/off-canvas.js')}}"></script>
  <script src="{{url('admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{url('admin/js/template.js')}}"></script>
  <script src="{{url('admin/js/settings.js')}}"></script>
  <script src="{{url('admin/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{url('admin/js/dashboard.js')}}"></script>
  <script src="{{url('admin/js/Chart.roundedBarCharts.js')}}"></script>
  @yield('script')
  <!-- End custom js for this page-->
</body>

</html>
