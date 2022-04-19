<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    //Rating and Review
    public function review($id){
        $id = $id;
       return view('user.orders.review',compact('id'));
    }
    // Store Review
    public function storeReview(Request $request){
        $request->validate([
            'rating'=> 'required',
            'comment'=> 'required',
        ]);

        ProductReview::insert([
            'user_id' =>Auth::id(),
            'product_id' =>$request->product_id,
            'rating' =>$request->rating,
            'comment' =>$request->comment,
            'created_at' =>Carbon::now(),
        ]);

        $notification=array(
            'message'=>'Review done',
            'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
    }
}
