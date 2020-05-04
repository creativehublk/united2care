
<?php  
$post_images_array = array();

$select_images = mysqli_query($localhost, "SELECT * FROM `blog_post_attachments` WHERE `post_id` = '$post_id' ");
if(mysqli_num_rows($select_images) > 0){

    while($fetch_images = mysqli_fetch_array($select_images)){
        array_push($post_images_array, array(
            'image' => URL.'blog/admin/uploads/news_events/thumb/'.$fetch_images['image'],
            'id' => $fetch_images['id'],
        ));
    }
}


// Existing Cover Img

if(file_exists(ROOT_PATH."blog/admin/uploads/news_events/cover/".$fetch_post['cover']) && ( strlen(trim($fetch_post['cover'])) > 0 ) ){
    $existingCover = URL."blog/admin/uploads/news_events/cover/".$fetch_post['cover'];
    $img_exist = 'img_exist';
}else{
    $existingCover = 0;
    $img_exist = '';
}

?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            

                <div class="row">

                    <div class="col-lg-12 cover_img_box <?php echo $img_exist ?>">

                        <div class="form-group text-center cover_img_div">

                            <form class="forms-sample" 
                                data-action-after=3 
                                data-redirect-url = "pills-meta-tab" 
                                method="POST" 
                                id="cover_images_form"
                                action="<?php echo URL ?>blog/admin/posts/ajax/controller/updatePostController.php">

                                <label class="file-upload-browse btn btn-info" for="cover_img_upload"> Upload Cover Image</label>                            
                                <h3><b>1500 x 500</b> </h3>
                                <input type="file" name="cover_img" class="file-upload-default hide" id="cover_img_upload">

                                <input type="hidden" name="update_post_cover" value="<?php echo $post_id ?>">

                            </form>

                        </div>


                        <?php if($existingCover !== 0){ ?>

                            <img src="<?php echo $existingCover ?>" class="cover_img w-100" alt="">
                        <?php } ?>


                    </div>

                    <div class="col-lg-12 thumb_img_box">

                        <div class="row append_info_clone_here">

                            <?php  
                            foreach ($post_images_array as $key => $images) {  ?>
                            
                                <div class="col-4 img_single_box clone_this_info">
                                    <img src="<?php echo $images['image'] ?>" alt="">
                                    <div class="fix-box" data-id="<?php echo $images['id'] ?>">
                                        <button class="btn btn-sm btn-danger" onclick="deleteImage(this)" type="button"> <i class="fa fa-trash"></i> </button>
                                    </div>
                                </div>

                            <?php } ?>

                            <div class="col-4 img_single_box uploadBox">
                            
                                <form class="forms-sample" 
                                        data-action-after=0 
                                        data-redirect-url = "pills-upgrade-tab" 
                                        method="POST" 
                                        id="package_images_form"
                                        action="<?php echo URL ?>blog/admin/posts/ajax/controller/updatePostController.php">

                                    <div class="form-group text-center">
                                        <label class="file-upload-browse btn btn-info img_preview_label" for="pack_img_upload"> Upload Package Image</label>
                                        <p>Resolution</p>
                                        <h3><b>400 x 400</b> </h3>
                                        <input type="file" name="thumb_img" class="file-upload-default hide" id="pack_img_upload">
                                    </div>

                                    <input type="hidden" name="update_post_thumb" value="<?php echo $post_id ?>">

                                </form>

                            </div>

                        </div>

                    </div>
                    
                </div>

        </div>
    </div>
</div>