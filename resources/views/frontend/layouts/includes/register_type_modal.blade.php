<!-- register Modal -->
<div class="modal fade" id="registerTypeModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered register-modal" role="document">
        <div class="modal-content">
            <div class="auth-box">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h4 class="title">Register As</h4>
                <!-- form start -->
                <form action="{{route('register.as')}}" method="get" id="registrationTypeForm" novalidate="novalidate">

                    <!-- <div class="social-register">

                        </div> -->
                    <!-- include message block -->
                    <div id="result-register" class="font-size-13"></div>
                    <div class="form-group">
                        <select class="form-control select2" id="registrationType" name="type">
                            <option value="">-select-</option>
                            <option value="wholesaler">WholeSaler</option>
                            <option value="vendor">Vendor</option>
                            <option value="consumer">Consumer</option>
                        </select>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-dark">Register</button>
                    </div>
                </form>
                <!-- form end -->
            </div>
        </div>
    </div>
</div>
