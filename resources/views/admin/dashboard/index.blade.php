@php
  $users = App\Models\User::get();
  $users_ = App\Models\User::whereStatus('active')->get();
  $applications = App\Models\Applications::whereStatus('pending')->get();
  $applications_ = App\Models\Applications::whereStatus('pending')->get();
  $sch = App\Models\Scholarship::get();
  $sch_ = App\Models\Scholarship::whereStatus('closed')->get();
@endphp

@extends('admin.dashboard')
@section('main_contents')
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    {{-- <a class="breadcrumb-item" href="index.html">Starlight</a> --}}
    <span class="breadcrumb-item active">Admin Dashboard</span>
  </nav>

  <div class="sl-pagebody">
    

    <div class="row row-sm">
      <div class="col-sm-6 col-xl-3">
        <div class="card pd-20 bg-primary">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Reg. Users</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            {{-- <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span> --}}
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ count($users) }}</h3>
          </div><!-- card-body -->
          <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
            <div>
              <span class="tx-11 tx-white-6">Blocked</span>
              <h6 class="tx-white mg-b-0">{{ count(App\Models\User::whereStatus('blocked')->get()) }}</h6>
            </div>
            <div>
              <span class="tx-11 tx-white-6">Active Users</span>
              <h6 class="tx-white mg-b-0">{{ count($users_) }}</h6>
            </div>
          </div><!-- -->
        </div><!-- card -->
      </div><!-- col-3 -->
      <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
        <div class="card pd-20 bg-info">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Scholarship Programs</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            {{-- <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span> --}}
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ count($sch) }}</h3>
          </div><!-- card-body -->
          <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
            <div>
              <span class="tx-11 tx-white-6">Opened Applications</span>
              <h6 class="tx-white mg-b-0">{{ count($sch)-count($sch_) }}</h6>
            </div>
            <div>
              <span class="tx-11 tx-white-6">Closed Applications</span>
              <h6 class="tx-white mg-b-0">{{ count($sch_) }}</h6>
            </div>
          </div><!-- -->
        </div><!-- card -->
      </div><!-- col-3 -->
      <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
        <div class="card pd-20 bg-purple">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Applications</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            {{-- <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span> --}}
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ count(App\Models\Applications::get()) }}</h3>
          </div><!-- card-body -->
          <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
            <div>
              <span class="tx-11 tx-white-6">Pending Applications</span>
              <h6 class="tx-white mg-b-0">{{ count($applications_) }}</h6>
              {{-- {{  App\Models\User::find($application->user_id)->name }} --}}
            </div>
            <div>
              <span class="tx-11 tx-white-6">Approved Applications</span>
              <h6 class="tx-white mg-b-0">{{ count(App\Models\Applications::whereStatus('approved')->get())-count($applications_) }}</h6>
            </div>
          </div><!-- -->
        </div><!-- card -->
      </div><!-- col-3 -->
      <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
        <div class="card pd-20 bg-sl-primary">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total storage Size</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            {{-- <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span> --}}
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">10GB</h3>
          </div><!-- card-body -->
          <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
            <div>
              <span class="tx-11 tx-white-6">In Use</span>
              <h6 class="tx-white mg-b-0">0.2GB</h6>
            </div>
            <div>
              <span class="tx-11 tx-white-6">Free</span>
              <h6 class="tx-white mg-b-0">9.8GB</h6>
            </div>
          </div><!-- -->
        </div><!-- card -->
      </div><!-- col-3 -->
    </div><!-- row -->

    
    {{-- start data tables  --}}
    <div class="sl-pagebody">

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Pending Trasactions</h6>
        <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p>

{{-- Full texts
id	
sch_id	
user_id	
sch_name	
sponsor	
type	
payable	
pmt_status	
status	
created_at	
updated_at --}}
        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">Trans.</th>
                <th class="wd-15p">User</th>
                <th class="wd-5p">Type</th>
                <th class="wd-5p">Paid</th>
                <th class="wd-10p">Date</th>
                <th class="wd-5p">Pmt. Status</th>
                <th class="wd-5p">Trans. Status</th>
                <th class="wd-5p"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($applications as $application)
              <tr>
                <td>{{  App\Models\Scholarship::find($application->sch_id)->name }}</td>
                <td>{{  App\Models\User::find($application->user_id)->name }}</td>
                <td>{{ ucfirst($application->type) }}</td>
                <td>{{ number_format($application->payable) }}</td>
                <td>{!! date('d-M-y h:i', strtotime($application->created_at)) !!}</td>
                <td>
                  @if ($application->pmt_status == "pending")
                  <button class="btn btn-primary disabled rounded-20 btn-sm btn-small">{{ ucfirst($application->pmt_status)}}</button>
                  @elseif ($application->pmt_status == "verified")
                  <button class="btn btn-secondary disabled rounded-20 btn-sm btn-small">{{ ucfirst($application->pmt_status)}}</button>
                  @else
                  {{ ucfirst($application->pmt_status)}}
                  @endif
                </td>
                <td>{{ ucfirst($application->status)}}</td>
                <td><a href="{{route('Scholarship.edit', $application->id)}}" class="btn btn-success rounded-10 btn-sm btn-small">Approve Trans.</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->


    </div><!-- sl-pagebody -->

    
@include('admin.inc.footer')
</div>
@endsection