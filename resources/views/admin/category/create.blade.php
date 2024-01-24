@extends("admin.layouts.layout")
@section('title', '| Add Product Category')

@section("style")

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="{{asset('assets/css/upload_img.css')}}">
@endsection

@section("content")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Product Categories</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i
                                    class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="row">
            @include('show_flash_msgs')
            <div class="col-xl-9 mx-auto">
                <!-- <h6 class="mb-0 text-uppercase">Basic Validation</h6> -->
                <hr />
                <div class="card">
                    <div class="card-header">
                        <div class="ms-auto">
                            <div class="col">

                                <a href="{{route('admin.product.categories')}}" class="btn btn-primary px-5 rounded-0"
                                    style="float: right;"><i class="fadeIn animated bx bx-arrow-back"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="p-4 border rounded">
                            <form class="row g-3 needs-validations" action="{{route('admin.product.category.store')}}"
                                method="post" enctype="multipart/form-data" novalidate>@csrf
                                <div>
                                    <label for="category_name" class="form-label">Category Name <font
                                            style="color: red;">*</font></label>
                                    <input type="text" class="form-control" id="category_name" name="name"
                                        value="{{old('name')}}" required>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div>
                                    <label for="category_slug" class="form-label">Slug <span
                                            style="color: gray; font-size: 12px;">(If you leave it empty, it will be
                                            generated automatically.)</span></label>
                                    <input type="text" class="form-control" id="category_slug" name="slug"
                                        value="{{old('slug')}}" required>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div>
                                    <label for="meta_title" class="form-label">Title (Meta Tag)</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title"
                                        value="{{old('meta_title')}}" required>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div>
                                    <label for="meta_decription" class="form-label">Description (Meta Tag)</label>
                                    <input type="text" class="form-control" id="meta_decription" name="meta_decription"
                                        value="{{old('meta_decription')}}" required>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div>
                                    <label for="meta_keywords" class="form-label">Keywords (Meta Tag)</label>
                                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                                        value="{{old('meta_keywords')}}" required>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div>
                                    <label for="meta_keywords" class="form-label">Parent Category <font style="color: red;">*
                                        </font></label>
                                    <select class="single-select" name="parent_category" id="parent_category">
                                        <option disabled selected>-select-</option>

                                        <option value="0">None</option>
                                        @foreach($parentCategory as $parent)
                                        <option value="{{$parent->id}}">{{$parent->name}}</option>
                                        @endforeach

                                    </select>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div>
                                    <label for="status" class="form-label">Status <font style="color: red;">*
                                        </font></label>
                                    <select class="single-select" name="status" id="status">
                                        <option disabled selected>-select-</option>

                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>

                                    </select>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div>
                                    <label for="is_featured" class="form-label">Featured <font style="color: red;">*
                                        </font></label>
                                    <select class="single-select" name="is_featured" id="is_featured">
                                        <option disabled selected>-select-</option>

                                        <option value="no">No</option>
                                        <option value="yes">Yes</option>

                                    </select>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>

                                <div class="profile-pic-wrapper">
                                    <div class="pic-holder">
                                        <!-- uploaded pic shown here -->
                                        <?php
                                            $image = '';
                                            if (Auth::guard('admin')->user()->image) {

                                                $image = asset('uploads/admins/'.Auth::guard('admin')->user()->image);
                                            }else{
                                                $image = asset('assets/uploads/no-image.png');

                                            }

                                            ?>
                                        <img id="profilePic" class="pic" src="<?php echo $image; ?>">

                                        <Input class="uploadProfileInput" type="file" name="image"
                                            id="newProfilePhoto" accept="image/*" style="opacity: 0;" />
                                        <label for="newProfilePhoto" class="upload-file-block">
                                            <div class="text-center">
                                                <div class="mb-2">
                                                    <i class="fa fa-camera fa-2x"></i>
                                                </div>
                                                <div class="text-uppercase">
                                                    Update <br /> Profile Photo
                                                </div>
                                            </div>
                                        </label>
                                    </div>

                                    </hr>

                                </div>

                                <div class="col-12">
                                    <button class="btn btn-success" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--end row-->
    </div>
</div>

@endsection

@push("custom-script")
<script src="{{asset('assets/js/upload_img.js')}}"></script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'
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
