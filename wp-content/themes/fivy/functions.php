<?php

// Load defined
if (file_exists(TEMPLATEPATH . '/inc/constants.php')) {
    include_once(TEMPLATEPATH . '/inc/constants.php');  //ALL CONSTANTS FILE INTEGRATOR
}

// Register custom post type and custom taxonomy
//include_once INC_PATH . '/customs.php';
include_once INC_PATH . '/posttype-deal.php';
include_once INC_PATH . '/taxonomy-deal.php';


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
add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);

function special_nav_class($classes, $item) {
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active ';
    }
    return $classes;
}

function get_option_terms($term_id = TAXONOMY_DEAL) {
    $terms = get_terms($term_id, 'hide_empty=0');
    $results = array();
    if (!empty($terms) && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            $results[$term->term_id] = $term->name;
        }
    }

    return $results;
}

function get_one_deal_by_cat($cat_id, $limit = 1) {
    $args = array(
        'post_type' => POSTTYPE_DEAL,
        'posts_per_page' => $limit,
        'tax_query' => array(
            array(
                'taxonomy' => TAXONOMY_DEAL,
                'field' => 'term_id',
                'terms' => array( $cat_id ),
            ),
        ),
    );
    $query = new WP_Query($args);
    
    if(count($query->posts)>0){
        return $query->posts[0];
    }
    
    return array();
}

function get_five_deal_home($exclude_id = 0){
    global $fivy_options;
    $deals = array();
    for ($i = 1; $i <= 5; $i++) {
        $cat_id = $fivy_options["home_deal_cat{$i}"];
        if(!empty($exclude_id) && $exclude_id == $cat_id){
            $deals[] = array();
            continue;
        }
        $deals[] = get_one_deal_by_cat($cat_id);
    }
    
    return $deals;
}


function get_time_remain($end_time, $end_date){
    if(empty($end_time) || is_null($end_time)){
        return "";
    }
    
    $time = explode(SEPARATE_TIME, $end_time );
    if(count($time) !== 3){
        return "";
    }
    
    $today = date("Y-m-d H:i:s");
    $date = $end_date . ' ' . $end_time;
    $total_secs = $time[0] * 3600 + $time[1] * 60 + $time[2];
    
    $html_expire  = "<div data-countdown='-1' class='timer'></div>";
    $current_time = explode(SEPARATE_TIME, date('H:i:s', time()));
    $total_secs_current = $current_time[0] * 3600 + $current_time[1] * 60 + $current_time[2];
    
    if($today > $date){
        return $html_expire;
    }else{
        $hour = $time[0] - $current_time[0];
        $mins = $time[1] - $current_time[1];
        $secs = $time[2] - $current_time[2];
    }    

    $total_secs -= $total_secs_current;
    return "<div data-countdown='{$total_secs}' class='timer'>nog: <span class='remain_hour'>{$hour}</span> uur <span class='remain_minute'>{$mins}</span> min <span class='remain_second'>{$secs}</span> sec</div>";
}

