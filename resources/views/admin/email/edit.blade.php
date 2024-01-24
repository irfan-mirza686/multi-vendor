@extends("admin.layouts.layout")
@section('title', '| Update Email')

@section("style")
<!---- Summernote ------>
<!-- <link rel="stylesheet" href="{{asset('assets/css/summernote.css')}}"> -->
@endsection

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
            <div class="breadcrumb-title pe-3">Email Template</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <hr />
        <div class="row">

            <div class="col-9 col-md-9 col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <div class="ms-auto">
                                <h6 class="mb-0 text-uppercase">Variables Meaning</h6>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Variable</th>
                                    <th>Meaning</th>
                                </tr>

                                @foreach ($template->meaning as $key => $temp)
                                <tr>

                                    <td>{{ '{' . $key . '}' }}</td>
                                    <td>{{ $temp }}</td>

                                </tr>
                                @endforeach
                            </table>

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-9 col-md-9 col-lg-9">
                <div class="card">
                    <div class="card-body">

                        <form action="{{route('admin.email.templates.update',$template->id)}}" method="post">

                            @csrf

                            <div class="row">

                                <div class="form-group col-md-12">

                                    <label for="">Subject</label>
                                    <input type="text" name="subject" class="form-control"
                                        value="{{ $template->subject }}">

                                </div>

                                <div class="form-group col-md-12">

                                    <label for="">Template</label>
                                    <textarea name="template" cols="5" rows="20" class="form-control summernote"
                                        id="mytextarea">{{clean($template->template)}}</textarea>

                                </div>

                                <button type="submit" class="btn btn-primary">Update Email Template</button>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
@endsection

@push("custom-script")
<script src="https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js">
</script>
<script>
    tinymce.init({
        selector: '#mytextarea'
    });
</script>
@endpush