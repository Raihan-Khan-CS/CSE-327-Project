
@php
    function bn_price($str){
        $en = array(0,1,2,3,4,5,6,7,8,9);
        $bn = array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
        $str = str_replace($en, $bn, $str);
        return $str;
    }
@endphp
@extends('layouts.frontend_master')

@php
$prodn = App\Models\Product::where('status',1)->latest()->first();
@endphp

@section('title')
    @if(session()->get('language') == 'bangla') ঔষধ লাগবে @else OSUD LAGBE @endif

@endsection
@section('active')
active show-sub
@endsection
@section('sub-active')
active
@endsection
{{-- @section('bootstrap')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
@endsection --}}
@section('social_links')
<meta property="og:title" content="{{ $prodn->product_name_en }}" />
<meta property="og:url" content="{{ Request::fullUrl() }}" />
<meta property="og:image" content="{{ URL::to($prodn->product_thambnail) }}" />
<meta property="og:description" content="{{ $prodn->short_descp_en }}" />
<meta property="og:site_name" content="OSUD LAGBE" />
@endsection
@section('frontend_content')
  <!-- Slider Arae Start -->
  <div class="slider-area">
    <div class="slider-active-3 owl-carousel slider-hm8 owl-dot-style">
        <!-- Slider Single Item Start -->
        @foreach ($slider as $slider)
            <div class="slider-height-6 d-flex align-items-start justify-content-start bg-img" style="background-image: url({{ asset($slider->slider_image) }})">
                <div class="container">
                    <div class="slider-content-5 slider-animated-1 text-left">
                        @if(session()->get('language') == 'bangla')
                            <span class="animated">{{ $slider->title_bn }}</span>
                        @else
                            <span class="animated">{{ $slider->title_en }}</span>
                        @endif
                        @if(session()->get('language') == 'bangla')
                            <h1 class="animated">{{ $slider->description_bn }}</h1>
                        @else
                            <h1 class="animated">{{ $slider->description_en }}</h1>
                        @endif
                        <a href="shop-4-column.html" class="shop-btn animated">SHOP NOW</a>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- Slider Single Item End -->
    </div>
</div>
<!-- Slider Arae End -->
<!-- Banner Area Start -->
<div class="banner-3-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-res-xs-30">
                <div class="banner-wrapper">
                    <a href="shop-4-column.html"><img src="{{ asset('public/frontend') }}/assets/images/banner-image/5.jpg" alt="" /></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="banner-wrapper mb-30px">
                    <a href="shop-4-column.html"><img src="{{ asset('public/frontend') }}/assets/images/banner-image/6.jpg" alt="" /></a>
                </div>
                <div class="banner-wrapper">
                    <a href="shop-4-column.html"><img src="{{ asset('public/frontend') }}/assets/images/banner-image/7.jpg" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Area End -->
<!-- Static Area Start -->
<section class="static-area mtb-60px">
    <div class="container">
        <div class="static-area-wrap">
            <div class="row">
                <!-- Static Single Item Start -->
                <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                    <div class="single-static pb-res-md-0 pb-res-sm-0 pb-res-xs-0">
                        <img src="{{ asset('public/frontend') }}/assets/images/icons/static-icons-1.png" alt="" class="img-responsive" />
                        <div class="single-static-meta">
                            <h4>Free Shipping</h4>
                            <p>On all orders over $75.00</p>
                        </div>
                    </div>
                </div>
                <!-- Static Single Item End -->
                <!-- Static Single Item Start -->
                <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                    <div class="single-static pb-res-md-0 pb-res-sm-0 pb-res-xs-0 pt-res-xs-20">
                        <img src="{{ asset('public/frontend') }}/assets/images/icons/static-icons-2.png" alt="" class="img-responsive" />
                        <div class="single-static-meta">
                            <h4>Free Returns</h4>
                            <p>Returns are free within 9 days</p>
                        </div>
                    </div>
                </div>
                <!-- Static Single Item End -->
                <!-- Static Single Item Start -->
                <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                    <div class="single-static pt-res-md-30 pb-res-sm-30 pb-res-xs-0 pt-res-xs-20">
                        <img src="assets/images/icons/static-icons-3.png" alt="" class="{{ asset('public/frontend') }}/img-responsive" />
                        <div class="single-static-meta">
                            <h4>100% Payment Secure</h4>
                            <p>Your payment are safe with us.</p>
                        </div>
                    </div>
                </div>
                <!-- Static Single Item End -->
                <!-- Static Single Item Start -->
                <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                    <div class="single-static pt-res-md-30 pb-res-sm-30 pt-res-xs-20">
                        <img src="{{ asset('public/frontend') }}/assets/images/icons/static-icons-4.png" alt="" class="img-responsive" />
                        <div class="single-static-meta">
                            <h4>Support 24/7</h4>
                            <p>Contact us 24 hours a day</p>
                        </div>
                    </div>
                </div>
                <!-- Static Single Item End -->
            </div>
        </div>
    </div>
