<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CityService;
use App\Models\State;
use App\Models\City;
use App\Http\Requests\CityRequest;
use Auth;
use DataTables;

class CityController extends Controller
{
    private $cityService;

    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }
    /********************************************************************/

    public function index(Request $request)
    {

        // echo "<pre>"; print_r(Auth::guard('api')->user()); exit();

        $pageTitle = 'Cities';
        return view('admin.city.index', compact('pageTitle'));
    }
    /********************************************************************/
    public function CityList(Request $request)
    {
        if ($request->ajax()) {
            $data = City::with('state')->get();
            // echo "<pre>"; print_r($data); exit();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('state.name', function ($row) {
                    return ($row->state)?strtoupper($row->state->name):'';
                })
                ->editColumn('status', function ($row) {
                    return strtoupper($row->status);
                })

                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . \Config::get('app.url') . '/admin/city/update/' . $row->id . '"data-toggle="tooltip"  data-name="' . $row->name . '" data-stateID="' . $row->state_id . '"  data-status="' . $row->status . '"  data-id="' . $row->id . '" data-original-title="Edit Country" class="btn btn-primary btn-sm edit"><i class="fadeIn animated bx bx-edit"></i></a>';
                    $btn = $btn . ' <a href="' . \Config::get('app.url') . '/admin/city/delete/' . $row->id . '"data-toggle="tooltip"  data-name="' . $row->name . '" data-status="' . $row->status . '"  data-id="' . $row->id . '" data-original-title="Delete Country" class="btn btn-danger btn-sm del"><i class="fadeIn animated bx bx-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    /********************************************************************/
    public function loadStates(Request $request)
    {
        if ($request->ajax()) {
            $states = State::where('status','active')->orderBy('name')->get();
            return response()->json(['status'=>200,'states'=>$states]);
            // echo "<pre>"; print_r("okokok"); exit();
        }
    }
    /********************************************************************/
    public function create()
    {
        return view('admin.country.create');
    }
    /********************************************************************/
    public function store(CityRequest $request)
    {

        $data = $request->all();
        // echo "<pre>"; print_r($data); exit();
        try {
            $country = $this->cityService->store($data, $id = "");
            if ($country->save()) {
                return response()->json(['status' => 200, 'message' => 'Data has been created successfully']);
            } else {
                return response()->json(['status' => 422, 'message' => 'Data has been not created']);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 422, 'message' => 'Oops, Something went wrong']);
        }


    }
    
    /********************************************************************/
    public function update(CityRequest $request, $id = null)
    {
        $data = $request->all();
        try {
            $country = $this->cityService->store($data, $id);
            if ($country->save()) {
                return response()->json(['status' => 200, 'message' => 'Data has been updated successfully']);
            } else {
                return response()->json(['status' => 422, 'message' => 'Data has been not updated']);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 422, 'message' => 'Oops, Something went wrong']);
        }
    }
    /********************************************************************/
    public function delete($id = null)
    {

        try {
            if (City::find($id)->delete()) {
                return response()->json(['status' => 200, 'message' => 'Data has been deleted successfully']);
            } else {
                return response()->json(['status' => 422, 'message' => 'Data has been not deleted']);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 422, 'message' => 'Oops, Something went wrong']);
        }
    }
    /********************************************************************/
}
