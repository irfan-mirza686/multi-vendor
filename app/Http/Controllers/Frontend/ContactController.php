<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $pageTitle = "Contact Us";
        $categories = array();
        return view('frontend.pages.contact',compact('pageTitle','categories'));
    }
}
