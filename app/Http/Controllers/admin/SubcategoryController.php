<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //subcategory
    public function index(){
        $subcategory = Subcategory::latest()->paginate(10);
        $category = Category::orderBy('category_name_en','ASC')->get();
        return view('admin.subcategory.index',compact('subcategory','category'));
    }
    //SubCat Store
    public function subCatStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_bn' => 'required',
        ],[
            'subcategory_name_en.required' =>'Subcat name English',
            'subcategory_name_bn.required' =>'Subcat name Bangla',
        ]);
            Subcategory::insert([
                'category_id' => $request->category_id,
                'subcategory_name_en' =>$request->subcategory_name_en,
                'subcategory_name_bn' =>$request->subcategory_name_bn,
                'subcategory_slug_en' =>strtolower(str_replace(' ','-', $request->subcategory_name_en)),
                'subcategory_slug_bn' =>str_replace(' ','-', $request->subcategory_name_bn),
                'created_at' => Carbon::now(),
            ]);
            $notification=array(
                'message'=>'Subcategory Added Success',
                'alert-type'=>'success'
                 );
            return redirect()->back()->with($notification);
    }
    //Subcat Edit
    public function subcatEdit($id){
        $subcategory= Subcategory::findOrFail($id);
        $category = Category::orderBy('category_name_en','ASC')->get();
        return view('admin.subcategory.edit',compact('subcategory','category'));
    }
    // Subcat Update
    public function subcatUpdate(Request $request){
        $id=$request->id;
        Subcategory::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' =>$request->subcategory_name_en,
            'subcategory_name_bn' =>$request->subcategory_name_bn,
            'subcategory_slug_en' =>strtolower(str_replace(' ','-', $request->subcategory_name_en)),
            'subcategory_slug_bn' =>str_replace(' ','-', $request->subcategory_name_bn),
            'updated_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Subcategory Delete Success',
            'alert-type'=>'success'
             );
        return redirect()->route('subcategory')->with($notification);
    }
     //SubCat Delete
     public function subcatDelete($id){
        Subcategory::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Subcategory Delete Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }


}

