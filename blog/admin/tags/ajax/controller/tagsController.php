<?php
require_once '../../../../../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';
require_once ROOT_PATH.'blog/admin/db/db.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(isset($_POST['create_tags'])){
        
        $result = 0;
        $message = "Please fill the field";

        $tag_name = trim($_POST['tag_name']);

        if(strlen($tag_name) > 0){

            $insertData = array(
                'name' => $tag_name,
            );
    
            $DBresult = $dbOpertionsObj->insertData('blog_tags', $insertData);
    
            if($DBresult['result'] == 1){
                $result = 1;
                $message = "New tag has been created successfully";
            }
        }else{
            $message = "Please write someting";
        }

        echo json_encode(array('result' => $result, 'message'=>$message));

    } //create_tags


    if(isset($_POST['update_tag'])){
        
        $result = 0;
        $message = "Please fill the field";

        $category_name = trim($_POST['tag_name']);

        if(strlen($category_name) > 0){

            $id = trim($_POST['update_tag']);

            $updateData = array(
                'name' => $category_name,
            );
    
            $DBresult = $dbOpertionsObj->updateData('blog_tags', $updateData, array('id' => $id));
    
            if($DBresult['result'] == 1){
                $result = 1;
                $message = "Tag has been updated successfully";
            }
        }else{
            $message = "Please write someting";
        }

        echo json_encode(array('result' => $result, 'message'=>$message));

    } //update_tag
    


    if(isset($_POST['delete'])){

        if($_POST['delete'] == "delete_tag"){

            $result = 0;
            $message = "Failed to delete the tag";

            $id = $_POST['id'];

            $whereArr = array('id' => $id);
            $DBResult = $dbOpertionsObj->deleteBYId('blog_tags', $whereArr);

            if($DBResult['result'] == 1){
                $result = 1;
                $message = "Tag has been deleted successfully";
            }

            echo json_encode(array('result' => $result, 'message'=>$message));

        }

    } // delete_tag

    
}// Post Method

?>