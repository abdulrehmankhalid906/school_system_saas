@extends('layouts.app')
@section('title', 'Dashboard | Subjects')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Add Subject</h4>
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <label for="form-grid-showcode" class="form-label text-muted">Show Code</label>
                                <input class="form-check-input code-switcher" type="checkbox" id="form-grid-showcode">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('subjects.store') }}" method="POST" autocomplete="off">
                            @csrf
                            <input type="hidden" name="id" value="{{ $subject->id ?? 0 }}">
        
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="row g-3">
                                        <div class="col-12 col-sm-12">
                                            <label for="">Subject Name</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $subject->title ?? '' }}" name="title" id="title">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
        
                                        <div class="col-12 col-sm-12">
                                            <label for="">Subject Code</label>
                                            <input type="text" class="form-control @error('frontend_text') is-invalid @enderror" value="{{ $subject->frontend_text ?? '' }}" name="frontend_text" id="frontend_text">
                                            @error('frontend_text')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
        
                                        <div class="col-12 col-sm-12">
                                            <label for="">Backend Text</label>
                                            <input type="text" class="form-control @error('backend_text') is-invalid @enderror" value="{{ $subject->backend_text ?? '' }}" name="backend_text" id="backend_text">
                                            @error('backend_text')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
        
                                        <div class="col-12 col-sm-12">
                                            <label for="">Base URL</label>
                                            <input type="text" class="form-control @error('base_url') is-invalid @enderror" value="{{ $subject->base_url ?? '' }}" name="base_url" id="base_url">
                                            @error('base_url')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
        
                                
                                <div class="col-12 mt-3">
                                    <button class="btn btn-primary w-100" type="submit">Update Site</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection