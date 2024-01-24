<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductTypeRequest;
use App\Repositories\Interfaces\ProductTypeRepositoryInterface;

class ProductTypeController extends Controller
{
    private $productTypeRepository;

    public function __construct(ProductTypeRepositoryInterface $productTypeRepository){
        $this->productTypeRepository = $productTypeRepository;
    }
    /********************************************************************/

    public function index()
    {
        $productTypes = $this->productTypeRepository->all();
        return view('admin.product_types.index',compact('productTypes'));
    }
    /********************************************************************/
    public function create()
    {
        return view('admin.product_types.create');
    }
    /********************************************************************/
    public function store(ProductTypeRequest $request)
    {
        $this->productTypeRepository->store($request->all());
        return redirect(route('admin.product.types'))->with('flash_message_success','Data Saved Successfully');
    }
    /********************************************************************/
    public function edit($id=null)
    {
        $editData = $this->productTypeRepository->find($id);
        return view('admin.product_types.edit',compact('editData'));
    }
    /********************************************************************/
    public function update(ProductTypeRequest $request,$id=null)
    {
        $this->productTypeRepository->update($request->all(),$id);
        return redirect(route('admin.product.types'))->with('flash_message_success','Data Updated Successfully');
    }
    /********************************************************************/
    public function delete($id=null)
    {
        $this->productTypeRepository->delete($id);
        return redirect(route('admin.product.types'))->with('flash_message_success','Data Deleted Successfully');
    }
    /********************************************************************/

}
