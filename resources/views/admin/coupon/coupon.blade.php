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
                <li class="breadcrumb-item active" aria-current="page">All Coupon</li>
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
                     <h4 class="card-title">All Coupon</h4>
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
                              <th>Coupon Name</th>
                              <th>Coupon Discount %</th>
                              <th>Coupon Validity</th>
                              <th>Coupon Status</th>
                              <th>Action</th>
                           </tr>
                       </thead>
                        <tbody>
                           @foreach ($coupons as $coupon)
                           <tr>
                               <td>{{ $coupons->firstItem()+$loop->index }}</td>
                              <td>{{ $coupon->coupon_name }}</td>
                              <td>{{ $coupon->coupon_discount }} %</td>
                              <td>{{ Carbon\Carbon::parse($coupon->coupon_validity)->format('D,d F Y') }}</td>
                              <td>
                                  @if($coupon->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                  <span class="badge badge-success">Valid</span>
                                  @else
                                  <span class="badge badge-danger">Invalid</span>
                                  @endif
                                  @if($coupon->status == 1)
                                  <span class="badge badge-success">Active</span>
                                  @else
                                  <span class="badge badge-danger">Inactive</span>
                                  @endif
                              </td>

                              <td>
                                 <div class="flex align-items-center list-user-action">
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ url('admin/coupon/edit/'.$coupon->id) }}"><i class="ri-pencil-line"></i></a>
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" id="delete" href="{{ url('admin/coupon/delete/'.$coupon->id) }}"><i class="ri-delete-bin-line"></i></a>

                                    @if($coupon->status == 1)
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Inactive" href="{{ url('admin/coupon/inactive/'.$coupon->id) }}"><i class="fa fa-arrow-up"></i></a>
                                    @else
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Active" href="{{ url('admin/coupon/active/'.$coupon->id) }}"><i class="fa fa-arrow-down"></i></a>
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
                           {{-- <span>Showing 1 to 5 of 5 entries</span> --}}
                        </div>
                        <div class="col-md-6">
                           <nav aria-label="Page navigation example">
                              <ul class="pagination justify-content-end mb-0">
                                 <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                 </li>
                                {!! $coupons->links() !!}
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
          <div class="col-sm-12 col-lg-4">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Create Coupon</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <form class="form-horizontal" action="{{ route('coupon.store') }}" method="POST">
                    @csrf
                      <div class="form-group">
                         <label for="email">Coupon Name:</label>
                            <input type="text" class="form-control" name="coupon_name" value="{{ old('coupon_name') }}" placeholder="Enter Coupon Name">
                            @error('coupon_name')
                            <span class="invalid-feedback" role="alert"></span>
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">Coupon Discount:</label>
                           <input type="text" class="form-control" name="coupon_discount" value="{{ old('coupon_discount') }}" placeholder="Enter Discount">
                           @error('coupon_discount')
                           <span class="invalid-feedback" role="alert"></span>
                           <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                     </div>
                     <div class="form-group">
                        <label for="email">Coupon Validity:</label>
                           <input type="date" class="form-control" name="coupon_validity" value="{{ old('brandcoupon_validity_name_bn') }}" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" max="99" >
                           @error('coupon_validity')
                           <span class="invalid-feedback" role="alert"></span>
                           <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                     </div>
                            <div class="form-group">
                            <button type="submit" class="btn btn-success" style="font-size: 18px">Create Coupon</button>
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

