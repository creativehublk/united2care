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
<html lang="en">

    <head>
        
        <?php require_once ROOT_PATH.'admin/imports/client_header.php'; ?>

        <title>Password Master</title>

        <?php require_once ROOT_PATH.'admin/imports/main_css.php'; ?>

        <?php
            $password_id = 0;
            if( isset($_GET['id']) ){
                $password_id = mysqli_real_escape_string($localhost, trim($_GET['id']) );
            }

            $select = mysqli_query($localhost, "SELECT `id`, `name` FROM `password_master` WHERE `id` = '$password_id' ");
            $fetch = mysqli_fetch_array($select);
        ?>
        
    </head>

    <body>
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            <?php require_once ROOT_PATH.'admin/imports/client_navbar.php'; ?>
            <!-- ./partial:partials/_navbar.html -->
            
            
            <div class="container-fluid page-body-wrapper">

                <!-- partial:partials/_sidebar.html -->
                <?php require_once ROOT_PATH.'admin/imports/client_sidebar.php'; ?>
                <!-- ./partial:partials/_sidebar.html -->
            
            
                <div class="main-panel">
                    <div class="content-wrapper">
                    
                        <!-- User List -->
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">Change Password</h4>
                                <h3 class="text-center"><?php echo $fetch['name'] ?></h3>
                                    <form class="forms-sample" data-action-after=2 data-redirect-url = "<?php echo URL ?>admin/password_master.php" method="POST" action="<?php echo URL ?>admin/ajax/admin_handler.php">
                                        <div class="col-lg-12 form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" name="new_password" autocomplete="off" value="" placeholder="New Password">
                                        </div>

                                        <div class="text-right col-lg-12">
                                            <a class="btn btn-outline-danger mr-2" href="<?php echo URL ?>admin/password_master.php" >Cancel</a>
                                            <input type="hidden" name="change_master_password" value="<?php echo $password_id ?>">  <!-- Just hold the record -->
                                            <button type="button" class="btn btn-outline-success mr-2 submit_form" >Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                    
                    </div> <!-- content-wrapper ends -->
                    
                    <!-- partial:partials/_footer.html -->
                    <?php require_once ROOT_PATH.'admin/imports/client_footer.php'; ?>
                    <!-- ./partial:partials/_footer.html -->
                    
                </div> <!-- main-panel ends -->
            
            </div> <!-- page-body-wrapper ends -->
        
        </div> <!-- container-scroller -->



        <!-- Scripts -->
        <?php require_once ROOT_PATH.'admin/imports/main_js.php'; ?>
        <!-- ./ Scripts -->

        

    </body>
</html>

<?php }else{ ?>

<script>
    window.location = ROOT_PATH.'admin/account/logout.php';
</script>

<?php    
} ?>