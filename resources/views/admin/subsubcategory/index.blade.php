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
                <li class="breadcrumb-item active" aria-current="page">All Sub Sub Categories</li>
             </ul>
          </nav>
       </div>
       @include('admin.topbar.menu')
    </div>
</div>
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
        <div class="col-sm-8">
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">All Sub-Subcategory</h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  <div class="table-responsive">
                     <div class="row justify-content-between">
                        <div class="col-sm-12 col-md-6">
                           <div id="user_list_datatable_info" class="dataTables_filter">
                              <form class="mr-3 position-relative">
                                 <div class="form-group mb-0">
                                    <input type="search" class="form-control" id="exampleInputSearch" placeholder="Search" aria-controls="user-list-table">
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                       <thead>
                           <tr>
                              <th>Sl</th>
                              <th>Category Name</th>
                              <th>SubCat_name</th>
                              <th>SubsubCat Name_en</th>
                              <th>SubsubCat Name_bn</th>
                              <th>Action</th>
                           </tr>
                       </thead>

                        <tbody>
                           @foreach ($subsubcategory as $subsubcat)
                           <tr>
                               <td>{{ $subsubcategory->firstItem()+$loop->index}}</td>
                                <td>{{ $subsubcat->category->category_name_en }}</td>
                               <td>{{ $subsubcat->subcategory->subcategory_name_en }}</td>
                              <td>{{ $subsubcat->subsubcategory_name_en }}</td>
                              <td>{{ $subsubcat->subsubcategory_name_bn }}</td>
                              <td>
                                 <div class="flex align-items-center list-user-action">
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ url('admin/subsubcategory/edit/'.$subsubcat->id) }}"><i class="ri-pencil-line"></i></a>
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" id="delete" href="{{ url('admin/subsubcategory/delete/'.$subsubcat->id) }}"><i class="ri-delete-bin-line"></i></a>
                                 </div>
                              </td>
                           </tr>
                           @endforeach
                       </tbody>
                     </table>
                  </div>
                     <div class="row justify-content-between mt-3">
                        <div id="user-list-page-info" class="col-md-6">
                           <span>Showing 1 to 5 of 5 entries</span>
                        </div>
                        <div class="col-md-6">
                           <nav aria-label="Page navigation example">
                              <ul class="pagination justify-content-end mb-0">
                                {{ $subsubcategory->links() }}
                              </ul>
                           </nav>
                        </div>
                     </div>
               </div>
            </div>
      </div>
          <div class="col-sm-12 col-lg-4">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Create Sub-Subcategory</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <form class="form-horizontal" action="{{ route('subsubcategory.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Category Name:</label>
                        <select class="custom-select" name="category_id">
                            <option label="Choose One"></option>
                            @foreach ($category as $subcat)
                            <option value="{{ $subcat->id }}">{{ ucwords($subcat->category_name_en) }}</option>
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
                        </select>
                        @error('subcategory_id')
                        <span class="invalid-feedback" role="alert"></span>
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                     </div>
                      <div class="form-group">
                         <label for="email">Sub-Subcategory Name English:</label>
                            <input type="text" class="form-control" name="subsubcategory_name_en" value="{{ old('subsubcategory_name_en') }}" placeholder="Enter Sub-Subcategory Name English">
                            @error('subsubcategory_name_en')
                            <span class="invalid-feedback" role="alert"></span>
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">Sub-Subcategory Name Bangla:</label>
                           <input type="text" class="form-control" name="subsubcategory_name_bn" value="{{ old('subsubcategory_name_bn') }}" placeholder="Enter Sub-Subcategory name Bnagla">
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
