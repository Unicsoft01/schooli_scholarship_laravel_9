<div class="sl-header bg-indigo">
      <div class="sl-header-left bg-indigo">
        <div class="navicon-left  bg-indigo hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left  bg-indigo hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name"><span class="hidden-md-down"> {{ ucwords(Auth::User()->name) }}</span></span>
              <img src="{{ url('/') }}/img/img3.jpg" class="wd-32 rounded-circle" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href="{{ route('profile.edit') }}"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                {{-- <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li> --}}
                <li><a href="{{ route('payments') }}"><i class="icon ion-ios-folder-outline"></i> My Payments</a></li>
                <li><a href="{{ route('logout') }}"><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->