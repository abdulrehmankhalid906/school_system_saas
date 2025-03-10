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
                                    Student Information
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
                                        <h4 class="header-title">Student Information (<small>{{ $student->roll_no ?? '' }}</small>)</h4>

                                        @if ($errors->any())
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                <strong>Error!</strong> {{ $errors->first() }}
                                            </div>
                                        @endif

                                        <form method="POST" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data" autocomplete="off">
                                            @csrf
                                            @method('PUT')

                                            <div class="d-flex align-items-start align-items-sm-center gap-6 pb-4">
                                                <img src="{{ InitS::getImage($student->user->profile_image, 'profile') }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar">
                                                <div class="button-wrapper">
                                                    <label for="upload" class="btn btn-primary me-3 mb-4" tabindex="0">
                                                        <span class="d-none d-sm-block">Upload Image</span>
                                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                                        <input type="file" name="profile_image" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                                                    </label>
                                                    <div>Allowed JPG, JPEG or PNG. Max size of 2MB</div>
                                                </div>
                                            </div>

                                            <div class="row g-3">
                                                <div class="col-md-4">
                                                    <label class="form-label" for="system_name">Student Name <span class="text-danger">*</span></label>
                                                    <input type="text" id="name" name="name" class="form-control" value="{{ $student->user->name ?? '' }}" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="email">Student Email <span class="text-danger">*</span></label>
                                                    <input type="email" id="email" name="email" class="form-control" value="{{ $student->user->email ?? '' }}" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="phone">Student Phone <span class="text-danger">*</span></label>
                                                    <input type="text" id="phone" name="phone" class="form-control" value="{{ $student->user->phone ?? '' }}">
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="address">Student Address</label>
                                                    <input type="text" class="form-control" id="address" name="address" value="{{ $student->user->address ?? '' }}" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="klass_id">Class <span class="text-danger">*</span></label>
                                                    <select class="form-control" id="klass_id" name="klass_id" required>
                                                        <option value="">Select One</option>
                                                        @foreach($classes as $class)
                                                            <option value="{{ $class->id }}" {{ $student->klass_id == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="section_id">Section <span class="text-danger">*</span></label>
                                                    <select class="form-control" id="section_id" name="section_id" required>
                                                        <option value="">Select One</option>
                                                        @foreach($sections as $section)
                                                            <option value="{{ $section->id }}" {{ $student->section_id == $section->id ? 'selected' : '' }}>{{ $section->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="monthly_fee">Monthly Fee <span class="text-danger">*</span></label>
                                                    <input type="number" id="monthly_fee" name="monthly_fee" class="form-control" value="{{ $student->monthly_fee ?? '' }}" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="date_of_birth">Date of Birth <span class="text-danger">*</span></label>
                                                    <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" value="{{ $student->date_of_birth ?? '' }}" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="enrollment_date">Enrollment Date</label>
                                                    <input type="date" class="form-control" value="{{ $student->enrollment_date ?? '' }}" disabled>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="session">Session</label>
                                                    <input type="text" class="form-control" disabled value="{{ $student->session ?? '' }}">
                                                </div>

                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">Update Settings</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                                        <h4 class="header-title">Student Information: (<i>{{ $student->user->name ?? '' }}</i>)</h4>
                                        <form method="POST" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data" autocomplete="off">
                                            @csrf
                                            @method('PUT')

                                            <div class="text-end mt-4">
                                                <button type="submit" class="btn btn-primary">Update Settings</button>
                                            </div>
                                        </form>
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
