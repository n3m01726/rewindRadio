<?php

use App\StaticContent;

require('../../config/constants.php');
require('../../resources/lang/lang-fr.php');

if(!file_exists('../../config/config.php')) {
    require('../../resources/classes/static.class.php');

    StaticContent::getStylesheet();    
    StaticContent::noScriptInstalled();
    StaticContent::getScriptfiles(); 

} else { 
include('layouts/header.php');
include('../../resources/views/private/post-add.php');
include('layouts/footer.php');
}