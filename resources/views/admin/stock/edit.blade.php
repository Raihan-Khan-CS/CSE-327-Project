@extends('layouts.admin_master')
@section('product')
    active show-sub
@endsection
@section('manage_product')
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
          <div class="col-sm-12 col-lg-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="form-group">
                        <div class="iq-header-title float-right">
                           <h4 class="card-title">&nbsp;&nbsp;&nbsp; Stock Update</h4>
                        </div>
                        <a href="{{ route('product.stock') }}" class="btn btn-outline-primary "><i class="fa fa-chevron-left"></i> Back</a>
                    </div>
                </div>
                <div class="iq-card-body">
                    <form action="{{ route('stock.update',$product->id) }}" method="POST">
                        @csrf
                       <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">product Name English</label>
                                    <input type="text" class="form-control" name="product_name_en" value="{{ $product->product_name_en }}">
                                    @error('product_name_en')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">product Name Bangla</label>
                                    <input type="text" class="form-control" name="product_name_bn" value="{{ $product->product_name_bn }}">
                                    @error('product_name_bn')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Product Code</label>
                                    <input type="text" class="form-control" name="product_code" value="{{ $product->product_code }}">
                                    @error('product_code')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Product Stock</label>
                                    <input type="text" class="form-control" name="product_qty" value="{{ $product->product_qty }}">
                                    @error('product_qty')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg" style="font-size: 18px">Stock Update</button>
                                </div>
                            </div>

                        </div>
                    </form>
                    <div class="form-group">
                        <a href="{{ route('product.stock') }}" class="btn btn-outline-primary"><i class="fa fa-chevron-left"></i> Back</a>
                    </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
