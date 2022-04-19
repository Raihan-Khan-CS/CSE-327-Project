@extends('layouts.admin_master')
@section('review')
    active show-sub
@endsection
@section('reviews')
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
          <h5 class="mb-0">Product Review</h5>
          <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('brands') }}">Review</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product Reviews</li>
             </ul>
          </nav>
       </div>
       @include('admin.topbar.menu')
    </div>
</div>
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
            <div class="col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">User Reviews</h4>
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
                                        <th>image</th>
                                        <th>Customer Name</th>
                                        <th>Comment</th>
                                        <th>Rating</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($review as $item)
                                    <tr>
                                        <td>{{ $review->firstItem()+$loop->index }}</td>
                                        <td><img src="{{ asset($item->product->product_thambnail) }}" width="40" height="40" alt=""></td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->comment }}</td>
                                        <td>{{ $item->rating }}</td>
                                        <td>
                                            @if($item->status == 'pending')
                                            <span class="badge badge-primary">Pending</span>
                                            @endif
                                            @if($item->status == 'approve')
                                            <span class="badge badge-success">Approve</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="flex align-items-center list-user-action">
                                                @if($item->status == 'pending')
                                                <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Approve" href="{{ url('admin/product/approve/'.$item->id) }}"><i class="fa fa-arrow-up"></i></a>
                                                @else
                                                @endif
                                                <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" id="delete" href="{{ url('admin/review/delete/'.$item->id) }}"><i class="ri-delete-bin-line"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-between mt-3">
                            <div id="user-list-page-info" class="col-md-6">
                            {{-- <span>Showing 1 to 5 of 5 entries</span> --}}
                            </div>
                            <div class="col-md-6">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end mb-0">

                                        {!! $review->links() !!}

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

