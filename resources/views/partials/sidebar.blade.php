<div class="navbar-brand-box">
    <!-- Dark Logo-->
    <a href="index.html" class="logo logo-dark">
        <span class="logo-sm">
            <img src="{{ asset('theme/images/logo-sm.png') }}" alt="" height="22">
        </span>
        <span class="logo-lg">
            <img src="{{ asset('theme/images/logo-dark.png') }}" alt="" height="17">
        </span>
    </a>
    <!-- Light Logo-->
    <a href="index.html" class="logo logo-light">
        <span class="logo-sm">
            <img src="{{ asset('theme/images/logo-sm.png') }}" alt="" height="22">
        </span>
        <span class="logo-lg">
            <img src="{{ asset('theme/images/logo-dark.png') }}" alt="" height="17">
        </span>
    </a>
    <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
        <i class="ri-record-circle-line"></i>
    </button>
</div>

<div id="scrollbar">
    <div class="container-fluid">

        <div id="two-column-menu">
        </div>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span data-key="t-menu">Menu</span></li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarDashboards">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link" data-key="t-dashboard"> Dashboard </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('subjects.index') }}" class="nav-link" data-key="t-subject"> Subjects </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('site.create') }}" class="nav-link" data-key="t-site"> Site Setting </a>
                        </li>
                        <li class="nav-item">
                            <a href="dashboard-crypto.html" class="nav-link" data-key="t-crypto"> Crypto </a>
                        </li>
                        <li class="nav-item">
                            <a href="dashboard-projects.html" class="nav-link" data-key="t-projects"> Projects </a>
                        </li>
                    </ul>
                </div>
            </li> <!-- end Dashboard Menu -->
           
        </ul>
    </div>
</div>