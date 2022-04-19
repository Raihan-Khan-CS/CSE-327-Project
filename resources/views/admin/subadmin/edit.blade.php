@extends('layouts.admin_master')

@section('subadmin')
    active show-sub
@endsection
@section('add_subadmin')
    active
@endsection
@section('admin_content')
<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
       <div class="iq-sidebar-logo">
          <div class="top-logo">
             <a href="index.html" class="logo">
             <img src="images/logo.png" class="img-fluid" alt="">
             <span>Sofbox</span>
             </a>
          </div>
       </div>
       <div class="navbar-breadcrumb">
          <h5 class="mb-0">Edit Subadmin</h5>
          <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Edit SubAdmin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Subadmin</li>
             </ul>
          </nav>
       </div>
       @include('admin.topbar.menu')
    </div>
</div>
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 m-auto">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Edit SubAdmin</h4>
                    </div>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form p-5">
                                    <form method="POST" action="{{ route('subadmin.update',$admin->id) }}">
                                        @csrf
                                        @method('put')
                                        <label for="name">Your Name</label>
                                        <input id="name" type="text" class="form-control" name="name" value="{{ $admin->name}}" >
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="email">Email Address</label>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ $admin->email }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="phone">Phone Number</label>
                                        <input id="email" type="number" class="form-control" name="phone" value="{{ $admin->phone }}">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="password">Password</label>
                                        <input id="password" type="password" class="form-control"  name="password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="password">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                        <label for="brand">Permission :</label>
                                        <select class="custom-select" class="form-control" data-placeholder="Select one" name="role_id">
                                            <option label="Choose One"></option>
                                            @foreach ($role as $item)
                                            <option value="{{ $item->id }}"{{ $item->id == $admin->role_id ? 'selected':'' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                            @error('role_id')
                                            <span class="invalid-feedback" role="alert"></span>
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        <style>
                                            .btn-register{
                                                border: none;
                                                background: green;
                                                padding: 6px 15px;
                                                color: white;
                                            }
                                        </style>
                                        <div class="button-box">
                                            <button type="submit" class="mt-3 btn-btn-success btn-register">Create</button>
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
