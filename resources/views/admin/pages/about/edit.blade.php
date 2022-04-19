@extends('layouts.admin_master')
@section('abouts')
    active show-sub
@endsection
@section('manage')
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
                <li class="breadcrumb-item"><a href="{{ url('admin/home') }}">about</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Edit</li>
             </ul>
          </nav>
       </div>
       @include('admin.topbar.menu')
    </div>
</div>
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12 col-lg-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Create Brands</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <form class="form-horizontal" action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $about_page->id }}">
                    <input type="hidden" name="old_img" value="{{ $about_page->bg_image }}">
                      <div class="form-group">
                         <label for="email">Title Description:</label>
                            <textarea type="text" class="form-control" name="title_description">{{ $about_page->title_description }}</textarea>
                            @error('title_description')
                            <span class="invalid-feedback" role="alert"></span>
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">Team Description:</label>
                           <textarea type="text" class="form-control" name="team_description">{{ $about_page->team_description }}</textarea>
                           @error('team_description')
                           <span class="invalid-feedback" role="alert"></span>
                           <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                     </div>
                     <div class="form-group">
                        <label for="email">Old Image:</label>
                            <img src="{{ asset($about_page->bg_image) }}" width="100" height="100" alt="">
                           <input type="file" class="form-control" name="bg_image">
                           @error('bg_image')
                           <span class="invalid-feedback" role="alert"></span>
                           <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                     </div>
                      <div class="form-group">
                            <button type="submit" class="btn btn-success" style="font-size: 18px">Update Brand</button>
                      </div>
                   </form>
                </div>
             </div>
             </div>
          </div>
       </div>
    </div>
 </div>

@endsection
