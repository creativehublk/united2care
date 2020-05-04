<?php include_once '../../../app/global/url.php' ?>
<?php include_once ROOT_PATH.'/app/global/sessions.php' ?>
<?php include_once ROOT_PATH.'/app/global/Gvariables.php' ?>
<?php include_once ROOT_PATH.'/db/db.php' ?>

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

        <div class="wrapper">

            <div class="container">

                <div class="box box-primary">
                    <div class="box-body">

                        <div class="row">
                            <div class="col-12">


                                <?php 
                                
                                $query = "CREATE TABLE `donations` ( `id` INT NOT NULL AUTO_INCREMENT , `reference_no` VARCHAR(100) NOT NULL , `first_name` VARCHAR(45) NOT NULL , `last_name` VARCHAR(45) NOT NULL , `email` VARCHAR(50) NULL , `phone` VARCHAR(50) NULL , `message` VARCHAR(100) NULL , `amount` VARCHAR(50) NOT NULL , `trx_payment_id` VARCHAR(50) NULL , `trx_payment_code` VARCHAR(50) NULL , `trx_payment_message` VARCHAR(100) NULL , `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `cause_id` INT NOT NULL DEFAULT '0' , PRIMARY KEY (`id`)) ENGINE = MyISAM ";
                                $create = mysqli_query($localhost, $query);
                                if($create){
                                    echo "Donation table created";
                                }else{
                                    echo mysqli_error($localhost);
                                }


                                ?>

                            </div>  <!-- ./ col-12 -->

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