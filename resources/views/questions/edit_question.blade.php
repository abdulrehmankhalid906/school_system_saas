@extends('layouts.app')
@section('title', 'Create Time Table')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="header-title">Update Template</h5>
                                <form method="POST" action="{{ route('notifications.update', $notificationsTem->id) }}" autocomplete="off">
                                    @csrf
                                    @method('PUT')
                                    <div class="row g-2">
                                        <div class="col-md-12">
                                            <label class="form-label" for="title">Title</label>
                                            <input type="text" id="title" name="title" class="form-control" value="{{ $notificationsTem->title ?? '' }}" required>
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label" for="klass_id">Message</label>
                                            <textarea class="form-control" name="message" id="message" cols="30" rows="10" required>{{ $notificationsTem->message ?? '' }}</textarea>
                                        </div>

                                        <div class="text-start">
                                            <button type="submit" class="btn btn-primary me-3 mb-4">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
