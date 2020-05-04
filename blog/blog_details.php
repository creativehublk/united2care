<?php include_once '../app/global/url.php' ?>
<?php include_once ROOT_PATH.'/app/global/sessions.php' ?>
<?php include_once ROOT_PATH.'/app/global/Gvariables.php' ?>
<?php include_once ROOT_PATH.'/db/db.php' ?>

<?php 
$post_id = 0;
if(isset($_GET['id'])){
    $_GET['id'] = trim($_GET['id']);
    if(is_numeric($_GET['id'])){
        $post_id = $_GET['id'];
    }
}
$select_post = mysqli_query($localhost, "SELECT p.*, c.`name` category, m.`title`, m.`description`, m.`image` social_image
                                            FROM `blog_posts` AS p 
                                            INNER JOIN `blog_categories` AS c ON c.`id` = p.`category` 
                                            LEFT JOIN `blog_meta` AS m ON m.`post_id` = p.`id` 
                                            WHERE p.`hide` = 0 AND p.`id` = '$post_id' ORDER BY p.`post_date` DESC ");
$fetch_post = mysqli_fetch_array($select_post);
$heading = $fetch_post['heading'];


$socialImageArray = array(
    [
        'path' => 'blog/admin/uploads/news_events/social/',
        'image' => $fetch_post['social_image']
    ],
    [
        'path' => 'blog/admin/uploads/news_events/cover/',
        'image' => $fetch_post['cover']
    ]
);

$coverImageArray = array(
    [
        'path' => 'blog/admin/uploads/news_events/cover/',
        'image' => $fetch_post['cover']
    ]
);

$thumbImageArray = array();

$select_thumb = mysqli_query($localhost, "SELECT * FROM `blog_post_attachments` WHERE `post_id` = '$post_id' ORDER BY `id` ASC ");
while($fetch_thumb = mysqli_fetch_array($select_thumb)){
    array_push($thumbImageArray, array(
        'path' => 'blog/admin/uploads/news_events/thumb/',
        'image' => $fetch_thumb['image']
    ));

    array_push($socialImageArray, array(
        'path' => 'blog/admin/uploads/news_events/thumb/',
        'image' => $fetch_thumb['image']
    ));

    array_push($coverImageArray, array(
        'path' => 'blog/admin/uploads/news_events/thumb/',
        'image' => $fetch_thumb['image']
    ));
}


$cover_image = pickImage($coverImageArray, URL.'assets/images/cover/news_eve_details.jpg');

$post_tags = array();
$select_tags = mysqli_query($localhost, "SELECT tags.`name` 
                                        FROM `blog_post_tags` bpt 
                                        INNER JOIN `blog_tags` tags ON tags.`id` = bpt.`tag_id` 
                                        WHERE bpt.`post_id` = '$post_id' ");
while ($fetch_tags = mysqli_fetch_array($select_tags)) {
    array_push($post_tags, $fetch_tags['name']);
}

$select_content = mysqli_query($localhost, "SELECT * FROM `blog_post_contents` WHERE `post_id` = '$post_id' ");
$fetch_content = mysqli_fetch_array($select_content);
$blog_content = $fetch_content['content'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once ROOT_PATH.'app/meta/google-tag-head.php' ?>

    <!-- Meta -->
    <?php include_once ROOT_PATH.'app/meta/meta.php' ?>
    <!-- Meta -->
    <?php #endregion

    $meta_single_page_title = $heading.' | '.$fetch_post['category'].' | United2Care';
    $meta_single_page_desc = $fetch_post['description'].' | ';
    $meta_single_page_image = pickImage($socialImageArray, URL.'assets/images/meta/index/web_img.jpg');

    $meta_arr = array(
        'title' => $meta_single_page_title,
        'description' => $meta_single_page_desc,
        'image' => $meta_single_page_image,

        'og:title' => $meta_single_page_title,
        'og:image' => $meta_single_page_image,
        'og:description' => $meta_single_page_desc,

        'twitter:image' => $meta_single_page_image,
        'twitter:title' => $meta_single_page_title,

        'itemscope:image' => $meta_single_page_image,
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
        <div class="wpo-breadcumb-area" style="background: url(<?php echo $cover_image ?>)">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2><?php echo $heading ?></h2>
                            <ul>
                                <li><a href="<?php echo URL?>">Home</a></li>
                                <li><a href="<?php echo URL?>blog">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .wpo-breadcumb-area end -->

        <!-- start wpo-blog-single-section -->
        <section class="wpo-blog-single-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-md-8">
                        <div class="wpo-wpo-blog-content clearfix">
                            <div class="post">
                            
                                <div class="col-lg-12 <?php echo hideArrayEmpty($thumbImageArray) ?> news_events_details_img">
                                    <?php foreach ($thumbImageArray as $key => $images) { ?>
                                        <img src="<?php echo URL.$images['path'].$images['image'] ?>" alt="<?php echo $heading ?>">
                                    <?php } ?>
                                </div>

                                <div class="col-lg-12">
                                    <ul class="entry-meta">
                                        <li><a href="#"><i class="ti-calendar"></i> <?php echo Date("M d, Y", strtotime($fetch_post['post_date'])) ?></a></li>
                                        <li><a href="#"><i class="ti-calendar"></i> <?php echo $fetch_post['category'] ?></a></li>
                                    </ul>
                                    
                                    <h2><?php echo $heading ?></h2>
                                </div>
                                
                                <div class="blog_content">
                                    <?php echo $blog_content ?>
                                </div>

                            </div>
                                <div class="tag-share clearfix">

                                    <?php 
                                    if(count($post_tags) > 0){ ?>
                                        <div class="tag">
                                            <ul>
                                            
                                            
                                                <?php foreach ($post_tags as $key => $value) { ?>
                                                    <li>
                                                        <a>
                                                        
                                                            
                                                            <?php echo $value ?>

                                                        </a>
                                                    </li>

                                                <?php } ?>
                                            </ul>
                                        </div>
                                    <?php } ?>

                                <div class="share">
                                    <!-- AddToAny BEGIN -->
                                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style" >
                                        
                                        <a class="a2a_dd"></a>
                                        <a class="a2a_button_facebook"></a>
                                        <a class="a2a_button_twitter"></a>
                                        <a class="a2a_button_linkedin"></a>
                                        <a class="a2a_button_whatsapp"></a>

                                    </div>
                                    <!-- AddToAny END -->
                                </div>
                            </div> <!-- end tag-share -->

                        </div>
                        
                    </div>

                    <div class="col col-md-4">
                        <?php include_once ROOT_PATH.'blog/includes/right_side.php' ?>
                    </div>

                </div>
            </div> <!-- end container -->
        </section>
        <!-- end wpo-blog-single-section -->

        <?php include_once ROOT_PATH.'imports/footer.php' ?>
        
    </div>


    <!-- end of page-wrapper -->
    <!-- All JavaScript files
    ================================================== -->
    <?php include_once ROOT_PATH.'imports/js.php' ?>

    <script src="<?php echo URL ?>assets/js/blog.js"></script>

</body>

</html>