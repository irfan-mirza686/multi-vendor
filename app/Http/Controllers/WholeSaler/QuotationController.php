<?php

namespace App\Http\Controllers\WholeSaler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Wholesaler\WholesalerQuotationService;
use App\Models\WholeSalerQuotation;
use DataTables;

class QuotationController extends Controller
{
    protected $wholesalerQuotationService;
    public function __construct(WholesalerQuotationService $wholesalerQuotationService)
    {
        $this->wholesalerQuotationService = $wholesalerQuotationService;
    }
    /*********************************************************************/
    public function index(Request $request)
    {
        $pageTitle = 'Quotations';


        return view('wholesaler.quotations.index', compact('pageTitle'));
    }
    /*********************************************************************/
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->wholesalerQuotationService->getData();
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
                ->rawColumns(['product_id','status', 'action'])
                ->make(true);
        }
    }
    /******************************************************************/
    public function updateStatus(Request $request)
    {
        if ($request->ajax()) {
            try {
                // echo "<pre>"; print_r($request->all()); exit;
                WholeSalerQuotation::where('id', $request->QuotationID)->update(['status' => $request->status]);
                return response()->json(['status' => 200, 'message' => 'Quotation Approved']);
            } catch (\Throwable $th) {
                return response()->json(['status' => 422, 'message' => $th->getMessage()]);
            }
        }
    }
    /*********************************************************************/

}