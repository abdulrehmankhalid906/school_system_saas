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

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="mb-4">
            <label for="email" class="form-label">{{ __('Email Address') }}</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" placeholder="Enter your email"/>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-4 form-password-toggle">
            <label class="form-label" for="password">{{ __('Password') }}</label>
            <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password"/>
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-4 form-password-toggle">
            <label class="form-label" for="password">{{ __('Confirm Password') }}</label>
            <div class="input-group input-group-merge">
                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"/>
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
        </div>

        <button class="btn btn-primary d-grid w-100">{{ __('Reset Password') }}</button>
    </form>

    <p class="text-center">
        <span>Don't have an account?</span>
        <a href="{{ route('register') }}"><span>Register Account</span></a>
    </p>
</div>
@endsection