</section>
<!-- Static Area End -->

<!-- Best Sells Area Start -->
<section class="best-sells-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2>
                        @if(session()->get('language') == 'bangla')
                        সর্বোচ্চ বিক্রেতা
                        @else
                        Best Sellers
                        @endif
                    </h2>
                    {{-- <p>Add bestselling products to weekly line up</p> --}}
                </div>
                <!-- Section Title Start -->
            </div>
        </div>
        <!-- Best Sell Slider Carousel Start -->
        <div class="best-sell-slider owl-carousel owl-nav-style">
            <!-- Single Item -->
            @foreach ($products as $product)
                <article class="list-product">
                    <div class="img-block">

                        @if(session()->get('language') == 'bangla')
                        <a href="{{ url('single/product/'.$product->id.'/'.$product->product_slug_bn) }}" class="thumbnail">
                            <img class="first-img" src="{{ asset($product->product_thambnail) }}" alt="" />
                            <img class="second-img" src="{{ asset($product->secound_image) }}" alt="" />
                        </a>
                        @else
                        <a href="{{ url('single/product/'.$product->id.'/'.$product->product_slug_en) }}" class="thumbnail">
                            <img class="first-img" src="{{ asset($product->product_thambnail) }}" alt="" />
                            <img class="second-img" src="{{ asset($product->secound_image) }}" alt="" />
                        </a>
                        @endif
                        <div class="quick-view">
                            <a class="quick_view" href="" data-link-action="quickview" id="{{ $product->id }}" onclick="productView(this.id)" title="Quick view" data-toggle="modal" data-target="#exampleModal" >
                                <i class="ion-ios-search-strong"></i>
                            </a>
                        </div>
                    </div>
                    @php
                        $amount = $product->selling_price - $product->discount_price;
                        $discount = ($amount/$product->selling_price) * 100;
                    @endphp
                    <ul class="product-flag">
                        @if($product->discount_price == NULL)
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
                        <strong class="inner-link"><span>{{ $product->category->category_name_bn }}</span></strong>
                        @else
                        <strong class="inner-link" ><span>{{ $product->category->category_name_en }}</span></strong>
                        @endif
                        @if(session()->get('language') == 'bangla')
                            <h2><a href="{{ url('single/product/'.$product->id.'/'.$product->product_slug_bn) }}" class="product-link">{{ $product->product_name_bn }}</a></h2>
                        @else
                            <h2><a href="{{ url('single/product/'.$product->id.'/'.$product->product_slug_en) }}" class="product-link">{{ $product->product_name_en }}</a></h2>
                        @endif
                        <div class="rating-product">

                        @if(App\Models\ProductReview::where('product_id',$product->id)->first())
                            @php
                                $productReview = App\Models\ProductReview::where('product_id',$product->id)->where('status','approve')->latest()->get();
                                $count = count($productReview);
                                $productRating = App\Models\ProductReview::where('product_id',$product->id)->where('status','approve')->avg('rating');
                                $avgRating = number_format($productRating,1);
                            @endphp
                            @for($i = 1; $i < 6; $i++)
                                <span style="color: red" class="glyphicon glyphicon-star{{ ($i<=$avgRating)? '': '-empty' }}"></span>
                            @endfor
                            ({{ $count }} Reviews )
                            @else
                                <span class="text-danger">No Review</span>
                            @endif
                        </div>
                        <div class="pricing-meta">
                            <ul>
                                @if($product->discount_price == NULL)
                                    @if(session()->get('language') == 'bangla')
                                        <li class="current-price">{{ bn_price($product->selling_price) }} ৳</li>
                                    @else
                                        <li class="current-price">{{ $product->selling_price }} ৳</li>
                                    @endif
                                @else
                                    @if(session()->get('language') == 'bangla')
                                        <li class="old-price">{{ bn_price($product->selling_price )}} ৳</li>
                                    @else
                                        <li class="old-price">{{ $product->selling_price }}</li>
                                    @endif
                                    @if(session()->get('language') == 'bangla')
                                        <li class="current-price">{{ bn_price($product->discount_price) }} ৳</li>
                                    @else
                                        <li class="current-price">{{ $product->discount_price }} ৳</li>
                                    @endif
                                @endif
                                @php
                                     $amount = $product->selling_price - $product->discount_price;
                                    $discount = ($amount/$product->selling_price) * 100;
                                @endphp
                                @if($product->discount_price == NULL)

                                <li class="badge badge-success" style="font-size: 14px">
                                    @if(session()->get('language') == 'bangla')
                                    নতুন
                                    @else
                                    NEW
                                    @endif
                                </li>
                                @else
                                    <li class="discount-price">
                                        @if(session()->get('language') == 'bangla')
                                            - {{bn_price (round($discount)) }} %
                                        @else
                                            - {{ round($discount) }} %
                                        @endif
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="add-to-link">
                        <ul>
                            @if(session()->get('language') == 'bangla')
                            <li class="cart"><a class="cart-btn" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)">কার্টে সংযুক্ত করুন</a></li>
                            @else
                                <li class="cart"><a class="cart-btn" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> ADD TO CART</a></li>
                            @endif
                            <li>
                                <button id="{{ $product->id }}" onclick="addTowishlist(this.id)"><i class="ion-android-favorite-outline"></i></button>
                            </li>
                            <li>
                                <a href="compare.html"><i class="ion-ios-shuffle-strong"></i></a>
                            </li>
                        </ul>
                    </div>
                </article>
            @endforeach
        </div>
        <!-- Best Sell Slider Carousel End -->
    </div>
