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
                                        <h4 class="header-title">Update School (<small><i>{{ $school->registration_number ?? '' }}</i></small>)</h4>
                                        <form method="POST" action="{{ route('school.manage') }}" autocomplete="off" enctype="multipart/form-data">
                                            @csrf

                                            <div class="d-flex align-items-start align-items-sm-center gap-6 pb-4 border-bottom">
                                                <img src="{{ asset('assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar">
                                                <div class="button-wrapper">
                                                    <label for="upload" class="btn btn-primary me-3 mb-4" tabindex="0">
                                                        <span class="d-none d-sm-block">Upload Logo</span>
                                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                                        <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                                                    </label>
                                                    <div>Allowed JPG, JPEG or PNG. Max size of 2MB</div>
                                                </div>
                                            </div>

                                            <div class="row g-6">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="system_name">School Name</label>
                                                    <input type="text" id="name" name="name" class="form-control" value="{{ $school->name ?? '' }}" required>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label" for="system_email">School Email</label>
                                                    <input type="email" id="email" name="email" class="form-control" value="{{ $school->email ?? '' }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label" for="phone">Phone</label>
                                                    <input type="text" id="phone" name="phone" class="form-control" value="{{ $school->phone ?? '' }}" required>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label" for="district">District</label>
                                                    <input type="text" id="district" name="district" class="form-control" value="{{ $school->district ?? '' }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label" for="city">City</label>
                                                    <input type="text" id="city" name="city" class="form-control" value="{{ $school->city ?? '' }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label" for="address">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address" value="{{ $school->address ?? '' }}" required>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label" for="purchase_code">Website</label>
                                                    <input type="text" id="purchase_code" name="website" class="form-control" value="{{ $school->website ?? '' }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label" for="established_year">Established Year</label>
                                                    <input type="text" class="form-control" value="{{ $school->established_year ?? '' }}" disabled>
                                                </div>

                                                <div class="text-end">
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
