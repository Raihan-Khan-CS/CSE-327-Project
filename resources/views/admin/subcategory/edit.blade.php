@extends('layouts.admin_master')
@section('category')
    active show-sub
@endsection
@section('subcategory')
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
          <h5 class="mb-0">SUB CATEGORIES</h5>
          <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('subcategory') }}">Back</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sub Categories Edit</li>
             </ul>
          </nav>
       </div>
       @include('admin.topbar.menu')
    </div>
</div>
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12 col-lg-5">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Update Subcategory</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <form class="form-horizontal" action="{{ route('subcategory.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $subcategory->id }}">
                    <div class="form-group">
                        <label for="email">Category Name:</label>
                        <select class="custom-select" name="category_id">
                            <option label="Choose One"></option>
                            @foreach ($category as $subcat)
                            <option value="{{ $subcat->id }}"{{ $subcat->id == $subcategory->category_id ? 'selected': '' }}>{{ $subcat->category_name_en }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="invalid-feedback" role="alert"></span>
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                     </div>
                      <div class="form-group">
                         <label for="email">Subcategory Name English:</label>
                            <input type="text" class="form-control" name="subcategory_name_en" value="{{ $subcategory->subcategory_name_en }}">
                            @error('subcategory_name_en')
                            <span class="invalid-feedback" role="alert"></span>
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">Subcategory Name Bangla:</label>
                           <input type="text" class="form-control" name="subcategory_name_bn" value="{{ $subcategory->subcategory_name_bn }}" placeholder="Enter Subcategory name Bnagla">
                           @error('subcategory_name_bn')
                           <span class="invalid-feedback" role="alert"></span>
                           <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                     </div>
                      <div class="form-group">
                            <button type="submit" class="btn btn-success" style="font-size: 18px">Update Subcategory</button>
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
