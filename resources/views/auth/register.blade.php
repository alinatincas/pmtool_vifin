@extends('layouts.login_layout')

@section('content')
<div class="content-login">
    <div class="form-group row mb-2">
        <div class="col-md-12">
            <img src="/img/vifin_logo.png" alt="" class="logo-img-login mx-auto d-block img-fluid">
        </div>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        {{--  <div class="form-group row mb-4">
            <div class="col-md-4 offset-md-4">
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror login-form" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="name">

              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
        </div>  --}}
        <div class="form-group row mb-4">
            <div class="col-md-4 offset-md-4">
            <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror login-form" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus placeholder="first name">

            @error('fname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>
        <div class="form-group row mb-4">
            <div class="col-md-4 offset-md-4">
            <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror login-form" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus placeholder="last name">

            @error('lname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>
        {{--  <div class="form-group row mb-4">
            <div class="col-md-4 offset-md-4">
            <input id="phone_no" type="text" class="form-control @error('phone_no') is-invalid @enderror login-form" name="phone_no" value="{{ old('phone_no') }}" required autocomplete="phone_no" autofocus placeholder="phone number">

            @error('phone_no')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>

        <div class="form-group row mb-4">
            <div class="col-md-4 offset-md-4">
            <input id="pay" type="text" class="form-control @error('pay') is-invalid @enderror login-form" name="pay" value="{{ old('pay') }}" required autocomplete="pay" autofocus placeholder="hourly pay in dkk">

            @error('pay')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>

        <div class="form-group row mb-4">
            <div class="col-md-4 offset-md-4">
            <input id="dep_name" type="text" class="form-control @error('dep_name') is-invalid @enderror login-form" name="dep_name" value="{{ old('dep_name') }}" required autocomplete="dep_name" autofocus placeholder="department name">

            @error('dep_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>
        <div class="form-group row mb-4">
            <div class="col-md-4 offset-md-4">
            <input id="pos_name" type="text" class="form-control @error('pos_name') is-invalid @enderror login-form" name="pos_name" value="{{ old('pos_name') }}" required autocomplete="pos_name" autofocus placeholder="position name">

            @error('pos_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>      --}}    
        <div class="form-group row mb-4">
            <div class="col-md-4 offset-md-4">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror login-form" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email">

              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
        </div>
        <div class="form-group row mb-4">
            <div class="col-md-4 offset-md-4">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror login-form" name="password" required autocomplete="new-password" placeholder="password">

              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
        </div>
        <div class="form-group row mb-4">
            <div class="col-md-4 offset-md-4">
              <input id="password-confirm" type="password" class="form-control login-form" name="password_confirmation" required autocomplete="new-password" placeholder="repeat password">
            </div>
        </div>
        <div class="form-group row mb-4">
            <div class="col-md-4 offset-md-4">
              <button type="submit" class="btn btn-primary login-submit login-form">
                  {{ __('SUBMIT') }}
              </button>
            </div>
        </div>
    </form>
</div>
@endsection



{{--  @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                    {{ __('Register') }}
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
  --}}