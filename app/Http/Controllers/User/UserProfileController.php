<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        $pageTitle = "Profile";
        $categories = Category::with('subcategories')->where('parent_category',0)->get();
        return view('user.profile.index', compact('pageTitle','categories'));
    }
}
