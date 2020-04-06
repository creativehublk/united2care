<?php
    header('X-Frame-Options: GOFORIT');  
include_once 'app/global/url.php' ?>
<?php include_once ROOT_PATH.'/app/global/sessions.php' ?>
<?php include_once ROOT_PATH.'/app/global/Gvariables.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- Meta -->
    <?php include_once ROOT_PATH.'app/meta/meta.php' ?>
    <!-- Meta -->
    <?php #endregion
    $meta_single_page_title = 'Forum | UNITED 2 CARE';
    $meta_single_page_desc = 'In this time of crisis when our community is under threat of the Corona Virus (COVID-19), hand sanitizers and masks are a basic need for everyone, and we believe that they should not be sold at a premium.';
    $meta_arr = array(
        'title' => $meta_single_page_title,
        'description' => $meta_single_page_desc,
        'image' => 'assets/images/meta/index/web_img.png',
        
        'og:title' => $meta_single_page_title,
        'og:image' => 'assets/images/meta/index/og.jpg',
        'og:description' => $meta_single_page_desc,

        'twitter:image' => 'assets/images/meta/index/twitter.jpg',
        'twitter:title' => $meta_single_page_title,

        'itemscope:image' => 'assets/images/meta/index/itemscope.jpg',
        'itemscope:title' => $meta_single_page_title

    ); ?>
    <?php include_once ROOT_PATH.'app/meta/meta_more_details.php' ?>
    

    <!-- CSS -->
    <?php include_once ROOT_PATH.'imports/css.php' ?>
    
</head>

<body>
    <!-- start page-wrapper -->
    <div class="page-wrapper">
        
        <!-- start preloader -->
        <?php include_once ROOT_PATH.'imports/preload.php' ?>
        <!-- end preloader -->

        <!-- Start header -->
        <?php include_once ROOT_PATH.'imports/header.php' ?>
        <!-- end of header -->

        <!-- Forum Iframe -->
        <iframe id="forum_iframe" src="http://forum.united2care.com/" frameborder="0"></iframe>
        <!-- Forum Iframe End -->

        <?php include_once ROOT_PATH.'imports/footer.php' ?>
        
    </div>


    <!-- end of page-wrapper -->
    <!-- All JavaScript files
    ================================================== -->
    <?php include_once ROOT_PATH.'imports/js.php' ?>

    <?php include_once ROOT_PATH. 'modals/donateCashModal.php' ?>
    <?php include_once ROOT_PATH. 'modals/donateKitsModal.php' ?>
    <?php include_once ROOT_PATH. 'modals/requestKitsModal.php' ?>

</body>

</html>