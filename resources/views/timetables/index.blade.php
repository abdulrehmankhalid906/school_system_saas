@extends('layouts.app')
@section('title', 'Dashboard | Manage Time Tables')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="page-title d-inline-block">
                                    <i class="mdi mdi-account-circle title_icon"></i> Time Tables
                                </h4>

                                <a href="{{ route('timetables.create') }}" class="btn btn-outline-primary btn-rounded align-middle mt-1 float-end">
                                    <i class="mdi mdi-plus"></i> Create Time Table
                                </a>

                                <table id="example" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Class</th>
                                            <th>Section</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($timeTables as $ttable)
                                            <tr id="row-{{ $ttable->id }}">
                                                <td>{{ $ttable->title ?? '' }}</td>
                                                <td>{{ $ttable->klass->name ?? '' }}</td>
                                                <td>{{ $ttable->section->name ?? '' }}</td>
                                                <td>
                                                    <a href="{{ route('timetables.edit', $ttable->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRec({{ $ttable->id }}, 'timetables')">Delete</a>
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
