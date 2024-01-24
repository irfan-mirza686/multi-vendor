<div class="modal fade" id="userQuotationModal" role="dialog" style="">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- form start -->
            <form  id="userQuotationForm" novalidate="novalidate">
                <input type="hidden" name="vendor_id" id="vendor_id">
                <input type="hidden" name="product_id" id="product_id">

                <div class="modal-header">
                    <h4 class="modal-title">Send Message</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="icon-close"></i></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div id="send-message-result"></div>

                            <div class="form-group m-b-sm-0">
                                <label class="control-label">Message</label>
                                <textarea name="message" id="message_text" class="form-control form-textarea"
                                    placeholder="Write a message..." required=""></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <!-- <button type="submit" class="btn btn-dark btn-md btn-custom"><i class="icon-send"></i>&nbsp;Send</button> -->
                    <button type="submit" class="btn btn-block rounded-0" style="width:100% !important; margin: auto; background-color: black; color: white;"><span id="spinner" class="" role="status" aria-hidden="true"></span>&nbsp;&nbsp;<i class="icon-send"></i><span class="btn-quotation">&nbsp;Send</span></button>
                </div>
            </form>
            <!-- form end -->
        </div>
    </div>
</div>
