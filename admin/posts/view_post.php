<?php include_once '../../app/global/url.php' ?>
<?php include_once ROOT_PATH.'/app/global/sessions.php' ?>
<?php include_once ROOT_PATH.'/app/global/Gvariables.php' ?>
<?php include_once ROOT_PATH.'/db/db.php' ?>
<?php include_once ROOT_PATH.'/imports/functions.php' ?>

<?php
$checkArr = array(
    'page_level_code' => 2
);
$checkAccess = $dbOpertionsObj->checkLogin($checkArr);

if($checkAccess == 1){ ?>

<!DOCTYPE html>
<html>
    <head>
    <?php require_once ROOT_PATH.'admin/imports/admin_meta.php' ?>

        <?php require_once ROOT_PATH.'admin/imports/css.php' ?>
        
    </head>

    <body class="hold-transition skin-black-light layout-top-nav">

        <?php include ROOT_PATH.'admin/imports/menu.php'; ?>

        <?php 
        $post_id = 0;
        if(isset($_GET['pro_id'])){
            if(is_numeric($_GET['pro_id'])){
                $post_id = $_GET['pro_id'];
            }
        } 
        
        $select_cause = mysqli_query($localhost, "SELECT * FROM `ad_posts` WHERE `id` = '$post_id' ");
        $fetch_post = mysqli_fetch_array($select_cause);
        
        ?>



        <div class="wrapper">

            <div class="container">
                
                <div class="row">
                    <div class="col-lg-12">
                        <br>
                        <div class="col-xs-12 col-lg-8 product_view_title">
                            <h3> <?php echo $fetch_post['name'] ?> </h3>
                        </div>  <!-- ./ title -->

                        <div class="col-xs-12 col-lg-4 text-right">

                            <a href="edit.php?id=<?php echo $post_id ?>"  class="btn btn-primary btn-sm fa fa-edit"></a>
                            <a href="images.php?id=<?php echo $post_id ?>"  class="btn btn-primary btn-sm fa fa-upload"> Change Images</a>

                            <button  class="btn btn-sm btn-danger fa fa-trash-o"
                                    onclick="deleteItem(this)"
                                    data-after-success=2
                                    data-id="<?php echo $post_id ?>" 
                                    data-refresh="<?php echo URL ?>admin/posts/posts.php" 
                                    data-url="<?php echo URL ?>admin/posts/ajax/post_handler.php" 
                                    data-key="delete_post"></button>

                            <label class="switch quo"> 
                                <input type="checkbox" onchange="changeProductVerification(this)" 
                                <?php echo docheck($fetch_post['verify'], 1) ?> value="<?php echo $post_id ?>">
                                <span class="slider"></span> 
                            </label>&nbsp; <?php if($fetch_post['verify'] == 1){
                                echo "Verified";
                            }else{
                                echo "Not Verified";
                            } ?>

                        </div>

                    </div>
                </div>

                <div class="box box-primary">
                    <div class="box-body">

                        <div class="row">
                            <div class="col-12">
                            
                                <div class="col-xs-12 col-sm-12 col-md-4">

                                    <?php 
                                    $img_arr = array();
                                    $select_images = mysqli_query($con,"SELECT * FROM `ad_post_images` WHERE `ad_post_id`='$post_id' ");
                                    while($fetch_images = mysqli_fetch_array($select_images)){
                                        array_push($img_arr, $fetch_images['name']);
                                    }
                                    
                                    ?>

                                    <!-- lens options start -->
                                    <section id="lens">
                                        <div class="row">
                                            <div class="large-5 column">
                                                <div class="xzoom-container">

                                                    <?php  
                                                    if(isset($img_arr[0])){

                                                        if(file_exists(ROOT_PATH.'admin/uploads/posts/'.$img_arr[0])){  ?>
                                                            <img class="xzoom3" src="<?php echo URL ?>admin/uploads/posts/<?php echo $img_arr[0] ?>" class="img-responsive" xoriginal="<?php echo URL ?>admin/uploads/posts/3_0.jpg" width="100%" />
                                                        <?php 
                                                        } 
                                                    } ?>

                                                    <div class="xzoom-thumbs">
                                                        <?php 
                                                        foreach($img_arr as $singleimages) {
                                                            if(file_exists(ROOT_PATH.'admin/uploads/posts/'.$singleimages)){ ?>
                                                            
                                                                <a href="<?php echo URL ?>admin/uploads/posts/<?php echo $singleimages ?>"><img class="xzoom-gallery3" width="80" src="<?php echo URL ?>admin/uploads/posts/<?php echo $singleimages ?>"  xpreview="images/gallery/preview/01_b_car.jpg" title="The description goes here"></a>

                                                            <?php }
                                                        } ?>
                                                        
                                                    </div>
                                                </div>        
                                            </div>
                                        <div class="large-7 column"></div>
                                        </div>
                                    </section>

                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-8">

                                    <div class="row">

                                        <div class="col-xs-12">
                                            <h1><?php echo $fetch_post['name'] ?> </h1>
                                        </div>

                                        <div class="col-xs-12 product_desc_single">
                                            <h4>Descriptions</h4>
                                            <?php if( strlen(trim($fetch_post['description'])) > 3){
                                                echo $fetch_post['description'];
                                            }else{
                                                echo "<p>No Descriptions</p>";
                                            } ?>
                                        </div>

                                        <div class="col-lg-12">
                                            <!-- Comments -->
                                            <h4>Comments</h4>

                                            <?php 
                                                $select_comments = mysqli_query($localhost, "SELECT * FROM `ad_post_comments` WHERE `ad_post_id` = '$post_id' ORDER BY `id` DESC ");
                                                while($fetch_comments = mysqli_fetch_array($select_comments)){ ?>
                                                
                                                    <ul class="post_comments_list">
                                                        <li>
                                                            <div class="post_comment">
                                                                <h4><?php echo $fetch_comments['name'] ?></h4>
                                                                <small> <?php  echo Date("d M Y, h:i a", strtotime($fetch_comments['created'])) ?>  <i>At</i> <?php echo $fetch_comments['ip_address'] ?> </small>
                                                                <p> <?php echo $fetch_comments['comment'] ?> </p>

                                                                <a class="deletebtn text-danger"
                                                                    onclick="deleteItem(this)"
                                                                    data-after-success=1
                                                                    data-id="<?php echo $fetch_comments['id'] ?>" 
                                                                    data-refresh="" 
                                                                    data-url="<?php echo URL ?>admin/posts/ajax/post_handler.php" 
                                                                    data-key="delete_post_comment"> 
                                                                    <i class="fa fa-trash-o"></i> </a>

                                                            </div>
                                                        </li>
                                                    </ul>

                                                <?php  } // WHile end  ?>

                                        </div>

                                    </div>

                                </div>


                            </div>  <!-- ./ col-12 -->

                            <div class="clearfix"></div>

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