<?php
require_once '../../../../../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';
require_once ROOT_PATH.'blog/admin/db/db.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(isset($_POST['create_post'])){
        
        $result = 0;
        $message = "Please fill the fields";
        $redirectURL = '';

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
    
            $DBresult = $dbOpertionsObj->insertData('blog_posts', $insertData);
    
            if($DBresult['result'] == 1){

                $post_id = $DBresult['inserted_id'];

                // Create Content and tags
                $content = str_replace("col", "", $content);
                $content = str_replace("class=", "", $content);
                $content = str_replace("id=", "", $content);

                $insertData = array(
                    'post_id' => $post_id,
                    'content' => $content
                );
                $DBresult = $dbOpertionsObj->insertData('blog_post_contents', $insertData);

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
                $message = "New post has been created successfully";
                $redirectURL = URL.'blog/admin/posts/update.php?id='.$post_id.'&tab=images';
            }
        }else{
            $message = "Please write someting";
        }

        echo json_encode(array('result' => $result, 'message'=>$message, 'redirectURL' => $redirectURL));

    } //isset

}// Post Method

?>