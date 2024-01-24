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



        
        <hr/>

        <div class="card">
            <div class="card-header">
             

                <div class="col-12">
                   <form>
                    @csrf
                    <label for="unit" class="form-label">WholeSalers <font style="color: red;">*</font></label>
                    <select class="single-select searchProducts" name="user_id" id="memberProducts">
                        <option disabled selected>-select-</option>
                        @foreach($productsData['wholeSalers'] as $wholesaler)
                        <option value="{{$wholesaler['id']}}"
                        {{(@$productsData['user_id'] == $wholesaler['id'])?'selected':''}}>
                    {{$wholesaler['name']}} </option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="d-lg-flex align-items-center mb-4 gap-3">
            <form method="GET" action="{{route('admin.product.search')}}">
                <div class="position-relative">
                    <input type="text" class="form-control ps-5 radius-30" name="search" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                </div>
            </form>
            <div class="ms-auto">
                <form>
                    <select id="pagination" class="form-control searchProducts">
                        <option value="10" @if($productsData['items'] == 10) selected @endif >10</option>
                        <option value="50" @if($productsData['items'] == 50) selected @endif >50</option>
                        <option value="100" @if($productsData['items'] == 100) selected @endif >100</option>
                        <option value="500" @if($productsData['items'] == 500) selected @endif >500</option>
                    </select>
                </form>
            </div>
            <div class="ms-auto"><a href="#" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="fadeIn animated bx bx-export"></i>Export</a></div>
            <div class="ms-auto"><a href="#" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="fadeIn animated bx bx-import"></i>Import</a></div>
            <div class="ms-auto"><a href="{{route('wholesaler.product.create')}}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New</a></div>
        </div>
        <div class="table-responsive">
            <table class="table mb-0 table-sm">
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
                        <th>Price</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productsData['products'] as $product)
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
                        <td>{{$product['item_price']}}</td>
                        
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
                                    <li><a class="dropdown-item" href="{{route('user.product.edit',$product['id'])}}">Edit</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{route('user.product.delete',$product['id'])}}">Delete</a>
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
    <span class="text-left searchProducts">Showing {{ $productsData['products']->firstItem() }} to {{ $productsData['products']->lastItem() }} of {{ $productsData['products']->total() }}</span>
    @if($productsData['products']->hasPages())
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
        window.location = "{{ $productsData['products']->url(1) }}&items=" + this.value;
    };
</script>

<script>
    $(document).ready(function() {
        $(".searchProducts").on('change', function() {
            let pagination = $('#pagination').val();
            let user_id = $('#memberProducts').val();
            if (pagination != null && user_id != null) {
                window.location = "{{ $productsData['products']->url(1) }}&user_id=" + user_id +
                "&items=" + pagination;
            } else if (pagination != null && user_id == null) {
                window.location = "{{ $productsData['products']->url(1) }}&items=" + pagination;
            } else if (pagination == null && user_id != null) {
                window.location = "{{ $productsData['products']->url(1) }}&user_id=" + user_id;
            }
        });
    });
</script>
@endsection

