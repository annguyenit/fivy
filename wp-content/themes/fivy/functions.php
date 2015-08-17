<?php

// Load defined
if (file_exists(TEMPLATEPATH . '/inc/constants.php')) {
    include_once(TEMPLATEPATH . '/inc/constants.php');  //ALL CONSTANTS FILE INTEGRATOR
}
// Register theme options
include_once INC_PATH . '/admin-options.php';

// Register custom post type and custom taxonomy
include_once INC_PATH . '/customs.php';

define('TEMPLATE_PATH', get_template_directory());
include_once TEMPLATE_PATH . '/inc/admin-options.php';

register_nav_menu('fivy-menu', __('Fivy Menu', 'fivy'));

if (!function_exists('fivy_menu')) {

    function fivy_menu($slug) {
        $menu = array(
            'theme_location' => $slug,
            'container' => 'nav',
            'container_class' => '',
            'items_wrap' => '<div class="container"><ul id="%1$s" class="ownmenu %2$s">%3$s</ul></div>'
        );
        wp_nav_menu($menu);
    }

}


// Active menu
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}
