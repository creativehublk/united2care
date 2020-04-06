<?php include_once 'app/global/url.php' ?>
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
    $meta_single_page_title = 'UNITED 2 CARE';
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

        <!-- start of hero -->
        <?php include_once ROOT_PATH.'includes/slider.php' ?>
        <!-- end of hero slider -->

        <!-- start of hero -->
        <?php include_once ROOT_PATH.'includes/posts.php' ?>
        <!-- end of hero slider -->

        <!-- wpo-mission-area start -->
        <?php include_once ROOT_PATH.'includes/mission.php' ?>
        <!-- wpo-mission-area end -->

        <!-- wpo-about-area start -->
        <?php include_once ROOT_PATH.'includes/about.php' ?>
        <!-- wpo-about-area end -->

        <!-- Causes start -->
        <?php include_once ROOT_PATH.'includes/causesBox.php' ?>
        <!-- Causes end -->

        <!-- .wpo-counter-area start -->
        <?php include_once ROOT_PATH.'includes/tellProblems.php' ?>
        <!-- .wpo-counter-area end -->

        <!-- world area start -->
        <?php include_once ROOT_PATH.'includes/requestKits.php' ?>
        <!-- world area end -->


        <!-- BLog start -->
        <?php include_once ROOT_PATH.'includes/ourGallery.php' ?>
        <!-- Blog end -->

        <!-- wpo-cta-area start -->
        <?php include_once ROOT_PATH.'includes/donate.php' ?>
        <!-- wpo-cta-area end -->

        <!-- Partners start -->
        <?php include_once ROOT_PATH.'includes/partners.php' ?>
        <!-- Partners end -->

        <!-- Partners start -->
        <?php include_once ROOT_PATH.'includes/partnerWithUs.php' ?>
        <!-- Partners end -->

        <?php include_once ROOT_PATH.'imports/footer.php' ?>
        
    </div>


    <!-- end of page-wrapper -->
    <!-- All JavaScript files
    ================================================== -->
    <?php include_once ROOT_PATH.'imports/js.php' ?>

    <?php include_once ROOT_PATH.'modals/donateCashModal.php' ?>
    <?php include_once ROOT_PATH.'modals/donateKitsModal.php' ?>
    <?php include_once ROOT_PATH.'modals/requestKitsModal.php' ?>
    <?php include_once ROOT_PATH.'modals/donateDryRationModal.php' ?>
    <?php include_once ROOT_PATH.'modals/causeModal.php' ?>
    <?php include_once ROOT_PATH.'modals/requestCausesModal.php' ?>


</body>

</html>