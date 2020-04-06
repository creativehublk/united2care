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
        
        <!-- image zoom -->
        <link rel="stylesheet" href="<?php echo URL ?>admin/plugins/zoon-image/xzoom.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>

        <script src="<?php echo URL ?>admin/plugins/zoom-image/xzoom.js"></script>

        <!-- Image Crop Uploads -->
        <link rel="stylesheet" href="<?php echo URL ?>/assets/vendors/croppic/css/croppic.css" type="text/css" />

    </head>

    <body class="hold-transition skin-black-light layout-top-nav">

        <?php include ROOT_PATH.'admin/imports/menu.php'; ?>

        <?php 
        $cause_id = 0;
        if(isset($_GET['pro_id'])){
            if(is_numeric($_GET['pro_id'])){
                $cause_id = $_GET['pro_id'];
            }
        } 
        
        $select_cause = mysqli_query($localhost, "SELECT * FROM `causes` WHERE `id` = '$cause_id' ");
        $fetch_cause = mysqli_fetch_array($select_cause);
        
        $thumbnail_image = "https://via.placeholder.com/200x250/d3d3d3/FFFFFF/?text=CH+Community";
        if(file_exists(ROOT_PATH."admin/uploads/causes/thumb/".$fetch_cause['thumb']) && (strlen($fetch_cause['thumb']) > 0) ){
            $thumbnail_image = URL."admin/uploads/causes/thumb/".$fetch_cause['thumb'];
        }
        ?>



        <div class="wrapper">

            <div class="container">
                
                <div class="row">
                    <div class="col-lg-12">
                        <br>
                        <div class="col-xs-12 col-lg-8 product_view_title">
                            <h3> <?php echo $fetch_cause['name'] ?> </h3>
                        </div>  <!-- ./ title -->

                        <div class="col-xs-12 col-lg-4 text-right">

                            <a href="edit.php?id=<?php echo $cause_id ?>"  class="btn btn-primary btn-sm fa fa-edit"></a>
                            <a href="images.php?id=<?php echo $cause_id ?>"  class="btn btn-primary btn-sm fa fa-upload"> Change Images</a>

                            <button  class="btn btn-sm btn-danger fa fa-trash-o"
                                    onclick="deleteItem(this)"
                                    data-after-success=2
                                    data-id="<?php echo $cause_id ?>" 
                                    data-refresh="<?php echo URL ?>admin/causes/causes.php" 
                                    data-url="<?php echo URL ?>admin/causes/ajax/causes_handler.php" 
                                    data-key="delete_causes"></button>

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
                                    $select_images = mysqli_query($con,"SELECT * FROM `causes_images` WHERE `cause_id`='$cause_id' ");
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

                                                        if(file_exists(ROOT_PATH.'admin/uploads/causes/'.$img_arr[0])){  ?>
                                                            <img class="xzoom3" src="<?php echo URL ?>admin/uploads/causes/<?php echo $img_arr[0] ?>" class="img-responsive" xoriginal="<?php echo URL ?>admin/uploads/causes/3_0.jpg" width="100%" />
                                                        <?php 
                                                        } 
                                                    } ?>

                                                    <div class="xzoom-thumbs">
                                                        <?php 
                                                        foreach($img_arr as $singleimages) {
                                                            if(file_exists(ROOT_PATH.'admin/uploads/causes/'.$singleimages)){ ?>
                                                            
                                                                <a href="<?php echo URL ?>admin/uploads/causes/<?php echo $singleimages ?>"><img class="xzoom-gallery3" width="80" src="<?php echo URL ?>admin/uploads/causes/<?php echo $singleimages ?>"  xpreview="images/gallery/preview/01_b_car.jpg" title="The description goes here"></a>

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
                                            <h1><?php echo $fetch_cause['name'] ?> </h1>
                                        </div>

                                        <div class="col-xs-12 product_details_thumb_view_box">
                                            <img src="<?php echo $thumbnail_image ?>" alt="thumbnail">
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#upload_thumb_modal">Change Thumbnail</button>
                                        </div>

                                        <div class="col-xs-12 product_desc_single">
                                            <h4>Descriptions</h4>
                                            <?php if( strlen(trim($fetch_cause['description'])) > 3){
                                                echo $fetch_cause['description'];
                                            }else{
                                                echo "<p>No Descriptions</p>";
                                            } ?>
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

        <!-- Thumbnail Upload Modal -->
        <?php include ROOT_PATH.'admin/causes/include/thumbnailUploadModal.php'; ?> 

        <?php include ROOT_PATH.'admin/imports/footer.php'; ?> 
    </body>

    <?php require_once ROOT_PATH.'admin/imports/js.php' ?>



    <!-- Image Thumbnail Upload with CROP -->
    <input type="hidden" id="product_thumb_upload_url" value="<?php echo URL ?>admin/causes/ajax/causes_handler.php" >
    <input type="hidden" id="cause_id" value="<?php echo $cause_id ?>" >
    <script src="<?php echo URL ?>/assets/vendors/croppic/js/croppic.min.js"></script>
    <script src="<?php echo URL ?>admin/assets/js/pages/productsDetails.js"></script>
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