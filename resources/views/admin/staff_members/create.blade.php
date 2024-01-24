@extends("admin.layouts.layout")
@section('title', '| Staff Members')

@section("content")

@section("style")

@endsection

<style>
    body {
        background: whitesmoke;
        font-family: 'Open Sans', sans-serif;
    }

    .container {
        max-width: 960px;
        margin: 30px auto;
        padding: 20px;
    }

    h1 {
        font-size: 20px;
        text-align: center;
        margin: 20px 0 20px;

        small {
            display: block;
            font-size: 15px;
            padding-top: 8px;
            color: gray;
        }
    }

    .avatar-upload {
        position: relative;
        max-width: 205px;
        margin: 50px auto;

        .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;

            input {
                display: none;

                +label {
                    display: inline-block;
                    width: 34px;
                    height: 34px;
                    margin-bottom: 0;
                    border-radius: 100%;
                    background: #FFFFFF;
                    border: 1px solid transparent;
                    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
                    cursor: pointer;
                    font-weight: normal;
                    transition: all .2s ease-in-out;

                    &:hover {
                        background: #f1f1f1;
                        border-color: #d6d6d6;
                    }

                    &:after {
                        content: "\f040";
                        font-family: 'FontAwesome';
                        color: #757575;
                        position: absolute;
                        top: 10px;
                        left: 0;
                        right: 0;
                        text-align: center;
                        margin: auto;
                    }
                }
            }
        }

        .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);

            >div {
                width: 100%;
                height: 100%;
                border-radius: 100%;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }
        }
    }
</style>
<!--start page wrapper -->
<div class="page-wrapper">
    @include('admin.city.includes.create_modal')
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
            <div class="breadcrumb-title pe-3">Staff Member</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                    <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                            href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                            link</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h6 class="mb-0 text-uppercase">Staff Member Form</h6>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="p-4 border rounded">
                            <form action="{{route('admin.staff.store')}}" class="row g-3 needs-validation" method="POST"
                                enctype="multipart/form-data" novalidate>@csrf
                                <div class="container">
                                    <h1>Staff Member
                                        <small>Profile Image</small>
                                    </h1>
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' name="image" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview"
                                                style="background-image: url(http://i.pravatar.cc/500?img=7);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="name"
                                        value="{{old('name')}}" required>
                                    <div class="invalid-feedback">Please enter name.</div>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="validationCustom02" name="email"
                                        value="{{old('email')}}" required>
                                    <div class="invalid-feedback">Please enter valid email.</div>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        value="{{old('password')}}" required>
                                    <div class="invalid-feedback">Please enter new Password.</div>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                               

                                <div class="col-md-6">
                                    <label for="validationCustom04" class="form-label">Role</label>
                                    <select class="form-select" name="group_id" id="validationCustom04" required>
                                        <option value="">-select-</option>
                                        <option value="1">Super Admin</option>
                                        <option value="2">Accountant</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a valid role.</div>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>

                                <div class="col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" name="status" id="status" required>
                                        <option value="">-select-</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    <div class="invalid-feedback">Please select status.</div>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
@endsection

@push('custom-script')
<script src="{{asset('assets/js/validate.min.js')}}"></script>
<script src="{{asset('assets/js/validation-script.js')}}"></script>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')
        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
@endpush