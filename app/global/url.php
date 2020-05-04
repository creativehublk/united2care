<?php 
    require_once 'config.php';
    define('PROTOCOL',(!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://');
    $G_parts = explode('/',$_SERVER['REQUEST_URI']);

    if (!in_array($_SERVER['SERVER_PORT'], [80, 443])) {
        $G_PORT = ':'.$_SERVER['SERVER_PORT'];
    } else {
        $G_PORT = '';
    }

    $G_global_url = $_SERVER['SERVER_NAME'].$G_PORT.'/';
    $documentRoot = $_SERVER['DOCUMENT_ROOT'].'/';

    if(DOMAIN_START_PATH != 0){
        // Forming The Url and Document ROOT_PATH
        $G_global_url .= $G_parts[DOMAIN_START_PATH].'/';
        $documentRoot .= $G_parts[DOMAIN_START_PATH].'/';
    }
    
    // Complete the URL by Adding the Protocol 
    
    $G_global_url = PROTOCOL.$G_global_url;
    
    Define("URL",$G_global_url);
    define('ROOT_PATH', $documentRoot);

    require_once ROOT_PATH.'imports/functions.php';

?>