<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> @yield('title')</title>
        <!-- Favicon -->
        @yield('bootstrap')
        @yield('social_links')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800&display=swap">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/frontend') }}/assets/images/favicon/favicon.png" />

        {{-- Price Range Plugins --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />

        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.3.0/css/flat-ui.min.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
        <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/font-awesome.css">
        <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/vendor/plugins.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/style.min.css">
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> --}}
        <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/responsive.min.css">
    </head>
    <body class="home-3">
        <!-- main layout start from here -->
        <!--====== PRELOADER PART START ======-->
        {{-- <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div> --}}
        <!--====== PRELOADER PART ENDS ======-->
        <div id="main">
            <!-- Header Area Start  -->
            <header class="main-header">
                <!-- Header top Area Start  -->
                <div class="header-top-nav">
                    <div class="container-fluid">
                        <div class="row">
                            <!--Left Start-->
                            <div class="col-lg-4 col-md-4">
                                <div class="left-text">
                                    <p>
                                        @if(session()->get('language') == 'bangla')
                                        আপনাকে স্বাগতম
                                        @else
                                        Welcome you to OSUD LAGBE!
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <!--Left end-->
                            @php
                                $wishlist = App\Models\Wisthlisht::where('user_id', Auth::id())->latest()->get();
                            $count =count($wishlist);
                            @endphp
                            <!--Right Start-->
                            <div class="col-lg-8 col-md-8 text-right">
                                <div class="header-right-nav">
                                    <ul class="res-xs-flex" style="margin-top: -7px">
                                        <li >
                                            <a href="" data-link-action="quickview" id="orderTrack" title="Quick view" data-toggle="modal" data-target="#ordertraking" >
                                            <i class="ion-android-favorite-outline"></i>
                                                @if(session()->get('language') == 'bangla')
                                                অর্ডার ট্র্যাকিং
                                                @else
                                                Order Tracking
                                                @endif
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="res-xs-flex" style="margin-top: -7px">
                                        <li >
                                            <a  href="{{ route('wishlist') }}"><i class="ion-android-favorite-outline"></i>
                                                @if(session()->get('language') == 'bangla')
                                                উইশলিস্ট ({{ $count }})
                                                @else
                                                Wishlist ({{ $count }})
                                                @endif
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="res-xs-flex" style="margin-top: -7px">
                                        <li >
                                            @if(session()->get('language') == 'bangla')
                                            <a  href="{{ route('mycart') }}"><i class="fa fa-shopping-bag">আমার কার্ট</span></i></a>

                                            @else
                                            <a href="{{ route('mycart') }}"><i class="fa fa-shopping-bag"></i>My Cart </span></a>

                                                @endif
                                        </li>
                                    </ul>
                                    <div class="dropdown-navs">
                                        <ul>
                                            @auth
                                            <li class="dropdown">
                                                <a class="angle-icon" href="{{ url('home') }}"><i class="fa fa-user"></i>
                                                    @if(session()->get('language') == 'bangla')
                                                    আমার প্রোফাইল
                                                    @else
                                                    My Profile
                                                    @endif
                                                </a>
                                                <ul class="dropdown-nav">
                                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                                                     @if(session()->get('language') == 'bangla')
                                                     লগআউট
                                                     @else
                                                     Logout
                                                     @endif
                                                    </a></li>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </ul>
                                            </li>
                                                @else
                                            <!-- Settings Start  -->
                                            <li class="dropdown">
                                                <a class="angle-icon" href="{{ route('login') }}"><i class="fa fa-user"></i>
                                                    @if(session()->get('language') == 'bangla')
                                                    লগ-ইন
                                                    @else
                                                    Login
                                                    @endif
                                                </a>
                                            </li>

                                            <li class="dropdown">
                                                <a class="angle-icon" href="{{ route('register') }}"><i class="fas fa-user-circle"></i>
                                                    @if(Session()->get('language') == 'bangla')
                                                    রেজিস্টার
                                                    @else
                                                    Register
                                                    @endif
                                                </a>
                                            </li>
                                            @endauth
                                            <!-- Settings Start  -->
                                            <!-- Language Start -->
                                            <li class="top-10px" style="margin:0">
                                                <li class="dropdown">
                                                    <a class="angle-icon" href=""><i class="fa fa-user"></i>
                                                        @if(session()->get('language') == 'bangla')
                                                        ভাষা পরির্বতন করুন
                                                        @else
                                                        Language
                                                        @endif
                                                    </a>
                                                    <ul class="dropdown-nav">
                                                        @if(Session()->get('language') == 'bangla')
                                                        <li><a href="{{ route('english.language') }}"> <i class="fas fa-globe"></i>English</a></li>
                                                        @else
                                                        <li><a href="{{ route('bangla.language') }}">বাংলা</a></li>
                                                        @endif
                                                    </ul>
                                                </li>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Right end-->
                        </div>
                    </div>
                </div>
                <!-- Header top Area end  -->
                <div class="modal fade" id="ordertraking" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <strong class="d-flex">Order Tracking <h2 style="margin-top:-7px"></h2></strong>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('order.tracking') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-5 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="">Invoice No</label>
                                                <input type="text" class="form-control" name="invoice_on" placeholder="Invoice no">
                                            </div>
                                            <button type="submit" class="btn btn-success">Track now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header Navigation Area Start  -->
                <div class="header-navigation sticky-nav">
                    <div class="container-fluid">
                        <div class="row">
                            <!--  Logo Area Start-->
                            <div class="col-md-2 col-sm-2">
                                <div class="logo">
                                    <a  href="{{ url('/') }}"><img class="img-fluid" width="75%" height="auto" src="{{ asset('public/frontend') }}/assets/images/logo/osudlagbelogo.png" alt="" /></a>
                                </div>
                            </div>
                            <!--  Logo Area end-->
                            <div class="col-md-10 col-sm-10">
                                <div class="main-navigation d-none d-lg-block">
                                    <ul>
                                        <li class="menu-dropdown @yield('active')">
                                            <a href="#">
                                                @if(session()->get('language') == 'bangla')
                                                হোম
                                                @else
                                                Home
                                                @endif
                                                <i class="ion-ios-arrow-down"></i></a>

                                            <ul class="sub-menu">
                                                @php
                                                    $categories = App\Models\Category::orderBy('category_name_en','ASC')->get();
                                                @endphp
                                                @foreach ($categories as $category)
                                                    <li class="menu-dropdown position-static @yield('sub-active')">
                                                        @if(session()->get('language')== 'bangla')
                                                            <a href="#">{{ $category->category_name_bn }}<i class="ion-ios-arrow-down"></i></a>
                                                        @else
                                                            <a href="#">{{ $category->category_name_en }}<i class="ion-ios-arrow-down"></i></a>
                                                        @endif
                                                        @php
                                                             $subcategories = DB::table('subcategories')->where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
                                                        @endphp
                                                        <ul class="sub-menu sub-menu-2">
                                                            @foreach ($subcategories as $subcat)
                                                                @if(session()->get('language')== 'bangla')
                                                                    <li><a href="{{ url('sub-categorywise/product/'.$subcat->id.'/'.$subcat->subcategory_slug_bn) }}">{{ $subcat->subcategory_name_bn }}</a></li>
                                                                @else
                                                                    <li><a href="{{ url('sub-categorywise/product/'.$subcat->id.'/'.$subcat->subcategory_slug_en) }}">{{ $subcat->subcategory_name_en }}</a></li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="menu-dropdown">
                                            <a href="#">
                                                @if(session()->get('language') == 'bangla')
                                                শপ
                                                @else
                                                Shop
                                                @endif
                                                <i class="ion-ios-arrow-down"></i></a>

                                            <ul class="mega-menu-wrap">
                                                @foreach ($categories as $category)
                                                <li>
                                                    <ul>
                                                        @if(session()->get('language')== 'bangla')
                                                            <li class="mega-menu-title"><a href="{{ url('category/wise-product/'.$category->id.'/'.$category->category_slug_bn) }}">{{ $category->category_name_bn }}</a></li>
                                                        @else
                                                            <li class="mega-menu-title"><a href="{{ url('category/wise-product/'.$category->id.'/'.$category->category_slug_en) }}">{{ $category->category_name_en }}</a></li>
                                                        @endif
                                                        @php
                                                            $subcategories = DB::table('subcategories')->where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
                                                        @endphp
                                                        @foreach ($subcategories as $subcat)
                                                            @if(session()->get('language')== 'bangla')
                                                                <li><a href="{{ url('sub-categorywise/product/'.$subcat->id.'/'.$subcat->subcategory_slug_bn) }}">{{ $subcat->subcategory_name_bn }}</a></li>
                                                            @else
                                                                <li><a href="{{ url('sub-categorywise/product/'.$subcat->id.'/'.$subcat->subcategory_slug_en) }}">{{ $subcat->subcategory_name_en }}</a></li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @endforeach
                                                <li class="banner-wrapper">
                                                    <a href="single-product.html"><img src="{{ asset('public/frontend') }}/assets/images/banner-image/banner-menu.jpg" alt="" /></a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-dropdown">
                                            <a href="#">
                                                @if(session()->get('language') == 'bangla')
                                                পেইজ
                                                @else
                                                Pages
                                                @endif
                                                <i class="ion-ios-arrow-down"></i></a>
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('mycart') }}">Cart Page</a></li>
                                                <li><a href="{{ route('user.checkout') }}">Checkout Page</a></li>
                                                <li><a href="{{ route('login') }}">Login Page</a></li>
                                                <li><a href="{{ route('register') }}">Register Page</a></li>
                                                <li><a href="{{ url('/home') }}">Acount Page</a></li>
                                                <li><a href="{{ route('wishlist') }}">Wishlist Page</a></li>
                                            </ul>
                                        </li>
                                       
                                        <li><a href="{{ route('about.page') }}">
                                            About Us
                                            </a></li>
                                        <li><a href="{{route('contact.page')}}">
                                            @if(session()->get('language') == 'bangla')
                                            যোগাাযোগ
                                            @else
                                            Contact Us
                                            @endif
                                            </a></li>
                                    </ul>
                                </div>
                                <style>
                                    .search-category .nice-select .list {
                                            height: auto;
                                            left: 0%;
                                            box-shadow: 0 0 3.76px .24px rgba(197, 55, 55, 0.15);
                                        }
                                        .nice-select .option {
                                            padding-right: 56px;
                                            padding-left: 15px;
                                        }
                                        .header_account_list{
                                            position: relative;
                                        }
                                        #suggest-product{
                                            position: absolute;
                                            top: 100%;
                                            left: 0;
                                            width: 100%;
                                            z-index: 999;
                                            border-radius: 5px;
                                            margin-top: 15px;
                                            background: #ffffff;
                                        }
                                </style>
                                <!-- Main Navigation Area end -->
                                <div class="header_account_area">
                                    <!-- Search start -->
                                    <div class="header_account_list search_list">
                                        <a href="javascript:void(0)"><i class="ion-ios-search-strong"></i></a>
                                        <div class="dropdown_search">
                                            <form action="{{ route('search.products') }}" method="post">
                                                @csrf
                                                <input id="search_product" onfocus="showSearchProduct()" onblur="hideSearchProduct()" name="search_product" placeholder="Search entire store here ..." type="text" />
                                                {{-- <div class="search-category">
                                                    <select  name="">
                                                        <option>All categories</option>
                                                        @foreach ($categories as $category)
                                                        <a href="{{ url('admn') }}">
                                                            <option value="{{ $category->id }}">{{ ucwords($category->category_name_en )}}</option></a>
                                                        @endforeach
                                                    </select>
                                                </div> --}}
                                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                            </form>
                                            <div id="suggest-product"></div>
                                    </div>
                                    </div>
                                      <!--Contact info Start -->
                                      <div class="contact-link ml-3" >
                                        <div class="phone">
                                            <p style="color:white">Call us:</p>
                                            <a class="text-white" href="tel:01716448668">+88 01738 950 996</a>
                                        </div>
                                    </div>
                                    <!--Contact info End -->
                                    <!-- Search  End -->
                                    <style>
                                       .mini-cart-warp .count-cart{
                                        background: #253237;
                                        border: none;
                                        }
                                        button:focus {
                                            outline: none;
                                        }
                                    </style>
                                    <!-- cart info start  -->
                                    <div class="cart-info d-flex">
                                        <div class="mini-cart-warp">
                                            <button class="count-cart">
                                                <i class="fa fa-shopping-bag"></i>
                                                <div class="zuro">
                                                    <span id="cartQty"></span>
                                                </div>
                                                <span id="cartTotal"></span> Tk.
                                            </button>
                                            <div class="mini-cart-content">
                                                {{-- minicart start with ajax --}}
                                                <div id="miniCart">
                                                </div>
                                                {{-- minicart End with ajax --}}
                                                <div class="shopping-cart-total">
                                                    <h4 >Subtotal : <span id="cartTotal"></span> <span> TK &nbsp;</span></h4>
                                                    <h4>Shipping : <span>00</span></h4>
                                                    <h4>Taxes : <span>00</span></h4>
                                                    <h4 class="shop-total">Grand Total : <span id="cartTotal"></span></h4>
                                                </div>
                                                <div class="shopping-cart-btn text-center">
                                                    <a class="default-btn" href="{{ route('user.checkout') }}">checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- cart info  End -->
                                </div>
                            </div>
                        </div>
                        <!-- mobile menu -->
                        <div class="mobile-menu-area">
                            <div class="mobile-menu">
                                <nav id="mobile-menu-active">
                                    <ul class="menu-overflow">
                                        <li>
                                            <a href="index.html">HOME</a>
                                            <ul>
                                                <li>
                                                    <a href="#">Home Organic</a>
                                                    <ul>
                                                        <li><a href="index.html">Organic 1</a></li>
                                                        <li><a href="index-2.html">Organic 2</a></li>
                                                        <li><a href="index-3.html">Organic 3</a></li>
                                                        <li><a href="index-4.html">Organic 4</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Home Cosmetic</a>
                                                    <ul>
                                                        <li><a href="index-5.html">Cosmetic 1</a></li>
                                                        <li><a href="index-6.html">Cosmetic 2</a></li>
                                                        <li><a href="index-7.html">Cosmetic 3</a></li>
                                                        <li><a href="index-8.html">Cosmetic 4</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Home Digital</a>
                                                    <ul>
                                                        <li><a href="index-9.html">Digital 1</a></li>
                                                        <li><a href="index-10.html">Digital 2</a></li>
                                                        <li><a href="index-11.html">Digital 3</a></li>
                                                        <li><a href="index-12.html">Digital 4</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Home Furniture</a>
                                                    <ul>
                                                        <li><a href="index-13.html">Furniture 1</a></li>
                                                        <li><a href="index-14.html">Furniture 2</a></li>
                                                        <li><a href="index-15.html">Furniture 3</a></li>
                                                        <li><a href="index-16.html">Furniture 4</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Home Medical</a>
                                                    <ul>
                                                        <li><a href="index-17.html">Medical 1</a></li>
                                                        <li><a href="index-18.html">Medical 2</a></li>
                                                        <li><a href="index-19.html">Medical 3</a></li>
                                                        <li><a href="index-20.html">Medical 4</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Shop</a>
                                            <ul>
                                                <li>
                                                    <a href="#">Shop Grid</a>
                                                    <ul>
                                                        <li><a href="shop-3-column.html">Shop Grid 3 Column</a></li>
                                                        <li><a href="shop-4-column.html">Shop Grid 4 Column</a></li>
                                                        <li><a href="shop-left-sidebar.html">Shop Grid Left Sidebar</a></li>
                                                        <li><a href="shop-right-sidebar.html">Shop Grid Right Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Shop List</a>
                                                    <ul>
                                                        <li><a href="shop-list.html">Shop List</a></li>
                                                        <li><a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a></li>
                                                        <li><a href="shop-list-right-sidebar.html">Shop List Right Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Single Shop</a>
                                                    <ul>
                                                        <li><a href="single-product.html">Shop Single</a></li>
                                                        <li><a href="single-product-variable.html">Shop Variable</a></li>
                                                        <li><a href="single-product-affiliate.html">Shop Affiliate</a></li>
                                                        <li><a href="single-product-group.html">Shop Group</a></li>
                                                        <li><a href="single-product-tabstyle-2.html">Shop Tab 2</a></li>
                                                        <li><a href="single-product-tabstyle-3.html">Shop Tab 3</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Single Shop</a>
                                                    <ul>
                                                        <li><a href="single-product-slider.html">Shop Slider</a></li>
                                                        <li><a href="single-product-gallery-left.html">Shop Gallery Left</a></li>
                                                        <li><a href="single-product-gallery-right.html">Shop Gallery Right</a></li>
                                                        <li><a href="single-product-sticky-left.html">Shop Sticky Left</a></li>
                                                        <li><a href="single-product-sticky-right.html">Shop Sticky Right</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Pages</a>
                                            <ul>
                                                <li><a href="about.html">About Page</a></li>
                                                <li><a href="cart.html">Cart Page</a></li>
                                                <li><a href="checkout.html">Checkout Page</a></li>
                                                <li><a href="compare.html">Compare Page</a></li>
                                                <li><a href="login.html">Login & Regiter Page</a></li>
                                                <li><a href="my-account.html">Account Page</a></li>
                                                <li><a href="wishlist.html">Wishlist Page</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Blog</a>
                                            <ul>
                                                <li><a href="blog-grid-left-sidebar.html">Blog Grid Left Sidebar</a></li>
                                                <li><a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a></li>
                                                <li><a href="blog-list-left-sidebar.html">Blog List Left Sidebar</a></li>
                                                <li><a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li>
                                                <li><a href="blog-single-left-sidebar.html">Blog Single Left Sidebar</a></li>
                                                <li><a href="blog-single-right-sidebar.html">Blog Single Right Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- mobile menu end-->
                    </div>
                </div>
                <!--Header Bottom Account End -->
            </header>
            <!--  Main Header End -->


            @yield('frontend_content')


            <!-- Footer Area start -->
            <footer class="footer-area">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <!-- footer single wedget -->
                            <div class="col-md-6 col-lg-4">
                                <!-- footer logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img src="{{ asset('public/frontend') }}/assets/images/logo/osud-lagbe-footer-logo.png" alt="" /></a>
                                </div>
                                <!-- footer logo -->
                                <div class="about-footer">
                                    <p class="text-info">“Osud Lagbe” is a web-based ecommerce application where consumer can buy medicine through their online order. Here, we assure that everything our customers buy is 100% authentic. Availability of medicines at “Osud Lagbe” is never an issue because here our customers can find medicines for maximum disease.
                                    </p>
                                    <div class="need-help">
                                        <p class="phone-info">
                                            NEED HELP?
                                            <span>
                                                +88 01624 111 274 <br />
                                                +88 01516 720 942
                                            </span>
                                        </p>
                                    </div>
                                    <div class="social-info">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="ion-social-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-youtube"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-google"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-instagram"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- footer single wedget -->
                            <div class="col-md-6 col-lg-2 mt-res-sx-30px mt-res-md-30px">
                                <div class="single-wedge">
                                    <h4 class="footer-herading">Information</h4>
                                    <div class="footer-links">
                                        <ul>
                                            <li><a href="#">Delivery</a></li>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="#">Secure Payment</a></li>
                                            <li><a href="contact.html">Contact Us</a></li>
                                            <li><a href="#">Sitemap</a></li>
                                            <li><a href="#">Stores</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- footer single wedget -->
                            <div class="col-md-6 col-lg-2 mt-res-md-50px mt-res-sx-30px mt-res-md-30px">
                                <div class="single-wedge">
                                    <h4 class="footer-herading">Custom Links</h4>
                                    <div class="footer-links">
                                        <ul>
                                            <li><a href="#">Legal Notice</a></li>
                                            <li><a href="#">Prices Drop</a></li>
                                            <li><a href="#">New Products</a></li>
                                            <li><a href="#">Best Sales</a></li>
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="my-account.html">My Account</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- footer single wedget -->
                            <div class="col-md-6 col-lg-4 mt-res-md-50px mt-res-sx-30px mt-res-md-30px">
                                <div class="single-wedge">
                                    <h4 class="footer-herading">Newsletter</h4>
                                    <div class="subscrib-text">
                                        <p>You may unsubscribe at any moment. For that purpose, please find our contact info in the legal notice.</p>
                                    </div>
                                    <div id="mc_embed_signup" class="subscribe-form">
                                        <form
                                            id="mc-embedded-subscribe-form"
                                            class="validate"
                                            novalidate=""
                                            target="_blank"
                                            name="mc-embedded-subscribe-form"
                                            method="post"
                                            action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef"
                                        >
                                            <div id="mc_embed_signup_scroll" class="mc-form">
                                                <input class="email" type="email" required="" placeholder="Enter your email here.." name="EMAIL" value="" />
                                                <div class="mc-news" aria-hidden="true" style="position: absolute; left: -5000px;">
                                                    <input type="text" value="" tabindex="-1" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" />
                                                </div>
                                                <div class="clear">
                                                    <input id="mc-embedded-subscribe" class="button" type="submit" name="subscribe" value="Sign Up" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="img_app">
                                        <a href="#"><img src="{{ asset('public/frontend') }}/assets/images/icons/app_store.png" alt="" /></a>
                                        <a href="#"><img src="{{ asset('public/frontend') }}/assets/images/icons/google_play.png" alt="" /></a>
                                    </div>
                                </div>
                            </div>
                            <!-- footer single wedget -->
                        </div>
                    </div>
                </div>
                <!--  Footer Bottom Area start -->
                <div class="footer-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <p class="copy-text">Copyright © <a href="">OSUD LAGBE</a>. All Rights Reserved</p>
                            </div>
                            <div class="col-md-6 col-lg-8">
                                <img class="payment-img" src="{{ asset('public/frontend') }}/assets/images/icons/payment-bd.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                <!--  Footer Bottom Area End-->
            </footer>
            <!--  Footer Area End -->
        </div>

        {{-- model styleing --}}
        <style>
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
        .pro-details-color-wrap .d-block {
            display: block !important;
            width: 120px;
            }
        </style>
       <!-- Modal -->
       <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <strong class="d-flex">Product Name :&nbsp; <h2 id="pname_en" style="margin-top:-7px"></h2></strong>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <div class="tab-content quickview-big-img">
                                <div id="pro-1" class="tab-pane fade show active">
                                    <img id="product_thambnail" src=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="product-details-content quickview-content">

                                <span >Stock : <strong class="badge badge-success" id="available" style="font-size:13px;"></strong >
                                    <strong style="font-size:13px;" class="badge badge-danger" id="stockout"></strong>
                                </span><br>
                                <span >Category: <strong id="category_en"></strong ></span><br>
                                <span >Brand: <strong id="brand_en"></strong ></span>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut text-success" id="pprice"></li> Tk.
                                        <del id="oldprice" class="text-danger" style="font-size: 22px; margin-left:8px;"></del>
                                    </ul>
                                </div>
                                <span class="float-left mt-1 text-danger"> Description : &nbsp;</span>
                                <p  id="long_descp_en"></p>
                                <div class="pro-details-size-color d-flex">
                                    <div class="pro-details-color-wrap" id="color_area">
                                        <span>Color</span>
                                        <select class="custom-select d-block" class="form-control" data-placeholder="Select one" id="color_en">

                                        </select>
                                        <div class="nice-select custom-select d-none open"></div>
                                    </div>
                                    <div class="pro-details-color-wrap" id="size_area">
                                        <span>Size</span>
                                            <select class="custom-select d-block" class="form-control" data-placeholder="Select one" id="size_en" >
                                            </select>
                                            <div class="nice-select custom-select d-none open"></div>
                                    </div>
                                </div>
                                <div class="pro-details-quality">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" id="qty" type="text" name="qtybutton" value="1" min="1" />
                                    </div>
                                    <div class="pro-details-cart btn-hover">
                                        <input type="hidden" id="product_id">
                                        <button type="submit" onclick="addtoCard()"> + Add To Cart</button>
                                    </div>
                                </div>
                                <div class="pro-details-wish-com">
                                    <div class="pro-details-wishlist">
                                        <a href="#"><i class="ion-android-favorite-outline"></i>Add to wishlist</a>
                                    </div>
                                    <div class="pro-details-compare">
                                        <a href="#"><i class="ion-ios-shuffle-strong"></i>Add to compare</a>
                                    </div>
                                </div>
                                <div class="pro-details-social-info">
                                    <span>Share</span>
                                    <div class="social-info">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="ion-social-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-google"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-instagram"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->

        <style>
            .swal2-title {
            color: green;
            text-transform: capitalize;
            }
            .cart-table-content table tbody > tr td.product-quantity .cart-plus-minus .dec.qtybutton {
            border-right: 1px solid #e5e5e5;
            height: 40px;
            left: 0;
            padding-top: 8px;
            top: 0;
        }
            .cart-table-content table tbody > tr td.product-quantity .cart-plus-minus .qtybutton {
            color: #666;
            cursor: pointer;
            float: inherit;
            font-size: 16px;
            margin: 0;
            position: absolute;
            -webkit-transition: all 0.3s ease 0s;
            -o-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
            width: 20px;
            text-align: center;
        }
        </style>


        <!-- Scripts to be loaded  -->
        <!-- JS
