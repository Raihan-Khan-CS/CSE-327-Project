@extends('layouts.frontend_master')

@section('frontend_content')
 <!-- Breadcrumb Area start -->
 <section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">My Profile</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>My Account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->
<!-- account area start -->

<section class="mb-3 mt-5" style="width: 90%; margin-left:5%">
    <div class="row" >
        <div class="col-lg-2">
            @include('user.inc.leftbar')
        </div>
        <div class="col-lg-10">
            <form action="{{ route('update.user.password') }}" method="POST">
                @csrf
                <div class="card" style="width: 80%; margin-left:20%">
                    <div class="card-header">
                        <h4 class="text-center"> Hi------ <strong style="color: red">{{ Auth::user()->name }}</strong>  Update Your Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-6">
                            <form action="{{route('update.user.password')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Old Password</label>
                                <input type="password" class="form-control" name="old_password" id="name" placeholder="Old Password">
                                @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">New Password</label>
                                <input type="password" class="form-control" name="new_password" id="name" placeholder="New Password">

                                @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">confirm Password</label>
                                <input type="password" class="form-control" name="confirmation_password" id="name" placeholder="Re-type Password">
                                @error('confirmation_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success">Update Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- account area end -->
@endsection
