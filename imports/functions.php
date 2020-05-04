<?php 

function redirect($url, $permanent = false) 
{
    
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    Exit();
}

function changeToURL($key)
{

    $formatedKey = urlencode(trim(strtolower(str_replace(" ", "-", $key))));

    return $formatedKey;
}

function doactive($data1, $data2)
{
    if (trim($data1) == trim($data2)) {
        return "active";
    }
}

function comboboxSelected($data1,$data2){

    if(trim($data1) == trim($data2) ){
    return "selected";
    }
} // comboboxSelected End

function comboboxDataArray($data,$array){

    if( in_array(trim($data," "),$array) ){
    return "selected";
    }

} // comboboxDataArray end


function urlFriendly($data){

    $data = urlencode(trim($data));
    $data = strtolower($data);

    return $data;

} //urlFriendly

function imageExist($imgPath, $imgName){

    $result = false;
    if(strlen($imgName) > 0){
    $imgLocation = $imgPath.$imgName;
    if(file_exists($imgLocation)){
        $result = true;
    }
    }

    return $result;

} //imageExist

function pickImage($imageArray, $defaultImgURL){

    $selectedImageUrl = $defaultImgURL;

    foreach ($imageArray as $key => $imgArr) {

    if(imageExist(ROOT_PATH.$imgArr['path'], $imgArr['image'])){
        $selectedImageUrl = URL.$imgArr['path'].$imgArr['image'];
        break;
    }
    
    }

    return $selectedImageUrl;

} //pickImage


function hideArrayEmpty($array){
    if(count($array) == 0){
    return 'hide';
    }
}

function checkEclusive($data){
    $exl = "";
    if(is_numeric($data)){
        if($data == 1){
            $exl = "active";
        }
    }

    return $exl;
} // checkEclusive


function checkImageCount($data){
    $data = trim($data);

    $class = "";

    if(is_numeric($data)){
        if($data == 1){
            $class = "primary-img";
        }else if($data == 2){
            $class = "secondary-img";
        }
    }

    return $class;
}//checkImageCount


function checkPositive($data){
    $data = trim($data);
    $class = "";

    if($data == 1){
        $class = "positive_text";
    }else{
        $class = "error_text";
    }

    return $class;

} // checkPositive


function NumberValidation($con,$number){
    $number = mysqli_real_escape_string($con,trim($number));
    return $number;
}

function textValidation($con,$text){
    $text = mysqli_real_escape_string($con,trim($text));
    return $text;
}

function checkNumeric($data,$con){
    $number = mysqli_real_escape_string($con,trim($data));
    if(is_numeric($number)){
        $number = $number;
    }else{
        $number = 0;
    }
    return $number;
} //checkNumeric


// check users type
function checkUserAccess(){

    $result = 0;
    $message = "guest";

    if(isset($_SESSION['user_id']) && isset($_SESSION['user_type']) ){
        if($_SESSION['user_type'] == "std"){
            $user_id = $_SESSION['user_id'];
            $user_type = "std";
            $result = 1;
            $message = "std";
        } // check user tye std if end 
        
    } // check session if loop end 

    return array("access"=>$result,"user_type"=>$message);

} // checkUserAccess
// check users type

// function to get ip address
function getIP($ip = null, $deep_detect = TRUE){
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    } else {
        $ip = $_SERVER["REMOTE_ADDR"];
    }
    return $ip;
}


// Filter area functions
function doSelectInArray($array, $id){

    if(in_array($id, $array)){
        return "selected";
    }

} //doSelectInArray

function doselection($data,$check){
    if(trim($data) == trim($check)){
        return "selected";
    }
}//doselection

function docheck($data,$check){
    if(trim($data) == trim($check)){
        return "checked";
    }
} //docheck

?>