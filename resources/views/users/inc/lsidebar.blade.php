<div class="sl-logo bg-indigo"><a href=""><i class="icon ion-android-star-outline"></i> {{ $site->site_name }}</a></div>
<div class="sl-sideleft">
  <div class="input-group input-group-search">
    <input type="search" name="search" class="form-control" placeholder="Search">
    <span class="input-group-btn">
      <button class="btn"><i class="fa fa-search"></i></button>
    </span><!-- input-group-btn -->
  </div><!-- input-group -->
<style>
  .active_{
    color: white;
    background: #823BF4;
  }
</style>
  <label class="sidebar-label">Navigation</label>
  <div class="sl-sideleft-menu">
    <a href="/dashboard" class="sl-menu-link @if(route('dashboard')==url()->current()) active_ @endif">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
        <span class="menu-item-label">Dashboard</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <a href="{{ route('Applications.index') }}" class="sl-menu-link @if(route('Applications.index')==url()->current()  || route('Applications.create')==url()->current()) active_ @endif">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
        <span class="menu-item-label">Programs</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <a href="#" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
        <span class="menu-item-label">My Records</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('payments') }}" class="nav-link">My Payments</a></li>
      <li class="nav-item"><a href="{{ route('my.applications') }}" class="nav-link">My programs</a></li>
    </ul>
  </div><!-- sl-sideleft-menu -->

  <br>
</div><!-- sl-sideleft -->