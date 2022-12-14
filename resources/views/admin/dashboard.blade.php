@php
  $site = App\Models\Settings::find(1);
@endphp
<!DOCTYPE html>
<base href="{{ url('/') }}">
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="{{ url('/') }}">
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

    <title>{{ $pageTitle }} - {{ $site->site_name }}</title>

    <!-- vendor css -->
    <link href="{{ url('/') }}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ url('/') }}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{ url('/') }}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    {{-- <link href="{{ url('/') }}/lib/rickshaw/rickshaw.min.css" rel="stylesheet"> --}}
    <link href="{{ url('/') }}/lib/highlightjs/github.css" rel="stylesheet">
    <link href="{{ url('/') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="{{ url('/') }}/lib/select2/css/select2.min.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/css/starlight.css">

  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    @include('admin.inc.lsidebar')
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @include('admin.inc.header')
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    {{-- @include('admin.inc.rsidebar') --}}
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    @yield('main_contents')
    <!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    {{-- <script src="{{ url('/') }}/lib/jquery/jquery.js"></script>
    <script src="{{ url('/') }}/lib/popper.js/popper.js"></script>
    <script src="{{ url('/') }}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{ url('/') }}/lib/jquery-ui/jquery-ui.js"></script> --}}
    <script src="{{ url('/') }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="{{ url('/') }}/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="{{ url('/') }}/lib/d3/d3.js"></script>
    <script src="{{ url('/') }}/lib/rickshaw/rickshaw.min.js"></script>
    <script src="{{ url('/') }}/lib/chart.js/Chart.js"></script>
    <script src="{{ url('/') }}/lib/Flot/jquery.flot.js"></script>
    <script src="{{ url('/') }}/lib/Flot/jquery.flot.pie.js"></script>
    <script src="{{ url('/') }}/lib/Flot/jquery.flot.resize.js"></script>
    <script src="{{ url('/') }}/lib/flot-spline/jquery.flot.spline.js"></script>

    <script src="{{ url('/') }}/js/starlight.js"></script>
    <script src="{{ url('/') }}/js/ResizeSensor.js"></script>
    <script src="{{ url('/') }}/js/dashboard.js"></script>


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
            searchPlaceholder: 'Search..',
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
