@extends('layouts.admin_master')
@section('shiparea')
    active show-sub
@endsection
@section('add_division')
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
          <h5 class="mb-0">SHIP DIVISIONS</h5>
          <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('division') }}">Back</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ship Division Edit</li>
             </ul>
          </nav>
       </div>
       @include('admin.topbar.menu')
    </div>
</div>
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Edit Divisions</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form class="form-horizontal" action="{{ route('update.division') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $division->id }}">
                            <div class="form-group">
                                <label for="email">Division Name English:</label>
                                    <input type="text" class="form-control" name="division_name_en" value="{{ $division->division_name_en }}">
                                    @error('division_name_en')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Division Name Bangla:</label>
                                <input type="text" class="form-control" name="division_name_bn" value="{{ $division->division_name_bn}}">
                                @error('division_name_bn')
                                <span class="invalid-feedback" role="alert"></span>
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                    <button type="submit" class="btn btn-success" style="font-size: 18px">Update Division</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
