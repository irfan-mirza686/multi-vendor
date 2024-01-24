<?php

namespace App\Http\Controllers\WholeSaler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Services\ProductService;
use App\Models\Product;
use App\Models\VendorProduct;
use Auth;
use DataTables;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /********************************************************************/
    public function index(Request $request)
    {
        $pageTitle = 'Products';


        return view('wholesaler.product.index', compact('pageTitle'));
    }
    public function List(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->productService->all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function ($row) {
                    $image = \Config::get('app.url') . '/assets/uploads/products/' . $row->image;
                    return '<img src="' . $image . '" border="0"
                    width="50" class="img-rounded" align="center" />';
                })
                ->editColumn('category_id', function ($row) {
                    return ($row->category) ? strtoupper($row->category->name) : "";
                })
                ->editColumn('unit_id', function ($row) {
                    return ($row->unit) ? strtoupper($row->unit->name) : "";
                })
                ->editColumn('status', function ($row) {
                    return strtoupper($row->status);
                })

                ->addColumn('action', function ($row) {

                    $btn = '<div class="col text-end">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                        <ul class="dropdown-menu" style="">

                            <li><a class="dropdown-item" href="'.route('wholesaler.product.edit',$row->id).'"><i class="lni lni-pencil-alt" style="color: yelow;"></i> Edit</a>
                            </li>
                            <li><a class="dropdown-item deleteProduct" data-URL="'.route('wholesaler.delete.product',$row->id).'" href="javascript:(0);"><i class="lni lni-trash" style="color: red;"></i> Delete</a>
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
    public function create(Request $request)
    {
        $pageTitle = "Create Product";
        $getUserInformation = $this->productService->getExternalData();

        return view('wholesaler.product.create', compact('getUserInformation', 'pageTitle'));
    }
    /********************************************************************/
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        try {
            $other_images = [];
            if ($request->hasFile('other_images')) {
                $images = $request->file('other_images');
                foreach ($images as $key => $value) {
                    $filename = uploadImage($value, filePath('products'), null);

                    $other_images[] = [
                        'imgID' => $key + 1,
                        'img' => $filename
                    ];
                }
            }
            $product = $this->productService->storeProduct($data, $id = null);
            $product->other_images = $other_images;
            $product->wholesaler_id = Auth::guard('wholesaler')->user()->id;
            $product->save();
            return redirect(route('wholesaler.products'))->with('flash_message_success', 'Prodcut Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('flash_message_error', $th->getMessage());
        }


    }
    public function edit($id=null)
    {
        $pageTitle = "Edit Product";
        $editData = Product::find($id);
        $getUserInformation = $this->productService->getExternalData();
        return view('wholesaler.product.edit',compact('getUserInformation','editData','pageTitle'));
    }
    public function update(Request $request, $id=null)
    {
        $data = $request->all();
        try {
            $other_images = [];
            if ($request->hasFile('other_images')) {
                $images = $request->file('other_images');
                foreach ($images as $key => $value) {
                    $filename = uploadImage($value, filePath('products'), null);

                    $other_images[] = [
                        'imgID' => $key + 1,
                        'img' => $filename
                    ];
                }
            }
            $product = $this->productService->storeProduct($data, $id);
            $product->other_images = $other_images;
            $product->wholesaler_id = Auth::guard('wholesaler')->user()->id;
            $product->save();
            return redirect(route('wholesaler.products'))->with('flash_message_success', 'Prodcut Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('flash_message_error', $th->getMessage());
        }
    }
    /********************************************************************/
    public function deleteProduct(Request $request, $id=null)
    {
        if ($request->ajax()) {
            try {

                if (VendorProduct::where('product_id',$id)->delete()) {
                    Product::find($id)->delete();
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
