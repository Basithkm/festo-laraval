@extends('layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <h4 class="card-title">Out of stock Categories list</h4></h4>
                        </div>
                           <div class="col-md-6 col-sm-6 col-xs-12   heading">
                           
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                 
                  <p class="card-description">
                
                  </p>
                  <div class="table-responsive">
                  <div class="widget-profile__list">
                            
                            <div class="media">
                                <div class="avatar-char"><i class="zmdi zmdi-flower"></i></div>
                                <div class="media-body">
                                    <strong>Computers</strong>
                                    <small>أجهزة الكمبيوتر</small>
                                    <?php $cat_id11 = Crypt::encryptString('98'); ?><a class="btn btn-dark" href="{{url('view-out-of-stock-list/'.$cat_id11)}}" style="float:right;">View List</a>
                                </div>
                            </div>
                            
                            <div class="media">
                                <div class="avatar-char"><i class="zmdi zmdi-flower"></i></div>
                                <div class="media-body">
                                    <strong>Mobiles</strong>
                                    <small>الهواتف النقالة</small>
                                    <?php $cat_id12 = Crypt::encryptString('82'); ?><a class="btn btn-dark" href="{{url('view-out-of-stock-list/'.$cat_id12)}}" style="float:right;">View List</a>
                                </div>
                            </div>
                            
                            <div class="media">
                                <div class="avatar-char"><i class="zmdi zmdi-flower"></i></div>
                                <div class="media-body">
                                    <strong>Tablets</strong>
                                    <small>أجهزة لوحية</small>
                                   <?php $cat_id13 = Crypt::encryptString('89'); ?> <a class="btn btn-dark" href="{{url('view-out-of-stock-list/'.$cat_id13)}}" style="float:right;">View List</a>
                                </div>
                            </div>
                            
                            <div class="media">
                                <div class="avatar-char"><i class="zmdi zmdi-flower"></i></div>
                                <div class="media-body">
                                    <strong>Accessories</strong>
                                    <small>مستلزمات</small>
                                    <?php $cat_id14 = Crypt::encryptString('99'); ?><a class="btn btn-dark" href="{{url('view-out-of-stock-list/'.$cat_id14)}}" style="float:right;">View List</a>
                                </div>
                            </div>
                           
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
