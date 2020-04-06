<?php include_once '../../app/global/url.php' ?>
<?php include_once ROOT_PATH.'/app/global/sessions.php' ?>
<?php include_once ROOT_PATH.'/app/global/Gvariables.php' ?>
<?php include_once ROOT_PATH.'/db/db.php' ?>

<?php require_once ROOT_PATH.'admin/imports/resize_img.php' ?>
<?php
$checkArr = array(
    'page_level_code' => 2
);
$checkAccess = $dbOpertionsObj->checkLogin($checkArr);

if($checkAccess == 1){ ?>

<?php 

$sub_cat_id = 0;

if($_SERVER['REQUEST_METHOD'] == "GET"){
    if(isset($_GET['id'])){
        if(is_numeric( trim($_GET['id']) )){
            $sub_cat_id = mysqli_real_escape_string($con, $_GET['id']);
        }
    } // isset of order_no
}// request method


$select_sub_category = mysqli_query($con,"SELECT * FROM `ref_sub_categories` WHERE `id`='$sub_cat_id' ");
$fetch_sub_category = mysqli_fetch_array($select_sub_category);

?>

<!DOCTYPE html>
<html>
    <head>
            
        <?php require_once ROOT_PATH.'admin/imports/admin_meta.php' ?>

        <?php require_once ROOT_PATH.'admin/imports/css.php' ?>

        <!-- Image Crop Uploads -->
        <link rel="stylesheet" href="<?php echo URL ?>/assets/vendors/croppic/css/croppic.css" type="text/css" />

    </head>

    <body class="hold-transition skin-black-light layout-top-nav">

        <?php include ROOT_PATH.'admin/imports/menu.php'; ?>

        <div class="wrapper">

            <div class="container">
                
                <div class="title">
                    <h3>Sub Category Cover Picture</h3>
                </div>  <!-- ./ title -->

                <div class="box box-primary">
                    <div class="box-body">

                        <div class="">
                            <div class="col-12">

                                    <div class="row">
                                        
                                        <div class="form-group col-lg-12">
                                            <h4 class="text-center"><?php echo $fetch_sub_category['name'] ?></h4>
                                        </div>


                                        <?php 
                                        $thumbnail_image = "https://via.placeholder.com/600x400/ffffff/?Text=Creativehub Community";
                                        if(file_exists(ROOT_PATH.'admin/uploads/category_banner/'.$fetch_sub_category['cover_image']) && (strlen($fetch_sub_category['cover_image']) > 0) ){
                                            $thumbnail_image = URL.'admin/uploads/category_banner/'.$fetch_sub_category['cover_image'];
                                        }
                                        ?>


                                        <div class="col-xs-12 col-lg-12 upload_thumb_modal_box category_pic_box">
                                            <div id="croppic" class="text-center">
                                                <img src="<?php echo $thumbnail_image ?>" alt="">
                                            </div>
                                            <button id="cropContainerHeaderButton"
                                                class="btn btn-primary"
                                                >Upload Thumbnail</button>
                                        </div>


                                        <div class="col-xs-12 col-lg-12">
                                            <a href="<?php echo URL ?>admin/categories/categories.php" class="btn btn-primary"> <i class="fa fa-arrow-circle-left"></i> Back</a>
                                        </div>

                                    </div>

                            </div>  <!-- ./ col-12 -->

                        </div> <!-- ./ row -->

                    </div> <!-- ./ box body -->
                </div> <!-- ./ box -->
            </div>  <!-- ./ container -->

        </div> <!-- ./ wrapper -->

        <?php include ROOT_PATH.'admin/imports/footer.php'; ?> 
    </body>

    <?php require_once ROOT_PATH.'admin/imports/js.php' ?>

    <!-- Image Thumbnail Upload with CROP -->
    <input type="hidden" id="sub_cat_id" value="<?php echo $sub_cat_id ?>" >
    <script src="<?php echo URL ?>/assets/vendors/croppic/js/croppic.min.js"></script>
    <script src="<?php echo URL ?>admin/assets/js/pages/subCat_pic.js"></script>

</html>


<!-- If Access Denied  -->
<?php }else{ ?>

<script>
    window.location = '<?php echo URL ?>admin/accounts/login.php';    
</script>

<?php    
} ?>
<!-- If Access Denied End -->