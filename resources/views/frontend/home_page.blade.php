@extends('frontend.layouts.layout')
@section('content')
<div class="row">

    <h1 class="index-title">Women Shopping Store</h1>
    <div class="col-12 section section-categories">
        <!-- featured categories -->

        <div class="featured-categories">
            <div class="card-columns">
                @foreach($categories as $category)
                @if($category->is_featured == 'yes')
                <div class="card lazyload" data-bg="{{getFile('categories',$category->image)}}">
                    <a href="javascript:void(0);">
                        <div class="caption text-truncate">
                            <span>{{$category->name}}</span>
                        </div>
                    </a>
                </div>
                @endif
                @endforeach

            </div>
        </div>

    </div>

    <div class="col-12">
        <div class="row-custom row-bn">
            <!--Include banner-->
            <!--print banner-->

        </div>
    </div>

    <div class="col-12 section section-latest-products">
        <h3 class="title">
            <a href="javascript:void(0);">New Arrivals</a>
        </h3>
        <p class="title-exp">Last added products</p>
        <div class="row row-product">
            <!--print products-->
            @foreach($vendorProducts as $product)
            <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                <div class="product-item">
                    <div class="row-custom product-multiple-image">
                        <a class="item-wishlist-button item-wishlist-enable " data-product-id="38"></a>
                        <div class="img-product-container">

                            <a
                                href="{{ route('product.details', ['vendor' => $product->vendor['username'], 'product' => $product->product['slug']]) }}">
                                <?php
                                            $productSlug = $baseURL .'/' . $product->product->slug;
                                            $thumbnail = $baseURL . '/assets/uploads/products/' . $product->product->image;
                                            ?>
                                <img src="{{getFile('products',$product->product->image)}}"
                                    data-src="{{getFile('products',$product->product->image)}}" alt="Gorgett gown"
                                    class="lazyload img-fluid img-product">
                                @foreach($product->product->other_images as $image)
                                <?php

                                            $produImg = $baseURL . '/assets/uploads/products/' . $image['img'];

                                            ?>

                                <img src="{{getFile('products',$image['img'])}}"
                                    data-src="{{getFile('products',$image['img'])}}" alt="Gorgett gown"
                                    class="lazyload img-fluid img-product img-second">
                                @endforeach
                            </a>
                            <div class="product-item-options">
                                <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                    data-toggle="tooltip" data-placement="left" data-product-id="38" data-reload="0"
                                    title="Wishlist">
                                    <i class="icon-heart-o"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row-custom item-details">
                        <h3 class="product-title">
                            <a href="{{ route('product.details', ['vendor' => $product->vendor['username'], 'product' => $product->product['slug']]) }}">{{$product->product['name']}}</a>
                        </h3>
                        <p class="product-user text-truncate">
                            <a href="{{$baseURL}}/profile/{{$product->vendor['username']}}">
                                {{$product->vendor['business_name']}}</a>
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
                            <span class="price"><span>PKR </span>{{$product->product->item_price}}</span>
                            <a href="javascript:void(0);" data-url="{{route('user.send.quotation')}}" data-productID="{{$product->id}}" data-vendorID="{{$product->vendor_id}}" class="btn btn-dark btn-sm rounded-0 openQuotationModal" style="float: right; color: white;">Quotation</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <div class="col-12">
        <div class="row-custom row-bn">
            <!--Include banner-->
            <!--print banner-->

        </div>
    </div>
</div>
@include('frontend.includes.quotation_modal')
@endsection

@section('custom-js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('assets/frontend/js/quotations/quotation.js')}}"></script>
@endsection
