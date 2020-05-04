<?php require_once '../../../app/global/url.php' ?>
<?php require_once ROOT_PATH.'blog/admin/db/db.php' ?>

<!doctype html>
<html lang="en">

    <head>

        <?php include_once ROOT_PATH.'blog/admin/imports/meta.php' ?>
        <?php include_once ROOT_PATH.'blog/admin/imports/css.php' ?>

    </head>

    <body>


        <!-- Content Start -->
        <section class="container-warp min-vieport-height center_con">
            <div class="container">
                <div class="col-12">
                    <div class="text-center">
                        
                        <form class="form-signin forms-sample" id="sign_in_form"
                                data-action-after=2
                                data-redirect-url="<?php echo URL ?>blog/admin/"
                                method="POST"
                                action="<?php echo URL ?>blog/admin/account/ajax/loginController.php">
                            
                            <img class="mb-4 login_logo" src="<?php echo URL ?>assets/images/logo/united.png" alt="Edulink Internation Campus">
                            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

                            <div class="form-group">
                                <label for="inputEmail" class="sr-only">Username</label>
                                <input type="text" id="inputEmail" class="form-control" name="username" placeholder="Username" autofocus="">
                            </div>
                            
                            <div class="form-group">
                                <label for="inputPassword" class="sr-only">Password</label>
                                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password">
                            </div>
                            
                            <div class="form-group">
                                <input type="hidden" name="blog_login">
                            <button type="button" class="btn btn-lg btn-primary btn-block submit_form_no_confirm" 
                                    data-notify_type=2 
                                    data-validate=0 > Sign in</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content End -->

        <?php require_once ROOT_PATH.'blog/admin/imports/footer.php' ?>
        <?php require_once ROOT_PATH.'blog/admin/imports/js.php' ?>

    </body>

</html>