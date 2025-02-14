@extends('layouts.app')
@section('title', 'Dashboard | Teacher Attendance')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="page-title d-inline-block">
                                    <i class="mdi mdi-account-circle title_icon"></i> Teacher Attendance
                                </h4>

                                <div class="row">
                                    <form class="p-3 d-block" autocomplete="off">
                                        <div class="row">
                                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-3 mb-lg-0">
                                                <select id="klass_id" class="form-control select2" required>
                                                    <option value="">Select Teacher</option>
                                                    @foreach ($teachers as $teacher)
                                                        <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-3 mb-lg-0">
                                                <input type="date" class="form-control" id="attendence_date" required>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-3 mb-lg-0">
                                                <button type="button" class="btn btn-primary btn-sm">Filter</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <table id="example" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Check In</th>
                                            <th>Check Out</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        @foreach ($attendances as $attendance)
                                            <tr id="row-{{ $attendance->id }}">
                                                <td>{{ $attendance->date }} {!! $attendance->date === InitS::currentDate() ? "<span class='badge bg-success'>Today</span>" : '' !!} </td>
                                                <td>{{ $attendance->check_in }}</td>
                                                <td>{{ $attendance->check_out }}</td>
                                                <td>{{ $attendance->remarks }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody> --}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
