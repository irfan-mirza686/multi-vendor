@extends("admin.layouts.layout")
@section('title', '| Consumers')

@section("content")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        @include('show_flash_msgs')
        
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Consumers</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i
                                    class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <!-- <h6 class="mb-0 text-uppercase">DataTable Import</h6> -->
        <hr />
        <div class="card">
            <div class="card-header">
                <div class="ms-auto">
                    <!-- <div class="col">

                        <a href="{{route('admin.city.store')}}" class="btn btn-success px-5 rounded-0 add"
                            style="float: right;"><i class="fadeIn animated bx bx-plus-circle"></i> Add New</a>
                    </div> -->
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered consumersList-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
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

@push('custom-script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('assets/admin/js/consumer/list.js')}}"></script>
@endpush