</section>
<!-- Best Sell Area End -->

<!-- Feature Area 2 Start -->
<section class="feature-area-2">
    <div class="container">
        <div class="row">
            <!-- left side -->
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="feature-left">
                    <img src="{{ asset('public/frontend') }}/assets/images/feature-bg/1.jpg" alt="" class="img-responsive" />
                </div>
            </div>
            <!-- right side -->
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <!-- Section Title -->
                <div class="section-title">
                    <h2>
                        @if(session()->get('language') == 'bangla')
                        বৈশিষ্ট্যযুক্ত পণ্য
                        @else
                        Featured Products
                        @endif
                    </h2>
                    {{-- <p>Add featured products to weekly line up</p> --}}
                </div>
                <!-- Section Title -->
                @php
                $features = DB::table('products')
                ->join('categories','products.category_id','categories.id')
                ->select('categories.category_name_en','categories.category_name_bn','products.*')
                ->where('products.status',1)->orderBy('id','DESC')->get();
            @endphp
                {{-- @php
                    $features = DB::table('products')
                    ->join('brands','products.brand_id','brands.id')
                    ->select('brands.brand_name_en','products.*')
                    ->where('products.status',1)->orderBy('id','DESC')->get();
                @endphp --}}
                <!-- Feature slide 2 start -->
                <div class="feature-slider-2 owl-carousel owl-nav-style">
                    @foreach ($features as $featured)
                    <!-- slngle item -->
                    <div class="feature-slider-item">
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="{{ url('single/product/'.$featured->id.'/'.$featured->product_slug_bn) }}" class="thumbnail">
                                        <img class="first-img" src="{{ asset($featured->product_thambnail) }}" alt="" />
                                        <img class="second-img" src="{{ asset($featured->secound_image) }}" alt="" />
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" id="{{ $featured->id }}" onclick="productView(this.id)" data-toggle="modal" data-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-decs">
                                <strong class="inner-link" href="shop-4-column.html"><span>
                                    @if(session()->get('language')== 'bangla')
                                    {{ $featured->category_name_bn }}
                                    @else
                                    {{ $featured->category_name_en }}
                                    @endif
                                </span></strong>
                                    @if(session()->get('language')== 'bangla')
                                    <h2><a href="{{ url('single/product/'.$featured->id.'/'.$featured->product_slug_bn) }}" class="product-link">{{ $featured->product_name_bn }}</a></h2>
                                    @else
                                        <h2><a href="{{ url('single/product/'.$featured->id.'/'.$featured->product_slug_en) }}" class="product-link">{{ $featured->product_name_en }}</a></h2>
                                    @endif
                                    <div class="rating-product">
                                        @if(App\Models\ProductReview::where('product_id',$featured->id)->first())
                                        @php
                                            $productReview = App\Models\ProductReview::where('product_id',$featured->id)->where('status','approve')->latest()->get();
                                            $count = count($productReview);
                                            $productRating = App\Models\ProductReview::where('product_id',$featured->id)->where('status','approve')->avg('rating');
                                            $avgRating = number_format($productRating,1);
                                        @endphp
                                        @for($i = 1; $i < 6; $i++)
                                            <span style="color: red" class="glyphicon glyphicon-star{{ ($i<=$avgRating)? '': '-empty' }}"></span>
                                        @endfor
                                        ({{ $count }} Reviews )
                                        @else
                                            <span class="text-danger">No Review</span>
                                        @endif
                                    </div>
                                    <style>
                                        .old-price {
                                            color: #111;
                                            font-size: 16px;
                                        }
                                    </style>
                                    <div class="pricing-meta">
                                        <ul>
                                            @if($featured->discount_price == NULL)
                                            @if(session()->get('language')== 'bangla')
                                            <li class="old-price not-cut">{{ bn_price($featured->selling_price) }} ৳</li>
                                            @else
                                            <li class="old-price not-cut">{{ $featured->selling_price }} ৳</li>
                                            @endif
                                            @else
                                            @if(session()->get('language')== 'bangla')
                                            <li class="old-price not-cut" style="color:red;"><del> {{ bn_price($featured->selling_price) }} ৳</del></li>
                                            @else
                                            <li class="old-price not-cut" style="color:red;"><del> {{ $featured->selling_price }} ৳</del></li>
                                            @endif
                                            @if(session()->get('language')== 'bangla')
                                            <li class="old-price not-cut">{{ bn_price($featured->discount_price) }} ৳</li>
                                            @else
                                            <li class="old-price not-cut">{{ $featured->discount_price }} ৳</li>
                                            @endif
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </article>
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src="{{ asset($featured->product_thambnail) }}" alt="" />
                                        <img class="second-img" src="{{ asset($featured->secound_image) }}" alt="" />
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-decs">
                                {{-- <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a> --}}
                                    <h2><a href="single-product.html" class="product-link">
                                        @if(session()->get('language')== 'bangla')
                                        {{ $featured->product_name_bn }}
                                        @else
                                        {{ $featured->product_name_en }}
                                        @endif
                                    </a></h2>
                                    <div class="rating-product">
                                        @if(App\Models\ProductReview::where('product_id',$featured->id)->first())
                                        @php
                                            $productReview = App\Models\ProductReview::where('product_id',$featured->id)->where('status','approve')->latest()->get();
                                            $count = count($productReview);
                                            $productRating = App\Models\ProductReview::where('product_id',$featured->id)->where('status','approve')->avg('rating');
                                            $avgRating = number_format($productRating,1);
                                        @endphp
                                        @for($i = 1; $i < 6; $i++)
                                            <span style="color: red" class="glyphicon glyphicon-star{{ ($i<=$avgRating)? '': '-empty' }}"></span>
                                        @endfor
                                        ({{ $count }} Reviews )
                                        @else
                                            <span class="text-danger">No Review</span>
                                        @endif
                                    </div>
                                    <style>
                                        .old-price {
                                            color: #111;
                                            font-size: 16px;
                                        }
                                    </style>
                                    <div class="pricing-meta">
                                        <ul>
                                            @if($featured->discount_price == NULL)
                                            @if(session()->get('language')== 'bangla')
                                            <li class="old-price not-cut">{{ bn_price($featured->selling_price) }} ৳</li>
                                            @else
                                            <li class="old-price not-cut">{{ $featured->selling_price }} ৳</li>
                                            @endif
                                            @else
                                            @if(session()->get('language')== 'bangla')
                                            <li class="old-price not-cut" style="color:red;"><del> {{ bn_price($featured->selling_price) }} ৳</del></li>
                                            @else
                                            <li class="old-price not-cut" style="color:red;"><del> {{ $featured->selling_price }} ৳</del></li>
                                            @endif
                                            @if(session()->get('language')== 'bangla')
                                            <li class="old-price not-cut">{{ bn_price($featured->discount_price) }} ৳</li>
                                            @else
                                            <li class="old-price not-cut">{{ $featured->discount_price }} ৳</li>
                                            @endif
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                <!-- Feature slide 2 End -->
            </div>
        </div>
    </div>
