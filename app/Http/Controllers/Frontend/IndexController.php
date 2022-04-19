<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\MuliImg;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Laravel\Socialite\Facades\Socialite;
use Gloudemans\Shoppingcart\Facades\Cart;

class IndexController extends Controller
{
    //Frontend Index
    public function index(){
        $slider = Slider::where('status',1)->orderBy('id','DESC')->get();
        $products = Product::where('status',1)->orderBy('id','DESC')->get();
        $hot_deals = Product::where('status',1)->where('hot_deals')->orderBy('id','DESC')->get();
        $new_arraivals = DB::table('products')
                        ->join('categories','products.category_id','categories.id')
                        ->select('products.*','categories.category_name_en','categories.category_name_bn')
                        ->where('products.status',1)->orderBy('id','DESC')->get();
        $category_skip_0 = Category::skip(0)->first();
        $brand_skip_1 = Brand::skip(2)->first();
        $product_skip_0 = Product::where('status',1)->where('category_id',$category_skip_0->id)->orderBy('id','DESC')->get();
        // $product_skip_1 = Product::where('status',1)->where('brand_id',$brand_skip_1->id)->orderBy('id','DESC')->get();

        $category = Category::orderBy('id','DESC')->get();
        return view('frontend.index',compact('slider','products','hot_deals','new_arraivals','category_skip_0','product_skip_0','brand_skip_1','category'));
    }
    // Single Product Details
    public function singleProduct($product_id,$slug){

        $product = Product::findOrFail($product_id);
        // Color en
        $color_en = $product->product_color_en;
        $product_en = explode(',',$color_en);
        //color bn
        $color_bn = $product->product_color_bn;
        $product_bn = explode(',',$color_bn);
        // Size en
        $size_en = $product->product_size_en;
        $product_size_en = explode(',',$size_en);
        // size bn
        $size_bn = $product->product_size_bn;
        $product_size_bn = explode(',',$size_bn);
        $cat_id = $product->category_id;
        $catWiseProduct = Product::where('status',1)->where('category_id',$cat_id)->where('id','!=',$product_id)->orderBy('id','DESC')->get();
        $multiImgs = MuliImg::where('product_id',$product_id)->orderBy('id','DESC')->get();

        // Product Review
        $productReview = ProductReview::where('product_id',$product_id)->where('status','approve')->latest()->get();
        $count = count($productReview);
        $productRating = ProductReview::where('product_id',$product_id)->where('status','approve')->avg('rating');
        $avgRating = number_format($productRating,1);

        return view('frontend.single_product',compact('product','multiImgs','product_en','product_bn','product_size_en','product_size_bn','catWiseProduct','productReview','count', 'avgRating'));
    }
    // Subcategory Wise Product Show
    public function subCatWiseProduct($id,$slug){
        $products = Product::where('status',1)->where('subcategory_id',$id)->orderBy('id','DESC')->get();
        $categories = Category::orderBy('category_name_en','DESC')->get();
        return view('frontend.subcatwise_product',compact('products','categories'));

    }
    // // Quick View
    // public function quickView($id){
    //     echo 'osudlagbe';
    // }



/////////////////////////////
        public function redirect($provider)
        {
            return Socialite::driver($provider)->redirect();
        }

        public function callback($provider)
        {
            $getInfo = Socialite::driver($provider)->user();
            $user = $this->createUser($getInfo,$provider);
            auth()->login($user);
            return redirect()->to('/home');
        }
        function createUser($getInfo,$provider){

         $user = User::where('provider_id', $getInfo->id)->first();

         if (!$user) {
             $user = User::create([
                'name'     => $getInfo->name,
                'email'    => $getInfo->email,
                'phone'    => '+088**********',
                'password'    => bcrypt('12345678'),
                'image' => 'public/frontend/pp.png',
                'provider' => $provider,
                'provider_id' => $getInfo->id
            ]);
          }
          return $user;
        }
}
