<?php

class Taxonomy_Deal {

    public function __construct() {
        $this->create_taxonomies();
    }

    /**
     * @todo Register taxonomy Brand
     * @return void
     */
    function create_taxonomies() {
        $labels = array(
                'name' => __('Deal Category', THEMENAME),
                'all_items' => __('All Deal Category', THEMENAME),
                'edit_item' => __('Edit Deal Category', THEMENAME),
                'add_new_item' => __('New Deal Category', THEMENAME),
                'parent_item' => __('Parent Deal', THEMENAME),
                'parent_item_colon' => __('Parent Deal Category:', THEMENAME),
                'menu_name' => __('Deal Categories', THEMENAME),
            );

        $args = array(
            'labels' => $labels,
            // Control the slugs used for this taxonomy
            'rewrite' => array(
                'slug' => TAXONOMY_DEAL, // This controls the base slug that will display before each term
            ),
            'hierarchical' => true,
            'show_ui' => true,
            'parent'    =>  0,
            'show_tagcloud' => true,
            'public' => true,
        );

        register_taxonomy(TAXONOMY_DEAL, array(POSTTYPE_DEAL), $args);
    }  
}

new Taxonomy_Deal();