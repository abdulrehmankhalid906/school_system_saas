@extends('layouts.app')
@section('title', 'Dashboard | Permissions')

@section('content')
    <div class="content" style="padding-top: 30px;">
        <div class="loadings hidden"></div>
        <div class="row ">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body py-2">
                        <h4 class="page-title d-inline-block">
                            <i class="mdi mdi-account-circle title_icon"></i> All Permissions
                        </h4>
                        <button type="button" class="btn btn-outline-primary btn-rounded align-middle mt-1 float-end" data-bs-toggle="modal" data-bs-target="#permissionModal" onclick="openModal()">
                            <i class="mdi mdi-plus"></i> Create Permission
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
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr id="row-{{ $permission->id }}">
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->created_at }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#roleModal"onclick="openModal({{ $permission->id }}, '{{ $permission->name }}')">
                                                Edit
                                            </button>  
                                            <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRec({{ $permission->id }},'permissions')">Delete</a>
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

    <div class="modal fade" id="permissionModal" tabindex="-1" aria-labelledby="permissionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="permissionModalLabel">Create Permission</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="permissionForm" method="POST" action="{{ route('permissions.store') }}" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="system_name">Permission Name</label>
                            <div class="col-md-9">
                                <input type="text" id="permissionName" name="name" class="form-control" required>
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
@endsection
