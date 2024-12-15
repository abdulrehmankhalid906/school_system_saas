@extends('layouts.app')
@section('title', 'Dashboard | Manage Users')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="page-title d-inline-block">
                                    <i class="mdi mdi-account-circle title_icon"></i> All Users
                                </h4>
                                <button type="button" class="btn btn-outline-primary btn-rounded align-middle mt-1 float-end" data-bs-toggle="modal" data-bs-target="#roleModal" onclick="openModal()">
                                    <i class="mdi mdi-plus"></i> Create User
                                </button>
                                <table id="example" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Email</th>
                                            <th>School</th>
                                            <th>Registeration Date</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr id="row-{{ $user->id }}">
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->roles->implode('name', ', ') }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->school->name }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRec({{ $user->id }}, 'schools')">Delete</a>
                                                    {{-- <a href="{{ route('assign.user.role') }}" class="btn btn-primary"></a> --}}
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
