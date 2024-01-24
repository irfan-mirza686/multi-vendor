@extends("admin.layouts.layout")
@section('title', '| General Settings')


@section("style")

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="{{asset('assets/css/upload_img.css')}}">
@endsection

@section("content")
<div class="page-wrapper">
    <div class="page-content">
        @include('show_flash_msgs')
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Settings</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i
                                    class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">General</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="col">

                    <a href="{{route('admin.dashboard')}}" class="btn btn-primary px-5 rounded-0">Back</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <form action="{{route('admin.update.settings')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="card-body p-4">
                    <h5 class="card-title">Email Configuration</h5>
                    <hr />
                    <div class="form-body mt-4">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label for="sitename" class="form-label">Site Name <font
                                                    style="color: red;">*</font></label>
                                            <input type="text" class="form-control" name="sitename"
                                                placeholder="Site Name" value="{{ @$general->sitename }}">
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="mb-3 col-md-4">
                                            <label for="wholesaler_reg" class="form-label">Wholesaler Registration <font
                                                    style="color: red;">*</font></label>
                                            <select class="form-control" name="wholesaler_reg" id="wholesaler_reg">
                                                <option value="on"
                                                    {{ @$general->wholesaler_reg == 'on' ? 'selected' : '' }}>ON
                                                </option>
                                                <option value="off"
                                                    {{ @$general->wholesaler_reg == 'off' ? 'selected' : '' }}>
                                                    OFF</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label for="vendor_reg" class="form-label">Vendor Registration <font
                                                    style="color: red;">*</font></label>
                                            <select class="form-control" name="vendor_reg" id="vendor_reg">
                                                <option value="on"
                                                    {{ @$general->vendor_reg == 'on' ? 'selected' : '' }}>ON</option>
                                                <option value="off"
                                                    {{ @$general->vendor_reg == 'off' ? 'selected' : '' }}>
                                                    OFF</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label for="user_reg" class="form-label">Consumer Registration <font
                                                    style="color: red;">*</font></label>
                                            <select class="form-control" name="user_reg" id="user_reg">
                                                <option value="on" {{ @$general->user_reg == 'on' ? 'selected' : '' }}>
                                                    ON</option>
                                                <option value="off"
                                                    {{ @$general->user_reg == 'off' ? 'selected' : '' }}>
                                                    OFF</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="talk_to" class="form-label">Talk To <font style="color: red;">*
                                                </font></label>
                                            <input type="text" class="form-control" name="talk_to"
                                                placeholder="WhatsApp Number" value="{{ @$general->talk_to }}">
                                        </div>
                                        <div class="col-md-4">
                                        <div class="profile-pic-wrapper">
                                        <div class="pic-holder">
                                            <!-- uploaded pic shown here -->
                                            <?php
                                            $image = '';
                                            if ($general->logo) {

                                                $image = asset('assets/uploads/logo/'.$general->logo);
                                            }else{
                                                $image = asset('assets/uploads/no-image.png');

                                            }

                                            ?>
                                            <img id="profilePic" class="pic" src="<?php echo $image; ?>">

                                            <Input class="uploadProfileInput" type="file" name="logo"
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
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Update Settings</button>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection

@push('custom-script')
<script src="{{asset('assets/js/upload_img.js')}}"></script>

@endpush
