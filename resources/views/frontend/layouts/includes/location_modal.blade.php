<div class="modal fade" id="locationModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered login-modal location-modal" role="document">
            <div class="modal-content">
                <div class="auth-box">
                    <button type="button" class="close" data-dismiss="modal"><i class="icon-close"></i></button>
                    <h4 class="title">Select Location</h4>
                    <p class="location-modal-description">Modesy allows you to shop from anywhere in the world.</p>
                    <div class="form-group m-b-20">
                        <div class="input-group input-group-location">
                            <i class="icon-map-marker"></i>
                            <input type="text" id="input_location" class="form-control form-input" value=""
                                placeholder="Enter Location" autocomplete="off">
                            <a href="javascript:void(0)" class="btn-reset-location-input hidden"><i
                                    class="icon-close"></i></a>
                        </div>
                        <div class="search-results-ajax">
                            <div class="search-results-location">
                                <div id="response_search_location"></div>
                            </div>
                        </div>
                        <div id="location_id_inputs">
                            <input type="hidden" name="country" value="" class="input-location-filter">
                            <input type="hidden" name="state" value="" class="input-location-filter">
                            <input type="hidden" name="city" value="" class="input-location-filter">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" id="btn_submit_location" class="btn btn-md btn-custom btn-block">Update
                            Location</button>
                    </div>
                </div>
            </div>
        </div>
    </div>