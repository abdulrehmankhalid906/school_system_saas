@extends('layouts.master')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-xl-0">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Manage</strong> Permissions</h3>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h5>Role: {{ $role->name }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('role.update.permission', $role->id) }}" method="post">
                    @csrf
                    <div class="row">
                        @foreach ($permissions as $permission)
                            <div class="form-check">
                                <input class="form-check-input" name="permissions[]" type="checkbox" value="{{ $permission->name }}" @if(in_array($permission->name, $selected_permissions)) checked @endif>
                                <label class="form-check-label">{{ $permission->name }}</label>
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
</main>
@endsection