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
                    <h3>Edit Category</h3>
                </div>  <!-- ./ title -->

                <div class="box box-primary">
                    <div class="box-body">

                        <div class="row">
                            <div class="col-12">

                                <?php 

                                $category_id = 0;
                                if(isset($_GET['id'])){

                                    if(is_numeric($_GET['id'])){
                                        $category_id = $_GET['id'];
                                    }
                                    
                                }

                                $select_category = mysqli_query($con,"SELECT * FROM `ref_categories` WHERE `id`='$category_id' ");
                                $fetch_category = mysqli_fetch_array($select_category);

                                if($_SERVER['REQUEST_METHOD'] == "POST"){
                                    if(isset($_POST['category'])){
                                        $category = $_POST['category'];
                                        $id = $_POST['category_id'];

                                        $insert = mysqli_query($con,"UPDATE `ref_categories` SET `name`='$category' WHERE `id`='$id' ");
                                        if($insert){
                                            $successmsg = "Category name has been updated successfully";
                                        }else{
                                            $errormsg = "Failed to update category";
                                        } // if end  
                                    } // isset
                                } // request mehod
                                ?>
                            

                                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                    
                                    <?php if (isset($successmsg)) { ?>
                                        <div class="alert alert-dismissible alert-success">
                                            <h4><?php echo $successmsg;?></h4>
                                        </div>

                                        <script>
                                            window.location = "categories.php";
                                        </script>

                                    <?php } ?>
                                    
                                    <?php if (isset($errormsg)) { ?>
                                        <div class="alert alert-dismissible alert-danger">
                                            <h4><?php echo $errormsg;?></h4>
                                        </div>

                                    <?php }  ?>
                                        
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label class="control-label" for="focusedInput">Product Category</label>
                                                <input class="form-control" id="focusedInput" type="text" value="<?php echo $fetch_category['name'] ?>" placeholder="Electronics, Mobiles, Laptops etc." name="category" required>
                                                
                                                <input type="text" name="category_id" value="<?php echo $category_id ?>" hidden >

                                            </div>
                                        </div>
                                            
                                        
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="submit" name="addCat" value="Update Category" class="btn btn-primary" />
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