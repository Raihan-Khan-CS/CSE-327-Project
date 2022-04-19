@extends('layouts.frontend_master')

@section('frontend_content')
@section('title')
    @if(session()->get('language') == 'bangla') আমার কার্ট @else My Cart @endif
@endsection
 <!-- Breadcrumb Area start -->
 <section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">Cart Page</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="index.html">Home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->
<style>
    .product-remove button:hover{
        background: red;
        color: #ffffff;
    }
    .couponbtn:hover{
        background: red;
        color: #ffffff;
    }
</style>
<!-- cart area start -->
<div class="cart-main-area mtb-60px">
    <div class="container">
        <h3 class="cart-page-title">Your cart items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Until Price</th>
                                    <th>Color</th>
                                    <th>size</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="myCart">
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper" style="float: right">
                                <div class="cart-shiping-update" >
                                    <a  href="#">Continue Shopping</a>
                                </div>
                                {{-- <div class="cart-clear">
                                    <button>Update Shopping Cart</button>
                                    <a href="#">Clear Shopping Cart</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        @if(Session::has('coupon'))
                        @else
                        <div class="discount-code-wrapper" id="couponShowHide">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                            </div>
                            <div class="discount-code">
                                <p>Enter your coupon code if you have one.</p>
                                    <input class="form-control mb-3" style="border-color:none; box-shadow:none" class=" mb-3" type="text" id="coupon_name" placeholder="Coupon Apply"/>
                                    <button class="cart-btn-2" type="submit" onclick="couponApply()">Apply Coupon</button>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="grand-totall" id="couponCalField">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart area end -->
@endsection