</section>
<!-- Feature area 2 End -->

<!-- Hot deal area Start -->
<section class="hot-deal-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Section Title -->
                <div class="section-title">
                    <h2>
                        @if(session()->get('language')== 'bangla')
                        হট ডিলস
                        @else
                        Hot Deals
                        @endif
                    </h2>
                    {{-- <p>Add hot products to weekly line up</p> --}}
                </div>
                <!-- Section Title -->
            </div>
        </div>
        @php
            $product = DB::table('products')
            ->join('categories','products.category_id','categories.id')
            ->select('categories.category_name_en','categories.category_name_bn','products.*')
            ->where('products.status',1) ->where('discount_price','=',NULL)->orderBy('id','DESC')->get();
        @endphp
        <!-- Hot Deal Slider 2 Start -->
        <div class="hot-deal-2 owl-carousel owl-nav-style">
            <!-- Single Item -->
            @foreach ($product as $item)
            <article class="list-product">
                <div class="hot-item-inner">
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
                            <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" id="{{ $item->id }}" onclick="productView(this.id)" data-toggle="modal" data-target="#exampleModal">
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

                <div class="product-wrapper">
                    <div class="product-decs">

                        <strong class="inner-link" href="shop-4-column.html"><span>
                            @if(session()->get('language') == 'bangla')
                            {{ $item->category_name_bn }}
                            @else
                             {{ $item->category_name_en }}
                             @endif

                        </span></strong>
                        @if(session()->get('language')== 'bangla')
                            <h2><a href="{{ url('single/product/'.$item->id.'/'.$item->product_slug_bn) }}" class="product-link">{{ $item->product_name_bn }}</a></h2>
                            @else
                            <h2><a href="{{ url('single/product/'.$item->id.'/'.$item->product_slug_en) }}" class="product-link">{{ $item->product_name_en }}</a></h2>
                        @endif
                        <div class="rating-product">
                            @if(App\Models\ProductReview::where('product_id',$item->id)->first())
                            @php
                                $productReview = App\Models\ProductReview::where('product_id',$item->id)->where('status','approve')->latest()->get();
                                $count = count($productReview);
                                $productRating = App\Models\ProductReview::where('product_id',$item->id)->where('status','approve')->avg('rating');
                                $avgRating = number_format($productRating,1);
                            @endphp
                            @for($i = 1; $i < 6; $i++)
                                <span style="color: red" class="glyphicon glyphicon-star{{ ($i<=$avgRating)? '': '-empty' }}"></span>
                            @endfor
                            ({{ $count }} Reviews )
                            @else
                                <span class="text-danger">No Review</span>
                            @endif
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
                        <div class="add-to-link">
                            <ul>
                                @if(session()->get('language') == 'bangla')
                                <li class="cart"><a class="cart-btn" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal" id="{{ $item->id }}" onclick="productView(this.id)">কার্টে সংযুক্ত করুন</a></li>
                                @else
                                <li class="cart"><a class="cart-btn" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal" id="{{ $item->id }}" onclick="productView(this.id)">ADD TO CART</a></li>
                                    @endif
                                <li>
                                    <button id="{{ $item->id }}" onclick="addTowishlist(this.id)"><i class="ion-android-favorite-outline"></i></button>
                                </li>
                                <li>
                                    <a href="compare.html"><i class="ion-ios-shuffle-strong"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="in-stock">Availability: <span>{{ $item->product_qty }} In Stock</span></div>
                    <div class="clockdiv">
                        <div class="title_countdown">Hurry Up! Offers ends in:</div>
                        <div data-countdown="2021/03/01"></div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
        <!-- Hot Deal Slider 2 Start -->
    </div>
