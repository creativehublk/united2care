<?php 
require_once '../../../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';
require_once ROOT_PATH.'blog/admin/db/db.php';
$checkArr = array(
    'page_level_code' => 2
);
require_once ROOT_PATH.'blog/admin/account/includes/authViewPage.php';

$tab = "post";

if(isset($_GET['tab'])){
    $tab = trim($_GET['tab']);
}

switch ($tab) {
    case 'post':
        $tab_file = 'post.php';
        break;

    case 'images':
        $tab_file = 'images.php';
        break;

    case 'meta':
        $tab_file = 'meta.php';
        break;

    default:
        $tab_file = 'post.php';
        break;
}


$post_id = 0;
if(isset($_GET['id'])){
    $_GET['id'] = trim($_GET['id']);
    if(is_numeric($_GET['id'])){
        $post_id = $_GET['id'];
    }
}
$select_post = mysqli_query($localhost, "SELECT * FROM `blog_posts` WHERE `id` = '$post_id' ");
$fetch_post = mysqli_fetch_array($select_post);
$heading = $fetch_post['heading'];


?>
<!doctype html>
<html lang="en">

    <head>
        <?php require_once ROOT_PATH.'blog/admin/imports/meta.php' ?>
        <?php require_once ROOT_PATH.'blog/admin/imports/css.php' ?>
    </head>

    
    <body>

        <?php include_once ROOT_PATH.'blog/admin/imports/navbar.php' ?>

        <section class="container-warp">
            <div class="container">
            
                <div class="col-md-12 ">
                    <div class="row flex-grow">
                        
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-10">
                                            <h3 class=""> <?php echo $heading ?> </h3>
                                        </div>

                                        <div class="col-lg-2 text-right">
                                            <a href="<?php echo URL ?>blog/admin/posts/posts.php" class="btn btn-primary"> <i class="fa fa-arrow-alt-circle-left"></i> Back</a>
                                        </div>
                                    </div>

                                    <br>
                                    
                                    <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">

                                        <li class="nav-item">
                                            <a class="nav-link <?php echo doactive("post", $tab) ?>" id="pills-post-tab" href="<?php echo URL ?>blog/admin/posts/update.php?tab=post&id=<?php echo $post_id ?>">Post</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?php echo doactive("images", $tab) ?>" id="pills-images-tab" href="<?php echo URL ?>blog/admin/posts/update.php?tab=images&id=<?php echo $post_id ?>">Images</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?php echo doactive("meta", $tab) ?>" id="pills-meta-tab" href="<?php echo URL ?>blog/admin/posts/update.php?tab=meta&id=<?php echo $post_id ?>">Meta</a>
                                        </li>

                                    </ul>

                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active">
                                            <?php include_once ROOT_PATH.'blog/admin/posts/includes/'.$tab_file ?>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- Card End -->
                        </div>

                    </div>
                </div>

            </div>
        </section>

        <?php require_once ROOT_PATH.'blog/admin/imports/footer.php' ?> 
        <?php require_once ROOT_PATH.'blog/admin/imports/js.php' ?> 
        <script src="<?php echo URL ?>blog/admin/assets/js/pages/post.js"></script>
    </body>
</html>
