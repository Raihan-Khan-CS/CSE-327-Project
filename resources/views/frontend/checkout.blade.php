@extends('layouts.frontend_master')

@section('frontend_content')
@section('title')
    @if(session()->get('language') == 'bangla') চেকআউট @else Checkout @endif
@endsection
<!-- Breadcrumb Area start -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">Checkout Page</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->
<style>
    .nice-select .d-none{
        display: none;
    }
    .pro-details-color-wrap {
            font-size: 14px;
            font-weight: 700;
            color: #253237;
            margin-left: 50px;
        }
        .pro-details-color-wrap:first-child{
            margin-left: 0px;
        }
        .custom-select:focus {
            border-color: green;
            outline: 0;
            box-shadow: 0 0 0 .1rem rgba(51, 253, 0, 0.25);
        }
</style>
<!-- checkout area start -->
<div class="checkout-area mt-60px mb-40px">
    <div class="container">
        <form action="{{ route('checkout.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-7">
                    <div class="billing-info-wrap">
                        <h3>Shipping Details</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20px">
                                    <label>Name</label>
                                    <input type="text" placeholder="Enter Your Full Name" name="shipping_name" value="{{ Auth::user()->name }}" data-validation="required"/>
                                </div>
                                <div class="billing-info mb-20px">
                                    <label>Email</label>
                                    <input type="email" placeholder="Enter Email Address" name="shipping_email"  value="{{ Auth::user()->email }}" data-validation="required"/>
                                </div>
                                <div class="billing-info mb-20px">
                                    <label>Phone</label>
                                    <input type="text" placeholder="Enter Your Phone" name="shipping_phone"  value="{{ Auth::user()->phone }}" data-validation="required"/>
                                </div>
                                <div class="billing-info mb-20px">
                                    <label>Pose Code</label>
                                    <input type="text" name="post_code" placeholder="Enter Post Code" data-validation="required"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div>
                                    <label>Divison Name</label>
                                    <select name="division_id" class="custom-select d-block form-control" data-validation="required">
                                        <option label="Choose One" ></option>
                                        @foreach ($divisions as $row)
                                        <option value="{{ $row->id }}">{{ ucwords($row->division_name_en) }}</option>
                                        @endforeach
                                    </select>
                                    <div class="nice-select custom-select d-none open"></div>
                                    @error('division_id')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div>
                                    <label>District Name</label>
                                    <select class="custom-select d-block form-control" name="district_id" data-validation="required">
                                        <option label="Choose One" ></option>
                                    </select>
                                    <div class="nice-select custom-select d-none open"></div>
                                    @error('district_id')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div>
                                    <label>State / Thana Name</label>
                                    <select class="custom-select d-block form-control" name="state_id" data-validation="required">
                                        <option label="Choose One" ></option>
                                    </select>
                                    <div class="nice-select custom-select d-none open"></div>
                                    @error('state_id')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="additional-info-wrap">
                            <h4>Additional information</h4>
                            <div class="additional-info">
                                <label>Order notes</label>
                                <textarea placeholder="Notes about your order, e.g. special notes for delivery. " name="notes"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="your-order-area">
                        <h3>Your order</h3>
                        <div class="your-order-wrap gray-bg-4">
                            <div class="your-order-product-info">
                                <div class="your-order-top">
                                    <ul>
                                        <li>Product</li>
                                        <li>Total</li>
                                    </ul>
                                </div>
                                <div class="your-order-middle">
                                    <ul>
                                        @foreach ($carts as $item)
                                        <li><span class="order-middle-left">Product Image</span> <span class="order-price"><img src="{{ asset($item->options->image) }}" width="50" alt=""></span></li>
                                        @if($item->options->color_en == NULL)
                                        @else
                                            <li><span class="order-middle-left">Product Color</span> <span class="order-price">{{ $item->options->color_en }}</span></li>
                                        @endif
                                        @if($item->options->size_en == NULL)
                                        @else
                                            <li><span class="order-middle-left">Product Size</span> <span class="order-price">{{ $item->options->size_en }}</span></li>
                                        @endif
                                        <li><span class="order-middle-left">Price / Quantity :</span> <span class="order-price">{{ $item->price }} * {{ $item->qty }}</span></li>

                                        <li><span class="order-middle-left">subtotal :</span> <span class="order-price">= {{ $item->price * $item->qty }}</span></li>

                                        <hr>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="your-order-bottom">
                                    <ul>
                                        <li class="your-order-shipping">Shipping</li>
                                        <li>Free shipping</li>
                                    </ul>
                                </div>
                                <div class="your-order-total">
                                    @if(Session::has('coupon'))
                                    <ul>
                                        <li class="order-total">Subtotal</li>
                                        <li>{{ $cartTotal }} ৳</li>
                                    </ul>
                                    <ul>
                                        <li class="order-total">Coupon Discount :</li>
                                        <li>({{ Session::get('coupon')['coupon_discount'] }}%) - {{ Session::get('coupon')['coupon_amount'] }} ৳ </li>
                                    </ul>
                                    <ul>
                                        <li class="order-total">Grand Total :</li>
                                        <li>= {{ Session::get('coupon')['total_amount'] }} ৳</li>
                                    </ul>
                                    @else
                                    <ul>
                                        <li class="order-total">Subtotal</li>
                                        <li>{{ $cartTotal }} ৳</li>
                                    </ul>
                                    <ul>
                                        <li class="order-total">Grand Total</li>
                                        <li>{{ $cartTotal }} ৳</li>
                                    </ul>
                                    @endif
                                    <hr>
                                </div>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion element-mrg">
                                    <div class="panel-group" id="accordion">
                                        <h4 class="mb-2">Select Your Payment Method</h4>
                                        <div class="panel payment-accordion">
                                            <div id="method1" class="panel-collapse collapse show">
                                                <div class="panel-body">

                                                    <ul>
                                                        <li>
                                                            <input type="radio" name="payment_method" value="stripe">
                                                            <label for="">Stripe</label>
                                                            <img class="float-right" src="{{ asset('public/frontend') }}/assets/payment/mas.png" height="50px">
                                                        </li>
                                                        <li>
                                                            <input type="radio" name="payment_method" value="sslPayment">
                                                            <label for="">SSL Payment</label>
                                                            <img class="float-right" src="{{ asset('public/frontend') }}/assets/payment/pay.png" height="50px">
                                                        </li>
                                                        <li>
                                                            <input type="radio" name="payment_method" value="sslEasy">
                                                            <label for="">SSL Easy Payment</label>
                                                            <img class="float-right" src="{{ asset('public/frontend') }}/assets/payment/mobile.png" height="50px">
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            button:focus {
                                outline: 1px dotted;
                                outline: none;
                            }
                        </style>
                        <div class="Place-order mt-25">
                            <button type="submit" class="btn-hover" href="">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- checkout area end -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <script type="text/Javascript">
    $(document).ready(function() {
    $('select[name="division_id"]').on('change', function() {
        var division_id = $(this).val();
        if(division_id) {
            $.ajax({
                url: "{{ url('/user/district/ajax') }}/"+division_id,
                type: "GET",
                dataType:"json",
                success:function(data) {
                    $('select[name="state_id"]').empty();
                    var d =$('select[name="district_id"]').empty();
                    $.each(data, function(key, value){
                        $('select[name="district_id"]').append('<option value="'+ value.id +'">'+ value.district_name_en + '</option>');
                    });
                },
            });
        }else{
            alert('Please Select your Division Name');
        }
     });
///// State Show with Ajax
    $('select[name="district_id"]').on('change', function(){
        var district_id = $(this).val();
        if(district_id) {
            $.ajax({
                url: "{{ url('/user/state/ajax') }}/"+district_id,
                type: "GET",
                dataType:"json",
                success:function(data){
                    var d =$('select[name="state_id"]').empty();
                    $.each(data,function(key,value){
                        $('select[name="state_id"]').append('<option value ="'+value.id +'">' +value.state_name_en + '</option>');
                    });
                },
            });
        }else{
            alert('Please Select your District Name');
        }
     });
    });
</script>
@endsection
