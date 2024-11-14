<div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid">
        <a href="http://localhost/school__/" class="topnav-logo" style= "min-width: unset;">
            <span class="topnav-logo-lg">
                <img src="http://localhost/school__/uploads/system/logo/logo-light.png" alt="" height="40">
            </span>
            <span class="topnav-logo-sm">
                <img src="http://localhost/school__/uploads/system/logo/logo-light-sm.png" alt="" height="40">
            </span>
        </a>

        <ul class="list-unstyled topbar-menu float-end mb-0">
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="account-user-avatar">
                        <img src="{{ asset('assets/extras/placeholder.jpg') }}" alt="user-image" class="rounded-circle">
                    </span>
                    <span>
                        <span class="account-user-name">{{ Auth::user()->name ?? 'Agent User' }}</span>
                        <span class="account-position">Superadmin</span>
                    </span>
                </a>

                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <a href="{{ route('profile.index') }}" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle me-1"></i>
                        <span>My account</span>
                    </a>
                    <a href="http://localhost/school__/superadmin/system_settings" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-edit me-1"></i>
                        <span>Settings</span>
                    </a>

                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <i class="mdi mdi-logout me-1"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
        <div class="app-search dropdown pt-1 mt-2">
            <h4 style="color: #fff; float: left;" class="d-none d-md-inline-block"> Alpha Guardian System</h4>
            {{-- <a href="http://localhost/school__/" target="" class="btn btn-outline-light ms-2 d-none d-md-inline-block">Visit website</a> --}}
        </div>
        <a class="button-menu-mobile disable-btn">
            <div class="lines">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>
    </div>
</div>
