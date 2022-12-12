@php
    $pageTitle = "Apply for scholarship";
    $site = App\Models\Settings::find(1);
  $scholarship = App\Models\Scholarship::find($id);
@endphp
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>{{ $pageTitle }}</title>

    <!-- vendor css -->
    <link href="{{ url('/') }}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ url('/') }}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{ url('/') }}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ url('/') }}/lib/highlightjs/github.css" rel="stylesheet">
    <link href="{{ url('/') }}/lib/jquery.steps/jquery.steps.css" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/css/starlight.css">
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    @include('users.inc.lsidebar')
    <!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @include('users.inc.header')
    
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <!-- sl-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="/">{{ $site->site_name }}</a>
            <span class="breadcrumb-item active">Applications</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>{{ ucfirst($scholarship->name) }}</h5>
          <p>Sponsored by {{ ucfirst($scholarship->sponsor) }}</p>
        </div><!-- sl-page-title -->


{{-- Full texts
id	
sch_id	
user_id	
payable	
pmt_status	
status	
created_at	 --}}
                

<div class="row row-sm mg-t-20">
      <div class="col-12">
        <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
          {{-- <h6 class="card-body-title"></h6> --}}
          {{-- <p class="mg-b-20 mg-sm-b-30"></p> --}}
      <form action="{{ route('Applications.store') }}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="row">
            <label class="col-sm-4 form-control-label">Username: <span class="tx-danger">*</span></label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="hidden" class="form-control" name="sch_id" value="{{ $scholarship->id }}">
              <input type="text" readonly class="form-control" value="{{ Auth::User()->name }}">
            </div>
          </div><!-- row -->
          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Email: <span class="tx-danger">*</span></label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="hidden" class="form-control" name="user_id" value="{{ Auth::User()->id }} ">
              <input type="email" class="form-control"  value="{{ Auth::User()->email }}" placeholder="">
            </div>
          </div>
          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Amount to be paid: <span class="tx-danger">*</span></label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="hidden" readonly name="payable" value="{{ $scholarship->price }}" class="form-control">
              <input type="text" readonly  value="NGN {{ $scholarship->price }} to {{ $site->address }}" class="form-control">
            </div>
          </div>
          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Payment Proof: <span class="tx-danger">*</span></label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="file" required name="pmt_proof" class="form-control">
            </div>
          </div>
          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Comments: <span class="tx-danger">*</span></label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <textarea rows="2" class="form-control" placeholder="Optional"></textarea>
            </div>
          </div>
          <div class="form-layout-footer mg-t-30">
            <button class="btn btn-info mg-r-5">Submit Form</button>
            <button class="btn btn-secondary">Cancel</button>
          </div><!-- form-layout-footer -->
      </form>
        </div><!-- card -->
      </div><!-- col-6 -->
    </div><!-- row -->

      </div><!-- sl-pagebody -->
      @include('users.inc.footer')
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="{{ url('/') }}/lib/jquery/jquery.js"></script>
    <script src="{{ url('/') }}/lib/popper.js/popper.js"></script>
    <script src="{{ url('/') }}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{ url('/') }}/lib/jquery-ui/jquery-ui.js"></script>
    <script src="{{ url('/') }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="{{ url('/') }}/lib/highlightjs/highlight.pack.js"></script>
    <script src="{{ url('/') }}/lib/jquery.steps/jquery.steps.js"></script>
    <script src="{{ url('/') }}/lib/parsleyjs/parsley.js"></script>

    <script src="{{ url('/') }}/js/starlight.js"></script>
    <script>
      $(document).ready(function(){
        'use strict';

        $('#wizard1').steps({
          headerTag: 'h3',
          bodyTag: 'section',
          autoFocus: true,
          titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>'
        });

        $('#wizard2').steps({
          headerTag: 'h3',
          bodyTag: 'section',
          autoFocus: true,
          titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
          onStepChanging: function (event, currentIndex, newIndex) {
            if(currentIndex < newIndex) {
              // Step 1 form validation
              if(currentIndex === 0) {
                var fname = $('#firstname').parsley();
                var lname = $('#lastname').parsley();

                if(fname.isValid() && lname.isValid()) {
                  return true;
                } else {
                  fname.validate();
                  lname.validate();
                }
              }

              // Step 2 form validation
              if(currentIndex === 1) {
                var email = $('#email').parsley();
                if(email.isValid()) {
                  return true;
                } else { email.validate(); }
              }
            // Always allow step back to the previous step even if the current step is not valid.
            } else { return true; }
          }
        });

        $('#wizard3').steps({
          headerTag: 'h3',
          bodyTag: 'section',
          autoFocus: true,
          titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
          stepsOrientation: 1
        });

        $('#wizard4').steps({
          headerTag: 'h3',
          bodyTag: 'section',
          autoFocus: true,
          titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
          cssClass: 'wizard step-equal-width'
        });


      });
    </script>

  </body>
</html>
