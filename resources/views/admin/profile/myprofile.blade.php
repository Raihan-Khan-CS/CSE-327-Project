@extends('layouts.admin_master')

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
          <h5 class="mb-0">ADMIN DASHBOARD</h5>
          <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
             </ul>
          </nav>
       </div>
       @include('admin.topbar.menu')
    </div>
</div>
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
             <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                <div class="iq-card-body profile-page p-0">
                   <div class="profile-header">
                      <div class="cover-container">
                         <img src="{{ asset('public/admin') }}/images/page-img/RaihanCover.jpg"  alt="profile-bg" class="rounded img-fluid w-100">
                                {{-- <ul class="header-nav d-flex flex-wrap justify-end p-0 m-0">
                                    <li><a href="javascript:void();"><i class="ri-pencil-line"></i></a></li>
                                    <li><a href="javascript:void();"><i class="ri-settings-4-line"></i></a></li>
                                </ul> --}}
                      </div>
                      <div class="profile-info p-4">
                         <div class="row">
                            <div class="col-sm-12 col-md-6">
                               <div class="user-detail pl-5">
                                  <div class="d-flex flex-wrap align-items-center">
                                     <div class="profile-img pr-4">
                                        <img src="{{asset (Auth::user()->image) }}" class="avatar-130 img-fluid" />
                                     </div>
                                     <div class="profile-detail d-flex align-items-center">
                                        <h3>{{ Auth::user()->name }}</h3>
                                        <p class="m-0 pl-3"> Co Founder</p>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-sm-12">
             <div class="row">
                <div class="col-lg-12 profile-right">
                   <div class="iq-card iq-card-block iq-card-stretch">
                      <div class="iq-card-header d-flex justify-content-between">
                         <div class="iq-header-title">
                            <h4 class="card-title">My Profile Details</h4>
                         </div>
                      </div>
                      <div class="iq-card-body">
                         <div class="about-info m-0 p-0">
                            <div class="row">
                               <div class="col-12"><p>I Believe in Team Work!</p></div>
                               <div class="col-12"><p>I love the simple things in life and am always happy with what I have on my own. I love to smile a lot and travel the world. In Fall 2018, I started my journey at North South University (NSU) under the Department of Electrical and Computer Engineering (ECE), and my major is Computer Science and Engineering (CSE). Born and brought up in Khulna, currently living in Dhaka for my study and job. Working part-time in a multinational company as a Programmer and involved with some national companies. I am interested to working in Blockchain and Cryptocurrency.</p></div>
                               <div class="col-3">Email Or Phone:</div>
                               <div class="col-9">{{ Auth::user()->email }}</div>
                               <div class="col-3">Phone: </div>
                               <div class="col-9">{{ Auth::user()->phone }}</div>
                               <div class="col-3">Location:</div>
                               <div class="col-9">{{ Auth::user()->address }}</div>
                            </div>
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
