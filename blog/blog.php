<?php include_once '../app/global/url.php' ?>
<?php include_once ROOT_PATH.'/app/global/sessions.php' ?>
<?php include_once ROOT_PATH.'/app/global/Gvariables.php' ?>
<?php include_once ROOT_PATH.'/db/db.php' ?>

<?php include_once ROOT_PATH.'/imports/functions.php' ?>

<?php require_once ROOT_PATH.'blog/includes/fetch_blogs.php' ?>

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

        <!-- start wpo-blog-pg-section -->
        <section class="wpo-blog-pg-section">
            <br><br>
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="text-capitalize"><?php echo $type_word ?></a></li>
                                <li class="breadcrumb-item active text-capitalize" aria-current="page"><?php echo $search_key ?></li>
                            </ol>
                        </nav>
                    </div>

                    <div class="col col-md-8">
                        <div class="wpo-wpo-blog-content">

                            <?php foreach ($news_events_all_array as $key => $single_news_arr) { ?>

                                <div class="post format-standard-image">
                                    <div class="entry-media">
                                        <img src="<?php echo $single_news_arr['thumb'] ?>" alt="<?php echo $single_news_arr['title'] ?>">
                                    </div>
                                    <ul class="entry-meta">
                                        <li><a href="#"><i class="ti-calendar"></i> <?php echo Date("M d,Y", strtotime($single_news_arr['date'])) ?></a></li>
                                        <li><a href="#"><i class="ti-calendar"></i> <?php echo $single_news_arr['category'] ?></a></li>
                                    </ul>
                                    <h3><a href="<?php echo $single_news_arr['url'] ?>"><?php echo $single_news_arr['heading'] ?></a></h3>
                                    <p><?php echo $single_news_arr['blog_content'] ?></p>
                                    <a href="<?php echo $single_news_arr['url'] ?>" class="read-more">Read More...</a>
                                </div>

                            <?php } ?>

                            <?php include_once ROOT_PATH.'blog/includes/pagination.php' ?>

                        </div>
                    </div>

                    <div class="col col-md-4">
                        <?php include_once ROOT_PATH.'blog/includes/right_side.php' ?>
                    </div>

                </div>
            </div> <!-- end container -->
        </section>
        <!-- end wpo-blog-pg-section -->

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get" id="filter_form">
    

            <?php if(isset($search_id)){ ?>
                <input type="hidden" name="sid" value="<?php echo $search_id ?>">
            <?php } ?>
            
            <input type="hidden" name="page" value="<?php echo $current_pages ?>" id="filter_page">

            <?php if(isset($type_word)){ ?>
                <input type="hidden" name="type" value="<?php echo $type_word ?>">
            <?php } ?>

            <?php if(isset($search_key)){ ?>
                <input type="hidden" name="search" value="<?php echo $search_key ?>">
            <?php } ?>


        </form>


        <?php include_once ROOT_PATH.'imports/footer.php' ?>
        
    </div>

    <!-- end of page-wrapper -->
    <!-- All JavaScript files
    ================================================== -->
    <?php include_once ROOT_PATH.'imports/js.php' ?>

    <script src="<?php echo URL ?>assets/js/blog.js"></script>

</body>

</html>