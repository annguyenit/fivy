<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * send report to email when has problem or notification when import data
 * @param string $data
 * @return none
 */
function send_report($data)
{
   $headers = 'From: My Name <cron@getdeal.nl>' . "\r\n";
//   wp_mail('hmphu.it@gmail.com', 'Cron update deals', $data, $headers);
}

/**
 * update when plugin activate
 * @param none
 * @return none
 */
function mp_deals_importer_activation() {
	wp_schedule_event(time(), 'in_one_minute', 'mp_deals_importer_hook');
	update_option('mp-deal-importer-last-run',time());
	update_option('mp-deal-importer-time',21600);
}

/**
 * process when plugin deactivate
 * @param none
 * @return none
 */
function mp_deals_importer_deactivation() {
	wp_clear_scheduled_hook('mp_deals_importer_hook');
}

/**
 * setting for disable feed cache
 * @param fixed $feed
 * @return none
 */
function do_not_cache_feeds(&$feed) {
	$feed->enable_cache(false);
}

/**
 * generate list schedules import.
 * @return array list time
 */
function mp_deals_importer_time() {
	return array(
		'in_one_minute' => array(
			'interval' => 60,
			'display' => 'In every Mintue'
		),
		'in_per_15_minutes' => array(
			'interval' => 60 * 15,
			'display' => 'In every 15 Mintues'
		),
		'in_per_30_minutes' => array(
			'interval' => 60 * 30,
			'display' => 'In every 30 Mintues'
		),
		'one_hourly' => array(
			'interval' => 60 * 60 * 1,
			'display' => 'Once in One Hours'
		),
		'two_hourly' => array(
			'interval' => 60 * 60 * 2,
			'display' => 'Once in Two Hours'
		),
		'three_hourly' => array(
			'interval' => 60 * 60 * 3,
			'display' => 'Once in Three Hours'
		)
	);
}

/**
 * importation
 * @param none
 * @return none
 */
function mp_deals_importer_do()
{
    // check plugin enabled
    if(get_option('mp-deal-importer-enable') != 'YES') {
		return false;
    }

    // check time for importing process...
    $debugMode = true;
    if(!$debugMode && time() - (int)get_option('mp-deal-importer-last-run') < get_option('mp-deal-importer-time')) {
		return;
    }

    // Importation process
    mp_deals_importer_all_deals();

    // update last run time (for schedule)
	update_option('mp-deal-importer-last-run',time());
}

/**
 * import deals
 * @param none
 * @return none
 */
function mp_deals_importer_all_deals() {
    // import food deals
    $foodUrl = get_option('mp-getdeal-feed-url-food');
    $maxFoodDeal = intval(get_option('mp-getdeal-feed-url-food-max'));
    $dealType = 'Eten';
    mp_deals_importer_type_of_deal($foodUrl, $maxFoodDeal, $dealType);

}

/**
 * import deals in a type
 * @param string $url url get data
 * @param int $maximumImportDeal
 * @param string $dealType type name
 * @return none
 */
