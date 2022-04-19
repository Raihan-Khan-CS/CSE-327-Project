<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //Search Products
    public function serachProduct(Request $request){

        $request->validate([
            'search_product'=>'required',
        ]);
       $products = Product::where('product_name_en',"LIKE","%".$request->search_product."%")
                ->where('product_name_bn',"LIKE","%".$request->search_product."%")
                ->OrWhere('product_name_bn',"LIKE","%".$request->search_product."%")
                ->OrWhere('product_tags_en',"LIKE","%".$request->search_product."%")
                ->OrWhere('product_tags_bn',"LIKE","%".$request->search_product."%")
                ->OrWhere('short_descp_en',"LIKE","%".$request->search_product."%")
                ->OrWhere('short_descp_bn',"LIKE","%".$request->search_product."%")->paginate(10);
                return view('frontend.search.index',compact('products'));

    }
    // Search By Ajax Product Auto Sassetion
    public function findProducts(Request $request){

        $request->validate([
            'search_product'=>'required',
        ]);
       $products = Product::where('product_name_en',"LIKE","%".$request->search_product."%")
                ->where('product_name_bn',"LIKE","%".$request->search_product."%")
                ->OrWhere('product_name_bn',"LIKE","%".$request->search_product."%")
                ->OrWhere('product_tags_en',"LIKE","%".$request->search_product."%")
                ->OrWhere('product_tags_bn',"LIKE","%".$request->search_product."%")
                ->OrWhere('short_descp_en',"LIKE","%".$request->search_product."%")
                ->OrWhere('short_descp_bn',"LIKE","%".$request->search_product."%")->take(8)->get();

                return view('frontend.search.result',compact('products'));
    }
}
