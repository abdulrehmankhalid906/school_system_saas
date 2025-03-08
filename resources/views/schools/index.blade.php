@extends('layouts.app')
@section('title', 'Dashboard | Manage Schools')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="page-title d-inline-block">
                                    <i class="mdi mdi-account-circle title_icon"></i> All Schools
                                </h4>

                                <table id="example" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Strength</th>
                                            <th>Reg. No / Date</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($schools as $school)
                                            <tr id="row-{{ $school->id }}">
                                                <td>{{ $school->id ?? '' }}</td>
                                                <td>{{ $school->name ?? '' }}</td>
                                                <td>{{ $school->email ?? '' }}</td>
                                                <td>{{ $school->students ?? 0 }} S + {{ $school->teachers ?? 0 }} T</td>
                                                <td>{{ $school->registration_number }} <br> {{ $school->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('schools.edit', $school->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRec({{ $school->id }}, 'schools', 'school_del')">Delete</a>
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
