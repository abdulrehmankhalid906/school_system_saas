@extends('layouts.app')
@section('content')
    <div class="content" style="padding-top: 30px;">
        <div class="loadings hidden"></div>
        <div class="row ">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body py-2">
                        <h4 class="page-title"> <i class="mdi mdi-view-dashboard title_icon"></i> Dashboard </h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card widget-flat" id="student" style="on">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="mdi mdi-account-multiple widget-icon"></i>
                                        </div>
                                        <h5 class="text-muted font-weight-normal mt-0" title="Number of Student"> <i class="mdi mdi-account-group title_icon"></i> Students <a href="http://localhost/school__/superadmin/student" style="color: #6c757d; display: none;" id = "student_list"><i class = "mdi mdi-export"></i></a></h5>
                                        <h3 class="mt-3 mb-3"> 2 </h3>
                                        <p class="mb-0 text-muted">
                                            <span class="text-nowrap">Total number of student</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card widget-flat" id="teacher" style="on">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="mdi mdi-account-multiple widget-icon"></i>
                                        </div>
                                        <h5 class="text-muted font-weight-normal mt-0" title="Number of Teacher"> <i class="mdi mdi-account-group title_icon"></i>Teacher <a href="http://localhost/school__/superadmin/teacher" style="color: #6c757d; display: none;" id = "teacher_list"><i class = "mdi mdi-export"></i></a></h5>
                                        <h3 class="mt-3 mb-3">0 </h3>
                                        <p class="mb-0 text-muted">
                                            <span class="text-nowrap">Total number of teacher</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card widget-flat" id = "parent">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="mdi mdi-account-multiple widget-icon"></i>
                                        </div>
                                        <h5 class="text-muted font-weight-normal mt-0" title="Number of Parents"> <i class="mdi mdi-account-group title_icon"></i> Parents <a href="http://localhost/school__/superadmin/parent" style="color: #6c757d; display: none;" id = "parent_list"><i class = "mdi mdi-export"></i></a></h5>
                                        <h3 class="mt-3 mb-3"> 0 </h3>
                                        <p class="mb-0 text-muted">
                                            <span class="text-nowrap">Total number of parent</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card widget-flat">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="mdi mdi-account-multiple widget-icon"></i>
                                        </div>
                                        <h5 class="text-muted font-weight-normal mt-0" title="Number of Staff"> <i class="mdi mdi-account-group title_icon"></i> Staff</h5>
                                        <h3 class="mt-3 mb-3"> 0 </h3>
                                        <p class="mb-0 text-muted">
                                            <span class="text-nowrap">Total number of staff</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card bg-primary">
                            <div class="card-body">
                                <h4 class="header-title text-white mb-2">Todays attendance</h4>
                                <div class="text-center">
                                    <h3 class="font-weight-normal text-white mb-2">2 </h3>
                                    <p class="text-light text-uppercase font-13 font-weight-bold">2 Students are attending today</p>
                                    <a href="http://localhost/school__/superadmin/attendance" class="btn btn-outline-light btn-sm mb-1">Go to attendance <i class="mdi mdi-arrow-right ms-1"></i>
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Recent events<a href="http://localhost/school__/superadmin/event_calendar" style="color: #6c757d;"><i class = "mdi mdi-export"></i></a></h4>
                                <div style="overflow-y: auto;" style="max-height: 171px;">
                                    <div class="timeline-alt pb-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Accounts of November <a href="http://localhost/school__/superadmin/invoice" style="color: #6c757d"><i class = "mdi mdi-export"></i></a></h4>
                                <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Student</th>
                                            <th>Class</th>
                                            <th>Invoice title</th>
                                            <th>Total amount</th>
                                            <th>Paid amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3"> Expense of November <a href="http://localhost/school__/superadmin/expense" style="color: #6c757d"><i class = "mdi mdi-export"></i></a></h4>
                                <div class="table-responsive-sm">
                                    <table class="table table-striped table-centered table-bordered mb-0 table-responsive">
                                        <thead>
                                            <tr>
                                                <th width = "60%">Expense</th>
                                                <th width = "40%">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <td colspan="2">No data found</td>
                                        </tbody>
                                    </table>
                                </div>
                                <style>
                                    .table-responsive {
                                        display: inline-table;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
