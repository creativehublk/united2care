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

    $post_id = 0;
    if(isset($_GET['id'])){

        if(is_numeric($_GET['id'])){
            $post_id = $_GET['id'];
        }
        
    }

    $select = mysqli_query($con,"SELECT p.*, sc.`parent` 
                                FROM `ad_posts` p 
                                INNER JOIN `ref_sub_categories` AS sc ON sc.`id` = p.`sub_cat_id` 
                                WHERE p.`id`='$post_id' ");
    $fetch = mysqli_fetch_array($select); 
    ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Edit Post | United2Care</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php require_once ROOT_PATH.'admin/imports/css.php' ?>

    </head>

    <body class="hold-transition skin-black-light layout-top-nav">

        <?php include ROOT_PATH.'admin/imports/menu.php'; ?>

        <div class="wrapper">

            <div class="container">
                
                <div class="title">
                    <h3>Edit Causes</h3>
                </div>  <!-- ./ title -->

                <div class="box box-primary">
                    <div class="box-body">

                        <div class="row">

                            <div class="col-lg-12">
                            
                                <form class="forms-sample" id="create_product_form"
                                    data-action-after=2
                                    data-redirect-url="<?php echo URL ?>admin/posts/posts.php"
                                    method="POST"
                                    action="<?php echo URL ?>admin/posts/ajax/post_handler.php">

                                    <div class="box-body" >
                                    
                                        <div class="col-sm-12 col-xs-12" >
                                        
                                            <div class="row">
                                                <div class="form-group col-xs-12 col-sm-3">
                                                    <label for="main_Cat">Category</label><br>
                                                    <select name="category" class="form-control select2" required id="category">
                                                        <?php
                                                            $select_categories = mysqli_query($con,"SELECT * FROM `ref_categories`");
                                                            while($fetch_categories = mysqli_fetch_array($select_categories)){ 
                                                                
                                                                if($fetch['parent'] == $fetch_categories['id']){ ?>
                                                        
                                                                
                                                                    <option selected value="<?php echo $fetch_categories['id'] ?>"><?php echo $fetch_categories['name'] ?></option>

                                                                <?php }else{ ?>
                                                                    
                                                                    <option value="<?php echo $fetch_categories['id'] ?>"><?php echo $fetch_categories['name'] ?></option>

                                                            <?php 
                                                                } // if loop
                                                            } ?>
                                                    </select>
                                                    
                                                </div>

                                                <div class="form-group col-xs-12 col-sm-3">
                                                    <label >Sub Category</label><br>
                                                    <select name="sub_category" class="form-control select2" required id="sub_categories">
                                                        <?php
                                                            $select_sub_categories = mysqli_query($con,"SELECT * FROM `ref_sub_categories` WHERE `parent`='".$fetch['parent']."'  ");
                                                            while($fetch_sub_categories = mysqli_fetch_array($select_sub_categories)){ 
                                                                
                                                                if($fetch['sub_category'] == $fetch_sub_categories['id']){ ?>
                                                        
                                                                
                                                                    <option selected value="<?php echo $fetch_sub_categories['id'] ?>"><?php echo $fetch_sub_categories['name'] ?></option>

                                                                <?php }else{ ?>
                                                                    
                                                                    <option value="<?php echo $fetch_sub_categories['id'] ?>"><?php echo $fetch_sub_categories['name'] ?></option>

                                                            <?php 
                                                                } // if loop
                                                            } ?>
                                                    </select>
                                                    
                                                </div>

                                                <div class="form-group  col-xs-12 col-sm-6">
                                                    <label for="exampleInputFile">Name</label>
                                                    <input  name="name" placeholder="Name" class="form-control" value="<?php echo $fetch['name'] ?>" type="text"  required>
                                                </div>

                                            </div>

                                            
                                        </div>
                                        
                                            <div class="col-sm-12 col-xs-12" >

                                                <div class="row">
                                                    <div class="col-xs-12 col-md-6 form-group">
                                                        <label>Description</label>
                                                        <textarea class="form-control tinyMceEditor" name="dsc" placeholder="Description" row="10"> <?php echo $fetch['description'] ?> </textarea>
                                                    </div>

                                                    <div class="col-xs-12 col-md-12 form-group">
                                                        <input type="hidden" name="update_post" value="<?php echo $post_id ?>">
                                                        <input type="button" class="btn btn-primary pull-right submit_form_no_confirm" data-validate=0 value="Update">
                                                    </div>
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                        </div>
                                    
                                </form>

                            </div>

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