<?php 
require_once '../../../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';
require_once ROOT_PATH.'blog/admin/db/db.php';
$checkArr = array(
    'page_level_code' => 2
);
require_once ROOT_PATH.'blog/admin/account/includes/authViewPage.php';

$tag_id = 0;
if(isset($_GET['id'])){
    $tag_id = mysqli_real_escape_string($localhost, trim($_GET['id']));
}

$select = mysqli_query($localhost, "SELECT * FROM `blog_tags` WHERE `id` = '$tag_id' ");
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
                        <h2>Edit Tags</h2>
                    </div>
                </div>

                <div class="col-6 offset-3">
                    <form
                        class="form"
                        data-action-after=2
                        data-redirect-url="<?php echo URL ?>blog/admin/tags/tags.php"
                        method="POST"
                        action="<?php echo URL ?>blog/admin/tags/ajax/controller/tagsController.php">
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Tag Name</label>
                                <input type="text" class="form-control" name="tag_name" value="<?php echo $fetch['name'] ?>" placeholder="Tag name">
                            </div>

                            <div class="col-12 form-group">
                                <input type="hidden" name="update_tag" value="<?php echo $tag_id ?>">
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
