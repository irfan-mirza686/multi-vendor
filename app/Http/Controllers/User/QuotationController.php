<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\VendorQuotation;
use Auth;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function index()
    {
        $pageTitle = "Profile";
        $categories = Category::with('subcategories')->where('parent_category',0)->get();
        $quotations = VendorQuotation::with(['vendor','vendor_product'])->where('user_id',Auth::user()->id)->get();

        // $vendor_product = $quotations->vendor_product;
        // echo "<pre>"; print_r($quotations->toArray()); exit;
        // Access the Main Product relationship through the Vendor productID
        // $mainProduct = $vendor_product->product;
        // echo "<pre>"; print_r($mainProduct); exit;
        return view('user.quotations.index', compact('pageTitle','categories','quotations'));
    }
    public function sendQuotation(Request $request)
    {
        if ($request->ajax()) {
            $quotation = new VendorQuotation;
            $quotation->vendor_id = $request->vendor_id;
            $quotation->product_id = $request->product_id;
            $quotation->note = $request->message;
            $quotation->user_id = Auth::user()->id;
            $quotation->start_date = date('Y-m-d');
            // $quotation->end_date = date('Y-m-d');
            $quotation->save();
            return response()->json(['status'=>200,'message'=>'Quotation sent to vendor']);
            // echo "<pre>"; print_r($request->all()); exit;
        }
    }
}
