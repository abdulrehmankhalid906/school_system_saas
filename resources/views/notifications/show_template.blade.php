@extends('layouts.app')
@section('title', 'View Notification')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="header-title">Notification</h5>
                                <div class="row g-2">
                                    <div class="col-md-12">
                                        <label class="form-label" for="title">Title</label>
                                        <input type="text" class="form-control" value="{{ $notificationsTem->notificationTemplate->title ?? '' }}" readonly>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="message">Message</label>
                                        <textarea class="form-control" cols="30" rows="10" readonly>{{ $notificationsTem->notificationTemplate->message ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
