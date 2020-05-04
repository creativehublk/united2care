<?php include_once '../../app/global/url.php' ?>
<?php include_once ROOT_PATH.'/app/global/sessions.php' ?>
<?php include_once ROOT_PATH.'/app/global/Gvariables.php' ?>
<?php include_once ROOT_PATH.'/db/db.php' ?>

<?php
$checkArr = array(
    'page_level_code' => 1
);
$checkAccess = $dbOpertionsObj->checkLogin($checkArr);

if($checkAccess == 1){ 
    
    $select_causes = mysqli_query($localhost, "SELECT * FROM `causes` ");
    ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Causes | United2Care</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php require_once ROOT_PATH.'admin/imports/css.php' ?>

    </head>

    <body class="hold-transition skin-black-light layout-top-nav">

        <?php include ROOT_PATH.'admin/imports/menu.php'; ?>

        <div class="wrapper">

            <div class="container">
                
                <div class="title">
                    <h3>Causes</h3>
                </div>  <!-- ./ title -->


                <a class="btn btn-primary" href="create.php">Create Cause</a>
                <br><br>

                <div class="box box-primary">
                    <div class="box-body">

                        <div class="row">

                        <?php 
                        while($fetch_causes = mysqli_fetch_array($select_causes)){ 
                            $cause_id = $fetch_causes['id'];

                            $select_donations = mysqli_query($localhost, "SELECT SUM(`amount`) AS donated FROM `donations` WHERE `cause_id` = '$cause_id' AND `trx_payment_code` = '2' ORDER BY `id` DESC ");
                            $fetch_donation = mysqli_fetch_array($select_donations);

                            $thumbnail_image = "https://via.placeholder.com/200x250/d3d3d3/FFFFFF/?text=United2Care";
                            if(file_exists(ROOT_PATH."admin/uploads/causes/thumb/".$fetch_causes['thumb'])){
                                $thumbnail_image = URL."admin/uploads/causes/thumb/".$fetch_causes['thumb'];
                            }

                            ?>

                            <!-- Product Start -->
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <div class="box box-solid">
                                    <div class="box-body" >
                                        <div class="col-sm-12 single_product_box">

                                            <div> 
                                                <a href="<?php echo URL ?>/admin/causes/view_cause.php?pro_id=<?php echo $cause_id ?>">
                                                    <img src="<?php echo $thumbnail_image ?>" class="product_img">
                                                </a>
                                            </div>

                                            <a href="<?php echo URL ?>/admin/causes/view_cause.php?pro_id=<?php echo $cause_id ?>">
                                                <h4 class="heading"><?php echo $fetch_causes['name'] ?></h4>
                                            </a>

                                            <h4 class="text-center">LKR <?php echo number_format($fetch_donation['donated'], 2) ?></h4>

                                            <div class="action_btn_box">
                                                <a href="<?php echo URL ?>/admin/causes/edit.php?id=<?php echo $cause_id ?>" class="btn btn-primary fa fa-edit" target="_blank" title="Edit Product"></a>
                                                <a href="<?php echo URL ?>/admin/causes/images.php?id=<?php echo $cause_id ?>" class="btn btn-default fa fa-upload" target="_blank" title="Updates Images"></a>
                                                <button  class="btn btn-sm btn-danger fa fa-trash-o"
                                                    onclick="deleteItem(this)"
                                                    data-after-success=1
                                                    data-id="<?php echo $cause_id ?>" 
                                                    data-refresh="<?php echo '$full_url' ?>" 
                                                    data-url="<?php echo URL ?>admin/causes/ajax/causes_handler.php" 
                                                    data-key="delete_causes"></button>
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


</html>


<!-- If Access Denied  -->
<?php }else{ ?>

<script>
    window.location = '<?php echo URL ?>admin/accounts/login.php';    
</script>

<?php    
} ?>
<!-- If Access Denied End -->