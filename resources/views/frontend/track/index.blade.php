@extends('layouts.frontend_master')
@section('frontend_content')

<style>
     @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.10rem
}
.card-header:first-child {
    border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
}
.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1)
}
.track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px
}
.track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative
}
.track .step.active:before {
    background: #59b210
}
.track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px
}
.track .step.active .icon {
    background: #59b210;
    color: #fff
}
/* cancel area start */
.track .cancel {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative
}
.track .cancel.done:before {
    background: #EA323D;
}
.track .cancel::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px
}
.track .cancel.done .icon {
    background:#EA323D;
    color: #fff
}
.track .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd;
}
.track .cancel.done .text {
    font-weight: 400;
    color: #000
}
/* end cancel area  */
.track .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd;
}
.track .step.active .text {
    font-weight: 400;
    color: #000
}
.track .text {
    display: block;
    margin-top: 7px
}
.itemside {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%
}
.itemside .aside {
    position: relative;
    -ms-flex-negative: 0;
    flex-shrink: 0
}
.img-sm {
    width: 80px;
    height: 80px;
    padding: 7px
}
ul.row,
ul.row-sm {
    list-style: none;
    padding: 0
}
.itemside .info {
    padding-left: 15px;
    padding-right: 7px
}
.itemside .title {
    display: block;
    margin-bottom: 5px;
    color: #212529
}
p {
    margin-top: 0;
    margin-bottom: 1rem
}
.btn-warning {
    color: #ffffff;
    background-color: #59b210;
    border-color: #59b210;
    border-radius: 1px
}
.btn-warning:hover {
    color: #ffffff;
    background-color: #59b210;
    border-color: #59b210;
    border-radius: 1px
}
.qty{
    background: #59b210;
}
.mt{
    margin-top: 15px;
    margin-bottom: 15px;
}
.empty{
    padding: 20px;
}
</style>
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">
                        @if(session()->get('language')== 'bangla')
                        সিঙ্গেল প্রোডাক্ট
                        @else
                       Tracking Order
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
            <div class="col-lg-12">
            <article class="card">
                <div class="card-body">
                    <article class="card">
                        <div class="card-body row" style="padding:10px;">
                            <div class="col-lg-2">
                                <strong>Invoice No:</strong> <br> {{ $order->invoice_no }}
                            </div>
                            <div class="col-lg-2"> <strong>Order Date:</strong> <br>{{ $order->order_date }} </div>
                            <div class="col-lg-4"> <strong>Shipping By: {{ $order->name }}</strong> <br> {{ $order->division->division_name_en }}, {{ $order->district->district_name_en }},{{ $order->state->state_name_en }} | <i class="fa fa-phone"></i> {{ $order->phone }}</div>
                            <div class="col-lg-2"> <strong>Status:</strong> <br> Picked by the courier </div>
                            <div class="col-lg-2"> <strong>Total: </strong> <br>৳ {{ $order->amount }} </div>
                        </div>
                    </article>
                    <div class="track">
                        @if ($order->status == 'Pending')
                                <div class="step active">
                                        <span class="icon"> <i class="fa fa-spinner"></i> </span>
                                        <span class="text">Order Pending</span>
                                    <small class="text-danger">{{ $order->order_date }}</small>
                                </div>
                                <div class="step">
                                    <span class="icon "><i class="fa fa-check"></i> </span>
                                    <span class="text">Order confirmed</span>
                                </div>
                                <div class="step">
                                    <span class="icon"> <i class="fa fa-shopping-cart"></i> </span>
                                    <span class="text">Order Processing</span>
                                </div>
                                <div class="step">
                                    <span class="icon"> <i class="fa fa-truck"></i> </span>
                                    <span class="text">Picked Order</span>
                                </div>
                                <div class="step">
                                    <span class="icon"> <i class="fa fa-user"></i> </span>
                                    <span class="text">Shipped Order</span>
                                </div>
                                <div class="step">
                                    <span class="icon"> <i class="fa fa-hand-lizard-o"></i> </span>
                                    <span class="text">Delivered</span>
                                </div>
                          @elseif ($order->status == 'Confirm')
                                <div class="step active">
                                    <span class="icon"> <i class="fa fa-spinner"></i> </span>
                                    <span class="text">Order Pending</span>
                                <small class="text-danger">{{ $order->order_date }}</small>
                            </div>
                            <div class="step active">
                                <span class="icon "><i class="fa fa-check"></i> </span>
                                <span class="text">Order confirmed</span>
                                <small class="text-danger">{{ Carbon\Carbon::parse( $order->confirmed_date)->format('d F Y') }}</small>
                            </div>
                            <div class="step">
                                <span class="icon"> <i class="fa fa-shopping-cart"></i> </span>
                                <span class="text">Order Processing</span>
                            </div>
                            <div class="step">
                                <span class="icon"> <i class="fa fa-truck"></i> </span>
                                <span class="text">Picked Order</span>
                            </div>
                            <div class="step">
                                <span class="icon"> <i class="fa fa-user"></i> </span>
                                <span class="text">Shipped Order</span>
                            </div>
                            <div class="step">
                                <span class="icon"> <i class="fa fa-hand-lizard-o"></i> </span>
                                <span class="text">Delivered</span>
                            </div>
                          @elseif ($order->status == 'Processing')
                                <div class="step active">
                                        <span class="icon"> <i class="fa fa-spinner"></i> </span>
                                        <span class="text">Order Pending</span>
                                    <small class="text-danger">{{ $order->order_date }}</small>
                                </div>
                                <div class="step active">
                                    <span class="icon "><i class="fa fa-check"></i> </span>
                                    <span class="text">Order confirmed</span>
                                    <small class="text-danger">{{ Carbon\Carbon::parse( $order->confirmed_date)->format('d F Y') }}</small>
                                </div>
                                <div class="step active">
                                    <span class="icon"> <i class="fa fa-shopping-cart"></i> </span>
                                    <span class="text">Order Processing</span>
                                    <small class="text-danger">{{ Carbon\Carbon::parse( $order->processing_date)->format('d F Y') }}</small>
                                </div>
                                <div class="step">
                                    <span class="icon"> <i class="fa fa-truck"></i> </span>
                                    <span class="text">Picked Order</span>
                                </div>
                                <div class="step">
                                    <span class="icon"> <i class="fa fa-user"></i> </span>
                                    <span class="text">Shipped Order</span>
                                </div>
                                <div class="step">
                                    <span class="icon"> <i class="fa fa-hand-lizard-o"></i> </span>
                                    <span class="text">Delivered</span>
                                </div>
                          @elseif ($order->status == 'Picked')
                                    <div class="step active">
                                        <span class="icon"> <i class="fa fa-spinner"></i> </span>
                                        <span class="text">Order Pending</span>
                                    <small class="text-danger">{{ $order->order_date }}</small>
                                </div>
                                <div class="step active">
                                    <span class="icon "><i class="fa fa-check"></i> </span>
                                    <span class="text">Order confirmed</span>
                                    <small class="text-danger">{{ Carbon\Carbon::parse( $order->confirmed_date)->format('d F Y') }}</small>
                                </div>
                                <div class="step active">
                                    <span class="icon"> <i class="fa fa-shopping-cart"></i> </span>
                                    <span class="text">Order Processing</span>
                                    <small class="text-danger">{{ Carbon\Carbon::parse( $order->processing_date)->format('d F Y') }}</small>
                                </div>
                                <div class="step active">
                                    <span class="icon"> <i class="fa fa-truck"></i> </span>
                                    <span class="text">Picked Order</span>
                                    <small class="text-danger">{{ Carbon\Carbon::parse( $order->picked_date)->format('d F Y') }}</small>
                                </div>
                                <div class="step">
                                    <span class="icon"> <i class="fa fa-user"></i> </span>
                                    <span class="text">Shipped Order</span>
                                </div>
                                <div class="step">
                                    <span class="icon"> <i class="fa fa-hand-lizard-o"></i> </span>
                                    <span class="text">Delivered</span>
                                </div>
                          @elseif ($order->status == 'Shipping')
                                <div class="step active">
                                    <span class="icon"> <i class="fa fa-spinner"></i> </span>
                                    <span class="text">Order Pending</span>
                                <small class="text-danger">{{ $order->order_date }}</small>
                            </div>
                            <div class="step active">
                                <span class="icon "><i class="fa fa-check"></i> </span>
                                <span class="text">Order confirmed</span>
                                <small class="text-danger">{{ Carbon\Carbon::parse( $order->confirmed_date)->format('d F Y') }}</small>
                            </div>
                            <div class="step active">
                                <span class="icon"> <i class="fa fa-shopping-cart"></i> </span>
                                <span class="text">Order Processing</span>
                                <small class="text-danger">{{ Carbon\Carbon::parse( $order->processing_date)->format('d F Y') }}</small>
                            </div>
                            <div class="step active">
                                <span class="icon"> <i class="fa fa-truck"></i> </span>
                                <span class="text">Picked Order</span>
                                <small class="text-danger">{{ Carbon\Carbon::parse( $order->picked_date)->format('d F Y') }}</small>
                            </div>
                            <div class="step active">
                                <span class="icon"> <i class="fa fa-user"></i> </span>
                                <span class="text">Shipped Order</span>
                                <small class="text-danger">{{ Carbon\Carbon::parse( $order->shipped_date)->format('d F Y') }}</small>
                            </div>
                            <div class="step">
                                <span class="icon"> <i class="fa fa-hand-lizard-o"></i> </span>
                                <span class="text">Delivered</span>
                            </div>
                          @elseif ($order->status == 'Delivered')
                                    <div class="step active">
                                        <span class="icon"> <i class="fa fa-spinner"></i> </span>
                                        <span class="text">Order Pending</span>
                                    <small class="text-danger">{{ $order->order_date }}</small>
                                </div>
                                <div class="step active">
                                    <span class="icon "><i class="fa fa-check"></i> </span>
                                    <span class="text">Order confirmed</span>
                                    <small class="text-danger">{{ Carbon\Carbon::parse( $order->confirmed_date)->format('d F Y') }}</small>
                                </div>
                                <div class="step active">
                                    <span class="icon"> <i class="fa fa-shopping-cart"></i> </span>
                                    <span class="text">Order Processing</span>
                                    <small class="text-danger">{{ Carbon\Carbon::parse( $order->processing_date)->format('d F Y') }}</small>
                                </div>
                                <div class="step active">
                                    <span class="icon"> <i class="fa fa-truck"></i> </span>
                                    <span class="text">Picked Order</span>
                                    <small class="text-danger">{{ Carbon\Carbon::parse( $order->picked_date)->format('d F Y') }}</small>
                                </div>
                                <div class="step active">
                                    <span class="icon"> <i class="fa fa-user"></i> </span>
                                    <span class="text">Shipped Order</span>
                                    <small class="text-danger">{{ Carbon\Carbon::parse( $order->shipped_date)->format('d F Y') }}</small>
                                </div>
                                <div class="step active">
                                    <span class="icon"> <i class="fa fa-hand-lizard-o"></i> </span>
                                    <span class="text">Delivered</span>
                                    <small class="text-danger">{{ Carbon\Carbon::parse( $order->delivered_date)->format('d F Y') }}</small>
                                </div>
                          @else
                                <div class="cancel done">
                                    <span class="icon "> <i class="fa fa-close "></i> </span>
                                    <span class="text">Order Pending</span>
                                </div>
                                <div class="cancel done">
                                    <span class="icon "><i class="fa fa-close"></i> </span>
                                    <span class="text">Order confirmed</span>
                                 </div>
                                <div class="cancel done">
                                    <span class="icon"> <i class="fa fa-close"></i> </span>
                                    <span class="text">Order Processing</span>
                                </div>
                                <div class="cancel done">
                                    <span class="icon"> <i class="fa fa-close"></i> </span>
                                    <span class="text">Picked Order</span>
                                </div>

                                <div class="cancel done">
                                    <span class="icon"><i class="fa fa-close"></i> </span>
                                    <span class="text">Shipped Order</span>
                                 </div>
                                <div class="cancel done">
                                    <span class="icon"> <i class="fa fa-close"></i></span>
                                    <span class="text">Delivered</span>
                                </div>
                        @endif

                    </div>
                      <div class="empty"></div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('update.user.image') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="iq-card-body">
                                    <div class="table-responsive">
                                       <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                                         <thead>
                                             <tr>
                                                <th class="text-center">Sl</th>
                                                <th class="text-center">Image</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">P Code</th>
                                                <th class="text-center">Qty</th>
                                                <th class="text-center">Size</th>
                                                <th class="text-center">Color</th>
                                             </tr>
                                         </thead>
                                         @php
                                             $ls = 1;
                                         @endphp
                                          <tbody>
                                             @foreach ($orderItems as $item)
                                             <tr>
                                                 <td>{{ $ls ++ }}</td>
                                                 <td class="text-center">
                                                    <img src="{{ asset($item->product->product_thambnail) }}" height="80" width="80"></td>
                                                 <td class="text-center">{{ $item->product->product_name_en }}</td>
                                                 <td class="text-center">{{ $item->product->product_code }}</td>
                                                 <td class="text-center">{{ $item->qty }}</td>
                                                 @if($item->size == NULL)
                                                 <td class="text-center">---</td>
                                                @else
                                                <td class="text-center">{{ $item->size }}</td>
                                                 @endif
                                                 @if($item->color == NULL)
                                                 <td class="text-center">---</td>
                                                 @else
                                                 <td class="text-center">{{ $item->color }}</td>
                                                 @endif
                                             </tr>
                                             @endforeach
                                         </tbody>
                                       </table>
                                    </div>
                                       <div class="row justify-content-between mt-3">
                                          <div id="user-list-page-info" class="col-md-6">
                                          </div>
                                          <div class="col-md-6">
                                             <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-end mb-0">

                                                </ul>
                                             </nav>
                                          </div>
                                       </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </article>
          </div>
        </div>
   </div>
</div>
@endsection
