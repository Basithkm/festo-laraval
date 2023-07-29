@extends('layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <h4 class="card-title">User Reviews</h4></h4>
                        </div>
                           <div class="col-md-6 col-sm-6 col-xs-12   heading">
                           
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
                        <th width="15%">Author</th>
                                        <th width="10%">Product</th>
                                        <th width="30%">Review Text</th>
                                        <th width="10%">Status</th>
                                        <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($review as $review)
                                    <tr>

                                        <td>{{ $review->author_name }}</td>
                                        <td>{{ $review->product_id }}</td>
                                        <td>{{ $review->text }}</td>
                                       
                                        <?php  
                                        $stat = $review->review_status;
                                        if ($stat=='0') { ?>

                                            <td><button type="button" class="btn btn-outline-danger">Disabled</button></td>

                                       <?php }else{ ?>

                                        <td><button type="button" class="btn btn-outline-success">Enabled</button></td>

                                     <?php  }
                                        ?>

                                        <td><a href="{{url('edit-review-stat/'.$review->review_id)}}" class="btn btnsmall btn-outline-secondary btn-icon-text"><i class="zmdi zmdi-edit zmdi-hc-fw"></i>Edit</a>

                                        <a href="{{url('delete-review-stat/'.$review->review_id)}}" onclick="return confirm('Are you sure you want to delete);" class="btn btnsmall btn-outline-secondary btn-icon-text"><i class="zmdi zmdi-delete zmdi-hc-fw"></i>Delete</a></td>
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
