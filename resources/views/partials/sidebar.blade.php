<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('home') }}" class="app-brand-link">
            @if(!Auth::user()->hasRole('Super Admin'))
                <img src="{{ InitS::getImage(Auth::user()->school->logo, 'logo') }}" alt="user-avatar" class="d-block w-px-180 h-px-150 rounded" id="uploadedAvatar">
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
                <div class="text-truncate" data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        {{-- Management Tab --}}

        @if(Auth::user()->hasRole(['Super Admin','School']))
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                    <div class="text-truncate" data-i18n="Management">Management</div>
                </a>

                <ul class="menu-sub">
                    @if(Auth::user()->hasRole('Super Admin'))
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

                        <li class="menu-item {{ setRoute('notifications.index') }}">
                            <a href="{{ route('notifications.index') }}" class="menu-link">
                                <div class="text-truncate" data-i18n="Notifications Templates">Notifications Templates</div>
                            </a>
                        </li>
                    @endif

                    @if(Auth::user()->hasRole('School'))

                        <li class="menu-item {{ setRoute('parents.index') }}">
                            <a href="{{ route('parents.index') }}" class="menu-link">
                                <div class="text-truncate" data-i18n="Parents">Parents</div>
                            </a>
                        </li>

                        <li class="menu-item {{ setRoute('students.index') }}">
                            <a href="{{ route('students.index') }}" class="menu-link">
                                <div class="text-truncate" data-i18n="Students">Students</div>
                            </a>
                        </li>

                        <li class="menu-item {{ setRoute('teachers.index') }}">
                            <a href="{{ route('teachers.index') }}" class="menu-link">
                                <div class="text-truncate" data-i18n="Teachers">Teachers</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Acadmic Tab --}}

        @if(Auth::user()->hasRole(['School','Teacher']))
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-book-open"></i>
                    <div class="text-truncate" data-i18n="Academic">Academic</div>
                </a>
                <ul class="menu-sub">

                    @if(Auth::user()->hasRole('School'))
                        <li class="menu-item {{ setRoute('subjects.index') }}">
                            <a href="{{ route('subjects.index') }}" class="menu-link">
                                <div class="text-truncate" data-i18n="Subjects">Subjects</div>
                            </a>
                        </li>
                    @endif

                    @if(Auth::user()->hasRole('School'))
                        <li class="menu-item {{ setRoute('classes.index') }}">
                            <a href="{{ route('classes.index') }}" class="menu-link">
                                <div class="text-truncate" data-i18n="Classes">Classes</div>
                            </a>
                        </li>
                    @endif

                    {{-- Since is_attendance is boolean we can just set it is_boolean that's it --}}
                    @if(Auth::user()->hasRole('School') || (Auth::user()->hasRole('Teacher') && Auth::user()->teacher->is_attendance))
                        <li class="menu-item {{ setRoute('get.attendence') }}">
                            <a href="{{ route('get.attendence') }}" class="menu-link">
                                <div class="text-truncate" data-i18n="Mark Attendance">Mark Attendance</div>
                            </a>
                        </li>
                    @endif

                    @if(Auth::user()->hasRole('School'))
                        <li class="menu-item {{ setRoute('timetables.index') }}">
                            <a href="{{ route('timetables.index') }}" class="menu-link">
                                <div class="text-truncate" data-i18n="Timetables">Timetables</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Exam Tab --}}

        @if(Auth::user()->hasRole(['School','Teacher']))
            <li class="menu-item ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-trophy"></i>
                    <div class="text-truncate" data-i18n="Examination">Examination</div>
                </a>

                <ul class="menu-sub">

                    @if(Auth::user()->hasRole('School'))
                        <li class="menu-item {{ setRoute('exams.index') }}">
                            <a href="{{ route('exams.index') }}" class="menu-link">
                                <div class="text-truncate" data-i18n="Exams">Exams</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('grades.index') }}" class="menu-link">
                                <div class="text-truncate" data-i18n="Grades">Grades</div>
                            </a>
                        </li>
                    @endif

                    {{-- @if(Auth::user()->hasRole('School') || Auth::user()->hasRole('School') && Auth::user()->teacher->is_mark)
                        <li class="menu-item">
                            <a href="{{ route('subjects.index') }}" class="menu-link">
                                <div class="text-truncate" data-i18n="Marks">Marks</div>
                            </a>
                        </li>
                    @endif --}}
                </ul>
            </li>
        @endif

        {{-- Accounts Tab --}}

        @if(Auth::user()->hasRole('School'))
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-money-withdraw"></i>
                    <div class="text-truncate" data-i18n="Accounts">Accounts</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ setRoute('expenses.index') }}">
                        <a href="{{ route('expenses.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Expense Manager">Expense Manager</div>
                        </a>
                    </li>

                    <li class="menu-item {{ setRoute('fees.create') }}">
                        <a href="{{ route('fees.create') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Fee Manager">Fee Manager</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        {{-- Settings Tab --}}

        @if(Auth::user()->hasRole('Super Admin'))
            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-cog"></i>
                    <div class="text-truncate" data-i18n="Settings">Settings</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ setRoute('subscriptions.index') }}">
                        <a href="{{ route('subscriptions.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Payments">Payments</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-cog"></i>
                    <div class="text-truncate" data-i18n="Quiz Bank">Quiz Bank</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ setRoute('questions.index') }}">
                        <a href="{{ route('questions.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Questions">Questions</div>
                        </a>
                    </li>
                </ul>
                <ul class="menu-sub">
                    <li class="menu-item {{ setRoute('quizs.index') }}">
                        <a href="{{ route('quizs.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Quizes">Quizes</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        {{-- Reports / Notification Tab --}}

        @if(Auth::user()->hasRole('School'))
            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-bell"></i>
                    <div class="text-truncate" data-i18n="Reports">Reports</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item {{ setRoute('school.notifications') }}">
                        <a href="{{ route('school.notifications') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Notifications">Notifications</div>
                        </a>
                    </li>

                    <li class="menu-item {{ setRoute('get.teacher.attendence') }}">
                        <a href="{{ route('get.teacher.attendence') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Teacher Attendance">Teacher Attendance</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</aside>