</section>
<!-- Hot Deal Area End -->
<!-- Recent Add Product Area Start -->
<section class="recent-add-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Section Title -->
                <div class="section-title">
                    <h2>
                        @if(session()->get('language') == 'bangla')
                        নতুন পন্যসমূহ
                        @else
                        New Arrivals
                        @endif
                    </h2>
                    {{-- <p>Add new products to weekly line up</p> --}}
                </div>
                <!-- Section Title -->
            </div>
        </div>
        <!-- Recent Product slider Start -->
        <div class="recent-product-slider owl-carousel owl-nav-style">
            <!-- Product Single Item -->
            @foreach ($new_arraivals as $item)
            <div class="product-inner-item">
                <article class="list-product mb-30px">
                    <div class="img-block">
                        <a href="{{ url('single/product/'.$item->id.'/'.$item->product_slug_bn) }}" class="thumbnail">
                            <img class="first-img" src="{{ asset($item->product_thambnail) }}" alt="" />
                            <img class="second-img" src="{{ asset($item->secound_image) }}" alt="" />
                        </a>
                        <div class="quick-view">
                            <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" id="{{ $item->id }}" onclick="productView(this.id)" data-toggle="modal" data-target="#exampleModal">
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
                            <strong class="inner-link"><span>{{ $item->category_name_bn }}</span></strong>
                        @else
                            <strong class="inner-link"><span>{{ $item->category_name_en }}</span></strong>
                        @endif
                        @if(session()->get('language') == 'bangla')
                        <h2><a href="{{ url('single/product/'.$item->id.'/'.$item->product_slug_bn) }}" class="product-link">{{ $item->product_name_bn }}</a></h2>
                        @else
                        <h2><a href="{{ url('single/product/'.$item->id.'/'.$item->product_slug_en) }}" class="product-link">{{ $item->product_name_en }}</a></h2>
                        @endif
                        <div class="rating-product">
                            @if(App\Models\ProductReview::where('product_id',$item->id)->first())
                            @php
                                $productReview = App\Models\ProductReview::where('product_id',$item->id)->where('status','approve')->latest()->get();
                                $count = count($productReview);
                                $productRating = App\Models\ProductReview::where('product_id',$item->id)->where('status','approve')->avg('rating');
                                $avgRating = number_format($productRating,1);
                            @endphp
                            @for($i = 1; $i < 6; $i++)
                                <span style="color: red" class="glyphicon glyphicon-star{{ ($i<=$avgRating)? '': '-empty' }}"></span>
                            @endfor
                            ({{ $count }} Reviews )
                            @else
                                <span class="text-danger">No Review</span>
                            @endif
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
                                <li class="cart"><a class="cart-btn" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal" id="{{ $item->id }}" onclick="productView(this.id)">কার্টে সংযুক্ত করুন</a></li>
                                @else
                                <li class="cart"><a class="cart-btn" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal" id="{{ $item->id }}" onclick="productView(this.id)">ADD TO CART</a></li>
                                    @endif
                            <li>
                                <button id="{{ $item->id }}" onclick="addTowishlist(this.id)"><i class="ion-android-favorite-outline"></i></button>
                            </li>
                            <li>
                                <a href="compare.html"><i class="ion-ios-shuffle-strong"></i></a>
                            </li>
                        </ul>
                    </div>
                </article>
            </div>
            @endforeach
        </div>

        <!-- Recent Area Slider End -->
    </div>
