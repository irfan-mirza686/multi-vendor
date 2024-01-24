<?php
namespace App\Services\Wholesaler;

use Illuminate\Support\Facades\Http;
use Session;
use App\Models\{
    WholeSalerQuotation,
    WholeSaler,
};
use DB;
use PDF;
use Auth;
use Carbon\Carbon;

class WholesalerProfileService
{
    public function getData()
    {
        return WholeSalerQuotation::with(['vendor','product'])->where('wholesaler_id',Auth()->guard('wholesaler')->user()->id)->get();
    }
    /************************************************/

    public function updateProfile($request, $id)
    {
        $admin = WholeSaler::select('image')->where('id', $id)->first();
        $filename = '';
        if (isset($request['profile_pic']) && !empty($request['profile_pic'])) {
            $filename = uploadImage($request['profile_pic'], filePath('admins'), $admin->image);

        } else {
            $filename = $admin->image;
        }
        $address = [
			'countryName' => $request['countryName'] ?? '',
			'country_shortName' => $request['country_shortName'] ?? '',
			'stateName' => $request['stateName'] ?? '',
			'cityName' => $request['cityName'] ?? '',
			'zip' => $request['zip_code'] ?? '',
            'address' => $request['address'] ?? '',
        ];

        WholeSaler::whereId($id)->update([
            'name' => $request['name'],
            'image' => $filename,
            'business_name' => $request['business_name'],
            'address' => $address
        ]);
    }
    /********************************************************************/
    public function wholesalersQuotations()
    {
        return WholeSalerQuotation::with(['wholesaler','product','vendor'])->get();
    }
}
