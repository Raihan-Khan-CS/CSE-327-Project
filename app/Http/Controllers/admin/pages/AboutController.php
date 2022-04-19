<?php

namespace App\Http\Controllers\admin\pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //About Pages
    public function index(){
        return view('admin.pages.about.index');
    }
    // About Store
    public function aboutStore(Request $request){
        $request->validate([
        'title_description' =>'required',
        'team_description' =>'required',
        'bg_image' =>'required',
        ]);

        $image = $request->file('bg_image');
        $img_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize('1920','300')->save('public/frontend/assets/images/about-page/'.$img_gen);
        $img_url = 'public/frontend/assets/images/about-page/'.$img_gen;

        AboutPage::insert([
            'title_description'=>$request->title_description,
            'team_description'=>$request->team_description,
            'bg_image'=>$img_url,
            'created_at' =>Carbon::now(),
        ]);
        $notification=array(
            'message'=>'About Page Create Success',
            'alert-type'=>'success'
             );
        return redirect()->route('about.manage')->with($notification);
    }
    // About List
    public function aboutList(){
      $about = AboutPage::orderBy('id','ASC')->first();
        return view('admin.pages.about.manage',compact('about'));
    }
    // About Edit
    public function aboutEdit($id){
      $about_page =  AboutPage::findOrFail($id);
        return view('admin.pages.about.edit',compact('about_page'));
    }
    // About Update
    public function aboutUpdate(Request $request){

        $id= $request->id;
        $old_img =$request->old_img;

        if ($request->file('bg_image')) {
            unlink($old_img);
            $image = $request->file('bg_image');
            $img_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize('1920','300')->save('public/frontend/assets/images/about-page/'.$img_gen);
            $img_url = 'public/frontend/assets/images/about-page/'.$img_gen;

            AboutPage::findOrFail($id)->update([
                'title_description'=>$request->title_description,
                'team_description'=>$request->team_description,
                'bg_image'=>$img_url,
                'updated_at' =>Carbon::now(),
            ]);
            $notification=array(
                'message'=>'About Page Update Success',
                'alert-type'=>'success'
                 );
            return redirect()->route('about.manage')->with($notification);
        }else{
            AboutPage::findOrFail($id)->update([
                'title_description'=>$request->title_description,
                'team_description'=>$request->team_description,
                'updated_at' =>Carbon::now(),
            ]);
            $notification=array(
                'message'=>'About Page Update Success',
                'alert-type'=>'success'
                 );
            return redirect()->route('about.manage')->with($notification);
        }
    }
}
