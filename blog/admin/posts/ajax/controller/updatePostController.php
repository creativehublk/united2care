<?php
require_once '../../../../../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';
require_once ROOT_PATH.'blog/admin/db/db.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    require_once ROOT_PATH.'blog/admin/assets/lib/imageUploads.php';


    if(isset($_POST['update_post'])){

        
        $result = 0;
        $message = "Please fill the fields";
        $redirectURL = '';

        $post_id = trim($_POST['update_post']);

        $heading = trim($_POST['heading']);
        $category = $_POST['category'];
        $tag_array = $_POST['tag'];
        $post_date = Date("Y-m-d", strtotime($_POST['post_date']));

        $content = $_POST['content'];

        if(strlen($heading) > 0){

            $insertData = array(
                'heading' => $heading,
                'post_date' => $post_date,
                'category' => $category,
                'cover' => 0,
                'hide' => 0,
                'exclusive' => 0,
            );
    
            $DBresult = $dbOpertionsObj->updateData('blog_posts', $insertData, array('id' => $post_id));
    
            if($DBresult['result'] == 1){

                // Create Content and tags
                $content = str_replace("col", "", $content);
                $content = str_replace("class=", "", $content);
                $content = str_replace("id=", "", $content);

                $DBResult = $dbOpertionsObj->deleteBYId('blog_post_contents', array('post_id' => $post_id));
                $insertData = array(
                    'post_id' => $post_id,
                    'content' => $content
                );
                $DBresult = $dbOpertionsObj->insertData('blog_post_contents', $insertData);

                // Tag
                $DBResult = $dbOpertionsObj->deleteBYId('blog_post_tags', array('post_id' => $post_id));
                if(count($tag_array) > 0){

                    foreach ($tag_array as $key => $tag_id) {
                        $insertData = array(
                            'post_id' => $post_id,
                            'tag_id' => $tag_id
                        );
                        $DBresult = $dbOpertionsObj->insertData('blog_post_tags', $insertData);                        
                    }

                }

                $result = 1;
                $message = "Post has been updated successfully";
                $redirectURL = URL.'blog/admin/posts/update.php?id='.$post_id.'&tab=images';
            }
        }else{
            $message = "Please write someting";
        }

        echo json_encode(array('result' => $result, 'message'=>$message, 'redirectURL' => $redirectURL));

    } //update_post'


    if(isset($_POST['update_post_thumb'])){

        $post_id = $_POST['update_post_thumb'];

        $result = 0;
        $message = "Please fill the required fields";
        $imageBox = 0;


        // Cover Image
        if(isset($_FILES['thumb_img']['name']) ){

            $error_image = 0;

            // Img Upload
            $uploadedImage = $_FILES['thumb_img'];
            $path = ROOT_PATH."blog/admin/uploads/news_events/thumb/";

            if(strlen($uploadedImage['name']) ) {

                $newWidth = 400;
                //$newHeight = 100; //Optional ---> If need fixed size
                $pass_parm = storeUploadedImage($path, $uploadedImage, $newWidth);
                if($pass_parm['error'] == 0){

                    $file_name = $pass_parm['filename'];
                    $error_image = 0;

                    // Insert Sub Cat Images
                    $DBResult = $dbOpertionsObj->insertData('blog_post_attachments', array(
                        'post_id' => $post_id,
                        'alt' => $file_name,
                        'image' => $file_name
                    ));

                    if($DBResult['result'] == 1){
                        $result = 1;
                        $message = "Upload Done";

                        $imageURL = URL.'blog/admin/uploads/news_events/thumb/'.$file_name;

                        $imageBox = file_get_contents(ROOT_PATH.'blog/admin/posts/container/pack_img_single_container.html');
                        $imageBox = str_replace("{{ IMAGE_URL }}", $imageURL, $imageBox);
                        $imageBox = str_replace("{{ IMAGE_ID }}", $DBResult['inserted_id'], $imageBox);

                        $select = mysqli_query($localhost, "SELECT `heading` FROM `blog_posts` WHERE `id` = '$post_id' ");
                        $fetch = mysqli_fetch_array($select);


                    }

                }else{
                    $error_image = 1;
                    $message = $pass_parm['message'];
                    $cover_image_message = $message;
                }

            }

        }// if end for check strlen


        echo json_encode(array("result"=>$result,"message"=>$message, 'image_box' => $imageBox));


    } // update_post_thumb


    if(isset($_POST['update_post_cover'])){

        $post_id = $_POST['update_post_cover'];

        $result = 0;
        $message = "Please fill the required fields";
        $imageBox = 0;


        // Cover Image
        if(isset($_FILES['cover_img']['name']) ){

            $error_image = 0;

            // Img Upload
            $uploadedImage = $_FILES['cover_img'];
            $path = ROOT_PATH."blog/admin/uploads/news_events/cover/";

            if(strlen($uploadedImage['name']) ) {

                $newWidth = 1500;
                //$newHeight = 100; //Optional ---> If need fixed size
                $pass_parm = storeUploadedImage($path, $uploadedImage, $newWidth);

                if($pass_parm['error'] == 0){

                    $file_name = $pass_parm['filename'];
                    $error_image = 0;

                    $select = mysqli_query($localhost, "SELECT `heading`,`cover` FROM `blog_posts` WHERE `id` = '$post_id' ");
                    $fetch = mysqli_fetch_array($select);
                    if(strlen($fetch['cover']) > 0){
                        $old_img = ROOT_PATH."blog/admin/uploads/news_events/cover/".$fetch['cover'];
                        $dbOpertionsObj->deleteImage($old_img);
                    }

                    // Insert Sub Cat Images
                    $DBResult = $dbOpertionsObj->updateData('blog_posts', array('cover' => $file_name), array('id' => $post_id));

                    if($DBResult['result'] == 1){
                        $result = 1;
                        $message = "Upload Done";

                        $imageURL = URL.'blog/admin/uploads/news_events/cover/'.$file_name;

                        $imageBox = file_get_contents(ROOT_PATH.'blog/admin/posts/container/pack_cover_img.html');
                        $imageBox = str_replace("{{ IMAGE_URL }}", $imageURL, $imageBox);

                    }

                }else{
                    $error_image = 1;
                    $message = $pass_parm['message'];
                    $cover_image_message = $message;
                }

            }

        }// if end for check strlen


        echo json_encode(array("result"=>$result,"message"=>$message, 'image_box' => $imageBox));

    } //update_post_cover
    

    if(isset($_POST['update_meta'])){

        $result = 0;
        $message = "Please fill the required fields";

        $post_id = trim($_POST['update_meta']);

        $page_title = $_POST['page_title'];
        $description = $_POST['description'];
        $dataUpdate = array(
            'post_id' => $post_id,
            'title' => $page_title,
            'description' => $description,
            'type' => ''
        );

        $select = mysqli_query($localhost, "SELECT `post_id`, `image` FROM `blog_meta` WHERE `post_id` = '$post_id' ");
        $fetch = mysqli_fetch_array($select);
        $old_img = $fetch['image'];
        if(strlen($old_img) > 0){
            $old_img = ROOT_PATH."blog/admin/uploads/news_events/social/".$fetch['image'];
            $dbOpertionsObj->deleteImage($old_img);
        }

        if(isset($_FILES['social_thumbnail']['name']) ){

            // Img Upload
            $uploadedImage = $_FILES['social_thumbnail'];
            $path = ROOT_PATH."blog/admin/uploads/news_events/social/";

            if(strlen($uploadedImage['name']) ) {

                $newWidth = 1500;
                //$newHeight = 100; //Optional ---> If need fixed size
                $pass_parm = storeUploadedImage($path, $uploadedImage, $newWidth);

                if($pass_parm['error'] == 0){

                    $file_name = $pass_parm['filename'];
                    $dataUpdate['image'] = $file_name;

                }else{
                    $message = "Please upload valid image";
                    echo json_encode(array("result"=>$result,"message"=>$message));
                    Exit(0);
                }

            }

        }// if end for check strlen


        if(mysqli_num_rows($select) > 0){
            $DBResult = $dbOpertionsObj->updateData('blog_meta', $dataUpdate, array('post_id' => $post_id));
        }else{
            $DBResult = $dbOpertionsObj->insertData('blog_meta', $dataUpdate);
        }

        if($DBResult['result'] == 1){
            $result = 1;
            $message = "Meta Details has been updated";
        }


        echo json_encode(array("result"=>$result,"message"=>$message));

    } //update_meta


}// Post Method

?>