<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserProfileController extends Controller
{
    //User Update Profile
    public function updateProfile(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        User::findOrFail(Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        $notification=array(
            'message'=>'Update Profile Successfully',
            'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
    }
    // User Update Image
    public function userUpdatePage(){
       $user= User::findOrFail(Auth::id())->latest()->get();
        return view('user.update_image',compact('user'));
    }
    // User Update Image
    public function userUpdateImage(Request $request){

        $request->validate([
            'image' =>'required|mimes:jpg,jpeg,png,svg,webp',
        ]);

        $old_img = $request->old_img;

        if(User::findOrFail(Auth::id())->image === 'public/frontend/pp.png'){

            $image = $request->file('image');
            $img_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize('170','170')->save('public/frontend/assets/images/user/'.$img_gen);
            $img_url = 'public/frontend/assets/images/user/'.$img_gen;

            User::findOrFail(Auth::id())->update([
                'image' =>$img_url,
                'updated_at' => Carbon::now(),
            ]);
            $notification=array(
                'message'=>'Profile Image Update Successfully',
                'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
        }else{
            unlink($old_img);
            $image = $request->file('image');
            $img_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize('170','170')->save('public/frontend/assets/images/user/'.$img_gen);
            $img_url = 'public/frontend/assets/images/user/'.$img_gen;

            User::findOrFail(Auth::id())->update([
                'image' =>$img_url,
                'updated_at' => Carbon::now(),
            ]);
            $notification=array(
                'message'=>'Profile Image Update Successfully',
                'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
        }
    }
    //User Change Password
    public function userChangePassword(){
        return view('user.change_password');
    }
    // User Update Password
    public function userUpdatePassword(Request $request){

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirmation_password' => 'required',
        ]);

        $db_pass = Auth::user()->password;
        $current_password = $request->old_password;
        $new_pass = $request->new_password;
        $confirm_pass = $request->confirmation_password;
        if (Hash::check($current_password,$db_pass)) {
         if ($new_pass=== $confirm_pass) {

             User::findOrFail(Auth::id())->update([
             'password' => Hash::make($new_pass)
             ]);
             Auth::logout();
             $notification=array(
        'message'=>'New Password Change Success and now login with new password',
        'alert-type'=>'success'
         );
        return Redirect()->route('login')->with($notification);

         }else{
             $notification=array(
        'message'=>'New Password and confirm password not match',
        'alert-type'=>'error'
         );
        return Redirect()->back()->with($notification);
         }
        }else{
            $notification=array(
        'message'=>'Password Dose Not Match',
        'alert-type'=>'error'
         );
        return Redirect()->back()->with($notification);
        }
    }
}
