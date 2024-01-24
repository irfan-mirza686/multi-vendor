<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UnitRequest;
use App\Repositories\Interfaces\UnitRepositoryInterface;
use Auth;

class UnitController extends Controller
{
    private $unitRepository;

    public function __construct(UnitRepositoryInterface $unitRepository){
        $this->unitRepository = $unitRepository;
    }
    /********************************************************************/

    public function index()
    {
        // echo "<pre>"; print_r(Auth::guard('api')->user()); exit();
        $viewData = $this->unitRepository->all();
        return view('admin.units.index',compact('viewData'));
    }
    /********************************************************************/
    public function create()
    {
        return view('admin.units.create');
    }
    /********************************************************************/
    public function store(UnitRequest $request)
    {
        $this->unitRepository->store($request->all());
        return redirect(route('admin.units'))->with('flash_message_success','Data Saved Successfully');
    }
    /********************************************************************/
    public function edit($id=null)
    {
        $editData = $this->unitRepository->find($id);
        return view('admin.units.edit',compact('editData'));
    }
    /********************************************************************/
    public function update(UnitRequest $request,$id=null)
    {
        $this->unitRepository->update($request->all(),$id);
        return redirect(route('admin.units'))->with('flash_message_success','Data Updated Successfully');
    }
    /********************************************************************/
    public function delete($id=null)
    {
        $this->unitRepository->delete($id);
        return redirect(route('admin.units'))->with('flash_message_success','Data Deleted Successfully');
    }
    /********************************************************************/
}
