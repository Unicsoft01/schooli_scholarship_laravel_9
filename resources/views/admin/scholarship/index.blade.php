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
        {{-- <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p> --}}

{{-- Full texts

Full texts
id	
name	
sponsor	
type	
cert	
country	
requirement	
about	
price	
slots	
status	
created_at	
updated_at	 --}}
        <div class="table-wrapper table-responsive">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
                  <tr>
                        <th class="wd-30p">Program </th>
                        <th class="wd-15p">sponsor</th>
                        <th class="wd-15p">School type</th>
                        <th class="wd-10p">Cert. type</th>
                        <th class="wd-10p">Country</th>
                        <th class="wd-5p">Payable</th>
                        <th class="wd-5p">Slots</th>
                        {{-- <th class="wd-5p">Created</th> --}}
                        {{-- <th class="wd-5p"></th> --}}
                      </tr>
            </thead>
            <tbody>
              @foreach ($scholarships as $scholarship)
              @php
              $used = App\Models\Applications::where('sch_id', '=', $scholarship->id)->count();
          @endphp
                <td>{{ ucfirst($scholarship->name) }}</td>
                <td>{{ ucfirst($scholarship->sponsor) }}</td>
                <td>{{ ucfirst($scholarship->type) }}</td>
                <td>{{ ucfirst($scholarship->cert) }}</td>
                <td>{{ ucfirst($scholarship->country) }}</td>
                  <td>{{ number_format($scholarship->price) }}</td>
                  <td>{{ $used }}/{{ $scholarship->slots }}</td>
                {{-- <td>{!! date('D, d-M-y h:i', strtotime($scholarship->created_at)) !!}</td> --}}
                
                {{-- <td><button class="btn btn-success rounded-10 btn-sm btn-small">More</button></td> --}}
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