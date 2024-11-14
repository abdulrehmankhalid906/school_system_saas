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



<div class="leftside-menu leftside-menu-detached">

    <div class="leftbar-user">
        <a href="javascript: void(0);">
            <img src="http://localhost/school__/uploads/users/placeholder.jpg" alt="user-image"
                height="42" class="rounded-circle shadow-sm">
            <span class="leftbar-user-name">Administrator</span>
        </a>
    </div>
    <!--- Sidemenu -->
    <ul class="side-nav">
        <li class="side-nav-title side-nav-item py-2">Navigation</li>
        <li class="side-nav-item">
            <a href="http://localhost/school__/superadmin/dashboard" class="side-nav-link py-2">
                <i class="dripicons-meter"></i>
                <span> Dashboard </span>
            </a>
        </li>

        <li class="side-nav-item"> <a href="http://localhost/school__/superadmin/online_admission"
                class="side-nav-link">
                <i class="dripicons-graduation"></i>
                <span>Online admission</span>
                <span class="badge bg-danger float-end">0</span>
            </a>
        </li>
        <li class="side-nav-item"> <a data-bs-toggle="collapse" href="#users" aria-expanded="false"
                aria-controls="users" class="side-nav-link py-2">
                <i class="dripicons-user"></i>
                <span>Users</span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="users">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="http://localhost/school__/superadmin/admin">Admin</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/student">Student</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/student/create">Admission</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/teacher">Teacher</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/permission">Teacher permission</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/parent">Parent</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/accountant">Accountant</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/librarian">Librarian</a>
                    </li>
                </ul>
            </div>

        <li class="side-nav-item"> <a data-bs-toggle="collapse" href="#academic" aria-expanded="false"
                aria-controls="academic" class="side-nav-link py-2">
                <i class="dripicons-store"></i>
                <span>Academic</span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="academic">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="http://localhost/school__/superadmin/attendance">Daily attendance</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/routine">Class routine</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/subject">Subject</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/syllabus">Syllabus</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/manage_class">Class</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/class_room">Class room</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/department">Department</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/event_calendar">Event calender</a>
                    </li>
                </ul>
            </div>

        <li class="side-nav-item"> <a data-bs-toggle="collapse" href="#exam" aria-expanded="false"
                aria-controls="exam" class="side-nav-link py-2">
                <i class="dripicons-to-do"></i>
                <span>Exam</span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="exam">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="http://localhost/school__/superadmin/mark">Marks</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/exam">Exam</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/grade">Grades</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/promotion">Promotion</a>
                    </li>
                </ul>
            </div>

        <li class="side-nav-item"> <a data-bs-toggle="collapse" href="#accounting" aria-expanded="false"
                aria-controls="accounting" class="side-nav-link py-2">
                <i class="dripicons-suitcase"></i>
                <span>Accounting</span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="accounting">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="http://localhost/school__/superadmin/invoice">Student fee manager</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/expense_category">Expense
                            category</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/expense">Expense manager</a>
                    </li>
                </ul>
            </div>

        <li class="side-nav-item"> <a data-bs-toggle="collapse" href="#back-office"
                aria-expanded="false" aria-controls="back-office" class="side-nav-link py-2">
                <i class="dripicons-archive"></i>
                <span>Back office</span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="back-office">
                <ul class="side-nav-second-level">
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#library" aria-expanded="false"
                            aria-controls="library">Library <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="library">
                            <ul class="side-nav-third-level">
                                <li>
                                    <a href="http://localhost/school__/superadmin/book">Book list
                                        manager</a>
                                </li>
                                <li>
                                    <a href="http://localhost/school__/superadmin/book_issue">Book issue
                                        report</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/session_manager">Session manager</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/addon_manager">Addon manager</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/noticeboard">Noticeboard</a>
                    </li>
                </ul>
            </div>

        <li class="side-nav-item"> <a data-bs-toggle="collapse" href="#settings" aria-expanded="false"
                aria-controls="settings" class="side-nav-link py-2">
                <i class="dripicons-cutlery"></i>
                <span>Settings</span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="settings">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="http://localhost/school__/superadmin/system_settings">System settings</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/website_settings">Website
                            settings</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/school_settings">School settings</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/payment_settings">Payment
                            settings</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/language">Language settings</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/smtp_settings">Smtp settings</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/about">About</a>
                    </li>
                </ul>
            </div>

    </ul>
    <!-- End Sidebar -->

    <div class="clearfix"></div>
    <!-- Sidebar -left -->

</div>