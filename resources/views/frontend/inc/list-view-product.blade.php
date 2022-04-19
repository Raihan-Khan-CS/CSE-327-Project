
    @foreach($products as $item)
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
@endforeach
