<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //Brand Index
    public function index(){
        $brands = Brand::latest()->paginate(10);
        return view('admin.brand.index',compact('brands'));
    }
    //Brand Store
    public function brnadStore(Request $request){

        $request-> validate([
            'brand_name_en' => 'required',
            'brand_name_bn' => 'required',
            'brand_image' => 'required',
        ],[
            'brand_name_en.required' => 'Enter your Brand Name English',
            'brand_name_bn.required' => 'Enter your Brand Name Bangla',
        ]);

        $image = $request->file('brand_image');
        $img_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize('166','110')->save('public/frontend/assets/images/brand/'.$img_gen);
        $img_url = 'public/frontend/assets/images/brand/'.$img_gen;

        Brand::insert([
            'brand_name_en'=>$request->brand_name_en,
            'brand_name_bn'=>$request->brand_name_bn,
            'brand_slug_en'=>strtolower(str_replace(' ','-', $request->brand_name_en)),
            'brand_slug_bn'=>strtolower($request->brand_name_bn),
            'brand_image' => $img_url,
            'created_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Brand Added Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
    //Brand Delete
    public function brandDelete($id){

        $brand =Brand::findOrFail($id);
        $img = $brand->brand_image;
        unlink($img);
        Brand::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Brand Delete Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
    //Brand Edit
    public function brandEdit($id){
        $brands =Brand::findOrFail($id);
        return view('admin.brand.edit',compact('brands'));
    }
    //Brand Update
    public function brandUpdate(Request $request){

        $id= $request->id;
        $old_img =$request->old_img;

        if($request->file('brand_image')){
            unlink($old_img);
            $image = $request->file('brand_image');
            $img_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize('166','110')->save('public/frontend/assets/images/brand/'.$img_gen);
            $img_url = 'public/frontend/assets/images/brand/'.$img_gen;

            Brand::findOrFail($id)->update([
                'brand_name_en'=>$request->brand_name_en,
                'brand_name_bn'=>$request->brand_name_bn,
                'brand_slug_en'=>strtolower(str_replace(' ','-', $request->brand_name_en)),
                'brand_slug_bn'=>str_replace(' ','-', $request->brand_name_bn),
                'brand_image' => $img_url,
                'updated_at' => Carbon::now(),
            ]);
            $notification=array(
                'message'=>'Brand Updated Success',
                'alert-type'=>'success'
                 );
            return redirect()->route('brands')->with($notification);
        }else{

            Brand::findOrFail($id)->update([
                'brand_name_en'=>$request->brand_name_en,
                'brand_name_bn'=>$request->brand_name_bn,
                'brand_slug_en'=>strtolower(str_replace(' ','-', $request->brand_name_en)),
                'brand_slug_bn'=>strtolower($request->brand_name_bn),
                'updated_at' => Carbon::now(),
            ]);
            $notification=array(
                'message'=>'Brand Updated with out image Success',
                'alert-type'=>'success'
                 );
            return redirect()->route('brands')->with($notification);
        }

    }
}
