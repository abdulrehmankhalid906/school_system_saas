@extends('layouts.app')
@section('title', 'Dashboard | Edit Sections')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="page-title d-inline-block">
                                    <i class="mdi mdi-account-circle title_icon"></i> Mange Classes
                                </h4>
                                <button type="button" class="btn btn-outline-primary btn-rounded align-middle mt-1 float-end" data-bs-toggle="modal" data-bs-target="#classModal">
                                    <i class="mdi mdi-plus"></i> Create Class
                                </button>
                                {{-- <button type="button" class="btn btn-outline-success btn-rounded align-middle mt-1 float-end me-2" data-bs-toggle="modal" data-bs-target="#bulkUpload">
                                    <i class="mdi mdi-file-upload-outline"></i> Bulk Upload
                                </button> --}}

                                <table id="example" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
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
                                                <td>
                                                    @foreach ($class->sections as $section)
                                                        <span>{{ $section->name.','}}</span>
                                                    @endforeach
                                                </td>
                                                <td>{{ $class->created_at }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary btn-sm dropdown-toggle p-3" type="button" id="dropdownMenuButton{{ $class->id }}" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $class->id }}">
                                                            <li>
                                                                <button class="dropdown-item" onclick="editClass({{ $class->id }})">Edit</button>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('manage.sections', ['id' => $class->id]) }}" class="dropdown-item">Manage Sections</a>
                                                                {{-- <button class="dropdown-item" onclick="mangeSection({{ $class->id }})">Manage Sections</button> --}}
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
        </div>
    </div>
@endsection
