@extends('layouts.admin_master')
@section('sliders')
    active show-sub
@endsection
@section('slider')
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
          <h5 class="mb-0">SLIDERS</h5>
          <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('sliders') }}">Back</a></li>
                <li class="breadcrumb-item active" aria-current="page">Slider Edit</li>
             </ul>
          </nav>
       </div>
       @include('admin.topbar.menu')
    </div>
</div>
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12 col-lg-10">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Slider Edit</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <form class="form-horizontal" action="{{ route('sliders.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $sliders->id }}">
                    <input type="hidden" name="old_img" value="{{ $sliders->slider_image }}">
                    @if($sliders->title_en == NULL)
                    @else
                        <div class="form-group">
                         <label for="email">Sider Title Name English:</label>
                            <input type="text" class="form-control" name="title_en" value="{{ $sliders->title_en }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Sider Title Name Bangla:</label>
                            <input type="text" class="form-control" name="title_bn" value="{{ $sliders->title_bn }}" >
                        </div>
                        @endif
                        @if($sliders->description_en == NULL)
                        @else
                      <div class="form-group">
                        <label for="email">Slider Description English:</label>
                           <input type="text" class="form-control" name="description_en" value="{{ $sliders->description_en }}">
                     </div>
                     <div class="form-group">
                        <label for="email">Slider Description Bangla:</label>
                           <input type="text" class="form-control" name="description_bn" value="{{ $sliders->description_bn }}">
                     </div>
                     @endif
                     <div class="col-lg-4">
                        <div class="form-group">
                            <label for="email">Slider Old Image:</label>
                                <img src="{{ asset($sliders->slider_image) }}" width="80" height="80" alt="">
                                <input type="file" name="slider_image" class="form-control mt-2">
                            @error('slider_image')
                            <span class="invalid-feedback" role="alert"></span>
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                      <div class="form-group">
                            <button type="submit" class="btn btn-success" style="font-size: 18px">Update Slider</button>
                      </div>
                   </form>
                   <div class="form-group">
                    <a href="{{ route('sliders') }}" class="btn btn-outline-primary"><i class="fa fa-chevron-left"></i> Back</a>
                </div>
                </div>
             </div>
             </div>
          </div>
       </div>
    </div>
 </div>

@endsection
