<?php 
require_once '../../../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';
require_once ROOT_PATH.'blog/admin/db/db.php';
$checkArr = array(
    'page_level_code' => 2
);
require_once ROOT_PATH.'blog/admin/account/includes/authViewPage.php';


$category_arr = array();
$select = mysqli_query($localhost, "SELECT * FROM `blog_categories` ");
while($fetch = mysqli_fetch_array($select)){
    array_push($category_arr, array(
        'id' => $fetch['id'],
        'name' => $fetch['name']
    ));
}

$tag_arr = array();
$select = mysqli_query($localhost, "SELECT * FROM `blog_tags` ");
while($fetch = mysqli_fetch_array($select)){
    array_push($tag_arr, array(
        'id' => $fetch['id'],
        'name' => $fetch['name']
    ));
}
?>
<!doctype html>
<html lang="en">

    <head>
        <?php require_once ROOT_PATH.'blog/admin/imports/meta.php' ?>
        <?php require_once ROOT_PATH.'blog/admin/imports/css.php' ?>
    </head>

    
    <body>

        <?php include_once ROOT_PATH.'blog/admin/imports/navbar.php' ?>

        <section class="container-warp">
            <div class="container">
            
                <div class="col-12">
                    <div class="heading text-center">
                        <h2>Create Post</h2>
                    </div>
                </div>

                <div class="col-12">
                    <form
                        class="form"
                        data-action-after=2
                        data-redirect-url="<?php echo URL ?>blog/admin/posts/posts.php"
                        method="POST"
                        action="<?php echo URL ?>blog/admin/posts/ajax/controller/createPostController.php">
                        <div class="row">

                            <div class="form-group col-12">
                                <label>Heading</label>
                                <input type="text" class="form-control" name="heading" placeholder="Post Heading">
                            </div>

                            <div class="form-group col-4">
                                <label for="">Categories</label>
                                <select name="category" class="form-control custom-select select2">
                                    
                                    <?php 
                                    foreach ($category_arr as $key => $value) { ?>

                                        <option value="<?php echo $value['id'] ?>"> <?php echo $value['name'] ?> </option>

                                    <?php } ?>

                                </select>
                            </div>

                            <div class="form-group col-4">
                                <label for="">Tags</label>
                                <select name="tag[]" class="form-control custom-select select2" multiple="multiple">
                                    
                                    <?php 
                                    foreach ($tag_arr as $key => $value) { ?>

                                        <option value="<?php echo $value['id'] ?>"> <?php echo $value['name'] ?> </option>

                                    <?php } ?>

                                </select>
                            </div>

                            <div class="form-group col-4">
                                <label for="">Post Date</label>
                                <input type="text" class="form-control datepicker" value="<?php echo date("d-m-Y") ?>" name="post_date" placeholder="Post date">
                            </div>

                            <div class="col-12 form-group">
                                <label for="">Content</label>
                                <textarea name="content" cols="30" rows="10" class="form-control tinyMceEditor"></textarea>
                            </div>

                            <div class="col-12 form-group">
                                <input type="hidden" name="create_post">
                                <button type="submit" class="btn btn-outline-success float-right submit_form_no_confirm" 
                                        data-notify_type=2 
                                        data-validate=0 > <i class="fas fa-plus"></i> Create</button>
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
