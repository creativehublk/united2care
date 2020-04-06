<?php include_once '../../app/global/url.php' ?>
<?php include_once ROOT_PATH.'/app/global/sessions.php' ?>
<?php include_once ROOT_PATH.'/app/global/Gvariables.php' ?>
<?php include_once ROOT_PATH.'/db/db.php' ?>
<?php include_once ROOT_PATH.'/imports/functions.php' ?>

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
                    <h3>Donation Requets</h3>
                </div>  <!-- ./ title -->

                <a class="btn btn-primary" href="kits_request.php">View Kits Request</a>
                <br><br>

                <div class="box box-primary">
                    <div class="box-body">

                        <div class="row">

                            <div class="col-lg-12">

                                <table id='cust-grid' class='display table'>
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile No</th>
                                            <th>Item</th>
                                            <th id="sort">Date</th>
                                        </tr>
                                    </thead>

                                </table>
                            
                            </div>  <!-- ./ col-12 -->

                        </div> <!-- ./ row -->

                    </div> <!-- ./ box body -->
                </div> <!-- ./ box -->
            </div>  <!-- ./ container -->

        </div> <!-- ./ wrapper -->

        <input type="hidden" onclick="refreshDataTable()" id="refreshDataTable">

        <?php include ROOT_PATH.'admin/imports/footer.php'; ?> 
    </body>

    <?php require_once ROOT_PATH.'admin/imports/js.php' ?>


    <script type="text/javascript" language="javascript" >
    
    supplierList();
    // cust-grid
    function supplierList(){
        
        if ($.fn.DataTable.isDataTable( '#cust-grid' ) ) {
            $('#cust-grid').DataTable().destroy();
        }

        $(document).ready(function() {

            var dataTable = $('#cust-grid').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "ajax":{
                            url :"ajax/donation.php", // json datasource
                            type: "post",  // method  , by default get
                            error: function(ret){  // error handling

                            alert(ret.responseText);

                                    $(".cust-grid-error").html("");
                                    $("#cust-grid").append('<tbody class="cust-grid-error"><tr><th colspan="3">No data found in the server </th></tr></tbody>');
                                    $("#cust-grid_processing").css("display","none");

                            },
                    }
            });
            $("#sort").click();
            $("#sort").click();
        } );

    } // supplierList

    function refreshDataTable(){
        $('#cust-grid').DataTable().ajax.reload();
    }




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