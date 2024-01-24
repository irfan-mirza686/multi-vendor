@extends('frontend.layouts.layout')
@section('content')



            <div class="auth-container">

                <div class="auth-box">

                    <div class="row">
                        <div class="col-12">
                            <h1 class="title">{{$pageTitle}}</h1>
                            <!-- form start -->
                            <form action="{{route('register.vendor')}}" id="form_validate"
                                class="validate_terms" method="post" accept-charset="utf-8">@csrf
                                <!-- <input type="hidden" name="csrf_mds_token" value="f1624c904190896c7eb1a0d88550894e" /> -->
                                <div class="social-login">

                                </div>
                                <!-- include message block -->
                                <div id="result-register">
                                @include('show_flash_msgs')
                                    <!--print error messages-->

                                    <!--print custom error message-->
                                </div>
                                <div class="spinner display-none spinner-activation-register">
                                    <div class="bounce1"></div>
                                    <div class="bounce2"></div>
                                    <div class="bounce3"></div>
                                </div>
                                @include('frontend.auth.includes.register_form_fields')
                                <div class="form-group">
                                <button type="submit" class="btn btn-md btn-dark btn-block">Register</button>
                                </div>
                                <p class="p-social-media m-0 m-t-15">Have an account?&nbsp;<a href="javascript:void(0)"
                                        class="link" data-toggle="modal" data-target="#loginModal">Login</a></p>

                            </form> <!-- form end -->
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert").alert('close');
        }, 10000);
    </script>
@endsection
