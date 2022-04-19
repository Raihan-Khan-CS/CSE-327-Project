<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\MuliImg;
use App\Models\Product;
use App\Models\Wisthlisht;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class WishlishController extends Controller
{
    //Add to Wishlist
    public function addWishlist(Request $request, $id){
        if (Auth::check()){

            $exist = Wisthlisht::where('user_id',Auth::id())->where('product_id',$id)->first();
            if (!$exist){
                Wisthlisht::insert([
                    'user_id' =>Auth::id(),
                    'product_id'=>$id,
                    'created_at' =>Carbon::now(),
                ]);
            }else{
                return response()->json(['error'=> 'Wishlist already exist']);
            }
            return response()->json(['success'=> 'Successfully added on your Wishlist']);

        }else{
            return response()->json(['error'=> 'At first login your account!']);
        }
    }
    //wishlish Page
    public function wislishPage(){
        if(Auth::check()){

            Wisthlisht:: with('product')->where('user_id', Auth::id())->latest()->get();
        }else{
            $notification=array(
                'message'=>'Please at first login your account',
                'alert-type'=>'success'
                 );
            return redirect()->route('login')->with($notification);
        }

        return view('user.wishlist-page');
    }
    // All Wishlist Product Show
    public function allWishlistProduct(){
        $wishlist = Wisthlisht:: with('product')->where('user_id', Auth::id())->latest()->get();
        return response()->json($wishlist);
    }
    // Wishlist Remove
    public function wishlistRemove($id){

         Wisthlisht::with('product')->where('user_id',Auth::id())->where('id',$id)->delete();

        return response()->json(['success'=> 'wishlist Removed success']);
    }
}
