@extends('layout.layout')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin createtable">
              <div class="card">
                <div class="card-body">
           
                  
                        <div class="row">
                        <div class="col-md-6">
                                 <h4 class="card-title">Edit Review Status</h4>
                        </div>
                           <div class="col-md-6 heading">
                             <a href="{{URL::to('user_reviews')}}" class="backicon"><i class="mdi mdi-backburger"></i></a>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                    
                    <div class="row">
                    <br>
                   </div>
                
                  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
           
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div><br />
          @endif
          
        </div>
        <form action="{{url('/update-review')}}" method="post" enctype="multipart/form-data">
        @foreach($edit_review as $edit_review)
                           {{csrf_field()}}
                    <div class="row">
                    <input type="hidden" name="review_id" value="{{ $edit_review->review_id}}">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Status</label>
                          <div class="col-sm-9">
                          <select class="form-control" name="re_status" data-toggle="tooltip" title="Status" placeholder="Meta Tag Keywords" required="">
                                    <option value="">--Select  a Status--</option>
                                    <?php
                                    $stat = $edit_review->review_status;
                                    if ($stat=='0') { ?>
                                        <option value="0" disabled>Disabled (Current Status)</option> 
                                   <?php  }else{ ?>
                                        <option value="1" disabled>Enabled (Current Status)</option>
                                  <?php  }
                                    ?>
                                    
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                </select>
                          </div>
                        </div>
                      </div>

                      </div>
              
                
                    
                    
                    
                
                <div class="submitbutton">
                    <button type="submit" class="btn btn-primary mb-2 submit">Submit<i class="fas fa-save"></i>


</button>
                    </div>
                    
                    @endforeach     
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
            </div>
               
@endsection
@section('script')

@endsection