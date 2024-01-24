<!-- Login Modal -->
<div class="modal fade" id="loginTypeModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered login-modal" role="document">
        <div class="modal-content">
            <div class="auth-box">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h4 class="title">Login As</h4>
                <!-- form start -->
                <form action="" method="get" id="loginTypeForm" novalidate="novalidate">

                    <!-- <div class="social-login">

                        </div> -->
                    <!-- include message block -->
                    <div id="result-login" class="font-size-13"></div>
                    <div class="form-group">
                        <select class="form-control select2" id="loginType" name="type">
                            <option value="">-select-</option>
                            <option value="wholesaler">WholeSaler</option>
                            <option value="vendor">Vendor</option>
                            <option value="consumer">Consumer</option>
                        </select>

                    </div>

                    <!-- <div class="form-group">
                        <button type="submit" class="btn btn-block btn-dark">Login</button>
                    </div> -->
                </form>
                <!-- form end -->
            </div>
        </div>
    </div>
</div>
