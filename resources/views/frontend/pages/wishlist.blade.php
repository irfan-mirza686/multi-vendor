@extends('frontend.layouts.layout')
@section('content')


            <div class="row">

                <div class="col-12">
                    <nav class="nav-breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                        </ol>
                    </nav>
                    <h1 class="page-title">Wishlist</h1>
                </div>

                <div class="col-12">
                    <div class="page-contact">
                        <div class="row">
                            <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                                <div class="product-item">
                                    <div class="row-custom product-multiple-image">
                                        <a class="item-wishlist-button item-wishlist-enable item-wishlist"
                                            data-product-id="19"></a>
                                        <div class="img-product-container">
                                            <a href="{{route('home')}}">
                                                <img src="http://secretattire.in/assets/img/img_bg_product_small.png"
                                                    data-src="http://secretattire.in/uploads/images/202303/img_x300_641d49bf41ba55-48896441-30134226.jpg"
                                                    alt="1MinSaree" class="lazyload img-fluid img-product">
                                                <img src="http://secretattire.in/assets/img/img_bg_product_small.png"
                                                    data-src="http://secretattire.in/uploads/images/202303/img_x300_641d49c2e0aef2-96787103-99402281.jpg"
                                                    alt="1MinSaree" class="lazyload img-fluid img-product img-second">
                                            </a>
                                            <div class="product-item-options">
                                                <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                    data-toggle="tooltip" data-placement="left" data-product-id="19"
                                                    data-reload="0" title="Wishlist">
                                                    <i class="icon-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-custom item-details">
                                        <h3 class="product-title">
                                            <a href="{{route('home')}}">1MinSaree</a>
                                        </h3>
                                        <p class="product-user text-truncate">
                                            <a href="{{route('home')}}">
                                                admin</a>
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
                                            <span class="price"><span>PKR</span>2,700</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                    </div>
                </div>

            </div>


@endsection
