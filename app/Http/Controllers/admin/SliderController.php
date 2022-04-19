<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // index
    public function index(){
        $sliders = Slider::latest()->paginate(10);
        return view('admin.slider.index',compact('sliders'));
    }
    // slider Store
    public function sliderStore(Request $request){
        $request->validate([
            'slider_image' =>'required',
        ]);

        $image = $request->file('slider_image');
        $gen_img = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize('1920','690')->save('public/frontend/images/slider/'.$gen_img);
        $img_url ='public/frontend/images/slider/'.$gen_img;

        Slider::insert([
            'title_en' =>$request->title_en,
            'title_bn' =>$request->title_bn,
            'description_en' =>$request->description_en,
            'description_bn' =>$request->description_bn,
            'slider_image' => $img_url,
            'created_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'slider Added Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
    // Slider Edit
    public function sliderEdit($id){
        $sliders = Slider::findOrFail($id);
        return view('admin.slider.edit',compact('sliders'));
    }
    // Slider Update
    public function sliderUpdate(Request $request){
        $id = $request->id;
        $old_img = $request->old_img;

        if($request->file('slider_image')){
        unlink($old_img);
        $image = $request->file('slider_image');
        $gen_img = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize('1920','690')->save('public/frontend/images/slider/'.$gen_img);
        $img_url ='public/frontend/images/slider/'.$gen_img;

        Slider::findOrFail($id)->update([
            'title_en' =>$request->title_en,
            'title_bn' =>$request->title_bn,
            'description_en' =>$request->description_en,
            'description_bn' =>$request->description_bn,
            'slider_image' => $img_url,
            'updated_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'slider Updated Success',
            'alert-type'=>'success'
             );
        return redirect()->route('sliders')->with($notification);
    }else{
        Slider::findOrFail($id)->update([
            'title_en' =>$request->title_en,
            'title_bn' =>$request->title_bn,
            'description_en' =>$request->description_en,
            'description_bn' =>$request->description_bn,
            'updated_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'slider Updated Success',
            'alert-type'=>'success'
             );
        return redirect()->route('sliders')->with($notification);
    }
    }
    // Slider Delete
    public function sliderDelete($id){
        $img = Slider::findOrFail($id);
        unlink($img->slider_image);

        Slider::findOrFail($id)->delete();
        $notification=array(
            'message'=>'slider Delete Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
    // Slider Active Inactive
    public function sliderInactive($id){
        Slider::findOrFail($id)->update(['status' => 0]);
        $notification=array(
            'message'=>'slider Inactive Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
      // Slider Active
      public function sliderActive($id){
        Slider::findOrFail($id)->update(['status' => 1]);
        $notification=array(
            'message'=>'slider Active Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
}
