@extends('layouts.app')
@section('title', 'Dashboard | Manage Teachers')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="page-title d-inline-block">
                                    <i class="mdi mdi-account-circle title_icon"></i> All Teachers
                                </h4>
                                <button type="button" class="btn btn-outline-primary btn-rounded align-middle mt-1 float-end" data-bs-toggle="modal" data-bs-target="#teacherModal">
                                    <i class="mdi mdi-plus"></i> Create Teacher
                                </button>

                                <form id="roleForm" method="POST" action="{{ route('teachers.store') }}" autocomplete="off">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="col-12">
                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label" for="system_name">Teacher Name</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="name" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input class="btn btn-primary" type="submit" value="Save changes">&nbsp;
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
