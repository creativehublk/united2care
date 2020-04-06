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
        <title>DOUBLE XL Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php require_once ROOT_PATH.'admin/imports/css.php' ?>

    </head>

    <body class="hold-transition skin-black-light layout-top-nav">

        <?php include ROOT_PATH.'admin/imports/menu.php'; ?>

        <div class="wrapper">

            <div class="container">
                
                <div class="title">
                    <h3>Users List</h3>
                    <a href="<?php echo URL ?>admin/admin/create_user.php" class="btn btn-success">Create User</a>
                </div>  <!-- ./ title -->

                <div class="box box-primary">
                    <div class="box-body">

                        <div class="row">
                            <div class="col-12">

                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                        $no = 1;
                                        $select_users = mysqli_query($localhost, "SELECT * FROM `admin` ORDER BY `id` DESC ");
                                        while( $fetch_users = mysqli_fetch_array($select_users) ){ ?>

                                        <tr>
                                            <td> <?php echo $no; $no++; ?> </td>
                                            <td> <?php echo $fetch_users['username'] ?></td>
                                            <td> <?php echo $fetch_users['created'] ?></td>
                                            <td>
                                                <!-- <a href="<?php echo URL  ?>admin/edit_user.php?id=" class="btn btn-inverse-primary btn-sm">Edit</a> -->
                                                <button class="btn btn-inverse-danger btn-sm" onclick="deleteAdminUser(this)" value="<?php echo $fetch_users['id'] ?>" >Delete</button>
                                                <a href="<?php echo URL  ?>admin/admin/change_password.php?id=<?php echo $fetch_users['id'] ?>" class="btn btn-inverse-warning btn-sm">Change Password</a>
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

    <script>
        function deleteAdminUser(e){
            
            var userId = $(e).val();

            $.confirm({
                title: 'Are you sure',
                theme: 'material',
                content: '<h6> Press confirm to process </h6>',
                buttons: {
                    
                    close: {
                        text: 'Close', // With spaces and symbols
                        
                    },
                    ok: {
                        text: 'Confirm', // With spaces and symbols
                        action: function () {
                            $("table").loading();
                            // Ajax Start
                            $.ajax({
                                type: 'POST',
                                url: 'ajax/admin_handler.php',
                                data: { 'id': userId, 'delete_admin': 'yes' },
                                dataType: 'json',
                                success: function (response) {
                                    console.log(response);
                                    if(response['result'] == 1){
                                        
                                        notifyMessage(response['message'],"Success");

                                        setTimeout(() => {
                                            window.location = window.location;
                                        }, 1000);

                                    }else{

                                        notifyMessage(response['message'],"Failed");
                                    }

                                },// success
                                error:function(err){
                                    console.log(err);
                                }
                            }); // ajax end 

                            $("table").loading('stop');

                        },
                    }
                    
                }
            });

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
