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
                                <h4 class="header-title">Update profile</h4>
                                <form method="POST" action="{{ route('profile.manage') }}" enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    <div class="col-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="name"> Name</label>
                                            <div class="col-md-9">
                                                <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name ?? '' }}" required>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="email">Email</label>
                                            <div class="col-md-9">
                                                <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email ?? '' }}" required>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="phone"> Phone</label>
                                            <div class="col-md-9">
                                                <input type="text" id="phone" name="phone" class="form-control" value="{{ Auth::user()->phone ?? '' }}">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="address"> Address</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="address" name="address" rows="4">{{ Auth::user()->address ?? '' }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="example-fileinput">Profile image</label>
                                            <div class="col-md-9 custom-file-upload">
                                                <div class="wrapper-image-preview" style="margin-left: -6px;">
                                                    <div class="box" style="width: 250px;">
                                                        <div class="js--image-preview" style="background-image: url({{ Auth::user()->profile_image ? asset('assets/uploads/profile/' . Auth::user()->profile_image) : asset('assets/uploads/profile/placeholder.jpg') }}); background-color: #F5F5F5;">
                                                        </div>
                                                        <div class="upload-options">
                                                            <label for="profile_image" class="btn"> <i class="mdi mdi-camera"></i> Upload an image </label>
                                                            <input id="profile_image" style="visibility:hidden;" type="file" class="image-upload" name="profile_image" accept="image/*">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12">Update profile</button>
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
                                <h4 class="header-title">Change password</h4>
                                <form method="POST" class="col-12" action="">
                                    @csrf
                                    <div class="col-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="current_password">Current password</label>
                                            <div class="col-md-9">
                                                <input type="password" id="current_password" name="current_password" class="form-control" value="" required>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="new_password"> New password</label>
                                            <div class="col-md-9">
                                                <input type="password" id="new_password" name="new_password" class="form-control" value="" required>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="confirm_password"> Confirm password</label>
                                            <div class="col-md-9">
                                                <input type="password" id="confirm_password" name="confirm_password" class="form-control" value="" required>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12">Change password</button>
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
