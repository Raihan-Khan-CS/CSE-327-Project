<?php

namespace App\Http\Controllers\Frontend;

use App\Models\MuliImg;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    //Category wise Product show
    public function catWiseProduct(Request $request, $id,$slug){

        $route = 'category/wise-product/';
        $catId = $id;
        $catSlug = $slug;
        $sort ='';
        if($request->sort != null){
            $sort = $request->sort;
        }

        if ($id == null) {
          return view('errors.404');
        }else{

            if ($sort == 'lowerToHigher') {
                $products = Product::where(['status'=>1, 'category_id' => $id])->orderBy('selling_price','ASC')->paginate(2);
            }elseif($sort == 'HigherToLower'){
                $products = Product::where(['status'=>1, 'category_id' => $id])->orderBy('selling_price','DESC')->paginate(10);
            }elseif ($sort == 'nameAtoZ') {
                $products = Product::where(['status'=>1, 'category_id' => $id])->orderBy('product_name_en','ASC')->paginate(2);
            }elseif ($sort == 'nameZtoA') {
                $products = Product::where(['status'=>1, 'category_id' => $id])->orderBy('product_name_en','DESC')->paginate(2);
            }else {
                $products = Product::where('status',1)->where('category_id',$id)->orderBy('id','DESC')->paginate(2);
            }
        }
        return view('frontend.categorywise-product',compact('products','route','catId','catSlug','sort'));
    }

    //Subcategory Wise Product show
    public function subCatProduct(Request $request,$id,$slug){

        $route = 'sub-categorywise/product/';
        $catId = $id;
        $catSlug = $slug;
        $sort ='';
        if($request->sort != null){
            $sort = $request->sort;
        }

        if ($id == null) {
          return view('errors.404');
        }else{

            if ($sort == 'lowerToHigher') {
                $products = Product::where(['status'=>1, 'subcategory_id' => $id])->orderBy('selling_price','ASC')->paginate(10);
            }elseif($sort == 'HigherToLower'){
                $products = Product::where(['status'=>1, 'subcategory_id' => $id])->orderBy('selling_price','DESC')->paginate(10);
            }elseif ($sort == 'nameAtoZ') {
                $products = Product::where(['status'=>1, 'subcategory_id' => $id])->orderBy('product_name_en','ASC')->paginate(10);
            }elseif ($sort == 'nameZtoA') {
                $products = Product::where(['status'=>1, 'subcategory_id' => $id])->orderBy('product_name_en','DESC')->paginate(10);
            }else {
                $products = Product::where('status',1)->where('subcategory_id',$id)->orderBy('id','DESC')->paginate(2);
            }
        }
        //Loadmore more Product with ajax

        if ($request->ajax()) {
            $grid_view = view('frontend.inc.grid-view-product',compact('products'))->render();
            $list_view = view('frontend.inc.list-view-product',compact('products'))->render();

            return response()->json(['grid_view' =>$grid_view,'list_view' =>$list_view]);
        }

        return view('frontend.subcatwise_product',compact('products','route','catId','catSlug','sort'));
    }
    // Brand Wise Product Show
    public function brandWisProduct($id,$slug){
        $products = Product::where('status',1)->where('brand_id',$id)->orderBy('id','DESC')->paginate(5);
        return view('frontend.bradwise_product',compact('products'));
    }
    // Product Tag wise Show
    public function tagwiseproductShow($id){

        $products= Product::where('status',$id)->where('product_tags_en',$id)->orWhere('product_tags_en',$id)->orderBy('id','ASC')->paginate(10);

        return view('frontend.tagswise_product',compact('products'));
    }
}
