<div class="wpo-blog-sidebar">
        
        <div class="widget search-widget">
            <h3>Tell Your Causes</h3>
            <p>We will help with your causes</p>
            <a href="<?php echo URL ?>submit_causes" class="theme-btn" target="_blank"> <i class="fa fa-send"></i> Post Now</a>
        </div>

        <div class="widget recent-post-widget">
            <h3>Recent Causes</h3>

            <div class="posts">

                <?php 
                $select_recent_causes = mysqli_query($localhost, "SELECT * FROM `causes` ORDER BY `id` ");
                while($fetch_recent_causes = mysqli_fetch_array($select_recent_causes)){

                    $post_recent_id = $fetch_recent_causes['id'];

                    $thumbnail_recent_image = "";
                    if(file_exists(ROOT_PATH."admin/uploads/causes/thumb/".$fetch_recent_causes['thumb'])){
                        $thumbnail_recent_image = URL."admin/uploads/causes/thumb/".$fetch_recent_causes['thumb'];
                    }

                    $post_recent_Url = URL.'cause?q='.$post_recent_id.'&p='.urlencode(strtolower($fetch_recent_causes['name']));
                ?>

                <div class="post">
                    <div class="img-holder">
                        <img src="<?php echo $thumbnail_recent_image ?>" alt>
                    </div>
                    <div class="details">
                        <h4><a href="<?php echo $post_recent_Url ?>"><?php echo $fetch_recent_causes['name'] ?></a></h4>
                        <span class="date"><?php echo Date("d M Y", strtotime($fetch_recent_causes['created'])) ?></span>
                    </div>
                </div>

                <?php } ?>
                
            </div>
        </div>

        <div class="col-lg-12">
            <br>
            <iframe 
                src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Funited2care&tabs=timeline&width=360&height=600&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="360" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
        </div>

    </div>