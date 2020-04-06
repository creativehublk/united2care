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

        <?php 
        $cause_id = 0;
        if(isset($_GET['pro_id'])){
            if(is_numeric($_GET['pro_id'])){
                $cause_id = $_GET['pro_id'];
            }
        }

        $select_cause = mysqli_query($localhost, "SELECT * FROM `requested_cause` WHERE `id` = '$cause_id' ");
        $fetch_cause = mysqli_fetch_array($select_cause);
        ?>



        <div class="wrapper">

            <div class="container">
                
                <div class="row">
                    <div class="col-lg-12">
                        <br>
                        <div class="col-xs-12 col-lg-8 product_view_title">
                            <h3> <?php echo $fetch_cause['name'] ?> </h3>
                        </div>  <!-- ./ title -->

                    </div>
                </div>

                <div class="box box-primary">
                    <div class="box-body">

                        <div class="row">
                            <div class="col-12">
                            
                                <div class="col-xs-12 col-sm-12 col-md-4">

                                    <?php 
                                    $img_arr = array();
                                    $select_images = mysqli_query($con,"SELECT * FROM `req_causes_img` WHERE `cause_id`='$cause_id' ");
                                    while($fetch_images = mysqli_fetch_array($select_images)){
                                        array_push($img_arr, $fetch_images['name']);
                                    }
                                    
                                    ?>

                                    <!-- lens options start -->
                                    <section id="lens">
                                        <div class="row">
                                            <div class="large-5 column">
                                                <div class="xzoom-container">

                                                    <?php  
                                                    if(isset($img_arr[0])){

                                                        if(file_exists(ROOT_PATH.'admin/uploads/req_causes/'.$img_arr[0])){  ?>
                                                            <img class="xzoom3" src="<?php echo URL ?>admin/uploads/req_causes/<?php echo $img_arr[0] ?>" class="img-responsive" xoriginal="<?php echo URL ?>admin/uploads/req_causes/3_0.jpg" width="100%" />
                                                        <?php 
                                                        } 
                                                    } ?>

                                                    <div class="xzoom-thumbs">
                                                        <?php 
                                                        foreach($img_arr as $singleimages) {
                                                            if(file_exists(ROOT_PATH.'admin/uploads/req_causes/'.$singleimages)){ ?>
                                                            
                                                                <a href="<?php echo URL ?>admin/uploads/req_causes/<?php echo $singleimages ?>"><img class="xzoom-gallery3" width="80" src="<?php echo URL ?>admin/uploads/req_causes/<?php echo $singleimages ?>"  xpreview="images/gallery/preview/01_b_car.jpg" title="The description goes here"></a>

                                                            <?php }
                                                        } ?>
                                                        
                                                    </div>
                                                </div>        
                                            </div>
                                        <div class="large-7 column"></div>
                                        </div>
                                    </section>

                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-8">

                                    <div class="row">

                                        <div class="col-xs-12">
                                            <h1><?php echo $fetch_cause['name'] ?> </h1>
                                            <small> <?php echo Date("M d, Y H:i", strtotime($fetch_cause['created'])) ?> </small>
                                        </div>

                                        <div class="col-xs-12">
                                            <h4>Email: <?php echo $fetch_cause['email'] ?> </h4>
                                            <h4>Mobile: <?php echo $fetch_cause['phone'] ?> </h4>
                                        </div>

                                        <div class="col-xs-12 product_desc_single">
                                            <h4>Descriptions</h4>
                                            <?php if( strlen(trim($fetch_cause['message'])) > 3){
                                                echo $fetch_cause['message'];
                                            }else{
                                                echo "<p>No Descriptions</p>";
                                            } ?>
                                        </div>
                                    </div>

                                </div>


                            </div>  <!-- ./ col-12 -->

                            <div class="clearfix"></div>

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