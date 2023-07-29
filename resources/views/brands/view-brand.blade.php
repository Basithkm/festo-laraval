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
                  @foreach($view_brands as $view_brands)
                        <center>
                          <span><img src="{{url('/uploads/brands/logo/'.$view_brands->brand_image) }}" alt="" width="150px" height="100px"></span>
                        </center><br>
                        <table class="table table-dark mb-0">
                            
                            <tbody>
                            <tr>
                                <th scope="row">Brand Name </th>
                                <td>{{ $view_brands->brands_name }}</td>
                                
                            </tr>
                            <tr>
                                <th scope="row">URL Word </th>
                                <td>{{ $view_brands->url_word }}</td>             
                            </tr>
                          
                           
                            
                            
                           

                      


                             
                            </tbody>
                        </table>
                        @endforeach
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
            
@endsection
@section('script')
@endsection
