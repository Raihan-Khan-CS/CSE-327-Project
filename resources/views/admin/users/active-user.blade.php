@extends('layouts.admin_master')
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
          <h5 class="mb-0">All USER</h5>
          <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('reports') }}">home</a></li>
                <li class="breadcrumb-item active" aria-current="page">All User</li>
             </ul>
          </nav>
       </div>
       @include('admin.topbar.menu')
    </div>
</div>
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">All Users</h4>
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
                                    <th class="text-center">Sl</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Account</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            {{-- @php
                                $ls = 1;
                            @endphp --}}
                            <tbody>
                                @forelse ($user as $item)
                            <tr>
                                <td>1</td>
                                <td><img src="{{ asset($item->image) }}" width="40" height="40" alt=""></td>
                                <td class="text-center">{{ $item->name }}</td>
                                <td class="text-center">{{ $item->email }}</td>
                                <td class="text-center">{{ $item->phone }}</td>
                                <td>
                                    @if ($item->inban == 0)
                                    <span class="badge badge-primary" style=" font-size:14px;">Unbanned</span>
                                    @else
                                    <span class="badge badge-danger" style=" font-size:14px;">Banned</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->userIsOnline())
                                    <span class="badge pill-badge badge-success">Active now</span>
                                    @else
                                    <span class="badge pill-badge badge-danger">{{ Carbon\Carbon::parse($item->last_seen)->diffForHumans() }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->inban == 0)
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Banned" href="{{ url('admin/user/banned/'.$item->id) }}"><i class="fa fa-arrow-down"></i></a>
                                    @else
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Unbanned" href="{{ url('admin/user/unbanned/'.$item->id) }}"><i class="fa fa-arrow-up"></i></a>
                                    @endif
                                </td>
                                </tr>
                                @empty
                                <h4 class="mt-3 text-danger" >Data Not Found Please Try Again</h4>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>
@endsection

