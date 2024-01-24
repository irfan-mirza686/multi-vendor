<div class="modal fade" id="sliderModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addSliderForm" action="{{route('admin.slider.store')}}" enctype="multipart/form-data">
                <div class="modal-body">

                    <label for="title" class="form-label">Ttile</label>
                    <input class="form-control form-control-sm mb-3" name="title" type="text" placeholder="Enter Title">

                    <label for="sub_title" class="form-label">Sub Ttile</label>
                    <input class="form-control form-control-sm mb-3" name="sub_title" type="text"
                        placeholder="Enter Sub Title">

                    <label for="thumbnail" class="form-label">Thumbnail <font style="color: red;">*</font></label>
                    <input class="form-control form-control-sm" onchange="preview()" accept="image/*" name="image"
                        id="thumbnail" type="file">
                    <div class="row mt-2 mb-2">
                        <img id="frame" height="70" width="150" src="{{asset('assets/uploads/no-image.png')}}"
                            class="img-fluid" />
                    </div>

                    <label for="exampleDataList" class="form-label">Status</label>
                    <select class="form-select form-select-sm mb-3" name="status" aria-label=".form-select-sm example">
                        <option selected="" value="">-select-</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning rounded-0" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="submit" class="btn btn-primary saveSliderBtn"><span id="spinner" class="" role="status" aria-hidden="true"></span>&nbsp;&nbsp;Save</button> -->
                    <button type="submit" class="btn btn-block rounded-0"
                        style="width:80% !important; margin: auto; background-color: black; color: white;"><span
                            id="spinner" class="" role="status" aria-hidden="true"></span>&nbsp;&nbsp;<span
                            class="saveSliderBtn">Create Slider</span></button>
                </div>
            </form>

        </div>
    </div>
</div>