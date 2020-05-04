<?php include_once '../app/global/url.php' ?>
<?php include_once ROOT_PATH.'/app/global/sessions.php' ?>
<?php include_once ROOT_PATH.'/app/global/Gvariables.php' ?>
<?php include_once ROOT_PATH.'/db/db.php' ?>

<?php include_once ROOT_PATH.'/imports/functions.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once ROOT_PATH.'app/meta/google-tag-head.php' ?>

    <!-- Meta -->
    <?php include_once ROOT_PATH.'app/meta/meta.php' ?>
    <!-- Meta -->
    <?php #endregion
    $meta_single_page_title = 'Our Causes | UNITED 2 CARE';
    $meta_single_page_desc = 'In this time of crisis when our community is under threat of the Corona Virus (COVID-19), hand sanitizers and masks are a basic need for everyone, and we believe that they should not be sold at a premium.';
    $meta_arr = array(
        'title' => $meta_single_page_title,
        'description' => $meta_single_page_desc,
        'image' => URL.'assets/images/meta/index/web_img.png',
        
        'og:title' => $meta_single_page_title,
        'og:image' => URL.'assets/images/meta/index/og.jpg',
        'og:description' => $meta_single_page_desc,

        'twitter:image' => URL.'assets/images/meta/index/twitter.jpg',
        'twitter:title' => $meta_single_page_title,

        'itemscope:image' => URL.'assets/images/meta/index/itemscope.jpg',
        'itemscope:title' => $meta_single_page_title

    ); ?>
    <?php include_once ROOT_PATH.'app/meta/meta_more_details.php' ?>
    

    <!-- CSS -->
    <?php include_once ROOT_PATH.'imports/css.php' ?>
    
</head>

<body>
    <?php include_once ROOT_PATH.'app/meta/google-tag-body.php' ?>

    <!-- start page-wrapper -->
    <div class="page-wrapper">
        
        <!-- start preloader -->
        <?php include_once ROOT_PATH.'imports/preload.php' ?>
        <!-- end preloader -->

        <!-- Start header -->
        <?php include_once ROOT_PATH.'imports/header.php' ?>
        <!-- end of header -->

        <!-- wpo-event-area start -->
        <div class="wpo-event-area-2 section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="wpo-section-title">
                            <!-- <span>Our Events</span> -->
                            <h2>Our Causes</h2>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-xs-12 col-md-8">

                        <div class="row">


                            <?php 
                            $select = mysqli_query($localhost, "SELECT * FROM `causes` ORDER BY `id` DESC ");
                            while($fetch = mysqli_fetch_array($select)){ 
            
                                $thumbnail_image = "";
                                if(file_exists(ROOT_PATH."admin/uploads/causes/thumb/".$fetch['thumb'])){
                                    $thumbnail_image = URL."admin/uploads/causes/thumb/".$fetch['thumb'];
                                }
                                $cause_id = $fetch['id'];

                                $postUrl = URL.'cause?q='.$cause_id.'&p='.urlencode(strtolower($fetch['name']));

                            ?>

                                <div class="col-md-6 col-sm-6 col-12 custom-grid">
                                    <div class="wpo-case-item">
                                
                                            <a href="<?php echo $postUrl ?>">
                                                <?php if(strlen($thumbnail_image) > 0){ ?>
                                                
                                                    <div class="wpo-case-img">
                                                        <img src="<?php echo $thumbnail_image ?>" alt="">
                                                    </div>

                                                <?php } ?>
                                            </a>

                                        <div class="wpo-case-content">
                                            
                                            <div class="wpo-case-text-top">
                                                <a href="<?php echo $postUrl ?>">
                                                    <h2 class="reveal"><?php echo $fetch['name'] ?></h2>
                                                </a>
                                            </div>
                                            <div class="case-btn">
                                                <ul>
                                                    <?php
                                                    $select_img = mysqli_query($localhost, "SELECT * FROM `causes_images` WHERE `cause_id`='$cause_id' "); 
                                                    if( strlen(trim($fetch['description'])) > 0 || (mysqli_num_rows($select_img) > 0) ){ ?>
                                                    
                                                        <li><a href="<?php echo $postUrl ?>">View More</a></li>

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

                    <div class="col-xs-12 col-md-4">
                        <?php include_once ROOT_PATH.'causes/includes/right_side.php' ?>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- wpo-event-area end -->

        <?php include_once ROOT_PATH.'imports/footer.php' ?>
        
    </div>

    <?php include_once ROOT_PATH.'modals/donateCashModal.php' ?>

    <!-- end of page-wrapper -->
    <!-- All JavaScript files
    ================================================== -->
    <?php include_once ROOT_PATH.'imports/js.php' ?>

    <script src="<?php echo URL ?>assets/js/post.js"></script>

</body>

</html>