<?php
// create new custom post type : Deal
function generate_custom_post_deal() {
  $labels = array(
    'name'               => _x( 'Deals', 'post type general name' ),
    'singular_name'      => _x( 'Deal', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Deal' ),
    'edit_item'          => __( 'Edit Deal' ),
    'new_item'           => __( 'New Deal' ),
    'all_items'          => __( 'All Deals' ),
    'view_item'          => __( 'View Deal' ),
    'search_items'       => __( 'Search Deals' ),
    'not_found'          => __( 'No deals found' ),
    'not_found_in_trash' => __( 'No deals found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Deals'
  );
  $args = array(
    'labels'        => $labels,
    'menu_icon'     => 'dashicons-clipboard',
    'description'   => 'Holds our deals and deal specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'deal', $args );
}
add_action( 'init', 'generate_custom_post_deal' );

/**
 * create new custom taxonomy for Deal
 */
function generate_taxonomies_deal() {
  $labels = array(
    'name'              => _x( 'Deal Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Deal Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Deal Categories' ),
    'all_items'         => __( 'All Deal Categories' ),
    'parent_item'       => __( 'Parent Deal Category' ),
    'parent_item_colon' => __( 'Parent Deal Category:' ),
    'edit_item'         => __( 'Edit Deal Category' ),
    'update_item'       => __( 'Update Deal Category' ),
    'add_new_item'      => __( 'Add New Deal Category' ),
    'new_item_name'     => __( 'New Deal Category' ),
    'menu_name'         => __( 'Deal Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'deal_category', 'deal', $args );
}
add_action( 'init', 'generate_taxonomies_deal', 0 );
