@extends('layouts.app')
@section('title', 'Dashboard | Manage Students')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="page-title d-inline-block">
                                    <i class="mdi mdi-account-circle title_icon"></i> All Students
                                </h4>
                                <a href="{{ route('students.create') }}" class="btn btn-outline-primary btn-rounded align-middle mt-1 float-end">
                                    <i class="mdi mdi-plus"></i>Register Student</a>

                                <table id="example" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Roll No</th>
                                            <th>Name</th>
                                            <th>Class</th>
                                            <th>Gender</th>
                                            <th>Enrollment Date</th>
                                            <th>Monthly Fee</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr id="row-{{ $student->id }}">
                                                <td>{{ $student->roll_no ?? '' }}</td>
                                                <td>{{ $student->user->name ?? '' }}</td>
                                                <td>{{ $student->klass->name ?? '' }} ({{ $student->section->name ?? '' }})</td>
                                                <td>{{ $student->gender ?? '' }}</td>
                                                <td>{{ $student->enrollment_date ?? '' }}</td>
                                                <td>{{ $student->monthly_fee ?? '' }}</td>
                                                <td>
                                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRec({{ $student->id }}, 'schools')">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
