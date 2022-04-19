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
@if(session()->get('language') == 'bangla') সাব-সাব-ক্যাটেগরি    @else sub-subCategory @endif
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
 <!-- Shop Category Area End -->
 <div class="shop-category-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
                <!-- Shop Top Area Start -->
                <div class="shop-top-bar">
                    <!-- Left Side start -->
                    <div class="shop-tab nav mb-res-sm-15">
                        <a href="#shop-1" data-toggle="tab" >
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
                            <select id="sortBy">
                                <option >Sort by newness</option>
                                <option value="lowerToHigher"{{ ($sort =='lowerToHigher') ? 'selected':'' }}>Price Lower to Higher</option>
                                <option value="HigherToLower" {{ ($sort =='HigherToLower') ? 'selected':'' }}>Price Higher to Lower</option>
                                <option value="nameAtoZ" {{ ($sort =='nameAtoZ') ? 'selected':'' }}>A to Z</option>
                                <option value="nameZtoA" {{ ($sort =='nameZtoA') ? 'selected':'' }}> Z to A</option>
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
                        <div id="shop-1" class="tab-pane" >
                            <div class="row" id="grid-view-product">

                            @include('frontend.inc.grid-view-product')
                            </div>
                        </div>
                        <!-- Tab One End -->
                        <!-- Tab Two Start -->
                        <div id="shop-2" class="tab-pane active" >
                            <div id="list-view-product">
                                @include('frontend.inc.list-view-product')
                            </div>
                        </div>
                        <!-- Tab Two End -->
                    </div>
                    <!-- Shop Tab Content End -->
                    {{-- <style>.pagination {
                        display: inline-flex;;
                    }
                    </style> --}}
                    <!--  Pagination Area Start -->
                    <div class="pro-pagination-style text-center">
                        <div class="ajax-loadmore-product text-center" style="display: none;">
                            <img src="{{ asset('public/frontend/images/Spinner-5.gif') }}" alt="" style="margin-left:auto; margin-right:auto;display:block; width:70px;">
                        </div>
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


@section('scripts')
<script>
    $('#sortBy').change(function (e) {
        e.preventDefault();
        let sortBy = $('#sortBy').val();
        window.location= "{{ url(''.$route.'') }}/{{ $catId }}/{{ $catSlug }}? sort="+sortBy;
    });
</script>

<script>
    function loadmoreproduct(page){
        $.ajax({
            type: "GET",
            url: "?page="+page,
            beforeSend: function (response) {
                $('.ajax-loadmore-product').show();
            }
        })
        .done(function(data){
            if(data.grid_view == " " || data.list_view == " "){
                $('.ajax-loadmore-product').html('no more product found');

            }
            $('.ajax-loadmore-product').hide();

            $('#grid-view-product').append(data.grid_view);
            $('#list-view-product').append(data.list_view);

        })
        .fail(function(){
            alert('something went wrong')
        });
    }
    var page = 1;
        $(window).scroll(function (){
            if ($(window).scrollTop() +$(window).height()>= $(document).height()){
                page ++;
                loadmoreproduct(page);
            }
        });
</script>
@endsection




