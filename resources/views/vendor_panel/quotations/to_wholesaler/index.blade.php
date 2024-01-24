@extends("vendor_panel.layouts.layout")



@section("content")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        @if(Session::has('flash_message_error'))
        <div class="alert alert-danger">

            <strong> {!! session('flash_message_error') !!} </strong>
        </div>

        @endif
        @if(Session::has('flash_message_success'))
        <div class="alert alert-success">

            <strong> {!! session('flash_message_success') !!} </strong>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Quotations</div>
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



        
        <hr/>

        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                  
                   
                    <!-- <div class="ms-auto"><a href="#" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="fadeIn animated bx bx-export"></i>Export</a></div>
                    <div class="ms-auto"><a href="#" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="fadeIn animated bx bx-import"></i>Import</a></div>
                    <div class="ms-auto"><a href="{{route('wholesaler.product.create')}}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New</a></div> -->
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-sm vendorToWholeSaler-quotations-table">
                        <thead class="table-light">
                            <tr>
                                
                                <th width="2%">#</th>
                                <th width="28%">Product</th>
                               
                                <th width="30%">Quotation</th>
                                <th width="10%">Date</th>
                                <th width="10%">Vendor</th>
                                <th width="10%">Status</th>
                                <th width="10%" class="text-center">Action</th>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('assets/vendor_assets/to_wholesaler.js')}}"></script>
@endpush

