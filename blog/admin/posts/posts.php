<?php 
require_once '../../../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';
require_once ROOT_PATH.'blog/admin/db/db.php';
$checkArr = array(
    'page_level_code' => 2
);
require_once ROOT_PATH.'blog/admin/account/includes/authViewPage.php';
?>
<!doctype html>
<html lang="en">

    <head>

        <?php include_once ROOT_PATH.'blog/admin/imports/meta.php' ?>
        <?php include_once ROOT_PATH.'blog/admin/imports/css.php' ?>

    </head>

    <body>

        <?php include_once ROOT_PATH.'blog/admin/imports/navbar.php' ?>

        <!-- Content Start -->
        <section>
            <div class="container">

                <div class="heading text-center">
                    <h2>Posts</h2>
                </div>
            
                <div class="title">
                    <a href="<?php echo URL ?>blog/admin/posts/create.php" class="btn btn-primary">Create Post</a>
                    <br>&nbsp;
                </div>

                <div class="col-12">
                    <!---contentes ------>
                        <!-- Data tables -->
                        <table class="table dataTable" 
                                id="datatableGeneralOne" 
                                data-url="<?php echo URL ?>blog/admin/posts/ajax/posts.php">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Heading</th>
                                    <th id="sort">Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                        <!-- ./Data Tables -->

                </div>

            </div>
        </section>
        <!-- Content End -->

        <button onclick="dataTableGeneral()" class="hide" id="clickhereForDataTable"></button>

        <?php require_once ROOT_PATH.'blog/admin/imports/footer.php' ?>
        <?php require_once ROOT_PATH.'blog/admin/imports/js.php' ?>

        <script>
            // Call datatales
            dataTableGeneral();
        </script>

    </body>
</html>