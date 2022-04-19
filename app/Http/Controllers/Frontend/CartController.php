<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    //Add To Cart
    public function addToCartStore(Request $request,$id){

        $product = Product::findOrFail($id);

        if($product->discount_price == NULL){

            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->qty,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                'color_en' => $request->color_en,
                'size_en' => $request->size_en,
                'image' => $product->product_thambnail,
                ],
                ]);
                return response()->json(['success'=> 'successfully Add on your cart']);
        }else{
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->qty,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                'color_en' => $request->color_en,
                'size_en' => $request->size_en,
                'image' => $product->product_thambnail,
                ],
                ]);
                return response()->json(['success'=> 'successfully Add on your cart']);
        }
     }
     // Add Mini Cart
     public function miniCart(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::subtotal();

        return response()->json(array(
            'carts'=> $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),
        ));
     }
     // Minicart Remove
     public function minicartRemove($rowId){

        Cart::remove($rowId);
        return response()->json(['success'=> 'Cart Remove Success']);
     }
}
