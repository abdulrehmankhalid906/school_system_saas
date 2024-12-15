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
                                    School Setting
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="false" tabindex="-1">
                                    Class Fee Settings
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-messages" aria-controls="navs-top-messages" aria-selected="false" tabindex="-1">
                                    Totals
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="navs-top-home" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 mb-4">
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
                                                    <button type="submit" class="btn btn-secondary">Update Settings</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                                        <h4 class="header-title">Class Fee</h4>
                                        <form method="POST" action="{{ route('manage.school.fee') }}" autocomplete="off">
                                            @csrf
                                                @foreach ($school->classfee as $classfe)
                                                <input type="hidden" value="{{ $classfe->id }}" name="ids[]">
                                                    <div class="col-12">
                                                        <div class="form-group row mb-3">
                                                            <label class="col-md-4 col-form-label" for="system_name">{{ $classfe->klass->name ?? '' }}</label>
                                                            <div class="col-md-8">
                                                                <input type="number" id="fee" name="fees[]" class="form-control" value="{{ $classfe->class_fee ?? '' }}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-secondary">Update Settings</button>
                                                </div>
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
