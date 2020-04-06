<?php 
include_once '../../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';
include_once ROOT_PATH.'/db/db.php';

require_once ROOT_PATH.'/assets/vendors/validation/gump.class.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){


    if(isset($_POST['post_comment'])){

        $result = 0;
        $error = 0;
        $message = "Failed to post comment";
        $redirectUrl = null;
        $tempCommentContainer = file_get_contents(ROOT_PATH.'posts/container/comment.html');

        $gump = new GUMP();
        $_POST = $gump->sanitize($_POST); // You don't have to sanitize, but it's safest to do so.

        $gump->validation_rules(array(
            'name' => 'required',
            'ad_post_id' => 'required',
            'comment' => 'required'
        ));
        
        $gump->filter_rules(array(
            'name' => 'trim',
            'ad_post_id' => 'trim',
            'comment' => 'trim',
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
                
                $ip_address = $ip;

                $insertData = array(
                    'name' => $validated_data['name'],
                    'ad_post_id' => $validated_data['ad_post_id'],
                    'comment' => $validated_data['comment'],
                    'ip_address' => $ip_address,
                );

                $DBResult = $dbOpertionsObj->insertData('ad_post_comments', $insertData);
                
                $error = $DBResult;
                if($DBResult['result']){

                    $result = 1;
                    $message = 'Your post has been published';

                    // Container
                    $tempCommentContainer = str_replace("{ NAME }", $validated_data['name'], $tempCommentContainer);
                    $tempCommentContainer = str_replace("{ DATE }", Date("d M Y, h:i a"), $tempCommentContainer);
                    $tempCommentContainer = str_replace("{ COMMENT }", $validated_data['comment'], $tempCommentContainer);


                }// db check result end


            } // validation check

        }else{
            $message =" reCAPTCHA Invalid";
        } // Captcha Issue

        echo json_encode( array('result'=>$result, 'message'=>$message, 'error'=>$error, 'post' => $tempCommentContainer) );


    }// create Lead isset

} // post method



?>
