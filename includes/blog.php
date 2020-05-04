<?php 
$top_posts_array = array();
$select_last_posts = mysqli_query($localhost, " SELECT p.*, m.`title`
                                                FROM `blog_posts` AS p 
                                                LEFT JOIN `blog_meta` AS m ON m.`post_id` = p.`id` 
                                                WHERE p.`hide` = 0 ORDER BY p.`post_date` DESC LIMIT 0,6 ");
while($fetch_last_posts = mysqli_fetch_array($select_last_posts)){
    $post_id = $fetch_last_posts['id'];
    
    $thumbSelectArray = array();

    $select_thumb = mysqli_query($localhost, "SELECT * FROM `blog_post_attachments` WHERE `post_id` = '$post_id' ORDER BY `id` ASC ");
    while($fetch_thumb = mysqli_fetch_array($select_thumb)){
        array_push($thumbSelectArray, array(
            'path' => 'blog/admin/uploads/news_events/thumb/',
            'image' => $fetch_thumb['image']
        )); 
    }

    array_push($thumbSelectArray, array(
        'path' => 'blog/admin/uploads/news_events/cover/',
        'image' => $fetch_last_posts['cover']
    ));

    $thumbImage = pickImage($thumbSelectArray, 'https://via.placeholder.com/400x400.jpg?text=U2C');

    
    array_push($top_posts_array, array(
        'heading' => $fetch_last_posts['heading'],
        'title' => $fetch_last_posts['title'],
        'thumb' => $thumbImage,
        'date' => $fetch_last_posts['post_date'],
        'url' => URL.'blog/post?id='.$post_id.'&news='.urlFriendly($fetch_last_posts['title'])
    ));
}

if(count($top_posts_array) > 0){
?>


    <div class="wpo-blog-area bg_light_blue">
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wpo-section-title">
                        <h2>Our Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            
                <?php foreach ($top_posts_array as $key => $news) { ?>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 custom-grid">
                        <div class="wpo-blog-item">
                            <div class="wpo-blog-img">
                                <img src="<?php echo $news['thumb'] ?>" alt="<?php echo $news['title'] ?>">
                            </div>
                            <div class="wpo-blog-content">
                                <span><?php echo Date("M d Y", strtotime($news['date'])) ?></span>
                                <a href="<?php echo $news['url'] ?>">
                                    <h2><?php echo $news['heading'] ?></h2>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php } ?>

                
                <div class="col-lg-12 text-center">
                    <br>
                    <a href="<?php echo URL ?>blog"> <span class="theme-btn">View More</span> </a>
                </div>

            </div>
        </div>
        <br><br>
    </div>

<?php } ?>