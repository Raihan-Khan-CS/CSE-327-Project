@extends('layouts.admin_master')
@section('brands')
    active show-sub
@endsection
@section('brand')
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
          <h5 class="mb-0">Product Brands</h5>
          <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/home') }}">Brand</a></li>
                <li class="breadcrumb-item active" aria-current="page">Brand Edit</li>
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
                   <form class="form-horizontal" action="{{ route('brands.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $brands->id }}">
                    <input type="hidden" name="old_img" value="{{ $brands->brand_image }}">
                      <div class="form-group">
                         <label for="email">Brand Name En:</label>
                            <input type="text" class="form-control" name="brand_name_en" value="{{ $brands->brand_name_en }}" placeholder="Enter Brand Name En">
                            @error('brand_name_en')
                            <span class="invalid-feedback" role="alert"></span>
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">Brand Name Bn:</label>
                           <input type="text" class="form-control" name="brand_name_bn" value="{{ $brands->brand_name_bn }}">
                           @error('brand_name_bn')
                           <span class="invalid-feedback" role="alert"></span>
                           <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                     </div>
                     <div class="form-group">
                        <label for="email">Old Image:</label>
                            <img src="{{ asset($brands->brand_image) }}" width="50" width="50" alt="">
                           <input type="file" class="form-control" name="brand_image">
                           @error('brand_image')
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
