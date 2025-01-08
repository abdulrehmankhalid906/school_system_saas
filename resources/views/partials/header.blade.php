<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
            <i class="bx bx-menu bx-md"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                {{-- <i class="bx bx-search bx-md"></i> --}}
                @if(Auth::user()->hasRole('School'))
                    <form method="POST" action="{{ route('send.sms') }}">
                        @csrf
                        <button class="btn btn-primary btn-sm" type="submit" >Send SMS</button>
                    </form>
                @endif

                @if(Auth::user()->hasRole('Teacher'))
                    <button type="button" class="btn btn-primary btn-sm check_in" onclick="markAttendance('check_in')">Check In</button>&nbsp;
                    <button type="button" class="btn btn-primary btn-sm check_out" onclick="markAttendance('check_out')">Check Out</button>
                @endif
            </div>
        </div>

        <ul class="navbar-nav flex-row align-items-center ms-auto">

            {{-- <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class="bx bx-globe bx-md"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item active" href="javascript:void(0);" data-language="en" data-text-direction="ltr">
                            <span>English</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class="bx bx-md bx-sun"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                    <li>
                        <a class="dropdown-item active" href="javascript:void(0);" data-theme="light">
                            <span><i class="bx bx-sun bx-md me-3"></i>Light</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                            <span><i class="bx bx-moon bx-md me-3"></i>Dark</span>
                        </a>
                    </li>
                </ul>
            </li> --}}

            <!-- Notifications Dropdown -->
            @if(Auth::user()->hasRole('School'))
            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <span class="position-relative">
                        <i class="bx bx-bell bx-md"></i>
                        <span class="badge rounded-pill bg-danger badge-dot badge-notifications border"></span>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end p-0">
                    <li class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                            <h6 class="mb-0 me-auto">Notification</h6>
                            <div class="d-flex align-items-center h6 mb-0">
                                {{-- <span class="badge bg-label-primary me-2">8 New</span> --}}
                                {{-- <a href="javascript:void(0)" class="dropdown-notifications-all p-2" data-bs-toggle="tooltip" title="Mark all as read">
                                    <i class="bx bx-envelope-open text-heading"></i>
                                </a> --}}
                            </div>
                        </div>
                    </li>

                    <li class="dropdown-notifications-list scrollable-container">
                        <ul class="list-group list-group-flush">
                            @forelse($notifications as $notification)
                                <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar">
                                                <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="small mb-0">{{ $notification->notificationTemplate->title ?? '' }}</h6>

                                            <small class="mb-1 d-block text-body">{{ Str::limit($notification->notificationTemplate->message, 39) ?? '' }}</small>
                                            <small class="text-muted">{{ $notification->created_at->diffForHumans() ?? '' }}</small>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <h6 class="small mb-0 text-center">No Notification</h6>
                                        </div>
                                    </div>
                                </li>
                            @endforelse
                        </ul>
                    </li>
                    <li class="border-top">
                        <div class="d-grid p-4">
                            <a class="btn btn-primary btn-sm d-flex" href="javascript:void(0);">
                                <small class="align-middle">View all notifications</small>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            @endif

            <!-- User Dropdown -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ InitS::getImage(Auth::user()->profile_image, 'profile') }}" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{ InitS::getImage(Auth::user()->profile_image, 'profile') }}" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">{{ Auth::user()->name ?? 'Agent User' }} - {{ Auth::id() ?? '0' }}</h6>
                                    <small class="text-muted">{{ Auth::user()?->roles->implode('name', ', ') }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider my-1"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('profile.index') }}">
                            <i class="bx bx-user bx-md me-3"></i><span>My Profile</span>
                        </a>
                    </li>
                    @if(Auth::user()->hasRole('School'))
                        <li>
                            <a class="dropdown-item" href="{{ route('school.index') }}">
                                <i class="bx bx-cog bx-md me-3"></i><span>My School</span>
                            </a>
                        </li>
                    @endif
                    <li>
                        <div class="dropdown-divider my-1"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <i class="bx bx-power-off bx-md me-3"></i><span>Log Out</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
