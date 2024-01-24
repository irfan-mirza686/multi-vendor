<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VendorProduct;
use App\Models\Slider;
use App\Models\Category;
use App\Services\Frontend\ShopService;

class HomeController extends Controller
{
    private $shopService;

    public function __construct(ShopService $shopService)
    {
        $this->shopService = $shopService;
    }
    /******************************************************/
    public function index(Request $request)
    {



        $pageTitle = "Home Page";
        $vendorProducts = VendorProduct::with(['product','vendor'])->latest()->take(10)->get();

        $baseURL = \Config::get('app.url');
        $page_name = "home_page";
        $categories = Category::with('subcategories')->where('parent_category',0)->get();
        // echo "<pre>"; print_r($categories->toArray()); exit();
        $sliders = Slider::where('status','active')->get();
        return view('frontend.home_page',compact('pageTitle','vendorProducts','baseURL','page_name','sliders','categories'));
    }
}
