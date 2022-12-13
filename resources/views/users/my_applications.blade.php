@php
      $Applications = App\Models\Applications::latest()->whereUser_id(Auth::User()->id)->get();
  $site = App\Models\Settings::find(1);
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
    <link href="{{ url('/') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="{{ url('/') }}/lib/select2/css/select2.min.css" rel="stylesheet">


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
    <!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <!-- sl-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('Scholarship.index') }}">{{ $site->site_name }}</a>
        {{-- <a class="breadcrumb-item" href="index.html">Tables</a> --}}
        <span class="breadcrumb-item active">My Scholarships</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Scholarship Table</h5>
          {{-- <p>Pay your fees on time to keep your order</p> --}}
        </div><!-- sl-page-title -->


        <div class="card pd-20 pd-sm-25 mg-t-20">     
            {{-- <h6 class="card-body-title tx-13">Hotest and Latest Schorlaships</h6> --}}
            {{-- <p class="mg-b-20 mg-sm-b-30">A bar chart or bar graph is a chart with rectangular bars with lengths proportional to the values that they represent.</p> --}}
            <div class="table-wrapper">
              <table id="datatable1" class="table table-hover table-striped table-responsive display responsive nowrap table-bordered table-indigo disabled">
                <thead>
                  <tr>
                    <th class="wd-35p">Scholarship </th>
                    <th class="wd-20p">Sponsor</th>
                    <th class="wd-25p">Program Type</th>
                    <th class="wd-10p">Amount paid</th>
                    <th class="wd-5p">payment status</th>
                    <th class="wd-5p">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($Applications as $k => $Application)

{{-- sch_id	
user_id	
payable	
pmt_status	
SCHOLARSHIP	SPONSOR	PROGRAM TYPE
status --}}
                  {{-- @php
                        $scholarship = App\Models\Scholarship::where('id', '=', $Application->sch_id)->get();
                  @endphp --}}
                  <tr>
                    <td  data-toggle="tooltip" data-placement="top" title="Tab to see more info">{{ $Application->sch_name }} <span class="d-md-none d-sm-block bold">+</span></td>
                    <td>{{ $Application->sponsor }}</td>
                    <td>{{ $Application->type }}.</td>
                    <td>{{ $Application->payable }}</td>
                    <td>{{ $Application->pmt_status }}</td>
                    <td>{{ $Application->status }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{-- <button class="btn btn-secondary btn-sm " style="width: 100%">Primary</button> --}}
              <div class="card-footer tx-12 pd-y-1 bg-transparent bd-t bd-gray-200">
                <a href="{{ route('Scholarship.index') }}"><i class="fa fa-angle-down mg-r-5"></i>See more scholarship programs</a>
              </div>
  
            </div><!-- table-wrapper -->
          </div><!-- card -->

        

      </div><!-- sl-pagebody -->
      @include('users.inc.footer')

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



    <script src="{{ url('/') }}/lib/jquery/jquery.js"></script>
    <script src="{{ url('/') }}/lib/popper.js/popper.js"></script>
    <script src="{{ url('/') }}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{ url('/') }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="{{ url('/') }}/lib/highlightjs/highlight.pack.js"></script>
    <script src="{{ url('/') }}/lib/datatables/jquery.dataTables.js"></script>
    <script src="{{ url('/') }}/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="{{ url('/') }}/lib/select2/js/select2.min.js"></script>

    <script src="{{ url('/') }}/js/starlight.js"></script>
    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>

  </body>
</html>
