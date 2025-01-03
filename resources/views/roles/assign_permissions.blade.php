@extends('layouts.app')
@section('title', 'Assign Permissions')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Role: {{ $role->name }}</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('role.update.permission', $role->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        <div class="col-lg-4">
                                            <div class="form-check">
                                                <input class="form-check-input" name="permissions[]" type="checkbox" value="{{ $permission->name }}" @if(in_array($permission->name, $selected_permissions)) checked @endif>
                                                <label class="form-check-label">{{ $permission->name }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 mt-3">
                                        <div class="d-grid">
                                            <input type="submit" class="btn btn-primary" value="Update">
                                        </div>
                                    </div>
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
