@extends('layouts.admin_master')
@section('orders')
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
          <h5 class="mb-0">PENDING ORDERS</h5>
          <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('pending.orders') }}">home</a></li>
                <li class="breadcrumb-item active" aria-current="page">All Pending Orders</li>
             </ul>
          </nav>
       </div>
       @include('admin.topbar.menu')
    </div>
</div>
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Shipping Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="name">Shipping Name :</label>
                            <strong>{{ $orders->name }}</strong>
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <label for="name">Shipping Email :</label>
                            <strong>{{ $orders->email }}</strong>
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <label for="name">Shipping Phone :</label>
                            <strong>{{ $orders->phone }}</strong>
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <label for="name">Division Name :</label>
                            <strong>{{ $orders->division->division_name_en }}</strong>
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <label for="name">District Name :</label>
                            <strong>{{ $orders->district->district_name_en }}</strong>
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <label for="name">State Name: </label>
                            <strong>{{ $orders->state->state_name_en }}</strong>
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <label for="name">Post Code: </label>
                            <strong>{{ $orders->post_code }}</strong>
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <label for="name">Order Date: </label>
                            <strong>{{ $orders->order_date }}</strong>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Order Details</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="name">Name :</label>
                            <strong>{{ $orders->user->name }}</strong>
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <label for="name">Phone</label>
                            <strong>{{ $orders->user->phone }}</strong>
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <label for="name">Payment By :</label>
                            <strong>{{ $orders->payment_method }}</strong>
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <label for="name">Tnx id :</label>
                            <strong>{{ $orders->transaction_id }}</strong>
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <label for="name">Invoice No :</label>
                            <strong>{{ $orders->invoice_no }}</strong>
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <label for="name">Total Amount :</label>
                            <strong>{{ $orders->amount }} ৳</strong>
                            <hr>
                        </div>
                        @if ($orders->status == 'Pending')
                        <div class="col-lg-6">
                            <label for="name">Order Status :</label>
                            <span class="badge" style="background: rgb(68, 71, 66); color:white; font-size:14px;">
                                {{ ucwords($orders->status) }}</span>
                        </div>
                        @endif
                        @if ($orders->status == 'Confirm')
                            <div class="col-lg-6">
                                <label for="name">Order Status :</label>
                                <span class="badge" style="background: #20adc0; color:white;font-size:14px;">
                                    {{ ucwords($orders->status) }}</span>
                            </div>
                        @endif
                        @if ($orders->status == 'Processing')
                        <div class="col-lg-6">
                            <label for="name">Order Status :</label>
                            <span class="badge" style="background: #4e2c85; color:white;font-size:14px;">
                            {{ ucwords($orders->status) }}</span>
                        </div>
                        @endif
                        @if ($orders->status == 'Picked')
                            <div class="col-lg-6">
                                <label for="name">Order Status :</label>
                                <span class="badge" style="background: #1dcc43; color:white;font-size:14px;">
                                {{ ucwords($orders->status) }}</span>
                            </div>
                        @endif
                        @if ($orders->status == 'Shipping')
                            <div class="col-lg-6">
                                <label for="name">Order Status :</label>
                                <span class="badge" style="background: #2410d3; color:white;font-size:14px;">
                                    {{ ucwords($orders->status) }}</span>
                            </div>
                        @endif
                        @if ($orders->status == 'Delivered')
                            <div class="col-lg-6">
                                <label for="name">Order Status :</label>
                                <span class="badge" style="background: #089914; color:white;font-size:14px;">
                                    {{ ucwords($orders->status) }}</span>
                            </div>
                        @endif
                        @if ($orders->status == 'Cancel')
                            <div class="col-lg-6">
                                <label for="name">Order Status :</label>
                                <span class="badge" style="background: #f82307; color:white;font-size:14px;">
                                    {{ ucwords($orders->status) }}</span>
                            </div>
                        @endif
                        <div class="col-lg-12 mt-4">
                            @if($orders->status == 'Pending')
                            <a href="{{ url('admin/pending-to-confirm/'.$orders->id)}}" class="btn btn-success btn-block" id="pending"><span style=" color:white; font-size:18px;">CONFIRM ORDER</span></a>

                            <a href="{{ url('admin/pending-to-cancel/'.$orders->id)}}" class="btn btn-danger btn-block" id="cancel"><span style=" color:white; font-size:18px;">CANCEL ORDER</span></a>

                            @elseif($orders->status == 'Confirm')
                            <a href="{{ url('admin/confirm-to-processing/'.$orders->id) }}" class="btn btn-success btn-block" id="processing"><span style=" color:white; font-size:18px;">Processing Order</span></a>

                            @elseif($orders->status == 'Processing')
                            <a href="{{ url('admin/processing-to-picked/'.$orders->id) }}" class="btn btn-success btn-block" id="picked"><span style=" color:white; font-size:18px;">Picked Order</span></a>

                            @elseif($orders->status == 'Picked')
                            <a href="{{ url('admin/picked-to-shipped/'.$orders->id )}}" class="btn btn-success btn-block" id="shipped"><span style=" color:white; font-size:18px;">Shipped Order</span></a>

                            @elseif($orders->status == 'Shipping')
                            <a href="{{ url('admin/shipped-to-delivered/'.$orders->id) }}" class="btn btn-success btn-block" id="delivered"><span style=" color:white; font-size:18px;">Delivered Order</span></a>
                            @elseif($orders->status == 'Cancel')
                            <a href="{{ url('admin/cancel-order/'.$orders->id) }}" class="btn btn-success btn-block" id="delivered"><span style=" color:white; font-size:18px;">Cancel Orders</span></a>
                            @endif
                             <hr>
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                        <thead>
                            <tr>
                            <th class="text-center">Image</th>
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Product Code</th>
                            <th class="text-center">Color</th>
                            <th class="text-center">Size</th>
                            <th class="text-center">Qty</th>
                            <th class="text-center">Single Price</th>
                            <th class="text-center">Coupon Discount %</th>
                            <th class="text-center">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderItem as $item)
                            <tr>
                                <td class="text-center"><img src="{{ asset($item->product->product_thambnail) }}" alt="" width="60" height="60"></td>
                                <td class="text-center">{{ $item->product->product_name_en }}</td>
                                <td class="text-center">{{ $item->product->product_code }}</td>
                                @if($item->color == NULL)
                                <td class="text-center">---</td>
                                @else
                                <td class="text-center">{{ $item->color }}</td>
                                @endif
                                @if($item->size == NULL)
                                <td class="text-center">---</td>
                                @else
                                <td class="text-center">{{ $item->size }}</td>
                                @endif
                                <td class="text-center">{{ $item->qty }}</td>
                                <td class="text-center">{{ $item->price }} ৳</td>
                                <td class="text-center">{{ $item->price }} ৳</td>
                                <td class="text-center">{{ $item->price * $item->qty }} ৳</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h5 class="text-center float-right mr-5 mb-5"> Grand Total = <strong class="text-success">{{ $orders->amount }} ৳</strong> </h5>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

