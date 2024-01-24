<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\SliderRequest;
use App\Services\SliderService;
use DataTables;

class SliderController extends Controller
{
    private $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }
    /********************************************************************/
    public function index()
    {
        $pageTitle = "Sliders";
        $basePath = \Config::get('app.url');
        return view('admin.sliders.index', compact('pageTitle','basePath'));
    }
    /********************************************************************/
    public function SliderList(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->sliderService->getIndexData();
            // echo "<pre>"; print_r($data); exit;
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function ($row) {
                    if ($row->img) {
                        $image = \Config::get('app.url') . '/assets/uploads/sliders/' . $row->img;
                    }else{
                        $image = \Config::get('app.url') . '/assets/uploads/no-image.png';
                    }
                    return '<img src="' . $image . '" border="0"
                    width="50" class="img-rounded" align="center" />';
                })
                ->editColumn('added_by', function ($row) {
                    return ($row->admin)?strtoupper($row->admin->name):'';
                })
                ->editColumn('status', function ($row) {
                    return strtoupper($row->status);
                })

                ->addColumn('action', function ($row) {
                    $basePath = \Config::get('app.url');
                    $btn = '<div class="col text-end">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                        <ul class="dropdown-menu" style="">
                            <li><a class="dropdown-item edit" data-Title="'.$row->title.'"  data-SubTitle="'.$row->sub_title.'"  data-Status="'.$row->status.'"  data-Image="'.$row->img.'" data-ImgPath="'.$basePath.'" href="' . route('admin.slider.update', $row->id) . '"><i class="lni lni-pencil-alt" style="color: yelow;"></i> Edit</a>
                            </li>
                            <li><a class="dropdown-item del" href="' . route('admin.slider.delete', $row->id) . '"><i class="lni lni-trash" style="color: red;"></i> Delete</a>
                            </li>

                        </ul>
                    </div>
                </div>';

                    return $btn;
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }
    }

    /********************************************************************/
    public function store(SliderRequest $request)
    {

        $data = $request->all();

        try {
            $create = $this->sliderService->store($data, $id = "");

            if ($create->save()) {
                return response()->json(['status' => 200, 'message' => 'Data has been created successfully']);
            } else {
                return response()->json(['status' => 422, 'message' => 'Data has been not created']);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 422, 'message' => $th->getMessage()]);
        }


    }

    /********************************************************************/
    public function update(SliderRequest $request, $id = null)
    {
        $data = $request->all();
        try {
            $update = $this->sliderService->store($data, $id);
            if ($update->save()) {
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
            if (Slider::find($id)->delete()) {
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
