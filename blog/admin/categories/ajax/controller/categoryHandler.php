<?php
require_once '../../../../../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';
require_once ROOT_PATH.'blog/admin/db/db.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(isset($_POST['create_category'])){
        
        $result = 0;
        $message = "Please fill the field";

        $category_name = trim($_POST['category_name']);

        if(strlen($category_name) > 0){

            $insertData = array(
                'name' => $category_name,
            );
    
            $DBresult = $dbOpertionsObj->insertData('blog_categories', $insertData);
    
            if($DBresult['result'] == 1){
                $result = 1;
                $message = "New category has been created successfully";
            }
        }else{
            $message = "Please write someting";
        }

        echo json_encode(array('result' => $result, 'message'=>$message));

    } //isset


    if(isset($_POST['update_category'])){
        
        $result = 0;
        $message = "Please fill the field";

        $category_name = trim($_POST['category_name']);

        if(strlen($category_name) > 0){

            $id = trim($_POST['update_category']);

            $updateData = array(
                'name' => $category_name,
            );
    
            $DBresult = $dbOpertionsObj->updateData('blog_categories', $updateData, array('id' => $id));
    
            if($DBresult['result'] == 1){
                $result = 1;
                $message = "Category has been updated successfully";
            }
        }else{
            $message = "Please write someting";
        }

        echo json_encode(array('result' => $result, 'message'=>$message));

    } //update_category
    


    if(isset($_POST['delete'])){

        if($_POST['delete'] == "delete_cat"){

            $result = 0;
            $message = "Failed to delete the category";

            $id = $_POST['id'];

            $select = mysqli_query($localhost, "SELECT `id` FROM `blog_posts` WHERE `category` = '$id' ");
            if(mysqli_num_rows($select) == 0){

                $whereArr = array('id' => $id);
                $DBResult = $dbOpertionsObj->deleteBYId('blog_categories', $whereArr);

                if($DBResult['result'] == 1){
                    $result = 1;
                    $message = "Category has been deleted successfully";
                }

            }else{
                $message = "This category has been linked to the post";
            }

            echo json_encode(array('result' => $result, 'message'=>$message));

        }

    } // delete_cat

    
}// Post Method

?>