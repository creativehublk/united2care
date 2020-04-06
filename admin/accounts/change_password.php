<?php include_once '../../app/global/url.php' ?>
<?php include_once ROOT_PATH.'/app/global/sessions.php' ?>
<?php include_once ROOT_PATH.'/app/global/Gvariables.php' ?>
<?php include_once ROOT_PATH.'/db/db.php' ?>

<?php  

if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(isset($_POST['change_password'])){

        $password = mysqli_real_escape_string($con,trim($_POST['password']));
        $c_password = mysqli_real_escape_string($con,trim($_POST['c_password']));

        if($password == $c_password ){
            // passwor dsame
            $admin_id = $_SESSION['admin_id'];

            $password = password_hash($password,PASSWORD_DEFAULT);

            $update = mysqli_query($con,"UPDATE `admin` SET `password` ='$password' WHERE `id`='$admin_id' ");

            if($update){
                $password_successfull = "Password has been changed successfully"; 
            }else{
                $change_error = "Failed to change password";    
            }

        }else{
            // passwordn  not same
            $change_error = "New password and confirm password must be same";
        }   

    }// isset

}// request method

?>

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
                
                <div class="title">
                    <h3>Change Password</h3>
                </div>  <!-- ./ title -->

                <div class="box box-primary">
                    <div class="box-body">

                        <div class="row">
                            <div class="col-xs-12">

                                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                                    <div class="row">

                                        <div class="col-xs-12">
                                            <?php if(isset($password_successfull)){ ?>
                            
                                                <h5 style="color: green"> <?php echo $password_successfull ?> </h5>

                                            <?php }else if(isset($change_error)){ ?>

                                                <h5 style="color: red"><?php echo $change_error ?>. </h5>

                                            <?php } ?>
                                        </div>

                                        <div class="form-group col-xs-12 col-md-6">
                                            <label for="password">New Password</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="New Password">
                                        </div>

                                        <div class="form-group col-xs-12 col-md-6">
                                            <label for="c_password">Confirm Password</label>
                                            <input type="password" name="c_password" id="c_password" class="form-control" placeholder="Confirm Password">
                                        </div>

                                        <div class="form-group col-xs-12">
                                            <a href="<?php echo URL ?>admin" role="button" class="btn btn-default">Cancel</a>
                                            <input type="submit" value="Update" class="btn btn-success pull-right"name="change_password">
                                        </div>
                                    </div>

                                </form>

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