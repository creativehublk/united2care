<?php include_once '../app/global/url.php' ?>
<?php include_once ROOT_PATH.'/app/global/sessions.php' ?>
<?php include_once ROOT_PATH.'/app/global/Gvariables.php' ?>
<?php include_once ROOT_PATH.'/db/db.php' ?>

<?php 
$cause_id = 0;
if(isset($_GET['q'])){
    if(is_numeric($_GET['q'])){
        $cause_id = $_GET['q'];
    }
} 

$select_post = mysqli_query($localhost, "SELECT * FROM `causes` WHERE `id` = '$cause_id' ");
$fetch_post = mysqli_fetch_array($select_post);

$post_title = $fetch_post['name'];

$img_arr = array();
$select_images = mysqli_query($con,"SELECT * FROM `causes_images` WHERE `cause_id`='$cause_id' ");
while($fetch_images = mysqli_fetch_array($select_images)){
    
    if(file_exists(ROOT_PATH.'admin/uploads/causes/'.$fetch_images['name'])){ 
        $temp_img = URL.'admin/uploads/causes/'.$fetch_images['name'];
        array_push($img_arr, $temp_img);
    }
    
}

if(count($img_arr) == 0){
    array_push($img_arr, 'https://via.placeholder.com/200x250/d3d3d3/FFFFFF/?text=United2Care');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once ROOT_PATH.'app/meta/google-tag-head.php' ?>

    <!-- Meta -->
    <?php include_once ROOT_PATH.'app/meta/meta.php' ?>
    <!-- Meta -->
    <?php #endregion
    $meta_single_page_title = $post_title.' | UNITED 2 CARE';
    $meta_single_page_desc = $fetch_post['description'].' | In this time of crisis when our community is under threat of the Corona Virus (COVID-19), hand sanitizers and masks are a basic need for everyone, and we believe that they should not be sold at a premium.';
    $meta_arr = array(
        'title' => $meta_single_page_title,
        'description' => $meta_single_page_desc,
        'image' => $img_arr[0],
        
        'og:title' => $meta_single_page_title,
        'og:image' => $img_arr[0],
        'og:description' => $meta_single_page_desc,

        'twitter:image' => $img_arr[0],
        'twitter:title' => $meta_single_page_title,

        'itemscope:image' => $img_arr[0],
        'itemscope:title' => $meta_single_page_title

    ); ?>
    <?php include_once ROOT_PATH.'app/meta/meta_more_details.php' ?>
    

    <!-- CSS -->
    <?php include_once ROOT_PATH.'imports/css.php' ?>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
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

        <section class="heading-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1><?php echo $post_title ?></h1>
                        
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo URL ?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo URL ?>causes">Causes</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View</li>
                            </ol>
                        </nav>

                    </div>
                </div>
            </div>
        </section>

        <!-- wpo-event-details-area start -->
        <div class="wpo-event-details-area">
            <div class="container">
                <div class="row">

                    <div class="col col-md-8">

                        <div class="wpo-event-item">

                            <div class="col-lg-12">

                                <div class="row">
                                    <div class="post_images post_slider">
                                        <?php foreach ($img_arr as $key => $images) { ?>
                                        
                                            <div class="col-lg-12">
                                                <div class="img-slider-box">
                                                    <img src="<?php echo $images ?>" alt="<?php echo $post_title ?>">
                                                </div>
                                            </div>

                                        <?php } ?>
                                    </div>
                                </div>

                                
                            </div>

                            <div class="wpo-event-details-text">

                                <div class="col-lg-12">
                                    <!-- AddToAny BEGIN -->
                                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style" >
                                        
                                        <a class="a2a_dd"></a>
                                        <a class="a2a_button_facebook"></a>
                                        <a class="a2a_button_twitter"></a>
                                        <a class="a2a_button_linkedin"></a>
                                        <a class="a2a_button_whatsapp"></a>

                                    </div>
                                    <br>
                                </div>

                                <div class="description_box">
                                    <?php echo $fetch_post['description'] ?>
                                </div>

                                <div class="col-lg-12 text-center">
                                    <br>
                                    <a href="#" data-toggle="modal" data-target="#donateCashModal" class="btn theme-btn reveal" >Donate Now</a>
                                    <!-- <a href="<?php echo URL ?>donation?q=<?php echo $cause_id ?>&cause=<?php echo urlencode(strtolower((trim($fetch_post['name'])))) ?>" class="btn theme-btn reveal" >Donate Now</a> -->
                                </div>

                            </div>
                            
                        </div>

                    </div>

                    <!-- Right Side Menu -->
                    <div class="col-xs-12 col-md-4">
                        <?php include_once ROOT_PATH.'causes/includes/right_side.php' ?>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- wpo-event-details-area end -->

        <?php include_once ROOT_PATH.'modals/donateCashModal.php' ?>

        <?php include_once ROOT_PATH.'imports/footer.php' ?>
        
    </div>


    <!-- end of page-wrapper -->
    <!-- All JavaScript files
    ================================================== -->
    <?php include_once ROOT_PATH.'imports/js.php' ?>

    <script src="<?php echo URL ?>assets/js/post.js?v=1"></script>

</body>

</html>