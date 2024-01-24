<div class="modal fade show" id="messageModal" tabindex="-1" role="dialog" style="padding-right: 17px; display: block;" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-send-message" role="document">
            <div class="modal-content">
                <!-- form start -->
                <form id="form_send_message" novalidate="novalidate">
                    <input type="hidden" name="receiver_id" id="message_receiver_id" value="1">
                    <input type="hidden" id="message_send_em" value="0">

                    <div class="modal-header">
                        <h4 class="title">Send Message</h4>
                        <button type="button" class="close" data-dismiss="modal"><i class="icon-close"></i></button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div id="send-message-result"></div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="user-contact-modal">
                                                <div class="left">
                                                    <a href="javascript:void(0);"><img src="http://secretattire.in/assets/img/user.png" alt="admin"></a>
                                                </div>
                                                <div class="right">
                                                    <strong><a href="javascript:void(0);">admin</a></strong>
                                                                                                                                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Subject</label>
                                    <input type="text" name="subject" id="message_subject" value="" class="form-control form-input" placeholder="Subject" required="">
                                </div>
                                <div class="form-group m-b-sm-0">
                                    <label class="control-label">Message</label>
                                    <textarea name="message" id="message_text" class="form-control form-textarea" placeholder="Write a message..." required=""></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-md btn-custom"><i class="icon-send"></i>&nbsp;Send</button>
                    </div>
                </form>
                <!-- form end -->
            </div>
        </div>
    </div>
