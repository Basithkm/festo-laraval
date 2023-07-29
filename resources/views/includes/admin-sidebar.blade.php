<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{URL::to('admin/dash-board')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link"  href="{{URL::to('')}}" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <i class="mdi mdi-account-outline menu-icon"></i>
              <span class="menu-title">Product</span>
            </a>
          </li> -->
          

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false" aria-controls="charts">
              <!-- <i class="icon-bar-graph menu-icon"></i> -->
              <i class="mdi mdi-note-outline menu-icon"></i>
              <span class="menu-title">Product</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product">
              <ul class="nav flex-column sub-menu">
               
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/add-product')}}">Add product</a></li>
                 <li class="nav-item"> <a class="nav-link" href="{{url('product')}}">Product List</a></li>
                  <!-- <li class="nav-item"> <a class="nav-link" href="{{url('product-to-2000')}}">Product 2001 to 4000</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('product-to-4000')}}">Product 4001 to 6000</a></li> -->
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/featured-product')}}">Featured Products</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/category-wise-product')}}">Category Wise Products</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="{{URL::to('/brand-wise-product')}}">Brand Wise Products</a></li> -->
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/last-add-n-product')}}">Last Add Products</a></li>
              
              </ul>
            </div>
     
          </li>
    <li class="nav-item">
            <a class="nav-link"  href="{{URL::to('de-active-product-list')}}" aria-expanded="false" aria-controls="charts">
            <i class="mdi mdi-stop-circle-outline menu-icon"></i> 
              <span class="menu-title">Deactive Product List</span>
           
            </a>
   
     
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#staff" aria-expanded="false" aria-controls="charts">
              <!-- <i class="icon-bar-graph menu-icon"></i> -->
              <i class="mdi mdi-note-outline menu-icon"></i>
              <span class="menu-title">Product Manage</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="staff">
              <ul class="nav flex-column sub-menu">
                <!-- <li class="nav-item"> <a class="nav-link" href="{{url('category/categories')}}">Product Categories</a></li> -->
                <li class="nav-item"> <a class="nav-link" href="{{url('sub-category/categories')}}">Sub Categories</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('group-category/categories')}}">Group Categories</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="{{URL::to('/brands')}}">Products Brands</a></li> -->
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/user_reviews')}}">Product Reviews</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/out-of-stock-list')}}">Out of stock</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/attribute-values')}}">Add Atribute</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('scrach-card/index')}}">Scrach Card</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('spinning-wheel-slab/index')}}">Spinning Wheel Slab</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('spinning-wheel-slab-item/index')}}">Spinning Wheel item</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('spinning-wheel/index')}}">Spinning Wheel</a></li>
              </ul>
            </div>
     
          </li>

          <li class="nav-item">
            <a class="nav-link"  href="{{URL::to('admn-daily-deals')}}" aria-expanded="false" aria-controls="charts">
            <i class="mdi mdi-stop-circle-outline menu-icon"></i> 
              <span class="menu-title">Offers</span>
           
            </a>
   
     
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#sales" aria-expanded="false" aria-controls="charts">
              <i class="mdi mdi-routes menu-icon"></i>
              <span class="menu-title">Sales</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sales">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('/ad_purchase') }}">Purchase History</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/ad_orders') }}">Orders History</a></li> 
              </ul>
            </div>
     
          </li>
          <!--<li class="nav-item">-->
          <!--  <a class="nav-link"  href="{{URL::to('transferred-collection')}}" aria-expanded="false" aria-controls="charts">-->
          <!--  <i class="mdi mdi-cash-usd  menu-icon"></i>-->
          <!--    <span class="menu-title">Transffered Amount</span>-->
      
          <!--  </a>-->
          <!--</li>-->
          <li class="nav-item">
            <a class="nav-link"  href="{{URL::to('ad_customers')}}" aria-expanded="false" aria-controls="charts">
              <i class="mdi mdi-call-received menu-icon"></i>
              <span class="menu-title">Customers</span>
      
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="{{URL::to('/advertisment')}}" aria-expanded="false" aria-controls="charts">
              <i class="mdi mdi-certificate menu-icon"></i>
              <span class="menu-title">Advertisment</span>
      
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="{{URL::to('/slider-images')}}" aria-expanded="false" aria-controls="charts">
              <!-- <i class="icon-bar-graph menu-icon"></i> -->
              <i class="mdi mdi-account-outline menu-icon"></i>
              <span class="menu-title">Home page Images</span>
            </a>
          </li>

                    <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#purchase_report" aria-expanded="false" aria-controls="charts">
               <i class="icon-bar-graph menu-icon"></i> 
              <span class="menu-title">Purchase Report</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="purchase_report">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('purchase-date-wise')}}">Date wise</a></li> 
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('purchase-customer-wise')}}">Customer Wise</a></li> 
             
              </ul>
            </div>
     
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#order_report" aria-expanded="false" aria-controls="charts">
               <i class="icon-bar-graph menu-icon"></i> 
              <span class="menu-title">Order Report</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="order_report">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('order-country-wise')}}">Country wise</a></li> 
                  <li class="nav-item"> <a class="nav-link" href="{{URL::to('order-mobile-wise')}}">Mobile No wise</a></li> 
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('order-customer-wise')}}">Customer Wise</a></li> 
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('order-processing')}}">Processing</a></li> 
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('order-cancel')}}">Cancel</a></li> 
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('order-complete')}}">Complete</a></li> 
              </ul>
            </div>
     
          </li>
    
        </ul>
      </nav>