@extends('layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">Product Detail</h4>
                    </div>
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12 exelbuton" style="text-align:end;">
                           
                    </div>
                       
                   
                </div>
                 
                 
                  <div class="row">
                  <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                    <p class="card-description">
                  <img src="{{url('/uploads/product/thumb_images/'.$view_prod->product_image) }}" alt="" width="130px" height="130px">
                  </p>

                    </div>
                  @foreach($img as $mg)
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                    <p class="card-description">
                  <img src="{{url('/uploads/product/thumb_images/'.$mg->images) }}" alt="" width="130px" height="130px">
                  </p>

                    </div>
                    @endforeach
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                    <p class="card-description">
                    @if($view_prod->product_qty<='0')

<label style="color:red;"><b>Out of Stock</b></label>

@else
               <lable style="color: green;">Avilable Stock</lable>   <lable style="color: red;">:{{$view_prod->product_qty}}</lable>
                @endif
                  </p>
                  <lable>Current Status:</lable>
                  <?php  
                                        $stat = $view_prod->status;
                                        if ($stat=='0'||$stat==null) { ?>

                                            <img src="{{url('/uploads/images/disable.png') }}" alt="" width="30px" height="30px">
 <a href="{{url('product-active/'.$view_prod->id)}}" class="btn btn-success">Active</a>
                                       <?php }else{ ?>

                                        <img src="{{url('/uploads/images/enable.png') }}" alt="" width="30px" height="30px">
                                          <a href="{{url('product-deactive/'.$view_prod->id) }}" class="btn btn-danger">Deactive</a>

                                     <?php  }
                                        ?>
                    </div>
                      
                  </div>
                  <?php
                                            $feat = $view_prod->featured;
                                            if ($feat=='0') { ?>
                                                 <a class="btn btn-primary" href="{{url('pro-set-featured/'.$view_prod->id)}}" onclick="return confirm('Are you sure you want to make this product featured');">Unfeatured</a>
                                          <?php   }else { ?> 
                                            <a href="{{url('pro-set-unfeatured/'.$view_prod->id)}}" onclick="return confirm('Are you sure you want to remove this product from featured list');" class="btn btn-secondary">Featured</a>
                                         <?php }
                                            ?>
                       <a href="{{url('add-image/'.$view_prod->id)}}" class="btn btn-success">
                          Add Image
                        </a>
                        @if($view_prod->parent_id==0)
                         <a href="{{url('add-color/'.$view_prod->id)}}" class="btn btn-warning">
                          Add Color
                        </a>
                        @endif
                        <a href="{{url('edit-product/'.$view_prod->id)}}" class="btn btn-info">
                         Edit
                        </a>
                        <a href="{{url('reset-stock/'.$view_prod->id)}}" class="btn btn-dark">
                         Reset Stock
                        </a>
                        <a href="{{url('delete-product/'.$view_prod->id) }}" class="btn btn-danger">
                         Delete
                        </a>
                        <a href="{{url('add-size/'.$view_prod->id) }}" class="btn btn-outline-info btn-fw">
                         Add Size
                        </a>
                           <a href="{{url('add-stock/'.$view_prod->id)}}" class="btn btn-success">
                          Add Stock
                        </a>
                        <div class="table-responsive">
                 
                  <div class="table-responsive">
                    <table class="table table-hover">
                    <tbody>
                        <tr>
                       
                                  
                                        <td>ID</td>
                                        <td>{{$view_prod->product_id}}</td>
                                        </tr>
                                        <tr>
                                        <td>Name</td>
                                        <td>{{$view_prod->product_name}}</td>      
                                        </tr>
                                        <tr>
                                        <td>Sort</td>
                                        <td>{{$view_prod->sort_order}}</td>      
                                        </tr>
                                        <tr>
                                        <td>Category</td>
                                       <td>  
                                
                             </td>
                                         </tr>
                                        
                                         <tr>
                                        <td>Description</td>
                                       <td>{!! $view_prod->product_desc !!}</td>
                                         </tr>
                                         <tr>
                                        <td>Product Price</td>
                                       <td>{{ $view_prod->product_price }}</td>
                                         </tr>
                                         <tr>
                                        <td>Product Price Offer	</td>
                                       <td>{{ $view_prod->product_price_offer }}</td>
                                         </tr>
                                         <tr>
                                        <td>Product Premium Offer	</td>
                                       <td>{{ $view_prod->product_premium_offer }}</td>
                                         </tr>
                                         

                            
                           
            
                        
                       
                      </tbody>
                    </table>

                  </div>
                  <div class="table-responsive">
                    @if($view_prod->parent_id==0)
                    <table class="table table-hover" >
                      <thead>
                        <tr>
                       
                                  
                                        <th>ID</th>
                                        <th>Sort</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                        
                                       
                        </tr>
                      </thead>
                      <tbody>
                          
                        @foreach($products as $key=>$product)
                        <tr>
                          
                       
                             <td>{{$product->product_id}}</td>
                             <td>{{$product->sort_order}}</td>
                             <td>{{$product->product_name}}</td>
                            <td> <a href="{{url('view-product/'.$product->id)}}" class="btn btnsmall btn-outline-secondary btn-icon-text" >View</a>
                            <a href="{{url('add-color/'.$product->id)}}" class="btn btnsmall btn-outline-warning btn-icon-text">
                          Add Color
                          <i class="ti-reload btn-icon-prepend"></i>

                        </a>
                        <a href="{{url('add-image/'.$product->id)}}" class="btn btnsmall  btn-outline-secondary btn-icon-text">
                          Add Image
                          <i class="ti-reload btn-icon-prepend"></i>

                        </a>
                          </td>
                           
                        </tr>
                         @endforeach
                        
                       
                      </tbody>
                    </table>
                    @endif
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
