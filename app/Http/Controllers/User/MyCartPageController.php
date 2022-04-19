<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class MyCartPageController extends Controller
{
    //my Cart Page
    public function myCartPage(){

        return view('user.mycartpage');
    }
    // All My Cart Page
    public function allMyCart(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::subtotal();

        return response(array(
            'carts'=> $carts,
            'cartQty'=> $cartQty,
            'cartTotal'=> round($cartTotal),
        ));
    }
    // My Cart Destroy
    public function destroy($rowId){
        Cart::remove($rowId);
        /// coupon forget
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        return response()->json(['success' => 'successfully card remove']);
    }
    // Cart increment
    public function increment($rowId){
        $id = Cart::get($rowId);
        Cart::update($rowId, $id-> qty + 1);

        if(Session::has('coupon')){
            $coupon_name = session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'coupon_amount' => round(Cart::subtotal() * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::subtotal() - Cart::subtotal() * $coupon->coupon_discount/100),
            ]);
        }
        return response()->json('Increment');
    }
    // Cart Decrement
    public function decrement( $rowId){
        $id = Cart::get($rowId);
        Cart::update($rowId, $id-> qty - 1);
        if(Session::has('coupon')){
            $coupon_name = session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'coupon_amount' => round(Cart::subtotal() * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::subtotal() - Cart::subtotal() * $coupon->coupon_discount/100),
            ]);
        }
        return response()->json('Decrement');
    }
}
