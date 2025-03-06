@extends('layouts.app')
@section('title', 'Dashboard | Add Teacher')
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
                                    Create Teacher
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="navs-top-home" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                                        <form method="POST" action="{{ route('teachers.store') }}" enctype="multipart/form-data" autocomplete="off">
                                            @csrf

                                            <div class="d-flex align-items-start align-items-sm-center gap-6 pb-4">
                                                <img src="{{ InitS::getImage(false, 'logo') }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar">
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
                                                    <input type="text" id="name" name="name" class="form-control" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="email">Teacher Email <span class="text-danger">*</span></label>
                                                    <input type="email" id="email" name="email" class="form-control" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="password">Teacher Password <span class="text-danger">*</span></label>
                                                    <input type="password" id="password" name="password" class="form-control" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="phone">Teacher Phone <span class="text-danger">*</span></label>
                                                    <input type="text" id="phone" name="phone" class="form-control" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="address">Teacher Address</label>
                                                    <input type="text" class="form-control" id="address" name="address">
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="salary">Monthly Salary <span class="text-danger">*</span></label>
                                                    <input type="text" id="salary" name="salary" class="form-control" required>
                                                </div>

                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">Create</button>
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
        </div>
    </div>
@endsection
