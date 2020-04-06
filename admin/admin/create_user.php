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

        <div class="wrapper">

            <div class="container">
                
                <div class="title">
                    <h3>Dashboard</h3>
                </div>  <!-- ./ title -->

                <div class="box box-primary">
                    <div class="box-body">

                        <div class="row">
                            <div class="col-12">

                            <div class="card">
                                    <div class="card-body">
                                        
                                        <h4 class="card-title">Create User</h4>
                                        
                                        <form class="forms-sample" data-action-after=0 data-redirect-url = "" method="POST" action="<?php echo URL ?>admin/admin/ajax/admin_handler.php">
                                            
                                            <div class="row">

                                                <div class="col-lg-4 form-group">
                                                    <label>User Type</label>
                                                    <select name="user_type" class="form-control select2" required>
                                                        <option value="1">Admin</option>
                                                        <option value="2" selected>Employee</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="col-lg-4 form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" name="name" placeholder="Name">
                                                </div>

                                                <div class="col-lg-4 form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" name="username" placeholder="Username">
                                                </div>

                                                <div class="col-lg-6 form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                                </div>

                                                <div class="col-lg-6 form-group">
                                                    <label>Confrim Password</label>
                                                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
                                                </div>
                                                
                                                <div class="text-right col-lg-12">
                                                    <a class="btn btn-outline-danger mr-2" href="<?php echo URL ?>admin/admin/users_list.php" >Cancel</a>
                                                    <input type="hidden" name="create_admin_user">  <!-- Just hold the record -->
                                                    <button type="button" class="btn btn-outline-success mr-2 submit_form" data-validate=0 >Submit</button>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div> <!-- Card End -->
                            
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

