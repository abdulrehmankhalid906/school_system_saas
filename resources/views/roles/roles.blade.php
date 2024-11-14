@extends('layouts.app')
@section('title', 'Dashboard | Roles')

@section('content')
    <div class="content" style="padding-top: 30px;">
        <div class="loadings hidden"></div>
        <div class="row ">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body py-2">
                        <h4 class="page-title d-inline-block">
                            <i class="mdi mdi-account-circle title_icon"></i> All Roles
                        </h4>
                        <button type="button" class="btn btn-outline-primary btn-rounded align-middle mt-1 float-end" onclick="rightModal('http://localhost/school/modal/popup/admin/create', 'Create admin')">
                            <i class="mdi mdi-plus"></i> Create Role</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body admin_content">
                        <div class="empty_box text-center">
                            <img class="mb-1" width="120px" src="http://localhost/school__/assets/backend/images/empty_box.png" />
                            <br>
                            <span class="">No data found</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
