@php
//   $users = App\Models\User::get();
  $applications = App\Models\Applications::get();
  
@endphp

@extends('admin.dashboard')
@section('main_contents')
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="admin/dashboard">Admin Dashboard</a>
    <span class="breadcrumb-item active">Users application</span>
  </nav>

  <div class="sl-pagebody">

    
    {{-- start data tables  --}}
    <div class="sl-pagebody">

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Applicants Applications</h6>
        {{-- <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p> --}}

{{-- Full texts


Full texts
id	
sch_id	
user_id	
sch_name	
sponsor	
type	
payable	
updated_at	
pmt_status	
status	
created_a	 --}}
        <div class="table-wrapper table-responsive">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
                  <tr>
                        <th class="wd-35p">Program </th>
                        <th class="wd-15p">User</th>
                        <th class="wd-15p">School type</th>
                        <th class="wd-10p">Cert. type</th>
                        <th class="wd-10p">Country</th>
                        <th class="wd-5p">Paid</th>
                        <th class="wd-5p">Created</th>
                        <th class="wd-5p"></th>
                      </tr>
            </thead>
            <tbody>
              @foreach ($applications as $application)
              @php
              $used = App\Models\Applications::where('sch_id', '=', $application->id)->count();
          @endphp
                <td>{{ ucfirst($application->name) }}</td>
                <td>{{ ucfirst($application->sponsor) }}</td>
                <td>{{ ucfirst($application->type) }}</td>
                <td>{{ ucfirst($application->cert) }}</td>
                <td>{{ ucfirst($application->country) }}</td>
                  <td>{{ number_format($application->price) }}</td>
                  <td>{{ $used }}/{{ $application->slots }}</td>
                <td>{!! date('D, d-M-y h:i', strtotime($application->created_at)) !!}</td>
                
                <td><button class="btn btn-success rounded-10">More</button></td>
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