@extends('layouts.admin_master')

@section('admin_content')
<section class="sign-in-page bg-white">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-sm-6 align-self-center">
                <div class="sign-in-from">
                    <h1 class="mb-0">Sign in</h1>
                    <p>Enter your email address and password to access admin panel.</p>
                    <form class="mt-4" method="POST" action="{{ route('login.admin') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Address</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control mb-0" id="exampleInputEmail1" placeholder="Enter email Or Phone" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 float-right" href="{{ route('password.request') }}">Forgot your password?</a>
                        @endif
                            <input type="password" name="password" name="{{ old('password') }}" class="form-control mb-0" id="exampleInputPassword1" placeholder="Enter Password" required>
                        </div>
                        <div class="d-inline-block w-100">
                            <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                <input type="checkbox" class="custom-control-input" id="remember_me" name="remember">
                                <label class="custom-control-label" for="remember_me">Remember Me</label>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Sign in</button>
                        </div>
                        <div class="sign-info">
                            <ul class="iq-social-media">
                                <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
                                <li><a href="#"><i class="ri-twitter-line"></i></a></li>
                                <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-6 text-center">
                <div class="sign-in-detail text-white" style="background: url({{ asset('public/admin') }}/images/login/2.jpg) no-repeat 0 0; background-size: cover;">
                    <a class="sign-in-logo mb-5" href="#"><img src="{{ asset('public/admin') }}/images/osud-logo-white.png" class="img-fluid" alt="logo"></a>
                    <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                        <div class="item">
                            <img src="{{ asset('public/admin') }}/images/login/1.png" class="img-fluid mb-4" alt="logo">
                            <h4 class="mb-1 text-white">Manage your orders</h4>
                            <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                        </div>
                        <div class="item">
                            <img src="{{ asset('public/admin') }}/images/login/1.png" class="img-fluid mb-4" alt="logo">
                            <h4 class="mb-1 text-white">Manage your orders</h4>
                            <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                        </div>
                        <div class="item">
                            <img src="{{ asset('public/admin') }}/images/login/1.png" class="img-fluid mb-4" alt="logo">
                            <h4 class="mb-1 text-white">Manage your orders</h4>
                            <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
