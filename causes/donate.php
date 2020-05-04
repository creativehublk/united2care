<?php include_once '../app/global/url.php' ?>
<?php include_once ROOT_PATH.'/app/global/sessions.php' ?>
<?php include_once ROOT_PATH.'/app/global/Gvariables.php' ?>
<?php include_once ROOT_PATH.'/db/db.php' ?>

<?php 
$cause_id = 0;
if(isset($_GET['q'])){
    if(is_numeric($_GET['q'])){
        $cause_id = $_GET['q'];
    }
} 

$select_post = mysqli_query($localhost, "SELECT * FROM `causes` WHERE `id` = '$cause_id' ");
$fetch_post = mysqli_fetch_array($select_post);

$post_title = $fetch_post['name'];

$img_arr = array();
$select_images = mysqli_query($con,"SELECT * FROM `causes_images` WHERE `cause_id`='$cause_id' ");
while($fetch_images = mysqli_fetch_array($select_images)){
    
    if(file_exists(ROOT_PATH.'admin/uploads/causes/'.$fetch_images['name'])){ 
        $temp_img = URL.'admin/uploads/causes/'.$fetch_images['name'];
        array_push($img_arr, $temp_img);
    }
    
}

$view_imgArr = $img_arr;

if(count($img_arr) == 0){
    array_push($img_arr, 'https://via.placeholder.com/200x250/d3d3d3/FFFFFF/?text=United2Care');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once ROOT_PATH.'app/meta/google-tag-head.php' ?>

    <!-- Meta -->
    <?php include_once ROOT_PATH.'app/meta/meta.php' ?>
    <!-- Meta -->
    <?php #endregion

    $meta_single_page_title = 'Donate Now | '.$post_title.' | UNITED 2 CARE';
    $meta_single_page_desc = $fetch_post['description'].' | In this time of crisis when our community is under threat of the Corona Virus (COVID-19), hand sanitizers and masks are a basic need for everyone, and we believe that they should not be sold at a premium.';
    $meta_single_page_image = $img_arr[0];

    $meta_arr = array(
        'title' => $meta_single_page_title,
        'description' => $meta_single_page_desc,
        'image' => $meta_single_page_image,

        'og:title' => $meta_single_page_title,
        'og:image' => $meta_single_page_image,
        'og:description' => $meta_single_page_desc,

        'twitter:image' => $meta_single_page_image,
        'twitter:title' => $meta_single_page_title,

        'itemscope:image' => $meta_single_page_image,
        'itemscope:title' => $meta_single_page_title

    ); ?>
    <?php include_once ROOT_PATH.'app/meta/meta_more_details.php' ?>
    

    <!-- CSS -->
    <?php include_once ROOT_PATH.'imports/css.php' ?>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
</head>

<body>
    <?php include_once ROOT_PATH.'app/meta/google-tag-body.php' ?>

    <!-- start page-wrapper -->
    <div class="page-wrapper">
        
        <!-- start preloader -->
        <?php include_once ROOT_PATH.'imports/preload.php' ?>
        <!-- end preloader -->

        <!-- Start header -->
        <?php include_once ROOT_PATH.'imports/header.php' ?>
        <!-- end of header -->


        <div class="wpo-donation-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="wpo-donate-header text-center">
                            <h2>Make a Donation</h2>
                            <h1><?php echo $post_title ?></h1>

                            <?php if(count($view_imgArr) > 0){ ?>
                            <div class="img-box">
                                <?php foreach ($view_imgArr as $key => $caus_imgs) {
                                    ?>
                                    <div>
                                        <img src="<?php echo $caus_imgs ?>" alt="<?php echo $post_title ?>">
                                    </div>
                                    <?php
                                } ?>
                            </div>
                            <?php } ?>

                        </div>
                        <div id="Donations" class="tab-pane">
                            <form action="<?php echo URL ?>account/payment_processing.php" method="POST">
                                
                                <div class="row">
                                    <div class="wpo-donations-amount col-lg-6 col-lg-offset-3 col-xs-12 text-center donation_amount">
                                        <h2>Your Donation</h2>
                                        <input type="number" class="form-control" min="1000" required name="amount" id="text" placeholder="Enter Donation Amount">
                                        <p>Minimum 1000 LKR.</p>
                                    </div>
                                </div>

                                <div class="wpo-donations-details">
                                    <h2>Details</h2>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                            <input type="text" class="form-control" name="first_name" required id="fname" placeholder="First Name">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                            <input type="text" class="form-control" name="last_name" required id="name" placeholder="Last Name">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group clearfix">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                            <input type="text" class="form-control" name="phone" id="Phone" placeholder="Phone">
                                        </div>
                                        <div class="col-lg-12 col-12 form-group">
                                            <textarea class="form-control" name="note" id="note" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="wpo-doanation-payment">
                                    <h2>Choose Your Payment Method</h2>
                                    <div class="wpo-payment-area">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="wpo-payment-option" id="open4">
                                                    
                                                    <div class="wpo-payment-select">
                                                        <ul>
                                                            
                                                            <li class="addToggle">
                                                                <input id="add" type="radio" required checked="checked" name="payment" value="30">
                                                                <label for="add">Payment By Card</label>
                                                            </li>

                                                            <li class="removeToggle">
                                                                <input id="remove" type="radio" data-toggle="modal" data-target="#bank_depositeModal" required name="payment" value="30">
                                                                <label for="remove">Bank Deposite</label>
                                                            </li>

                                                        </ul>
                                                    </div>

                                                    <div id="open5" class="payment-name">
                                                        <ul>
                                                            <li class="visa"><img src="<?php echo URL ?>assets/images/icons/1.jpg" alt=""> </li>
                                                            <li class="visa"><img src="<?php echo URL ?>assets/images/icons/2.jpg" alt=""> </li>
                                                            <li class="visa"><img src="<?php echo URL ?>assets/images/icons/payhere.png" alt=""> </li>
                                                        </ul>

                                                        <div class="submit-area">
                                                            <button type="submit" class="theme-btn submit-btn">Donate Now</button>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="cause_id" value="<?php echo $cause_id ?>">

                                <input type="hidden" name="donation_amount">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include_once ROOT_PATH.'modals/bankDepositeModal.php' ?>

        <?php include_once ROOT_PATH.'imports/footer.php' ?>
        
    </div>


    <!-- end of page-wrapper -->
    <!-- All JavaScript files
    ================================================== -->
    <?php include_once ROOT_PATH.'imports/js.php' ?>

</body>

</html>