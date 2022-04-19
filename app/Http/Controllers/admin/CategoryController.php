<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // Category Index
    public function index(){

        $categories = Category::latest()->paginate(10);
        return view('admin.category.index',compact('categories'));
    }
    //Category Store
    public function categoryStore(Request $request){
        $request->validate([
            'category_name_en' =>'required',
            'category_name_bn' =>'required',
        ],[
            'category_name_en.required' => 'Enter your Category Name English',
            'category_name_bn.required' => 'Enter your Category Name Bangla',
        ]);
        Category::insert([
            'category_name_en' =>$request->category_name_en,
            'category_name_bn' =>$request->category_name_bn,
            'category_slug_en' =>strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_bn' => str_replace(' ','-', $request->category_name_bn),
            'created_at' =>Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Category Added Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
    // Category Delete
    public function categoryDelete($id){
        Category::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Category Delete Success',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
    //Category Edit
    public function categoryEdit($id){
        $category = Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }
    // Category Update
    public function categoryUpdate(Request $request){
        $request->validate([
            'category_name_en' =>'required',
            'category_name_bn' =>'required',
        ],[
            'category_name_en.required' => 'Enter your Category Name English',
            'category_name_bn.required' => 'Enter your Category Name Bangla',
        ]);
            $id = $request->id;
            Category::findOrFail($id)->update([
                'category_name_en' =>$request->category_name_en,
                'category_name_bn' =>$request->category_name_bn,
                'category_slug_en' =>strtolower(str_replace(' ', '-', $request->category_name_en)),
                'category_slug_bn' => str_replace(' ','-', $request->category_name_bn),
                'updated_at' =>Carbon::now(),
            ]);
            $notification=array(
                'message'=>'Category Update Success',
                'alert-type'=>'success'
                 );
            return redirect()->route('category')->with($notification);
    }
}
