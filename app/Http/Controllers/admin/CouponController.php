<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // Coupon Create
    public function couponCreate(){
        $coupons = Coupon::orderBy('id','DESC')->paginate(5);

        return view('admin.coupon.coupon',compact('coupons'));
    }
    // Coupon Store
    public function couponStore(Request $request){

        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',
        ]);

        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Coupon Added Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
    // Coupon Edit
    public function couponEdit($id){

        $coupon = Coupon::findOrFail($id);

        return view('admin.coupon.edit',compact('coupon'));
    }
    // Coupon Update
    public function couponUpdate(Request $request){

        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',
        ]);
        $id = $request->id;

        Coupon::findOrFail($id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'updated_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Coupon Update Success',
            'alert-type'=>'success'
             );
        return redirect()->route('coupon')->with($notification);
    }
    //Coupon Delete
    public function couponDelete($id){

        Coupon::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Coupon Delete Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
    // Product Active Inactive
    public function couponInactive($id){
        Coupon::findOrFail($id)->update(['status' => 0]);
        $notification=array(
            'message'=>'Coupon Inactive Success',
            'alert-type'=>'success'
            );
        return redirect()->back()->with($notification);
    }
    // Product Active
    public function couponActive($id){
        Coupon::findOrFail($id)->update(['status' => 1]);
        $notification=array(
            'message'=>'Coupon Active Success',
            'alert-type'=>'success'
            );
        return redirect()->back()->with($notification);
    }

}
