<div class="leftside-menu leftside-menu-detached">

    <div class="leftbar-user">
        <a href="javascript: void(0);">
            <img src="{{ asset('assets/extras/placeholder.jpg') }}" alt="user-image" height="42" class="rounded-circle shadow-sm">
            <span class="leftbar-user-name">{{ Auth::user()->name ?? 'Administrator' }}</span>
        </a>
    </div>
    <!--- Sidemenu -->
    <ul class="side-nav">
        <li class="side-nav-title side-nav-item py-2">Menu Master</li>
        <li class="side-nav-item">
            <a href="{{ route('home') }}" class="side-nav-link py-2">
                <i class="mdi mdi-monitor-dashboard"></i>
                <span> Dashboard </span>
            </a>
        </li>

        <li class="side-nav-item"> <a data-bs-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users" class="side-nav-link py-2">
                <i class="dripicons-user"></i>
                <span>Management</span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="users">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="{{ route('users.index') }}">Users</a>
                    </li>
                    <li>
                        <a href="{{ route('roles.index') }}">Roles</a>
                    </li>
                    <li>
                        <a href="{{ route('permissions.index') }}">Permissions</a>
                    </li>
                    <li>
                        <a href="{{ route('students.create') }}"> Register Student </a>
                    </li>
                    <li>
                        <a href="{{ route('schools.index') }}">School</a>
                    </li>
                </ul>
            </div>

        <li class="side-nav-item"> <a data-bs-toggle="collapse" href="#academic" aria-expanded="false" aria-controls="academic" class="side-nav-link py-2">
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
                        <a href="{{ route('subjects.index') }}">Subject</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/syllabus">Syllabus</a>
                    </li>
                    <li>
                        <a href="{{ route('classes.index') }}">Class</a>
                    </li>                    
                </ul>
            </div>

        <li class="side-nav-item"> <a data-bs-toggle="collapse" href="#exam" aria-expanded="false" aria-controls="exam" class="side-nav-link py-2">
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

        <li class="side-nav-item"> <a data-bs-toggle="collapse" href="#accounting" aria-expanded="false" aria-controls="accounting" class="side-nav-link py-2">
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
                        <a href="http://localhost/school__/superadmin/expense_category">Expense category</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/expense">Expense manager</a>
                    </li>
                </ul>
            </div>

        <li class="side-nav-item"> <a data-bs-toggle="collapse" href="#back-office" aria-expanded="false" aria-controls="back-office" class="side-nav-link py-2">
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

        <li class="side-nav-item"> <a data-bs-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings" class="side-nav-link py-2">
                <i class="mdi mdi-cogs"></i>
                <span>Settings</span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="settings">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="{{ route('site.create') }}">Site settings</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/payment_settings">Payment settings</a>
                    </li>
                    <li>
                        <a href="http://localhost/school__/superadmin/smtp_settings">Smtp settings</a>
                    </li>
                </ul>
            </div>

    </ul>
    <!-- End Sidebar -->

    <div class="clearfix"></div>
    <!-- Sidebar -left -->
</div>