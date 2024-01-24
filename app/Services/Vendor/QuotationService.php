<?php
namespace App\Services\Vendor;

use Illuminate\Support\Facades\Http;
use Session;
use App\Models\{
    WholeSalerQuotation,
    VendorProduct,
};
use DB;
use PDF;
use Auth;
use Carbon\Carbon;

class QuotationService
{
    /*************************************************************/
    public function saveQuotation($request)
    {

        date_default_timezone_set((config('app.timezone')));
        $currentDate = date('Y-m-d h:i:s');
        $quotation = new WholeSalerQuotation;
        $quotation->wholesaler_id = $request->wholesaler_id;
        $quotation->product_id = $request->product_id;
        $quotation->vendor_id = Auth::guard('vendor')->user()->id;
        $quotation->description = $request->description;
        $quotation->start_date = $currentDate;
        return $quotation;
    }
    /*************************************************************/
    public function getQuotations()
    {
        return WholeSalerQuotation::with(['vendor', 'product'])->where('vendor_id', Auth::guard('vendor')->user()->id)->get();
    }
    /*************************************************************/
    public function importQuotProduct($quotation, $request)
    {
        // echo "<pre>"; print_r($quotation->product->category->id); exit;
        date_default_timezone_set((config('app.timezone')));
        $currentDate = date('Y-m-d h:i:s');

        $vendorProduct = new VendorProduct;
        $vendorProduct->product_id = $quotation->product_id;
        $vendorProduct->category_id = $quotation->product->category->id;
        $vendorProduct->date = $currentDate;
        return $vendorProduct;

    }
}
