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
                                    <i class="mdi mdi-account-circle title_icon"></i> All Templates
                                </h4>

                                <a href="{{ route('notifications.create') }}" class="btn btn-outline-primary btn-rounded align-middle mt-1 float-end">
                                    <i class="mdi mdi-plus"></i> Create Template
                                </a>

                                <table id="example1" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Message</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($notifications as $notification)
                                            <tr id="row-{{ $notification->id }}">
                                                <td>{{ $notification->id ?? '' }}</td>
                                                <td>{{ $notification->title ?? '' }}</td>
                                                <td>{{ $notification->message ? Str::limit($notification->message,30) : ' '}}</td>
                                                <td>
                                                    <a href="{{ route('notifications.edit', $notification->id) }}" class="btn btn-primary btn-sm">
                                                        Edit
                                                    </a>
                                                    <a href="{{ route('notifications.edit', $notification->id) }}" class="btn btn-secondary btn-sm">
                                                        Send
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRec({{ $notification->id }}, 'notifications')">Delete</a>
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
