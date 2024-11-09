@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img src="assets/images/profile-bg.jpg" class="profile-wid-img" alt="">
            <div class="overlay-content">
                <div class="text-end p-3">
                    <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                        <input id="profile-foreground-img-file-input" type="file" class="profile-foreground-img-file-input">
                        <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                            <i class="ri-image-edit-line align-bottom me-1"></i>Change Cover
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-3">
            <div class="card mt-n5">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="profile-user position-relative d-inline-block mx-auto mb-4">
                            <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                    <span class="avatar-title rounded-circle bg-light text-body">
                                        <i class="ri-camera-fill"></i>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <h5 class="fs-16 mb-1">
                            {{ Auth::user()->name }}
                        </h5>
                        <p class="text-muted mb-0">
                            Lead Designer / Developer
                        </p>
                    </div>
                </div>
            </div>
            <!--end card-->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Basic Details</h5>
                        </div>
                    </div>
                    <form action="" method="">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="email" class="form-control" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary btn-sm" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#setSchool" role="tab" aria-selected="true">
                                <i class="fas fa-home"></i>Configure School
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#basicDetails" role="tab" aria-selected="false">
                                <i class="far fa-envelope"></i>Privacy Policy
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab" aria-selected="false">
                                <i class="far fa-user"></i>Change Password
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="setSchool" role="tabpanel">
                            <form action="javascript:void(0);">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="firstnameInput" class="form-label">School Name</label>
                                            <input type="text" class="form-control" placeholder="Enter your firstname" value="{{ $user && $user->school ? $user->school->name : '' }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <label for="lastnameInput" class="form-label">Address</label>
                                            <input type="text" class="form-control" placeholder="Enter your lastname" value="{{ $user && $user->school ? $user->school->address : '' }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">District</label>
                                            <input type="text" class="form-control" placeholder="Enter your phone number" value="{{ $user && $user->school ? $user->school->district : '' }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">City</label>
                                            <input type="email" class="form-control" placeholder="Enter your email" value="{{ $user && $user->school ? $user->school->city : '' }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="JoiningdatInput" class="form-label">Postal Code</label>
                                            <input type="text" class="form-control" placeholder="Enter your email" value="{{ $user && $user->school ? $user->school->postal_code : '' }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="designationInput" class="form-label">Phone</label>
                                            <input type="text" class="form-control" placeholder="Designation" value="{{ $user && $user->school ? $user->school->phone : '' }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="websiteInput1" class="form-label">Email</label>
                                            <input type="text" class="form-control" placeholder="www.example.com" value="{{ $user && $user->school ? $user->school->email : '' }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="cityInput" class="form-label">Website</label>
                                            <input type="text" class="form-control"bplaceholder="City" value="{{ $user && $user->school ? $user->school->website : '' }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="countryInput" class="form-label">Registration Number</label>
                                            <input type="text" class="form-control"  placeholder="Country" value="{{ $user && $user->school ? $user->school->registration_number : '' }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="zipcodeInput" class="form-label">Established Year</label>
                                            <input type="text" class="form-control"  placeholder="Enter zipcode" value="{{ $user && $user->school ? $user->school->established_year : '' }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <button type="button" class="btn btn-soft-success">Cancel</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                        
                        <div class="tab-pane" id="basicDetails" role="tabpanel">
                            <form>
                                <div id="newlink">
                                    <div id="1">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="jobTitle" class="form-label">Job
                                                        Title</label>
                                                    <input type="text" class="form-control" id="jobTitle" placeholder="Job title" value="Lead Designer / Developer">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="companyName" class="form-label">Company
                                                        Name</label>
                                                    <input type="text" class="form-control" id="companyName" placeholder="Company name" value="Themesbrand">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="experienceYear" class="form-label">Experience
                                                        Years</label>
                                                    <div class="row">
                                                        <div class="col-lg-5">
                                                            <select class="form-control" data-choices="" data-choices-search-false="" name="experienceYear" id="experienceYear">
                                                                <option value="">
                                                                    Select
                                                                    years
                                                                </option>
                                                                <option value="Choice 1">
                                                                    2001
                                                                </option>
                                                                <option value="Choice 2">
                                                                    2002
                                                                </option>
                                                                <option value="Choice 3">
                                                                    2003
                                                                </option>
                                                                <option value="Choice 4">
                                                                    2004
                                                                </option>
                                                                <option value="Choice 5">
                                                                    2005
                                                                </option>
                                                                <option value="Choice 6">
                                                                    2006
                                                                </option>
                                                                <option value="Choice 7">
                                                                    2007
                                                                </option>
                                                                <option value="Choice 8">
                                                                    2008
                                                                </option>
                                                                <option value="Choice 9">
                                                                    2009
                                                                </option>
                                                                <option value="Choice 10">
                                                                    2010
                                                                </option>
                                                                <option value="Choice 11">
                                                                    2011
                                                                </option>
                                                                <option value="Choice 12">
                                                                    2012
                                                                </option>
                                                                <option value="Choice 13">
                                                                    2013
                                                                </option>
                                                                <option value="Choice 14">
                                                                    2014
                                                                </option>
                                                                <option value="Choice 15">
                                                                    2015
                                                                </option>
                                                                <option value="Choice 16">
                                                                    2016
                                                                </option>
                                                                <option value="Choice 17" selected="">
                                                                    2017
                                                                </option>
                                                                <option value="Choice 18">
                                                                    2018
                                                                </option>
                                                                <option value="Choice 19">
                                                                    2019
                                                                </option>
                                                                <option value="Choice 20">
                                                                    2020
                                                                </option>
                                                                <option value="Choice 21">
                                                                    2021
                                                                </option>
                                                                <option value="Choice 22">
                                                                    2022
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-auto align-self-center">
                                                            to
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-lg-5">
                                                            <select class="form-control" data-choices="" data-choices-search-false="" name="choices-single-default2">
                                                                <option value="">
                                                                    Select
                                                                    years
                                                                </option>
                                                                <option value="Choice 1">
                                                                    2001
                                                                </option>
                                                                <option value="Choice 2">
                                                                    2002
                                                                </option>
                                                                <option value="Choice 3">
                                                                    2003
                                                                </option>
                                                                <option value="Choice 4">
                                                                    2004
                                                                </option>
                                                                <option value="Choice 5">
                                                                    2005
                                                                </option>
                                                                <option value="Choice 6">
                                                                    2006
                                                                </option>
                                                                <option value="Choice 7">
                                                                    2007
                                                                </option>
                                                                <option value="Choice 8">
                                                                    2008
                                                                </option>
                                                                <option value="Choice 9">
                                                                    2009
                                                                </option>
                                                                <option value="Choice 10">
                                                                    2010
                                                                </option>
                                                                <option value="Choice 11">
                                                                    2011
                                                                </option>
                                                                <option value="Choice 12">
                                                                    2012
                                                                </option>
                                                                <option value="Choice 13">
                                                                    2013
                                                                </option>
                                                                <option value="Choice 14">
                                                                    2014
                                                                </option>
                                                                <option value="Choice 15">
                                                                    2015
                                                                </option>
                                                                <option value="Choice 16">
                                                                    2016
                                                                </option>
                                                                <option value="Choice 17">
                                                                    2017
                                                                </option>
                                                                <option value="Choice 18">
                                                                    2018
                                                                </option>
                                                                <option value="Choice 19">
                                                                    2019
                                                                </option>
                                                                <option value="Choice 20" selected="">
                                                                    2020
                                                                </option>
                                                                <option value="Choice 21">
                                                                    2021
                                                                </option>
                                                                <option value="Choice 22">
                                                                    2022
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="jobDescription" class="form-label">Job
                                                        Description</label>
                                                    <textarea class="form-control" id="jobDescription" rows="3" placeholder="Enter description">You always want to make sure that your fonts work well together and try to limit the number of fonts you use to three or less. Experiment and play around with the fonts that you already have in the software you're working with reputable font websites. </textarea>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="hstack gap-2 justify-content-end">
                                                <a class="btn btn-success" href="javascript:deleteEl(1)">Delete</a>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </div>
                                </div>
                                <div id="newForm" style="display: none"></div>
                                <div class="col-lg-12">
                                    <div class="hstack gap-2">
                                        <button type="submit" class="btn btn-success">
                                            Update
                                        </button>
                                        <a href="javascript:new_link()" class="btn btn-primary">Add New</a>
                                    </div>
                                </div>
                                <!--end col-->
                            </form>
                        </div>
                        
                        <div class="tab-pane" id="changePassword" role="tabpanel">
                            <form action="javascript:void(0);">
                                <div class="row g-2">
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="oldpasswordInput" class="form-label">Old
                                                Password*</label>
                                            <input type="password" class="form-control" id="oldpasswordInput" placeholder="Enter current password">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="newpasswordInput" class="form-label">New
                                                Password*</label>
                                            <input type="password" class="form-control" id="newpasswordInput" placeholder="Enter new password">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="confirmpasswordInput" class="form-label">Confirm
                                                Password*</label>
                                            <input type="password" class="form-control" id="confirmpasswordInput" placeholder="Confirm password">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <a href="javascript:void(0);" class="link-primary text-decoration-underline">Forgot
                                                Password
                                                ?</a>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success">
                                                Change
                                                Password
                                            </button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                            <div class="mt-4 mb-3 border-bottom pb-2">
                                <div class="float-end">
                                    <a href="javascript:void(0);" class="link-primary">All Logout</a>
                                </div>
                                <h5 class="card-title">
                                    Login History
                                </h5>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 avatar-sm">
                                    <div class="avatar-title bg-light text-primary rounded-3 fs-18">
                                        <i class="ri-smartphone-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6>iPhone 12 Pro</h6>
                                    <p class="text-muted mb-0">
                                        Los Angeles, United
                                        States - March 16 at
                                        2:47PM
                                    </p>
                                </div>
                                <div>
                                    <a href="javascript:void(0);">Logout</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 avatar-sm">
                                    <div class="avatar-title bg-light text-primary rounded-3 fs-18">
                                        <i class="ri-tablet-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6>Apple iPad Pro</h6>
                                    <p class="text-muted mb-0">
                                        Washington, United
                                        States - November 06
                                        at 10:43AM
                                    </p>
                                </div>
                                <div>
                                    <a href="javascript:void(0);">Logout</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 avatar-sm">
                                    <div class="avatar-title bg-light text-primary rounded-3 fs-18">
                                        <i class="ri-smartphone-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6>
                                        Galaxy S21 Ultra 5G
                                    </h6>
                                    <p class="text-muted mb-0">
                                        Conneticut, United
                                        States - June 12 at
                                        3:24PM
                                    </p>
                                </div>
                                <div>
                                    <a href="javascript:void(0);">Logout</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 avatar-sm">
                                    <div class="avatar-title bg-light text-primary rounded-3 fs-18">
                                        <i class="ri-macbook-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6>
                                        Dell Inspiron 14
                                    </h6>
                                    <p class="text-muted mb-0">
                                        Phoenix, United
                                        States - July 26 at
                                        8:10AM
                                    </p>
                                </div>
                                <div>
                                    <a href="javascript:void(0);">Logout</a>
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