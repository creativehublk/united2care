<div class="wpo-case-area section-padding bg_light_blue">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wpo-section-title">
                    <h2 class="reveal-slow">Our Causes</h2>
                </div>
            </div>
        </div>
        <div class="wpo-case-wrap">
            <div class="row">

                <?php 
                $select = mysqli_query($localhost, "SELECT * FROM `causes` ORDER BY `id` ");
                while($fetch = mysqli_fetch_array($select)){ 

                    $thumbnail_image = "";
                    if(file_exists(ROOT_PATH."admin/uploads/causes/thumb/".$fetch['thumb'])){
                        $thumbnail_image = URL."admin/uploads/causes/thumb/".$fetch['thumb'];
                    }
                    $cause_id = $fetch['id'];
                ?>

                    <div class="col-lg-4 col-xs-12 wpo-case-single">
                        <div class="wpo-case-item">
                            
                            <?php if(strlen($thumbnail_image) > 0){ ?>
                            
                                <div class="wpo-case-img">
                                    <img src="<?php echo $thumbnail_image ?>" alt="">
                                </div>

                            <?php } ?>

                            <div class="wpo-case-content">
                                <div class="wpo-case-text-top">
                                    <h2 class="reveal"><?php echo $fetch['name'] ?></h2>
                                </div>
                                <div class="case-btn">
                                    <ul>

                                        <?php
                                        $select_img = mysqli_query($localhost, "SELECT * FROM `causes_images` WHERE `cause_id`='$cause_id' "); 
                                        if( strlen(trim($fetch['description'])) > 0 || (mysqli_num_rows($select_img) > 0) ){ ?>
                                        
                                            <li><a href="#" class="openCausesModal" data-id="<?php echo $fetch['id'] ?>">View More</a></li>

                                        <?php } ?>

                                        <li><a href="#" data-toggle="modal" data-target="#donateCashModal" class="reveal" >Donate Now</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>


        <div class="col-lg-12 text-center">
            <br>
            <a href="#" data-toggle="modal" data-target="#submitCausesModal"> <span  class="theme-btn">Tell us your cause</span> </a>
        </div>

    </div>
</div>