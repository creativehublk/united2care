<?php

    // Upload image functions
    function getExtension($str) {
        $i = strrpos($str,".");
        if (!$i) {
        return "";
        }
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
        return $ext;
    }

    function compressImage($ext,$uploadedfile,$path,$actual_image_name,$newwidth,$path_to,$quality) {

        if($ext=="jpg" || $ext=="jpeg" ) {
            $src = imagecreatefromjpeg($uploadedfile);
        } else if($ext=="png") {
            $src = imagecreatefrompng($uploadedfile);
        } else if($ext=="gif") {
            $src = imagecreatefromgif($uploadedfile);
        } else {
            $src = imagecreatefrombmp($uploadedfile);
        }

        list($width,$height) = getimagesize($uploadedfile);

        $newheight = ($height/$width)*$newwidth;

        $tmp = imagecreatetruecolor($newwidth,$newheight);

        imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

        $filename = $path_to.$actual_image_name; //PixelSize_TimeStamp.jpg

        imagejpeg($tmp,$filename,$quality);

        $compress_image = $path.$filename;

        //copy($filename,$compress_image);

        imagedestroy($tmp);

        return $filename;
    }
?>