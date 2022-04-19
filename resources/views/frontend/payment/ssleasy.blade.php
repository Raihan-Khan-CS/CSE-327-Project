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
                    <h1 class="breadcrumb-hrading">SSL Easy Payment</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>SSL Easy Payment</li>
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
                <form method="POST" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="firstName">Full name :</label>
                            <input type="text" name="customer_name" readonly  class="form-control" style="color: #000;" id="customer_name" value="{{ $data['shipping_name'] }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="firstName">Mobail Number :</label>
                            <input type="text" name="customer_mobile" readonly class="form-control" style="color: #000;" id="mobile" value="{{ $data['shipping_phone'] }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="firstName">Email Address :</label>
                            <input type="text" name="customer_email" readonly class="form-control" style="color: #000;" id="email" value="{{ $data['shipping_email'] }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="firstName" >Post Code :</label>
                            <input type="text" name="post_code" id="post_code" readonly class="form-control" style="color: #000;" value="{{ $data['post_code'] }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="firstName" >Notes :</label>
                            <input type="text" name="notes" id="notes" readonly class="form-control" style="color: #000;" value="{{ $data['notes'] }}">
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="same-address">
                        <input type="hidden" value="{{ $total_amount }}" name="amount" id="total_amount" required/>

                        <input type="hidden" value="{{ $data['division_id'] }}" name="division_id" id="division_id"/>
                        <input type="hidden" value="{{ $data['district_id'] }}" name="district_id" id="district_id"/>
                        <input type="hidden" value="{{ $data['state_id'] }}" name="state_id" id="state_id"/>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                            token="if you have any token validation"
                            postdata="your javascript arrays or objects which requires in backend"
                            order="If you already have the transaction generated for current order"
                            endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- If you want to use the popup integration, -->

@endsection
    @section('ssleasy')
        {{-- SSL easy checkout ar js code here --}}
        <script>
            var obj = {};
            obj.cus_name = $('#customer_name').val();
            obj.cus_phone = $('#mobile').val();
            obj.cus_email = $('#email').val();
            obj.post_code = $('#post_code').val();
            obj.notes = $('#notes').val();
            obj.cus_addr1 = $('#address').val();
            obj.amount = $('#total_amount').val();
            obj.division_id = $('#division_id').val();
            obj.district_id = $('#district_id').val();
            obj.state_id = $('#state_id').val();

            $('#sslczPayBtn').prop('postdata', obj);

            (function (window, document) {
                var loader = function () {
                    var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                    // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
                    script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
                    tag.parentNode.insertBefore(script, tag);
                };

                window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
            })(window, document);
        </script>
        <script>
            (function (window, document) {
                var loader = function () {
                    var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                    script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                    tag.parentNode.insertBefore(script, tag);
                };

                window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
            })(window, document);
        </script>
        {{-- SSL easy checkout ar js code here End Here--}}
    @endsection
