@extends("vendor_panel.layouts.layout")
@section('title', '| Products')

@section("content")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-xl-2">
                                <a href="ecommerce-add-new-products.html" class="btn btn-primary mb-3 mb-lg-0"><i
                                        class="bx bxs-plus-square"></i>New Product</a>
                            </div>
                            <div class="col-lg-9 col-xl-10">
                                <form class="float-lg-end">
                                    <div class="row row-cols-lg-2 row-cols-xl-auto g-2">
                                        <div class="col">
                                            <div class="position-relative">
                                                <input type="text" class="form-control ps-5"
                                                    placeholder="Search Product..."> <span
                                                    class="position-absolute top-50 product-show translate-middle-y"><i
                                                        class="bx bx-search"></i></span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="btn-group" role="group"
                                                aria-label="Button group with nested dropdown">
                                                <button type="button" class="btn btn-white">Sort By</button>
                                                <div class="btn-group" role="group">
                                                    <button id="btnGroupDrop1" type="button"
                                                        class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bx bx-chevron-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                        <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                        <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="btn-group" role="group"
                                                aria-label="Button group with nested dropdown">
                                                <button type="button" class="btn btn-white">Collection Type</button>
                                                <div class="btn-group" role="group">
                                                    <button id="btnGroupDrop1" type="button"
                                                        class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bx bxs-category"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                        <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                        <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-white">Price Range</button>
                                                <div class="btn-group" role="group">
                                                    <button id="btnGroupDrop1" type="button"
                                                        class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bx bx-slider"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-start"
                                                        aria-labelledby="btnGroupDrop1">
                                                        <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                        <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">

            @foreach($products as $product)
            <div class="col">
                <div class="card mt-3">
                    <img src="{{ getFile('products',$product->image) }}" class="card-img-top" alt="...">
                    <div class="">
                        <?php 
                $discountedPrice = \App\Models\Product::getDiscount($product->id);
                        // echo "<pre>"; print_r($discountedPrice); exit();
                ?>
                        @if($discountedPrice > 0)
                        <div class="position-absolute top-0 end-0 m-3 product-discount"><span
                                class="">-{{$product->discount}}%</span></div>
                        @endif
                    </div>
                    <div class="card-body">
                        <h6 class="card-title cursor-pointer">{{$product['name']}}</h6>
                        <div class="clearfix">
                            <p class="mb-0 float-start"><strong>134</strong> Sales</p>
                            @if($discountedPrice > 0)
                            <p class="mb-0 float-end fw-bold"><span
                                    class="me-2 text-decoration-line-through text-secondary">{{$product['item_price']}}</span><span>PKR
                                    {{$discountedPrice}}</span>
                            </p>
                            @else
                            <p class="mb-0 float-end fw-bold"><span>PKR {{$product['item_price']}}</span>
                                @endif
                        </div>
                        <div class="d-flex align-items-center mt-3 fs-6">
                            <div class="cursor-pointer">
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-secondary"></i>
                            </div>
                            <p class="mb-0 ms-auto">4.2(182)</p>
                        </div>
                        <div class="d-flex align-items-center col-12">
                            <!-- <button class="btn btn-dark btn-sm rounded-0 openQuotationModal">Quotation</button> -->
                            <a href="javascript:void(0);" class="btn btn-dark btn-sm rounded-0 openQuotationModal"
                                data-ProductID="{{$product['id']}}" data-WholeSalerID="{{$product['wholesaler_id']}}"
                                style="text-decoration: none;">Quotation</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <!--end row-->
        @include('vendor_panel.product.wholesaler_products.includes.quotation_modal')
    </div>
</div>

<!--end page wrapper -->
@endsection

@push("custom-script")

<script src="{{asset('assets/vendor_assets/send_quotation.js')}}"></script>
@endpush