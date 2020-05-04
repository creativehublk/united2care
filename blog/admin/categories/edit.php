<?php 
require_once '../../../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';
require_once ROOT_PATH.'blog/admin/db/db.php';
$checkArr = array(
    'page_level_code' => 2
);
require_once ROOT_PATH.'blog/admin/account/includes/authViewPage.php';


$category_id = 0;
if(isset($_GET['id'])){
    $category_id = mysqli_real_escape_string($localhost, trim($_GET['id']));
}

$select = mysqli_query($localhost, "SELECT * FROM `blog_categories` WHERE `id` = '$category_id' ");
$fetch = mysqli_fetch_array($select);

?>
<!doctype html>
<html lang="en">

    <head>
        <?php require_once ROOT_PATH.'blog/admin/imports/meta.php' ?>
        <?php require_once ROOT_PATH.'blog/admin/imports/css.php' ?>
    </head>

    
    <body>

        <?php include_once ROOT_PATH.'blog/admin/imports/navbar.php' ?>

        <section class="container-warp min-vieport-height center_con">
            <div class="container">
            
                <div class="col-12">
                    <div class="heading text-center">
                        <h2>Edit Category</h2>
                    </div>
                </div>

                <div class="col-6 offset-3">
                    <form
                        class="form"
                        data-action-after=2
                        data-redirect-url="<?php echo URL ?>blog/admin/categories/categories.php"
                        method="POST"
                        action="<?php echo URL ?>blog/admin/categories/ajax/controller/categoryHandler.php">
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Category Name</label>
                                <input type="text" class="form-control" name="category_name" value="<?php echo $fetch['name'] ?>" placeholder="Category Name">
                            </div>

                            <div class="col-12 form-group">
                                <input type="hidden" name="update_category" value="<?php echo $category_id ?>">
                                <button type="submit" class="btn btn-outline-success float-right submit_form_no_confirm" 
                                        data-notify_type=2 
                                        data-validate=0 > <i class="fas fa-paper-plane"></i> Update</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </section>

        <?php require_once ROOT_PATH.'blog/admin/imports/footer.php' ?> 
        <?php require_once ROOT_PATH.'blog/admin/imports/js.php' ?> 
    </body>
</html>
