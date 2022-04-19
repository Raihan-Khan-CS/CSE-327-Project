        @foreach($products as $item)
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
        @endforeach

