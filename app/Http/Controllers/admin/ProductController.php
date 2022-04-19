<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Subsubcategory;
use App\Http\Controllers\Controller;
use App\Models\MuliImg;
use App\Models\Subcategory;
use Intervention\Image\Facades\Image;
use PhpParser\Parser\Multiple;
use SebastianBergmann\Complexity\Complexity;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // Add Product
    public function addProduct(){
        $brand= Brand::latest()->get();
        $category =Category::latest()->get();
        return view('admin.product.create',compact('brand','category'));
    }
    // getSubSubcategoy With Ajax
    public function getSubSubcategoy($id){
        $subsubcat =Subsubcategory::where('subcategory_id',$id)->orderBy('subsubcategory_name_en','ASC')->get();
        return json_encode($subsubcat);
    }
    // Product Store
    public function productStore(Request $request){

        $request->validate([
            'brand_id' =>'required',
            'category_id' =>'required',
            'subcategory_id' =>'required',
            'product_name_en' =>'required',
            'product_name_bn' =>'required',
            'product_code' =>'required',
            'product_qty' =>'required',
            'product_tags_en' =>'required',
            'product_tags_bn' =>'required',
            'selling_price' =>'required',
            'discount_price' =>'required',
            'short_descp_en' =>'required',
            'short_descp_bn' =>'required',
            'long_descp_en' =>'required',
            'long_descp_bn' =>'required',
            'product_thambnail' =>'required',
            'multi_img' =>'required',
            'secound_image' =>'required',
        ]);
        $image = $request->file('product_thambnail');
        $img_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize('360','360')->save('public/frontend/images/products/product-thambail/'.$img_gen);
        $img_url = 'public/frontend/images/products/product-thambail/'.$img_gen;

        $image = $request->file('secound_image');
        $img_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize('360','360')->save('public/frontend/images/products/product-thambail/'.$img_gen);
        $secound_img = 'public/frontend/images/products/product-thambail/'.$img_gen;


       $product_id = Product::insertGetId([
            'brand_id' =>$request->brand_id,
            'category_id' =>$request->category_id,
            'subcategory_id' =>$request->subcategory_id,
            'subsubcategory_id' =>$request->subsubcategory_id,
            'product_name_en' =>$request->product_name_en,
            'product_name_bn' =>$request->product_name_bn,
            'product_slug_en' =>strtolower(str_replace(' ','-',$request->product_name_en)),
            'product_slug_bn' =>str_replace(' ','-',$request->product_name_bn),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bn' => $request->product_tags_bn,
            'product_size_en' => $request->product_size_en,
            'product_size_bn' => $request->product_size_bn,
            'product_color_en' => $request->product_color_en,
            'product_color_bn' => $request->product_color_bn,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_bn' => $request->short_descp_bn,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_bn' => $request->long_descp_bn,
            'best_seller' => $request->best_seller,
            'featured' => $request->featured,
            'hot_deals' => $request->hot_deals,
            'new_arrivals' => $request->new_arrivals,
            'product_thambnail'=>$img_url,
            'secound_image'=>$secound_img,
            'created_at' => Carbon::now(),
        ]);

        ///////////////////////////Multiple Image Inset start Here/////////////////////////////////////
            $images = $request->file('multi_img');
            foreach ($images as $img) {
                $img_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize('360','360')->save('public/frontend/images/products/multi-img/'.$img_gen);
                $uploads = 'public/frontend/images/products/multi-img/'.$img_gen;

            MuliImg::insert([
                'product_id' =>$product_id,
                'image_name' =>$uploads,
                'created_at' => Carbon::now(),
                ]);
        }
        ///////////////////////////Multiple Image Inset End Here/////////////////////////////////////
        $notification=array(
            'message'=>'Product Added Success',
            'alert-type'=>'success'
             );
        return redirect()->route('product.manage')->with($notification);
    }
    //Product Manage
    public function productManage(){

        $product= Product::latest()->paginate(7);
        return view('admin.product.manage',compact('product'));
    }
    //Product Edit
    public function productEdit($product_id){
        $product =Product::findOrFail($product_id);
        $brand= Brand::latest()->get();
        $category =Category::latest()->get();
        $subcategory =Subcategory::latest()->get();
        $subsubcategory =Subsubcategory::latest()->get();
        $multiImags = MuliImg::where('product_id',$product_id)->latest()->get();
        return view('admin.product.edit',compact('product','brand','category','multiImags','subcategory','subsubcategory'));
    }
    //Product View
    public function productView($product_id){
        $product =Product::findOrFail($product_id);
        $brand= Brand::latest()->get();
        $category =Category::latest()->get();
        $subcategory =Subcategory::latest()->get();
        $subsubcategory =Subsubcategory::latest()->get();
        $multiImags = MuliImg::where('product_id',$product_id)->latest()->get();
        return view('admin.product.view',compact('product','brand','category','multiImags','subcategory','subsubcategory'));
    }
    // Product Update without Image
    public function productUpdate(Request $request){
        $request->validate([
            'subcategory_id' =>'required',
        ]);
        $id = $request->id;
        Product::findOrFail($id)->update([
            'brand_id' =>$request->brand_id,
            'category_id' =>$request->category_id,
            'subcategory_id' =>$request->subcategory_id,
            'subsubcategory_id' =>$request->subsubcategory_id,
            'product_name_en' =>$request->product_name_en,
            'product_name_bn' =>$request->product_name_bn,
            'product_slug_en' =>strtolower(str_replace(' ','-',$request->product_name_en)),
            'product_slug_bn' =>str_replace(' ','-',$request->product_name_bn),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bn' => $request->product_tags_bn,
            'product_size_en' => $request->product_size_en,
            'product_size_bn' => $request->product_size_bn,
            'product_color_en' => $request->product_color_en,
            'product_color_bn' => $request->product_color_bn,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_bn' => $request->short_descp_bn,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_bn' => $request->long_descp_bn,
            'best_seller' => $request->best_seller,
            'featured' => $request->featured,
            'hot_deals' => $request->hot_deals,
            'new_arrivals' => $request->new_arrivals,
            'updated_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Product Update Without Image Success',
            'alert-type'=>'success'
             );
        return redirect()->route('product.manage')->with($notification);
    }
    // Product Update Thambnail Image
    public function productThamnailUpdate(Request $request){

        $id = $request->id;
        $old_img = $request->old_img;
        $old_img2 = $request->old_img2;

        if($request->file('product_thambnail')){

            $image = $request->file('product_thambnail');
            unlink($old_img);
            $img_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize('360','360')->save('public/frontend/images/products/product-thambail/'.$img_gen);
            $uploads = 'public/frontend/images/products/product-thambail/'.$img_gen;

            Product::findOrFail($id)->update([
                'product_thambnail' =>$uploads,
                'updated_at' => Carbon::now(),
            ]);
            $notification=array(
                'message'=>'Product Update Thambnail & Scound Image Success',
                'alert-type'=>'success'
                 );
            return redirect()->back()->with($notification);
        }else{
            $image = $request->file('secound_image');
            unlink($old_img2);
            $img_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize('360','360')->save('public/frontend/images/products/product-thambail/'.$img_gen);
            $url_img2 = 'public/frontend/images/products/product-thambail/'.$img_gen;

            Product::findOrFail($id)->update([
                'secound_image' =>$url_img2,
                'updated_at' => Carbon::now(),
            ]);
            $notification=array(
                'message'=>'Product Update Thambnail & Scound Image Success',
                'alert-type'=>'success'
                 );
            return redirect()->back()->with($notification);
        }
    }
    /////////////////////////// Multiple Image Update////////
    public function producMultiImg(Request $request){
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $img_del = MuliImg::findOrFail($id);
            unlink($img_del->image_name);
            $img_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize('360','360')->save('public/frontend/images/products/multi-img/'.$img_gen);
            $uploads = 'public/frontend/images/products/multi-img/'.$img_gen;

            MuliImg::where('id',$id)->update([
                'image_name' => $uploads,
                'updated_at' => Carbon::now(),
            ]);
        }
        $notification=array(
            'message'=>'Product Thambnail Image Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
    //////// MultiImage Delete
    public function multiImgDelete($id){
        $old_img = MuliImg::findOrFail($id);
        unlink($old_img->image_name);
        MuliImg::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Product MultiImg delete Success',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
/////////////////////////////////////////Product Delete/////////////////////
    public function productDelete($id){
        $old_img =Product::findOrFail($id);
        unlink($old_img->product_thambnail);
        unlink($old_img->secound_image);
        Product::findOrFail($id)->delete();
        $multi_img = MuliImg::where('product_id',$id)->get();
        foreach ($multi_img as $img) {
            unlink($img->image_name);
            MuliImg::where('product_id',$id)->delete();
        }
        $notification=array(
            'message'=>'Product Delete Success',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    // Product Active Inactive
    public function productInactive($id){
        Product::findOrFail($id)->update(['status' => 0]);
        $notification=array(
            'message'=>'Product Inactive Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
      // Product Active
      public function productActive($id){
        Product::findOrFail($id)->update(['status' => 1]);
        $notification=array(
            'message'=>'Product Active Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }

}
