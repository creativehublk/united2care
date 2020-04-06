<?php include_once '../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';
include_once ROOT_PATH.'/db/db.php';
require_once ROOT_PATH.'/assets/vendors/php/image_resize.php';


    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if(isset($_POST['request_kits'])){

            $items = array();
            if(isset($_POST['item'])){
                $items = $_POST['item'];
            }
            
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $referenceNo = 'RQST-'.rand();


            $itemOrder = '';
            foreach($items AS $item){

                $itemOrder .= $item.', ';

            } // Foreach

            $resultArray['result'] = 0;
            $resultArray['message'] = "Failed to send the email";
            

            if(strlen($email) > 0 && count($items) > 0 ){
                

                $insert = mysqli_query($localhost, "INSERT INTO `kits_request` (`name`, `email`, `phone`, `item`, `reference_no`) VALUES('$name', '$email', '$phone', '$itemOrder', '$referenceNo')  ");
                if($insert){
                    $resultArray['result'] = 1;
                    $resultArray['message'] = "You request has been submitted";
                }else{
                    $resultArray['message'] = mysqli_error($localhost);
                }


                $resultArray['referenceNo'] = $referenceNo;

            }else{
                $resultArray['message'] = "Please fill the required fields";
            }

            echo json_encode($resultArray);


        } // Request Kits Mail

        if(isset($_POST['donate_kits'])){

            $items = array();
            if(isset($_POST['item'])){
                $items = $_POST['item'];
            }

            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $message = $_POST['message'];
            $referenceNo = 'RQST-'.rand();


            $itemOrder = '';
            foreach($items AS $item){

                $itemOrder .= $item.', ';

            } // Foreach

            $resultArray['result'] = 0;
            $resultArray['message'] = "Failed to send the email";

            if(strlen($email) > 0 && count($items) > 0 ){
                
                $insert = mysqli_query($localhost, "INSERT INTO `donation_request` (`name`, `email`, `phone`, `item`) VALUES('$name', '$email', '$phone', '$itemOrder')  ");
                if($insert){
                    $resultArray['result'] = 1;
                    $resultArray['message'] = "You request has been submitted";
                }

            }else{
                $resultArray['message'] = "Please fill the required fields";
            }

            echo json_encode($resultArray);

        }

        if(isset($_POST['submit_cause'])){

            $cause = $_POST['cause'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $message = $_POST['message'];
            $images_arr = $_FILES['causes_img'];
            $imagesCount = $images_arr['name'];
            $imagesCount = (count($imagesCount) -1);

            $resultArray['result'] = 0;
            $resultArray['message'] = "Failed to send the email";

            if(strlen($email) > 0 && strlen($cause) > 0 ){
                
                $insert = mysqli_query($localhost, "INSERT INTO `requested_cause` (`cause`, `name`, `email`, `phone`, `message`) VALUES('$cause', '$name', '$email', '$phone', '$message')  ");
                if($insert){
                    $resultArray['result'] = 1;
                    $resultArray['message'] = "You request has been submitted";
                }

                $cause_id = mysqli_insert_id($localhost);


                // Causes Images
                if($imagesCount > 0){
                    for($i=0; $i < $imagesCount; $i++ ){

                        if(isset($images_arr['name'][$i]) ) {

                            if(strlen($images_arr['name'][$i]) > 0 ) {
    
                                $path = ROOT_PATH."/admin/uploads/req_causes/";
                                if (!file_exists($path)) {
                                    mkdir($path, 0777, true);
                                }
                                $newWidth = 1000;
    
                                $new_name = Date("dmy").rand();
    
                                //$newHeight = 100; //Optional ---> If need fixed size
                                $pass_parm = store_uploaded_image($path, $images_arr['name'][$i], $images_arr['tmp_name'][$i], $new_name, $newWidth);
    
                                if($pass_parm['error'] == 0){
                                    
                                    $result = 1;
                                    $message = "Causes images has been uploaded";
                                    $error = null;
    
                                    $file_to_save = $pass_parm['filename'];
                                    $error_image = 0;
    
                                    $update = mysqli_query($localhost, "INSERT INTO `req_causes_img` (`cause_id`,`name`) VALUES('$cause_id', '$file_to_save') ");
                
                                }else{
                                    $message = $pass_parm['message'];
                                }
    
                            } // If Issey
            
                        } // If end 
                    } // For Loop
                }// if End  COunt


            }else{
                $resultArray['message'] = "Please fill the required fields";
            }

            echo json_encode($resultArray);

        } //submit_cause

    } // Request M<ethod

?>