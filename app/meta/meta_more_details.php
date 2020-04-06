
<!-- Example Code -->

<?php #endregion
// $meta_single_page_title = '';
// $meta_single_page_desc = '';
// $meta_arr = array(
//     'title' => $meta_single_page_title,
//     'description' => $meta_single_page_desc,
//     'image' => 'assets/images/meta/index/web_img.png',
    
//     'og:title' => $meta_single_page_title,
//     'og:image' => 'assets/images/meta/index/og.jpg',
//     'og:description' => $meta_single_page_desc,

//     'twitter:image' => 'assets/images/meta/index/twitter.jpg',
//     'twitter:title' => $meta_single_page_title,

//     'itemscope:image' => 'assets/images/meta/index/itemscope.jpg',
//     'itemscope:title' => $meta_single_page_title

// ); ?>

<!-- Example Code End -->
<?php 
$general_title_sub = '';
$general_desc_sub = '';

$full_current_page_actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 

$meta_author = "Creativehub";
$meta_content_type = "Help People";
?>

<title><?php echo $meta_arr['title'].$general_title_sub ?>  </title>

<meta name="description" content="<?php echo $meta_arr['description'].$general_desc_sub ?>">
<meta name="image" content="<?php echo $meta_arr['image'] ?>" />
<meta name="author" content="<?php $meta_author ?>">
<meta name="copyright" content="<?php echo Date("Y") ?>">

<!-- Linked in & Fb -->
<meta property='og:title' content='<?php echo $meta_arr['og:title'].$general_title_sub ?>'/>
<meta property='og:image' content='<?php echo $meta_arr['og:image'] ?>'/>
<meta property='og:description' content='<?php echo $meta_arr['og:description'].$general_desc_sub ?>'/>
<meta property='og:url' content='<?php echo $full_current_page_actual_link ?>' />
<meta property="og:type" content="<?php echo $meta_content_type ?>" />


<meta property="twitter:title" content="<?php echo $meta_arr['twitter:title'].$general_title_sub ?>"/>
<meta property="twitter:url" content="<?php echo $full_current_page_actual_link ?>" />
<meta property="twitter:image" content="<?php echo $meta_arr['twitter:image'] ?>" />
<meta property="twitter:type" content="<?php echo $meta_content_type ?>" />


<meta property="itemscope:title" content="<?php echo $meta_arr['itemscope:title'].$general_title_sub ?>"/>
<meta property="itemscope:url" content="<?php echo $full_current_page_actual_link ?>" />
<meta property="itemscope:image" content="<?php echo $meta_arr['itemscope:image'] ?>" />
<meta property="itemscope:type" content="<?php echo $meta_content_type ?>" />
