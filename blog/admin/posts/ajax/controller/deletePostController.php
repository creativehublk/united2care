<?php
require_once '../../../../../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';
require_once ROOT_PATH.'blog/admin/db/db.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){


    // Delete Pack Image
    if(isset($_POST['deletePackThumb'])){

        $result = 0;
        $message = "Please fill the required fields";
        
        $imageId = trim($_POST['imageId']);

        $select = mysqli_query($localhost, "SELECT `image` FROM `blog_post_attachments` WHERE `id` = '$imageId' ");
        if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_array($select);

            if(strlen(trim($fetch['image'])) > 0 ){
                $image_name = ROOT_PATH.'blog/admin/uploads/news_events/thumb/'.$fetch['image'];
                $dbOpertionsObj->deleteImage($image_name);
            }

            $DBResult = $dbOpertionsObj->deleteBYId('blog_post_attachments', array('id' => $imageId) );

            if($DBResult['result'] == 1){
                $result = 1;
                $message = "image has been removed";
            }
        }


        echo json_encode(array("result"=>$result,"message"=>$message));

    } // deletePackThumb


    if(isset($_POST['delete'])){

        if($_POST['delete'] == "delete_post"){

            $result = 0;
            $message = "Failed to delete the post";

            $post_id = $_POST['id'];

            // Delete Images
            $select = mysqli_query($localhost, "SELECT `image` FROM `blog_post_attachments` WHERE `post_id` = '$post_id' ");
            if(mysqli_num_rows($select) > 0){
                while($fetch = mysqli_fetch_array($select)){

                    if(strlen(trim($fetch['image'])) > 0 ){
                        $image_name = ROOT_PATH.'blog/admin/uploads/news_events/thumb/'.$fetch['image'];
                        $dbOpertionsObj->deleteImage($image_name);
                    }
                }
                

                // $dbOpertionsObj->deleteBYId('blog_post_attachments', array('id' => $imageId) );

            }

            // Delete Cover
            $select = mysqli_query($localhost, "SELECT `cover` FROM `blog_posts` WHERE `id` = '$post_id' ");
            $fetch = mysqli_fetch_array($select);
            if(strlen($fetch['cover']) > 0){
                $old_img = ROOT_PATH."blog/admin/uploads/news_events/cover/".$fetch['cover'];
                $dbOpertionsObj->deleteImage($old_img);
            }


            // Delete Meta Image
            $select = mysqli_query($localhost, "SELECT  `image` FROM `blog_meta` WHERE `post_id` = '$post_id' ");
            $fetch = mysqli_fetch_array($select);
            $old_img = $fetch['image'];
            if(strlen($old_img) > 0){
                $old_img = ROOT_PATH."blog/admin/uploads/news_events/social/".$fetch['image'];
                $dbOpertionsObj->deleteImage($old_img);
            }


            $whereArr = array('id' => $post_id);
            $DBResult = $dbOpertionsObj->deleteBYId('blog_posts', $whereArr);

            if($DBResult['result'] == 1){
                $result = 1;
                $message = "Post has been deleted successfully";
            }

            echo json_encode(array('result' => $result, 'message'=>$message));

        }

    } // delete_cat

    
}// Post Method

?>