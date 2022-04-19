<?php

namespace App\Http\Controllers\User;

use App\Models\ShipState;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
     // District Show Ajax
     public function userDistrictAjax($id){
        $district =ShipDistrict::where('division_id',$id)->orderBy('id','ASC')->get();
        return json_encode($district);
    }
    // State Show with Ajax
    public function userStateAjax($id){
        $state =ShipState::where('district_id',$id)->orderBy('id','ASC')->get();
        return json_encode($state);
    }
    // Checkout Store
    public function checkoutStore(Request $request){

        $data = array();
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['notes'] = $request->notes;
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::subtotal();
        $divisions = ShipDivision::orderBy('id','DESC')->get();

        if(Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];
        }else {
            $total_amount = round(Cart::subtotal());
        }

        if ($request->payment_method == 'stripe') {
            return view('frontend.payment.stripe',compact('data','carts','cartQty','cartTotal','divisions'));

        }elseif ($request->payment_method == 'sslPayment') {

            return view('frontend.payment.sslpayment',compact('data','carts','cartQty','cartTotal','divisions','total_amount'));

        }elseif ($request->payment_method == 'sslEasy'){
            return view('frontend.payment.ssleasy',compact('data','carts','cartQty','cartTotal','divisions','total_amount'));

        }else{
            $notification=array(
                'message'=>'Please Select Your Payment Method',
                'alert-type'=>'error'
                 );
            return redirect()->back()->with($notification);
        }
     }
}
