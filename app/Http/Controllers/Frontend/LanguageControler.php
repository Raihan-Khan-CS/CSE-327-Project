<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LanguageControler extends Controller
{
    //English Language
    public function english(){
        Session()->get('language');
        Session()->forget('language');
        Session::put('language','english');
        return Redirect()->back();
    }
     //Bangla Language
     public function bangla(){
        Session()->get('language');
        Session()->forget('language');
        Session::put('language','bangla');
        return Redirect()->back();

    }
}
