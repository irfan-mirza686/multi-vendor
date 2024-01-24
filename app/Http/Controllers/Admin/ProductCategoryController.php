<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Requests\ProductCategoryRequest;
use Auth;
use DataTables;

class ProductCategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    /********************************************************************/

    public function index()
    {
        $pageTitle = "Category List";
        $productCategory = $this->categoryService->all();
        return view('admin.category.index', compact('productCategory'));
    }
    public function categoriesList(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::with('parentcategory')->get();
            return Datatables::of($data)
                ->addIndexColumn()

                ->editColumn('image', function ($row) {
                    $image = ($row->image)?getFile('categories',$row->image) : getFile('/','no-image.png');
                    return '<img src="' . $image . '" border="0"
                    width="50" class="product-img-2" align="center" />';
                })

                ->editColumn('is_featured', function ($row) {
                    return  strtoupper($row->is_featured);
                })
                ->editColumn('parent_category', function ($row) {

                    return  ($row->parentcategory)?strtoupper($row->parentcategory->name):'None';
                })


                ->editColumn('status', function ($row) {
                    if ($row->status == 'active') {
                        return '<span class="badge bg-success updateStatus" data-categoryID="' . $row->id . '" data-Status="inactive" style="cursor: pointer; width:100px;">' . strtoupper($row->status) . '</span>';
                    } else if ($row->status == 'inactive') {
                        return '<span class="badge bg-danger updateStatus" data-categoryID="' . $row->id . '" data-Status="active" style="cursor: pointer; width:100px;">' . strtoupper($row->status) . '</span>';
                    }
                })

                ->addColumn('action', function ($row) {

                    $btn = '<div class="col text-end">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                        <ul class="dropdown-menu" style="">
                        <li><a class="dropdown-item" href="'. route('admin.wholesaler.profile',$row->username) .'"><i class="lni lni-eye" style="color: blue;"></i> Profile</a>
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
                ->rawColumns(['image','status', 'action'])
                ->make(true);
        }
    }
    /********************************************************************/
    public function create()
    {
        $pageTitle = "Create Category";
        $parentCategory = Category::select('id','name')->where('parent_category',0)->get();
        return view('admin.category.create',compact('parentCategory','pageTitle'));
    }
    /********************************************************************/
    public function store(ProductCategoryRequest $request)
    {
        try {
            $create = $this->categoryService->store($request->all());
            $create->admin_id = Auth::guard('admin')->user()->id;
            $create->save();
            return redirect(route('admin.product.categories'))->with('flash_message_success', 'Data Saved Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('flash_message_error', $th->getMessage());
        }

    }
    /********************************************************************/
    public function edit($id = null)
    {
        $editData = $this->categoryService->find($id);
        return view('admin.category.edit', compact('editData'));
    }
    /********************************************************************/
    public function update(ProductCategoryRequest $request, $id = null)
    {
        $this->categoryService->update($request->all(), $id);
        return redirect(route('admin.product.categories'))->with('flash_message_success', 'Data Updated Successfully');
    }
    /********************************************************************/
    public function delete($id = null)
    {
        $this->categoryService->delete($id);
        return redirect(route('admin.product.categories'))->with('flash_message_success', 'Data Deleted Successfully');
    }
    /********************************************************************/
}
