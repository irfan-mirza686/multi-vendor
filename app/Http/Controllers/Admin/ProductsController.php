<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Services\ProductService;
use App\Models\Product;
use App\Models\WholeSaler;

class ProductsController extends Controller
{
	protected $productService;

    public function __construct(ProductService $productService){
        $this->productService = $productService;
    }
    /********************************************************************/
    public function index(Request $request)
    {
        $pageTitle = 'Products';
        $productsData = $this->productService->viewProducts($request);
        // echo "<pre>"; print_r($productsData); exit();
        // $search = $request->search;
        // $items = $request->items ?? 10;      // get the pagination number or a default
        // $user_id = $request->user_id ?? ''; // get the products by user_id
        // $viewData = Product::when($request, function($query) use($search){
        //     $query->where('ProductNameE','LIKE','%'.$search.'%')->get();
        // })->latest()->paginate($items);
        // $wholeSalers = WholeSaler::get();
        return view('admin.product.index',compact('productsData'));
    }
    /********************************************************************/
    public function TrashedProducts(Request $request)
    {
        
        $items = $request->items ?? 10;      // get the pagination number or a default
        $viewData = $this->productRepository->trashedProducts($request,$items);
       
        return view('admin.trashed.products',compact('viewData','items'));
    }
    /********************************************************************/
    public function RestoreTrashedProduct($id)
    {
        Product::withTrashed()->find($id)->restore();
  
        return redirect(route('admin.trashed.products'))->with('flash_message_success','Prodcut Restore Successfully');
    }
    /********************************************************************/
    public function DelTrashedProduct($id)
    {
        Product::withTrashed()->find($id)->forceDelete();
  
        return redirect(route('admin.trashed.products'))->with('flash_message_success','Prodcut Permanent Deleted Successfully');
    }
    /********************************************************************/
}
