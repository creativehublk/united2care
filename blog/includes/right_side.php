<?php 

// Categories
$categories_array = array();
$select_categories = mysqli_query($localhost, "SELECT cat.`name`, cat.`id`, COUNT(p.`id`) AS postCounts 
                                                FROM `blog_categories` cat
                                                INNER JOIN `blog_posts` AS p ON p.`category` = cat.`id` AND p.`hide` = 0 
                                                GROUP BY cat.`id` ");
while($fetch_categories = mysqli_fetch_array($select_categories)){
    array_push($categories_array, array(
        'id' => $fetch_categories['id'],
        'name' => $fetch_categories['name'],
        'postCounts' => $fetch_categories['postCounts'],
    ));
}

// Top Posts
$top_posts_array = array();
$top_post_query = "SELECT p.*, m.`title`
                    FROM `blog_posts` AS p 
                    LEFT JOIN `blog_meta` AS m ON m.`post_id` = p.`id` 
                    WHERE p.`hide` = 0 ";
if(isset($post_id)){
    $top_post_query .= " AND p.`id` != '$post_id' ";
}

$top_post_query .= " ORDER BY p.`post_date` DESC LIMIT 0,3 ";
$select_last_posts = mysqli_query($localhost, $top_post_query);
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

    $thumbImage = pickImage($thumbSelectArray, 'https://via.placeholder.com/400x400.jpg?text=Edulink');

    
    array_push($top_posts_array, array(
        'heading' => $fetch_last_posts['heading'],
        'title' => $fetch_last_posts['title'],
        'thumb' => $thumbImage,
        'date' => $fetch_last_posts['post_date'],
        'url' => URL.'blog?id='.$post_id.'&news='.urlFriendly($fetch_last_posts['title'])
    ));
}

// Tags
$tags_array = array();
$select_tags = mysqli_query($localhost, "SELECT tag.`name`, tag.`id`
                                                FROM `blog_tags` tag
                                                INNER JOIN `blog_post_tags` AS pt ON pt.`tag_id` = tag.`id`
                                                GROUP BY tag.`id` ");
while($fetch_tags = mysqli_fetch_array($select_tags)){
    array_push($tags_array, array(
        'id' => $fetch_tags['id'],
        'name' => $fetch_tags['name'],
    ));
}

?>


<div class="wpo-blog-sidebar">

    <div class="widget category-widget <?php echo hideArrayEmpty($categories_array) ?>">
        <h3>Categories</h3>
        <ul>

            <?php 
            foreach ($categories_array as $key => $value) { ?>
                <li><a href="<?php echo URL ?>blog?sid=<?php echo $value['id'] ?>&type=category&search=<?php echo $value['name'] ?>"><?php echo $value['name'] ?><span><?php echo $value['postCounts'] ?></span></a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="widget recent-post-widget <?php echo hideArrayEmpty($top_posts_array) ?>">
        <h3>Recent posts</h3>
        <div class="posts">

            <?php foreach ($top_posts_array as $key => $top_post) { ?>

                <div class="post">
                    <div class="img-holder">
                        <img src="<?php echo $top_post['thumb'] ?>" alt="<?php echo $top_post['title'] ?>">
                    </div>
                    <div class="details">
                        <h4><a href="<?php echo $top_post['url'] ?>"><?php echo $top_post['heading'] ?></a></h4>
                        <span class="date"><?php echo Date("M d, Y", strtotime($top_post['date'])) ?></span>
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>
    <div class="widget tag-widget <?php echo hideArrayEmpty($tags_array) ?>">
        <h3>Tags</h3>
        <ul>

            <?php foreach ($tags_array as $key => $tag) { ?>
                <li>
                    <a href="<?php echo URL ?>blog?sid=<?php echo $tag['id'] ?>&type=tag&search=<?php echo $tag['name'] ?>" class="button-tag semi-rounded r-slow"><?php echo $tag['name'] ?></a>
                </li>
            <?php } ?> 
            
        </ul>
    </div>
</div>