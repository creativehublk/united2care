<?php 
$select_comments = mysqli_query($localhost, "SELECT * FROM `ad_post_comments` WHERE `ad_post_id` = '$post_id' ORDER BY `id` DESC ");


$commentsArray = array();
$commentContainer = file_get_contents(ROOT_PATH.'posts/container/comment.html');
while($fetch_comments = mysqli_fetch_array($select_comments)){

    $tempCommentContainer = $commentContainer;
    $tempCommentContainer = str_replace("{ NAME }", $fetch_comments['name'], $tempCommentContainer);
    $tempCommentContainer = str_replace("{ DATE }", Date("d M Y, h:i a", strtotime($fetch_comments['created'])), $tempCommentContainer);
    $tempCommentContainer = str_replace("{ COMMENT }", $fetch_comments['comment'], $tempCommentContainer);

    array_push($commentsArray, $tempCommentContainer);

}

?>

<div class="wpo-blog-single-section">
    <div class="comments-area">
        <div class="comments-section">
            <h3 class="comments-title">Comments</h3>

            <ol class="comments" id="comment_box">
                <!-- Comment Area -->
                <?php foreach ($commentsArray as $key => $comment) {
                    echo $comment;
                } ?>

            </ol>

            <?php if(count($commentsArray) == 0){
                echo '<p> Why not be the first to comment? </p>';
            } ?>
            

        </div> <!-- end comments-section -->
    </div> <!-- end comments-area -->

    <div class="comment-respond">
        <h3 class="comment-reply-title">Leave a Comment</h3>

        <form class="forms-sample" id="create_product_form"
            data-action-after=0
            data-redirect-url="<?php echo URL ?>admin/posts/images.php"
            method="POST"
            action="<?php echo URL ?>posts/ajax/commentHandlerController.php">

            <div class="form-inputs">
                <input placeholder="Name *" type="text" name="name">
            </div>
            <div class="form-textarea">
                <textarea placeholder="Write Your Comments..." name="comment"></textarea>
            </div>

            <div class="col-lg-12">
                <div class="g-recaptcha" data-sitekey="6Lfv3-UUAAAAAJWM0rVYu_DeTyA0oI7tcQB0gCTw"></div>
                <br>
            </div>

            <div class="form-submit">
                <input type="hidden" name="ad_post_id" value="<?php echo $post_id ?>">
                <input type="hidden" name="post_comment">
                <input id="submit" value="Submit" class="submit_formcomment" type="submit">
            </div>

            <div class="message">
                <p></p>
            </div>

        </form>
    </div>

</div>