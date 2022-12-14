<div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> {{ $site->site_name }}</a></div>
<div class="sl-sideleft">

  <label class="sidebar-label">Navigation</label>
  <div class="sl-sideleft-menu">
    <a href="index.html" class="sl-menu-link active">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
        <span class="menu-item-label">Dashboard</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->

    <a href="{{ route('Users.create') }}" class="sl-menu-link ">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
        <span class="menu-item-label">Users</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link --> 
    <a href="{{ route('users.applications') }}" class="sl-menu-link ">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
        <span class="menu-item-label">User Applications</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->    

    <a href="{{ route('payments.show') }}" class="sl-menu-link ">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
        <span class="menu-item-label">Payments</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->  
    <a href="#" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
        <span class="menu-item-label">Programs</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('Scholarship.index') }}" class="nav-link">Programs</a></li>
      <li class="nav-item">
        {{-- <a href="page-signin.html" class="nav-link">New Program</a> --}}
        <a href="" class="nav-link" data-toggle="modal" data-target="#modaldemo3">New Program</a>
      </li>
      {{-- <li class="nav-item"><a href="page-signup.html" class="nav-link">Signup Page</a></li> --}}
      {{-- <li class="nav-item"><a href="page-notfound.html" class="nav-link">404 Page Not Found</a></li> --}}
    </ul>
  

    <a href="index.html" class="sl-menu-link ">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
        <span class="menu-item-label">Settings</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->


  </div><!-- sl-sideleft-menu -->

  <br>
</div><!-- sl-sideleft -->


<!-- LARGE MODAL -->
<div id="modaldemo3" class="modal fade">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content tx-size-sm">
    <div class="modal-header pd-x-20">
      <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Create New Program</h6>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body pd-20">

      {{-- Full texts
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
      updated_at --}}

<form action="{{ route('Scholarship.store') }}" method="post">
@csrf
<div class="form-layout">
  <div class="row mg-b-25">
    <div class="col-lg-4">
      <div class="form-group">
        <label class="form-control-label">Program name: <span class="tx-danger">*</span></label>
        <input class="form-control" type="text" name="name" placeholder="E.g BSc Computer Science">
      </div>
    </div><!-- col-4 -->
    <div class="col-lg-4">
      <div class="form-group">
        <label class="form-control-label">Program Sponsor: <span class="tx-danger">*</span></label>
        <input class="form-control" type="text" name="sponsor" placeholder="E.g Mr. Unicsoft ">
      </div>
    </div><!-- col-4 -->
    <div class="col-lg-4">
      <div class="form-group">
        <label class="form-control-label">School type: <span class="tx-danger">*</span></label>
        <input class="form-control" type="text" name="type" placeholder="University/Poly">
      </div>
    </div><!-- col-4 -->
    <div class="col-md-4">
      <div class="form-group mg-b-10-force">
        <label class="form-control-label">Certificate Type: <span class="tx-danger">*</span></label>
        <input class="form-control" type="text" name="certificate" placeholder="Certificate type">
      </div>
    </div><!-- col-4 -->
    <div class="col-md-4">
      <div class="form-group mg-b-10-force">
        <label class="form-control-label">Country: <span class="tx-danger">*</span></label>
        <input class="form-control" type="text" name="country" placeholder="Country">
      </div>
    </div><!-- col-4 -->
    <div class="col-md-4">
      <div class="form-group mg-b-10-force">
        <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
        <input class="form-control" type="text" name="about" placeholder="Program Decription">
      </div>
    </div><!-- col-4 -->
    <div class="col-md-4">
      <div class="form-group mg-b-10-force">
        <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
        <input class="form-control" type="number" name="price" placeholder="Payable">
      </div>
    </div><!-- col-4 -->
    <div class="col-md-8">
      <div class="form-group mg-b-10-force">
        <label class="form-control-label">Slot available: <span class="tx-danger">*</span></label>
        <input class="form-control" type="number" name="slots" placeholder="Payable">
      </div>
    </div><!-- col-4 -->
  </div><!-- row -->

  <div class="form-layout-footer">
    <button class="btn btn-info mg-r-5">Proceed</button>
    <button class="btn btn-secondary">Cancel</button>
  </div><!-- form-layout-footer -->
</div><!-- form-layout -->
</form>


    </div><!-- modal-body -->
    <div class="modal-footer">
      {{-- <button type="button" class="btn btn-info pd-x-20">Save changes</button>
      <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button> --}}
    </div>
  </div>
</div><!-- modal-dialog -->
</div><!-- modal -->