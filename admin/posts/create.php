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
                    <h3>Add Products</h3>
                </div>  <!-- ./ title -->

                <div class="box box-primary">
                    <div class="box-body">

                        <div class="row">
                            <div class="col-12">

                                <form class="forms-sample" id="create_product_form"
                                    data-action-after=2
                                    data-redirect-url="<?php echo URL ?>admin/posts/images.php"
                                    method="POST"
                                    action="<?php echo URL ?>admin/posts/ajax/post_handler.php">

                                    <div class="box-body" >
                                    
                                        <div class="col-sm-12 col-xs-12" >
                                        
                                            <div class="row">
                                                <div class="form-group col-xs-12 col-sm-3">
                                                    <label for="main_Cat">Category</label><br>
                                                    <select name="category" class="form-control select2" id="category" required>
                                                        <option value="0" selected disabled>Please select category</option>
                                                        <?php
                                                            $select_categories = mysqli_query($con,"SELECT * FROM `ref_categories`");
                                                            while($fetch_categories = mysqli_fetch_array($select_categories)){ ?>
                                                                
                                                                <option value="<?php echo $fetch_categories['id'] ?>"><?php echo $fetch_categories['name'] ?></option>
                                                            
                                                        <?php } ?>
                                                    </select>
                                                    
                                                </div>

                                                <div class="form-group col-xs-12 col-sm-3">
                                                    <label for="main_Cat">Sub Category</label><br>
                                                    <select name="sub_category" class="form-control select2" id="sub_categories" required>
                                                        <option value="0" selected disabled>Please select sub category</option>
                                                        
                                                    </select>
                                                    
                                                </div>

                                                <div class="form-group  col-xs-12 col-sm-6">
                                                    <label>Name</label>
                                                    <input name="name" placeholder="Name" class="form-control"  type="text" style="width:100%;" required>
                                                </div>

                                            </div>

                                            
                                        </div>
                                        
                                            <div class="col-sm-12 col-xs-12" >

                                                <div class="row">
                                                    <div class="col-xs-12 col-md-6 form-group">
                                                        <label>Description</label>
                                                        <textarea class="form-control tinyMceEditor" name="dsc" placeholder="Description" row="10"></textarea>
                                                    </div>

                                                    <div class="col-xs-12 col-md-12 form-group">
                                                        <input type="hidden" name="create_post">
                                                        <input type="button" class="btn btn-primary pull-right submit_form_no_confirm" data-validate=0 value="Create">
                                                    </div>
                                                </div>
                                                <!-- /.box-body -->
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


    <script>
        $(document).on('change','#category',function(e){
            var categoryId = $(this).val();
            
            $.ajax({
                type: 'POST',
                url: 'ajax/sub_category.php',
                data: {category : categoryId},
                dataType: 'json',
                success:function(ret){
                    $("#sub_categories").html(ret['result']);
                }
                
            });
        })
    </script>

</html>

<!-- If Access Denied  -->
<?php }else{ ?>

<script>
    window.location = '<?php echo URL ?>admin/accounts/login.php';    
</script>

<?php    
} ?>
<!-- If Access Denied End -->