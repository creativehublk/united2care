<?php
include_once '../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';
include_once ROOT_PATH.'/db/db.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(isset($_POST['loadCauseDetails'])){
        
        $result = 0;
        $message = "Failed to create new admin user";

        $cause_id = $_POST['cause_id'];

        $select_cause = mysqli_query($localhost, "SELECT * FROM `causes` WHERE `id` = '$cause_id' ");
        $fetch_cause = mysqli_fetch_array($select_cause);

        $images_series = '';
        $select_images = mysqli_query($con,"SELECT * FROM `causes_images` WHERE `cause_id`='$cause_id' ");
        while($fetch_images = mysqli_fetch_array($select_images)){
            
            if(file_exists(ROOT_PATH.'admin/uploads/causes/'.$fetch_images['name'])){ 
                $temp_img = URL.'admin/uploads/causes/'.$fetch_images['name'];
                $images_series .= '<img src="'.$temp_img.'" alt="">';
            }
            
        }

        $url = URL.'cause?q='.$cause_id.'&p='.urlencode(strtolower($fetch_cause['name']));

        $dataArray = array(
            'title' => $fetch_cause['name'],
            'description' => $fetch_cause['description'],
            'images' => $images_series,
            'url' => $url,
        );
        
        echo json_encode(array('result' => $result, 'message'=>$message, 'data' => $dataArray));

    } //isset
}// Post Method

?>