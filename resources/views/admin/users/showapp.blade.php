@php
    $pageTitle = "Apply for scholarship";
    $site = App\Models\Settings::find(1);
    $appid = $id[0];
    $user_id = $id[1];
    $scholarship = App\Models\Scholarship::find($appid);
    $user = App\Models\User::find($user_id);
    $requirements = App\Models\Requirements::latest()->whereSch_id($appid)->get();
    $application = App\Models\Applications::whereUser_id($user_id)->get();
@endphp
{{-- {{ $scholarship }}
<hr/>
{{ $user }}
<hr/>
{{ $requirements }}
<hr/>
{{ $application }} --}}
@extends('admin.dashboard')
@section('main_contents')
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="admin/dashboard">Admin Dashboard</a>
    <span class="breadcrumb-item active">{{ ucfirst($scholarship->name) }}</span>
  </nav>

  <div class="sl-pagebody">
        <div class="sl-page-title">
          <img src="{{ url('/') }}/img/{{ $scholarship->sch_img }}" class="wd-60 rounded-circle" alt="">
          <h5> {{ ucfirst($scholarship->name) }}</h5>
          <p>Sponsored by {{ ucfirst($scholarship->sponsor) }}</p>
        </div><!-- sl-page-title -->



        <div class="card pd-20 pd-sm-40 mg-t-50">
          {{-- <h6 class="card-body-title">Card with as &amp; Options</h6>
          <p class="mg-b-20 mg-sm-b-30">Cards with some options in the right corner of header of card.</p> --}}

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header card-header-default justify-content-between bg-gray-400">
                  <h6 class="mg-b-0 tx-14 tx-inverse">Program Descriptions</h6>
                </div><!-- card-header -->
                <div class="card-body bg-gray-200">
                  <p class="mg-b-0">{{ ucfirst($scholarship->about) }}</p>
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- col-6 -->
          </div><!-- row -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header card-header-default justify-content-between bg-gray-400">
                  <h6 class="mg-b-0 tx-14 tx-inverse">Scholarship requirements</h6>
                </div><!-- card-header -->
                <div class="card-body bg-gray-200">
                  <p class="mg-b-0"> Requirements for the program:</p>
                  @foreach ($requirements as $requirement)
                   <li class="mg-b-0">{{ ucfirst($requirement->requirements) }}</li>
                  @endforeach
                  {{-- <li class="mg-b-0">{{ ucfirst($scholarship->about) }}</li> --}}
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- col-6 -->
          </div><!-- row -->
          <div class="row">
            
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header card-header-default justify-content-between bg-gray-400">
                  <h6 class="mg-b-0 tx-14 tx-inverse">Application Requirements</h6>
                </div><!-- card-header -->
                <div class="card-body bg-gray-200">
                  <div class="card pd-20 pd-sm-40 mg-t-50">
                    {{-- <h6 class="card-body-title">File Browser</h6> --}}
                    <p class="mg-b-20 mg-sm-b-30">Please ensure to Submit original copies of each document</p>
          
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                              <tr>
                                    <th class="wd-50p">File name </th>
                                    <th class="wd-50p"></th>
                                  </tr>
                        </thead>
                        <tbody>
                          @foreach ($application as $file)
                          <tr>
                            <td>{{ $file->cert_file }}</td>
                          <td><a href="{{ route('download',$file->cert_file) }}" class="btn btn-primary btn-sm btn-small">Download</a></td>
                          </tr>
                          <tr>
                            <td>{{ $file->resume }}</td>
                          <td><a href="{{ route('download',$file->resume) }}" class="btn btn-primary btn-sm btn-small">Download</a></td>
                          </tr>
                          <tr>
                            <td>{{ $file->letter_recommend }}</td>
                          <td><a href="{{ route('download',$file->letter_recommend ) }}" class="btn btn-primary btn-sm btn-small">Download</a></td>
                          </tr>
                          <tr>
                             <td>{{ $file->passport }}</td>
                          <td><a href="{{ route('download',$file->passport) }}" class="btn btn-primary btn-sm btn-small">Download</a></td>
                          </tr>
                          <tr>
                             <td>{{ $file->eng_prof }}</td>
                          <td><a href="{{ route('download',$file->eng_prof) }}" class="btn btn-primary btn-sm btn-small">Download</a></td>
                          </tr>
                          <tr>
                            <td>{{ $file->sop }}</td>
                          <td><a href="{{ route('download',$file->sop) }}" class="btn btn-primary btn-sm btn-small">Download</a></td>
                          </tr>
                          <tr>
                            <td>{{ $file->addition }}</td>
                          <td><a href="{{ route('download',$file->addition) }}" class="btn btn-primary btn-sm btn-small">Download</a></td>
                          </tr>
                          <tr>
                            <td>{{ $file->pmt_proof }}</td>
                          <td><a href="{{ route('download',$file->pmt_proof) }}" class="btn btn-primary btn-sm btn-small">Download</a></td>
                          </tr>
                          <tr>
                            <td>{{ $file->degree }}</td>
                          <td><a href="{{ route('download',$file->degree) }}" class="btn btn-primary btn-sm btn-small">Download</a></td>
                          </tr>
                          
                          
                          
                         
                         
                          
                          
                          
                          
                          @endforeach</tbody>
                        </table>
                      </div><!-- table-wrapper -->
                  </div>
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- col-6 -->
          </div><!-- row -->
        </div><!-- card -->


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
@include('admin.inc.footer')
</div>
@endsection
