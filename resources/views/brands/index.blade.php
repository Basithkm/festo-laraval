@extends('layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <h4 class="card-title">Brands</h4></h4>
                        </div>
                           <div class="col-md-6 col-sm-6 col-xs-12   heading">
                             <a href="{{URL::to('/add-brand')}}" class="newicon"><i class="mdi mdi-new-box"></i></a>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                 
                  <p class="card-description">
                
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover" id="value-table">
                      <thead>
                        <tr>
                        <th width="20%">Brand Name</th>
                                        <th width="40%">Logo</th>
                                        <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $i='0'; ?>
                      <?php $i='0'; foreach ($brands as $brands) { $i++; ?>
                          
                        <td>{{ $brands->brands_name }}</td>

<td>@if($brands->brand_image)<img src="{{url('/uploads/brands/logo/'.$brands->brand_image) }}" alt="" width="100px" height="50px">@else Logo Not Available @endif </td>


<td>

<a href="{{url('view-brands/'.$brands->brands_id)}}"  class="btn btnsmall btn-outline-secondary btn-icon-text"><i class="zmdi zmdi-eye zmdi-hc-fw"></i>View</a>

<a href="{{url('edit-brands/'.$brands->brands_id)}}"  class="btn btnsmall btn-outline-secondary btn-icon-text"><i class="zmdi zmdi-edit zmdi-hc-fw"></i>Edit</a>

<a href="{{url('delete-brands/'.$brands->brands_id)}}"  onclick="return confirm('Are you sure you want to delete');"  class="btn btnsmall btn-outline-secondary btn-icon-text"><i class="zmdi zmdi-delete zmdi-hc-fw"></i>Delete</a></td>
</tr>
<?php } ?>

                       
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
