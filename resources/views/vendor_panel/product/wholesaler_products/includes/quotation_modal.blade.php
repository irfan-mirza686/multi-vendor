<div class="modal fade " id="ProductQuotationModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-custom modal-report-abuse">
                <form id="form_quotation_product" action="{{route('vendor.send.quotation')}}" method="post">

                    <div class="modal-header">
                        <h5 class="modal-title">Product Quotation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div id="response_form_report_product" class="col-12"></div>
                            <div class="col-12">
                                <div class="form-group m-0">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control form-textarea" placeholder="Briefly describe the issue you are facing" minlength="5" maxlength="10000" required=""></textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="submit" class="btn btn-dark btn-sm btn-custom" style="width:100%;"><span id="spinner" class="" role="status" aria-hidden="true"></span>&nbsp;&nbsp;Submit</button> -->
                        <button type="submit" class="btn btn-block rounded-0 saveUserQuotationBtn" style="width:100% !important; margin: auto; background-color: black; color: white;"><span id="spinner" class="" role="status" aria-hidden="true"></span>&nbsp;&nbsp;<span class="btn-custom">Submit</span></button>
                    </div>
                <input type="hidden" name="wholesaler_id" id="wholesaler_id">
                <input type="hidden" name="product_id" id="productID">
            </form>
            </div>
        </div>
    </div>
