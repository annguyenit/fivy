<?php

//Create option list 10 background in homepage
//update_option( "martel_home_background", "1,2,3,4,5,6");
//var_dump(get_option( "martel_home_background" ));die;


if (!class_exists('Redux')) {
    return;
}

// This is your option name where all the Redux data is stored.
$opt_name = "fivy_options";


$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name' => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version' => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type' => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => true,
    // Show the sections below the admin menu item or not
    'menu_title' => __('Fivy Options', 'redux-framework-demo'),
    'page_title' => __('Fivy Options', 'redux-framework-demo'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key' => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography' => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar' => false,
    // Show the panel pages on the admin bar
    'admin_bar_icon' => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority' => 50,
    // Choose an priority for the admin bar menu
    'global_variable' => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => false,
    // Show the time the page took to load, etc
    'update_notice' => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    // OPTIONAL -> Give you extra features
    'page_priority' => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent' => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions' => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon' => 'dashicons-admin-appearance',
    // Specify a custom URL to an icon
    'last_tab' => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon' => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug' => '_options',
    // Page slug used to denote the panel
    'save_defaults' => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show' => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark' => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => true,
    // Shows the Import/Export panel when not used as a field.
    // CAREFUL -> These options are for advanced use only
    'transient_time' => 60 * MINUTE_IN_SECONDS,
    'output' => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database' => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'system_info' => false,
    // REMOVE
    //'compiler'             => true,
    // HINTS
    'hints' => array(
        'icon' => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color' => 'lightgray',
        'icon_size' => 'normal',
        'tip_style' => array(
            'color' => 'light',
            'shadow' => true,
            'rounded' => false,
            'style' => '',
        ),
        'tip_position' => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect' => array(
            'show' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'mouseover',
            ),
            'hide' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'click mouseleave',
            ),
        ),
    )
);

Redux::setArgs($opt_name, $args);


// -> START Media Uploads
/*Redux::setSection($opt_name, array(
    'title' => __('Background Homepage', 'redux-framework-demo'),
    'id' => 'media',
    'desc' => __('', 'redux-framework-demo'),
    'icon' => 'el el-picture'
));*/

Redux::setSection($opt_name, array(
    'title' => __('Header', 'redux-framework-demo'),
    'id' => 'header',
    'icon' => 'el el-picture',
    //'desc' => __('For full documentation on this field, visit: ', 'redux-framework-demo') . '<a href="http://docs.reduxframework.com/core/fields/gallery/" target="_blank">http://docs.reduxframework.com/core/fields/gallery/</a>',
    //'subsection' => true,
    'fields' => array(
        array(
            'id' => 'logo',
            'type' => 'media',
            'title' => __('Logo', 'redux-framework-demo'),
            'subtitle' => __('The logo', 'redux-framework-demo'),
            'desc' => __('Update logo image', 'redux-framework-demo'),
        )
    )
));

Redux::setSection($opt_name, array(
    'title' => __('Footer text block', 'redux-framework-demo'),
    'id' => 'footer-text-block',
    'icon' => 'el el-picture',
    //'desc' => __('For full documentation on this field, visit: ', 'redux-framework-demo') . '<a href="http://docs.reduxframework.com/core/fields/gallery/" target="_blank">http://docs.reduxframework.com/core/fields/gallery/</a>',
    //'subsection' => true,
    'fields' => array(
        array(
            'id' => 'footer-text-block-title',
            'type' => 'text',
            'title' => __('Title', 'redux-framework-demo')
        ),
        array(
            'id' => 'footer-text-block-content',
            'type' => 'textarea',
            'title' => __('Content', 'redux-framework-demo')
        ),
        array(
            'id' => 'footer-text-block-subsribe-title',
            'type' => 'text',
            'title' => __('Subsribe title', 'redux-framework-demo')
        ),
        array(
            'id' => 'footer-text-block-form',
            'type' => 'text',
            'title' => __('Form', 'redux-framework-demo')
        ),
    )
));

