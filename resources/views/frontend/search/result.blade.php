<style>
    ul li a{
        display: block;
    }
    ul li{
        margin-top:10px;
        margin-left:10px;
    }

</style>
<ul>
    <li >
        @forelse ($products as $item)
        <a href="{{ url('single/product/'.$item->id.'/'.$item->product_slug_bn) }}" class="float-left mr-3">
            <img src="{{ asset($item->product_thambnail) }}" width="30" height="30" alt="">
        </a>
        @if(session()->get('language') == 'bangla')
        <a href="{{ url('single/product/'.$item->id.'/'.$item->product_slug_en) }}">
            <strong>{{ $item->product_name_bn }}</strong>
        </a>
        @else
        <a href="{{ url('single/product/'.$item->id.'/'.$item->product_slug_en) }}">
            <strong>{{ $item->product_name_en }}</strong>
        </a>
        @endif
        <hr>
        @empty
        <strong>Product Not Found</strong>
        @endforelse
    </li>
</ul>
