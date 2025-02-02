@extends('layouts.app')
@section('title', 'Dashboard | Roles')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="page-title d-inline-block">
                                    <i class="mdi mdi-account-circle title_icon"></i> All Roles
                                </h4>
                                <button type="button" class="btn btn-outline-primary btn-rounded align-middle mt-1 float-end" data-bs-toggle="modal" data-bs-target="#roleModal" onclick="openModal()">
                                    <i class="mdi mdi-plus"></i> Create Role
                                </button>

                                <table id="example" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Total Permissions</th>
                                            <th>Created At</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr id="row-{{ $role->id }}">
                                                <td>{{ $role->name }}</td>
                                                <td>{{ $role->permissions_count ?? 0 }}</td>
                                                {{-- <td>{{ $role->permissions->implode('name', ', ') }}</td> --}}
                                                <td>{{ $role->created_at }}</td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#roleModal"onclick="openModal({{ $role->id }}, '{{ $role->name }}')">Edit</button>
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRec({{ $role->id }}, 'roles')">Delete</a>
                                                    <a href="{{ route('role.assign.permission', $role->id) }}" title="Assign Permission" class="btn btn-info btn-sm">Assign Permissions</a>
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

    <div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="roleModalLabel">Create Role</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="roleForm" method="POST" action="{{ route('roles.store') }}" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="system_name">Role Name</label>
                            <div class="col-md-9">
                                <input type="text" id="roleName" name="name" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-primary" type="submit" value="Save changes">&nbsp;
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
          </div>
        </div>
    </div>
@endsection
