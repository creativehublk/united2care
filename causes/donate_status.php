<?php include_once '../app/global/url.php' ?>
<?php include_once ROOT_PATH.'/app/global/sessions.php' ?>
<?php include_once ROOT_PATH.'/app/global/Gvariables.php' ?>
<?php include_once ROOT_PATH.'/db/db.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once ROOT_PATH.'app/meta/google-tag-head.php' ?>

    <!-- Meta -->
    <?php include_once ROOT_PATH.'app/meta/meta.php' ?>
    <!-- Meta -->
    <?php #endregion

    $meta_single_page_title = 'Donation Status | UNITED 2 CARE';
    $meta_single_page_desc = 'Donation Status | In this time of crisis when our community is under threat of the Corona Virus (COVID-19), hand sanitizers and masks are a basic need for everyone, and we believe that they should not be sold at a premium.';

    $meta_arr = array(
        'title' => $meta_single_page_title,
        'description' => $meta_single_page_desc,
        'image' => URL.'assets/images/meta/index/web_img.png',

        'og:title' => $meta_single_page_title,
        'og:image' => URL.'assets/images/meta/index/web_img.png',
        'og:description' => $meta_single_page_desc,

        'twitter:image' => URL.'assets/images/meta/index/web_img.png',
        'twitter:title' => $meta_single_page_title,

        'itemscope:image' => URL.'assets/images/meta/index/web_img.png',
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

        <?php
        if(isset($_GET['response'])){ ?>

        <div class="wpo-donation-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="wpo-donate-header text-center">
                            <h1>Donation Status</h1>
                        </div>
                    </div>

                    <?php if($_GET['response'] == "success"){ ?>

                        <div class="col-lg-12 text-center donation_status_box">
                            <h5 class="text-success">Your donation has been sent successfully</h5>
                            <h1> <i class="fa fa-check"></i> </h1>
                            <h4>Thank you for your contribution to make the world beautiful</h4>
                        </div>

                    <?php }else if($_GET['response'] == "failed"){ ?>

                        <div class="col-lg-12 text-center donation_status_box">
                            <h5 class="text-danger">Your donation has been failed.</h5>
                            <h1> <i class="text-danger fa fa-times"></i> </h1>
                            <h4>Please try again until make your penny bring the smile.</h4>
                        </div>
                        
                    <?php } ?>

                </div>
            </div>
        </div>

        <?php } ?>

        <?php include_once ROOT_PATH.'modals/bankDepositeModal.php' ?>

        <?php include_once ROOT_PATH.'imports/footer.php' ?>
        
    </div>


    <!-- end of page-wrapper -->
    <!-- All JavaScript files
    ================================================== -->
    <?php include_once ROOT_PATH.'imports/js.php' ?>

</body>

</html>