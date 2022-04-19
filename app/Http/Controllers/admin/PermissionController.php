<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
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
        $permissions =Permission::with('role')->get();
        return view('admin.permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::latest()->get();
        return view('admin.permission.create',compact('role'));
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
            'role_id'=> 'required|numeric|unique:permissions,role_id'
        ]);

        Permission::create($request->all());
        $notification=array(
            'message'=>'Permission Create Success',
            'alert-type'=>'success'
             );
        return redirect()->route('permission.index')->with($notification);
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
        $permission =Permission::findOrFail($id);
        $role =Role::orderBy('id','DESC')->get();
        return view('admin.permission.edit',compact('permission','role'));
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
            'role_id'=> 'required|exists:permissions,role_id'
        ]);

        Permission::findOrFail($id)->update($request->all());

        $notification=array(
            'message'=>'Parmission Updated Success',
            'alert-type'=>'success'
             );
        return redirect()->route('permission.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Parmission Delete Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
}
