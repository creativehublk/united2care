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

        if(isset($_POST['update_post_id'])){

            $result = 0;
            $message = "Failed to update the product images";
            $error = null;

            require_once ROOT_PATH.'/assets/vendors/php/image_resize.php';
            
            $post_id = $_POST['update_post_id'];

            $image_exist_id_arr = $_POST['image_id_if_exist'];
            $images_arr = $_FILES['gallery-img'];
            
            $del_query = "DELETE FROM `ad_post_images` WHERE `id` NOT IN (".join(', ', $image_exist_id_arr).") AND `ad_post_id`= '$post_id' ";
            $delete = mysqli_query($localhost, $del_query);
            if($delete){
                $result = 1;
                $message = "Images removed successfully";
            }else{
                $error = mysqli_error($localhost);
            }
            

            $count = count($image_exist_id_arr);

            if($count > 0){
                for($i=0; $i < $count; $i++ ){

                    if(isset($images_arr['name'][$i]) ) {

                        if(strlen($images_arr['name'][$i]) > 0 ) {

                            $path = ROOT_PATH."/admin/uploads/posts/";
                            if (!file_exists($path)) {
                                mkdir($path, 0777, true);
                            }
                            $newWidth = 1000;

                            $new_name = Date("dmy").rand();

                            //$newHeight = 100; //Optional ---> If need fixed size
                            $pass_parm = store_uploaded_image($path, $images_arr['name'][$i], $images_arr['tmp_name'][$i], $new_name, $newWidth);

                            if($pass_parm['error'] == 0){
                                
                                $result = 1;
                                $message = "Post images has been uploaded";
                                $error = null;

                                $file_to_save = $pass_parm['filename'];
                                $error_image = 0;

                                $update = mysqli_query($localhost, "INSERT INTO `ad_post_images` (`ad_post_id`,`name`) VALUES('$post_id', '$file_to_save') ");
            
                            }else{
                                echo $message = $pass_parm['message'];
                            }

                        } // If Issey
        
                    } // If end 

                } // FOR end 
            } // Check Count IF end 


            echo json_encode( array('result'=>$result, 'message'=>$message, 'error'=>$error) );


        } // Isset end

        


    } // check session if end 


} // Check Access


?>