<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AdminService;
use App\Models\Admin;
use App\Http\Requests\StaffFormRequest;
use Auth;
use DataTables;
use Session;

class StaffMemberController extends Controller
{
    private $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }
    /********************************************************************/
    public function index(Request $request)
    {
        $pageTitle = "Staff Members";
        return view('admin.staff_members.index', compact('pageTitle'));
    }
    /********************************************************************/
    public function staffMembersList(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->adminService->all();

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function ($row) {
                    $image = \Config::get('app.url') . '/assets/uploads/admins/' . $row->image;
                    return '<img src="' . $image . '" border="0" 
                    width="50" class="img-rounded" align="center" />';
                })
                ->editColumn('group_id', function ($row) {
                    return ($row->groups) ? strtoupper($row->groups->name) : "";
                })
                ->editColumn('state.name', function ($row) {
                    return ($row->state) ? strtoupper($row->state->name) : '';
                })
                ->editColumn('status', function ($row) {
                    return strtoupper($row->status);
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
    /********************************************************************/
    public function create()
    {
        $pageTitle = "Create Staff Member";
        return view('admin.staff_members.create', compact('pageTitle'));
    }
    /********************************************************************/
    public function store(StaffFormRequest $request)
    {
        $data = $request->all();
        try {
            $create = $this->adminService->store($data, $id = null);
            if ($create->save()) {
                Session::flash('flash_message_success', 'Data has been saved successfully');
                return redirect(route('admin.staff.members'));
            } else {
                Session::flash('flash_message_error', 'Data has not been saved');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Session::flash('flash_message_error', $th->getMessage());
            return redirect()->back();
        }
    }
    /********************************************************************/
}