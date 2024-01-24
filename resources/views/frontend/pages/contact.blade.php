@extends('frontend.layouts.layout')
@section('content')


<div class="row">

                <div class="col-12">
                    <nav class="nav-breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                    <h1 class="page-title">Contact</h1>
                </div>

                <div class="col-12">
                    <div class="page-contact">

                        <div class="row contact-text">
                            <div class="col-12">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h2 class="contact-leave-message"></h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-12 order-1 order-lg-0">
                                <!-- include message block -->

                                <!--print error messages-->

                                <!--print custom error message-->

                                <!-- form start -->
                                <form action="javascript:void(0);" id="form_validate"
                                    class="validate_terms" method="post" accept-charset="utf-8">
                                    <input type="hidden" name="csrf_mds_token"
                                        value="df29d280e16678b6a884ce9bef33b09a" />
                                    <div class="form-group">
                                        <input type="text" class="form-control form-input" name="name"
                                            placeholder="Name" maxlength="199" minlength="1" pattern=".*\S+.*" value=""
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-input" name="email" maxlength="199"
                                            placeholder="Email Address" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control form-input form-textarea" name="message"
                                            placeholder="Message" maxlength="4970" minlength="5" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox custom-control-validate-input">
                                            <input type="checkbox" class="custom-control-input" name="terms"
                                                id="checkbox_terms" required>
                                            <label for="checkbox_terms" class="custom-control-label">I have read and
                                                agree to the&nbsp;
                                                <a href="javascript:void(0);" class="link-terms"
                                                    target="_blank"><strong>Terms &amp; Conditions</strong></a>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md btn-custom">
                                            Submit </button>
                                    </div>

                                </form>
                            </div>

                            <div class="col-md-6 col-12 order-0 order-lg-1 contact-right">

                                <div class="col-12 contact-item">
                                    <i class="icon-phone" aria-hidden="true"></i>
                                    +92-3168923190 </div>

                                <div class="col-12 contact-item">
                                    <i class="icon-envelope" aria-hidden="true"></i>
                                    marketpricebook@gmail.com </div>

                                <div class="col-12 contact-item">
                                    <i class="icon-map-marker" aria-hidden="true"></i>
                                    Punjab, Pakistan </div>

                                <div class="col-sm-12 contact-social">
                                    <!--Include social media links-->

                                    <ul>
                                    </ul>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
@endsection
