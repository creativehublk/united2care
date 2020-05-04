
<?php 
$selected_tag_id_array = array();
$selected_tag = mysqli_query($localhost, "SELECT * FROM `blog_post_tags` WHERE `post_id` = '$post_id' ");
while($fetch_selected_tag = mysqli_fetch_array($selected_tag)){

    array_push($selected_tag_id_array, $fetch_selected_tag['tag_id']);
}


$select_content = mysqli_query($localhost, "SELECT * FROM `blog_post_contents` WHERE `post_id` = '$post_id' ");
$fetch_content = mysqli_fetch_array($select_content);
$contents = $fetch_content['content'];

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
<div class="col-12">
    <form
        class="form"
        data-action-after=2
        data-redirect-url="pills-images-tab"
        method="POST"
        action="<?php echo URL ?>blog/admin/posts/ajax/controller/updatePostController.php">
        <div class="row">

            <div class="form-group col-12">
                <label>Heading</label>
                <input type="text" class="form-control" value="<?php echo $fetch_post['heading'] ?>" name="heading" placeholder="Post Heading">
            </div>

            <div class="form-group col-4">
                <label for="">Categories</label>
                <select name="category" class="form-control custom-select select2"  required="">
                    
                    <?php 
                    foreach ($category_arr as $key => $value) { ?>

                        <option value="<?php echo $value['id'] ?>" <?php echo comboboxSelected($value['id'], $fetch_post['category']) ?>> <?php echo $value['name'] ?> </option>

                    <?php } ?>

                </select>
            </div>

            <div class="form-group col-4">
                <label for="">Tags</label>
                <select name="tag[]" class="form-control custom-select select2" multiple="multiple" required="">
                    
                    <?php 
                    foreach ($tag_arr as $key => $value) { ?>

                        <option value="<?php echo $value['id'] ?>" <?php echo comboboxDataArray($value['id'], $selected_tag_id_array) ?>> <?php echo $value['name'] ?> </option>

                    <?php } ?>

                </select>
            </div>

            <div class="form-group col-4">
                <label for="">Post Date</label>
                <input type="text" class="form-control datepicker" value="<?php echo Date("d-m-Y", strtotime($fetch_post['post_date'])) ?>" name="post_date" placeholder="Post date"  required="">
            </div>

            <div class="col-12 form-group">
                <label for="">Content</label>
                <textarea name="content" cols="30" rows="10" class="form-control tinyMceEditor"  required=""><?php echo $contents ?></textarea>
            </div>

            <div class="col-12 form-group">
                <input type="hidden" name="update_post" value="<?php echo $post_id ?>">
                <button type="submit" class="btn btn-outline-success float-right submit_form_no_confirm" 
                        data-notify_type=2 
                        data-validate=0 > <i class="fas fa-paper-plane"></i> Update</button>
            </div>

        </div>
    </form>
</div>