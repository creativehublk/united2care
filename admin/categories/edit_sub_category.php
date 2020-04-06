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

                                $sub_category_id = 0;
                                if(isset($_GET['id'])){

                                    if(is_numeric($_GET['id'])){
                                        $sub_category_id = $_GET['id'];
                                    }
                                    
                                }

                                $select_sub_category = mysqli_query($con,"SELECT * FROM `ref_sub_categories` WHERE `id`='$sub_category_id' ");
                                $fetch_sub_category = mysqli_fetch_array($select_sub_category);

                                if($_SERVER['REQUEST_METHOD'] == "POST"){
                                    if(isset($_POST['category'])){
                                        $category_id = $_POST['category'];
                                        $sub_category = $_POST['sub_category'];
                                        $sub_category_id = $_POST['sub_category_id'];


                                        $update_query = "UPDATE `ref_sub_categories` SET `name`='$sub_category',`parent`='$category_id' ";


                                        $update_query .= " WHERE `id`='$sub_category_id' ";

                                        $insert = mysqli_query($con, $update_query);
                                        if($insert){
                                            $successmsg = "Sub category has been updated successfully";
                                        }else{
                                            $errormsg = "Failed to update subcategory";
                                        } // if end  
                                    } // isset
                                } // request mehod
                                ?>
                            

                                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
                                    
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
                                                <label class="control-label">Select Category</label>
                                                <select name="category" required class="form-control select2">
                                                    <option value="0" selected disabled> Select Category </option>
                                                    <?php 
                                                        
                                                        $select_category = mysqli_query($con,"SELECT * FROM `ref_categories` "); 
                                                        while($fetch_categories = mysqli_fetch_array($select_category)){ 
                                                            if($fetch_categories['id'] == $fetch_sub_category['parent']){ ?>

                                                                <option selected value="<?php echo $fetch_categories['id'] ?>"><?php echo $fetch_categories['name'] ?></option>

                                                            <?php }else{ ?>
                                                                <option value="<?php echo $fetch_categories['id'] ?>"><?php echo $fetch_categories['name'] ?></option>
                                                            <?php } ?>

                                                        <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label class="control-label" for="focusedInput">Sub Category</label>
                                                <input class="form-control" type="text" value="<?php echo $fetch_sub_category['name'] ?>" placeholder="Work wear, Casula Wear etc." name="sub_category" required>
                                                
                                                <input type="text" name="sub_category_id" value="<?php echo $sub_category_id ?>" hidden >

                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <br>
                                                <input type="submit" name="addCat" value="Update Category" class="btn btn-primary pull-right" />
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