function mp_deals_importer_type_of_deal($url = '', $maximumImportDeal = 0, $dealType = 'Eten') {
    $maxDeal = intval($maximumImportDeal) ? intval($maximumImportDeal) : 1;

    // get data
    $xml = @simplexml_load_file($url, null, LIBXML_NOCDATA);
    if(!$xml) {
		return false;
    }

    global $user_ID;
	$post_type = 'deal';
	$array_post_id = array();
	$total = 0;
    try {
        if (!isset($xml->item) || empty($xml->item)) {
            return false;
        }

        foreach ($xml->item as $post) {
            if ($total == $maxDeal) {
                break;
            }

            $trim_title = trim($post->title);
            $title_str = esc_attr(htmlspecialchars($trim_title));
            $check = get_page_by_title($title_str, 'ARRAY_A', $post_type);
            if (empty($check))
            {
                $post_desc = isset($post->description) ? $post->description : '';
                $post_commodation_desc = isset($post->accommodation_description) ? $post->accommodation_description : '';
                $content = '[tab:Over deze deal]';
                $content .= html_entity_decode($post_desc, ENT_QUOTES, 'UTF-8');
                $content .=	'[most_important_info]';
                $content .= html_entity_decode($post_commodation_desc, ENT_QUOTES, 'UTF-8');
                $content .=	'[/most_important_info]';
                $content .= '[tab:Meer informatie]';
                $content .= html_entity_decode($post->inclusief, ENT_QUOTES, 'UTF-8');
                $content .= '[tab:END]';

                $new_post = array(
                    'post_title' => $post->title,
                    'post_content' => $content,
                    'post_status' => 'publish',
                    'post_date' => date('Y-m-d H:i:s'),
                    'post_author' => $user_ID,
                    'post_type' => $post_type,
                    'filter' => true
                );

                //remove_filter('content_save_pre', 'wp_filter_post_kses');
                //remove_filter('content_filtered_save_pre', 'wp_filter_post_kses');
                $post_id = wp_insert_post($new_post);
                //add_filter('content_save_pre', 'wp_filter_post_kses');
                //add_filter('content_filtered_save_pre', 'wp_filter_post_kses');

                if ($post_id)
                {
                    $total ++;

                    // nu deal
                    list($day, $month, $year, $hour, $minute) = split('[/ :]', $post->start_date . ' ' . $post->start_time);
                    $start_timestamp = mktime((int) $hour, (int) $minute, 0, (int) $month, (int) $day, (int) $year);
                    list($day, $month, $year, $hour, $minute) = split('[/ :]', $post->end_date . ' ' . $post->end_time);
                    $end_timestamp = mktime((int) $hour, (int) $minute, 0, (int) $month, (int) $day, (int) $year);

                    update_post_meta($post_id, "status", '2');
                    update_post_meta($post_id, "is_show", '1'); // show on home ?
//                    update_post_meta($post_id, "owner_name", 'Boekvandaag.nl'); // ?
//                    update_post_meta($id, "owner_name", 'Nu Deal');
//                    update_post_meta($id, "owner_name", 'Dealdonkey');

                    update_post_meta($post_id, "current_price", (float)$post->maximum_price);
                    update_post_meta($post_id, "our_price", (float) $post->minimum_price);
                    update_post_meta($post_id, "coupon_type", 1);
                    update_post_meta($post_id, "coupon_link", (string)$post->link);
                    update_post_meta($post_id, "coupon_start_date_time", strtotime((string) $post->offer_valid_from_date));
                    update_post_meta($post_id, "coupon_end_date_time", strtotime((string) $post->offer_valid_to_date));
                    update_post_meta($post_id, "coupon_end_date_timef", strtotime((string) $post->offer_valid_to_date));
                    update_post_meta($post_id, "file_name", (string)$post->img_medium);
                    update_post_meta($post_id, "is_expired", '0');
                    wp_set_object_terms($post_id, (array) $post->category, 'deal-categorie', true);
                    wp_set_object_terms($id, isset($post->category) ? (array)$post->category : 'Nu Deal','deal-categorie', true);
                    wp_set_object_terms($id, isset($post->category) ? (array)$post->category : 'Verassingen','deal-categorie', true);
                    /*
                      if(function_exists('mp_getdeal_post_on_fb'))
                      {
                      $p = query_posts("p=$post_id&post_type=$post_type");
                      mp_getdeal_post_on_fb($p,$post->img_medium);
                      }
                     */

                    // nu deal
					update_post_meta($id, "coupon_start_date_time", $start_timestamp);
					update_post_meta($id, "coupon_end_date_time", $end_timestamp);
					update_post_meta($id, "coupon_end_date_timef", $end_timestamp);

                    // donkey
					update_post_meta($id, "coupon_start_date_time", strtotime(date('Y-m-d 00:00:00')));
					update_post_meta($id, "coupon_end_date_time", strtotime((string)$post->time_end));
					update_post_meta($id, "coupon_end_date_timef", strtotime((string)$post->time_end));
					update_post_meta($id, "file_name", (string)$post->img_small);

                }
                $array_post_id[] = $post_id;
            }
        }
    }
    catch (Exception $ex) {
//		send_report(time().var_dump($ex));
    }
    //send_report('Success '.time()."<br/>".var_dump($array_post_id));
}