@extends('layouts.admin_master')
@section('category')
    active show-sub
@endsection
@section('subsubcategory')
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
          <h5 class="mb-0">SUB SUB CATEGORIES</h5>
          <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('subsubcategory') }}">Back</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sub Sub Categories Edit</li>
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
                      <h4 class="card-title">Create Sub-Subcategory</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <form class="form-horizontal" action="{{ route('subsubcategory.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $subsubcategory->id }}">
                    <div class="form-group">
                        <label for="email">Category Name:</label>
                        <select class="custom-select" name="category_id">
                            @foreach ($category as $cat)
                            <option value="{{ $cat->id }}"{{ $cat->id == $subsubcategory->category_id ? 'selected': '' }}>{{ $cat->category_name_en }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="invalid-feedback" role="alert"></span>
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label for="email">Sub-Category Name:</label>
                        <select class="custom-select" name="subcategory_id">
                            <option label="Choose One"></option>
                            @foreach ($subcategory as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $subsubcategory->subcategory_id ? 'selected' : '' }}>{{ $item->subcategory_name_en }}</option>
                            @endforeach
                        </select>
                        @error('subcategory_id')
                        <span class="invalid-feedback" role="alert"></span>
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                     </div>
                      <div class="form-group">
                         <label for="email">Sub-Subcategory Name English:</label>
                            <input type="text" class="form-control" name="subsubcategory_name_en" value="{{ $subsubcategory->subsubcategory_name_en }}">
                            @error('subsubcategory_name_en')
                            <span class="invalid-feedback" role="alert"></span>
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">Sub-Subcategory Name Bangla:</label>
                           <input type="text" class="form-control" name="subsubcategory_name_bn" value="{{ $subsubcategory->subsubcategory_name_bn }}" placeholder="Enter Sub-Subcategory name Bnagla">
                           @error('subsubcategory_name_bn')
                           <span class="invalid-feedback" role="alert"></span>
                           <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                     </div>
                      <div class="form-group">
                            <button type="submit" class="btn btn-success" style="font-size: 18px">Create Sub-Subcategory</button>
                      </div>
                   </form>
                </div>
             </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="{{ asset('public/admin') }}/js/alart.js"></script>
 <script  type="text/Javascript">
    $(document).ready(function(){
    $('select[name="category_id"]').on('change',function(){
        var category_id = $(this).val();
        if(category_id){
            $.ajax({
                url: "{{ url('/admin/subcategory/ajax') }}/"+category_id,
                type: "GET",
                dataType:"json",
                success:function(data){
                    var d= $('select[name="subcategory_id"]').empty();
                    $.each(data,function(key,value){
                        $('select[name="subcategory_id"]').append('<option value ="'+value.id +'">' +value.subcategory_name_en + '</option>');
                    });
                },
            });
        }else{
            alert('Please Select your Category Name');
        }
    });
    });
</script>
@endsection
