<div class="modal fade" id="updateSubscriberPassModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3 col-md-12">
                            <label for="current_pass" class="form-label">Current Password <font style="color: red;">*
                                </font></label>
                            <input type="password" class="form-control" id="current_pass" name="current_pass"
                                placeholder="current password">

                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="new_pass" class="form-label">New Password <font style="color: red;">*</font>
                                </label>
                            <input type="password" class="form-control" id="new_pass" name="new_pass"
                                placeholder="new password">

                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="confirm_pass" class="form-label">Confirm Password <font style="color: red;">*
                                </font></label>
                            <input type="password" class="form-control" id="confirm_pass" name="confirm_pass"
                                placeholder="confirm password">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Update Password</button> -->
                        <!--  <button class="btn btn-primary" type="button" disabled=""> <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                       Loading...</button> -->
                        <button class="btn btn-primary" data-URL="{{route('wholesaler.update.password')}}" id="updateSubscriberPass" type="button"> <span id="spinner"
                                class="" role="status" aria-hidden="true"></span>
                            <span id="replaceBtnTxt">Update</span></button>
                    </div>
                </div>
            </div>
        </div>
