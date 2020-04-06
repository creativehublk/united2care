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
                    <h3>Add New Sub Category</h3>
                </div>  <!-- ./ title -->

                <div class="box box-primary">
                    <div class="box-body">

                        <div class="row">
                            <div class="col-12">


                                <?php 
                                if($_SERVER['REQUEST_METHOD'] == "POST"){
                                    if(isset($_POST['category'])){
                                        $category = $_POST['category'];
                                        $sub_category = $_POST['sub_category'];
                                        $cover_image = '';
                                        // add cover image here

                                        $insert = mysqli_query($con,"INSERT INTO `ref_sub_categories`(`name`,`parent`,`cover_image`) VALUES('$sub_category','$category','$cover_image') ");
                                        if($insert){
                                            $successmsg = "New sub category ".$sub_category." has been created successfully";
                                            $sub_cat_id = mysqli_insert_id($localhost);
                                        }else{
                                            $errormsg = "Failed to create new sub category";
                                        } // if end  
                                    } // isset
                                } // request mehod
                                ?>
                            

                                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
                                    
                                    <?php if (isset($successmsg)) { ?>
                                        <div class="alert alert-dismissible alert-success">
                                            <h4><?php echo $successmsg;?></h4>

                                            <script>
                                                window.location = 'sub_category_pic.php?id=<?php echo $sub_cat_id ?>'
                                            </script>

                                        </div>
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
                                                    <?php $select_category = mysqli_query($con,"SELECT * FROM `ref_categories` "); 
                                                        while($fetch_categories = mysqli_fetch_array($select_category)){ ?>

                                                            <option value="<?php echo $fetch_categories['id'] ?>"><?php echo $fetch_categories['name'] ?></option>

                                                        <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label class="control-label" for="focusedInput">Sub Category</label>
                                                <input class="form-control" type="text" placeholder="Work wear, Casula Wear etc." name="sub_category" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <br>
                                                <input type="submit" name="addCat" value="Add Sub Category" class="btn btn-primary pull-right" />
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