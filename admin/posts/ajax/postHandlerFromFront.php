<?php 
include_once '../../../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';
include_once ROOT_PATH.'/db/db.php';

require_once ROOT_PATH.'/assets/vendors/validation/gump.class.php';

require_once ROOT_PATH.'/assets/vendors/php/image_resize.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){


    if(isset($_POST['create_post_from_users'])){

        $result = 0;
        $error = 0;
        $message = "Failed to create the post";
        $redirectUrl = null;

        $gump = new GUMP();
        $_POST = $gump->sanitize($_POST); // You don't have to sanitize, but it's safest to do so.

        $gump->validation_rules(array(
            'title' => 'required',
            'sub_category' => 'required',
        ));
        
        $gump->filter_rules(array(
            'title' => 'trim',
            'sub_category' => 'trim',
            'note' => 'trim'
        ));
        

        $captcha = $_POST['g-recaptcha-response'];

		$secretKey = "6Lfv3-UUAAAAADzxNDnk1IOrRAmOoqmto9X5J_Rg";
		$ip = $_SERVER['REMOTE_ADDR'];

		// post request to server
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$data = array('secret' => $secretKey, 'response' => $captcha);

		$options = array(
			'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data)
			)
		);
		$context  = stream_context_create($options);
		$response = file_get_contents($url, false, $context);
        $responseKeys = json_decode($response,true);
        header('Content-type: application/json');
        
        if($responseKeys["success"]) {


            $validated_data = $gump->run($_POST);

            if($validated_data === false) {
                
                $error = $gump->get_errors_array(true);
                $message = "Please fill all the required fields";

            }else{
                // validation end insert data
                $insertData = $validated_data;
                
                $desc = $validated_data['note'];
                
                $insertData = array(
                    'name' => $validated_data['title'],
                    'description' => $desc,
                    'thumb' => 0,
                    'sub_cat_id' => $validated_data['sub_category'],
                    'approve' => 1,
                    'status' => 1,
                    'verify' => 0
                );

                $DBResult = $dbOpertionsObj->insertData('ad_posts', $insertData);
                
                $error = $DBResult;
                if($DBResult['result']){

                    $post_id = $DBResult['inserted_id'];

                    // Insert Cities
                    $cities = $_POST['cities'];
                    foreach ($cities as $key => $city) {
        
                        $DBResult = $dbOpertionsObj->insertData('ad_post_cities', array(
                            'ad_post_id' => $post_id,
                            'city_id' => $city
                        ));
            
                    }

                    $result = 1;
                    $message = 'New post '.$validated_data['title'].' has been created';

                    // Upload Images
                    $images_arr = $_FILES['causes_img'];
                    $imagesCount = $images_arr['name'];
                    $imagesCount = (count($imagesCount) -1);
                    

                    // Causes Images
                    if($imagesCount > 0){
                        for($i=0; $i < $imagesCount; $i++ ){

                            if(isset($images_arr['name'][$i]) ) {

                                if(strlen($images_arr['name'][$i]) > 0 ) {
        
                                    $path = ROOT_PATH."/admin/uploads/posts/";
                                    if (!file_exists($path)) {
                                        mkdir($path, 0777, true);
                                    }
                                    $newWidth = 500;
        
                                    $new_name = Date("dmy").rand();
        
                                    //$newHeight = 100; //Optional ---> If need fixed size
                                    $pass_parm = store_uploaded_image($path, $images_arr['name'][$i], $images_arr['tmp_name'][$i], $new_name, $newWidth);
        
                                    if($pass_parm['error'] == 0){
                                        
                                        $result = 1;
                                        $message = "Causes images has been uploaded";
                                        $error = null;
        
                                        $file_to_save = $pass_parm['filename'];
                                        $error_image = 0;
        
                                        $update = mysqli_query($localhost, "INSERT INTO `ad_post_images` (`ad_post_id`,`name`) VALUES('$post_id', '$file_to_save') ");
                    
                                    }else{
                                        $message = $pass_parm['message'];
                                    }
        
                                } // If Issey
                
                            } // If end 
                        } // For Loop
                    }// if End  COunt
                    // Img Upload End

                }// db check result end


            } // validation check

        }else{
            $message =" reCAPTCHA Invalid";
        } // Captcha Issue

        echo json_encode( array('result'=>$result, 'message'=>$message, 'error'=>$error) );


    }// create Lead isset

} // post method



?>
