<!-- Modal -->
<div class="modal fade" id="requestKitsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center ">
                            Request Free Health Kit
                        </h2>
                    </div>
                </div>
                
                <div class="row">

                    <div class="col-md-12 successhide hide">
                        
                        <form class="forms-sample" id="create_lead_form_info"
                            data-action-after=0
                            data-redirect-url="<?php echo URL ?>"
                            method="POST"
                            action="<?php echo URL ?>mail/unitedMail.php">
                            

                            <div class="tour_category_labels form-group flex-container">
                                <div class="label_radio_design">
                                    <input type="radio" checked name="item[]" id="tour_category_radio_1" value="Masks & Sanitizer">
                                    <label for="tour_category_radio_1" class="text-capitalize" >Masks & Sanitizer</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter Name *" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter  Email *" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="emailHelp" placeholder="Enter Phone No *" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <input type="hidden" name="request_kits" class="disableOnSubmit">
                                    <button type="button" class="btn community_btn submit_form_no_confirm disableOnSubmit" name="community_id">Submit</button>
                                </div>

                                <div class="col-12 message">
                                    <p></p>
                                </div>
                            </div>

                        </form>

                    </div>

                    <div class="col-lg-12 successShow hide">
                        <div class="row">
                            <div class="col-12 text-center">
                                <br>
                                <img src="<?php echo URL ?>assets/images/united/check.png" style="width: 40px" alt="">
                                <br>
                                <!-- <small class="text-success">Your request has been submitted successfully.</small> -->
                                <br>
                                <small>Reference No</small> <h3 style="color: #ea791e">#<b id="requestNo"></b></h3>

                                <h5>Please provide us with this reference number upon collection.</h5>
                                <hr>

                                <p>Collect your free health kit from our office located at <br> No. 310 Torrington Avenue, Colombo 05.</p>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 successShow">
                        <div class="row">
                            <div class="col-12 text-center">

                                <h3 style="color: #ea791e"><b>We Are Sorry!</b></h3>

                                <p>Due to the curfew we unable to deliver the health kits at this moment.</p>
                                <hr>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>