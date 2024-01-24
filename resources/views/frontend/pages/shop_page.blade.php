@extends('frontend.layouts.layout')
@section('content')

<div class="row">
    <div class="col-12">
        <nav class="nav-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-products">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active"><?php echo @$categoryDetails['breadcrumb'] ?? 'Shop'; ?></li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-12 product-list-header">
        <h1 class="page-title product-list-title">Products</h1>
        <div class="product-sort-by">
            <span class="span-sort-by">Sort By:</span>
            <div class="sort-select">
                <select id="sort_items" class="custom-select"
                    data-query-string="" data-page="products">
                    <option value="most_recent">Most Recent</option>
                    <option value="lowest_price">Lowest Price</option>
                    <option value="highest_price">Highest Price</option>
                </select>
            </div>
        </div>
        <button class="btn btn-filter-products-mobile" type="button" data-toggle="collapse"
            data-target="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters">
            <i class="icon-filter"></i>&nbsp;Filter Products </button>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-3 col-sidebar-products">
        <div id="collapseFilters" class="product-filters">
            <div class="filter-item">
                <h4 class="title">Category</h4>
                <div class="filter-list-container">
                    <ul
                        class="filter-list filter-custom-scrollbar filter-list-categories os-host os-theme-dark os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-scrollbar-vertical-hidden os-host-transition">
                        <div class="os-resize-observer-host">
                            <div class="os-resize-observer observed" style="left: 0px; right: auto;"></div>
                        </div>
                        <div class="os-size-auto-observer" style="height: calc(100% + 1px); float: left;">
                            <div class="os-resize-observer observed"></div>
                        </div>
                        <div class="os-content-glue" style="margin: 0px 0px -10px; height: 148px; width: 223px;"></div>
                        <div class="os-padding">
                            <div class="os-viewport os-viewport-native-scrollbars-invisible"
                                style="right: 0px; bottom: 0px;">
                                <div class="os-content" style="padding: 0px 0px 10px; height: auto; width: 100%;">
                                    @if($categories)
                                    @foreach($categories as $category)

                                    <li>
                                        <a href="{{$category->slug}}">{{$category->name}}</a>
                                    </li>
                                    @endforeach
                                    @else
                                    @foreach($subcategories as $subCat)
                                    <?php
                                // echo "<pre>"; print_r($subCat['slug']); exit;
                                ?>
                                    <li>
                                        <a href="{{ url('/'. $subCat['slug']) }}">{{$subCat['name']}}</a>
                                    </li>
                                    @endforeach

                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable">
                            <div class="os-scrollbar-track os-scrollbar-track-off">
                                <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);">
                                </div>
                            </div>
                        </div>
                        <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-unusable">
                            <div class="os-scrollbar-track os-scrollbar-track-off">
                                <div class="os-scrollbar-handle" style="height: 100%; transform: translate(0px, 0px);">
                                </div>
                            </div>
                        </div>
                        <div class="os-scrollbar-corner"></div>
                    </ul>
                </div>
            </div>

            <div class="filter-item">
                <h4 class="title">Price</h4>
                <div class="price-filter-inputs">
                    <div class="row align-items-baseline row-price-inputs">
                        <div class="col-4 col-md-4 col-lg-5 col-price-inputs">
                            <span>Min</span>
                            <input type="input" id="price_min" value="" class="form-control price-filter-input"
                                placeholder="Min"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                        <div class="col-4 col-md-4 col-lg-5 col-price-inputs">
                            <span>Max</span>
                            <input type="input" id="price_max" value="" class="form-control price-filter-input"
                                placeholder="Max"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                        <div class="col-4 col-md-4 col-lg-2 col-price-inputs text-left">
                            <button type="button" id="btn_filter_price" data-current-url="{{route('home')}}"
                                data-query-string="" data-page="products"
                                class="btn btn-sm btn-default btn-filter-price float-left"><i
                                    class="icon-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-custom">
            <!--Include banner-->
            <!--print sidebar banner-->

        </div>
    </div>

    <div class="col-12 col-md-9 col-content-products">
        <div class="filter-reset-tag-container">

        </div>
        <div class="product-list-content">
            <div class="row row-product">
                <!--print products-->

            </div>
            <div class="text-center m-3">
                <button class="btn btn-dark btn-sm" id="load-more" data-paginate="2"><span style="color: white;">Load
                        more...</span></button>
                <p class="invisible">No more products...</p>
            </div>
        </div>

        <div class="product-list-pagination">
            <div class="float-right">
                <ul class="pagination">
                    <li class="disabled"></li>
                    <li class="active page-num"><a href="#">1<span class="sr-only"></span></a></li>
                    <li class="page-num"><a href="{{route('home')}}" data-ci-pagination-page="2">2</a></li>
                    <li class="next"><a href="{{route('home')}}" data-ci-pagination-page="2" rel="next">›</a></li>
                </ul>
            </div>
        </div>

        <div class="col-12">
            <!--Include banner-->
            <!--print banner-->

        </div>
    </div>
</div>

@endsection

@section('custom-js')
<script src="{{asset('assets/frontend/js/shop/shop_products.js')}}"></script>

@endsection
