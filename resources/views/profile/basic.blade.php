@extends('layouts.app')
@section('title', 'Manage Profile')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Update Profile</h4>
                                <form method="POST" action="{{ route('profile.manage') }}" enctype="multipart/form-data" autocomplete="off">
                                    @csrf

                                    <div class="d-flex align-items-start align-items-sm-center gap-6 pb-4">
                                        <img src="{{ InitS::getImage(Auth::user()->profile_image, 'profile') }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar">
                                        <div class="button-wrapper">
                                            <label for="upload" class="btn btn-primary me-3 mb-4" tabindex="0">
                                                <span class="d-none d-sm-block">Upload Image</span>
                                                <i class="bx bx-upload d-block d-sm-none"></i>
                                                <input type="file" id="upload" name="profile_img" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                                            </label>
                                            <div>Allowed JPG, JPEG or PNG. Max size of 2MB</div>
                                        </div>
                                    </div>

                                    <div class="row g-6">
                                        <div class="col-md-4">
                                            <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                                            <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name ?? '' }}" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                            <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email ?? '' }}" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label" for="phone"> Phone <span class="text-danger">*</span></label>
                                            <input type="text" id="phone" name="phone" class="form-control" value="{{ Auth::user()->phone ?? '' }}" required>
                                        </div>

                                        {{-- <div class="col-md-4">
                                            <label class="form-label" for="address"> Address</label>
                                            <input type="text" id="address" name="address" class="form-control" value="{{ Auth::user()->address ?? '' }}">
                                        </div> --}}

                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary me-3 mb-4">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Change Password</h4>
                                <form action="{{ route('update.password') }}" method="POST" class="col-12" autocomplete="off">
                                    @csrf
                                    @method('PUT')
                                    <div class="row g-6">
                                        <div class="col-md-4">
                                            <label class="form-label" for="new_password">New Password <span class="text-danger">*</span></label>
                                            <input type="password" id="new_password" name="new_password" class="form-control" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label" for="confirm_password">Confirm Password <span class="text-danger">*</span></label>
                                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                                        </div>

                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary me-3 mb-4">Change</button>
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
