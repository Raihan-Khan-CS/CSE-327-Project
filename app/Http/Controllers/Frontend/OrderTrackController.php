<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderTrackController extends Controller
{
    //Order Tracking
    public function orderTracking(Request $request){
        $order = Order::with('division','district','state','user')->where('invoice_no',$request->invoice_on)->first();

        if ( $order) {
            $orderItems = OrderItem::where('order_id',$order->id)->orderBy('id','DESC')->get();
            return view('frontend.track.index',compact('order','orderItems'));
        }else{
            $notification=array(
                'message'=>'Tracking Not Match',
                'alert-type'=>'error'
                );
                return Redirect()->back()->with($notification);
        }
    }
}
