@extends('layouts.frontend_master')
@section('frontend_content')
@section('title')
    @if(session()->get('language') == 'bangla') এস এস এল হোস্টটেট পেমেন্ট @else SSL Hosted Payment @endif
@endsection
<!-- Breadcrumb Area start -->
     <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">SSL Hosted Payment</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>SSL Hosted Payment</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->
<div class="checkout-area mt-60px mb-40px">
    <div class="container">
        <div class="row">
            <div class="col-md-5 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">{{ $cartQty }}</span>
                </h4>
                <ul class="list-group mb-3">
                    @foreach ($carts as $item)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{ $item->name }}</h6>
                            <small class="text-muted mt-4"><img src="{{ asset($item->options->image) }}" height="60" width="60" alt=""></small>
                        </div>
                        @if($item->options->color_en == NULL)
                        @else
                        <div>
                            <h6 class="my-0">Color</h6>
                            <span class="text-muted mt-4">{{ $item->options->color_en }}</span>
                        </div>
                        @endif
                        @if($item->options->size_en == NULL)
                        @else
                        <div>
                            <h6 class="my-0">Size</h6>
                            <span class="text-muted mt-4">{{ $item->options->size_en }}</span>
                        </div>
                        @endif
                        <span class="text-muted">Price/Qty = {{ $item->price }} * {{ $item->qty }}</span>
                    </li>
                    @endforeach
                    @if(Session::has('coupon'))
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Subtotal Total (BDT)</span>
                        <strong>{{ $cartTotal }} ৳</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Coupon Discount</span>
                        <strong>({{ Session::get('coupon')['coupon_discount'] }}%) - {{ Session::get('coupon')['coupon_amount'] }} ৳ </strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Grand Total (BDT)</span>
                        <strong>= {{ Session::get('coupon')['total_amount'] }} ৳</strong>
                    </li>
                    @else
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (BDT)</span>
                        <strong>{{ $total_amount }} TK</strong>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="col-md-7 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                    <input type="hidden" value="{{ $total_amount }}" name="amount" id="total_amount" required/>

                    <input type="hidden" value="{{ $data['shipping_name'] }}" name="name"/>
                    <input type="hidden" value="{{ $data['shipping_email'] }}" name="email"/>
                    <input type="hidden" value="{{ $data['shipping_phone'] }}" name="phone"/>
                    <input type="hidden" value="{{ $data['post_code'] }}" name="post_code"/>
                    <input type="hidden" value="{{ $data['notes'] }}" name="notes"/>
                    <input type="hidden" value="{{ $data['division_id'] }}" name="division_id"/>
                    <input type="hidden" value="{{ $data['district_id'] }}" name="district_id"/>
                    <input type="hidden" value="{{ $data['state_id'] }}" name="state_id"/>
                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="same-address">
                        <label class="custom-control-label" for="same-address">Shipping address is the same as my billing
                            address</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="save-info">
                        <label class="custom-control-label" for="save-info">Save this information for next time</label>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
