<?php get_header(); ?>

<?php
global $fivy_options;

$deals = array();
for ($i = 1; $i <= 5; $i++) {
    $cat_id = $fivy_options["home_deal_cat{$i}"];
    $deals[] = array(
        'name' => get_term_by('id', absint($cat_id), TAXONOMY_DEAL)->name,
        'deal' => get_one_deal_by_cat($cat_id)
    );
}

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
                <?php $count=1; foreach ($deals as $deal) { ?>
                    <li class="col-sm-4">
                        <div class="coupon-inner deal_<?php echo $count++;?>">
                            <div class="top-tag"> <span class="eten"><span><?php echo $deal["name"]?></span></span></div>
                            <div class="c-img">
                                <img class="img-responsive" src="<?php echo get_field( "file_name", $deal["deal"]->ID ); ?>" alt="">
                                <a class="head" href="<?php echo get_permalink($deal["deal"]->ID) ?>"><?php echo $deal["deal"]->post_title?></a>
                                <p class="timer">nog: 15 uur 51 min 24 sec</p>
                                <div class="text-center"> <a href="<?php echo get_permalink($deal["deal"]->ID) ?>" class="btn"><?php echo $fivy_options["home_button_deal"] ?></a></div>
                                <div class="text-center">
                                    <div class="fb-like" data-href="<?php echo $fivy_options["header_fb_like"]?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
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
                                <script type="text/javascript">
                                    google_ad_client = "<?php echo $fivy_options['sponsor-google-client']; ?>";
                                    google_ad_slot = "<?php echo $fivy_options['sponsor-google-slot']; ?>";
                                    google_ad_width = <?php echo $fivy_options['sponsor-google-width']; ?>;
                                    google_ad_height = <?php echo $fivy_options['sponsor-google-height']; ?>;
                                </script>
                                <!-- Fivy [square] -->
                                <script type="text/javascript" src="//pagead2.googlesyndication.com/pagead/show_ads.js"></script>
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