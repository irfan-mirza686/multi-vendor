@extends("admin.layouts.layout")

@section("content")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        @include('show_flash_msgs')
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Products</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <hr />

        <div class="card">

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-sm vendor-products-table">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Thumbnail</th>
                                <th>Vendor</th>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Unit</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>
<!--end page wrapper -->
@endsection

@push("custom-script")
<script src="{{asset('assets/admin/js/vendors/products.js')}}"></script>

@endpush
