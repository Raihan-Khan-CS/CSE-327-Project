<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class MyprofileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //My Profile Show
    public function myProfile(){
        return view('admin.profile.myprofile');
    }
    //Admin Edit Profile
    public function editProfile(){
        $admin = Admin::latest()->first();
        return view('admin.profile.edit',compact('admin'));
    }
    //Update Profile
    //Update Profile
    public function profileUpdate(Request $request){

        $old_img = $request->old_img;

        if(Admin::findOrFail(Auth::id())->image === 'public/admin/baby.jpg'){

            $img =$request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(166,110)->save('public/admin/images/user/'.$name_gen);
            $save_url='public/admin/images/user/'.$name_gen;

            Admin::findOrFail(Auth::user()->id)->update([
              'name' =>$request->name,
              'email' =>$request->email,
              'phone' =>$request->phone,
              'address' =>$request->address,
              'image' =>$save_url,
              'updated_at' => Carbon::now(),
            ]);
            $notification=array(
                'message'=>'image soho update',
                'alert-type'=>'success'
                 );
            return redirect()->back()->with($notification);

        }else{
            if($request->file('image')){
                $img =$request->file('image');
                unlink($old_img);
                $name_gen=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(166,110)->save('public/admin/images/user/'.$name_gen);
                $save_url='public/admin/images/user/'.$name_gen;

                Admin::findOrFail(Auth::user()->id)->update([
                'name' =>$request->name,
                'email' =>$request->email,
                'phone' =>$request->phone,
                'address' =>$request->address,
                'image' =>$save_url,
                'updated_at' => Carbon::now(),
                ]);
                $notification=array(
                    'message'=>'Profile Update Successfully',
                    'alert-type'=>'success'
                    );
                return redirect()->back()->with($notification);
            }else{
                Admin::findOrFail(Auth::user()->id)->update([
                    'name' =>$request->name,
                    'email' =>$request->email,
                    'phone' =>$request->phone,
                    'address' =>$request->address,
                    'updated_at' => Carbon::now(),
                    ]);
                    $notification=array(
                        'message'=>'Profile Update Successfully',
                        'alert-type'=>'success'
                        );
                    return redirect()->back()->with($notification);
            }
        }
}
    // Update PassWord
    public function updatePassword(Request $request){
        $request->validate([

            'old_password'=> 'required',
            'new_password'=> 'required',
            'confirmation_password'=> 'required',
        ]);
        $db_pass = Auth::user()->password;
        $current_password = $request->old_password;
        $new_pass = $request->new_password;
        $confirm_pass = $request->confirmation_password;
        if (Hash::check($current_password,$db_pass)) {
        if ($new_pass=== $confirm_pass) {

            Admin::findOrFail(Auth::id())->update([
            'password' => Hash::make($new_pass)
            ]);
            Auth::logout();
            $notification=array(
        'message'=>'New Password Change Success and now login with new password',
        'alert-type'=>'success'
        );
        return Redirect()->route('login.admin')->with($notification);

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
    public function abcd(){
        return view('admin.abc');
    }
    //////////////////////////////////////All Users Show
    public function allUsers(){
        $user = User::orderBy('id','DESC')->paginate(10);

        return view('admin.users.all-user',compact('user'));
    }
    ////////////////////////////////////// activeUsers
    public function activeUsers($id){
        $user = User::where('id',$id)->orderBy('id','ASC')->get();
        return view('admin.users.active-user',compact('user'));
    }
    ///// User Banned and Unbanned
    public function userBanned($id){
        User::findOrFail($id)->update([
            'inban' => 1,
        ]);
        $notification=array(
            'message'=>'User Banned Success',
            'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
    }
    public function userUnBanned($id){
        User::findOrFail($id)->update([
            'inban' => 0,
        ]);
        $notification=array(
            'message'=>'User UnBanned Success',
            'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
    }
    // searchByUser
    public function searchByUser(Request $request){

        $course = DB::table('users')->where('name','like', '%'.$request->get('searchQuesr'). '%')->OrWhere('inban','like', '%'.$request->get('searchQuesr',). '%')->OrWhere('email','like', '%'.$request->get('searchQuesr',). '%')->get();
        return json_encode($course);
    }
}
