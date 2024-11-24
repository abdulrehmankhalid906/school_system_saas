@extends('layouts.app')
@section('title', 'Dashboard | Manage Subjects')

@section('content')
    <div class="content" style="padding-top: 30px;">
        <div class="loadings hidden"></div>
        <div class="row ">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body py-2">
                        <h4 class="page-title d-inline-block">
                            <i class="mdi mdi-account-circle title_icon"></i> All Parents
                        </h4>
                        <button type="button" class="btn btn-outline-primary btn-rounded align-middle mt-1 float-end" data-bs-toggle="modal" data-bs-target="#parentModal">
                            <i class="mdi mdi-plus"></i> Create Parent
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
                                    <th>Parent Name</th>
                                    <th>No of Dependents</th>
                                    <th>Created At</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($parents as $parent)
                                    <tr id="row-{{ $parent->id }}">
                                        <td>{{ $parent->name }}</td>
                                        <td>
                                            <li>Ali</li>
                                            <li>Muhammad Ali</li>
                                            <li>Mustafa</li>
                                        </td>
                                        <td>{{ $parent->created_at }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#parentModal">
                                                Edit
                                            </button>
                                            <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRec({{ $parent->id }}, 'subjects')"><i class="mdi mdi-trash-can"></i></a>
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

    <div class="modal fade" id="parentModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="roleModalLabel">Create Parent</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="roleForm" method="POST" action="{{ route('store.parents') }}" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="system_name">Parent Name</label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="system_name">Email</label>
                            <div class="col-md-9">
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="system_name">Password</label>
                            <div class="col-md-9">
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>
                    </div>
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