<?php

use App\StaticContent;

require('../config/constants.php');
require('../lang/lang-fr.php');
require('../config/functions.php');

if(!file_exists('../config/config.php')) {

    StaticContent::getStylesheet();    
    StaticContent::noScriptInstalled();
    StaticContent::getScriptfiles(); 

} else {
include('../resources/views/layout/header.php');
include('../resources/views/home.php');
include('../resources/views/layout/footer.php');
}

?>