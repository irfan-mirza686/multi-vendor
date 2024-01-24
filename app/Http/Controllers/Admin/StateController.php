<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\StateService;
use App\Models\State;
use App\Models\Country;
use App\Http\Requests\StateRequest;
use Auth;
use DataTables;

class StateController extends Controller
{
    private $stateService;

    public function __construct(StateService $stateService)
    {
        $this->stateService = $stateService;
    }
    /********************************************************************/

    public function index(Request $request)
    {

        // echo "<pre>"; print_r(Auth::guard('api')->user()); exit();

        $pageTitle = 'States';
        return view('admin.state.index', compact('pageTitle'));
    }
    /********************************************************************/
    public function StateList(Request $request)
    {
        if ($request->ajax()) {
            $data = State::with('country')->get();
            // echo "<pre>"; print_r($data); exit();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('country.name', function ($row) {
                    return ($row->country)?strtoupper($row->country->name):'';
                })
                ->editColumn('status', function ($row) {
                    return strtoupper($row->status);
                })

                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . \Config::get('app.url') . '/admin/state/update/' . $row->id . '"data-toggle="tooltip"  data-name="' . $row->name . '" data-countryID="' . $row->country_id . '"  data-status="' . $row->status . '"  data-id="' . $row->id . '" data-original-title="Edit Country" class="btn btn-primary btn-sm edit"><i class="fadeIn animated bx bx-edit"></i></a>';
                    $btn = $btn . ' <a href="' . \Config::get('app.url') . '/admin/state/delete/' . $row->id . '"data-toggle="tooltip"  data-name="' . $row->name . '" data-status="' . $row->status . '"  data-id="' . $row->id . '" data-original-title="Delete Country" class="btn btn-danger btn-sm del"><i class="fadeIn animated bx bx-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    /********************************************************************/
    public function loadCountries(Request $request)
    {
        if ($request->ajax()) {
            $countries = Country::where('status','active')->orderBy('name')->get();
            return response()->json(['status'=>200,'countries'=>$countries]);
            // echo "<pre>"; print_r("okokok"); exit();
        }
    }
    /********************************************************************/
    public function create()
    {
        return view('admin.country.create');
    }
    /********************************************************************/
    public function store(StateRequest $request)
    {

        $data = $request->all();
        // echo "<pre>"; print_r($data); exit();
        try {
            $country = $this->stateService->store($data, $id = "");
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
    public function edit($id = null)
    { // Not in used ....
        $editData = $this->stateService->store($data,$id);
        return view('admin.country.edit', compact('editData'));
    }
    /********************************************************************/
    public function update(StateRequest $request, $id = null)
    {
        $data = $request->all();
        try {
            $country = $this->stateService->store($data, $id);
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
            if (State::find($id)->delete()) {
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
