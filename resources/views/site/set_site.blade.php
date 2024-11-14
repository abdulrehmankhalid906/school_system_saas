@extends('layouts.app')
@section('title', 'Site Setting')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="h-100">
                <div class="row mb-3 pb-1">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('site.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <input type="hidden" name="id" value="{{ $site->id ?? 0 }}">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="mb-2 text-center">
                                           <small class="text-muted">Updated By: {{ $site->updatedBy->name ?? '' }} - {{ $site && $site->updated_at ? $site->updated_at->diffForHumans() : '' }}</small>
                                        </h4>
                                    </div>
                                </div>
            
                                <div class="row g-3">
                                    <div class="col-lg-6 col-sm-12">
                                        <label for="">Image</label>
                                        <input type="file" class="form-control @error('backend_logo') is-invalid @enderror" name="backend_logo" id="backend_logo">
                                        @error('backend_logo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        
                                        
                                        <div class="text-center mt-5">
                                            @if (!empty($site) && !empty($site->backend_logo))
                                                <img src="{{ asset('storage/images/' . $site->backend_logo) }}" alt="{{  $site->title ?? '' }}" class="img-fluid rounded" style="max-width: 150px;">
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="row g-3">
                                            <div class="col-12 col-sm-12">
                                                <label for="">Site Title</label>
                                                <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $site->title ?? '' }}" name="title" id="title">
                                                @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
            
                                            <div class="col-12 col-sm-12">
                                                <label for="">Frontend Text</label>
                                                <input type="text" class="form-control @error('frontend_text') is-invalid @enderror" value="{{ $site->frontend_text ?? '' }}" name="frontend_text" id="frontend_text">
                                                @error('frontend_text')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
            
                                            <div class="col-12 col-sm-12">
                                                <label for="">Backend Text</label>
                                                <input type="text" class="form-control @error('backend_text') is-invalid @enderror" value="{{ $site->backend_text ?? '' }}" name="backend_text" id="backend_text">
                                                @error('backend_text')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
            
                                            <div class="col-12 col-sm-12">
                                                <label for="">Newsletter Text</label>
                                                <input type="text" class="form-control @error('newsletter_text') is-invalid @enderror" value="{{ $site->newsletter_text ?? '' }}" name="newsletter_text" id="newsletter_text">
                                                @error('newsletter_text')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
            
                                            <div class="col-12 col-sm-12">
                                                <label for="">Base URL</label>
                                                <input type="text" class="form-control @error('base_url') is-invalid @enderror" value="{{ $site->base_url ?? '' }}" name="base_url" id="base_url">
                                                @error('base_url')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
            
                                    @php
                                        $socials = $site ? json_decode($site->socials_links) ?? [] : [];
                                        $contacts = $site ? json_decode($site->contacts) ?? [] : [];
                                    @endphp
            
                                    <div class="col-3 col-sm-3">
                                        <label for="">Facebook URL</label>
                                        <input type="text" class="form-control" value="{{ $socials[0] ?? '' }}" name="socials_links[]" id="socials_links">
                                        
                                    </div>
            
                                    <div class="col-3 col-sm-3">
                                        <label for="">Instagram URL</label>
                                        <input type="text" class="form-control" value="{{ $socials[1] ?? '' }}" name="socials_links[]" id="socials_links">
                                    </div>
            
                                    <div class="col-3 col-sm-3">
                                        <label for="">Twitter URL</label>
                                        <input type="text" class="form-control" value="{{ $socials[2] ?? '' }}" name="socials_links[]" id="socials_links">
                                    </div>
            
                                    <div class="col-3 col-sm-3">
                                        <label for="">Other URL</label>
                                        <input type="text" class="form-control" value="{{ $socials[3] ?? '' }}" name="socials_links[]" id="socials_links">
                                    </div>
            
                                    <div class="col-3 col-sm-3">
                                        <label for="">Location</label>
                                        <input type="text" class="form-control" value="{{ $contacts[0] ?? '' }}" name="contacts[]" id="contacts">
                                    </div>
            
                                    <div class="col-3 col-sm-3">
                                        <label for="">Phone No</label>
                                        <input type="text" class="form-control" value="{{ $contacts[1] ?? '' }}" name="contacts[]" id="contacts">
                                    </div>
            
                                    <div class="col-3 col-sm-3">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" value="{{ $contacts[2] ?? '' }}" name="contacts[]" id="contacts">
                                    </div>
            
                                    <div class="col-12 mb-4">
                                        <button class="btn btn-primary w-100" type="submit">Update Site</button>
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