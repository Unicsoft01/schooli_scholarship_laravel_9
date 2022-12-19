@php
  $users = App\Models\User::get();
  $applications = App\Models\Applications::get();
  $applications_ = App\Models\Applications::whereStatus('pending')->get();
  $sch = App\Models\Scholarship::get();
  $sch_ = App\Models\Scholarship::whereStatus('closed')->get();
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
                <th class="wd-40p">Full name</th>
                <th class="wd-30p">Email</th>
                <th class="wd-15p">Register on</th>
                <th class="wd-15p">User Status</th>
                <th class="wd-15p"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                                {{-- @php
                        $appl = App\Models\Applications::latest()->where('user_id', '=', $user->id)->limit(1)->get();
                  @endphp --}}
              <tr>
                <td>{{ ucfirst($user->name) }}</td>
                <td>{{ ucfirst($user->email) }}</td>
                <td>{!! date('D, d-M-y h:i', strtotime($user->created_at)) !!}</td>
                <td>{{ ucfirst($user->status) }}</td>
                
                <td>
                  @if ($user->status == "active")
                  <a href="block-user/{{ $user->id }}" class="btn btn-danger rounded-10 btn-sm ">Block User</a>
                  @else
                  <a href="unblock-user/{{ $user->id }}" class="btn btn-success rounded-10 btn-sm ">Activate User</a>
                  @endif
                </td>
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