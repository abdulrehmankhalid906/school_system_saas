@extends('guests-layout.app')
@section('title', 'Login Account')
@section('guest-content')

<div class="card-body">
    {{-- <div class="app-brand justify-content-center mb-6">
        <a href="javascript:void(0);" class="app-brand-link gap-2">
            <span class="app-brand-text demo text-heading fw-bold">{{ env('APP_NAME', 'Grade Master') }}</span>
        </a>
    </div> --}}

    <h4 class="mb-2 text-center">Login Account</h4>
    <form method="POST" action="{{ route('login') }}" class="mb-6">
        @csrf

        <div class="mb-4">
            <label class="form-label" for="email">{{ __('Email Address') }}</label>
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
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"/>
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-4 form-check d-flex justify-content-between align-items-center">
            <div>
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
            </div>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>

        <button class="btn btn-primary d-grid w-100">{{ __('Login') }}</button>
    </form>

    <p class="text-center">
        <span>Don't have an account?</span>
        <a href="{{ route('register') }}"><span>Register Account</span></a>
    </p>
</div>
@endsection
