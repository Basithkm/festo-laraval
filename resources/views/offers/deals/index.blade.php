@extends('layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <h4 class="card-title">Deal of the Day</h4></h4>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12   heading">
                             <a href="{{url('/admin/add-deal')}}" class="newicon"><i class="mdi mdi-new-box"></i></a>
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
                      <th width="45%">Id</th>
                     <th width="45%">Product Name</th>
                     <th>Action</th>
                                    </tr>
                      </thead>
                      <tbody>
                      @foreach($daily_deal as $daily_deal)
                                    <tr>  
                                    <td>{{ $daily_deal->product_id }}</td>
                                    <td>{{ $daily_deal->product_name}}</td>
                                    <td>
                                        <a href="{{url('delete-daily-deal/'.$daily_deal->deal_id)}}"  onclick="return confirm('Are you sure you want to delete');" class="btn btn-outline-danger btn-fw"><i class="zmdi zmdi-delete zmdi-hc-fw"></i>Delete</a></td>
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
