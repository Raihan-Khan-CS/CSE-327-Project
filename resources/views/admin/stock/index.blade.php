@extends('layouts.admin_master')
@section('stock')
    active show-sub
@endsection
@section('stocks')
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
          <h5 class="mb-0">Stock Management</h5>
          <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('product.manage') }}">home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Stock Management</li>
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
                     <h4 class="card-title">Stock Management</h4>
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
                              <th class="text-center">image</th>
                              <th class="text-center">Cat.N</th>
                              <th class="text-center">SubCat.N</th>
                              <th class="text-center">prod.N.En</th>
                              <th class="text-center">prod Stock</th>
                              <th class="text-center">Selling Price</th>
                              <th class="text-center">Status</th>
                              <th class="text-center">Action</th>
                           </tr>
                       </thead>
                        <tbody>
                           @foreach ($product as $item)
                           <tr>
                               <td>{{ $product->firstItem()+$loop->index }}</td>
                               <td class="text-center"><img src="{{ asset($item->product_thambnail) }}" width="80" height="80" alt=""></td>
                               <td class="text-center">{{ $item->category->category_name_en }}</td>
                               <td class="text-center">{{ $item->subcategory->subcategory_name_en }}</td>
                              <td class="text-center">{{ $item->product_name_en }}</td>
                              <td class="text-center">
                                  <span class="badge badge-pill badge-success">{{ $item->product_qty }}</span>
                                </td>
                              <td class="text-center">{{ $item->selling_price }}</td>
                              <td>
                                  @if ($item->status == 1)
                                      <span class="badge badge-success badge-sm text-center">Active</span>
                                      @else
                                      <span class="badge badge-danger badge-sm">Inactive</span>

                                  @endif
                              </td>
                              <td>
                                 <div class="flex align-items-center list-user-action">
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('admin.stock',$item->id) }}"><i class="ri-pencil-line"></i></a>
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
                                {{ $product->links() }}
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
