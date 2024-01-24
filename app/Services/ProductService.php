<?php
namespace App\Services;

use App\Models\VendorProduct;
use App\Models\{
    Unit,
    ProductType,
    Country,
    Product,
    Category,
    WholeSaler,
};
use Auth;

class ProductService
{
    /********************************************************************/
    public function getExternalData()
    {
        $user = WholeSaler::find(Auth::guard('wholesaler')->user()->id);

        $data['productTypes'] = ProductType::get()->toArray();
        $data['countries'] = Country::get()->toArray();
        $data['units'] = Unit::get()->toArray();
        $data['categories'] = Category::get()->toArray();

        return array(
            'productTypes' => $data['productTypes'],
            'countries' => $data['countries'],
            'units' => $data['units'],
            'categories' => $data['categories']
        );
    }
    /********************************************************************/
    public function all()
    {
        return Product::with(['category', 'unit'])->where('wholesaler_id', Auth::guard('wholesaler')->user()->id)->get();
    }
    /********************************************************************/
    public function wholesalerProducts()
    {
        return Product::with(['category', 'unit', 'wholesalers'])->get();
    }
    /********************************************************************/
    public function vendorProducts()
    {
        return VendorProduct::with(['product', 'vendor'])->get();
    }
    /********************************************************************/
    public function storeProduct($data, $id = null)
    {
        if ($id == null) {
            $addProduct = new Product;

        } else if ($id != null) {
            $addProduct = Product::find($id);

        }

        if (isset($data['image']) && !empty($data['image'])) {
            $filename = uploadImage($data['image'], filePath('products'), $addProduct->image);
            $addProduct->image = $filename;
        }

        // echo "<pre>"; print_r('empty'); exit();
        $seo_data = [
            'meta_title' => $data['meta_title'] ?? '',
            'meta_keywords' => $data['meta_keywords'] ?? '',
            'meta_description' => $data['meta_description'] ?? ''
        ];

        $addProduct->name = $data['name'];
        $addProduct->sku = $data['sku'];
        $addProduct->slug = \Str::slug($data['name']);
        $addProduct->item_price = isset($data['item_price']) ? $data['item_price'] : null;
        $addProduct->discount = isset($data['discount']) ? $data['discount'] : 0;
        $addProduct->description = isset($data['description']) ? $data['description'] : null;
        $addProduct->seo_data = $seo_data;
        $addProduct->category_id = isset($data['category_id']) ? $data['category_id'] : null;
        $addProduct->unit_id = $data['unit_id'];
        $addProduct->status = $data['status'];


        return $addProduct;
    }

    /********************************************************************/
}
