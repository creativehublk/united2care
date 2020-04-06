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
    $meta_single_page_title = 'Posts | UNITED 2 CARE';
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

    <?php include_once ROOT_PATH.'posts/include/top_php.php' ?>

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
                            <h2>Posts</h2>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-xs-12 col-lg-12">
                        <?php include_once ROOT_PATH.'posts/include/top_categories.php' ?>
                    </div>

                    <div class="col-xs-12 col-md-8">

                        <div class="row">


                            <?php 
                            while($fetch_posts = mysqli_fetch_array($select_posts)){

                                $post_id = $fetch_posts['id'];
                                $select_img = mysqli_query($localhost, "SELECT * FROM `ad_post_images` WHERE `ad_post_id` = '$post_id' ORDER BY `id` ASC LIMIT 0, 1 ");
                                $fetch_img = mysqli_fetch_array($select_img);

                                $thumbnail_image = "https://via.placeholder.com/250x200/d3d3d3/FFFFFF/?text=Post";
                                if(strlen($fetch_img['name']) > 0){
                                    if(file_exists(ROOT_PATH."admin/uploads/posts/".$fetch_img['name'])){
                                        $thumbnail_image = URL."admin/uploads/posts/".$fetch_img['name'];
                                    }
                                }

                                $postUrl = URL.'post?q='.$post_id.'&p='.urlencode(strtolower($fetch_posts['name']));

                            ?>

                                <div class="col-md-6 col-sm-6 col-12 custom-grid">
                                    <div class="wpo-event-item">
                                        <div class="wpo-event-img">
                                            <a href="<?php echo $postUrl ?>">
                                                <img src="<?php echo $thumbnail_image ?>" alt="">
                                            </a>
                                            <div class="thumb-text">
                                                <span><?php echo Date("d", strtotime($fetch_posts['created'])) ?></span>
                                                <span><?php echo Date("M", strtotime($fetch_posts['created'])) ?></span>
                                            </div>

                                            <?php if($fetch_posts['verify'] == 1){ ?>
                                                <div class="verified_badge">
                                                    <h4> <i class="fa fa-check-circle"></i> Verified</h4>
                                                </div>
                                            <?php } ?>

                                        </div>
                                        <div class="wpo-event-text">

                                            <a href="<?php echo $postUrl ?>">
                                                <h2><?php echo $fetch_posts['name'] ?></h2>
                                            </a>
                                            <ul>
                                                <li><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo Date("h:i a", strtotime($fetch_posts['created'])) ?> </li>
                                                <li><i class="fi flaticon-pin"></i>Colombo</li>
                                            </ul>
                                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p> -->
                                            <a href="<?php echo $postUrl ?>">View More...</a>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                        </div>

                        <!-- Pagination -->
                        <?php include_once ROOT_PATH.'posts/include/pagination.php' ?>

                    </div>

                    <div class="col-xs-12 col-md-4">
                        <?php include_once ROOT_PATH.'posts/include/right_side.php' ?>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- wpo-event-area end -->

        <?php include_once ROOT_PATH.'imports/footer.php' ?>
        
    </div>

    <!-- end of page-wrapper -->
    <!-- All JavaScript files
    ================================================== -->
    <?php include_once ROOT_PATH.'imports/js.php' ?>

    <script src="<?php echo URL ?>assets/js/post.js"></script>

</body>

</html>