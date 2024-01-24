@extends('frontend.layouts.layout')
@section('content')

<div id="menu-overlay"></div><!-- Wrapper -->
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="nav-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Quote Requests</li>
                    </ol>
                </nav>

                <h1 class="page-title">Quote Requests</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="row-custom">
                    <div class="profile-tab-content">
                        <!-- include message block -->

                        <!--print error messages-->

                        <!--print custom error message-->
                        @if(@$quotations)
                        <div class="table-responsive">
                            <table class="table table-quote_requests table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Vendor</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Quotation</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">End Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($quotations as $quotation)
                                    <?php
                                        $vendor_product = $quotation->vendor_product;
                                        $mainProduct = $vendor_product->product;
                                        // echo "<pre>"; print_r($mainProduct->name); exit;
                                    ?>
                                    <tr>
                                        <td>{{date('d-m-Y',strtotime($quotation->start_date))}}</td>
                                        <td>{{$quotation->vendor->business_name}}</td>
                                        <td>{{$mainProduct->name}}</td>
                                        <td>{{$quotation->note}}</td>
                                        <td>{{$quotation->status}}</td>
                                        <td>{{($quotation->end_date)?date('d-m-Y',strtotime($quotation->end_date)):''}}</td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>@else
                        <p class="text-center">
                            No records found! </p>
                        @endif
                        </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="table-pagination">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('custom-js')
<script src="{{asset('assets/vendor_assets/profile/products.js')}}"></script>

@endsection
