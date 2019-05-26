@extends('layouts.login_layout')

@section('content')
<div class="content-login">
    <div class="form-group row mb-2">
        <div class="col-md-12">
            <img src="/img/vifin_logo.png" alt="" class="logo-img-login mx-auto d-block img-fluid">
        </div>
    </div>    
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group row mb-4">
            <div class="col-md-4 offset-md-4">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror login-form" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div> 
    
        <div class="form-group row mb-4">
            <div class="col-md-4 offset-md-4">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror login-form" name="password" required autocomplete="current-password" placeholder="password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div> 
        <div class="form-group row mb-4">
            <div class="col-md-4 offset-md-4">
                <button type="submit" class="btn btn-primary login-submit login-form">
                    {{ __('SUBMIT') }}
                </button> 
            </div>
        </div> 
        <div class="form-group row mb-2">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input login-remember-check" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link login-forgot-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
