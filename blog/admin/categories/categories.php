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
        <?php require_once ROOT_PATH.'blog/admin/imports/meta.php' ?>
        <?php require_once ROOT_PATH.'blog/admin/imports/css.php' ?>
    </head>

    
    <body>

        <?php include_once ROOT_PATH.'blog/admin/imports/navbar.php' ?>

        <section>
            <div class="container">

                <div class="heading text-center">
                    <h2>Categories</h2>
                </div>
            
                <div class="title">
                    <a href="<?php echo URL ?>blog/admin/categories/create.php" class="btn btn-primary">Create Category</a>
                    <br>&nbsp;
                </div>

                <div class="col-12">
                    <!---contentes ------>
                        <!-- Data tables -->
                        <table class="table dataTable" 
                                id="datatableGeneralOne" 
                                data-url="<?php echo URL ?>blog/admin/categories/ajax/categories.php">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th id="sort">Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                        <!-- ./Data Tables -->

                </div>

            </div>
        </section>

        <button onclick="dataTableGeneral()" class="hide" id="clickhereForDataTable"></button>

        <?php require_once ROOT_PATH.'blog/admin/imports/footer.php' ?> 
        <?php require_once ROOT_PATH.'blog/admin/imports/js.php' ?> 

        <script>
            // Call datatales
            dataTableGeneral();
        </script>

    </body>
</html>
