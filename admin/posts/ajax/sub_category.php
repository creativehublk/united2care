<?php 

include_once '../../../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';
include_once ROOT_PATH.'/db/db.php';

$checkArr = array(
    'page_level_code' => 2
);
$checkAccess = $dbOpertionsObj->checkLogin($checkArr);

if($checkAccess == 1){

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['category'])){
            $category_id = $_POST['category'];

            $sub_category_option = "";

            $select_category = mysqli_query($con,"SELECT * FROM `ref_sub_categories` WHERE `parent`='$category_id' "); 
            while($fetch_categories = mysqli_fetch_array($select_category)){ 


                $sub_category_option .= '<option value="'.$fetch_categories['id'].'"> '.$fetch_categories['name'] .'</option>';


            }// while

            echo json_encode(array("result"=>$sub_category_option));

        }// isset
    } // request method
}
?>