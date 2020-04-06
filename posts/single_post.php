<?php include_once '../app/global/url.php' ?>
<?php include_once ROOT_PATH.'/app/global/sessions.php' ?>
<?php include_once ROOT_PATH.'/app/global/Gvariables.php' ?>
<?php include_once ROOT_PATH.'/db/db.php' ?>

<?php 
$post_id = 0;
if(isset($_GET['q'])){
    if(is_numeric($_GET['q'])){
        $post_id = $_GET['q'];
    }
} 

$select_post = mysqli_query($localhost, "SELECT * FROM `ad_posts` WHERE `id` = '$post_id' ");
$fetch_post = mysqli_fetch_array($select_post);

$post_title = $fetch_post['name'];

$img_arr = array();
$select_images = mysqli_query($con,"SELECT * FROM `ad_post_images` WHERE `ad_post_id`='$post_id' ");
while($fetch_images = mysqli_fetch_array($select_images)){

    if(file_exists(ROOT_PATH.'admin/uploads/posts/'.$fetch_images['name'])){
        array_push($img_arr, URL.'admin/uploads/posts/'.$fetch_images['name']);
    }
}

if(count($img_arr) == 0){
    array_push($img_arr, 'https://via.placeholder.com/200x250/d3d3d3/FFFFFF/?text=United2Care');
}

$search_keyword_view = '';
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
    $meta_single_page_desc = $post_title.' | In this time of crisis when our community is under threat of the Corona Virus (COVID-19), hand sanitizers and masks are a basic need for everyone, and we believe that they should not be sold at a premium.';
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

        <!-- .wpo-breadcumb-area start -->
        <div class="wpo-breadcumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2><?php echo $post_title ?></h2>
                            <ul>
                                <li><a href="<?php echo URL?>">Home</a></li>
                                <li><span>Posts</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .wpo-breadcumb-area end -->

        <!-- wpo-event-details-area start -->
        <div class="wpo-event-details-area section-padding">
            <div class="container">
                <div class="row">

                    <div class="col col-md-8">

                        <div class="wpo-event-item">

                            <div class="col-lg-12">
                                <div class="post_images post_slider">
                                    <?php foreach ($img_arr as $key => $images) { ?>
                                    
                                        <img src="<?php echo $images ?>" alt="<?php echo $post_title ?>">

                                    <?php } ?>
                                </div>
                            </div>

                            <div class="wpo-event-details-text">
                                <h2><?php echo $post_title ?></h2>

                                <ul class="other_post_details">
                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo Date("d M, Y : h:i a", strtotime($fetch_post['created'])) ?> </li>
                                    <li><i class="fi flaticon-pin"></i>Colombo</li>
                                </ul>

                                <div class="description_box">
                                    <?php echo $fetch_post['description'] ?>
                                </div>

                            </div>
                            
                        </div>

                        <?php include_once ROOT_PATH.'posts/include/reviews.php' ?>

                    </div>

                    <!-- Right Side Menu -->
                    <div class="col-xs-12 col-md-4">
                        <?php include_once ROOT_PATH.'posts/include/right_side.php' ?>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- wpo-event-details-area end -->

        <?php include_once ROOT_PATH.'imports/footer.php' ?>
        
    </div>


    <!-- end of page-wrapper -->
    <!-- All JavaScript files
    ================================================== -->
    <?php include_once ROOT_PATH.'imports/js.php' ?>

    <script src="<?php echo URL ?>assets/js/post.js"></script>

</body>

</html>