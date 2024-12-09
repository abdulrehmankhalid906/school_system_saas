@extends('layouts.app')
@section('title', 'Manage School')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Update School (<small><i>{{ $school->registration_number ?? '' }}</i></small>)</h4>
                            <form method="POST" action="{{ route('school.manage') }}" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <div class="form-group row mb-3">
                                        <label class="col-md-4 col-form-label" for="system_name">School Name</label>
                                        <div class="col-md-8">
                                            <input type="text" id="name" name="name" class="form-control" value="{{ $school->name ?? '' }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-md-4 col-form-label" for="system_email">School Email</label>
                                        <div class="col-md-8">
                                            <input type="email" id="email" name="email" class="form-control" value="{{ $school->email ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-md-4 col-form-label" for="phone">Phone</label>
                                        <div class="col-md-8">
                                            <input type="text" id="phone" name="phone" class="form-control" value="{{ $school->phone ?? '' }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-md-4 col-form-label" for="district">District</label>
                                        <div class="col-md-8">
                                            <input type="text" id="district" name="district" class="form-control" value="{{ $school->district ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-md-4 col-form-label" for="city">City</label>
                                        <div class="col-md-8">
                                            <input type="text" id="city" name="city" class="form-control" value="{{ $school->city ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-md-4 col-form-label" for="address">Address</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="address" name="address" value="{{ $school->address ?? '' }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-md-4 col-form-label" for="purchase_code">Website</label>
                                        <div class="col-md-8">
                                            <input type="text" id="purchase_code" name="website" class="form-control" value="{{ $school->website ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-md-4 col-form-label" for="established_year">Established Year</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" value="{{ $school->established_year ?? '' }}" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-md-4 col-form-label" for="example-fileinput">School Logo</label>
                                        <div class="col-md-8 custom-file-upload">
                                            <div class="wrapper-image-preview">
                                                <div class="box" style="width: 250px;">
                                                    <div class="js--image-preview" style="background-image: url({{ $school && $school->logo ? asset('assets/uploads/school_logo/' . $school->logo) : asset('assets/uploads/profile/placeholder.jpg') }}); background-color: #F5F5F5;">
                                                    </div>
                                                    <div class="upload-options">
                                                        <label for="profile_image" class="btn"> <i class="mdi mdi-camera"></i> Upload an image </label>
                                                        <input id="school_logo" style="visibility:hidden;" type="file" class="image-upload" name="school_logo" accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-secondary col-6">Update Settings</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
