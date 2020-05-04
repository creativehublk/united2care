<div class="wpo-case-area section-padding">
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

                    $causePostURL = URL.'cause?q='.$cause_id.'&p='.urlencode(strtolower($fetch['name']));
                ?>

                    <div class="col-lg-4 col-xs-12 wpo-case-single">
                        <div class="wpo-case-item">
                            
                            <a href="<?php echo $causePostURL ?>">
                                <?php if(strlen($thumbnail_image) > 0){ ?>
                                
                                    <div class="wpo-case-img">
                                        <img src="<?php echo $thumbnail_image ?>" alt="">
                                    </div>

                                <?php } ?>
                            </a>

                            <div class="wpo-case-content">
                                <div class="wpo-case-text-top">
                                    <a href="<?php echo $causePostURL ?>">
                                        <h2 class="reveal"><?php echo $fetch['name'] ?></h2>
                                    </a>
                                </div>
                                <div class="case-btn">
                                    <ul>

                                        <?php
                                        $select_img = mysqli_query($localhost, "SELECT * FROM `causes_images` WHERE `cause_id`='$cause_id' "); 
                                        if( strlen(trim($fetch['description'])) > 0 || (mysqli_num_rows($select_img) > 0) ){ ?>
                                        
                                            <li><a href="<?php echo $causePostURL ?>" >View More</a></li>

                                        <?php } ?>
                                        <li><a href="#" data-toggle="modal" data-target="#donateCashModal" class="reveal" >Donate Now</a></li>
                                        <!-- <li><a href="<?php echo URL ?>donation?q=<?php echo $cause_id ?>&cause=<?php echo urlencode(strtolower((trim($fetch['name'])))) ?>" class="reveal" >Donate Now</a></li> -->
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
            <a href="<?php echo URL ?>causes"> <span class="theme-btn">View all causes</span> </a>
            <a href="#" data-toggle="modal" data-target="#submitCausesModal"> <span  class="theme-btn">Tell us your cause</span> </a>
        </div>

    </div>
</div>