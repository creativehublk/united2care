<?php include_once '../../app/global/url.php' ?>
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
                
                <div class="title">
                    <h3>Add New Category</h3>
                </div>  <!-- ./ title -->

                <div class="box box-primary">
                    <div class="box-body">

                        <div class="row">
                            <div class="col-12">


                                <?php 
                                if($_SERVER['REQUEST_METHOD'] == "POST"){
                                    if(isset($_POST['category'])){
                                        $category = $_POST['category'];
                                        $insert = mysqli_query($con,"INSERT INTO `ref_categories`(`name`) VALUES('$category') ");
                                        if($insert){
                                            $successmsg = "New category ".$category." has been created successfully";
                                        }else{
                                            $errormsg = "Failed to create new category";
                                        } // if end  
                                    } // isset
                                } // request mehod
                                ?>
                            

                                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                    
                                    <?php if (isset($successmsg)) { ?>
                                        <div class="alert alert-dismissible alert-success">
                                            <h4><?php echo $successmsg;?></h4>
                                        </div>
                                    <?php } ?>
                                    
                                    <?php if (isset($errormsg)) { ?>
                                        <div class="alert alert-dismissible alert-danger">
                                            <h4><?php echo $errormsg;?></h4>
                                        </div>

                                    <?php }  ?>
                                        
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label class="control-label" for="focusedInput">Product Category</label>
                                                <input class="form-control" id="focusedInput" type="text" placeholder="Men, Women, New Arrivals etc." name="category" required>
                                            </div>
                                        </div>
                                            
                                        
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="submit" name="addCat" value="Add Category" class="btn btn-primary" />
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

<!-- If Access Denied  -->
<?php }else{ ?>

<script>
    window.location = '<?php echo URL ?>admin/accounts/login.php';    
</script>

<?php    
} ?>
<!-- If Access Denied End -->