
@extends('layouts.frontend_master')
@section('frontend_content')
  <!-- Breadcrumb Area start -->
  <section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">Login</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->
<!-- login area start -->
<div class="login-register-area mb-60px mt-53px">
    <div class="container">
        @error('banned')
        <h3 class="text-danger text-center">{{ $message }}</h3>
        @enderror
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4>login</h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Your Email Address</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Your Email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <a class="flote-none" href="javascript:void(0)">Remember me</a>
                                                @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                                @endif
                                            </div>
                                            <button type="submit"><span>Login</span></button>
                                        </div>
                                        <div class="form-group mt-5">
                                            <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger"><i class="fab fa-google-plus-g"></i>-Google</a>
                                            <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-success"><i class="fab fa-facebook"></i>-Facebook</a>
                                            <a href="{{ url('/auth/redirect/github') }}" class="btn btn-info"><i class="fab fa-github"></i>-Github</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
