<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CountryService;
use App\Models\Country;
use App\Http\Requests\CountryRequest;
use Auth;
use DataTables;

class CountryController extends Controller
{
    private $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }
    /********************************************************************/

    public function index(Request $request)
    {
        $pageTitle = 'Countries';
        return view('admin.country.index', compact('pageTitle'));
    }
    /********************************************************************/
    public function CountryList(Request $request)
    {
        if ($request->ajax()) {
            $data = Country::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function ($row) {
                    return strtoupper($row->status);
                })

                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . \Config::get('app.url') . '/admin/country/update/' . $row->id . '"data-toggle="tooltip"  data-name="' . $row->name . '" data-status="' . $row->status . '"  data-id="' . $row->id . '" data-original-title="Edit Country" class="btn btn-primary btn-sm edit"><i class="fadeIn animated bx bx-edit"></i></a>';
                    $btn = $btn . ' <a href="' . \Config::get('app.url') . '/admin/country/delete/' . $row->id . '"data-toggle="tooltip"  data-name="' . $row->name . '" data-status="' . $row->status . '"  data-id="' . $row->id . '" data-original-title="Delete Country" class="btn btn-danger btn-sm del"><i class="fadeIn animated bx bx-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /********************************************************************/
    public function store(CountryRequest $request)
    {

        $data = $request->all();
        try {
            $country = $this->countryService->store($data, $id = "");
            if ($country->save()) {
                return response()->json(['status' => 200, 'message' => 'Data has been created successfully']);
            } else {
                return response()->json(['status' => 422, 'message' => 'Data has been not created']);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 422, 'message' => $th->getMessage()]);
        }


    }

    /********************************************************************/
    public function update(CountryRequest $request, $id = null)
    {
        $data = $request->all();
        try {
            $country = $this->countryService->store($data, $id);
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
            if (Country::find($id)->delete()) {
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
