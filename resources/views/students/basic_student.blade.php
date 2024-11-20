@extends('layouts.app')
@section('title', 'Add Student')
@section('content')
<div class="content" style="padding-top: 30px;">
    <div class="loadings hidden"></div>
    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body py-2">
                    <h4 class="page-title"><i class="mdi mdi-account-multiple-plus title_icon"></i> Student admission form</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card pt-0">
                <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                    <li class="nav-item">
                        <a href="http://localhost/school__/superadmin/student/create" class="nav-link rounded-0 active">
                            <i class="mdi mdi-home-variant d-lg-none d-block me-1"></i>
                            <span class="d-none d-lg-block">Single student admission</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="http://localhost/school__/superadmin/student/create/bulk" class="nav-link rounded-0 ">
                            <i class="mdi mdi-account-circle d-lg-none d-block me-1"></i>
                            <span class="d-none d-lg-block">Bulk student admission</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="http://localhost/school__/superadmin/student/create/excel" class="nav-link rounded-0 ">
                            <i class="mdi mdi-settings-outline d-lg-none d-block me-1"></i>
                            <span class="d-none d-lg-block">Excel upload</span>
                        </a>
                    </li>
                </ul>
  
                <div class="tab-content">
                    <div class="tab-pane active">
                        <form method="POST" class="p-3 d-block ajaxForm" action="http://localhost/school__/superadmin/student/create_single_student" id = "student_admission_form" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="name">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="name" required>
                                    </div>
                                </div>
                        
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="email">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
                                    </div>
                                </div>
                        
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="password">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                                    </div>
                                </div>
                        
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="parent_id">Parent</label>
                                    <div class="col-md-9">
                                        <select id="parent_id" name="parent_id" class="form-control select2" data-toggle = "select2"  >
                                            <option value="">Select a parent</option>
                                                                                        <option value="1">Khalid Mehmood</option>
                                                            </select>
                                    </div>
                                </div>
                        
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="class_id">Class</label>
                                    <div class="col-md-9">
                                        <select name="class_id" id="class_id" class="form-control select2" data-toggle = "select2" required onchange="classWiseSection(this.value)">
                                            <option value="">Select a class</option>
                                                                                        <option value="1">Grade 1</option>
                                                            </select>
                                    </div>
                                </div>
                        
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="section_id">Section</label>
                                    <div class="col-md-9" id = "section_content">
                                        <select name="section_id" id="section_id" class="form-control select2" data-toggle = "select2" required >
                                            <option value="">Select section</option>
                                        </select>
                                    </div>
                                </div>
                        
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="birthdatepicker">Birthday</label>
                                    <div class="col-md-9 position-relative" id="datepicker4">
                                        <input type="text" class="form-control" data-provide="datepicker" data-date-autoclose="true" data-date-container="#datepicker4" name = "birthday"   value="11/18/2024" required>
                                    </div>
                                </div>
                        
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="gender">Gender</label>
                                    <div class="col-md-9">
                                        <select name="gender" id="gender" class="form-control select2" data-toggle = "select2"  required>
                                            <option value="">Select gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="example-textarea">Address</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" id="example-textarea" rows="5" name = "address" placeholder="address"></textarea>
                                    </div>
                                </div>
                        
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="phone">Phone</label>
                                    <div class="col-md-9">
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="phone" required>
                                    </div>
                                </div>
                        
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="example-fileinput">Student profile image</label>
                                    <div class="col-md-9 custom-file-upload">
                                        <div class="wrapper-image-preview" style="margin-left: -6px;">
                                            <div class="box" style="width: 250px;">
                                                <div class="js--image-preview" style="background-image: url(http://localhost/school__/uploads/users/placeholder.jpg); background-color: #F5F5F5;"></div>
                                                <div class="upload-options">
                                                    <label for="student_image" class="btn"> <i class="mdi mdi-camera"></i> Upload an image </label>
                                                    <input id="student_image" style="visibility:hidden;" type="file" class="image-upload" name="student_image" accept="image/*">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="text-center">
                                    <button type="submit" class="btn btn-secondary col-md-4 col-sm-12 mb-4" onclick="check()">Add student</button>
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
