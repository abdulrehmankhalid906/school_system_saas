@extends('layouts.app')
@section('title', 'Dashboard | Manage Classes')

@section('content')
    <div class="content" style="padding-top: 30px;">
        <div class="loadings hidden"></div>
        <div class="row ">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body py-2">
                        <h4 class="page-title d-inline-block">
                            <i class="mdi mdi-account-circle title_icon"></i> All Classes
                        </h4>
                        <button type="button" class="btn btn-outline-primary btn-rounded align-middle mt-1 float-end" data-bs-toggle="modal" data-bs-target="#classModal">
                            <i class="mdi mdi-plus"></i> Create Class
                        </button>
                        <button type="button" class="btn btn-outline-success btn-rounded align-middle mt-1 float-end me-2" data-bs-toggle="modal" data-bs-target="#bulkUpload">
                            <i class="mdi mdi-file-upload-outline"></i> Bulk Upload
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr style="background-color: #313a46; color: #ababab;">
                                    <th>Class Name</th>
                                    <th>Sections</th>
                                    <th>Created At</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classes as $class)
                                    <tr id="row-{{ $class->id }}">
                                        <td>{{ $class->name }}</td>
                                        <td>{{ $class->name }}</td>
                                        <td>{{ $class->created_at }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $class->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{-- &#x22EE; <!-- Three vertical dots --> --}}
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $class->id }}">
                                                    <li>
                                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#classModal">
                                                            Edit
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#classModal">
                                                            Edit Again
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item text-danger" onclick="deleteRec({{ $class->id }}, 'classes')">
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
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

    <div class="modal fade" id="classModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="roleModalLabel">Create Role</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="roleForm" method="POST" action="{{ route('classes.store') }}" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label">Class Name</label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label">Subject Code</label>
                            <div class="col-md-9">
                                <input type="text" name="course_code" class="form-control">
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <input class="btn btn-primary" type="submit" value="Save changes">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
          </div>
        </div>
    </div>

    <div class="modal fade" id="bulkUpload" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="roleModalLabel">Bulk Upload</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('imports.subjects') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="system_name">Upload File</label>
                            <div class="col-md-9">
                                <input type="file" name="bulk_upload_file" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-primary" type="submit" value="Upload File">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
          </div>
        </div>
    </div>
@endsection
