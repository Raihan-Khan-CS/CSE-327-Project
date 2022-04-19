<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MuliImg;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //Stock Management
    public function index(){

        $product= Product::latest()->paginate(10);

        return view('admin.stock.index',compact('product'));
    }

    /// Edit
    public function edit($id){

         $product = Product::findOrFail($id);
        return view('admin.stock.edit',compact('product'));
    }
    //Update
    public function update(Request $request,$id){

        Product::findOrFail($id)->update([
            'product_qty' =>$request->product_qty,
            'created_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Product Stock Update Success',
            'alert-type'=>'success'
             );
        return redirect()->route('product.stock')->with($notification);
    }

}
