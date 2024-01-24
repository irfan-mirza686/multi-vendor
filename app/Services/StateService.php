<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Session;
use App\Models\{
	State,
};
use DB;
use PDF;
use Auth;

class StateService
{
	public function store($data,$id=null)
	{
		if ($id == null) {
			$state = new State;
		} else if ($id != null) {
			$state = State::find($id);
		}
		$state->name = $data['name'];
		$state->country_id = $data['country_id'];
		$state->status = $data['status'];
		return $state;		
	}
}