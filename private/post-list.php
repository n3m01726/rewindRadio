<?php
use App\StaticContent;



require('../../config/constants.php');
require('../../resources/lang/lang-fr.php');
require('../../resources/classes/admin.classes.php');

if(!file_exists('../../config/config.php')) {
    require('../../resources/classes/static.class.php');
    StaticContent::getStylesheet();    
    StaticContent::noScriptInstalled();
    StaticContent::getScriptfiles(); 

} else {
if($_SESSION['logged_in'] = true) {
    include('layouts/header.php');
    include('../../resources/views/private/post-list.php');
    include('layouts/footer.php');
} else {
     echo "Vous devez être connecté pour accéder à cette page.";
  } 
}