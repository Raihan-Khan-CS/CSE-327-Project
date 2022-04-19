<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // Product Review
    public function adminReview(){
        $review = ProductReview::latest()->paginate(10);
        return view('admin.review.review',compact('review'));
    }
    // Product Destroy
    public function destroy($id){

        ProductReview::findOrFail($id)->delete();

        $notification=array(
            'message'=>'Product Review Delete',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);

    }
    // Product Review Approve
    public function approve($id){
        ProductReview::findOrFail($id)->update([
            'status'=> 'approve'
        ]);
        $notification=array(
            'message'=>'Approve Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
}