</section>
<!-- Recent product area end -->
<!-- Category Wise Product Skip Section Start Here -->
<section class="recent-add-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Section Title -->
                <div class="section-title">
                    <h2>
                        @if(session()->get('language') == 'bangla')
                        {{ $category_skip_0->category_name_bn }}
                        @else
                        {{ $category_skip_0->category_name_en }}
                        @endif
                    </h2>
                    {{-- <p>Add new products to weekly line up</p> --}}
                </div>
                <!-- Section Title -->
            </div>
        </div>
        <!-- Recent Product slider Start -->
        <div class="recent-product-slider owl-carousel owl-nav-style">
            <!-- Product Single Item -->
            @foreach ($product_skip_0 as $item)
            <div class="product-inner-item">
                <article class="list-product mb-30px">
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
                            <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" id="{{ $item->id }}" onclick="productView(this.id)" data-toggle="modal" data-target="#exampleModal">
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
                        <strong class="inner-link" href=""><span>{{ $item->brand->brand_name_bn }}</span></strong>
                        @else
                        <strong class="inner-link" href=""><span>{{ $item->brand->brand_name_en }}</span></strong>
                        @endif
                        @if(session()->get('language') == 'bangla')
                            <h2><a href="{{ url('single/product/'.$item->id.'/'.$item->product_slug_bn) }}" class="product-link">{{ $item->product_name_bn }}</a></h2>
                            @else
                            <h2><a href="{{ url('single/product/'.$item->id.'/'.$item->product_slug_en) }}" class="product-link">{{ $item->product_name_en }}</a></h2>
                            @endif
                        <div class="rating-product">
                            @if(App\Models\ProductReview::where('product_id',$item->id)->first())
                            @php
                                $productReview = App\Models\ProductReview::where('product_id',$item->id)->where('status','approve')->latest()->get();
                                $count = count($productReview);
                                $productRating = App\Models\ProductReview::where('product_id',$item->id)->where('status','approve')->avg('rating');
                                $avgRating = number_format($productRating,1);
                            @endphp
                            @for($i = 1; $i < 6; $i++)
                                <span style="color: red" class="glyphicon glyphicon-star{{ ($i<=$avgRating)? '': '-empty' }}"></span>
                            @endfor
                            ({{ $count }} Reviews )
                            @else
                                <span class="text-danger">No Review</span>
                            @endif
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
                                <li class="cart"><a class="cart-btn" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal" id="{{ $item->id }}" onclick="productView(this.id)">কার্টে সংযুক্ত করুন</a></li>
                                @else
                                <li class="cart"><a class="cart-btn" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal" id="{{ $item->id }}" onclick="productView(this.id)">ADD TO CART</a></li>
                                    @endif
                            <li>
                                <button id="{{ $item->id }}" onclick="addTowishlist(this.id)"><i class="ion-android-favorite-outline"></i></button>
                            </li>
                            <li>
                                <a href="compare.html"><i class="ion-ios-shuffle-strong"></i></a>
                            </li>
                        </ul>
                    </div>
                </article>
            </div>
            @endforeach
        </div>

        <!-- Recent Area Slider End -->
    </div>
</section>

<!-- Category Wise Product Skip Section End Here -->



@endsection
