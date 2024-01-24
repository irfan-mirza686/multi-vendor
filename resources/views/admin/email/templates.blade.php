@extends("admin.layouts.layout")
@section('title', '| Email Templates')

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
            <div class="breadcrumb-title pe-3">Email Templates</div>
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
                <div class="card-header">
                    <div class="ms-auto">
                        <h6 class="mb-0 text-uppercase">Email Templates</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>

                                <th>Sl</th>
                                <th>Name</th>
                                <th>Subject</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($emailTemplates as $key => $email)
                            <tr>
                                <!-- {{ $loop->index + 1 }} -->

                                <td>{{ $key + $emailTemplates->firstItem() }}</td>
                                <td>{{str_replace('_',' ', $email->name)}}</td>
                                <td>{{$email->subject}}</td>

                                <td class="text-center">
                                    <div class="col">
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{route('admin.email.templates.edit', $email)}}">Edit</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>

                                <td class="text-center" colspan="100%">No Email Template Found'</td>

                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="card-footer">
                <span class="text-left">Showing {{ $emailTemplates->firstItem() }} to {{ $emailTemplates->lastItem() }}
                    of {{ $emailTemplates->total() }}</span>
                @if($emailTemplates->hasPages())
                {{ $emailTemplates->links('vendor.pagination.custom') }}
                @endif
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
@endsection

@section("script")

@endsection