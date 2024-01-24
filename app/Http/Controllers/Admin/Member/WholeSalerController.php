<?php

namespace App\Http\Controllers\Admin\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WholeSaler;
use App\Models\WholeSalerQuotation;
use App\Services\Wholesaler\WholesalerQuotationService;
use DataTables;
use App\Services\ProductService;

class WholeSalerController extends Controller
{
    protected $productService;
    protected $wholesalerQuotationService;

    public function __construct(
        ProductService $productService,
        WholesalerQuotationService $wholesalerQuotationService
        )
    {
        $this->productService = $productService;
        $this->wholesalerQuotationService = $wholesalerQuotationService;
    }
    /********************************************************************/
    public function index()
    {
        $pageTitle = "Wholesalers";
        return view('admin.members.wholesalers.index', compact('pageTitle'));
    }
    /******************************************************************/
    public function WholeSalersList(Request $request)
    {
        if ($request->ajax()) {
            $data = WholeSaler::with('package')->get();
            return Datatables::of($data)
                ->addIndexColumn()

                ->editColumn('subscription', function ($row) {
                    return ($row->package) ? strtoupper($row->package->name) : "";
                })


                ->editColumn('status', function ($row) {
                    if ($row->status == 'active') {
                        return '<span class="badge bg-success updateStatus" data-WholeSalerID="' . $row->id . '" data-Status="inactive" style="cursor: pointer; width:100px;">' . strtoupper($row->status) . '</span>';
                    } else if ($row->status == 'inactive') {
                        return '<span class="badge bg-danger updateStatus" data-WholeSalerID="' . $row->id . '" data-Status="active" style="cursor: pointer; width:100px;">' . strtoupper($row->status) . '</span>';
                    }
                })

                ->addColumn('action', function ($row) {

                    $btn = '<div class="col text-end">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                        <ul class="dropdown-menu" style="">
                        <li><a class="dropdown-item" href="' . route('admin.wholesaler.profile', $row->username) . '"><i class="lni lni-eye" style="color: blue;"></i> Profile</a>
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

                WholeSaler::where('id', $request->wholeSalerID)->update(['status' => $request->status]);
                return response()->json(['status' => 200, 'message' => 'Status Updated']);
            } catch (\Throwable $th) {
                return response()->json(['status' => 422, 'message' => $th->getMessage()]);
            }
        }
    }
    /******************************************************************/
    public function profile($username = null)
    {
        $user = WholeSaler::where('username', $username)->first();
        // echo "<pre>"; print_r($user->social_links); exit;
        $pageTitle = $user->username . ' ' . '-Profile';
        $socialIcons = [
            '0' => 'lni lni-world',
            '1' => 'lni lni-twitter-original',
            '2' => 'lni lni-instagram-original',
            '3' => 'lni lni-facebook-original',
        ];
        $iconsColor = [
            '0' => 'color: black;',
            '1' => 'color: #FFFFFF;',
            '2' => 'color: #FD3651;',
            '3' => 'color: #1093F4;',
        ];
        $quotations = WholeSalerQuotation::select('id', 'status')->where('wholesaler_id', $user->id)->get();
        $totalQuotations = $quotations->count();
        $approvedQuotations = $quotations->where('status', 'approved')->count();
        $approvedPercentage = ($approvedQuotations / $totalQuotations) * 100;
        $pendingQuotations = $quotations->where('status', 'pending')->count();
        $pendingPercentage = ($pendingQuotations / $totalQuotations) * 100;
        // dd($pendingPercentage);
        $chartQValues = [$approvedPercentage, $pendingPercentage];
        $chartQName = ['Approved', 'Pending'];
        return view('admin.members.wholesalers.profile.profile', compact('user', 'pageTitle', 'socialIcons', 'iconsColor', 'totalQuotations', 'approvedQuotations', 'approvedPercentage', 'pendingQuotations', 'pendingPercentage', 'chartQValues', 'chartQName'));

    }
    /******************************************************************/
    public function wholeSalerProducts(Request $request)
    {
        $pageTitle = "Wholesaler Products";
        return view('admin.members.wholesalers.products.index', compact('pageTitle'));
    }
    /******************************************************************/
    public function wholeSalerProductsList(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->productService->wholesalerProducts();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function ($row) {
                    $image = ($row->image) ? getFile('products', $row->image) : getFile('/', 'no-image.png');
                    return '<img src="' . $image . '" border="0"
                    width="50" class="product-img-2" align="center" />';
                })
                ->editColumn('wholesaler', function ($row) {
                    return ($row->wholesalers) ? $row->wholesalers->name : "";
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
                        <li><a class="dropdown-item viewWholeSalerProduct" href="javascript:void(0);" data-URL="'.route('admin.view.wholesaler.product').'" data-ProductID="'.$row->id.'"><i class="lni lni-eye" style="color: blue;"></i> View</a>
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
    public function wholeSalerQuotation(Request $request)
    {
        $pageTitle = "Wholesaler Quotations";
        return view('admin.members.wholesalers.quotations.to_wholesaler', compact('pageTitle'));
    }
    /******************************************************************/
    public function wholeSalerQuotationList(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->wholesalerQuotationService->wholesalersQuotations();
            // echo "<pre>"; print_r($data->toArray()); exit;
            return Datatables::of($data)
                ->addIndexColumn()

                ->editColumn('thumbnail', function ($row) {
                    $image = ($row->product) ? getFile('products', $row->product->image) : getFile('/', 'no-image.png');
                    return '<img src="' . $image . '" border="0"
                    width="50" class="product-img-2" align="center" />' . $row->product->name . ' ';
                })
                ->editColumn('to_wholesaler', function ($row) {
                    return ($row->wholesaler) ? $row->wholesaler->name : "";
                })
                ->editColumn('from_vendor', function ($row) {
                    return ($row->vendor) ? $row->vendor->name : "";
                })
                ->editColumn('start_date', function ($row) {
                    return date('d-m-Y h:i:s', strtotime($row->start_date));
                })

                ->editColumn('status', function ($row) {
                    if ($row->status == 'approved') {
                        return '<span class="badge bg-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Quotation Approved" data-QuotationID="' . $row->id . '" data-Status="pending" style="width:100px;">' . strtoupper($row->status) . '</span>';
                    } else if ($row->status == 'pending') {
                        return '<span class="badge bg-danger updateStatus" data-QuotationID="' . $row->id . '" data-Status="approved" style="cursor: pointer; width:100px;">' . strtoupper($row->status) . '</span>';
                    }
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
                ->rawColumns(['thumbnail','status', 'action'])
                ->make(true);
        }
    }
    /******************************************************************/
    public function viewWholeSalerProduct(Request $request)
    {
        if ($request->ajax()) {
            echo "<pre>"; print_r($request->all()); exit;
        }
    }
}
