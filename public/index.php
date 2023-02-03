<?php
if(!file_exists('../app/config/config.php')) {
require('../app/config/constants.php');

StaticContent::get_stylesheet();    
StaticContent::noScriptInstalled();
StaticContent::get_scriptfiles(); 
} else {


require '../app/routes/router.php';


if (is_array($match)) {
    $params = $match['params'];
    require '../ressources/views/layout/header.php';
    require "../ressources/views/{$match['target']}.php";
    require '../ressources/views/layout/footer.php';
} else {
    require "../ressources/views/404.php";
}

 }