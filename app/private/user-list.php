<?php

use App\StaticContent;

require('../config/constants.php');
require('../resources/lang/lang-fr.php');
require('../config/functions.php');

if(!file_exists('../config/config.php')) {
    require('../resources/classes/static.class.php');

    StaticContent::getStylesheet();    
    StaticContent::noScriptInstalled();
    StaticContent::getScriptfiles(); 

} else {
    
include('../resources/views/layout/header.php');
include('../resources/views/private/user-list.php');
include('../resources/views/layout/footer.php');
}