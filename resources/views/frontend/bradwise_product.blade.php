@php
    function bn_price($str){
        $en = array(0,1,2,3,4,5,6,7,8,9);
        $bn = array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
        $str = str_replace($en, $bn, $str);
        return $str;
    }
@endphp
@extends('layouts.frontend_master')
{{-- @section('title')
@if(session()->get('language') == 'bangla') {{ $products->product_name_bn }}   @else {{ $products->product_name_en }} @endif
@endsection --}}
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
 <!-- Shop Category Area End -->
 <div class="shop-category-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
                <!-- Shop Top Area Start -->
                <div class="shop-top-bar">
                    <!-- Left Side start -->
                    <div class="shop-tab nav mb-res-sm-15">
                        <a href="#shop-1" data-toggle="tab">
                            <i class="fa fa-th show_grid"></i>
                        </a>
                        <a class="active" href="#shop-2" data-toggle="tab">
                            <i class="fa fa-list-ul"></i>
                        </a>
                        <p>There Are 17 Products.</p>
                    </div>
                    <!-- Left Side End -->
                    <!-- Right Side Start -->
                    <div class="select-shoing-wrap">
                        <div class="shot-product">
                            <p>Sort By:</p>
                        </div>
                        <div class="shop-select">
                            <select>
                                <option value="">Sort by newness</option>
                                <option value="">A to Z</option>
                                <option value=""> Z to A</option>
                                <option value="">In stock</option>
                            </select>
                        </div>
                    </div>
                    <!-- Right Side End -->
                </div>
                <!-- Shop Top Area End -->

                <!-- Shop Bottom Area Start -->
                <div class="shop-bottom-area mt-35">
                    <!-- Shop Tab Content Start -->
                    <div class="tab-content jump">
                        <!-- Tab One Start -->
                        <div id="shop-1" class="tab-pane">
                            <div class="row">
                                @forelse($products as $item)
                                <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6 col-xs-12">
                                    <article class="list-product">
                                        <div class="img-block">
                                            @if(session()->get('language') == 'bangla')
                                            <a href="{{ url('single/product/'.$item->id.'/'.$item->product_slug_bn) }}" class="thumbnail">
                                                <img class="first-img" src="{{ asset($item->product_thambnail) }}" alt="" />
                                                <img class="second-img" src="{{ asset($item->secound_image) }}" alt="" /></a>
                                                @else
                                                <a href="{{ url('single/product/'.$item->id.'/'.$item->product_slug_en) }}" class="thumbnail">
                                                    <img class="first-img" src="{{ asset($item->product_thambnail) }}" alt="" />
                                                    <img class="second-img" src="{{ asset($item->secound_image) }}" alt="" /></a>
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
                                        <div class="product-decs">
                                            @if(session()->get('language') == 'bangla')
                                            <a class="inner-link" href="shop-4-column.html"><span>{{ $item->category->category_name_bn }}</span></a>
                                            @else
                                            <a class="inner-link" href="shop-4-column.html"><span>{{ $item->category->category_name_en }}</span></a>
                                             @endif
                                            @if(session()->get('language') == 'bangla')
                                            <h2><a href="{{ url('single/product/'.$item->id.'/'.$item->product_slug_bn) }}" class="product-link">{{ $item->product_name_bn }}</a></h2>
                                            @else
                                            <h2><a href="{{ url('single/product/'.$item->id.'/'.$item->product_slug_en) }}" class="product-link">{{ $item->product_name_en }}</a></h2>
                                            @endif
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
                                                @if(session()->get('language') == 'bangla')
                                                    <li class="cart"><a class="cart-btn" href="#"> কার্টে সংযুক্ত করুন</a></li>
                                                    @else
                                                    <li class="cart"><a class="cart-btn" href="#"> ADD TO CART</a></li>
                                                    @endif
                                                <li>
                                                    <a href="wishlist.html"><i class="ion-android-favorite-outline"></i></a>
                                                </li>
                                                <li>
                                                    <a href="compare.html"><i class="ion-ios-shuffle-strong"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </article>
                                </div>
                                @empty
                                <h1 class="badge badge badge-danger">Product Not found</h1>
                                @endforelse
                            </div>
                        </div>
                        <!-- Tab One End -->
                        <!-- Tab Two Start -->
                        <div id="shop-2" class="tab-pane active">
                            @forelse($products as $item)
                            <div class="shop-list-wrap mb-30px scroll-zoom">
                                <div class="row list-product m-0px">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                <div class="left-img">
                                                    <div class="img-block">
                                                        @if(session()->get('language') == 'bangla')
                                                        <a href="{{ url('single/product/'.$item->id.'/'.$item->product_slug_bn) }}" class="thumbnail">
                                                        <img class="first-img" src="{{ asset($item->product_thambnail) }}" alt="" />
                                                        <img class="second-img" src="{{ asset($item->secound_image) }}" alt="" /></a>
                                                        @else
                                                        <a href="{{ url('single/product/'.$item->id.'/'.$item->product_slug_en) }}" class="thumbnail">
                                                        <img class="first-img" src="{{ asset($item->product_thambnail) }}" alt="" />
                                                        <img class="second-img" src="{{ asset($item->secound_image) }}" alt="" /></a>
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
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                <div class="product-desc-wrap">
                                                    <div class="product-decs">
                                                        @if(session()->get('language') == 'bangla')
                                                        <a class="inner-link" href="shop-4-column.html"><span>{{ $item->category->category_name_bn }}</span></a>
                                                        @else
                                                        <a class="inner-link" href="shop-4-column.html"><span>{{ $item->category->category_name_en }}</span></a>
                                                         @endif
                                                        @if(session()->get('language') == 'bangla')
                                                        <h2><a href="{{ url('single/product/'.$item->id.'/'.$item->product_slug_bn) }}" class="product-link">{{ $item->product_name_bn }}</a></h2>
                                                        @else
                                                        <h2><a href="{{ url('single/product/'.$item->id.'/'.$item->product_slug_en) }}" class="product-link">{{ $item->product_name_en }}</a></h2>
                                                        @endif
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
                                                                @if(session()->get('language')== 'bangla')
                                                                <li class="old-price not-cut">{{ bn_price($item->selling_price) }} ৳</li>
                                                                @else
                                                                <li class="old-price not-cut">{{ $item->selling_price }} ৳</li>
                                                                @endif
                                                                @else
                                                                @if(session()->get('language')== 'bangla')
                                                                <li class="old-price not-cut" style="color:red;"><del> {{ bn_price($item->selling_price) }} ৳</del></li>
                                                                @else
                                                                <li class="old-price not-cut" style="color:red;"><del> {{ $item->selling_price }} ৳</del></li>
                                                                @endif
                                                                @if(session()->get('language')== 'bangla')
                                                                <li class="old-price not-cut">{{ bn_price($item->discount_price) }} ৳</li>
                                                                @else
                                                                <li class="old-price not-cut">{{ $item->discount_price }} ৳</li>
                                                                @endif
                                                                @endif
                                                            </ul>
                                                        </div>
                                                        <div class="product-intro-info">
                                                            @if(session()->get('language')== 'bangla')
                                                            <p> <strong class="text-danger">প্রোডাক্ট বিবরন :</strong> {{ $item->long_descp_bn }}</p>
                                                            @else
                                                            <p> <strong class="text-danger">Product Descption :</strong> : {{ $item->long_descp_en }}</p>
                                                            @endif
                                                        </div>
                                                        <div class="in-stock">Availability: <span>({{ $item->product_qty }}) In Stock</span></div>
                                                    </div>
                                                    <div class="add-to-link">
                                                        <ul>
                                                            @if(session()->get('language') == 'bangla')
                                                            <li class="cart"><a class="cart-btn" href="#"> কার্টে সংযুক্ত করুন</a></li>
                                                            @else
                                                            <li class="cart"><a class="cart-btn" href="#"> ADD TO CART</a></li>
                                                            @endif
                                                            <li>
                                                                <a href="wishlist.html"><i class="ion-android-favorite-outline"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html"><i class="ion-ios-shuffle-strong"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <h1 class="badge badge badge-danger">Product Not found</h1>
                                @endforelse
                        </div>
                        <!-- Tab Two End -->
                    </div>
                    <!-- Shop Tab Content End -->
                    <style>.pagination {
                        display: inline-flex;;
                    }
                    </style>
                    <!--  Pagination Area Start -->
                    <div class="pro-pagination-style text-center">
                        <ul>
                            {{ $products->links() }}
                            {{-- <li>
                                <a class="prev" href="#"><i class="ion-ios-arrow-left"></i></a>
                            </li>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li>
                                <a class="next" href="#"><i class="ion-ios-arrow-right"></i></a>
                            </li> --}}
                        </ul>
                    </div>
                    <!--  Pagination Area End -->
                </div>
                <!-- Shop Bottom Area End -->
            </div>
            <!-- Sidebar Area Start -->
         @include('frontend.inc.leftbar')
            <!-- Sidebar Area End -->
        </div>
    </div>
</div>
@endsection
