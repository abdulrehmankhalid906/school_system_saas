@extends('layouts.app')
@section('title', 'Dashboard | Manage Schools')

@section('content')
    <div class="content" style="padding-top: 30px;">
        <div class="loadings hidden"></div>
        <div class="row ">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body py-2">
                        <h4 class="page-title d-inline-block">
                            <i class="mdi mdi-account-circle title_icon"></i> All Schools
                        </h4>
                        <button type="button" class="btn btn-outline-primary btn-rounded align-middle mt-1 float-end" data-bs-toggle="modal" data-bs-target="#roleModal" onclick="openModal()">
                            <i class="mdi mdi-plus"></i> Create School
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
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Strength</th>
                                    <th>Registeration No / Date</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schools as $school)
                                    <tr id="row-{{ $school->id }}">
                                        <td>{{ $school->id }}</td>
                                        <td>{{ $school->name }}</td>
                                        <td>{{ $school->email }}</td>
                                        <td>20 S + 2 T</td>
                                        <td>{{ $school->registration_number }} <br> {{ $school->created_at }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#roleModal"onclick="openModal({{ $school->id }}, '{{ $school->name }}')">
                                                Edit
                                            </button>  
                                            <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRec({{ $school->id }}, 'schools')">Delete</a>
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
                    <input class="btn btn-primary" type="submit" value="Save changes">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
          </div>
        </div>
    </div>
@endsection
