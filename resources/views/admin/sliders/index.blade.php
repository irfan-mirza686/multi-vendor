@extends("admin.layouts.layout")
@section('title', '| Sliders')

@section("content")
<!--start page wrapper -->
<div class="page-wrapper">
    @include('admin.sliders.includes.create_modal')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Sliders</div>
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
                    <div class="col">

                        <a href="{{route('admin.slider.store')}}" class="btn btn-success px-5 rounded-0 add"
                            style="float: right;"><i class="fadeIn animated bx bx-plus-circle"></i> Add New</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <input type="hidden" id="basePath" value="{{$basePath}}">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered sliders-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Sub-Title</th>
                                <th>Added By</th>
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
<script src="{{asset('assets/admin/js/sliders/slider_script.js')}}"></script>

<script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endpush
