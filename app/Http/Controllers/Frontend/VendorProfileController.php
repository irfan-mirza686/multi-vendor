<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\VendorProduct;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Services\Frontend\ShopService;

class VendorProfileController extends Controller
{
    private $shopService;

    public function __construct(ShopService $shopService)
    {
        $this->shopService = $shopService;
    }
    /******************************************************/
    public function vendorProfile(Request $request, $vendor = null)
    {
        if ($request->ajax()) {
            $vendor = Vendor::where('username', $vendor)->first();
            $products = VendorProduct::with(['product', 'vendor'])->where('vendor_id', $request->vendorID)->paginate(8);
            if ($request->ajax()) {
                return $this->shopService->loadMoreProducts($products);

            }
            return view('frontend.vendor_profile.index');

        }
        /*##################################*/
        $pageTitle = "Vendor Profile";
        $vendor = Vendor::where('username', $vendor)->first();
        if ($request->category == null) {
            $products = VendorProduct::with(['product', 'vendor'])->where('vendor_id', $vendor->id)->paginate(8);
        } else {
            // dd($request->category);
            $category = Category::select('id')->where('slug', $request->category)->first();
            $products = VendorProduct::with(['product', 'vendor'])->where('vendor_id', $vendor->id)->where('category_id', $category->id)->paginate(8);
        }

        $categories = VendorProduct::categories($products);
        $baseURL = \Config::get('app.url');

        // echo "<pre>"; print_r($categories); exit();
        return view('frontend.vendor_profile.index', compact('pageTitle', 'vendor', 'products', 'baseURL', 'categories'));
    }

}
