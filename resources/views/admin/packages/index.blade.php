@extends("admin.layouts.layout")
@section('title', '| Packages')


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
            <div class="breadcrumb-title pe-3">Packages</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                    </ol>
                </nav>
            </div>
          
        </div>
        <!--end breadcrumb-->



        <!-- <h6 class="mb-0 text-uppercase">DataTable Import</h6> -->
        <hr/>
        <div class="card">
          
            <div class="card-header">
                        <div class="ms-auto">
                            <div class="col">

                                <a href="{{route('admin.package.type.create')}}" class="btn btn-success px-5 rounded-0" style="float: right;"><i class="fadeIn animated bx bx-plus-circle"></i> Add New</a>
                            </div>
                        </div>
                    </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Country</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 0; ?>
                            @foreach($viewData as $package)
                            <?php $counter = $counter+1; ?>
                            <tr>
                                <td>{{$counter}}</td>
                                <td>{{$package['name']}}</td>
                                <td class="text-center">
                                 <div class="col">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{route('admin.package.type.edit',$package['id'])}}"><i class="lni lni-pencil-alt"></i> Edit</a>
                                            </li>
                                            <li>

                                                <a title="Delete?" data-toggle="modal" class="dropdown-item deleteRecord" href="javascript:void(0);" rel="{{ $package['id'] }}" rel1="/admin/package/type/delete" id="delete"><i class="lni lni-trash"></i> Delete</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!--end page wrapper -->
@endsection

