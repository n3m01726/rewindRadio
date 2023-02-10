<?php
require('../app/config/constants.php');
if(!file_exists('../app/config/config.php')) {
    require('../ressources/classes/static.class.php');

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
    include('../app/routes/router.php');  
    if( is_array($match)) {
    
    $params = $match['params'];
    require '../ressources/views/layout/header.php';
    require "../ressources/views/{$match['target']}.php";
    require '../ressources/views/layout/footer.php';
} else
{
    require "../ressources/views/404.php";
}
} }
?>