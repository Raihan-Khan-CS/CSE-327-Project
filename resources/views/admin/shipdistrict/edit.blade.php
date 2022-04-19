@extends('layouts.admin_master')
@section('shiparea')
    active show-sub
@endsection
@section('add_district')
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
          <h5 class="mb-0">SHIP DISTRICT</h5>
          <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('district') }}">Back</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ship District Edit</li>
             </ul>
          </nav>
       </div>
       @include('admin.topbar.menu')
    </div>
</div>
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12 col-lg-4">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Edit District</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <form class="form-horizontal" action="{{ route('district.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $district->id }}">
                    <div class="form-group">
                        <label for="email">Division Name:</label>
                        <select class="custom-select" name="division_id">
                            <option label="Choose One"></option>
                            @foreach ($divisions as $row)
                            <option value="{{ $row->id }}"{{$row->id == $district->division_id ? 'selected': ''}}>{{ $row->division_name_en }}</option>
                            @endforeach
                        </select>
                        @error('division_id')
                        <span class="invalid-feedback" role="alert"></span>
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                      <div class="form-group">
                         <label for="email">District Name En:</label>
                            <input type="text" class="form-control" name="district_name_en" value="{{ $district->district_name_en }}">
                            @error('district_name_en')
                            <span class="invalid-feedback" role="alert"></span>
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">District Name Bn:</label>
                           <input type="text" class="form-control" name="district_name_bn" value="{{ $district->district_name_bn }}">
                           @error('district_name_bn')
                           <span class="invalid-feedback" role="alert"></span>
                           <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                     </div>
                      <div class="form-group">
                            <button type="submit" class="btn btn-success" style="font-size: 18px">Update District</button>
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
