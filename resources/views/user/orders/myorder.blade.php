@extends('layouts.frontend_master')

@section('frontend_content')
 <!-- Breadcrumb Area start -->
 <section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">My Orders</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>My Order</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->
<!-- account area start -->

<section class="mb-3 mt-5" style="width: 90%; margin-left:5%">
    <div class="row" >
        <div class="col-lg-2">
            @include('user.inc.leftbar')
        </div>
        <div class="col-lg-10">
            <form action="{{ route('update.user.image') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="iq-card-body">
                    <div class="table-responsive">
                       <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                         <thead>
                             <tr>
                                <th class="text-center">Sl</th>
                                <th class="text-center">Order Date</th>
                                <th class="text-center">Amont</th>
                                <th class="text-center">Payment Method</th>
                                <th class="text-center">transaction_id</th>
                                <th class="text-center">Invoice</th>
                                <th class="text-center">Order</th>
                                <th class="text-center">Action</th>
                             </tr>
                         </thead>
                          <tbody>
                             @foreach ($orders as $item)
                             <tr>
                                 <td>{{ $orders->firstItem()+$loop->index }}</td>
                                 <td class="text-center">{{ $item->order_date }}</td>
                                 <td class="text-center">{{ $item->amount }} ৳</td>
                                <td class="text-center">{{ $item->payment_method }}</td>
                                <td class="text-center">{{ $item->transaction_id }}</td>
                                <td class="text-center">{{ $item->invoice_no }}</td>

                                @if ($item->status == 'Pending')
                                <td>
                                <span class="badge badge-pill badge-primary" style="background: #e48f06; text:white; font-size:13px;">
                                    {{ ucwords($item->status) }}</span>
                                </td>
                                @endif

                                @if ($item->status == 'Processing')
                                <td>
                                <span class="badge badge-pill badge-primary" style="background: #4e2c85; text:white;font-size:13px;">
                                    {{ ucwords($item->status) }}</span>
                                </td>
                                @endif
                                @if ($item->status == 'Confirm')
                                <td>
                                <span class="badge badge-pill badge-primary" style="background: #20adc0; text:white;font-size:14px;">
                                    {{ ucwords($item->status) }}</span>
                                </td>
                                @endif
                                @if ($item->status == 'Picked')
                                <td>
                                <span class="badge badge-pill badge-primary" style="background: #1dcc43; text:white;font-size:13px;">
                                    {{ ucwords($item->status) }}</span>
                                </td>
                                @endif
                                @if ($item->status == 'Shipping')
                                <td>
                                <span class="badge badge-pill badge-primary" style="background: #2410d3; text:white;font-size:13px;">
                                    {{ ucwords($item->status) }}</span>
                                </td>
                                @endif
                                @if ($item->status == 'Delivered')
                                <td>
                                <span class="badge badge-pill badge-primary" style="background: #089914; text:white;font-size:13px;">
                                    {{ ucwords($item->status) }}</span>
                                </td>
                                @endif
                                @if ($item->status == 'Cancel')
                                <td>
                                <span class="badge badge-pill badge-primary" style="background: #f82307; text:white;font-size:13px;">
                                    {{ ucwords($item->status) }}</span>
                                </td>
                                @endif
                                <td>
                                   <div class="flex align-items-center list-user-action">
                                      <a data-toggle="tooltip" data-placement="top" title="VIEW" data-original-title="View" href="{{ url('user/order/view/'.$item->id) }}"><i class="fa fa-eye"></i></a>&nbsp; &nbsp;
                                      <a data-toggle="tooltip" data-placement="top" title="DOWNLOAD" data-original-title="Edit" href="{{ url('user/invoice/download/'.$item->id) }}"><i class="fa fa-download"></i></a>
                                   </div>
                                </td>
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
                                  {{ $orders->links() }}
                                </ul>
                             </nav>
                          </div>
                       </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- account area end -->
@endsection
