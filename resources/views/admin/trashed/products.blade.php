@extends("admin.layouts.layout")
@section('title', '| Products')


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
            <div class="breadcrumb-title pe-3">Products</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Trashed List</li>
                    </ol>
                </nav>
            </div>
            
        </div>
        <!--end breadcrumb-->



        
        <hr/>

        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <form method="GET" action="{{route('admin.trashed.product.search')}}">
                    <div class="position-relative">
                        <input type="text" class="form-control ps-5 radius-30" name="search" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                    </div>
                </form>
                    <div class="ms-auto">
                        <label for="unit" class="form-label">Show Entries</label>
                        <form>
                            <select id="pagination" class="form-control single-select">
                                <option value="10" @if($items == 10) selected @endif >10</option>
                                <option value="50" @if($items == 50) selected @endif >50</option>
                                <option value="100" @if($items == 100) selected @endif >100</option>
                                <option value="500" @if($items == 500) selected @endif >500</option>
                            </select>
                        </form>
                    </div>
                   
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14">#</h6>
                                        </div>
                                    </div>
                                </th>
                                <th>Product</th>
                                <th>Brand</th>
                                <th>Barcode</th>
                                <th>Subscriber</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($viewData as $product)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14"># {{ $loop->index + 1 }}</h6>
                                        </div>
                                    </div>
                                </td>
                              
                                <td>{{$product['ProductNameE']}}</td>
                                <td>{{$product['BrandName']}}</td>
                                <td>{{$product['barcode']}}</td>
                                <td>{{$product['users']['company_name']}}</td>
                                <td>
                                    @if($product->status == 1)
                                    <div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>Active</div>
                                    @else
                                    <div class="badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>InActive</div>
                                    @endif
                                </td>
                                <td class="text-center">
                                 <div class="col">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                                        <ul class="dropdown-menu">
                                            <li>

                                                <a title="Restore?" data-toggle="modal" class="dropdown-item deleteRecord" href="javascript:void(0);" rel="{{ $product['id'] }}" rel1="/admin/trashed/product/restore" id="delete"><i class="fadeIn animated bx bx-undo"></i> Restore</a>
                                            </li>
                                            <li>

                                                <a title="Delete?" data-toggle="modal" class="dropdown-item deleteRecord" href="javascript:void(0);" rel="{{ $product['id'] }}" rel1="/admin/trashed/product/delete" id="delete"><i class="lni lni-trash"></i> Delete</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <p>No user found!</p>
                        @endforelse
                    </tbody>
                </table>
             
            </div>
        </div>
        <div class="card-footer">
            <span class="text-left">Showing {{ $viewData->firstItem() }} to {{ $viewData->lastItem() }} of {{ $viewData->total() }}</span>
            @if($viewData->hasPages())
            {{ $viewData->links('vendor.pagination.custom') }}
            @endif
        </div>
    </div>
</div>
</div>
<!--end page wrapper -->
@endsection

@section("script")
<script>
    document.getElementById('pagination').onchange = function() {
        window.location = "{{ $viewData->url(1) }}&items=" + this.value;
    };
</script>
@endsection

