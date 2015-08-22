<?php
add_action('admin_menu', 'mp_deal_importer_option_page');

function mp_deal_importer_option_page() {
    add_options_page('Deals Afiliate Importer Options', 'Afiliate Importer', 'manage_options', 'facebook-deal-importer-options', 'mp_deal_importer_setting_page');
}
add_action('admin_init','mp_deal_importer_setting');

function mp_deal_importer_setting() {
    register_setting('mp-fb-deal-importer','mp-getdeal-feed-url-food');
    register_setting('mp-fb-deal-importer','mp-getdeal-feed-url-food-max');
    register_setting('mp-fb-deal-importer','mp-getdeal-feed-url-fun');
    register_setting('mp-fb-deal-importer','mp-getdeal-feed-url-fun-max');
    register_setting('mp-fb-deal-importer','mp-getdeal-feed-url-vacation');
    register_setting('mp-fb-deal-importer','mp-getdeal-feed-url-vacation-max');
    register_setting('mp-fb-deal-importer','mp-getdeal-feed-url-gadgets');
    register_setting('mp-fb-deal-importer','mp-getdeal-feed-url-gadgets-max');
    register_setting('mp-fb-deal-importer','mp-getdeal-feed-url-smallvacation');
    register_setting('mp-fb-deal-importer','mp-getdeal-feed-url-smallvacation-max');

    register_setting('mp-fb-deal-importer','mp-deal-importer-enable');
    register_setting('mp-fb-deal-importer','mp-deal-importer-time');
}

function mp_deal_importer_setting_page() {
?>
    <div class="wrap">
        <?php screen_icon(); ?>
        <h2>Afiliate Importer Settings</h2>
        <form id="origin_setting" method="post" action="options.php">
        <?php settings_fields('mp-fb-deal-importer'); ?>
			<p>Enable Affiliate Feed Importer?<br/>
			<select name="mp-deal-importer-enable" id="mp-deal-importer-enable">
				<option value="YES"<?php if(get_option('mp-deal-importer-enable') == 'YES') echo ' selected'; ?>>YES</option>
				<option value="NO"<?php if(get_option('mp-deal-importer-enable') == 'NO') echo ' selected'; ?>>NO</option>
			</select>
			</p>
			<p>Feed URL for Eten<br/><input type="text" size="50" value="<?php echo get_option('mp-getdeal-feed-url-food'); ?>" name="mp-getdeal-feed-url-food" /></p>
			<p>Maximum deal for Eten<br/><input type="text" size="10" value="<?php echo get_option('mp-getdeal-feed-url-food-max'); ?>" name="mp-getdeal-feed-url-food-max" /></p>
			<p>Feed URL for Fun<br/><input type="text" size="50" value="<?php echo get_option('mp-getdeal-feed-url-fun'); ?>" name="mp-getdeal-feed-url-fun" /></p>
			<p>Maximum deal for Fun<br/><input type="text" size="10" value="<?php echo get_option('mp-getdeal-feed-url-fun-max'); ?>" name="mp-getdeal-feed-url-fun-max" /></p>
			<p>Feed URL for Vakantie<br/><input type="text" size="50" value="<?php echo get_option('mp-getdeal-feed-url-vacation'); ?>" name="mp-getdeal-feed-url-vacation" /></p>
			<p>Maximum deal for Vakantie<br/><input type="text" size="10" value="<?php echo get_option('mp-getdeal-feed-url-vacation-max'); ?>" name="mp-getdeal-feed-url-vacation-max" /></p>
			<p>Feed URL for Gadget<br/><input type="text" size="50" value="<?php echo get_option('mp-getdeal-feed-url-gadgets'); ?>" name="mp-getdeal-feed-url-gadgets" /></p>
			<p>Maximum deal for Gadget<br/><input type="text" size="10" value="<?php echo get_option('mp-getdeal-feed-url-gadgets-max'); ?>" name="mp-getdeal-feed-url-gadgets-max" /></p>
			<p>Feed URL for Tussenuit<br/><input type="text" size="50" value="<?php echo get_option('mp-getdeal-feed-url-smallvacation'); ?>" name="mp-getdeal-feed-url-smallvacation" /></p>
			<p>Maximum deal for Tussenuit<br/><input type="text" size="10" value="<?php echo get_option('mp-getdeal-feed-url-smallvacation-max'); ?>" name="mp-getdeal-feed-url-smallvacation-max" /></p>
			<p>Update Time<br/>
			<select name="mp-deal-importer-time" id="mp-deal-importer-time">
				<option value="21600"<?php if(get_option('mp-deal-importer-time') == '21600') echo ' selected'; ?>>6 hours</option>
				<option value="43200"<?php if(get_option('mp-deal-importer-time') == '43200') echo ' selected'; ?>>12 hours</option>
				<option value="86400"<?php if(get_option('mp-deal-importer-time') == '86400') echo ' selected'; ?>>1 day</option>
				<option value="172800"<?php if(get_option('mp-deal-importer-time') == '172800') echo ' selected'; ?>>2 days</option>
			</select>
			<?php submit_button(); ?>
        </form>
    </div>
<?php }