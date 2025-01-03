@extends('layouts.app')
@section('title', 'Generate Fee')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">

            <div class="row">
                <div class="col-xl-12">
                    <div class="nav-align-top nav-tabs-shadow mb-6">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true">
                                    Generate Fee
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="false" tabindex="-1">
                                    Class Fee Settings
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-messages" aria-controls="navs-top-messages" aria-selected="false" tabindex="-1">
                                    Totals
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="navs-top-home" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                                        <div class="row g-6">
                                            <div class="alert alert-primary" role="alert">It will create the fee challen for the {{ InitS::getFeeMonth() }}!</div>
                                        </div>
                                        <form method="POST" action="{{ route('fees.store') }}" autocomplete="off">
                                            @csrf

                                            <div class="row g-6">
                                                <div class="col-md-6">
                                                    <label for="language" class="form-label">Select Fee Type</label>
                                                    <select name="fee_type_id" id="fee_type_id" class="form-control" required>
                                                        <option value="">Select One</option>
                                                        @foreach ($feetypes as $feetype)
                                                            <option value="{{ $feetype->id }}">{{ $feetype->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="language" class="form-label">Select Class</label>
                                                    <select name="klass_id" id="klass_id" class="form-control" required>
                                                        <option value="">Select One</option>
                                                        @foreach ($classes as $class)
                                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="language" class="form-label">Select Class</label>
                                                    <select name="section_id[]" id="section_id" class="form-control multiple-select" multiple required>
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label">Due Date</label>
                                                    <input type="date" class="form-control" name="due_date" name="due_date" required>
                                                </div>
                                            </div>

                                            <div class="mt-6">
                                              <button type="submit" class="btn btn-primary me-3">Generate</button>
                                              <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                                        <h4 class="header-title">Class Fee</h4>
                                        <form method="POST" action="{{ route('manage.school.fee') }}" autocomplete="off">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="navs-top-messages" role="tabpanel">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
