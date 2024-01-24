<?php

namespace App\Http\Controllers\Admin\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use DataTables;
use App\Services\ProductService;

class VendorController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /********************************************************************/
    public function index()
    {
        $pageTitle = "Vendors";
        return view('admin.members.vendors.index', compact('pageTitle'));
    }
    /******************************************************************/
    public function VendorsList(Request $request)
    {
        if ($request->ajax()) {
            $data = Vendor::get();
            return Datatables::of($data)
                ->addIndexColumn()




                ->editColumn('status', function ($row) {
                    if ($row->status == 'active') {
                        return '<span class="badge bg-success updateStatus" data-VendorID="' . $row->id . '" data-Status="inactive" style="cursor: pointer; width:100px;">' . strtoupper($row->status) . '</span>';
                    } else if ($row->status == 'inactive') {
                        return '<span class="badge bg-danger updateStatus" data-VendorID="' . $row->id . '" data-Status="active" style="cursor: pointer; width:100px;">' . strtoupper($row->status) . '</span>';
                    }
                })

                ->addColumn('action', function ($row) {

                    $btn = '<div class="col text-end">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                        <ul class="dropdown-menu" style="">
                        <li><a class="dropdown-item" href="#"><i class="lni lni-eye" style="color: blue;"></i> Open</a>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="lni lni-pencil-alt" style="color: yelow;"></i> Edit</a>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="lni lni-trash" style="color: red;"></i> Delete</a>
                            </li>

                        </ul>
                    </div>
                </div>';

                    return $btn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }
    /******************************************************************/
    public function updateStatus(Request $request)
    {
        if ($request->ajax()) {
            try {
                // echo "<pre>"; print_r($request->all()); exit;
                Vendor::where('id', $request->VendorID)->update(['status' => $request->status]);
                return response()->json(['status' => 200, 'message' => 'Status Updated']);
            } catch (\Throwable $th) {
                return response()->json(['status' => 422, 'message' => $th->getMessage()]);
            }
        }
    }
    /******************************************************************/
    public function vendorProducts(Request $request)
    {
        $pageTitle = "vendor Products";
        return view('admin.members.vendors.products.index', compact('pageTitle'));
    }
    /******************************************************************/
    public function vendorProductsList(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->productService->vendorProducts();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function ($row) {
                    $image = ($row->product) ? getFile('products', $row->product->image) : getFile('/', 'no-image.png');
                    return '<img src="' . $image . '" border="0"
                    width="50" class="product-img-2" align="center" />';
                })
                ->editColumn('vendor', function ($row) {
                    return ($row->vendor) ? $row->vendor->name : "";
                })
                ->editColumn('name', function ($row) {
                    return ($row->product) ? $row->product->name : "";
                })
                ->editColumn('category_id', function ($row) {
                    return ($row->product->category) ? strtoupper($row->product->category->name) : "";
                })
                ->editColumn('unit_id', function ($row) {
                    return ($row->product->unit) ? strtoupper($row->product->unit->name) : "";
                })
                ->editColumn('item_price', function ($row) {
                    return ($row->product) ? strtoupper($row->product->item_price) : "";
                })
                ->editColumn('status', function ($row) {
                    return strtoupper($row->product->status);
                })

                ->addColumn('action', function ($row) {

                    $btn = '<div class="col text-end">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                        <ul class="dropdown-menu" style="">
                        <li><a class="dropdown-item" href="#"><i class="lni lni-eye" style="color: blue;"></i> View</a>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="lni lni-pencil-alt" style="color: yelow;"></i> Edit</a>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="lni lni-trash" style="color: red;"></i> Delete</a>
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
    /******************************************************************/
}
