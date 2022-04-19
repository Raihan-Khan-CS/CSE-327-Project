<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

class CouponsController extends Controller
{
    // Coupon Apply
    public function couponApply(Request $request){

        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();

        if($coupon){
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'coupon_amount' => round(Cart::subtotal() * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::subtotal() - Cart::subtotal() * $coupon->coupon_discount/100),
            ]);
            return response()->json(array(
                'coupon_validity' => true,
                'success' => 'Coupon Applied',
            ));
        }else{
            return response()->json(['success'=> 'Invalid Coupon']);
        }
    }
    /// Coupon Calculation With Ajax
    public function couponCalculation(){
        if(Session::has('coupon')){
            return response()->json(array(
                'subtotal' => Cart::subtotal(),
                'coupon_name' => session::get('coupon')['coupon_name'],
                'coupon_discount' => session::get('coupon')['coupon_discount'],
                'coupon_amount' => session::get('coupon')['coupon_amount'],
                'total_amount' => session::get('coupon')['total_amount'],
            ));
        }else{
            return response()->json(array(
                'total' => Cart::subtotal(),
            ));
        }
    }
    /// Coupon Remove with Ajax
    public function couponRemove(){
        Session::forget('coupon');

        return response()->json(['success'=> 'Coupon Remove Success']);
    }
    ////////////////////////////// Checkout Page////////////////////////////
    public function checkout(){
        if(Auth::check()){
            if(Cart::subtotal() > 0){
                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::subtotal();
                $divisions = ShipDivision::orderBy('id','DESC')->get();
                return view('frontend.checkout',compact('carts','cartQty','cartTotal','divisions'));
            }else{
                $notification=array(
                    'message'=>'Shopping First',
                    'alert-type'=>'error'
                    );
                    return Redirect()->to('/')->with($notification);
            }
        }else{

            $notification=array(
                'message'=>'You Need to login First',
                'alert-type'=>'error'
                );
                return Redirect()->route('login')->with($notification);
        }
    }
}
