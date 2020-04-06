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
        <title>Create Causes | United2Care</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php require_once ROOT_PATH.'admin/imports/css.php' ?>

    </head>

    <body class="hold-transition skin-black-light layout-top-nav">

        <?php include ROOT_PATH.'admin/imports/menu.php'; ?>

        <div class="wrapper">

            <div class="container">
                
                <div class="title">
                    <h3>Create Causes</h3>
                </div>  <!-- ./ title -->

                <div class="box box-primary">
                    <div class="box-body">

                        <div class="row">

                            <div class="col-lg-12">
                            
                                <form class="forms-sample" id="create_product_form"
                                    data-action-after=2
                                    data-redirect-url="<?php echo URL ?>admin/causes/images.php"
                                    method="POST"
                                    action="<?php echo URL ?>admin/causes/ajax/causes_handler.php">

                                    <div class="box-body" >
                                    
                                    <div class="col-sm-12 col-xs-12" >
                                    
                                        <div class="row">
                                            
                                            <div class="form-group  col-xs-12 col-sm-6">
                                                <label>Name</label>
                                                <input name="name" placeholder="Name" class="form-control"  type="text" style="width:100%;" required>
                                            </div>

                                            <div class="col-xs-12 col-md-6 form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="dsc" placeholder="Description" row="50"></textarea>
                                            </div>

                                        </div>

                                        
                                    </div>
                                    
                                        <div class="col-sm-12 col-xs-12" >

                                            <div class="row">
                                                
                                                <div class="col-xs-12 col-md-12 form-group">

                                                    <input type="hidden" name="create_cause">
                                                    <input type="button" class="btn btn-primary pull-right submit_form_no_confirm" data-validate=0 value="Create">
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