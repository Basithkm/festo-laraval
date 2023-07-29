@extends('layout.layout')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

  
<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin createtable">
              <div class="card">
                <div class="card-body">
           
                  
                        <div class="row">
                        <div class="col-md-6">
                                 <h4 class="card-title">Add Deals</h4>
                        </div>
                           <div class="col-md-6 heading">
                           <a href="{{URL::to('admn-daily-deals')}}" class="backicon"><i  style="color:#733dd9;" class="mdi mdi-backburger"></i></a>
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
                  <form class="form-sample"  action="{{url('/add-new-deal')}}" method="post" enctype="multipart/form-data"  >
                          {{csrf_field()}}
                    <div class="row">
                        
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Choose A Product</label>
                          <div class="col-sm-9">
                          <input type="text" name="search_product" id="search_product" class="form-control"  required="">
                          <input type="text" name="sel_product" id="sel_product" class="form-control"  required="" readonly>
                     
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Offer Price</label>
                          <div class="col-sm-9">
                          <input type="number" name="special_rate" class="form-control"  required="">
                          </div>
                        </div>
                      </div>
                           
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label" style="color: red;">Offer Price(Arabic)</label>
                          <div class="col-sm-9">
                          <input style="direction:rtl;" type="number" name="special_rate_arabic" class="form-control"  required="">
                          </div>
                        </div>
                      </div>
            
                        
                        
                      </div>
              
                
                    
                    
                    
                
                <div class="submitbutton">
                    <button type="submit" class="btn btn-primary mb-2 submit">Submit<i class="fas fa-save"></i>


</button>
                    </div>
                    
                    
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
            </div>
               
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
var path = "{{ route('autocompleteproduct') }}";
  $( "#search_product" ).autocomplete({

      source: function( request, response ) {
        $.ajax({
          url: path,
          type: 'GET',
          dataType: "json",
          data: {
             search: request.term
          },
          success: function( data ) {
             response( data );
          }
        });
      },
      select: function (event, ui) {
        $( "#search_product" ).val(ui.item.label);
        $( "#sel_product" ).val(ui.item.product_id);
        
        // $(this).parent().parent().find('.item').val(ui.item.label);
        // $(this).parent().parent().find('.item-id').val(ui.item.id);
         console.log(ui.item); 
         return false;
      }
    });

  </script>
@endsection