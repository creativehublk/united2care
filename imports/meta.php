<meta charset="utf-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="format-detection" content="telephone-no">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


<?php 
$general_title_sub = '';
$general_desc_sub = '';

$full_current_page_actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 

?>

<title><?php echo $meta_arr['title'].$general_title_sub ?>  </title>

<meta name="description" content="<?php echo $meta_arr['description'].$general_desc_sub ?>">
<meta name="image" content="<?php echo URL ?><?php echo $meta_arr['image'] ?>" />
<meta name="author" content="United 2 care">
<meta name="copyright" content="<?php echo Date("Y") ?>">

<!-- Linked in & Fb -->
<meta property='og:title' content='<?php echo $meta_arr['og:title'].$general_title_sub ?>'/>
<meta property='og:image' content='<?php echo URL ?><?php echo $meta_arr['og:image'] ?>'/>
<meta property='og:description' content='<?php echo $meta_arr['og:description'].$general_desc_sub ?>'/>
<meta property='og:url' content='<?php echo $full_current_page_actual_link ?>' />
<meta property="og:type" content="" />


<meta property="twitter:title" content="<?php echo $meta_arr['twitter:title'].$general_title_sub ?>"/>
<meta property="twitter:url" content="<?php echo $full_current_page_actual_link ?>" />
<meta property="twitter:image" content="<?php echo URL ?><?php echo $meta_arr['twitter:image'] ?>" />
<meta property="twitter:type" content="" />


<meta property="itemscope:title" content="<?php echo $meta_arr['itemscope:title'].$general_title_sub ?>"/>
<meta property="itemscope:url" content="<?php echo $full_current_page_actual_link ?>" />
<meta property="itemscope:image" content="<?php echo URL ?><?php echo $meta_arr['itemscope:image'] ?>" />
<meta property="itemscope:type" content="" />


<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="assets/images/meta/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/images/meta/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/images/meta/favicon/favicon-16x16.png">
<link rel="manifest" href="assets/images/meta/favicon/site.webmanifest">
<link rel="mask-icon" href="assets/images/meta/favicon/safari-pinned-tab.svg" color="#131616">
<meta name="msapplication-TileColor" content="#000000">
<meta name="theme-color" content="#000000">


