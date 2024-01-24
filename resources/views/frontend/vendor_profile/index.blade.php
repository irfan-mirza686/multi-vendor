@extends('frontend.layouts.layout')
@section('content')

<div class="row">
    <div class="col-12">
        <nav class="nav-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="profile-page-top">
            <!--user profile info-->
            <div class="row-custom">
                <div class="profile-details">
                    <div class="left">
                        <img src="http://secretattire.in/assets/img/user.png" alt="admin" class="img-profile">
                    </div>
                    <div class="right">
                        <div class="row-custom row-profile-username">
                            <h1 class="username">
                                <a href="javascript:void(0);"> {{$vendor['business_name']}}</a>
                                <input type="hidden" value="{{$vendor['id']}}" id="vendorID">
                            </h1>
                            <i class="icon-verified icon-verified-member"></i>
                        </div>
                        <div class="row-custom">
                            <p class="p-last-seen">
                                <span class="last-seen "> <i class="icon-circle"></i> Last seen:
                                    &nbsp;{{$vendor->created_at->diffForHumans()}}</span>
                            </p>
                        </div>
                        <div class="row-custom">
                            <p class="description">
                            </p>
                        </div>

                        <div class="row-custom user-contact">
                            <span class="info">Member since&nbsp;{{date('M Y',strtotime($vendor->created_at))}}</span>
                        </div>

                        <div class="profile-rating">
                        </div>

                        <div class="row-custom profile-buttons">
                            <div class="buttons">
                                <button class="btn btn-md btn-outline-gray" data-toggle="modal"
                                    data-target="#loginModal"><i class="icon-envelope"></i>Ask
                                    Question</button>
                                <button class="btn btn-md btn-outline-gray" data-toggle="modal"
                                    data-target="#loginModal"><i class="icon-user-plus"></i>Follow</button>
                            </div>

                            <div class="social">
                                <ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="products" class="row-custom"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <ul class="nav nav-tabs nav-tabs-horizontal nav-tabs-profile" role="tablist">
            <li class="nav-item">
                <a class="nav-link " href="javascript:void(0);">Wishlist<span
                        class="count">(1)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="javascript:void(0);">Followers<span
                        class="count">(0)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="javascript:void(0);">Following<span
                        class="count">(0)</span></a>
            </li>
        </ul>
    </div>
    <div class="col-12">
        <div class="profile-tab-content">
            <div class="row">
                <div class="col-12 col-md-3 col-sidebar-products">
                    <div id="collapseFilters" class="product-filters">
                        <div class="filter-item">
                            <div class="profile-search">
                                <input type="search" name="search" id="input_search_vendor"
                                    class="form-control form-input profile-search" placeholder="Search">
                                <button id="btn_search_vendor" class="btn btn-default btn-search"
                                    data-current-url="http://secretattire.in/profile/admin" data-query-string=""><i
                                        class="icon-search"></i></button>
                            </div>
                        </div>
                        <div class="filter-item">
                            <h4 class="title">Category</h4>
                            <div class="filter-list-container">
                                <ul class="filter-list filter-custom-scrollbar filter-list-categories">
                                    <a href="{{route('vendor.profile',$vendor->username)}}"><svg width="1em"
                                            height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-short"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z">
                                            </path>
                                        </svg></a>
                                    @foreach($categories as $category)
                                    <li>

                                        <a href="javascript:void(0);" data-slug="{{$category->slug}}"
                                            class="vendorCategory">{{$category->name}}</a>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>

                        <div class="filter-item">
                            <h4 class="title">Price</h4>
                            <div class="price-filter-inputs">
                                <div class="row align-items-baseline row-price-inputs">
                                    <div class="col-4 col-md-4 col-lg-5 col-price-inputs">
                                        <span>Min</span>
                                        <input type="input" id="price_min" value=""
                                            class="form-control price-filter-input" placeholder="Min"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-5 col-price-inputs">
                                        <span>Max</span>
                                        <input type="input" id="price_max" value=""
                                            class="form-control price-filter-input" placeholder="Max"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-2 col-price-inputs text-left">
                                        <button type="button" id="btn_filter_price"
                                            data-current-url="http://secretattire.in/profile/admin" data-query-string=""
                                            data-page="profile"
                                            class="btn btn-sm btn-default btn-filter-price float-left"><i
                                                class="icon-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row-custom m-b-30">
                        <a href="javascript:void(0)" class="text-muted link-abuse-report" data-toggle="modal"
                            data-target="#loginModal">
                            Report this seller </a>
                    </div>
                    <div class="row-custom">
                        <!--print sidebar banner-->

                    </div>
                </div>

                <div class="col-12 col-md-9 col-content-products">
                    <div class="row">
                        <div class="col-12 product-list-header">
                            <div class="filter-reset-tag-container">

                            </div>

                            <div class="product-sort-by">
                                <span class="span-sort-by">Sort By:</span>
                                <div class="sort-select">
                                    <select id="select_sort_items" class="custom-select"
                                        data-current-url="http://secretattire.in/profile/admin" data-query-string=""
                                        data-page="profile">
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

                    <div class="product-list-content">
                        <div class="row row-product">

                        </div>
                        <!-- <p class="text-center loading">Loading...</p> -->
                        <div class="text-center m-3">
                            <button class="btn btn-dark btn-sm" id="load-more" data-paginate="2"><span style="color: white;">Load more...</span></button>
                            <p class="invisible">No more products...</p>
                        </div>
                    </div>

                    <!-- <div class="product-list-pagination">
                        <div class="float-right">
                            <ul class='pagination'>
                                <li class='disabled'>
                                <li class='active page-num'><a href='#'>1<span class='sr-only'></span></a>
                                </li>
                                <li class="page-num"><a href="http://secretattire.in/profile/admin?page=2"
                                        data-ci-pagination-page="2">2</a></li>
                                <li class='next'><a href="http://secretattire.in/profile/admin?page=2"
                                        data-ci-pagination-page="2" rel="next">&rsaquo;</a>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="row-custom">
            <!--print banner-->

        </div>
    </div>

</div>

@endsection

@section('custom-js')
<script src="{{asset('assets/vendor_assets/profile/products.js')}}"></script>

@endsection
