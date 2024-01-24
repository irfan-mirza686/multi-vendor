<div class="modal fade" id="rateProductModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-custom">
            <!-- form start -->
            <form id="productReviewForm" action="{{route('post.product.review')}}" method="post" accept-charset="utf-8">
                <input type="hidden" name="wholeSalerProductID" value="" id="productID"/>
                <input type="hidden" name="vendorProductID" value="" id="vendorID"/>
                <div class="modal-header">
                    <h5 class="modal-title">Rate this product</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true"><i class="icon-close"></i>
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row-custom">
                                <div class="rate-product">
                                    <span>Your Rating:</span>
                                    <div class="rating-stars">
                                        <label class="label-star" data-star="5" for="star5"> <i
                                                class="icon-star-o"></i></label>
                                        <label class="label-star" data-star="4" for="star4"><i
                                                class="icon-star-o"></i></label>
                                        <label class="label-star" data-star="3" for="star3"><i
                                                class="icon-star-o"></i></label>
                                        <label class="label-star" data-star="2" for="star2"><i
                                                class="icon-star-o"></i></label>
                                        <label class="label-star" data-star="1" for="star1"><i
                                                class="icon-star-o"></i></label>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="review" id="user_review" class="form-control form-input form-textarea"
                                    placeholder="Write a Review..." required></textarea>
                                <input type="hidden" name="rating" id="user_rating" value="1">
                                <input type="hidden" name="product_id" id="review_product_id" value="1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-md btn-red" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-md btn-custom btn-dark"><span id="spinner" class="" role="status" aria-hidden="true"></span><span class="saveReviewBtn">Submit</span></button>
                </div>
            </form><!-- form end -->
        </div>
    </div>
</div>
