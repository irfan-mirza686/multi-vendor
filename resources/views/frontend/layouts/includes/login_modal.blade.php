<!-- Login Modal -->
<div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered login-modal" role="document">
        <div class="modal-content">
            <div class="auth-box">
                <button type="button" class="close" data-dismiss="modal"><i class="icon-close"></i></button>
                <h4 class="title">Login</h4>
                <!-- form start -->
                <form id="form_login" novalidate="novalidate">
                    <div class="social-login">

                    </div>
                    <!-- include message block -->
                    <div id="result-login" class="font-size-13"></div>

                        @include('frontend.layouts.includes.login_fields')

                    <p class="p-social-media m-0 m-t-5">Don't have an account?&nbsp;<a
                            href="javascript:void(0);" id="registerBtn" class="link registerBtn">Register</a></p>
                </form>
                <!-- form end -->
            </div>
        </div>
    </div>
</div>
