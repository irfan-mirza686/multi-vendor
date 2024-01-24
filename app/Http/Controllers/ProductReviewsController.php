<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use Auth;
use Session;

class ProductReviewsController extends Controller
{
    public function postReview(Request $request)
    {
        if ($request->ajax()) {
            try {

                $create = new ProductReview;
                $create->vendor_product_id = $request->vendorProductID;
                $create->wholsaler_prodcut_id = $request->wholeSalerProductID;
                $create->review = $request->review;
                $create->rating = $request->rating;
                $create->date = date('Y-m-d');
                $create->reviewByUser = Auth::user()->id ?? 0;
                $create->session_id = Session::getId() ?? 0;
                $create->save();
                return response()->json(['status' => 200, 'message' => 'Review submit to admin']);
            } catch (\Throwable $th) {
                return response()->json(['status' => 200, 'message' => $th->getMessage()]);
            }
        }
    }
}
