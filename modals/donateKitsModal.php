<!-- Modal -->
<div class="modal fade" id="donateKitsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center">
                        Donate Masks/Sanitizer
                        </h2>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 successhide">
                        <form class="forms-sample" id="create_lead_form_info"
                            data-action-after=0
                            data-redirect-url="<?php echo URL ?>"
                            method="POST"
                            action="<?php echo URL ?>mail/unitedMail.php">
                            

                            <div class="tour_category_labels form-group flex-container">
                                
                                <div class="label_radio_design">
                                    <input type="checkbox" name="item[]" id="donateKitsChck_1" value="Mask">
                                    <label for="donateKitsChck_1" class="text-capitalize" >Mask</label>
                                </div>

                                <div class="label_radio_design">
                                    <input type="checkbox" name="item[]" id="donateKitsChck_2" value="Sanitizer">
                                    <label for="donateKitsChck_2" class="text-capitalize" >Sanitizer</label>
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

                            <div class="form-group">
                                <textarea style="width:100%"  class="form-control" id="message" name="message"  placeholder="Enter Your Message"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <input type="hidden" name="donate_kits" class="disableOnSubmit">
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
                                <p>
                                    We have received your information and will get in touch with you shortly. <br>
                                    Or you may contact us directly on <b><a href="tel:+94 77 66 75 877">+94 77 66 75 877</a></b>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>