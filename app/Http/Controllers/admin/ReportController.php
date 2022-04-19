<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // Reports
    public function index(){
        return view('admin.report.index');
    }
    // Search By Date
    public function searchByDate(Request $request){

        $request->validate([
            'date' =>'required',
        ]);

        $date =  new DateTime($request->date);
        $dateFormat = $date->format('d F Y');

        $order = Order::where('order_date',$dateFormat)->latest()->paginate(10);

         return view('admin.report.reports',compact('order'));
    }
    // Seach By Month
    public function searchByMonth(Request $request){

        $request->validate([
            'month' =>'required',
            'year' =>'required',
        ]);
        $order = Order::where('order_month',$request->month)->where('order_year',$request->year)->latest()->paginate(50);
        return view('admin.report.reports',compact('order'));
    }
    // Seach By Year
    public function searchByYear(Request $request){
        $request->validate([
            'year_r' =>'required',
        ]);
        $order = Order::where('order_year',$request->year_r)->latest()->paginate(50);
        return view('admin.report.reports',compact('order'));
    }
}
