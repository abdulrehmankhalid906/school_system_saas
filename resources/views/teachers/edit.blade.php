@extends('layouts.app')
@section('title', 'Dashboard | Edit Teacher')
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
                                    Teacher Information
                                </button>
                            </li>
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
                                        <h4 class="header-title">Teacher Profile (<small>{{ $teacher->join_date ?? '' }}</small>)</h4>

                                        <form method="POST" action="{{ route('teachers.update', $teacher->id) }}" enctype="multipart/form-data" autocomplete="off">
                                            @csrf
                                            @method('PATCH')

                                            <div class="d-flex align-items-start align-items-sm-center gap-6 pb-4">
                                                <img src="{{ InitS::getImage($teacher->user->profile_image, 'logo') }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar">
                                                <div class="button-wrapper">
                                                    <label for="upload" class="btn btn-primary me-3 mb-4" tabindex="0">
                                                        <span class="d-none d-sm-block">Upload Logo</span>
                                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                                        <input type="file" name="logo" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                                                    </label>
                                                    <div>Allowed JPG, JPEG or PNG. Max size of 2MB</div>
                                                </div>
                                            </div>

                                            <div class="row g-3">
                                                <div class="col-md-4">
                                                    <label class="form-label" for="name">Teacher Name <span class="text-danger">*</span></label>
                                                    <input type="text" id="name" name="name" class="form-control" value="{{ $teacher->user->name ?? '' }}" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="system_email">Teacher Email <span class="text-danger">*</span></label>
                                                    <input type="email" id="email" name="email" class="form-control" value="{{ $teacher->user->email ?? '' }}" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="phone">Student Phone <span class="text-danger">*</span></label>
                                                    <input type="text" id="phone" name="phone" class="form-control" value="{{ $teacher->user->phone ?? '' }}" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="address">Student Address</label>
                                                    <input type="text" class="form-control" id="address" name="address" value="{{ $teacher->user->address ?? '' }}">
                                                </div>


                                                <div class="col-md-4">
                                                    <label class="form-label" for="salary">Monthly Salary <span class="text-danger">*</span></label>
                                                    <input type="text" id="salary" name="salary" class="form-control" value="{{ $teacher->salary ?? '' }}">
                                                </div>

                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
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
                            </div> --}}
                            {{-- <div class="tab-pane fade" id="navs-top-messages" role="tabpanel">

                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
