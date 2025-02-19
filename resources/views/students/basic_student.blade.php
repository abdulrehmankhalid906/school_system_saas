@extends('layouts.app')
@section('title', 'Add Student')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="page-title d-inline-block">
                                    <i class="mdi mdi-account-circle title_icon"></i> Student Admission Form
                                </h4>

                                <ul class="nav nav-tabs bg-nav-pills nav-justified mb-3" role="tablist">
                                    <li class="nav-item">
                                        {{-- <a class="nav-link rounded-0 active" href="{{ route('students.create') }}"> --}}
                                        <a class="nav-link rounded-0 active" role="tablist">
                                            <i class="mdi mdi-home-variant d-lg-none d-block me-1"></i>
                                            <span class="d-none d-lg-block">Student Admission</span>
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link rounded-0" href="{{ route('students.bulkcreate') }}">
                                            <i class="mdi mdi-account-circle d-lg-none d-block me-1"></i>
                                            <span class="d-none d-lg-block">Bulk Student Admission</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link rounded-0" data-bs-toggle="tab" href="#excel-upload" role="tab">
                                            <i class="mdi mdi-cogs d-lg-none d-block me-1"></i>
                                            <span class="d-none d-lg-block">Excel Upload</span>
                                        </a>
                                    </li> --}}
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="single-admission" role="tabpanel">
                                        <form method="POST" class="p-3 d-block" action="{{ route('students.store') }}" enctype="multipart/form-data" autocomplete="off">
                                            @csrf
                                            <div class="col-md-12">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label">Name <span class="text-danger">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Name" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label">Email <span class="text-danger">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Email" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label">Enter Password <span class="text-danger">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Enter Password" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label">Select Parent <span class="text-danger">*</span></label>
                                                    <div class="col-md-9">
                                                        <select id="parent_id" name="parent_id" class="form-control select2">
                                                            <option value="">Select One</option>
                                                            @foreach ($data['parents'] as $parent)
                                                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label">Select Class <span class="text-danger">*</span></label>
                                                    <div class="col-md-9">
                                                        <select name="klass_id" id="klass_id" class="form-control select2" required>
                                                            <option value="">Select One</option>
                                                            @foreach ($data['classes'] as $class)
                                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label">Select Section <span class="text-danger">*</span></label>
                                                    <div class="col-md-9">
                                                        <select name="section_id" id="section_id" class="form-control select2" required>
                                                            <option value="">Select One</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label">Select Birthday <span class="text-danger">*</span></label>
                                                    <div class="col-md-9 position-relative">
                                                        <input type="date" class="form-control" name="date_of_birth" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label">Select Gender <span class="text-danger">*</span></label>
                                                    <div class="col-md-9">
                                                        <select name="gender" id="gender" value="{{ old('gender') }}" class="form-control select2" required>
                                                            <option value="">Select One</option>
                                                            @foreach (InitS::getGenders() as $gender)
                                                                <option value="{{ $gender }}">{{ $gender }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label">Monthly Fee <span class="text-danger">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="monthly_fee" value="{{ old('monthly_fee') }}" placeholder="2500" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label">Enter Address <span class="text-danger">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Enter Address" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label">Enter Phone <span class="text-danger">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="number" id="phone" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Enter Phone" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label">Upload Image</label>
                                                    <div class="col-md-9">
                                                        <input type="file" id="student_image" name="student_image" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary col-md-4 col-sm-12 mb-4">Add student</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    {{-- <div class="tab-pane fade" id="excel-upload" role="tabpanel">
                                        <div class="p-3">
                                            <p>Excel upload functionality will be added here.</p>
                                            <a href="http://localhost/school__/superadmin/student/create/excel" class="btn btn-primary">Go to Excel Upload</a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
