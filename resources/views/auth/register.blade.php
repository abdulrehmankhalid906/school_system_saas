@extends('guests-layout.app')
@section('title', 'Register Account')
@section('guest-content')

<div class="card-body">
    <h4 class="mb-0 text-center">Register Your Account</h4>
    <form method="POST" action="{{ route('register') }}" class="mb-6">
        @csrf

        <div class="mb-4">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" placeholder="Enter your name"/>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

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
            <label for="name" class="form-label">{{ __('Password') }}</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" id="password" name="password"/>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-4 form-password-toggle">
            <label for="name" class="form-label">{{ __('Confirm Password') }}</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password_confirmation') }}" id="password_confirmation" name="password_confirmation"/>
        </div>

        {{-- <div class="my-8">
            <div class="form-check mb-0 ms-2">
                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms"/>
                <label class="form-check-label" for="terms-conditions"> I agree to
                    <a href="javascript:void(0);">privacy policy & terms</a>
                </label>
            </div>
        </div> --}}

        <button class="btn btn-primary d-grid w-100">Sign Up</button>
    </form>

    <p class="text-center">
        <span>Already have an account?</span>
        <a href="{{ route('login') }}"><span>Login Account</span></a>
    </p>
</div>
@endsection
