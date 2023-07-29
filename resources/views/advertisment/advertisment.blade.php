@extends('layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <h4 class="card-title">Advertisment List</h4></h4>
                        </div>
                           <div class="col-md-6 col-sm-6 col-xs-12   heading">
                             <a href="{{URL::to('add-advertisment')}}" class="newicon"><i class="mdi mdi-new-box"></i></a>
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
                        <th></th>
                                        <th width="20%">Advertisment Page</th>
                                        <th width="30%">Image</th>
                                        <th width="20%">Created Date</th>                                       
                                        <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $i="0"; ?>
                                       @foreach($advertisment as $advertisment)
                                       <?php $i++; ?>
                      <tr>
                                     
                                        <td>{{ $i }}</td>
                                        <td>{{ $advertisment->page}}</td>
                                        <td class="addimage"><img style="height:70px;border-radius:0px;width:150px;" src="{{url('/uploads/ads/'.$advertisment->image) }}" alt=""  ></td>
                                        <td>{{ $advertisment->created_at}}</td>

                                        <td>
                                        <a href="{{url('delete-adds/'.$advertisment->add_id)}}" class="btn btn-danger"><i class="zmdi zmdi-delete zmdi-hc-fw"></i>Delete</a>
                                       </td>
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
