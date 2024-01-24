<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Session;
use App\Models\{
	Country,
};
use DB;
use PDF;
use Auth;

class CountryService
{
	public function store($data,$id=null)
	{
		if ($id == null) {
			$country = new Country;
		} else if ($id != null) {
			$country = Country::find($id);
		}
		$country->name = $data['name'];
		$country->status = $data['status'];
		return $country;		
	}
}