@extends('layouts.admin_master')
@section('shiparea')
    active show-sub
@endsection
@section('add_division')
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
          <h5 class="mb-0">SHIP DIVISIONS</h5>
          <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('division') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">All Ship Division</li>
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
                     <h4 class="card-title">All Division</h4>
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
                              <th>Division Name en</th>
                              <th>Division Name bn</th>
                              <th>Action</th>
                           </tr>
                       </thead>

                        <tbody>
                           @foreach ($divisions as $row)
                           <tr>
                               <td>{{ $divisions->firstItem()+$loop->index}}</td>
                              <td>{{ $row->division_name_en }}</td>
                              <td>{{ $row->division_name_bn }}</td>
                              <td>
                                 <div class="flex align-items-center list-user-action">
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ url('admin/division/edit/'.$row->id) }}"><i class="ri-pencil-line"></i></a>
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" id="delete" href="{{ url('admin/division/delete/'.$row->id) }}"><i class="ri-delete-bin-line"></i></a>
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
                                {{ $divisions->links() }}
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
                      <h4 class="card-title">Create Divisions</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <form class="form-horizontal" action="{{ route('division.store') }}" method="POST">
                    @csrf
                      <div class="form-group">
                         <label for="email">Division Name English:</label>
                            <input type="text" class="form-control" name="division_name_en" value="{{ old('division_name_en') }}" placeholder="Enter Division name English">
                            @error('division_name_en')
                            <span class="invalid-feedback" role="alert"></span>
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">Division Name Bangla:</label>
                           <input type="text" class="form-control" name="division_name_bn" value="{{ old('division_name_bn') }}" placeholder="Enter Division name bangla">
                           @error('division_name_bn')
                           <span class="invalid-feedback" role="alert"></span>
                           <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                     </div>
                      <div class="form-group">
                            <button type="submit" class="btn btn-success" style="font-size: 18px">Create Division</button>
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
