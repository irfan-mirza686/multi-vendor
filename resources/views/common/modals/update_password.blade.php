<div class="modal fade" id="updatePasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updatePasswordForm" action="">
                <div class="modal-body">

                    <div class="mb-3 col-md-12">
                        <label for="current_pass" class="form-label">Current Password <font style="color: red;">*
                            </font></label>
                        <input type="password" class="form-control" id="current_pass" name="current_pass"
                            placeholder="current password" autocomplete>

                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="new_pass" class="form-label">New Password <font style="color: red;">*</font>
                        </label>
                        <input type="password" class="form-control" id="new_pass" name="new_pass"
                            placeholder="new password" autocomplete>

                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="confirm_pass" class="form-label">Confirm Password <font style="color: red;">*
                            </font></label>
                        <input type="password" class="form-control" id="confirm_pass" name="confirm_pass"
                            placeholder="confirm password" autocomplete>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Update Password</button> -->
                    <!--  <button class="btn btn-primary" type="button" disabled=""> <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                       Loading...</button> -->
                    <button class="btn btn-primary updateSubscriberPass" id="updateSubscriberPass" type="submit"> <span
                            id="spinner" class="" role="status" aria-hidden="true"></span>
                        <span class="replaceBtnTxt">Update</span></button>
                </div>
            </form>
        </div>
    </div>
</div>
