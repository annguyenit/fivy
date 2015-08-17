<?php
// Load defined
if(file_exists(TEMPLATEPATH . '/inc/constants.php')){
    include_once(TT_ADMIN_FOLDER_PATH.'constants.php');  //ALL CONSTANTS FILE INTEGRATOR
}
// Register theme options
include_once TEMPLATEPATH.'/inc/admin-options.php';


