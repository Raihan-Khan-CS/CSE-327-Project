<?php

namespace App\Http\Controllers\Frontend;

use App\Models\MuliImg;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;


class AjaxModalController extends Controller
{
    //Quick View Modal with Ajax
    public function quickViewModal($id){
        $product = Product::with('category','brand')->findOrFail($id);
       //Product color
      $color = $product->product_color_en;
      $color_en = explode(',',$color);

        //Size
        $size = $product->product_size_en;
        $size_en = explode(',',$size);

        // $multiImgs = MuliImg::where('product_id',$id)->get();
        // $multiImgs = MuliImg::where('product_id',$id)->orderBy('id','DESC')->get();

        return response()->json(array(
            'product' =>$product,
            'color_en' =>$color_en,
            'size_en' =>$size_en,
            // 'multiImgs' =>$multiImgs,

        ));
    }
}
