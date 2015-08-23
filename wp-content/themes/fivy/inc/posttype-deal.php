<?php

class Post_Type_Deal {

    public function __construct() {
        //add_action( 'init', array($this,'create_post_type' ));
        $this->create_post_type();

        //add_filter('manage_edit-' . POSTTYPE_BRAND_HISTORY . '_columns', array($this, 'cpt_columns'));
        //add_filter('manage_' . POSTTYPE_BRAND_HISTORY . '_posts_custom_column', array($this, 'cpt_column'));
        //add_filter('post_row_actions', array($this, 'remove_quick_edit'), 10, 1);
    }

    /**
     * @todo Remove quick edit link
     *
     */
    function remove_quick_edit($actions) {
        unset($actions['inline hide-if-no-js']);
        return $actions;
    }

    /**
     * @todo Create Custom type for annouce
     *
     */
    function create_post_type() {

        $labels = array(
            'name' => __('Deals', THEMENAME),
            'singular_name' => __('Deals', THEMENAME),
            'menu_name' => __('Deals', THEMENAME),
            'name_admin_bar' => __('Deals', THEMENAME),
            'add_new' => __('Add New', THEMENAME),
            'add_new_item' => __('Add New Deal', THEMENAME),
            'new_item' => __('New Deal', THEMENAME),
            'edit_item' => __('Edit Deal', THEMENAME),
            'view_item' => __('View Deal', THEMENAME),
            'all_items' => __('All Deals', THEMENAME),
            'search_items' => __('Search Deals', THEMENAME),
            'parent_item_colon' => __('Parent Deals:', THEMENAME),
            'not_found' => __('No Deals found.', THEMENAME),
            'not_found_in_trash' => __('No Deals found in Trash.', THEMENAME)
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'deal'),
            'has_archive' => true,
            'hierarchical' => true,
            'menu_position' => null,
            'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
        );
        
        add_theme_support('post-thumbnails');
        register_post_type(POSTTYPE_DEAL, $args);
    }

    /**
     * @todo Custom columns in Gird
     * @param type $columns
     * @return type
     */
    function cpt_columns() {
        $columns_custom = array(
            'cb' => '<input type="checkbox" />',
            'cat_id' => __('Category ID'),
            'title' => __('Nom du category'),
            'source' => __('Source'),
            'post_status' => __('Statut'),
        );
        return $columns_custom;
    }

    /**
     * @todo Filter value for each column
     * @global type $post
     * @param type $column
     * @param type $post_id
     */
    function cpt_column($column) {
        global $post;

        switch ($column) {
            case 'cat_id':
                echo CFS()->get("category_id", $post->ID);
                break;
            case 'source':
                $source = CFS()->get("source", $post->ID);
                echo $source[0];
                break;
            case 'post_status':
                echo $post->post_status;
                break;
            default:
                break;
        }
    }
    
    static public function get_list_option(){
        $args = array(
            'post_type' => array(POSTTYPE_BRAND_HISTORY),
            'post_status' => 'publish',
            'posts_per_page'    => -1,
        );

        $wp_query = new WP_Query($args);
        $results = array();
        if(count($wp_query->posts) > 0){
            foreach($wp_query->posts as $item){
                $results[$item->ID] = $item->post_title;
            }
        }
        
        return $results;
    }
}

new Post_Type_Deal();

