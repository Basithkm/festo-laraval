@extends('layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <h4 class="card-title">Category List</h4></h4>
                        </div>
                           <div class="col-md-6 col-sm-6 col-xs-12   heading">
                             <a href="{{URL::to('category/add-categories')}}" class="newicon"><i class="mdi mdi-new-box"></i></a>
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
                        <th width="8%">Id</th>
                                        <th width="35%">Category Name</th>
                                        <th width="15%">Image</th>
                                        <th width="15%">Created Date</th>                                       
                                        <th  width="30%"> Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $i='0'; ?>
                            @if(count($category))
                            @foreach($category as $category)
                            <tr>
                                        <?php 
                                        $i++;
                                        $parent = DB::table('category')
                                                ->where('cat_id','=',$category->parent_id)
                                                    ->get(); 
                                                    
                                       $parent_name =  $category->parent_id; ?>
                                        <td>{{$i}}</td>
                                    <?php   if ($parent_name!='0') { ?>

                                       @foreach($parent as $parent)
                                       
                                           <td>{{$parent->cat_name}}->{{$category->cat_name}}</td>
                                         @endforeach
                                        <?php }else{ ?>
                                        
                                        <td>{{$category->cat_name}}</td>

                                        <?php } ?> 
                                        
                                        
                                        <td>
                                            @if($category->cat_image!="")
                                            <img src="{{url('/uploads/category/thumb_images/'.$category->cat_image) }}" alt="" width="80px" height="80px">
                                            @else
                                            No Image
                                            @endif
                                        </td>
                                       
                                        
                                       
                                      
                                        <td>{{$category->created_at}}</td>

                                        <td><a href="{{url('edit-category/'.$category->cat_id)}}" class="btn btnsmall btn-outline-secondary btn-icon-text">Edit<i class="zmdi zmdi-edit zmdi-hc-fw"></i></a>

                                        <a href="{{url('delete-category/'.$category->cat_id)}}"  onclick="return confirm('Are you sure you want to delete');" class="btn btnsmall btn-outline-secondary btn-icon-text"><i class="zmdi zmdi-delete zmdi-hc-fw"></i>Delete</a></td>
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
