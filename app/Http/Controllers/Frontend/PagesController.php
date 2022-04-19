<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    // About Pages
    public function aboutPage(){
       $about = AboutPage::orderBy('id','ASC')->first();
        return view('frontend.pages.about',compact('about'));
    }
    // About Pages
    public function contactPage(){
        return view('frontend.pages.contact');
    }
}
