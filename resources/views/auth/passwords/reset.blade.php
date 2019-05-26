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
                email
            </div>
        </div> 
    
        <div class="form-group row mb-4">
            <div class="col-md-4 offset-md-4">
                password
            </div>
        </div> 
        <div class="form-group row mb-4">
            <div class="col-md-4 offset-md-4">
                submit
            </div>
        </div> 
        <div class="form-group row mb-2">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    remember me  forgot password
                </div>
            </div>
        </div>
    </form>
</div>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
