<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('home') }}" class="app-brand-link">
            @if(!Auth::user()->hasRole('Super Admin'))
                <img src="{{ InitS::getImage(Auth::user()->school->logo, 'logo') }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar">
            @else
                <span class="app-brand-text demo menu-text fw-bold ms-2 text-center">{{ Auth::user()->school->name ?? 'Hi, Admin' }}</span>
            @endif
        </a>

        <a href="javascript:void(0);"
            class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <li class="menu-item">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-desktop"></i>
                <div class="text-truncate" data-i18n="Dashboards">Dashboard</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div class="text-truncate" data-i18n="Management">Management</div>
            </a>

            <ul class="menu-sub">
                @if(Auth::user()->hasRole('Super Admin'))
                    <li class="menu-item {{ setRoute('users.index') }}">
                        <a href="{{ route('users.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Users">Users</div>
                        </a>
                    </li>

                    <li class="menu-item {{ setRoute('roles.index') }}">
                        <a href="{{ route('roles.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Roles">Roles</div>
                        </a>
                    </li>

                    <li class="menu-item {{ setRoute('permissions.index') }}">
                        <a href="{{ route('permissions.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Permissions">Permissions</div>
                        </a>
                    </li>

                    <li class="menu-item {{ setRoute('schools.index') }}">
                        <a href="{{ route('schools.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Schools">Schools</div>
                        </a>
                    </li>
                @endif

                @if(Auth::user()->hasRole('School'))
                    <li class="menu-item {{ setRoute('teachers.index') }}">
                        <a href="{{ route('teachers.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Teachers">Teachers</div>
                        </a>
                    </li>

                    <li class="menu-item {{ setRoute('index.parents') }}">
                        <a href="{{ route('index.parents') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Parents">Parents</div>
                        </a>
                    </li>

                    <li class="menu-item {{ setRoute('students.create') }}">
                        <a href="{{ route('students.create') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Register Student">Register Student</div>
                        </a>
                    </li>
                @endif
            </ul>
        </li>

        <!-- Front Pages -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-book-open"></i>
                <div class="text-truncate" data-i18n="Academic">Academic</div>
            </a>
            <ul class="menu-sub">

                @if(Auth::user()->hasRole('School'))
                    <li class="menu-item {{ setRoute('timetables.index') }}">
                        <a href="{{ route('timetables.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Timetables">Time Tables</div>
                        </a>
                    </li>
                @endif

                @if(Auth::user()->hasRole('School'))
                    <li class="menu-item {{ setRoute('subjects.index') }}">
                        <a href="{{ route('subjects.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Subject">Subjects</div>
                        </a>
                    </li>
                @endif

                @if(Auth::user()->hasRole('School'))
                    <li class="menu-item {{ setRoute('classes.index') }}">
                        <a href="{{ route('classes.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Class">Classes</div>
                        </a>
                    </li>
                @endif

                {{-- @if(Auth::user()->hasRole('School') || (Auth::user()->hasRole('Teacher') && Auth::user()->teacher?->is_attendance == 1)) --}}
                    <li class="menu-item {{ setRoute('get.attendence') }}">
                        <a href="{{ route('get.attendence') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Attendance Management">Attendance Management</div>
                        </a>
                    </li>
                {{-- @endif --}}
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-trophy"></i>
                <div class="text-truncate" data-i18n="Exam">Exam</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('subjects.index') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Marks">Marks</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('classes.index') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Exams">Exams</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('classes.index') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Grade">Grade</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-money-withdraw"></i>
                <div class="text-truncate" data-i18n="Accounts">Accounts</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('generate.fee') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Fee Manager">Fee Manager</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('subjects.index') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Fee Manager">Fee Manager</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('classes.index') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Expense Category">Expense Category</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('classes.index') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Expense Manager">Expense Manager</div>
                    </a>
                </li>
            </ul>
        </li>

        @if(Auth::user()->hasRole('Super Admin'))
            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-cog"></i>
                    <div class="text-truncate" data-i18n="Settings">Settings</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('site.create') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Set Site">Set Site</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</aside>
