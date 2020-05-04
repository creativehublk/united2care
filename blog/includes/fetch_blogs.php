<?php 


if(isset($_GET['sid'])){
    $_GET['sid'] = trim($_GET['sid']);
    if(is_numeric($_GET['sid'])){
        $search_id = $_GET['sid'];
    }
}
$type_word = 'Blog';
if(isset($_GET['type'])){
    $_GET['type'] = trim($_GET['type']);
        $type_word = $_GET['type'];
}
$search_key = 'All';
if(isset($_GET['search'])){
    $_GET['search'] = trim($_GET['search']);
    $search_key = $_GET['search'];
}



$current_pages = 1;

$news_events_all_array = array();

$search_query = "SELECT p.*, c.`name` category, m.`title`
                    FROM `blog_posts` AS p 
                    INNER JOIN `blog_categories` AS c ON c.`id` = p.`category` 
                    LEFT JOIN `blog_meta` AS m ON m.`post_id` = p.`id` ";
$search_query .= " WHERE p.`hide` = 0 ";
// search Filter
if(isset($search_id) && isset($type_word) ){

    switch ($type_word) {
        case 'category':
            $search_query .= " AND p.`category` = '$search_id'" ;
            break;

        case 'tag':
            $search_query .= " AND p.`id` IN (SELECT post_id FROM `blog_post_tags` WHERE `tag_id` = $search_id ) " ;
            break;
        
    }

}


$search_query .= " ORDER BY p.`post_date` DESC";

$select = mysqli_query($localhost, $search_query);
$total_num_rows = mysqli_num_rows($select);

$search_query = $search_query;

$inter_limit = 9; // set limti value
$pages = ceil($total_num_rows/$inter_limit); // total pages of current query

//Current Pages filter 
if( isset($_GET['page']) ){
    $current_pages = $_GET['page'];//post value
}else{
    $current_pages = 1;//post value
}

// check current pages less than zero or not if it zero reset to one
if($current_pages > 0 && is_numeric($current_pages) ){
    
    $current_pages = $current_pages;
}else{
    $current_pages = 1;
}

if ( $current_pages > $pages ){
    $current_pages = $pages;
}


if ($current_pages > 0){ 
    $end_limit = ($current_pages - 1)*$inter_limit; // end row no
}else{
    $end_limit = ($current_pages)*$inter_limit; // end row no
}


$limit = " LIMIT $end_limit,$inter_limit ";

$search_query .= $limit; 
$select_blog_post = mysqli_query($localhost ,$search_query);

while($fetch_blog_post = mysqli_fetch_array($select_blog_post)){ 
    
    $post_id = $fetch_blog_post['id'];
    
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
        'image' => $fetch_blog_post['cover']
    ));

    $thumbImage = pickImage($thumbSelectArray, 'https://via.placeholder.com/400x400.jpg?text=U2C');

    
    $select_content = mysqli_query($localhost, "SELECT * FROM `blog_post_contents` WHERE `post_id` = '$post_id' ");
    $fetch_content = mysqli_fetch_array($select_content);
    $blog_content = substr($fetch_content['content'], 0, 200).'...';

    array_push($news_events_all_array, array(
        'heading' => $fetch_blog_post['heading'],
        'title' => $fetch_blog_post['title'],
        'date' => $fetch_blog_post['post_date'],
        'category' => $fetch_blog_post['category'],
        'thumb' => $thumbImage,
        'blog_content' => $blog_content,
        'url' => URL.'blog/post?id='.$post_id.'&news='.urlFriendly($fetch_blog_post['title'])
    ));

}

?>