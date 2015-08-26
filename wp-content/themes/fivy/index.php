<?php get_header(); ?>

<?php
global $fivy_options;

$deals = get_five_deal_home();

?>
<section class="great-deals">
    <div class="container">
        <!--======= TITTLE =========-->
        <div class="tittle">
            <h1><?php echo $fivy_options['home_title']; ?></h1>
        </div>
        <div class="coupon">
            <ul class="row">
                <!--======= COUPEN DEALS =========-->
                <?php
                    $count=1;
                    foreach ($deals as $deal) {
                        if(empty($deal)){
                            $count++;
                            continue;
                        }
						
                ?>
                
                    <li class="col-sm-4">
                        <div class="coupon-inner deal_<?php echo $count++;?>">
                            <div class="top-tag"> <span class="eten"><span><?php echo get_term_name_by_deal( $deal->ID ) ?></span></span></div>
                            <div class="c-img">
                                <a href="<?php echo get_permalink($deal->ID) ?>"><img class="img-responsive" src="<?php echo get_field( "file_name", $deal->ID ); ?>" alt=""></a>
                                <a class="head" href="<?php echo get_permalink($deal->ID) ?>"><?php echo $deal->post_title?></a>
                                <?php echo get_time_remain(get_field( "coupon_end_time", $deal->ID ), get_field( "coupon_end_date_time", $deal->ID )) ?>
                                <div class="text-center"> <a href="<?php echo get_permalink($deal->ID) ?>" class="btn"><?php echo $fivy_options["home_button_deal"] ?></a></div>
                                <div class="text-center">
                                    <div class="fb-like" data-href="<?php echo get_permalink($deal->ID) ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                                </div>
                            </div>

                        </div>
                    </li>
                <?php } ?>


                
                <li class="col-sm-4">
                    <div class="coupon-inner">
                        <div class="top-tag">
                            <span class="sponsor"><?php echo $fivy_options['sponsor-title']; ?></span>
                        </div>
                        <div class="c-img">
                            <div class="text-center">
                                <p><?php echo $fivy_options['sponsor-content']; ?></p>
								
								<?php if($fivy_options['sponsor-google-active'] == '1'){?>
                                <script type="text/javascript">
                                    google_ad_client = "<?php echo $fivy_options['sponsor-google-client']; ?>";
                                    google_ad_slot = "<?php echo $fivy_options['sponsor-google-slot']; ?>";
                                    google_ad_width = <?php echo $fivy_options['sponsor-google-width']; ?>;
                                    google_ad_height = <?php echo $fivy_options['sponsor-google-height']; ?>;
                                </script>
                                <!-- Fivy [square] -->
                                <script type="text/javascript" src="//pagead2.googlesyndication.com/pagead/show_ads.js"></script>
								<?php }else{?>
									<img style="width:100%;" src="<?php echo $fivy_options['sponsor-google-image']['url']?>"/>
								<?php } ?>
                                <a href="<?php echo $fivy_options['sponsor-button-url']; ?>" class="btn btn-sponsor"><?php echo $fivy_options['sponsor-button-text']; ?></a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<?php get_footer(); ?>

<script type='text/javascript'>
    var max_heght_coupon = 0;
    jQuery(".great-deals .coupon ul > li .coupon-inner").each(function(){
        height = jQuery(this).outerHeight();
        if(height > max_heght_coupon){
            max_heght_coupon = height;
        }
    });
    
    jQuery(".great-deals .coupon  ul > li .coupon-inner").css("min-height", max_heght_coupon + 90 + "px");
</script>