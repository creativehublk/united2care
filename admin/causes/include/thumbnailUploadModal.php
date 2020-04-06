<div class="modal fade" data-backdrop="static" data-keyboard="false" id="upload_thumb_modal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
                <h4 class="modal-title" id="myModalLabel">Upload Product Thumbnail</h4>
            </div>
            <div class="modal-body">
                

                <div class="row">
                    <div class="col-xs-12 col-lg-12 upload_thumb_modal_box">
                        <div id="croppic" class="text-center">
                        <img src="<?php echo $thumbnail_image ?>" alt="">
                    </div>
                            <button id="cropContainerHeaderButton"
                                class="btn btn-primary"
                                >Upload Thumbnail</button>
                        </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>