Redux::setSection($opt_name, array(
    'title' => __('Sponsor block', 'redux-framework-demo'),
    'id' => 'sponsor-block',
    'icon' => 'el el-picture',
    //'desc' => __('For full documentation on this field, visit: ', 'redux-framework-demo') . '<a href="http://docs.reduxframework.com/core/fields/gallery/" target="_blank">http://docs.reduxframework.com/core/fields/gallery/</a>',
    //'subsection' => true,
    'fields' => array(
        array(
            'id' => 'sponsor-title',
            'type' => 'text',
            'title' => __('Title', 'redux-framework-demo'),
            //'subtitle' => __('Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'redux-framework-demo'),
            //'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),
        array(
            'id' => 'sponsor-content',
            'type' => 'textarea',
            'title' => __('Content', 'redux-framework-demo'),
        ),
        array(
            'id' => 'sponsor-button-text',
            'type' => 'text',
            'title' => __('Button text', 'redux-framework-demo'),
        ),
        array(
            'id' => 'sponsor-button-url',
            'type' => 'text',
            'title' => __('Button url', 'redux-framework-demo'),
        ),
    )
));


Redux::setSection($opt_name, array(
    'title' => __('Defined', 'redux-framework-demo'),
    'id' => 'define',
    'icon' => 'el el-picture',
    //'desc' => __('For full documentation on this field, visit: ', 'redux-framework-demo') . '<a href="http://docs.reduxframework.com/core/fields/gallery/" target="_blank">http://docs.reduxframework.com/core/fields/gallery/</a>',
    //'subsection' => true,
    'fields' => array(
        array(
            'id' => 'litmit_bg_home',
            'type' => 'text',
            'title' => __('Limit background home', 'redux-framework-demo'),
            //'subtitle' => __('Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'redux-framework-demo'),
            //'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),

        array(
            'id' => 'litmit_document_pdf_link',
            'type' => 'text',
            'title' => __('Limit document pdf link', 'redux-framework-demo'),
            //'subtitle' => __('Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'redux-framework-demo'),
            //'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),

        array(
            'id' => 'litmit_service_page',
            'type' => 'text',
            'title' => __('Limit services page', 'redux-framework-demo'),
            //'subtitle' => __('Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'redux-framework-demo'),
            //'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),

        array(
            'id' => 'litmit_desc_services',
            'type' => 'text',
            'title' => __('Limit Description services', 'redux-framework-demo'),
            //'subtitle' => __('Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'redux-framework-demo'),
            //'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),

        array(
            'id' => 'litmit_actualies_page',
            'type' => 'text',
            'title' => __('Limit actualies page', 'redux-framework-demo'),
            //'subtitle' => __('Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'redux-framework-demo'),
            //'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),

        array(
            'id' => 'litmit_desc_actualies',
            'type' => 'text',
            'title' => __('Limit Description actualies', 'redux-framework-demo'),
            //'subtitle' => __('Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'redux-framework-demo'),
            //'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),

        array(
            'id' => 'list_filter_actualies',
            'type' => 'multi_text',
            'title' => __('List filter actualites', 'redux-framework-demo'),
            //'subtitle' => __('Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'redux-framework-demo'),
            //'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),

        array(
            'id' => 'list_source',
            'type' => 'multi_text',
            'title' => __('List source', 'redux-framework-demo'),
            //'subtitle' => __('Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'redux-framework-demo'),
            //'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),

        array(
            'id' => 'litmit_annonces_page',
            'type' => 'text',
            'title' => __('Limit annonces page', 'redux-framework-demo'),
            //'subtitle' => __('Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'redux-framework-demo'),
            //'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),

        array(
            'id' => 'list_filter_actualies',
            'type' => 'multi_text',
            'title' => __('List filter actualites', 'redux-framework-demo'),
            //'subtitle' => __('Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'redux-framework-demo'),
            //'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),

        array(
            'id' => 'list_sort_annonces',
            'type' => 'multi_text',
            'title' => __('List sort annoncess', 'redux-framework-demo'),

        ),
        array(
            'id' => 'chart1',
            'type' => 'media',
            'title' => __('Images chart 1', 'redux-framework-demo'),

        ),
        array(
            'id' => 'chart2',
            'type' => 'media',
            'title' => __('Images chart 2', 'redux-framework-demo'),

        ),


        array(
            'id' => 'litmit_sync_data',
            'type' => 'text',
            'title' => __('Limit Synchronize data', 'redux-framework-demo'),
            //'subtitle' => __('Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'redux-framework-demo'),
            //'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),


         array(
            'id' => 'animation_image',
            'type' => 'text',
            'title' => __('Animation Image timeout', 'redux-framework-demo'),
            //'subtitle' => __('Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'redux-framework-demo'),
            //'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),
          array(
            'id' => 'animation_text',
            'type' => 'text',
            'title' => __('Animation Image text timeout', 'redux-framework-demo'),
            //'subtitle' => __('Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'redux-framework-demo'),
            //'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),

    )
));



