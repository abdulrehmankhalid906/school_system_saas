@extends('layouts.app')
@section('title', 'Manage School')
@section('content')
<div class="content" style="padding-top: 30px;">
    <div class="loadings hidden"></div>
    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body py-2">
                    <h4 class="page-title"> <i class="mdi mdi-school me-1 title_icon"></i>Manage School</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div id="profile_content" class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <!-- Left Column: School Details -->
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
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

                <!-- Right Column: Class Prices -->
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Class Prices</h4>
                            <form method="POST" action="">
                                @csrf
                                <div class="form-group row mb-3">
                                    <label class="col-md-4 col-form-label" for="class1_price">Class 1</label>
                                    <div class="col-md-8">
                                        <input type="text" id="class1_price" name="class1_price" class="form-control" value="{{ $classPrices->class1 ?? '' }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-md-4 col-form-label" for="class2_price">Class 2</label>
                                    <div class="col-md-8">
                                        <input type="text" id="class2_price" name="class2_price" class="form-control" value="{{ $classPrices->class2 ?? '' }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-md-4 col-form-label" for="class3_price">Class 3</label>
                                    <div class="col-md-8">
                                        <input type="text" id="class3_price" name="class3_price" class="form-control" value="{{ $classPrices->class3 ?? '' }}">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary col-6">Update Prices</button>
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
