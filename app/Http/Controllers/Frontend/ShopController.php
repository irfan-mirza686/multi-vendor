<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\VendorProduct;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductComment;
use App\Models\ProductReview;
use App\Services\Frontend\ShopService;

class ShopController extends Controller
{
    private $shopService;

    public function __construct(ShopService $shopService)
    {
        $this->shopService = $shopService;
    }
    /******************************************************/
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // echo "<pre>"; print_r($request->all()); exit;

            $products = VendorProduct::with(['product', 'vendor'])->paginate(8);


            if ($request->ajax()) {
                return $this->shopService->loadMoreProducts($products);

            }
            return view('frontend.vendor_profile.index');
        }
        $pageTitle = "Shop Page";
        $categories = array();
        $vendorProducts = VendorProduct::with(['product', 'vendor'])->latest()->get();
        $baseURL = \Config::get('app.url');
        $categories = Category::where('parent_category', 0)->get();
        return view('frontend.pages.shop_page', compact('pageTitle', 'categories', 'vendorProducts', 'baseURL', 'categories'));
    }
    public function productDetails($vendor = null, $product_slug = null)
    {
        // dd($product_slug);
        $vendor = Vendor::where('username', $vendor)->first();
        // echo "<pre>"; print_r($vendor->toArray()); exit();
        $pageTitle = "Product Details Page";
        $mainProduct = Product::where('slug', $product_slug)->first();
        $item = VendorProduct::with(['product', 'vendor', 'review'])->where('vendor_id', $vendor->id)->where('product_id', $mainProduct->id)->first();
        $rating = ProductReview::where('vendor_product_id', $item->id)->selectRaw('SUM(rating)/COUNT(reviewByUser) AS avg_rating')->first()->avg_rating;
        $rating = round($rating);
        // echo "<pre>"; print_r($item->toArray()); exit();
        $baseURL = \Config::get('app.url');
        $comments = ProductComment::with('user')->where('wholsaler_prodcut_id', $mainProduct->id)->get();
        $countComments = $comments->count();
        $categories = array();
        $related_products = VendorProduct::with(['product', 'vendor'])->where('category_id', $mainProduct->category_id)->where('product_id', '!=', $mainProduct->id)->limit(3)->inRandomOrder()->get();

        return view('frontend.pages.product_details', compact('pageTitle', 'item', 'baseURL', 'comments', 'countComments', 'categories', 'related_products', 'rating'));
    }
    public function listingProducts(Request $request)
    {
        $baseURL = \Config::get('app.url');
        $currenturl = \URL::current();
        $slug = $request->path();


        if ($request->ajax()) {
            // echo "<pre>"; print_r($request->all()); exit;

            $categoryCount = Category::where(['slug' => $slug, 'status' => 'active'])->count();

        if ($categoryCount > 0) {
            $categoryDetails = Category::catDetails($slug);

            // echo "<pre>"; print_r($categoryDetails['catDetails']); exit;
            $products = VendorProduct::whereIn('category_id', $categoryDetails['catIds'])->get();
            if ($request->ajax()) {
                return $this->shopService->loadMoreProducts($products);

            }
        }

            return view('frontend.vendor_profile.index');
        }

        // dd($request->path());
        // $explodedSlug = explode($baseURL . '/', $currenturl);
        // $data = $request->all();
        // $slug = $explodedSlug[1];
        $categoryCount = Category::where(['slug' => $slug, 'status' => 'active'])->count();

        if ($categoryCount > 0) {
            $categoryDetails = Category::catDetails($slug);

            // echo "<pre>"; print_r($categoryDetails['catDetails']); exit;
            $vendorProducts = VendorProduct::whereIn('category_id', $categoryDetails['catIds'])->paginate(10);

        }
        $page_name = "listing";
        $pageTitle = 'Products';
        $categories = array();
        $subcategories = $categoryDetails['subCategories'];

        // echo "<pre>"; print_r($vendorProducts); exit;
        return view('frontend.pages.shop_page', compact('pageTitle', 'vendorProducts', 'categoryDetails', 'baseURL', 'slug', 'page_name', 'categories', 'subcategories'));

    }
}
