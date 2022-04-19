@extends('layouts.admin_master')
@section('abouts')
    active show-sub
@endsection
@section('about')
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
          <h5 class="mb-0">ABOUT PAGES</h5>
          <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('about.manage') }}">Back</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product Create</li>
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
          <div class="col-sm-12 col-lg-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title"> Create About</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <form class="" action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                       <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Title Desciption</label>
                                    <textarea class="form-control form-control-lg" name="title_description" placeholder="Title Desciption"></textarea>
                                    @error('title_description')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Team Desciption</label>
                                    <textarea class="form-control form-control-lg" name="team_description" placeholder="Team Desciption"></textarea>
                                    @error('team_description')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Bg Image</label>
                                    <input type="file" class="form-control" name="bg_image" value="{{ old('bg-image') }}">
                                    @error('bg-image')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <button type="submit" class="btn btn-success btn-lg mt-2" style="font-size: 18px">Product Update</button>
                            </div>
                        </div>
                    </form>
                    <div class="form-group">
                        <a href="{{ route('product.manage') }}" class="btn btn-outline-primary"><i class="fa fa-chevron-left"></i> Back</a>
                    </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
