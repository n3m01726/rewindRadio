<?php

use App\StaticContent;

require('../config/constants.php');
if(!file_exists('../config/config.php')) {
    require('../resources/classes/static.class.php');

    StaticContent::get_stylesheet();    
    StaticContent::noScriptInstalled();
    StaticContent::get_scriptfiles(); 
}else {

$uri = $_SERVER['REQUEST_URI'];
if($uri == "/private" || $uri == "/private/") {
    // echo "on a une zone privée.";
    require("../private/index.php");
}
else { 
    include('../routes/web.php');  
    if( is_array($match)) {
    
    $params = $match['params'];
    require '../resources/views/layout/header.php';
    require "../resources/views/{$match['target']}.php";
    require '../resources/views/layout/footer.php';
} else
{
    require "../resources/views/404.php";
}
} }
?>