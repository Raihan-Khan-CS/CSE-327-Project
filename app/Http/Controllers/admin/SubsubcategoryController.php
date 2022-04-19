<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Subsubcategory;
use App\Http\Controllers\Controller;

class SubsubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //index
    public function index(){
        $category = Category::latest()->get();
        $subsubcategory =Subsubcategory::latest()->paginate(10);
        return view('admin.subsubcategory.index',compact('category','subsubcategory'));
    }
    // Get Subcategory With Ajax
    public function getSubcategoy($cat_id){
        $subcat =Subcategory::where('category_id',$cat_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }
     // //SubSub Category Store
     public function subsubCatStore(Request $request){
        $request->validate([
            'category_id' =>'required',
            'subcategory_id' =>'required',
            'subsubcategory_name_en' =>'required',
            'subsubcategory_name_bn' =>'required',
        ],[
            'category_id.required' =>'Select Your Category Name',
            'subcategory_id.required' =>'Select Your SubCategory Name',
            'subsubcategory_name_en.required' =>'Enter Your SubsubCategory Name Englis',
            'subsubcategory_name_bn.required' =>'Enter Your SubsubCategory Name Bangla',
        ]);
        Subsubcategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'subsubcategory_name_en'=>$request->subsubcategory_name_en,
            'subsubcategory_name_bn'=>$request->subsubcategory_name_bn,
            'subsubcategory_slug_en'=>strtolower(str_replace(' ','-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_bn'=>str_replace(' ','-', $request->subsubcategory_name_bn),
            'created_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Subcategory Added Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
    //SubsubCategory Edit
    public function subsubEdit($id){

        $subsubcategory=Subsubcategory::findOrFail($id);
        $subcategory =Subcategory::orderBy('subcategory_name_en','ASC')->get();
        $category =Category::orderBy('category_name_en','ASC')->get();
        return view('admin.subsubcategory.edit',compact('subsubcategory','subcategory','category'));
    }
    //SubSub Category Update
    public function subsubCatUpdate(Request $request){
        $id = $request->id;

        $request->validate([
            'category_id' =>'required',
            'subcategory_id' =>'required',
            'subsubcategory_name_en' =>'required',
            'subsubcategory_name_bn' =>'required',
        ],[
            'category_id.required' =>'Select Your Category Name',
            'subcategory_id.required' =>'Select Your SubCategory Name',
            'subsubcategory_name_en.required' =>'Enter Your SubsubCategory Name English',
            'subsubcategory_name_bn.required' =>'Enter Your SubsubCategory Name Bangla',
        ]);
        Subsubcategory::findOrFail($id)->update([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'subsubcategory_name_en'=>$request->subsubcategory_name_en,
            'subsubcategory_name_bn'=>$request->subsubcategory_name_bn,
            'subsubcategory_slug_en'=>strtolower(str_replace(' ','-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_bn'=>str_replace(' ','-', $request->subsubcategory_name_bn),
            'updated_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'SubSubcategory Update Success',
            'alert-type'=>'success'
             );
        return redirect()->route('subsubcategory')->with($notification);
    }
      // SubSub Category Delete
      public function subsubcatDelete($id){
        Subsubcategory::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Subcategory Delete Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
}

