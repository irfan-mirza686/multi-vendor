<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\VendorProduct;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\Vendor\VendorProductService;
use DataTables;

class ProductController extends Controller
{
    protected $vendorProductService;

    public function __construct(VendorProductService $vendorProductService)
    {
        $this->vendorProductService = $vendorProductService;
    }
    /********************************************************************/
    public function index()
    {
        $pageTitle = "Products";
        $products = Product::get();
        return view('vendor_panel.product.wholesaler_products.index', compact('pageTitle', 'products'));
    }
    /********************************************************************/
    public function ownProducts()
    {
        $pageTitle = "Own Products";
        return view('vendor_panel.product.index', compact('pageTitle'));
    }
    public function ownProductsList(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->vendorProductService->vendorProducts();
            // echo "<pre>"; print_r($data->toArray()); exit();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function ($row) {
                    $image = \Config::get('app.url') . '/assets/uploads/products/' . $row->product->image;
                    return '<img src="' . $image . '" border="0"
                    width="50" class="img-rounded" align="center" />';
                })
                ->editColumn('name', function ($row) {
                    return ($row->product) ? strtoupper($row->product->name) : "";
                })
                ->editColumn('category_id', function ($row) {
                    return ($row->product) ? strtoupper($row->product->category->name) : "";
                })
                ->editColumn('unit_id', function ($row) {
                    return ($row->product) ? strtoupper($row->product->unit->name) : "";
                })
                ->editColumn('item_price', function ($row) {
                    return ($row->product) ? strtoupper($row->product->item_price) : "";
                })

                ->editColumn('status', function ($row) {
                    if ($row->product->status == 'active') {
                        return '<span class="badge bg-success" data-VendorProductID="' . $row->id . '" data-Status="inactive" style="width:100px;">' . strtoupper($row->product->status) . '</span>';
                    } else if ($row->product->status == 'inactive') {
                        return '<span class="badge bg-danger" data-VendorProductID="' . $row->id . '" data-Status="active" style="width:100px;">' . strtoupper($row->product->status) . '</span>';
                    }
                })

                ->addColumn('action', function ($row) {

                    $btn = '<div class="col text-end">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                        <ul class="dropdown-menu" style="">

                            <li><a class="dropdown-item" href="#"><i class="lni lni-pencil-alt" style="color: yelow;"></i> Edit</a>
                            </li>
                            <li><a class="dropdown-item deleteOwnProduct" data-URL="' . route('vendor.delete.own.product', $row->id) . '" href="javascript:void(0);"><i class="lni lni-trash" style="color: red;"></i> Delete</a>
                            </li>

                        </ul>
                    </div>
                </div>';

                    return $btn;
                })
                ->rawColumns(['image', 'status', 'action'])
                ->make(true);
        }
    }
    public function deleteOwnProduct(Request $request, $id=null)
    {
        if ($request->ajax()) {
            try {
                if (VendorProduct::find($id)->delete()) {
                    return response()->json(['status' => 200, 'message' => 'Data has been deleted successfully']);
                } else {
                    return response()->json(['status' => 422, 'message' => 'Data has been not deleted']);
                }
            } catch (\Throwable $th) {
                return response()->json(['status' => 500, 'message' => $th->getMessage()]);
            }
            // echo "<pre>"; print_r($request->all()); exit;
        }
    }
}