============================================ -->

        <!--====== Vendors js ======-->
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
        <script src="{{ asset('public/frontend') }}/assets/js/vendor/jquery-3.5.1.min.js"></script>
        <script src="{{ asset('public/frontend') }}/assets/js/vendor/modernizr-3.7.1.min.js"></script>
        {{-- <script src="http://code.ionicframework.com/1.3.3/js/ionic-angular.js"></script> --}}

        <!--====== Plugins js ======-->
        <script src="{{ asset('public/frontend') }}/assets/js/plugins/bootstrap.min.js"></script>
        <script src="{{ asset('public/frontend') }}/assets/js/plugins/popper.min.js"></script>
        <script src="{{ asset('public/frontend') }}/assets/js/plugins/meanmenu.js"></script>
        <script src="{{ asset('public/frontend') }}/assets/js/plugins/owl-carousel.js"></script>
        <script src="{{ asset('public/frontend') }}/assets/js/plugins/jquery.nice-select.js"></script>
        <script src="{{ asset('public/frontend') }}/assets/js/plugins/countdown.js"></script>
        <script src="{{ asset('public/frontend') }}/assets/js/plugins/elevateZoom.js"></script>
        <script src="{{ asset('public/frontend') }}/assets/js/plugins/jquery-ui.min.js"></script>
        <script src="{{ asset('public/frontend') }}/assets/js/plugins/slick.js"></script>
        <script src="{{ asset('public/frontend') }}/assets/js/plugins/scrollup.js"></script>
        <script src="{{ asset('public/frontend') }}/assets/js/plugins/range-script.js"></script>
        <script src="{{ asset('public/frontend') }}/assets/js/ionic.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
        <script src="{{ asset('public/frontend') }}/assets/js/plugins.min.js"></script>
        <!-- Main Activation JS -->
        <script src="{{ asset('public/frontend') }}/assets/js/custom.js"></script>
        <script src="{{ asset('public/frontend') }}/assets/js/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.79/jquery.form-validator.min.js" integrity="sha512-7+hQkXGIswtBWoGbyajZqqrC8sa3OYW+gJw5FzW/XzU/lq6kScphPSlj4AyJb91MjPkQc+mPQ3bZ90c/dcUO5w==" crossorigin="anonymous"></script>

        {{-- Rrice Range Plugins --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>

{{-- SSL Easy Js ata k Include kora hoyse --}}
        @yield('ssleasy')
{{-- SSL Easy Js ata k Include kora hoyse --}}

    <script>
        $.validate({
            lang: 'en'
        });
    </script>
        <script>
            @if(Session::has('message'))
                var type ="{{Session::get('alert-type','info')}}"
                switch(type){
                    case 'info':
                        toastr.info(" {{Session::get('message')}} ");
                        break;

                    case 'success':
                        toastr.success(" {{Session::get('message')}} ");
                        break;

                    case 'warning':
                        toastr.warning(" {{Session::get('message')}} ");
                        break;

                    case 'error':
                        toastr.error(" {{Session::get('message')}} ");
                        break;
                }
            @endif
          </script>
            <script type="text/javascript">
            // Ajax Setup Start Here
            $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                        }
                    })
                        // Ajax Setup End
          </script>
        <script type="text/javascript">
            // Click Add to Cart And Product View
            function productView(id){
                $.ajax({
                    type:"GET",
                    dataType:'json',
                    url:"quick/product/view/"+id,
                    success:function(data){
                        $('#pname_en').text(data.product.product_name_en);
                        $('#category_en').text(data.product.category.category_name_en);
                        $('#brand_en').text(data.product.brand.brand_name_en);
                        $('#long_descp_en').text(data.product.long_descp_en);
                        $('#product_thambnail').attr('src',''+data.product.product_thambnail);
                        $('#product_id').val(id);
                        $('#qty').val(1);

                        $('#available').empty('')
                        $('#stockout').empty('')
                        if(data.product.product_qty > 0){
                            $('#available').text('Available');
                        }else{

                            $('#stockout').text('Stockout');
                        }
                        //Price
                         if(data.product.discount_price == null){
                            $('#pprice').text('');
                            $('#oldprice').text('');
                            $('#pprice').text(data.product.selling_price);
                         }else{
                            $('#pprice').text(data.product.discount_price);
                            $('#oldprice').text(data.product.selling_price);
                         }
                        // Color_en and Color_bn
                        $('#color_en').empty();
                        $.each(data.color_en, function(key,value){
                            $('#color_en').append('<option value="'+value+'">'+value+'</option>');
                            if(data.color_en == ""){
                                $('#color_area').hide();
                            }else{
                                $('#color_area').show();
                            }
                        })
                        //Size_en and Size_bn
                        $('#size_en').empty();
                        $.each(data.size_en, function(key,value){
                            $('#size_en').append('<option value="'+value+'">'+value+'</option>');
                            if(data.size_en == ""){
                                $('#size_area').hide();
                            }else{
                                $('#size_area').show();
                            }
                        })
                    }
                })
            }
            // Click Add to Cart And Product View End
            //// Add To Card Start
            function addtoCard(){
                var id = $('#product_id').val();
                var product_name = $('#pname_en').text();
                var color_en = $('#color_en option:selected').text();
                var size_en = $('#size_en option:selected').text();
                var qty = $('#qty').val();

                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data:{
                        color_en:color_en,
                        size_en:size_en,
                        qty:qty,
                        product_name:product_name
                    },
                 url: "<?php echo url('/add/data/store/') ?>/"+id,
                // url:"/add/data/store/"+id,
                    success:function(data){
                        miniCart();
                        $('#closeModal').click();
                     //  Alert message
                const Toast = Swal.mixin({
                        position: 'top-10px',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                     if($.isEmptyObject(data.error)){
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                           Toast.fire({
                              type: 'error',
                              title: data.error
                          })
					 }
            //    //End Message
                    }
                })
            }
            //// Add To Card End
        </script>

        {{-- SortBy Products --}}
        @yield('scripts')


        <script>
        //// MiniCart Start

        function miniCart(){
            $.ajax({
                type: "GET",
                dataType:'json',
                url:"add/mini/cart/",
                success:function(response){
                    $('span[id="cartQty"]').text(response.cartQty);
                    $('span[id="cartTotal"]').text(response.cartTotal);
                    var miniCart = ""
                 $.each(response.carts,function(key,value){
                    miniCart +=`
                                <ul>
                                    <li class="single-shopping-cart">
                                        <div class="shopping-cart-img">
                                            <a href="single-product.html"><img alt="" src="${value.options.image}" /></a>
                                            <span class="product-quantity">${value.qty}</span>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="single-product.html">${value.name}</a></h4>
                                            <span>${value.price}</span>
                                            <div class="shopping-cart-delete">
                                                <button title="Delete" id="${value.rowId}" onclick=miniCartRemove(this.id)><i class="ion-android-cancel"></i></button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                `
                                })
                                $('#miniCart').html(miniCart);
                }
            });
        }
        miniCart();
        //// MiniCart End

        /// MiniCart Remove Start
        function miniCartRemove(rowId){
            $.ajax({
                type:"GET",
                dataType:'json',
                url: "minicart/product-remove/"+rowId,
                success:function(data){
                    miniCart();
                    //  Alert message
                    const Toast = Swal.mixin({
                        position: 'top-10px',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                     if($.isEmptyObject(data.error)){
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                           Toast.fire({
                              type: 'error',
                              title: data.error
                          })
					 }
                       //End Message
                }
            });
        }
        /// MiniCart Remove End
        </script>

    <script>
        /// Add To Wishlist Start Here
        function addTowishlist(id){
            $.ajax({
                type:"POST",
                dataType:'json',
                url:"add/to/wishlist/"+id,
                success:function(data){
                        //  Alert message
                const Toast = Swal.mixin({
                        position: 'top-10px',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 4000
                    })
                     if($.isEmptyObject(data.error)){
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                           Toast.fire({
                              type: 'error',
                              title: data.error
                          })
					 }
            //    //End Message
                }
            })
        }
        /// Add To Wishlist End Here
    </script>
    {{-- ///////////////////////////Wishlist Page/////////////////////////////////// --}}
   <script>
       // Wishlist All Item Show Start Here
    function Allwishlist(){
        $.ajax({
            type:"GET",
            dataType: 'json',
            url: "{{ url('/get-wishlist-product') }}",
            success:function(response){
               var rows = ""
                $.each(response,function(key,value){
                    rows +=` <tr>
                                <td class="product-thumbnail">
                                    <a href="#"><img width="105" src='${value.product.product_thambnail}' alt="" /></a>
                                </td>
                                <td class="product-name"><a href="#">${value.product.product_name_en}</a></td>
                                <td class="product-price-cart">
                                    ${value.product.discount_price == null ? `৳ ${value.product.selling_price}`
                                    :
                                    ` <span>৳ ${value.product.discount_price}</span>&nbsp; <del class="amount text-danger"> ৳ ${value.product.selling_price}</del>`
                                }
                                    </td>
                                <td class="product-quantity">

                                </td>
                                <td class="product-subtotal"></td>
                                <td class="product-wishlist-cart">
                                    <a href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)"> ADD TO CART</a>
                                    <button  type="submit" style="border: none" title="Delete" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="ion-android-cancel"></i></button>
                                </td>
                            </tr>`
                })
                $('#wishlist').html(rows);
            }
        })
    }
         // Wishlist All Item Show End

       // Wishlist Remove Start Here
        function wishlistRemove(id){
            $.ajax({
                type:"GET",
                dataType: 'json',
                url:"{{ url('/wishlist/remove/') }}/"+id,
                success:function(data){
                    Allwishlist();
                      //  Alert message
                const Toast = Swal.mixin({
                        position: 'top-10px',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                     if($.isEmptyObject(data.error)){
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                           Toast.fire({
                              type: 'error',
                              title: data.error
                          })
					 }
              //End Message
                }
            })
        }
     </script>
     {{-- ////////////////My Cart Page Start Here//////////////////// --}}
     <script>
         function cart(){
            $.ajax({
                type:"GET",
                dataType:'json',
                url:"{{ url('/get/all-mycart') }}",
                success:function(response){
                    $('span[id="cartTotal"]').text(response.cartTotal);
                    var myCart = ""
                    $.each(response.carts,function(key,value){
                        myCart += `<tr>
                                    <td class="product-thumbnail">
                                        <a href="#"><img width="110 " src="${value.options.image}" alt="" /></a>
                                    </td>
                                    <td class="product-name"><a href="#">${value.name}</a></td>
                                    <td class="product-price-cart"><span class="amount">${value.price}</span></td>
                                    <td class="product-price-cart">
                                    ${value.options.color_en == null ? `<span class="amount">....</span>`:
                                    `<span class="amount">${value.options.color_en}</span>`
                                     }
                                    </td>
                                    <td class="product-price-cart">
                                    ${value.options.size_en == null ? `<span class ="amount">....</span>`
                                    :
                                    `<span class ="amount">${value.options.size_en}</span>`
                                    }
                                    </td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus">
                                            ${value.qty > 1
                                            ? `<button style="border:none" id="${value.rowId}" onclick="decrement(this.id)" class ="dec qtybutton">-</button>`
                                        : `<button style="border:none; cursor: default;" class ="dec qtybutton" disabled>-</button>`
                                        }
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="${value.qty}" />
                                        <button id="${value.rowId}" onclick="increment(this.id)" style="border:none; color:none" class ="inc qtybutton">+</button>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">${value.subtotal}</td>
                                    <td class="product-remove">
                                        <button  type="submit" style="border: none" title="Delete" id = ${value.rowId} onclick="cartRemove(this.id)"><i class="ion-android-cancel"></i></button>
                                    </td>
                                </tr>`
                    })
                $('#myCart').html(myCart);
                }
            })
         }
         cart();

         /////// Cart Remove
         function cartRemove(rowId){
             $.ajax({
                 type:"GET",
                 dataType:'json',
                 url:"{{ url('cart/remove') }}/"+rowId,
                 success:function(data){
                    couponCalculation();
                    $('#couponShowHide').css('display',"");
                    cart();
                    miniCart();
                      //  Alert message
                const Toast = Swal.mixin({
                        position: 'top-10px',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                     if($.isEmptyObject(data.error)){
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                           Toast.fire({
                              type: 'error',
                              title: data.error
                          })
					 }
              //End Message
                 }
             })
         }
         ///// Cart Decrement
         function increment(rowId){
            $.ajax({
                type:"GET",
                dataType:'json',
                url:"{{ url('/cart/increment') }}/"+rowId,
                success:function(data){
                    couponCalculation();
                    cart();
                    miniCart();

                }
            })
         }
        ///// Cart Increment
         function decrement(rowId){
            $.ajax({
                type:"GET",
                dataType:'json',
                url:"{{ url('/cart/decrement') }}/"+rowId,
                success:function(data){
                    couponCalculation();
                    cart();
                    miniCart();
                }
            })
         }
    </script>
    {{-- //////////////////Coupon Apply Start Here///////////////////////// --}}

    <script>
        function couponApply(){
             var coupon_name = $('#coupon_name').val();
            $.ajax({
                type:"POST",
                dataType:'json',
                data:{
                    coupon_name:coupon_name
                },
                url:"{{ url('/coupon/apply') }}",
                success:function(data){
                    couponCalculation();
                    if(data.coupon_validity == true){
                        //$('#couponShowHide').hide();
                        $('#couponShowHide').css('display','none');
                    }
                    //  Alert message
                const Toast = Swal.mixin({
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                     if($.isEmptyObject(data.error)){
                        $('#coupon_name').val('')
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                           Toast.fire({
                              type: 'success',
                              title: data.error
                          })
					 }
              //End Message
                }
            })
        }
    </script>
    <script>
        ////// Coupon Calculation
        function couponCalculation(){
            $.ajax({
                type:"GET",
                dataType:'json',
                url:"{{ url('/coupon/calculation') }}",
                success:function(data){
                    if(data.total){
                        $('#couponCalField').html(`
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                            </div>
                            <h5 >Subtotal : <span>${data.total}</span><span> TK &nbsp;</span></h5>
                            <div class="total-shipping">
                                <h5>Total shipping</h5>
                                <ul>
                                    <li>Shipping Charge:<span>00</span></li>
                                    <li>Vat:<span>00</span></li>

                                </ul>
                            </div>
                            <h4 class="grand-totall-title">Grand Total <span>${data.total}</span><span> TK &nbsp;</span></h4>
                            <a href="{{ route('user.checkout') }}">Proceed to Checkout</a>`
                            )
                    }else{
                        $('#couponCalField').html(`<div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                            </div>
                            <h5 >Subtotal : <span>${data.subtotal}</span><span> TK &nbsp;</span></h5>
                            <div class="total-shipping">
                                <h5>Total shipping</h5>
                                <ul>
                                    <li>Coupon Name:<strong>&nbsp; ${data.coupon_name}</strong><button class="couponbtn" style="border:none; float:right" type ="submit" onclick ="couponRemove()"><i class="ion-android-cancel"></i> Coupon remove</button></li>
                                    <li>Coupon Discount :<span>${data.coupon_discount}</span><span> % </span></li>
                                    <li>Coupon Amount :<span>${data.coupon_amount}</span> <span> - </span></li>
                                    <li>Shipping Charge:<span>00</span></li>
                                    <li>Vat:<span>00</span></li>
                                </ul>
                            </div>
                            <h4 class="grand-totall-title">Grand Total <span>${data.total_amount}</span><span>Tk &nbsp;</span></h4>
                            <a href="{{ route('user.checkout') }}">Proceed to Checkout</a>`
                            )
                    }
                }
            });
        }
        couponCalculation();
        function couponRemove(){
            $.ajax({
                type:"GET",
                dataType:'json',
                url:"{{ url('coupon/remove') }}",
                success:function(data){
                    couponCalculation();
                    //$('#couponShowHide').show();
                    $('#couponShowHide').css('display',"");
                     //  Alert message
                const Toast = Swal.mixin({
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                     if($.isEmptyObject(data.error)){
                        $('#coupon_name').val('')
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                           Toast.fire({
                              type: 'success',
                              title: data.error
                          })
					 }
              //End Message
                }
            })
        }
    </script>
    {{-- //////////////////Coupon Apply End Here///////////////////////// --}}
    {{-- Frontend Product Search Start --}}

    <script>
        $('body').on('keyup','#search_product',function(){
            let searchData = $('#search_product').val();

            if (searchData.length > 0) {
            $.ajax({
                type:"POST",
                url :"{{ route('find.search') }}",
                data: {
                    search_product : searchData,
                },
                success:function(result){
                 $('#suggest-product').html(result);
                }
             });
           }
           if (searchData.length < 1) $('#suggest-product').html("");
        })
    </script>
    <script>
         function showSearchProduct(){

            $('#suggest-product').slideDown();
        }
        function hideSearchProduct(){

        $('#suggest-product').slideUp();
        }
    </script>
    {{-- Frontend Product Search end --}}
    </body>
</html>

