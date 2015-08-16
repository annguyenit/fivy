<!-- MAP --> 
<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false'></script> 
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/mapmarker.js"></script> 
<script type="text/javascript">
	// Use below link if you want to get latitude & longitude
	// http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude.php	
	$(document).ready(function(){
	
		//set up markers 
		var myMarkers = {"markers": [
                            {
                                "latitude": "<?php the_field('contact_latitude'); ?>",
                                "longitude":"<?php the_field('contact_longitude');?>",
                                "icon": "<?php echo esc_url( get_template_directory_uri() ); ?>/images/map-locator.png",
                                "baloon_text": '<?php the_field('contact_text_marker');?>'
                            }
			]
		};
		
		//set up map options
		$("#map").mapmarker({
			zoom	: 18,
			center	: '<?php the_field('contact_text_marker');?>',
			markers	: myMarkers
		});

	});
</script>