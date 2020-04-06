    <div class="wpo-blog-sidebar">
        
        <div class="widget search-widget">
            <h3>Search Here</h3>
            <form action="<?php echo URL.'posts' ?>" method="GET">
                <div>
                    <input type="text" name="search" class="form-control" value="<?php echo $search_keyword_view ?>" placeholder="Search Post..">
                    <button type="submit"><i class="ti-search"></i></button>
                </div>
            </form>
        </div>

        <div class="widget search-widget">
            <h3>Submit Your Post</h3>
            <p>Publish your post with us.</p>
            <a href="<?php echo URL ?>submit_post" class="theme-btn" target="_blank"> <i class="fa fa-send"></i> Post Now</a>
        </div>

        <div class="widget recent-post-widget">
            <h3>Recent posts</h3>

            <div class="posts">

                <?php 
                $select_recent_posts = mysqli_query($localhost, "SELECT * FROM `ad_posts` WHERE `status` = '1' AND `approve` = '1' ORDER BY `created` DESC LIMIT 0, 4 ");
                while($fetch_recent_posts = mysqli_fetch_array($select_recent_posts)){

                    $post_recent_id = $fetch_recent_posts['id'];
                    $select_recent_img = mysqli_query($localhost, "SELECT * FROM `ad_post_images` WHERE `ad_post_id` = '$post_recent_id' ORDER BY `id` ASC LIMIT 0, 1 ");
                    $fetch_recent_img = mysqli_fetch_array($select_recent_img);

                    $thumbnail_recent_image = "https://via.placeholder.com/200x250/d3d3d3/FFFFFF/?text=United2Care";
                    if(file_exists(ROOT_PATH."admin/uploads/posts/".$fetch_recent_img['name'])){
                        $thumbnail_recent_image = URL."admin/uploads/posts/".$fetch_recent_img['name'];
                    }

                    $post_recent_Url = URL.'post?q='.$post_recent_id.'&p='.urlencode(strtolower($fetch_recent_posts['name']));
                ?>

                <div class="post">
                    <div class="img-holder">
                        <img src="<?php echo $thumbnail_recent_image ?>" alt>
                    </div>
                    <div class="details">
                        <h4><a href="<?php echo $post_recent_Url ?>"><?php echo $fetch_recent_posts['name'] ?></a></h4>
                        <span class="date"><?php echo Date("d M Y", strtotime($fetch_recent_posts['created'])) ?></span>
                    </div>
                </div>

                <?php } ?>
                
            </div>
        </div>

        <div>
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Funited2care&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="360" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
        </div>

    </div>