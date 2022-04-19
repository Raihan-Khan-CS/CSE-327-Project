@extends('layouts.admin_master')
@section('subadmin')
    active show-sub
@endsection
@section('all_subadmin')
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
          <h5 class="mb-0">All Permission</h5>
          <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('brands') }}">Permission</a></li>
                <li class="breadcrumb-item active" aria-current="page">Permission Management</li>
             </ul>
          </nav>
       </div>
       @include('admin.topbar.menu')
    </div>
</div>
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
        <div class="col-sm-8 m-auto">
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">All Permission</h4>
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
                              <th>User Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Permission Name</th>
                              <th>Action</th>
                           </tr>
                       </thead>
                        <tbody>
                           @foreach ($admin as $row)

                           <tr>
                               <td>{{ $loop->iteration }}</td>
                               <td>{{ $row->name }}</td>
                               <td>{{ $row->email }}</td>
                               <td>{{ $row->phone }}</td>
                               <td>
                                   <span class="badge badge-success text-center" style="font-size:15px;">{{ $row->role->name }}</span>
                               </td>


                              <td>
                                 <div class="flex align-items-center list-user-action d-flex">
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('subadmin.edit',$row->id) }}"><i class="ri-pencil-line"></i></a>

                                    <form action="{{ route('subadmin.destroy',$row->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    <button data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="ri-delete-bin-line"></i></button>
                                    </form>
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
                                 <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                 </li>

                                 <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                 </li>
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
 </div>

@endsection
