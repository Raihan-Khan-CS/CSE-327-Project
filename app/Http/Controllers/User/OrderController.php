<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use PDF;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    //my Orders
    public function myOrder(){
        $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->paginate(10);
        return view('user.orders.myorder',compact('orders'));
    }
    // Return Order
    public function userReturnOrder(){
        $orders = Order::where('user_id',Auth::id())->where('return_reason','!=','NULL')->orderBy('id','DESC')->paginate(10);
        return view('user.orders.return-order',compact('orders'));
    }
    // Cancel Order
    public function cancelOrder(){
        $orders = Order::where('user_id',Auth::id())->where('status','Cancel')->orderBy('id','DESC')->paginate(10);
        return view('user.orders.cancel-order',compact('orders'));
    }
    // Order View
    public function orderView($id){

        $orders = Order::with('division','district','state','user')->where('user_id',Auth::id())->where('id',$id)->first();
        $orderItem = OrderItem::where('order_id',$id)->orderBy('id','DESC')->get();

        return view('user.orders.orderview',compact('orders','orderItem'));
    }
    // Invoice Download
    public function invoiceDownload($id){
        $order = Order::where('user_id',Auth::id())->where('id',$id)->first();
        $orderItems = OrderItem::where('order_id',$id)->orderBy('id','DESC')->get();
        
        $pdf = PDF::loadView('user.orders.invoice',compact('order','orderItems'))->setPaper('a4');
        // Image Show na korle sei khetre Use kora jete pare asset ar jaygay public_path hobe
        // ->setOptions([
        //     'tempDir' => public_path(),
        //     'chroot' => public_path(),
        // ]);
          return $pdf->download('invoice.pdf');
    }
    // User Order Return
    public function userReturnOrderSubmit(Request $request){
        $id = $request->id;
        Order::findOrFail($id)->update([
            'return_date' =>Carbon::now()->format('d F Y'),
            'return_reason' =>$request->return_reason,
        ]);
        $notification=array(
            'message'=>'Return Request Success',
            'alert-type'=>'success'
            );
            return Redirect()->route('my_orders')->with($notification);
    }
}
