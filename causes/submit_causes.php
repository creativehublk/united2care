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
    $meta_single_page_title = 'Submit Cause | UNITED 2 CARE';
    $meta_single_page_desc = 'Submit Cause | In this time of crisis when our community is under threat of the Corona Virus (COVID-19), hand sanitizers and masks are a basic need for everyone, and we believe that they should not be sold at a premium.';
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
                            <h2>Tell your causes</h2>
                            <ul>
                                <li><a href="<?php echo URL?>">Home</a></li>
                                <li><span>Submit Cause</span></li>
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
                                    

                                <form class="forms-sample" id="create_lead_form_info"
                                        data-action-after=0
                                        data-redirect-url="<?php echo URL ?>"
                                        method="POST"
                                        action="<?php echo URL ?>mail/unitedMail.php">

                                        <div class="form-group">
                                            <input type="text" class="form-control" id="cause" name="cause" placeholder="Cause Name *" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter Name *" required>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter  Email *" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="phone" name="phone" aria-describedby="emailHelp" placeholder="Enter Phone No *" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <textarea style="width:100%"  class="form-control" id="message" name="message"  placeholder="Enter Your Message"></textarea>
                                        </div>

                                        <div class="img_upload">
                                            
                                            <div class="img_upload_single ">
                                                <img src="<?php echo URL ?>assets/images/united/check.png" class="img_preview" alt="">
                                                <a class="delete_btn" onclick="removeRow(this)"> <i class="fa fa-trash-o"></i> </a>
                                                
                                                <label for="img_upload_label" class="img_upload_label"> <i class="fa fa-image"></i> </label>
                                                <input type="file" name="causes_img[]" class="img_upload_input" onchange="showPreviewPic(this)" id="img_upload_label">
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <input type="hidden" name="submit_cause" class="disableOnSubmit">
                                                <button type="button" class="btn theme-btn submit_form_no_confirm disableOnSubmit" name="community_id">Submit</button>
                                            </div>

                                            <div class="col-12 message">
                                                <p></p>
                                            </div>

                                        </div>

                                    
                                    </form>

                                </div> 
                            </div>
                            
                        </div>
                    </div>

                    <!-- Right Side Menu -->
                    <div class="col-xs-12 col-md-4">
                        <?php include_once ROOT_PATH.'causes/includes/right_side.php' ?>
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