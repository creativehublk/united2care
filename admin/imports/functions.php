<?php 

function selectOption($data,$data2){
    $data = trim($data);
    $data2 = trim($data2);

    if($data == $data2){
        return "selected";
    }

} //selectOption

?>