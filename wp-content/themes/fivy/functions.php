<?php

// Load defined
if (file_exists(TEMPLATEPATH . '/inc/constants.php')) {
    include_once(TEMPLATEPATH . '/inc/constants.php');  //ALL CONSTANTS FILE INTEGRATOR
}
// Register theme options
include_once INC_PATH . '/admin-options.php';

// Register custom post type and custom taxonomy
include_once INC_PATH . '/customs.php';

