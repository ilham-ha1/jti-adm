@extends('layouts.app')

@section('content')

<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">Sign In</p>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">{{ __('Email Address')
                            }}</label>
                        <input type="email" id="email"
                            class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="Enter a valid email address" />

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="password">{{ __('Password')
                            }}</label>
                        <input id="password" type="password"
                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                            placeholder="Enter password" name="password" required autocomplete="current-password" />

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="remember" name="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                    </div>
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">{{ __('Login') }}</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div
        class="d-flex flex-column flex-md-row text-center text-md-start justify-content-center py-4 px-4 px-xl-5 bg-primary">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0 center">
            Copyright © 2022. All rights reserved.
        </div>
        <!-- Copyright -->
    </div>
</section>
@endsection