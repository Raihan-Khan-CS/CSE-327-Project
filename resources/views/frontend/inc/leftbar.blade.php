<div class="col-lg-3 order-lg-first col-md-12 order-md-last mb-res-md-60px mb-res-sm-60px">
    <div class="left-sidebar">
        <div class="sidebar-heading">
            <div class="main-heading">
                <h2>Filter By</h2>
            </div>
            <!-- Sidebar single item -->
            <div class="sidebar-widget">
                <h4 class="pro-sidebar-title">Categories</h4>
                <div class="sidebar-widget-list">
                    @php
                        $categories = App\Models\Category::orderBy('id','ASC')->get();
                    @endphp
                    <ul>
                        @foreach($categories as  $item)
                        <li>
                            @php
                              $subcat = App\Models\Product::where('category_id',$item->id)->orderBy('id','ASC')->get();
                            @endphp
                            <div class="sidebar-widget-list-left">
                                @if(session()->get('language') == 'bangla')
                                <input type="checkbox" id="" /> <a href="{{ url('category/wise-product/'.$item->id.'/'.$item->category_slug_bn) }}">{{ $item->category_name_bn }}<span>({{bn_price(count($subcat)) }})</span> </a>
                                @else
                                <input type="checkbox" value="" /> <a href="{{ url('category/wise-product/'.$item->id.'/'.$item->category_slug_en) }}">{{ $item->category_name_en }}<span>({{count($subcat) }})</span> </a>
                                @endif
                                <span class="checkmark"></span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
         <!-- Sidebar single item -->
        <div class="sidebar-widget mt-20">
            <h4 class="pro-sidebar-title">Price</h4>
            <div id="slider-range" ></div>
                <div  class=" mt-10">
                    <div id="slider-range" class="price-filter-range">
                        <input type="text" id="price_range" name="price_range" value="">
                        <input type="text" id="amount" value="100-800" readonly/>
                        <button type="submit">Filter</button>
                    </div>
                </div>
        </div>
        <!-- Sidebar single item -->
        @php
            $brands = App\Models\Brand::orderBy('id','ASC')->get();
        @endphp
        <div class="sidebar-widget mt-30">
            <h4 class="pro-sidebar-title">Brand</h4>
            <div class="sidebar-widget-list">
                <ul>
                    @foreach ($brands as $brand)
                    <li>
                        @php
                            $brandCount = App\Models\Product::where('brand_id',$brand->id)->orderBy('id','ASC')->get();
                        @endphp
                        <div class="sidebar-widget-list-left">
                            <input type="checkbox" /> <a href="{{ url('brand/wise-product/'.$brand->id.'/'.$brand->brand_slug_en) }}">{{ $brand->brand_name_en }}<span>({{ count($brandCount) }})</span> </a>
                            <span class="checkmark"></span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @php
            $tags_en = App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
            $tags_bn = App\Models\Product::groupBy('product_tags_bn')->select('product_tags_bn')->get();
        @endphp
        <div class="sidebar-widget tag mt-30">
            <div class="main-heading">
                <h2>Tags</h2>
            </div>
            <div class="sidebar-widget-tag">
                @if(session()->get('language') == 'bangla')
                @foreach ($tags_bn as $tag)
                <ul>
                    <li><a href="{{ url('product-tags/'.$tag->product_tags_bn) }}">{{str_replace(',',' ', $tag->product_tags_bn) }}</a></li>
                </ul>
                @endforeach
                @else
                @foreach ($tags_en as $tag)
                <ul>
                    <li><a href="{{ url('product-tags/'.$tag->product_tags_en) }}">{{str_replace(',',' ', $tag->product_tags_en) }}</a></li>
                </ul>
                @endforeach
                @endif
            </div>
        </div>
        <!-- Sidebar single item -->
    </div>
</div>
@section('scripts')

<script>
    $(document).ready(function(){
        if($('#slider-range').length>0){
            const = max_price = parseInt($('#slider-range').data('max'));
            const = min_price = parseInt($('#slider-range').data('min'));

            let price_range = min_price+"-"+max_price;
            let price = price_range.split('-');
            $("#slider-range").slider({
                range:true,
                min:min_price,
                max:max_price,
                values:price,
                slide:function(event, ui){
                    $("#emon").val('$'+ui.values[0]+"-"+$+ui.values[1]);
                    $("#price_range").val(ui.values[0]+"-"+ui.values[1]);
                }
            });


        }
    });
</script>

@endsection
