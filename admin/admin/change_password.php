<?php include_once '../../app/global/url.php' ?>
<?php include_once ROOT_PATH.'/app/global/sessions.php' ?>
<?php include_once ROOT_PATH.'/app/global/Gvariables.php' ?>
<?php include_once ROOT_PATH.'/db/db.php' ?>

<?php
$checkArr = array(
    'page_level_code' => 1
);
$checkAccess = $dbOpertionsObj->checkLogin($checkArr);

if($checkAccess == 1){ ?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>DOUBLE XL Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php require_once ROOT_PATH.'admin/imports/css.php' ?>

    </head>

    <body class="hold-transition skin-black-light layout-top-nav">
        

        <?php include ROOT_PATH.'admin/imports/menu.php'; ?>

        <?php
            $password_id = 0;
            if( isset($_GET['id']) ){
                $password_id = mysqli_real_escape_string($localhost, trim($_GET['id']) );
            }

            $select = mysqli_query($localhost, "SELECT `id`, `username` FROM `admin` WHERE `id` = '$password_id' ");
            $fetch = mysqli_fetch_array($select);
        ?>

        <div class="wrapper">

            <div class="container">
                
                <div class="title">
                    <h3>Change User Password</h3>
                </div>  <!-- ./ title -->

                <div class="box box-primary">
                    <div class="box-body">

                        <div class="row">
                            <div class="col-12">
                            
                                <div class="grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                        <h4 class="card-title"></h4>
                                        <h3 class="text-center"><?php echo $fetch['username'] ?></h3>
                                            <form class="forms-sample" data-action-after=2 data-redirect-url = "<?php echo URL ?>admin/admin/users_list.php" method="POST" action="<?php echo URL ?>admin/admin/ajax/admin_handler.php">
                                                <div class="col-lg-12 form-group">
                                                    <label>New Password</label>
                                                    <input type="password" class="form-control" name="new_password" autocomplete="off" value="" placeholder="New Password">
                                                </div>

                                                <div class="text-right col-lg-12">
                                                    <a class="btn btn-outline-danger mr-2" href="<?php echo URL ?>admin/password_master.php" >Cancel</a>
                                                    <input type="hidden" name="change_admin_password" value="<?php echo $password_id ?>">  <!-- Just hold the record -->
                                                    <button type="button" class="btn btn-outline-success mr-2 submit_form" >Submit</button>
                                                </div>
                                            </form>
                                        </div>
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


</html>


<!-- If Access Denied  -->
<?php }else{ ?>

<script>
    window.location = '<?php echo URL ?>admin/accounts/login.php';    
</script>

<?php    
} ?>
<!-- If Access Denied End -->