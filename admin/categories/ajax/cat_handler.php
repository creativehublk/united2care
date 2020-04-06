<?php 
include_once '../../../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';
include_once ROOT_PATH.'/db/db.php';



if($_SERVER['REQUEST_METHOD'] == "POST"){


    if(isset($_POST['uploadSubCatCover'])){

        $result = 0;
        $message = "Failed to changes the sub category cover";
        $error = 0;


        $sub_cat_id = $_POST['sub_cat_id'];
        $image_name = $_POST['image_name'];

        $select = mysqli_query($localhost, "SELECT `cover_image` FROM `ref_sub_categories` WHERE `id` = '$sub_cat_id' ");
        if(mysqli_num_rows($select) > 0){
            // Delete the pic if exist
            $fetch = mysqli_fetch_array($select);

            $old_thumb = ROOT_PATH.'admin/uploads/category_banner/'.$fetch['cover_image'];
            if(file_exists($old_thumb) && (strlen($fetch['cover_image']) > 0) ){
                unlink($old_thumb);
            }
        }


        // Insert new Pic
        $updateData = array(
            'cover_image' => $image_name
        );
        $whereArray = array(
            'id' => $sub_cat_id
        );

        $DBResult = $dbOpertionsObj->updateData('ref_sub_categories', $updateData, $whereArray);
        
        if($DBResult['result'] == 1){

            $result = 1;
            $message = 'Sub category cover has been changed';

            $auditArr = array(
                'action' => 'Update sub category cover',
                'description' => $message
            );

            $dbOpertionsObj->auditTrails($auditArr);

        }else{
            $error = $DBResult;
        }// db check result end


        echo json_encode( array('result'=>$result, 'message'=>$message, 'error'=>$error) );


    } //uploadThumb

} // post method



?>
