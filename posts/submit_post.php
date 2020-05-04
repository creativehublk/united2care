<?php include_once '../app/global/url.php' ?>
<?php include_once ROOT_PATH.'/app/global/sessions.php' ?>
<?php include_once ROOT_PATH.'/app/global/Gvariables.php' ?>
<?php include_once ROOT_PATH.'/db/db.php' ?>

<?php 
$search_keyword_view = '';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once ROOT_PATH.'app/meta/google-tag-head.php' ?>

    <!-- Meta -->
    <?php include_once ROOT_PATH.'app/meta/meta.php' ?>
    <!-- Meta -->
    <?php #endregion
    $meta_single_page_title = 'Submit Post | UNITED 2 CARE';
    $meta_single_page_desc = 'Submit Post | In this time of crisis when our community is under threat of the Corona Virus (COVID-19), hand sanitizers and masks are a basic need for everyone, and we believe that they should not be sold at a premium.';
    $meta_arr = array(
        'title' => $meta_single_page_title,
        'description' => $meta_single_page_desc,
        'image' => URL.'assets/images/meta/index/web_img.png',
        
        'og:title' => $meta_single_page_title,
        'og:image' => URL.'assets/images/meta/index/og.jpg',
        'og:description' => $meta_single_page_desc,

        'twitter:image' => URL.'assets/images/meta/index/twitter.jpg',
        'twitter:title' => $meta_single_page_title,

        'itemscope:image' => URL.'assets/images/meta/index/itemscope.jpg',
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


        <!-- .wpo-breadcumb-area start -->
        <div class="wpo-breadcumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>Submit ur post</h2>
                            <ul>
                                <li><a href="<?php echo URL?>">Home</a></li>
                                <li><span>Submit Post</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .wpo-breadcumb-area end -->

        <!-- wpo-event-details-area start -->
        <div class="wpo-event-details-area section-padding">
            <div class="container">
                <div class="row">

                    <div class="col col-md-8">

                        <div class="wpo-event-item">

                            <div class="event-contact">
                                <div class="wpo-donations-details">
                                    <form method="post" class="contact-validation-active" id="contact-form">
                                        
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 form-group">
                                                <input type="text" class="form-control" name="title" id="name" placeholder="Post Title*">
                                            </div>
                                            
                                            <div class="col-xs-12 col-lg-12 form-group">
                                                <select name="sub_category" id="" class="form-control select2">
                                                    <option value="0" disabled selected>Select Category</option>

                                                    <?php foreach ($sub_categories_array as $key => $value) { ?>

                                                        <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                        
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-xs-12 col-lg-12 form-group">
                                                <label>Select Cities</label>
                                                <select name="cities[]" id="" class="form-control select2" multiple>

                                                <?php  
                                                    $select_city = mysqli_query($localhost, "SELECT c.* FROM `cities` AS c "); 
                                                    while($fetch_cities = mysqli_fetch_array($select_city)){ ?>

                                                        <option value="<?php echo $fetch_cities['id'] ?>"><?php echo $fetch_cities['name'] ?></option>

                                                <?php } // WHile ?>
                                                    
                                                </select>
                                            </div>

                                            <div class="col-lg-12 col-12 form-group">
                                                <textarea class="form-control" name="note"  id="note" placeholder="Massage"></textarea>
                                            </div>

                                            <div class="col-xs-12">
                                                <div class="img_upload">
                                    
                                                    <div class="img_upload_single ">
                                                        <img src="<?php echo URL ?>assets/images/united/check.png" class="img_preview" alt="">
                                                        <a class="delete_btn" onclick="removeRow(this)"> <i class="fa fa-trash-o"></i> </a>
                                                        
                                                        <label for="img_upload_label" class="img_upload_label"> <i class="fa fa-image"></i> </label>
                                                        <input type="file" name="causes_img[]" class="img_upload_input" onchange="showPreviewPic(this)" id="img_upload_label">
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="g-recaptcha" data-sitekey="6Lfv3-UUAAAAAJWM0rVYu_DeTyA0oI7tcQB0gCTw"></div>
                                            </div>

                                            <div class="submit-area col-lg-12 col-12">
                                                <input type="hidden" name="create_post_from_users">
                                                <button type="submit" class="theme-btn submit-btn">Submit Now</button>
                                                <div id="loader">
                                                    <i class="ti-reload"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="clearfix error-handling-messages">
                                            <div id="success">Thank you</div>
                                            <div id="error"> Error occurred while sending email. Please try again later. </div>
                                        </div>

                                    </form>
                                </div> 
                            </div>
                            
                        </div>
                    </div>

                    <!-- Right Side Menu -->
                    <div class="col-xs-12 col-md-4">
                        <?php include_once ROOT_PATH.'posts/include/right_side.php' ?>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- wpo-event-details-area end -->


        <?php include_once ROOT_PATH.'imports/footer.php' ?>
        
    </div>


    <!-- end of page-wrapper -->
    <!-- All JavaScript files
    ================================================== -->
    <?php include_once ROOT_PATH.'imports/js.php' ?>

</body>

</html>