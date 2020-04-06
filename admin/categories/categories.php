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
                    <h3>Categories</h3>
                </div>  <!-- ./ title -->


                <div>
                    
                    <?php 
                    if (isset($_GET['delete'])) { 
                            if($_GET['delete'] == 1){

                                ?>
                                
                                    <div class="alert alert-dismissible alert-success">
                                        <h4>Reference deleted successfully</h4>
                                    </div>

                                <?php

                            }else{
                                ?>
                                
                                    <div class="alert alert-dismissible alert-danger">
                                        <h4> Failed to delete the reference. it's being used by the products </h4>
                                    </div>
                                
                                <?php        
                            }
                        }
                        ?>
                </div>


                <div>
                    <a href="create_categories.php" class="btn btn-success btn-sm fa fa-plus"> Create Categories</a>
                    <br>&nbsp;
                </div>
                

                <div class="box box-primary">

                    

                    <div class="box-body">

                        <div class="">
                            <div class="col-12">

                                <table class="table table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category Name</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?php 
                                    $no = 1;
                                    $select_categories = mysqli_query($con,"SELECT * FROM `ref_categories` ");
                                    while($fetch_categories = mysqli_fetch_array($select_categories)){ ?>
                                        
                                        <tr>
                                            <td><?php echo $no;$no++; ?></td>
                                            <td>
                                                
                                                <b><?php echo $fetch_categories['name'] ?></b>

                                                <?php 
                                                    $sub_no = 1;
                                                    $category_id = $fetch_categories['id'];
                                                    $select_sub_categories = mysqli_query($con,"SELECT * FROM `ref_sub_categories`  WHERE `parent` = '$category_id' ");
                                                    if( mysqli_num_rows($select_sub_categories) > 0 ){
                                                ?>

                                                <table class="table table-condensed">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Pic</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            while($fetch_sub_categories = mysqli_fetch_array($select_sub_categories)){ 
                                                                
                                                                $thumbnail_image = "https://via.placeholder.com/600x400/ffffff/?Text=Creativehub Community";
                                                                if(file_exists(ROOT_PATH.'admin/uploads/category_banner/'.$fetch_sub_categories['cover_image']) && (strlen($fetch_sub_categories['cover_image']) > 0) ){
                                                                    $thumbnail_image = URL.'admin/uploads/category_banner/'.$fetch_sub_categories['cover_image'];
                                                                }

                                                                ?>
                                                            <tr>
                                                                <td><?php echo $sub_no;$sub_no++; ?></td>
                                                                <td><?php echo $fetch_sub_categories['name'] ?></td>
                                                                <td>

                                                                    <img src="<?php echo $thumbnail_image ?>" alt="" style="width: 100px;">

                                                                </td>
                                                                <td class="text-center"> 
                                                                    <a href="<?php echo URL ?>admin/categories/edit_sub_category.php?id=<?php echo $fetch_sub_categories['id'] ?>" class="fa fa-edit btn btn-primary btn-sm"></a> 
                                                                    <a href="<?php echo URL ?>admin/categories/sub_category_pic.php?id=<?php echo $fetch_sub_categories['id'] ?>" class="btn btn-primary btn-sm fa fa-upload" ></a>
                                                                    |<a class="btn btn-danger btn-sm fa fa-trash-o" href="delete_categories.php?delete=del&type=sub&id=<?php echo $fetch_sub_categories['id'] ?>"> </a>
                                                                </td>
                                                            </tr>
                                                            
                                                        <?php }  ?>

                                                    </tbody>
                                                </table>
                                                        <?php }  // if end?>
                                        
                                            </td>
                                            <td class="text-center"> 
                                                <a class="btn btn-primary btn-sm fa fa-edit" href="edit_categories.php?id=<?php echo $fetch_categories['id'] ?>"> Edit</a> 
                                                | <a class="btn btn-danger btn-sm fa fa-trash-o" href="delete_categories.php?delete=del&type=main&id=<?php echo $fetch_categories['id'] ?>"> Delete</a>
                                            </td>
                                        </tr>

                                    <?php } ?>
                                    </tbody>

                                </table>

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