@extends('guests-layout.app')
@section('title', 'Register Account')
{{-- @push('header_scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush --}}
@section('guest-content')

<div class="card-body">
    <h4 class="mb-2 text-center">Register Account</h4>
    <form method="POST" action="{{ route('register') }}" class="mb-6">
        @csrf

        <div class="mb-2">
            <label for="school_name" class="form-label">{{ __('School Name') }} <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('school_name') is-invalid @enderror" value="{{ old('school_name') }}" id="school_name" name="school_name" placeholder="Enter School name"/>
            @error('school_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="name" class="form-label">{{ __('Your Name') }} <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" placeholder="Enter your name"/>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="email" class="form-label">{{ __('Email Address') }} <span class="text-danger">*</span></label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" placeholder="Enter your email"/>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-2 form-password-toggle">
            <label for="name" class="form-label">{{ __('Password') }} <span class="text-danger">*</span></label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" id="password" name="password"/>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-2 form-password-toggle">
            <label for="name" class="form-label">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password_confirmation') }}" id="password_confirmation" name="password_confirmation"/>
        </div>

        {{-- <div class="mb-2 g-recaptcha mt-4" data-sitekey={{config('services.recaptcha.site_key')}}></div>
        @error('g-recaptcha-response')
            <span style="color: red;">{{ $message }}</span>
        @enderror --}}

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
