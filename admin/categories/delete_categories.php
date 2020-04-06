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

<?php #endregion


if($_SERVER['REQUEST_METHOD'] == "GET"){

    if(isset($_GET['delete']) && isset($_GET['id']) && isset($_GET['type']) ){

        $delete_id = trim($_GET['id']);

        $type = trim($_GET['type']);

        if($type == 'main'){

            $delete = mysqli_query($con,"DELETE FROM `ref_categories` WHERE `id`='$delete_id' ");
            
        }// check table name

        if($type == "sub"){

            $delete = mysqli_query($con,"DELETE FROM `ref_sub_categories` WHERE `id`='$delete_id' ");

        }// delete sizes    
        
    }// isset
    
}// request method

    $url = 'categories.php';

    if($delete){
        // success

        $url .= '?delete=1';

    }else{

        $url .= '?delete=0';

    }

?>

<script>
    window.location = '<?php echo $url ?>';
</script>


<!-- If Access Denied  -->
<?php }else{ ?>

<script>
    window.location = '<?php echo URL ?>admin/accounts/login.php';    
</script>

<?php    
} ?>
<!-- If Access Denied End -->