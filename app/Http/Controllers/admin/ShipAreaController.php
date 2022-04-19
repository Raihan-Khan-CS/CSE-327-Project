<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use App\Models\ShipState;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShipAreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // Add Divisions
    public function addDivision(){

        $divisions = ShipDivision::orderBy('id','DESC')->paginate(8);
        return view('admin.shipdivision.index',compact('divisions'));
    }
    // Store Division
    public function storeDivison(Request $request){
        $request->validate([
            'division_name_en' =>'required',
            'division_name_bn' =>'required',
        ]);

        ShipDivision::insert([
            'division_name_en' =>$request->division_name_en,
            'division_name_bn' =>$request->division_name_bn,
            'created_at' =>Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Division Added Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
    // Edit Division
    public function divisionEdit($id){
        $division = ShipDivision::findOrFail($id);
        return view('admin.shipdivision.edit',compact('division'));
    }
    //Update Division
    public function updateDivision(Request $request){
        $request->validate([
            'division_name_en' =>'required',
            'division_name_bn' =>'required',
        ]);

        $id = $request->id;
        ShipDivision::findOrFail($id)->update([

            'division_name_en' =>$request->division_name_en,
            'division_name_bn' =>$request->division_name_bn,
            'updated_at' =>Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Division Update Success',
            'alert-type'=>'success'
             );
        return redirect()->route('division')->with($notification);
    }
    // Delete Division
    public function divisionDelete($id){
        ShipDivision::findOrFail($id)->delete();

        $notification=array(
            'message'=>'Division Delete Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
    //////////////////////////////////Add District Area///////////////////////////////////////////////
    public function addDistrict(){
        $districts = ShipDistrict::orderBy('id','DESC')->paginate(10);
        $divisions = ShipDivision::orderBy('id','ASC')->get();
        return view('admin.shipdistrict.index',compact('districts','divisions'));
    }

    // Store District
    public function storeDistrict(Request $request){
        $request->validate([
            'division_id' =>'required',
            'district_name_en' =>'required',
            'district_name_bn' =>'required',
        ]);
        ShipDistrict::insert([
            'division_id' =>$request->division_id,
            'district_name_en' =>$request->district_name_en,
            'district_name_bn' =>$request->district_name_bn,
            'created_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'District Added Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
    // Edit District
    public function editDistrict($id){

      $district =  ShipDistrict::findOrFail($id);
        $divisions = ShipDivision::orderBy('id','ASC')->get();
        return view('admin.shipdistrict.edit',compact('district','divisions'));
    }
    // District Update
    public function districtUpdate(Request $request){

        $request->validate([
            'division_id' =>'required',
            'district_name_en' =>'required',
            'district_name_bn' =>'required',
        ]);

        $id = $request->id;
        ShipDistrict::findOrFail($id)->update([
            'division_id' =>$request->division_id,
            'district_name_en' =>$request->district_name_en,
            'district_name_bn' =>$request->district_name_bn,
            'updated_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'District Update Success',
            'alert-type'=>'success'
             );
        return redirect()->route('district')->with($notification);
    }
    // District Delete
    public function districtDelete($id){

        ShipDistrict::findOrFail($id)->delete();
        $notification=array(
            'message'=>'District Delete Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
    ///////////////////////////////////////////Add State///////////////////////////////
    public function addState(){
        $state = ShipState::orderBy('id','DESC')->paginate(10);
        $divisions = ShipDivision::orderBy('id','ASC')->get();
        return view('admin.state.index',compact('state','divisions'));
    }
    // District Show Ajax
    public function getDistrictAjax($id){
        $district =ShipDistrict::where('division_id',$id)->orderBy('id','ASC')->get();
        return json_encode($district);
    }
    // State Store
    public function stateStore(Request $request){

        $request->validate([
            'division_id' =>'required',
            'district_id' =>'required',
            'state_name_en' =>'required',
            'state_name_bn' =>'required',
        ]);

        ShipState::insert([
            'division_id'=>$request->division_id,
            'district_id'=>$request->district_id,
            'state_name_en'=>$request->state_name_en,
            'state_name_bn'=>$request->state_name_bn,
            'created_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'State Added Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
    // State Edit
    public function stateEdit($id){
        $state = ShipState::findOrFail($id);
        $divisions = ShipDivision::orderBy('id','ASC')->get();
        $district =ShipDistrict::orderBy('id','ASC')->get();
        return view('admin.state.edit',compact('state','divisions','district'));
    }
    // State Update
    public function stateUpdate(Request $request){

        $request->validate([
            'division_id' =>'required',
            'district_id' =>'required',
            'state_name_en' =>'required',
            'state_name_bn' =>'required',
        ]);
        $id = $request->id;
        ShipState::findOrFail($id)->update([

            'division_id'=>$request->division_id,
            'district_id'=>$request->district_id,
            'state_name_en'=>$request->state_name_en,
            'state_name_bn'=>$request->state_name_bn,
            'updated_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'State Update Success',
            'alert-type'=>'success'
             );
        return redirect()->route('state')->with($notification);
    }
    // State Delete
    public function stateDelete($id){
        ShipState::findOrFail($id)->delete();
        $notification=array(
            'message'=>'State Delete Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
}
