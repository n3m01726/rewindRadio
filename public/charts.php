<?php
require('../app/config/constants.php');
if(!file_exists('../app/config/config.php')) {

StaticContent::get_stylesheet();    
StaticContent::noScriptInstalled();
StaticContent::get_scriptfiles(); 
} else {
include RESSOURCES_PATH . '/views/layout/header.php';
include RESSOURCES_PATH . '/views/charts.php';
include RESSOURCES_PATH . '/views/layout/footer.php';

}
?>