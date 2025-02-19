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
                                    <i class="mdi mdi-account-circle title_icon"></i> Students
                                </h4>
                                <a href="{{ route('students.create') }}" class="btn btn-outline-primary btn-rounded align-middle mt-1 float-end"><i class="mdi mdi-plus"></i>Register Student</a>
                                <button type="button" class="btn btn-outline-success btn-rounded align-middle mt-1 float-end me-2" data-bs-toggle="modal" data-bs-target="#StuentbulkUpload">
                                    <i class="mdi mdi-file-upload-outline"></i> Bulk Upload
                                </button>

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
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRec({{ $student->id }}, 'students')">Delete</a>
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

    <div class="modal fade" id="StuentbulkUpload" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="roleModalLabel">Upload Bulk Students</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('bulk.import.student') }}" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col-lg-6">
                            <label class="col-md-3 col-form-label" for="klass_id">Class <span class="text-danger">*</span></label>
                            <select id="klass_id" class="form-control select2" name="klass_id" required>
                                <option value="">Select Class</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6">
                            <label class="col-md-3 col-form-label" for="section_id">Section <span class="text-danger">*</span></label>
                            <select id="section_id" class="form-control select2" name="section_id" required>
                                <option value="">Select Section</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <label class="col-md-3 col-form-label" for="upload_file_std">Upload File <span class="text-danger">*</span></label>
                            <input type="file" name="bulk_upload_file" id="upload_file_std" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-primary" type="submit" value="Upload File">&nbsp;
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
          </div>
        </div>
    </div>
@endsection
