<?php

namespace App\Services\Frontend;
use App\Models\VendorProduct;


class ShopService
{
    public function loadMoreProducts($products)
    {
        $anchor = '';

        $html = '';
        foreach ($products as $product) {
            foreach ($product->product->other_images as $image) {
                $anchor .= '<img src="' . getFile('products', $image['img']) . '"
                        data-src="' . getFile('products', $image['img']) . '" alt="Gorgett gown"
                        class="lazyload img-fluid img-product img-second">';
            }
            $html .= '<div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                    <div class="product-item">
                        <div class="row-custom product-multiple-image">
                            <a class="item-wishlist-button item-wishlist-enable " data-product-id="38"></a>
                            <div class="img-product-container">
                                <a
                                    href=" ' . route('product.details', ['vendor' => $product->vendor['username'], 'product' => $product->product['slug']]) . '">

                                    <img src="' . getFile('products', $product->product->image) . '"
                                        data-src="' . getFile('products', $product->product->image) . '"
                                        alt="Gorgett gown" class="lazyload img-fluid img-product">

                                        ' . $anchor . '


                                </a>
                                <div class="product-item-options">
                                    <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                        data-toggle="tooltip" data-placement="left" data-product-id="38"
                                        data-reload="0" title="Wishlist">
                                        <i class="icon-heart-o"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row-custom item-details">
                            <h3 class="product-title">
                                <a
                                    href="' . route('product.details', ['vendor' => $product->vendor['username'], 'product' => $product->product['slug']]) . '">' . $product->product->name . '</a>
                            </h3>
                            <p class="product-user text-truncate">
                                <a href="' . route('vendor.profile', $product->vendor['username']) . '">
                                    ' . $product->vendor['business_name'] . '</a>
                            </p>
                            <div class="product-item-rating">
                                <div class="rating">
                                    <i class="icon-star-o"></i>
                                    <i class="icon-star-o"></i>
                                    <i class="icon-star-o"></i>
                                    <i class="icon-star-o"></i>
                                    <i class="icon-star-o"></i>
                                </div><span class="item-wishlist"><i class="icon-heart-o"></i>0</span>
                            </div>
                            <div class="item-meta">
                                <span class="price"><span>PKR
                                    </span>' . $product->product->item_price . '</span>
                            </div>
                        </div>
                    </div>
                </div>';
        }
        return $html;
    }
    /************************************************/
    public function sortedProducts($sort)
    {
        $products = VendorProduct::with(['product', 'vendor']);

        if ($sort=='most_recent') {
             $products->latest()->paginate(8);
            // echo "<pre>"; print_r($products->paginate(8)); exit;
        }else if($sort=='lowest_price'){

             $products->paginate(8);
        }else if($sort=='highest_price'){
             $products->paginate(8);
        }
        return $products->paginate(8);
    }


}
