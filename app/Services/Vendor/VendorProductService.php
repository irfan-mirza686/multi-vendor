<?php
namespace App\Services\Vendor;

use Illuminate\Support\Facades\Http;
use Session;
use App\Models\{
    VendorProduct,
};
use DB;
use PDF;
use Auth;
use Carbon\Carbon;

class VendorProductService
{
    /*************************************************************/
    public function vendorProducts()
    {
       return VendorProduct::with(['product'])->where('vendor_id',Auth::guard('vendor')->user()->id)->get();
    }
}