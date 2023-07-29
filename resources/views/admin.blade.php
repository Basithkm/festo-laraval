@extends('layout.layout')
<link href="{{url('admin/css/owl.carousel.min.css')}}" rel="stylesheet">
        <script src="{{url('admin/js/jquery.min.js')}}"></script>
  <script src="{{url('admin/js/owl.carousel.min.js')}}"></script>
  <link rel="stylesheet" href="{{url('admin/css/owl.theme.default.min.css')}}"> 

@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-12">
                  <h3 class="font-weight-bold">Welcome itcityonlinestore</h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                 <div class=" d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                   {{$now}}
                    <!-- <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                
                      
                    </button> -->
                    <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div> -->
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
            <div class="carousel owl-carousel">

          
            
         </div>
            </div>
              <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg" style="background: #f5f7ff;">
              <div class="carousel owl-carousel">       
               </div>
              </div>
            </div>


            <div class="col-md-12 grid-margin transparent">
              <div class="row">

                <div class="col-md-3 mb-4 stretch-card transparent ">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">TOTAL ORDERS</p>
                 
                      <p class="fs-30 mb-2">{{$orders}}</p>
                      <p></p>
                    </div>
                  </div>
                </div>

                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">TOTAL SALES</p>
                      <!--<i class="mdi mdi-sale"></i>-->
                      <p class="fs-30 mb-2">{{$purchase}}</p>                   
                    </div>
                  </div>
                </div>

                <div class="col-md-3 mb-4  stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <!--<img  style="width:50px;" src="{{url('assets/img/dashbord/custromer.png')}}" alt="">-->
                      <p class="mb-4">TOTAL CUSTOMERS</p>
                      <!--<i class="mdi mdi-account-check"></i>-->
                      <p class="fs-30 mb-2">{{$customers}}</p>                
                    </div>
                  </div>
                </div>

                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">PRODUCTS</p>
                      <!--<i class="mdi mdi-stocking"></i>-->
                      <p class="fs-30 mb-2">{{$products}}</p>
                      <p></p>
                    </div>
                  </div>
                </div>



              </div>


              <!-- <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">TOTAL CUSTOMERS</p>
                      <p class="fs-30 mb-2">{{$customers}}</p>
                 
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">PRODUCTS</p>
                      <p class="fs-30 mb-2">{{$products}}</p>
                      <p></p>
                    </div>
                  </div>
                </div>
              </div> -->



            </div>
          </div>
        
     
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Recent Registration</p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                         
                          <th>Name</th>
                         
                        </tr>  
                      </thead>
                      <tbody>
                      @if(count($recent_reg))
                        @foreach($recent_reg as $key=>$list)
                        <tr>
                              <td>{{$list->customer_name}}</td>
                       
                        </tr>
                        @endforeach
                          @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5 stretch-card grid-margin">
              <div class="row">
                <!--<div class="col-md-12 grid-margin stretch-card">-->
                <!--  <div class="card">-->
                <!--    <div class="card-body">-->
                <!--      <p class="card-title">Joining</p>-->
                <!--      <div class="charts-data">-->
                <!--        <div class="mt-3">-->
                <!--          <p class="mb-0">Today</p>-->
                <!--          <div class="d-flex justify-content-between align-items-center">-->
                <!--            <div class="progress progress-md flex-grow-1 mr-4">-->
                <!--              <div class="progress-bar bg-inf0" role="progressbar" style="width: %" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>-->
                <!--            </div>-->
                <!--            <p class="mb-0"></p>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--        <div class="mt-3">-->
                <!--          <p class="mb-0">This Week</p>-->
                <!--          <div class="d-flex justify-content-between align-items-center">-->
                <!--            <div class="progress progress-md flex-grow-1 mr-4">-->
                <!--              <div class="progress-bar bg-info" role="progressbar" style="width: %" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>-->
                <!--            </div>-->
                <!--            <p class="mb-0"></p>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--        <div class="mt-3">-->
                <!--          <p class="mb-0">This Month</p>-->
                <!--          <div class="d-flex justify-content-between align-items-center">-->
                <!--            <div class="progress progress-md flex-grow-1 mr-4">-->
                <!--              <div class="progress-bar bg-info" role="progressbar" style="width: " aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>-->
                <!--            </div>-->
                <!--            <p class="mb-0"></p>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--        <div class="mt-3">-->
                <!--          <p class="mb-0">This Year</p>-->
                <!--          <div class="d-flex justify-content-between align-items-center">-->
                <!--            <div class="progress progress-md flex-grow-1 mr-4">-->
                <!--              <div class="progress-bar bg-info" role="progressbar" style="width: %" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>-->
                <!--            </div>-->
                <!--            <p class="mb-0"></p>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--      </div>  -->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->
                <!--<div class="col-md-12 stretch-card grid-margin grid-margin-md-0">-->
                <!--  <div class="card data-icon-card-primary">-->
                <!--    <div class="card-body">-->
                <!--      <p class="card-title text-white">Joining Amount</p>                      -->
                <!--      <div class="row">-->
                <!--        <div class="col-8 text-white">-->
                <!--          <h3>₹ </h3>-->
                <!--          <p class="text-white font-weight-500 mb-0">. </p>-->
                <!--        </div>-->
                <!--        <div class="col-4 background-icon">-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->
              </div>
            </div>
          
          </div>
        
                  <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">latest Order</p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                            
                        <th>#</th>
                                <th>Order Number</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Action</th>
                        </tr>  
                      </thead>
                      <tbody>
                      @if(count($latest_orders))
                        @foreach($latest_orders as $list)
                         
                        <tr>
                        <th scope="row">1</th>
                                <td>{{ $list->order_number }}</td>
                                <td>{{ $list->customer_name }}</td>
                                <td>{{ $list->created_at }}</td>
                                <td>
                                    <a href="{{url('view-order-list/'.$list->order_id)}}" class="btn btn-light btn--icon"><i class="zmdi zmdi-eye zmdi-hc-fw"></i>View</a>
                                </td>
                          
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
      
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022.   from Sysbreeze Technologies. All rights reserved.</span>
 
          </div>
         
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->




      <script>
         $(".carousel").owlCarousel({
           margin: 20,
           loop: true,
           autoplay: true,
           autoplayTimeout: 2000,
           autoplayHoverPause: true,
           responsive: {
             0:{
               items:1,
               nav: false
             },
             600:{
               items:1,
               nav: false
             },
             1000:{
               items:1,
               nav: false
             }
           }
         });
      </script>

@endsection
@section('script')
@endsection