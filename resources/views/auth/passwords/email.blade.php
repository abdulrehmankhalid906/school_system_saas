@extends('guests-layout.app')
@section('title', 'Reset Password')
@section('guest-content')

    <div class="card-body">
        <div class="app-brand justify-content-center mb-6">
            <a href="javascript:void(0);" class="app-brand-link gap-2">
                <span class="app-brand-text demo text-heading fw-bold">{{ env('APP_NAME', 'Grade Master') }}</span>
            </a>
        </div>

        <h4 class="mb-0 text-center">{{ __('Reset Password') }}</h4>
        <p class="mb-6">Enter your email and we'll send you instructions to reset your password</p>

        <div class="row">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" placeholder="Enter your email"/>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary d-grid w-100">{{ __('Send Password Reset Link') }}</button>
        </form>

        <div class="text-center">
            <a href="{{ route('login') }}" class="d-flex justify-content-center">
                <i class="bx bx-chevron-left scaleX-n1-rtl me-1"></i>Back to login
            </a>
        </div>
    </div>
@endsection
