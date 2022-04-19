@extends('layouts.admin_master')
@section('admin_content')
<!-- TOP Nav Bar -->
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
 <!-- TOP Nav Bar END -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="iq-card iq-card-block iq-card-height overflow-hidden">
                <div class="iq-card-body pb-0">
                <div class="clearfix text-center">HOME SECTION</div>
                <a href=""><div class="clearfix">BLANK</div></a>

                <div class="text-center">
                    <p class="mb-0 text-secondary"><span class="text-success"></span></p>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="iq-card iq-card-block iq-card-height overflow-hidden">
                <div class="iq-card-body pb-0">
                <div class="clearfix text-center">ABOUT SECTION</div>
                <a href=""><div class="clearfix">BLANK</div></a>

                <div class="text-center">
                    <p class="mb-0 text-secondary"><span class="text-success"></span></p>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="iq-card iq-card-block iq-card-height overflow-hidden">
                <div class="iq-card-body pb-0">
                <div class="clearfix text-center">COURSE SECTION</div>
                <a href=""><div class="clearfix" style="color:red"># CREATE COURSE</div></a>
                <a href=""><div class="clearfix" style="color:red"># COURSE MANAGE</div></a>
                <div class="text-center">
                    <p class="mb-0 text-secondary"><span class="text-success"></span></p>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="iq-card iq-card-block iq-card-height overflow-hidden">
                <div class="iq-card-body pb-0">
                <div class="clearfix text-center">NEWS SECTION</div>
                <a href=""><div class="clearfix">BLANK</div></a>
                <div class="text-center">
                    <p class="mb-0 text-secondary"><span class="text-success"></span></p>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="iq-card iq-card-block iq-card-height overflow-hidden">
                <div class="iq-card-body pb-0">
                <div class="clearfix text-center">GALLERY</div>
                <a href=""><div class="clearfix">BLANK</div></a>
                <div class="text-center">
                    <p class="mb-0 text-secondary"><span class="text-success"></span></p>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="iq-card iq-card-block iq-card-height overflow-hidden">
                <div class="iq-card-body pb-0">
                <div class="clearfix text-center">FAQ</div>
                <a href=""><div class="clearfix">BLANK</div></a>
                <div class="text-center">
                    <p class="mb-0 text-secondary"><span class="text-success"></span></p>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="iq-card iq-card-block iq-card-height overflow-hidden">
                <div class="iq-card-body pb-0">
                <div class="clearfix text-center">CONTACT</div>
                <a href=""><div class="clearfix">BLANK</div></a>
                <div class="text-center">
                    <p class="mb-0 text-secondary"><span class="text-success"></span></p>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
