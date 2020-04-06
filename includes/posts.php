<div class="wpo-case-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wpo-section-title">
                    <h2 class="reveal-slow">Recent Posts</h2>
                    <p>Do you know anyone within Colombo who is in need of dry rations but cannot afford it?</p>
                    <p>Get in touch with us so that we can help them. </p>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="row">
                <div class="posts_category_menu">
            
                    <div class="category_box">
                        <a href="<?php echo URL ?>posts">
                            <h4>All</h4>
                        </a>
                    </div>

                    <?php foreach ($sub_categories_array as $key => $sub_cat) { ?>
                        
                        <div class="category_box">
                            <a href="<?php echo $sub_cat['url'] ?>">
                                <h4><?php echo $sub_cat['name'] ?></h4>
                            </a>
                        </div>

                    <?php } ?>

                </div>
            </div>
        </div>

        <div class="wpo-case-wrap">
            <div class="row">

                <?php 
                $select_posts = mysqli_query($localhost, "SELECT * FROM `ad_posts` ORDER BY `id` LIMIT 0,3 ");
                while($fetch_posts = mysqli_fetch_array($select_posts)){ 

                    $post_id = $fetch_posts['id'];
                    $postUrl = URL.'post?q='.$post_id.'&p='.urlencode(strtolower($fetch_posts['name']));
                    $select_img = mysqli_query($localhost, "SELECT * FROM `ad_post_images` WHERE `ad_post_id` = '$post_id' ORDER BY `id` ASC LIMIT 0, 1 ");
                    $fetch_img = mysqli_fetch_array($select_img);

                    $thumbnail_image = "https://via.placeholder.com/250x200/d3d3d3/FFFFFF/?text=Post";
                    if(strlen($fetch_img['name']) > 0){
                        if(file_exists(ROOT_PATH."admin/uploads/posts/".$fetch_img['name'])){
                            $thumbnail_image = URL."admin/uploads/posts/".$fetch_img['name'];
                        }
                    }
                ?>

                    <div class="col-lg-4 col-xs-12 wpo-case-single">
                        <div class="wpo-case-item">
                            
                            <?php if(strlen($thumbnail_image) > 0){ ?>
                            
                                <div class="wpo-case-img">
                                    <a href="<?php echo $postUrl ?>"><img src="<?php echo $thumbnail_image ?>" alt=""></a>
                                </div>

                            <?php } ?>

                            <div class="wpo-case-content">
                                <div class="wpo-case-text-top">
                                    <a href="<?php echo $postUrl ?>"><h2 class="reveal"><?php echo $fetch_posts['name'] ?></h2></a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>


        <div class="col-lg-12 text-center">
            <br>
            <a href="<?php echo URL ?>posts"> <span class="theme-btn">View More</span> </a>
            <a href="<?php echo URL ?>submit_post" target="_blank"> <span class="theme-btn"> <i class="fa fa-send"></i> Post Now</span> </a>
        </div>

    </div>
</div>