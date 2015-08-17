<?php

define('TEMPLATE_PATH', get_template_directory());

include_once TEMPLATE_PATH.'/inc/admin-options.php';
function temp_function() {
    global $redux_demo;
//print_r($redux_demo);die;
}
add_filter('init', 'temp_function');
