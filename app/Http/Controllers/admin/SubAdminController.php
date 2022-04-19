<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SubAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin =Admin::with('role')->get();
        return view('admin.subadmin.index',compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::latest()->get();
        return view('admin.subadmin.create',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:admins,email',
            'phone'=> 'required|unique:admins,phone',
            'password'=> 'required|min:6|confirmed',
            'role_id'=> 'required|numeric',
        ]);
            $request['password'] = Hash::make($request->password);
        Admin::create($request->all());
        $notification=array(
            'message'=>'Permission Create Success',
            'alert-type'=>'success'
             );
        return redirect()->route('subadmin.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin =Admin::findOrFail($id);
        $role =Role::orderBy('id','DESC')->get();
        return view('admin.subadmin.edit',compact('admin','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email',
            'phone'=> 'required',
            'password'=> 'nullable|min:6|confirmed',
            'role_id'=> 'required|numeric',
        ]);

        if ($request->password === null) {

            $request['password'] = Auth::user()->password;
        }else {
            $request['password'] = Hash::make($request->password);
        }
        Admin::findOrFail($id)->update($request->all());

        $notification=array(
            'message'=>'Admin Update Success',
            'alert-type'=>'success'
             );
        return redirect()->route('subadmin.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Delete Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
}
