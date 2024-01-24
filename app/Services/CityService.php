<?php
namespace App\Services;

use App\Models\{
	City,
};

class CityService
{
	public function store($data,$id=null)
	{
		if ($id == null) {
			$city = new City;
		} else if ($id != null) {
			$city = City::find($id);
		}
		$city->name = $data['name'];
		$city->state_id = $data['state_id'];
		$city->status = $data['status'];
		return $city;		
	}
}