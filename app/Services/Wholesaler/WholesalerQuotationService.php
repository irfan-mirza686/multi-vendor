<?php
namespace App\Services\Wholesaler;

use Illuminate\Support\Facades\Http;
use Session;
use App\Models\{
    WholeSalerQuotation,
};
use DB;
use PDF;
use Auth;
use Carbon\Carbon;

class WholesalerQuotationService
{
    public function getData()
    {
        return WholeSalerQuotation::with(['vendor','product'])->where('wholesaler_id',Auth()->guard('wholesaler')->user()->id)->get();
    }
    /********************************************************************/
    public function wholesalersQuotations()
    {
        return WholeSalerQuotation::with(['wholesaler','product','vendor'])->get();
    }
}
