@php
  $users = App\Models\User::get();
  $applications = App\Models\Applications::get();
  
@endphp

@extends('admin.dashboard')
@section('main_contents')
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="admin/dashboard">Admin Dashboard</a>
    <span class="breadcrumb-item active">Users table</span>
  </nav>

  <div class="sl-pagebody">

    
    {{-- start data tables  --}}
    <div class="sl-pagebody">

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Registered Users Table</h6>
        {{-- <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p> --}}

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
                        <th class="wd-40p">Pmt For </th>
                        <th class="wd-20p">Users</th>
                        <th class="wd-15p">Amount paid</th>
                        <th class="wd-20p">Paid</th>
                        <th class="wd-10p">Modified</th>
                        <th class="wd-10p">Status</th>
                        <th class="wd-5p"></th>
                      </tr>
            </thead>
            <tbody>
              @foreach ($applications as $application)
                                @php
                        $user = App\Models\User::find($application->user_id);
                  @endphp
              <tr>
                <td>{{ ucfirst($application->sch_name) }}</td>
                <td>{{ ucfirst($user->name) }}</td>
                <td>{{ number_format($application->payable) }}</td>
                <td>{!! date('D, d-M-y h:i', strtotime($user->created_at)) !!}</td>
                <td>{!! date('D, d-M-y h:i', strtotime($user->updated)) !!}</td>
                <td>{{ ucfirst($application->pmt_status) }}</td>
                
                <td><button class="btn btn-success rounded-10">Approve Payment</button></td>
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