<?php

namespace App\Http\Controllers\Admin\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

class UserController extends Controller
{
    public function index()
    {
        $pageTitle = "Consumers";
        return view('admin.members.consumers.index', compact('pageTitle'));
    }
    /******************************************************************/
    public function ConsumersList(Request $request)
    {
        if ($request->ajax()) {
            $data = User::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function ($row) {
                    if ($row->status == 'active') {
                        return '<span class="badge bg-success updateStatus" data-UserID="' . $row->id . '" data-Status="inactive" style="cursor: pointer; width:100px;">' . strtoupper($row->status) . '</span>';
                    } else if ($row->status == 'inactive') {
                        return '<span class="badge bg-danger updateStatus" data-UserID="' . $row->id . '" data-Status="active" style="cursor: pointer; width:100px;">' . strtoupper($row->status) . '</span>';
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
                User::where('id', $request->UserID)->update(['status' => $request->status]);
                return response()->json(['status' => 200, 'message' => 'Status Updated']);
            } catch (\Throwable $th) {
                return response()->json(['status' => 422, 'message' => $th->getMessage()]);
            }
        }
    }
    /******************************************************************/
}
