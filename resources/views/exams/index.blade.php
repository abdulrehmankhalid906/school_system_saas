@extends('layouts.app')
@section('title', 'Dashboard | Manage Exams')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="page-title d-inline-block">
                                    <i class="mdi mdi-account-circle title_icon"></i> Exams
                                </h4>
                                <a href="{{ route('manage.exam') }}" class="btn btn-outline-primary btn-rounded align-middle mt-1 float-end">
                                    <i class="mdi mdi-plus"></i>Create Exam</a>

                                <table id="example" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($exams as $exam)
                                            <tr id="row-{{ $exam->id }}">
                                                <td>{{ $exam->title ?? '' }}</td>
                                                <td>{{ $exam->start_date ?? '' }}</td>
                                                <td>{{ $exam->end_date ?? '' }}</td>
                                                <td>{{ $exam->is_active ?? '' }}</td>
                                                <td>
                                                    <a href="{{ route('manage.exam', $exam->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRec({{ $exam->id }}, 'exams')">Delete</a>
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
