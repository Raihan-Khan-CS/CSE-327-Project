@extends('layouts.frontend_master')

@section('frontend_content')
 <!-- Breadcrumb Area start -->
 <section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">My Order View</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>My view</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->
<!-- account area start -->

<section class="mb-3 mt-5" style="width: 90%; margin-left:5%">
    <div class="row d-flex">
        <div class="col-lg-2">
            @include('user.inc.leftbar')
        </div>

            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Shipping Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="name">Shipping Name :</label>
                                <strong>{{ $orders->name }}</strong>
                            </div>
                            <div class="col-lg-6">
                                <label for="name">Shipping Email :</label>
                                <strong>{{ $orders->email }}</strong>
                            </div>
                            <div class="col-lg-6">
                                <label for="name">Shipping Phone :</label>
                                <strong>{{ $orders->phone }}</strong>
                            </div>
                            <div class="col-lg-6">
                                <label for="name">Division Name :</label>
                                <strong>{{ $orders->division->division_name_en }}</strong>
                            </div>
                            <div class="col-lg-6">
                                <label for="name">District Name :</label>
                                <strong>{{ $orders->district->district_name_en }}</strong>
                            </div>
                            <div class="col-lg-6">
                                <label for="name">State Name: </label>
                                <strong>{{ $orders->state->state_name_en }}</strong>
                            </div>
                            <div class="col-lg-6">
                                <label for="name">Post Code: </label>
                                <strong>{{ $orders->post_code }}</strong>
                            </div>
                            <div class="col-lg-6">
                                <label for="name">Order Date: </label>
                                <strong>{{ $orders->order_date }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Order Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="name">Name :</label>
                                <strong>{{ $orders->user->name }}</strong>
                            </div>
                            <div class="col-lg-6">
                                <label for="name">Phone</label>
                                <strong>{{ $orders->user->phone }}</strong>
                            </div>
                            <div class="col-lg-6">
                                <label for="name">Payment By :</label>
                                <strong>{{ $orders->payment_method }}</strong>
                            </div>
                            <div class="col-lg-6">
                                <label for="name">Tnx id :</label>
                                <strong>{{ $orders->transaction_id }}</strong>
                            </div>
                            <div class="col-lg-6">
                                <label for="name">Invoice No :</label>
                                <strong>{{ $orders->invoice_no }}</strong>
                            </div>
                            <div class="col-lg-6">
                                <label for="name">Total Amount :</label>
                                <strong>{{ $orders->amount }} ৳</strong>
                            </div>
                            @if ($orders->status == 'Pending')
                            <div class="col-lg-6">
                                <label for="name">Order Status :</label>
                                <span class="badge badge-pill badge-primary" style="background: #e48f06; text:white; font-size:13px;">
                                {{ ucwords($orders->status) }}</span>
                            </div>
                            @endif

                            @if ($orders->status == 'Processing')
                            <div class="col-lg-6">
                                <label for="name">Order Status :</label>
                                <span class="badge badge-pill badge-primary" style="background: #4e2c85; text:white;font-size:13px;">
                                {{ ucwords($orders->status) }}</span>
                            </div>
                            @endif
                            @if ($orders->status == 'Confirm')
                                <div class="col-lg-6">
                                    <label for="name">Order Status :</label>
                                    <span class="badge badge-pill badge-primary" style="background: #20adc0; text:white;font-size:14px;">
                                        {{ ucwords($orders->status) }}</span>
                                </div>
                            @endif
                            @if ($orders->status == 'Picked')
                                <div class="col-lg-6">
                                    <label for="name">Order Status :</label>
                                    <span class="badge badge-pill badge-primary" style="background: #1dcc43; text:white;font-size:13px;">
                                    {{ ucwords($orders->status) }}</span>
                                </div>
                            @endif
                            @if ($orders->status == 'Shipping')
                                <div class="col-lg-6">
                                    <label for="name">Order Status :</label>
                                    <span class="badge badge-pill badge-primary" style="background: #2410d3; text:white;font-size:13px;">
                                        {{ ucwords($orders->status) }}</span>
                                </div>
                            @endif
                            @if ($orders->status == 'Delivered')
                                <div class="col-lg-6">
                                    <label for="name">Order Status :</label>
                                    <span class="badge badge-pill badge-primary" style="background: #089914; text:white;font-size:13px;">
                                        {{ ucwords($orders->status) }}</span>
                                </div>
                            @endif
                            @php
                            $order = App\Models\Order::where('id',$orders->id)->where('return_reason','!=',NULL)->first();
                            @endphp
                        @if($order)
                        <div class="col-lg-6">
                            <label for="name">Order:</label>
                            <span class="badge badge-pill badge-primary" style="background: #f82307; text:white;font-size:13px;">Return Requested</span>
                        </div>
                        @endif
                            @if ($orders->status == 'Cancel')
                                <div class="col-lg-6">
                                    <label for="name">Order Status :</label>
                                    <span class="badge badge-pill badge-primary" style="background: #f82307; text:white;font-size:13px;">
                                        {{ ucwords($orders->status) }}</span>
                                </div>
                            @endif
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
                                @if($orders->status == 'Delivered')
                                <th class="text-center">rating</th>
                                @endif
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

                                    @if($orders->status == 'Delivered')
                                    <td class="text-center"><a href="{{ url('user/review-create/'.$item->product_id) }}">write a review</a></td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <h5 class="text-center float-right mr-5 mb-5"> Grand Total = <strong class="text-success">{{ $orders->amount }} ৳</strong> </h5>
                    </div>
                </div>
            </div>
        </div>
        @if($orders->status !== 'Delivered')
        @else
        @php
            $order = App\Models\Order::where('id',$orders->id)->where('return_reason','=',NULL)->first();
        @endphp
        @if($order)
        <form action="{{ route('order.return.submit') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $orders->id }}">
            <div class="row">
                <div class="col-lg-12">
                    <label for="">Order Return Reason</label>
                    <textarea class="form-control" name="return_reason" cols="10" rows="5" placeholder="Order Return Reason type here....."></textarea>
                </div>
            </div>
            <button class="btn btn-danger mt-3" type="submit">Submit</button>
        </form>
        @else
        <h4 class="d-block text-center" style="background:red; color:#fff">You have send a Return Request</h4>
        @endif
        @endif
</section>
<!-- account area end -->
@endsection
