@extends('layouts.app')
@section('title', 'Edit Grade')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="header-title">Edit Grade</h5>
                                <form method="POST" action="{{ route('grades.update', $grade->id) }}" autocomplete="off">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row g-2">
                                        <div class="col-md-4">
                                            <label class="form-label" for="title">Grade Title</label>
                                            <input type="text" id="title" name="title" value="{{ $grade->title ?? '' }}" class="form-control" placeholder="A" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label" for="start_range">Grade Start Range <span class="text-danger">*</span></label>
                                            <input type="number" id="start_range" name="start_range" value="{{ $range['before'] ?? '' }}" class="form-control" placeholder="0" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label" for="end_range">Grade End Range <span class="text-danger">*</span></label>
                                            <input type="number" id="end_range" name="end_range" value="{{ $range['after'] ?? '' }}" class="form-control" placeholder="33" required>
                                        </div>

                                        <div class="text-start">
                                            <button type="submit" class="btn btn-primary me-3 mb-4">Update</button>
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
