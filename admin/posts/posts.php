<?php include_once '../../app/global/url.php' ?>
<?php include_once ROOT_PATH.'/app/global/sessions.php' ?>
<?php include_once ROOT_PATH.'/app/global/Gvariables.php' ?>
<?php include_once ROOT_PATH.'/db/db.php' ?>
<?php include_once ROOT_PATH.'/imports/functions.php' ?>

<?php
$checkArr = array(
    'page_level_code' => 1
);
$checkAccess = $dbOpertionsObj->checkLogin($checkArr);

if($checkAccess == 1){ 
    
    $select_posts = mysqli_query($localhost, "SELECT * FROM `ad_posts` ");
    ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Posts | United2Care</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php require_once ROOT_PATH.'admin/imports/css.php' ?>

    </head>

    <body class="hold-transition skin-black-light layout-top-nav">

        <?php include ROOT_PATH.'admin/imports/menu.php'; ?>

        <div class="wrapper">

            <div class="container">
                
                <div class="title">
                    <h3>Posts</h3>
                </div>  <!-- ./ title -->


                <a class="btn btn-primary" href="create.php">Create Posts</a>
                <br><br>

                <div class="box box-primary">
                    <div class="box-body">

                        <div class="row">

                        <?php 
                        while($fetch_posts = mysqli_fetch_array($select_posts)){ 
                            $post_id = $fetch_posts['id'];

                            $select_img = mysqli_query($localhost, "SELECT * FROM `ad_post_images` WHERE `ad_post_id` = '$post_id' ORDER BY `id` ASC LIMIT 0, 1 ");
                            $fetch_img = mysqli_fetch_array($select_img);

                            $thumbnail_image = "https://via.placeholder.com/200x250/d3d3d3/FFFFFF/?text=United2Care";
                            if(file_exists(ROOT_PATH."admin/uploads/posts/".$fetch_img['name'])){
                                $thumbnail_image = URL."admin/uploads/posts/".$fetch_img['name'];
                            }

                            ?>

                            <!-- Product Start -->
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <div class="box box-solid">
                                    <div class="box-body" >
                                        <div class="col-sm-12 single_product_box">

                                            <div> 
                                                <?php if($fetch_posts['verify'] == 1){ ?>
                                                    <p class="text-center text-success"> <i class="fa fa-check-circle"></i> <small>Verified</small></p>
                                                <?php } ?>

                                                <a href="<?php echo URL ?>/admin/posts/view_post.php?pro_id=<?php echo $post_id ?>">
                                                    <img src="<?php echo $thumbnail_image ?>" class="product_img">
                                                </a>
                                            </div>

                                            <div class="show_home_box">
                                                <label class="switch quo">
                                                    <input type="checkbox" <?php echo docheck($fetch_posts['status'], 1) ?> onchange="showHide(this)" value="<?php echo $post_id ?>">
                                                    <span class="slider"></span> 
                                                </label> &nbsp;Show
                                            </div>

                                            <a href="<?php echo URL ?>/admin/posts/view_post.php?pro_id=<?php echo $post_id ?>">
                                                <h4 class="heading"><?php echo $fetch_posts['name'] ?></h4>
                                            </a>

                                            <div class="action_btn_box">
                                                <a href="<?php echo URL ?>/admin/posts/edit.php?id=<?php echo $post_id ?>" class="btn btn-primary fa fa-edit" target="_blank" title="Edit Product"></a>
                                                <a href="<?php echo URL ?>/admin/posts/images.php?id=<?php echo $post_id ?>" class="btn btn-default fa fa-upload" target="_blank" title="Updates Images"></a>
                                                <button  class="btn btn-sm btn-danger fa fa-trash-o"
                                                    onclick="deleteItem(this)"
                                                    data-after-success=1
                                                    data-id="<?php echo $post_id ?>" 
                                                    data-refresh="<?php echo '$full_url' ?>" 
                                                    data-url="<?php echo URL ?>admin/posts/ajax/posts_handler.php" 
                                                    data-key="delete_post"></button>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div> <!-- Products End -->

                        <?php } ?>

                        </div> <!-- ./ row -->

                    </div> <!-- ./ box body -->
                </div> <!-- ./ box -->
            </div>  <!-- ./ container -->

        </div> <!-- ./ wrapper -->

        <?php include ROOT_PATH.'admin/imports/footer.php'; ?> 
    </body>

    <?php require_once ROOT_PATH.'admin/imports/js.php' ?>
    <script src="<?php echo URL ?>admin/assets/js/general/productsOpe.js"></script>


</html>


<!-- If Access Denied  -->
<?php }else{ ?>

<script>
    window.location = '<?php echo URL ?>admin/accounts/login.php';    
</script>

<?php    
} ?>
<!-- If Access Denied End -->