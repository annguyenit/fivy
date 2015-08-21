<?php
/*
  Plugin Name: Deals Importer
  Plugin URI: http://getdeals.nl
  Description: Import deals from daisycon.com
  Author: GetDeals.nl
  Author URI: http://getdeals.nl
  Version: 1.0
 */

// Load functional file for this plugin
include_once('functions.php');

// cron to import activation
register_activation_hook(__FILE__, 'mp_deals_importer_activation');
add_action('mp_news_cron', 'do_this_hourly');
register_deactivation_hook(__FILE__, 'mp_deals_importer_deactivation');

// import
add_action('mp_deals_importer_hook','mp_deals_importer_do');

// disable feed caches
add_action( 'wp_feed_options', 'do_not_cache_feeds' );

// setting schedule for importation
add_filter('cron_schedules', 'mp_deals_importer_time');

mp_deals_importer_do(); // for test
// Page setting for plugin
include_once('option.php');