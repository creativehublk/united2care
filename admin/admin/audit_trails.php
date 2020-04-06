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
        <title>Audit Trails</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php require_once ROOT_PATH.'admin/imports/css.php' ?>

    </head>

    <body class="hold-transition skin-black-light layout-top-nav">

        <?php include ROOT_PATH.'admin/imports/menu.php'; ?>

        <div class="wrapper">

            <div class="container">
                
                <div class="title">
                    <h3>Audit Trails</h3>
                </div>  <!-- ./ title -->

                <div class="box box-primary">
                    <div class="box-body">

                        <div class="row">
                            <div class="col-12">

                                <div class="table-responsive">
                                    <table id='audit_trails-grid' class='display table'>
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th id="sort" >Date</th>
                                                <th>Time</th>
                                                <th>Action</th>
                                                <th>Description</th>
                                                <th>IP Address</th>
                                                <th>Browser</th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            
                            </div>  <!-- ./ col-12 -->

                        </div> <!-- ./ row -->

                    </div> <!-- ./ box body -->
                </div> <!-- ./ box -->
            </div>  <!-- ./ container -->

        </div> <!-- ./ wrapper -->

        <?php include ROOT_PATH.'admin/imports/footer.php'; ?> 
    </body>

    <?php require_once ROOT_PATH.'admin/imports/js.php' ?>

    <script type="text/javascript" language="javascript" >
        $(document).ready(function() {
            var dataTable = $('#audit_trails-grid').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax":{
                    url :"ajax/audit_trails_list.php", // json datasource
                    type: "post",  // method  , by default get
                    error: function(){  // error handling
                        $(".audit_trails-grid-error").html("");
                        $("#audit_trails-grid").append('<tbody class="audit_trails-grid-error"><tr><th colspan="3">No data found in the server ;-)</th></tr></tbody>');
                        $("#audit_trails-grid_processing").css("display","none");

                    }
                }
            });

            $("#sort").click();
            $("#sort").click();
        });
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
