<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use PDF;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // Order View
    public function orderView($id)
    {
        $orders = Order::with('division', 'district', 'state', 'user')->where('id', $id)->orderBy('id', 'DESC')->first();
        $orderItem = OrderItem::where('order_id', $id)->orderBy('id', 'DESC')->get();
        return view('admin.orders.order-view', compact('orders', 'orderItem'));
    }
    // pending Oders
    public function pendingOrders()
    {
        $orders = Order::where('status', 'Pending')->orderBy('id', 'ASC')->paginate(10);
        return view('admin.orders.pending', compact('orders'));
    }
    //Confirmed Orders
    public function confirmedOrders()
    {
        $orders = Order::where('status', 'Confirm')->orderBy('id', 'ASC')->paginate(10);
        return view('admin.orders.confirmed', compact('orders'));
    }
    //processing Orders
    public function processingOrders()
    {
        $orders = Order::where('status', 'Processing')->orderBy('id', 'ASC')->paginate(10);
        return view('admin.orders.processing', compact('orders'));
    }
    //picked Orders
    public function pickedOrders()
    {
        $orders = Order::where('status', 'Picked')->orderBy('id', 'ASC')->paginate(10);
        return view('admin.orders.picked', compact('orders'));
    }
    //shipped Orders
    public function shippedOrders()
    {
        $orders = Order::where('status', 'Shipping')->orderBy('id', 'ASC')->paginate(10);
        return view('admin.orders.shipped', compact('orders'));
    }
    //delivered Orders
    public function deliveredOrders()
    {
        $orders = Order::where('status', 'Delivered')->orderBy('id', 'ASC')->paginate(10);
        return view('admin.orders.delivered', compact('orders'));
    }
    //cancel Orders
    public function cancelOrders()
    {
        $orders = Order::where('return_reason', '!=', NULL)->orderBy('id', 'DESC')->paginate(10);
        return view('admin.orders.cancel', compact('orders'));
    }
    ///////////////////////////////////////// Order Status Updated Area /////////////////
    //Pending To Confirm
    public function pendingToConfirm($id)
    {

        Order::findOrFail($id)->update([
            'status' => 'Confirm',
            'confirmed_date' => Carbon::now()->format('d F Y'),
        ]);

        $notification = array(
            'message' => 'Confirm order Success',
            'alert-type' => 'success'
        );
        return redirect()->route('pending.orders')->with($notification);
    }
    //Pending To Cancel
    public function pendingToCancel($id)
    {
        Order::findOrFail($id)->update([
            'status' => 'Cancel',
            'cancel_date' => Carbon::now()->format('d F Y'),
        ]);
        $notification = array(
            'message' => 'Cancel order Success',
            'alert-type' => 'success'
        );
        return redirect()->route('cancel.orders')->with($notification);
    }
    //Confirm To Processing
    public function confirmToProcessing($id)
    {

        Order::findOrFail($id)->update([
            'status' => 'Processing',
            'processing_date' => Carbon::now()->format('d F Y'),
        ]);

        $notification = array(
            'message' => 'Processing order Success',
            'alert-type' => 'success'
        );
        return redirect()->route('confirmed.orders')->with($notification);
    }
    //Processing To Picked
    public function processingToPicked($id)
    {

        Order::findOrFail($id)->update([
            'status' => 'Picked',
            'picked_date' => Carbon::now()->format('d F Y'),
        ]);

        $notification = array(
            'message' => 'Picked order Success',
            'alert-type' => 'success'
        );
        return redirect()->route('processing.orders')->with($notification);
    }

    // Picked To Shipped
    public function pickedToShipped($id)
    {

        Order::findOrFail($id)->update([
            'status' => 'Shipping',
            'shipped_date' => Carbon::now()->format('d F Y'),
        ]);

        $notification = array(
            'message' => 'Shipped order Success',
            'alert-type' => 'success'
        );
        return redirect()->route('picked.orders')->with($notification);
    }
    // Shipped To Delivered
    public function shippedToDelivered($id)
    {

        Order::findOrFail($id)->update([
            'status' => 'Delivered',
            'delivered_date' => Carbon::now()->format('d F Y'),
        ]);

        $notification = array(
            'message' => 'Delivered order Success',
            'alert-type' => 'success'
        );
        return redirect()->route('shipped.orders')->with($notification);
    }
    /////////////////////////////////////////////Invoice Download
    public function invoiceDownload($id)
    {
        $order = Order::where('id', $id)->first();
        $orderItems = OrderItem::where('order_id', $id)->orderBy('id', 'DESC')->get();

        $pdf = PDF::loadView('admin.orders.invoice', compact('order', 'orderItems'))->setPaper('a4');

        return $pdf->download('invoice.pdf');
    }
}
