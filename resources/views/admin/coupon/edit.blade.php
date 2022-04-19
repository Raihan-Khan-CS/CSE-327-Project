@extends('layouts.admin_master')
@section('coupons')
    active show-sub
@endsection
@section('coupon')
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
          <h5 class="mb-0">COUPONS</h5>
          <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('coupon') }}">Coupon</a></li>
                <li class="breadcrumb-item active" aria-current="page">Coupon Edit</li>
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
                      <h4 class="card-title">Create Coupon</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <form class="form-horizontal" action="{{ route('coupon.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $coupon->id }}">
                      <div class="form-group">
                         <label for="email">Coupon Name:</label>
                            <input type="text" class="form-control" name="coupon_name" value="{{ $coupon->coupon_name }}" >
                            @error('coupon_name')
                            <span class="invalid-feedback" role="alert"></span>
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">Coupon Discount:</label>
                           <input type="text" class="form-control" name="coupon_discount" value="{{ $coupon->coupon_discount }}">
                           @error('coupon_discount')
                           <span class="invalid-feedback" role="alert"></span>
                           <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                     </div>
                     <div class="form-group">
                        <label for="email">Coupon Validity:</label>
                           <input type="date" class="form-control" name="coupon_validity" value="{{ $coupon->coupon_validity }}" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" max="99" >
                           @error('coupon_validity')
                           <span class="invalid-feedback" role="alert"></span>
                           <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                     </div>
                            <div class="form-group">
                            <button type="submit" class="btn btn-success" style="font-size: 18px">Coupon Update</button>
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

