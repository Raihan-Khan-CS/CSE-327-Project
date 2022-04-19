@extends('layouts.frontend_master')

@section('frontend_content')
@section('title')
    @if(session()->get('language') == 'bangla') উইশলিস্ট @else Wishlist @endif
@endsection
 <!-- Breadcrumb Area start -->
  <!-- Breadcrumb Area start -->
  <section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">Wishlist Page</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="index.html">Home</a></li>
                        <li>Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->
<style>
    .product-wishlist-cart button:hover{
        background: red;
        color: #ffffff
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
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Add To Cart</th>
                                </tr>
                            </thead>
                            <tbody id="wishlist">
                            </tbody>

                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- cart area end -->
@endsection
