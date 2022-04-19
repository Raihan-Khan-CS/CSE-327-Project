
@php
    function bn_price($str){
        $en = array(0,1,2,3,4,5,6,7,8,9);
        $bn = array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
        $str = str_replace($en, $bn, $str);
        return $str;
    }
@endphp
@extends('layouts.frontend_master')
@section('title')
@if(session()->get('language') == 'bangla') {{ $product->product_name_bn }} @else {{ $product->product_name_en }} @endif
@endsection
@section('bootstrap')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
@endsection
@section('frontend_content')
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">
                        @if(session()->get('language')== 'bangla')
                        সিঙ্গেল প্রোডাক্ট
                        @else
                        Single Product
                        @endif
                    </h1>
                    <ul class="breadcrumb-links">
                        <li><a href="{{ url('/') }}">
                            @if(session()->get('language')== 'bangla')
                            হোম
                            @else
                            Home
                            @endif
                            </a></li>
                        <li>
                            @if(session()->get('language')== 'bangla')
                            সিঙ্গেল প্রোডাক্ট গ্যালারী
                            @else
                            Single product Gallery
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop details Area start -->
<section class="product-details-area mtb-60px">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="product-details-img product-details-tab">
                    <div class="zoompro-wrap zoompro-2">
                        <div class="zoompro-border zoompro-span">
                            <img class="zoompro" src="{{ asset($product->product_thambnail) }}" data-zoom-image="{{ asset($product->product_thambnail) }}" alt="" />
                        </div>
                    </div>
                    <div id="gallery" class="product-dec-slider-2">
                        @foreach ($multiImgs as $img)
                        <a data-image="{{ asset($img->image_name) }}">
                            <img src="{{ asset($img->image_name) }}" alt="" />
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="product-details-content">
                    @if(session()->get('language')== 'bangla')
                        <h2 id="pname_en">{{ $product->product_name_bn }}</h2>
                        @else
                        <h2 id="pname_en">{{ $product->product_name_en }}</h2>
                        @endif
                    <div class="pro-details-rating-wrap">
                        <div class="rating-product">
                            @for($i = 1; $i < 6; $i++)
                            <span style="color: red" class="glyphicon glyphicon-star{{ ($i<=$avgRating)? '': '-empty' }}"></span>
                            @endfor
                            <h4 class="mt-3">Avg : Rating {{ $avgRating }}</h4>
                        </div>
                        <span class="read-review"><a class="reviews" href="#">Read reviews ({{ $count }})</a></span>
                    </div>
                    <div class="pricing-meta">
                        <ul>
                            @if($product->discount_price == NULL)
                                @if(session()->get('language')== 'bangla')
                                    <li class="old-price not-cut">{{ bn_price($product->selling_price) }} ৳</li>
                                    <span class="badge badge-success">নতুন</span>
                                @else
                                    <li class="old-price not-cut">{{ $product->selling_price }} ৳</li>
                                    <span class="badge badge-success">new</span>
                                @endif
                            @else
                                @if(session()->get('language')== 'bangla')
                                    <li class="old-price not-cut" style="color:red;"><del> {{ bn_price($product->selling_price) }} ৳</del></li>
                                @else
                                    <li class="old-price not-cut" style="color:red;"><del> {{ $product->selling_price }} ৳</del></li>
                                @endif
                                @if(session()->get('language')== 'bangla')
                                    <li class="old-price not-cut">{{ bn_price($product->discount_price) }} ৳</li>
                                @else
                                    <li class="old-price not-cut">{{ $product->discount_price }} ৳</li>
                                @endif
                            @endif
                        </ul>
                    </div>
                    <p>
                        @if(session()->get('language')== 'bangla')
                        বিবরন :
                        {{ $product->short_descp_bn }}
                        @else
                        Description :
                        {{ $product->short_descp_en }}
                        @endif
                    </p>
                    <div class="pro-details-list">
                    </div>
                    <style>
                        .product-size .nice-select {
                            width: 115px;
                        }
                    </style>
                    <div class="pro-details-size-color d-flex">
                        <div class="product-size">
                            @if ($product->product_color_en == NULL)
                            @else
                            <span>
                                @if(session()->get('language')== 'bangla')
                                    কালার পছন্দ করুন
                                    @else
                                    Select color
                                    @endif
                            </span>
                            <select id="color_en">
                                <option value="">
                                    @if(session()->get('language')== 'bangla')
                                    পছন্দ করুন
                                    @else
                                    Select
                                    @endif
                                </option>
                                @if(session()->get('language')== 'bangla')
                                    @foreach ($product_bn as $color)
                                        <option value="{{ $color }}">{{ $color }}</option>
                                    @endforeach
                                @else
                                    @foreach ($product_en as $color)
                                        <option value="{{ $color }}">{{ ucwords($color) }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @endif
                        </div>
                        <div class="product-size">
                            @if ($product->product_size_en == NULL)
                            @else
                                <span>
                                    @if(session()->get('language')== 'bangla')
                                    সাইজ পছন্দ করুন
                                        @else
                                        Select Size
                                        @endif
                                </span>
                            <select id="size_en">
                                <option value="">
                                    @if(session()->get('language')== 'bangla')
                                    পছন্দ করুন
                                    @else
                                    Select
                                    @endif
                                </option>
                                @if(session()->get('language')== 'bangla')
                                    @foreach ($product_size_bn as $size)
                                        <option value="{{ $size }}">{{ $size }}</option>
                                    @endforeach
                                @else
                                    @foreach ($product_size_en as $size)
                                        <option value="{{ $size }}">{{ $size }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @endif
                        </div>
                    </div>
                    <div class="pro-details-quality mt-4">
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" id="qty" type="text" name="qtybutton" value="1" min="1" />
                        </div>
                        <div class="pro-details-cart btn-hover">
                            @if(session()->get('language')== 'bangla')
                            <input type="hidden" id="product_id" value="{{ $product->id }}">
                            <button type="submit" onclick="addtoCard()"> কার্টে সংযুক্ত করুন</button>
                            @else
                            <input type="hidden" id="product_id" value="{{ $product->id }}">
                                <button type="submit" onclick="addtoCard()"> + Add To Cart</button>
                            @endif
                        </div>
                    </div>
                    <div class="pro-details-wish-com">
                        <div class="pro-details-wishlist">
                            <a href="#"><i class="ion-android-favorite-outline"></i>
                                @if(session()->get('language')== 'bangla')
                                উইশলিস্টে যোগকরুন
                                @else
                                Add to wishlist
                                @endif
                            </a>
                        </div>
                    </div>
                    <div class="pro-details-social-info">
                        <span>Share</span>
                        <div class="social-info">
                            <div class="sharethis-inline-share-buttons" data-href="{{ Request::url() }}"></div>
                        </div>
                    </div>
                    <div class="pro-details-policy">
                        <ul>
                            <li><img src="{{ asset('public/frontend') }}/assets/images/icons/policy.png" alt="" /><span>Security Policy (Edit With Customer Reassurance Module)</span></li>
                            <li><img src="{{ asset('public/frontend') }}/assets/images/icons/policy-2.png" alt="" /><span>Delivery Policy (Edit With Customer Reassurance Module)</span></li>
                            <li><img src="{{ asset('public/frontend') }}/assets/images/icons/policy-3.png" alt="" /><span>Return Policy (Edit With Customer Reassurance Module)</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
            <!-- Shop details Area End -->
<!-- product details description area start -->
<div class="description-review-area mb-60px">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav">
                <a data-toggle="tab" href="#des-details1">
                    @if(session()->get('language')== 'bangla')
                    বিবরন
                    @else
                    Description
                    @endif

                </a>
                <a class="active" data-toggle="tab" href="#des-details2">
                    @if(session()->get('language')== 'bangla')
                        প্রোডাক্ট বিস্তারিত
                    @else
                    Product Details
                    @endif

                </a>
                <a data-toggle="tab" href="#des-details3">
                    @if(session()->get('language')== 'bangla')
                    রিভিউ
                    @else
                    Reviews ({{ $count }})
                    @endif
                </a>
                <a data-toggle="tab" href="#des-details4">
                    @if(session()->get('language')== 'bangla')
                    কমেন্টস
                    @else
                    Comments
                    @endif
                </a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details2" class="tab-pane active">
                    <div class="product-anotherinfo-wrapper">
                        <ul>
                            <li><span>
                                @if(session()->get('language')== 'bangla')
                                কালার :
                                @else
                                Color :
                                @endif
                            </span>
                            @if(session()->get('language')== 'bangla')
                            {{ $product->product_color_bn }}
                            @else
                            {{ $product->product_color_en }}

                            @endif
                            </li>
                            <li><span>
                                @if(session()->get('language')== 'bangla')
                                সাইজ :
                                @else
                                Size :
                                @endif
                                </span>
                                @if(session()->get('language')== 'bangla')
                                {{ $product->product_size_bn }}
                                @else
                                {{ $product->product_size_en }}
                                @endif
                            </li>
                            <li><span>
                                @if(session()->get('language')== 'bangla')
                                প্রোডাক্ট কোড :
                                @else
                                Product Code
                                @endif
                            </span>
                            {{ $product->product_code }}
                            </li>
                            <li><span>
                                @if(session()->get('language')== 'bangla')
                                প্রোডাক্টের পরিমান :
                                @else
                                Product Quantity :
                                @endif
                            </span>
                                @if($product->product_qty == 0)
                                <span class="badge badge badge-warning">Not available</span>
                                @else
                                Available
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="des-details1" class="tab-pane">
                    <div class="product-description-wrapper">
                        <p>
                            @if(session()->get('language')== 'bangla')
                            {{ $product->long_descp_bn }}
                            @else
                            {{ $product->long_descp_en }}
                            @endif
                        </p>
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <div class="row">
                        <div class="col-lg-7">
                            @foreach ($productReview as $item)
                            <div class="review-wrapper">
                                <div class="single-review">
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>{{ $item->user->name }}</h4>
                                                </div>

                                                <div class="rating-product">
                                                    @for($i = 1; $i < 6; $i++)
                                                    <span style="color: red" class="glyphicon glyphicon-star{{ ($i<=$item->rating)? '': '-empty' }}"></span>
                                                    @endfor
                                                    &nbsp;&nbsp;<i class="fa fa-calendar"></i>&nbsp;&nbsp; {{ $item->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>{{ $item->comment }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         @endforeach
                        </div>
                        {{-- <div class="col-lg-5">
                            <div class="ratting-form-wrapper pl-50">
                                <h3>Add a Review</h3>
                                <div class="ratting-form">
                                    <form action="#">
                                        <div class="star-box">
                                            <span>Your rating:</span>
                                            <div class="rating-product">
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-10">
                                                    <input placeholder="Name" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-10">
                                                    <input placeholder="Email" type="email" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="rating-form-style form-submit">
                                                    <textarea name="Your Review" placeholder="Message"></textarea>

                                                    <input type="submit" value="Submit" />
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div id="des-details4" class="tab-pane">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="review-wrapper">
                                <div class="single-review">
                                    <div class="review-content">
                                    <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="8"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product details description area end -->
<!-- Recent Add Product Area Start -->
<section class="recent-add-area mt-30 mb-30px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Section Title -->
                <div class="section-title">
                        <h2>
                            @if(session()->get('language') == 'bangla')
                            একই ধরনের ক্যাটেগরি
                            @else
                            In The Same Category
                            @endif
                        </h2>
                    {{-- <p>16 other products in the same category:</p> --}}
                </div>
                <!-- Section Title -->
            </div>
        </div>
        <!-- Recent Product slider Start -->
        <div class="recent-product-slider owl-carousel owl-nav-style">
            <!-- Single Item -->
            @forelse ($catWiseProduct as $item)
            <article class="list-product">
                <div class="img-block">
                    @if(session()->get('language') == 'bangla')
                    <a href="{{ url('single/product/'.$item->id.'/'.$item->product_slug_bn) }}" class="thumbnail">
                        <img class="first-img" src="{{ asset($item->product_thambnail) }}" alt="" />
                        <img class="second-img" src="{{ asset($item->secound_image) }}" alt="" />
                    </a>
                    @else
                    <a href="{{ url('single/product/'.$item->id.'/'.$item->product_slug_en) }}" class="thumbnail">
                        <img class="first-img" src="{{ asset($item->product_thambnail) }}" alt="" />
                        <img class="second-img" src="{{ asset($item->secound_image) }}" alt="" />
                    </a>
                    @endif
                    <div class="quick-view">
                        <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                            <i class="ion-ios-search-strong"></i>
                        </a>
                    </div>
                </div>
                @php
                    $amount = $item->selling_price - $item->discount_price;
                    $discount = ($amount/$item->selling_price) * 100;
                @endphp
                <ul class="product-flag">
                    <ul class="product-flag">
                        @if($item->discount_price == NULL)
                            <li class="new">
                                @if(session()->get('language') == 'bangla')
                                    নতুন
                                @else
                                    NEW
                                @endif
                            </li>
                        @else
                        <li class="new" style="background: red;">
                            @if(session()->get('language') == 'bangla')
                                - {{bn_price(round($discount)) }} %
                            @else
                                - {{round($discount) }} %
                            @endif
                        </li>
                        @endif
                    </ul>
                </ul>
                <div class="product-decs">
                    <a class="inner-link" href="shop-4-column.html"><span>
                        @if(session()->get('language') == 'bangla')
                        {{ $item->brand->brand_name_bn }}
                        @else
                        {{ $item->brand->brand_name_en }}
                        @endif
                    </span></a>
                    <h2><a href="single-product.html" class="product-link">
                        @if(session()->get('language')== 'bangla')
                            {{ $item->product_name_bn }}
                            @else
                            {{ $item->product_name_en }}
                            @endif
                    </a></h2>
                    <div class="rating-product">
                        <i class="ion-android-star"></i>
                        <i class="ion-android-star"></i>
                        <i class="ion-android-star"></i>
                        <i class="ion-android-star"></i>
                        <i class="ion-android-star"></i>
                    </div>
                    <div class="pricing-meta">
                        <ul>
                            @if($item->discount_price == NULL)
                            @if(session()->get('language') == 'bangla')
                            <li class="current-price">{{ bn_price($item->selling_price) }}</li>
                            @else
                            <li class="current-price">{{ $item->selling_price }}</li>
                            @endif
                            @else
                            @if(session()->get('language') == 'bangla')
                            <li class="old-price">{{ bn_price($item->selling_price) }}</li>
                            @else
                            <li class="old-price">{{ $item->selling_price }}</li>
                            @endif
                            @if(session()->get('language') == 'bangla')
                            <li class="current-price">{{ bn_price($item->discount_price) }}</li>
                            @else
                            <li class="current-price">{{ $item->discount_price }}</li>
                            @endif
                            @endif
                            @php
                                $amount = $item->selling_price - $item->discount_price;
                                $discount = ($amount/$item->selling_price) * 100;
                            @endphp
                            <li class="discount-price">
                                @if($item->discount_price == NULL)
                                <span >
                                    @if(session()->get('language') == 'bangla')
                                    নতুন
                                    @else
                                    NEW
                                    @endif
                                </span>
                                @else
                                @if(session()->get('language') == 'bangla')
                                - {{ bn_price(round($discount))}} %
                                @else
                                - {{ round($discount )}} %
                                @endif
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="add-to-link">
                    <ul>
                        <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                        <li>
                            <a href="wishlist.html"><i class="ion-android-favorite-outline"></i></a>
                        </li>
                        <li>
                            <a href="compare.html"><i class="ion-ios-shuffle-strong"></i></a>
                        </li>
                    </ul>
                </div>
            </article>
            @empty
                <span class="badge badge-danger">Same Category are not Available</span>
            @endforelse
        </div>
        <!-- Recent product slider end -->
    </div>
</section>
<!-- Recent product area end -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v10.0&appId=489218352253782&autoLogAppEvents=1" nonce="WYpa8N1G"></script>

{{-- Share Social LInks Js --}}
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=60a529fe9c605400117b1975&product=inline-share-buttons" data-href="{{ Request::url() }}" async="async"></script>
@endsection

