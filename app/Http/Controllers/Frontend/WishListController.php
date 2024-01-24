<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function index()
    {
        $pageTitle = "WishList";
        $categories = array();
        return view('frontend.pages.wishlist',compact('pageTitle','categories'));
    }
}
