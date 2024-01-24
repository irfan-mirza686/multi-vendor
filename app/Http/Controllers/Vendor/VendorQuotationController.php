<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WholeSalerQuotation;
use App\Services\Vendor\QuotationService;
use Illuminate\Support\Facades\Validator;
use Auth;
use DataTables;
use App\Models\VendorProduct;

class VendorQuotationController extends Controller
{
    private $quotationService;

    public function __construct(QuotationService $quotationService)
    {
        $this->quotationService = $quotationService;
    }
    /********************************************************************/
    public function sendQuotation(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'description' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'errors' => $validator->messages()
                ]);
            }
            try {
                $quotationExist = WholeSalerQuotation::where('vendor_id', Auth::guard('vendor')->user()->id)->where('product_id', $request->product_id)->first();
                if ($quotationExist) {
                    return response()->json(['status' => 422, 'message' => 'Quotation Already Exist on this Product']);
                }
                $quotation = $this->quotationService->saveQuotation($request);
                $quotation->save();
                return response()->json(['status' => 200, 'message' => 'Quotation Submit to WholeSaler']);
            } catch (\Throwable $th) {
                return response()->json(['status' => 422, 'message' => $th->getMessage()]);
            }
        }
    }
    /*********************************************************************/
    public function toWholesaler(Request $request)
    {
        $pageTitle = 'Quotations';


        return view('vendor_panel.quotations.to_wholesaler.index', compact('pageTitle'));
    }
    /*********************************************************************/
    public function toWholesalerList(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->quotationService->getQuotations();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('product_id', function ($row) {
                    $image = \Config::get('app.url') . '/assets/uploads/products/' . $row->product->image;
                    return '<img src="' . $image . '" border="0"
                    width="50" class="img-rounded" align="center" /> ' . $row->product->name . ' ';
                })
                ->editColumn('vendor_id', function ($row) {
                    return ($row->vendor) ? strtoupper($row->vendor->business_name) : "";
                })
                ->editColumn('start_date', function ($row) {
                    return date('d-m-Y h:i:s', strtotime($row->start_date));
                })

                ->editColumn('status', function ($row) {
                    if ($row->status == 'approved') {
                        return '<span class="badge bg-success" data-VendorID="' . $row->id . '" style="width:100px;">' . strtoupper($row->status) . '</span>';
                    } else if ($row->status == 'pending') {
                        return '<span class="badge bg-danger" data-VendorID="' . $row->id . '" style="width:100px;">' . strtoupper($row->status) . '</span>';
                    }
                })

                ->addColumn('action', function ($row) {

                    $btn = '<div class="col text-end">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                        <ul class="dropdown-menu" style="">
                        <li><a class="dropdown-item importProduct" href="javascript:void(0);" data-VendorID="' . $row->vendor_id . '" data-QuotationID="' . $row->id . '"><i class="fadeIn animated bx bx-check-double" style="color: green;"></i></i> Import</a>
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
                ->rawColumns(['status', 'product_id', 'action'])
                ->make(true);
        }
    }
    /********************************************************************/
    public function importQuotationProduct(Request $request)
    {
        if ($request->ajax()) {
            try {
                $quotation = WholeSalerQuotation::with('product')->where('vendor_id', $request->VendorID)->where('id', $request->QuotationID)->first();
                // echo "<pre>"; print_r($quotation->toArray()); exit;
                if ($quotation->status == 'pending') {
                    return response()->json(['status' => 422, 'message' => 'Quotation not approved by Wholesaler']);
                }
                $vendorProduct = VendorProduct::where('product_id', $quotation->product_id)->where('vendor_id', $quotation->vendor_id)->first();
                if ($vendorProduct) {
                    return response()->json(['status' => 422, 'message' => 'Product already imported']);
                }
                $importProduct = $this->quotationService->importQuotProduct($quotation, $request);
                $importProduct->vendor_id = $quotation->vendor_id;
                if ($importProduct->save()) {
                    return response()->json(['status' => 200, 'message' => 'Product Imported Successfully!']);
                }
            } catch (\Throwable $th) {
                return response()->json(['status' => 422, 'message' => $th->getMessage()]);
            }
        }
    }
    /********************************************************************/
}
