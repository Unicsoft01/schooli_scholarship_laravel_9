@php
  $site = App\Models\Settings::find(1);
  $scholarships = App\Models\Scholarship::latest()->limit(8)->get();
  $Applications = App\Models\Applications::latest()->whereUser_id(Auth::User()->id)->get();
  $pending = App\Models\Applications::whereUser_id(Auth::User()->id)->where('status', '=', 'pending')->get();
  $approved = App\Models\Applications::whereUser_id(Auth::User()->id)->where('status', '=', 'approved')->get();
  $verified = App\Models\Applications::whereUser_id(Auth::User()->id)->where('pmt_status', '=', 'verified')->get();

  // $arrToInt = array_map('intval', $verified->payable);
  
@endphp
	
@extends('users.dashboard')
@section('main_contents')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
 
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="/">{{ $site->site_name }}</a>
    <span class="breadcrumb-item active">Dashboard</span>
  </nav>

  <div class="sl-pagebody">
    

    <div class="row row-sm">
      <div class="col-sm-6 col-xl-3">
        <div class="card pd-20 bg-primary">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Your Programs</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            {{-- <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span> --}}
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ count($Applications) }}</h3> <span class="text-white">Scholarships</span>
          </div><!-- card-body -->
          <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
            <div>
              <span class="tx-11 tx-white-6">Pending request</span>
              <h6 class="tx-white mg-b-0">{{ count($pending) }}</h6>
            </div>
            <div>
              <span class="tx-11 tx-white-6">Approved</span>
              <h6 class="tx-white mg-b-0">{{ count($approved) }}</h6>
            </div>
          </div><!-- -->
        </div><!-- card -->
      </div><!-- col-3 -->
      
      <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
        <div class="card pd-20 bg-sl-primary">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Invoice(s) Records</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">${{ $Applications }}</h3>
          </div><!-- card-body -->
          <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
            <div>
              <span class="tx-11 tx-white-6">Unpaid Invoice</span>
              <h6 class="tx-white mg-b-0">0</h6>
            </div>
            <div>
              <span class="tx-11 tx-white-6">Paid</span>
              <h6 class="tx-white mg-b-0">{{ count($verified) }}</h6>
            </div>
          </div><!-- -->
        </div><!-- card -->
      </div><!-- col-3 -->
    </div><!-- row -->

    <div class="row row-sm mg-t-20">
      <div class="col-12">


        <div class="card pd-20 pd-sm-25 mg-t-20">
          <h6 class="card-body-title tx-13">Hotest and Latest Schorlaships</h6>
          {{-- <p class="mg-b-20 mg-sm-b-30">A bar chart or bar graph is a chart with rectangular bars with lengths proportional to the values that they represent.</p> --}}
          <div class="table-wrapper">
            <table id="datatable1" class="table table-hover table-striped table-responsive display responsive nowrap table-bordered table-indigo disabled">
              <thead>
                <tr>
                  <th class="wd-35">Scholarship</th>
                  <th class="wd-20p">Sponsor</th>
                  <th class="wd-25p">Program Type</th>
                  <th class="wd-10p">Reg. Fee</th>
                  <th class="wd-5p">Slots</th>
                  <th class="wd-5p"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($scholarships as $scholarship)
                
                @php
                    $used = App\Models\Applications::where('sch_id', '=', $scholarship->id)->count();
                @endphp
                <tr>
                  <td>{{ $scholarship->name }}</td>
                  <td>{{ $scholarship->sponsor }}</td>
                  <td>{{ $scholarship->type }}</td>
                  <td>{{ $scholarship->price }}</td>
                  <td>{{ $used }}/{{ $scholarship->slots }}</td>
                  <td>
                    <a href="Applications/createApp/{{ $scholarship->id }}" title="Apply" class="btn btn-outline-indigo    btn-icon rounded-circle btn-sm btn-small">
                      <span class="p-1"><i class="fa fa-send"></i> </span>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{-- <button class="btn btn-secondary btn-sm " style="width: 100%">Primary</button> --}}
            <div class="card-footer tx-12 pd-y-1 bg-transparent bd-t bd-gray-200">
              <a href="{{ route('Applications.index') }}"><i class="fa fa-angle-down mg-r-5"></i>See more scholarship programs</a>
            </div>

          </div><!-- table-wrapper -->
        </div><!-- card -->
        

      </div><!-- col-8 -->
    </div><!-- row -->

  </div><!-- sl-pagebody -->
@include('users.inc.footer')

<script>
  $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
</div>
@endsection