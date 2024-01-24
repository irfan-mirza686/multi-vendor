<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PackageTypeRequest;
use App\Repositories\Interfaces\PackagesRepositoryInterface;
use Auth;

class PackageTypeController extends Controller
{
    private $packageRepository;

    public function __construct(PackagesRepositoryInterface $packageRepository){
        $this->packageRepository = $packageRepository;
    }
    /********************************************************************/

    public function index()
    {
       

        $viewData = $this->packageRepository->all();
        return view('admin.packages.index',compact('viewData'));
    }
    /********************************************************************/
    public function create()
    {
        return view('admin.packages.create');
    }
    /********************************************************************/
    public function store(PackageTypeRequest $request)
    {
        $this->packageRepository->store($request->all());
        return redirect(route('admin.package.types'))->with('flash_message_success','Data Saved Successfully');
    }
    /********************************************************************/
    public function edit($id=null)
    {
        $editData = $this->packageRepository->find($id);
        return view('admin.packages.edit',compact('editData'));
    }
    /********************************************************************/
    public function update(PackageTypeRequest $request,$id=null)
    {
        $this->packageRepository->update($request->all(),$id);
        return redirect(route('admin.package.types'))->with('flash_message_success','Data Updated Successfully');
    }
    /********************************************************************/
    public function delete($id=null)
    {
        $this->packageRepository->delete($id);
        return redirect(route('admin.package.types'))->with('flash_message_success','Data Deleted Successfully');
    }
    /********************************************************************/
}
