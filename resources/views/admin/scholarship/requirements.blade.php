@php
//   $users = App\Models\User::get();
  $scholarships = App\Models\Scholarship::get();
  
@endphp

@extends('admin.dashboard')
@section('main_contents')
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="admin/dashboard">Admin Dashboard</a>
    <span class="breadcrumb-item active">Programs table</span>
  </nav>

  <div class="sl-pagebody">

    
    {{-- start data tables  --}}
    <div class="sl-pagebody">

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Registered Programs Table</h6>

        <form action="{{ route('Req.store') }}" method="post">
            @csrf
            <div class="form-layout">
                  <div class="row mg-b-25">
                    <div class="col-md-12">
                      <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Program: <span class="tx-danger">*</span></label>
                        <select class="form-control" name="program" id="">
                              @foreach ($scholarships as $scholarship)
                              <option value="{{ $scholarship->id }}" selected>{{ ucfirst($scholarship->name) }}</option>
                              @endforeach
                        </select>
                      </div>
                    </div><!-- col-4 -->
                  </div><!-- row -->

                  <div class="row mg-b-25">
                    <div class="col-md-12 field_wrapper">
                      <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Program Requirement: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="requirement[]" placeholder="Program requirements">
                        <a href="javascript:void(0);" class="add_button" title="Add field"><img src="add-icon.png"/></a>
                      </div>
                    </div><!-- col-4 -->
                  </div><!-- row -->
            
              <div class="form-layout-footer">
                <button class="btn btn-info mg-r-5">Proceed</button>
                {{-- <button class="btn btn-secondary">Cancel</button> --}}
              </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
            </form>


        {{-- <div class="field_wrapper">
            <div>
                <input type="text" name="field_name[]" value=""/>
                
            </div>
        </div> --}}

      </div><!-- card -->


    </div><!-- sl-pagebody -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          var maxField = 10; //Input fields increment limitation
          var addButton = $('.add_button'); //Add button selector
          var wrapper = $('.field_wrapper'); //Input field wrapper
          var fieldHTML = '<div class="col-md-12"><div class="form-group mg-b-10-force"><label class="form-control-label">Program Requirement: <span class="tx-danger">*</span></label><input class="form-control" type="text" name="requirement[]" placeholder="Program requirements"><a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a></div></div>'; //New input field html 
          var x = 1; //Initial field counter is 1
          
          //Once add button is clicked
          $(addButton).click(function(){
              //Check maximum number of input fields
              if(x < maxField){ 
                  x++; //Increment field counter
                  $(wrapper).append(fieldHTML); //Add field html
              }
          });
          
          //Once remove button is clicked
          $(wrapper).on('click', '.remove_button', function(e){
              e.preventDefault();
              $(this).parent('div').remove(); //Remove field html
              x--; //Decrement field counter
          });
      });
      </script>
@include('admin.inc.footer')
</div>
@endsection