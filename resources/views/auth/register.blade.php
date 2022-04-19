@extends('layouts.frontend_master')

@section('frontend_content')

  <!-- Breadcrumb Area start -->
  <section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">Register</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Register</li>
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
        <div class="row">
            <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4>Register</h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <label for="name">Your Name</label>
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Your Name" >
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="email">Email Address</label>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Your Email" >
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="phone">Phone Number</label>
                                        <input id="email" type="number" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" >
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="password">Password</label>
                                        <input id="password" type="password" class="form-control"  name="password" placeholder="Password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="password">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                                        <div class="button-box">
                                            <button type="submit">Register</button>
                                        </div>
                                    </form><br><br>
                                    <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger"><i class="fab fa-google"></i>-Google</a>
                                    <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-success"><i class="fab fa-facebook"></i>-Facebook</a>
                                    <a href="{{ url('/auth/redirect/github') }}" class="btn btn-info"><i class="fab fa-github"></i>-Github</a>
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
