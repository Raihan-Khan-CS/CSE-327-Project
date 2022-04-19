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
                <li class="breadcrumb-item"><a href="{{ route('sliders') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">All Slider</li>
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
                     <h4 class="card-title">All Brands</h4>
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
                              <th>Slder Image</th>
                              <th>Title En</th>
                              <th>Des. En</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                       </thead>

                        <tbody>
                           @foreach ($sliders as $slider)
                           <tr>
                               <td>{{ $sliders->firstItem()+$loop->index}}</td>
                               <td><img src="{{ asset($slider->slider_image) }}" width="80" height="80" alt=""></td>
                                <td>
                                    @if($slider->title_en == NULL)
                                    <span class="badge badge-success badge-sm text-center">No found</span>
                                    @else
                                    {{ $slider->title_en }}
                                    @endif
                                </td>
                                <td>
                                    @if($slider->description_en == NULL)
                                    <span class="badge badge-success badge-sm text-center">No desc. found</span>
                                    @else
                                    {{ $slider->description_en }}
                                    @endif
                                </td>
                              <td>
                                @if ($slider->status == 1)
                                    <span class="badge badge-success badge-sm text-center">Active</span>
                                    @else
                                    <span class="badge badge-danger badge-sm">Inactive</span>
                                @endif
                              </td>
                              <td>
                                <div class="flex align-items-center list-user-action">
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ url('admin/slider/edit/'.$slider->id) }}"><i class="ri-pencil-line"></i></a>
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" id="delete" href="{{ url('admin/slider/delete/'.$slider->id) }}"><i class="ri-delete-bin-line"></i></a>
                                    @if($slider->status == 1)
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Inactive" href="{{ url('admin/slider/inactive/'.$slider->id) }}"><i class="fa fa-arrow-up"></i></a>
                                    @else
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Active" href="{{ url('admin/slider/active/'.$slider->id) }}"><i class="fa fa-arrow-down"></i></a>
                                    @endif
                                </div>
                              </td>
                           </tr>
                           @endforeach
                       </tbody>
                     </table>
                  </div>
                     <div class="row justify-content-between mt-3">
                        <div id="user-list-page-info" class="col-md-6">
                        </div>
                        <div class="col-md-6">
                           <nav aria-label="Page navigation example">
                              <ul class="pagination justify-content-end mb-0">
                                {{ $sliders->links() }}
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
                      <h4 class="card-title">Create Slider</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <form class="form-horizontal" action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                         <label for="email">Sider Title Name English:</label>
                            <input type="text" class="form-control" name="title_en" value="{{ old('title_en') }}" placeholder="Enter Title Name English">
                            @error('title_en')
                            <span class="invalid-feedback" role="alert"></span>
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                      </div>
                      <div class="form-group">
                         <label for="email">Sider Title Name Bangla:</label>
                            <input type="text" class="form-control" name="title_bn" value="{{ old('title_bn') }}" placeholder="Enter Title Name Bangla">
                            @error('title_bn')
                            <span class="invalid-feedback" role="alert"></span>
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">Slider Description English:</label>
                           <input type="text" class="form-control" name="description_en" value="{{ old('description_en') }}" placeholder="Enter Description English">
                           @error('description_en')
                           <span class="invalid-feedback" role="alert"></span>
                           <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                     </div>
                     <div class="form-group">
                        <label for="email">Slider Description Bangla:</label>
                           <input type="text" class="form-control" name="description_bn" value="{{ old('description_bn') }}" placeholder="Enter Description Name Bangla">
                           @error('description_bn')
                           <span class="invalid-feedback" role="alert"></span>
                           <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                     </div>
                     <div class="form-group">
                        <label for="email">Slider Image:</label>
                           <input type="file" class="form-control" name="slider_image" value="{{ old('slider_image') }}" placeholder="Enter Course Name">
                           @error('slider_image')
                           <span class="invalid-feedback" role="alert"></span>
                           <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                     </div>
                      <div class="form-group">
                            <button type="submit" class="btn btn-success" style="font-size: 18px">Create Slider</button>
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
