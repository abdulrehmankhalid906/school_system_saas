@extends('layouts.app')
@section('title', 'Add Student')
@section('content')
<div class="content" style="padding-top: 30px;">
    <div class="loadings hidden"></div>
    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body py-2">
                    <h4 class="page-title"><i class="mdi mdi-account-multiple-plus title_icon"></i> Student Admission Form</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card pt-0">
                <ul class="nav nav-tabs bg-nav-pills nav-justified mb-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link rounded-0" href="{{ route('students.create') }}">
                            <i class="mdi mdi-home-variant d-lg-none d-block me-1"></i>
                            <span class="d-none d-lg-block">Single Student Admission</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-0 active" href="{{ route('students.bulkcreate') }}">
                            <i class="mdi mdi-account-circle d-lg-none d-block me-1"></i>
                            <span class="d-none d-lg-block">Bulk Student Admission</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-0" data-bs-toggle="tab" href="#excel-upload" role="tab">
                            <i class="mdi mdi-cogs d-lg-none d-block me-1"></i>
                            <span class="d-none d-lg-block">Excel Upload</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="bulk-admission" role="tabpanel">
                        <form method="POST" class="p-3 d-block" action="" autocomplete="off">
                            <div class="row justify-content-md-center">
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3 mb-lg-0">
                                    <select name="klass_id" id="klass_id" class="form-control select2" required>
                                        <option value="">Select Class</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3 mb-lg-0">
                                    <select name="section_id" id="section_id" class="form-control select2" required>
                                        <option value="">Select One</option>
                                    </select>
                                </div>
                            </div>
                            <br>

                            <div id="first-row">
                                <div class="row this_row">
                                    <div class="col-xl-11 col-lg-11 col-md-12 col-sm-12 mb-3 mb-lg-0">
                                        <div class="row justify-content-md-center">
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-1 mb-lg-0">
                                                <input type="text" name="name[]" class="form-control" placeholder="Name" required>
                                            </div>

                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-1 mb-lg-0">
                                                <input type="email" name="email[]" class="form-control" placeholder="Email" required>
                                            </div>

                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-1 mb-lg-0">
                                                <input type="password" name="password[]" class="form-control" placeholder="Password" required>
                                            </div>

                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-1 mb-lg-0">
                                                <select name="gender[]" class="form-control" required>
                                                    <option value="">Select gender</option>
                                                    @foreach (InitS::getGenders() as $gender)
                                                        <option value="{{ $gender }}">{{ $gender }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-1 mb-lg-0">
                                                <select name="parent_id[]" class="form-control" required>
                                                    <option value="">Select Parent</option>
                                                    @foreach ($parents as $parent)
                                                        <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 mb-3 mb-lg-0">
                                        <div class="row justify-content-md-center">
                                            <div class="form-group col">
                                                <button class="btn btn-icon btn-success add_bulk_students"> + </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="append_students"></div>

                                <div class="text-center mt-2">
                                    <button type="submit" class="btn btn-secondary col-md-4 col-sm-12 mb-4">Add student</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="excel-upload" role="tabpanel">
                        <div class="p-3">
                            <p>Excel upload functionality will be added here.</p>
                            <a href="http://localhost/school__/superadmin/student/create/excel" class="btn btn-primary">Go to Excel Upload</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('footer_scripts')
    <script>
        $(document).on('click', '.add_bulk_students', function(event) {
            event.preventDefault();

            const htmls = `
                <div class="row mt-2 this_row">
                    <div class="col-xl-11 col-lg-11 col-md-12 col-sm-12 mb-3 mb-lg-0">
                        <div class="row justify-content-md-center">
                            <div class="form-group col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-1 mb-lg-0">
                                <input type="text" name="name[]" class="form-control" value="" placeholder="Name" required="">
                            </div>

                            <div class="form-group col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-1 mb-lg-0">
                                <input type="email" name="email[]" class="form-control" value="" placeholder="Email" required="">
                            </div>

                            <div class="form-group col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-1 mb-lg-0">
                                <input type="password" name="password[]" class="form-control" value="" placeholder="Password" required="">
                            </div>

                            <div class="form-group col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-1 mb-lg-0">
                                <select name="gender[]" class="form-control" required="">
                                    <option value="">Select gender</option>
                                    @foreach (InitS::getGenders() as $gender)
                                        <option value="{{ $gender }}">{{ $gender }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-1 mb-lg-0">
                                <select name="parent_id[]" class="form-control">
                                    <option value="">Select Parent</option>
                                    @foreach ($parents as $parent)
                                        <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 mb-3 mb-lg-0">
                        <div class="row justify-content-md-center">
                            <div class="form-group col">
                                <button type="button" class="btn btn-icon btn-danger remove_bulk_students">-</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            $('#append_students').append(htmls);
        });

        $(document).on('click', '.remove_bulk_students', function(event) {
            event.preventDefault();

            $(this).closest('.this_row').remove();
        });
    </script>
@endpush
