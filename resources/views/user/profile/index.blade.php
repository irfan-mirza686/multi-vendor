@extends('frontend.layouts.layout')
@section('content')

<div id="menu-overlay"></div><!-- Wrapper -->
    <div id="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="nav-breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
                        </ol>
                    </nav>

                    <h1 class="page-title">Settings</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-3">
                    <div class="row-custom">
                        <!-- load profile nav -->

                        <div class="profile-tabs">
                            <ul class="nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="javascript:void(0);">
                                        <span>Update Profile</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="javascript:void(0);">
                                        <span>Cover Image</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="javascript:void(0);">
                                        <span>Shipping Address</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="javascript:void(0);">
                                        <span>Social Media</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="javascript:void(0);">
                                        <span>Change Password</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-9">
                    <div class="row-custom">
                        <div class="profile-tab-content">
                            <!-- include message block -->

                            <!--print error messages-->

                            <!--print custom error message-->

                            <form action="javascript:void(0);" id="form_validate"
                                enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                <input type="hidden" name="csrf_mds_token" value="c8a3b9497c4062332389a24c621779d7" />
                                <div class="form-group">
                                    <p>
                                        <img src="http://secretattire.in/assets/img/user.png" alt="abcxyz"
                                            class="form-avatar">
                                    </p>
                                    <p>
                                        <a class='btn btn-md btn-secondary btn-file-upload'>
                                            Select Image <input type="file" name="file" size="40"
                                                accept=".png, .jpg, .jpeg, .gif"
                                                onchange="$('#upload-file-info').html($(this).val().replace(/.*[\/\\]/, ''));">
                                        </a>
                                        <span class='badge badge-info' id="upload-file-info"></span>
                                    </p>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Email Address</label>

                                    <input type="email" name="email" class="form-control form-input"
                                        value="abc@gmail.com" placeholder="Email Address" required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Username</label>
                                    <input type="text" name="username" class="form-control form-input" value="abcxyz"
                                        placeholder="Username" maxlength="40" required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Slug</label>
                                    <input type="text" name="slug" class="form-control form-input" value="abcxyz"
                                        placeholder="Slug" maxlength="200" required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">First Name</label>
                                    <input type="text" name="first_name" class="form-control form-input" value="abc"
                                        placeholder="First Name" maxlength="250" required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control form-input" value="xyz"
                                        placeholder="Last Name" maxlength="250" required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control form-input" value=""
                                        placeholder="Phone Number" maxlength="100">
                                </div>

                                <div class="form-group m-t-10">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="control-label">Send me an email when someone send me a
                                                message</label>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-12 col-option">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="send_email_new_message" value="1"
                                                    id="send_email_new_message_1" class="custom-control-input">
                                                <label for="send_email_new_message_1"
                                                    class="custom-control-label">Yes</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-12 col-option">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="send_email_new_message" value="0"
                                                    id="send_email_new_message_2" class="custom-control-input" checked>
                                                <label for="send_email_new_message_2"
                                                    class="custom-control-label">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-t-15">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="show_email" value="1" id="checkbox_show_email"
                                            class="custom-control-input">
                                        <label for="checkbox_show_email" class="custom-control-label">Show my email
                                            address</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="show_phone" value="1" id="checkbox_show_phone"
                                            class="custom-control-input">
                                        <label for="checkbox_show_phone" class="custom-control-label">Show my phone
                                            number</label>
                                    </div>
                                </div>
                                <div class="form-group m-b-30">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="show_location" value="1"
                                            id="checkbox_show_location" class="custom-control-input">
                                        <label for="checkbox_show_location" class="custom-control-label">Show my
                                            location</label>
                                    </div>
                                </div>
                                <button type="submit" name="submit" value="update" class="btn btn-md btn-custom">Save
                                    Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom-js')
<script src="{{asset('assets/vendor_assets/profile/products.js')}}"></script>

@endsection
