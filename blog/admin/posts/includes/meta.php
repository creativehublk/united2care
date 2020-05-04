
<?php  

$page_title = mysqli_real_escape_string($localhost,trim($fetch_post['heading']));

$url = strtolower(trim($page_title));
$url = str_replace(" ","-",$url);
$url = preg_replace('/[^A-Za-z0-9\-]/', '', $url);

$select_meta = mysqli_query($localhost, "SELECT * FROM `blog_meta` WHERE `post_id` = '$post_id' ");
$fetch_meta = mysqli_fetch_array($select_meta);

if(strlen($fetch_meta['title']) > 4){
    $page_title = $fetch_meta['title'];
}


?>

<div class="col-12">

    <form
        class="form"
        data-action-after=2
        data-redirect-url="<?php echo URL ?>blog/admin/posts/posts.php"
        method="POST"
        action="<?php echo URL ?>blog/admin/posts/ajax/controller/updatePostController.php">
        <div class="row">

            <div class="form-group col-12">
                <label>Page Title</label>
                <input type="text" name="page_title" placeholder="Page Title" value="<?php echo $page_title ?>" class="form-control">
            </div>

            <div class="form-group col-12">
                <label>Description</label>
                <textarea name="description" id="description" max-length="300" class="form-control" cols="30" rows="5" placeholder="Description"><?php echo $fetch_meta['description'] ?></textarea>
                <h5 id="desc_length" class="float-right">300</h5>
            </div>
            
            <div class="col-6 img_upload_preview_box">
                <br>
                <h4>Social Thumbnail</h4>

                <div class="col-12 text-center">
                    <img src="<?php echo URL ?>blog/admin/uploads/news_events/social/<?php echo $social_img = $fetch_meta['image']; ?>" alt="" id="social_media_thubmnail_prev" class="hide img-responsive rounded mx-auto d-block img_preview" style="max-width: 50%">
                </div>

                <label for="social_media_thumbnail_input" class="btn btn-primary btn-lg"> <i class="fa fa-upload"></i> </label>
                
                <div class="form-group">
                    <input type="file" name="social_thumbnail" class="hide image_upload" id="social_media_thumbnail_input">
                </div>

            </div>

            <div class="col-12 form-group">
                <input type="hidden" name="update_meta" value="<?php echo $post_id ?>">
                <button type="submit" class="btn btn-outline-success float-right submit_form_no_confirm" 
                        data-notify_type=2 
                        data-validate=0 > <i class="fas fa-paper-plane"></i> Update</button>
            </div>

        </div>
    </form>

</div>
