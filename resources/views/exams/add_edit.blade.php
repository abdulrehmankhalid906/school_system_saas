@extends('layouts.app')
@section('title', 'Manage School')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">

            <div class="row">
                <div class="col-xl-12">
                    <div class="nav-align-top nav-tabs-shadow mb-6">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true">
                                    Mange Exam
                                </button>
                            </li>
                            {{-- <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="false" tabindex="-1">
                                    Student Extra Information
                                </button>
                            </li> --}}
                            {{-- <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-messages" aria-controls="navs-top-messages" aria-selected="false" tabindex="-1">
                                    Totals
                                </button>
                            </li> --}}
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="navs-top-home" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                                        {{-- <h4 class="header-title">Student Information</h4> --}}

                                        @if ($errors->any())
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                <strong>Error!</strong> {{ $errors->first() }}
                                            </div>
                                        @endif

                                        <form method="POST" action="{{ route('exams.store') }}" enctype="multipart/form-data" autocomplete="off">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" value="{{ $exam->id ?? ''}}">
                                            <div class="row g-3">
                                                <div class="col-md-12">
                                                    <label class="form-label" for="title">Exam Title</label>
                                                    <input type="text" id="title" name="title" class="form-control" value="{{ $exam->title ?? '' }}" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="start_date">Start Date</label>
                                                    <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $exam->start_date ?? '' }}" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="end_date">End Date</label>
                                                    <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $exam->end_date ?? '' }}" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="status">Status</label>
                                                    <div class="form-check form-switch mb-2">
                                                        <input class="form-check-input" type="checkbox" id="status" value="{{ $exam->is_active == true ? 'Checked' : '' }}">
                                                    </div>
                                                </div>

                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                                        <h4 class="header-title">Student Information</h4>
                                        {{-- <form method="POST" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data" autocomplete="off">
                                            @csrf
                                            @method('PUT')

                                            <div class="text-end mt-4">
                                                <button type="submit" class="btn btn-primary">Update Settings</button>
                                            </div>
                                        </form> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="navs-top-messages" role="tabpanel">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
