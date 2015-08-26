<?php
include('header.php');
global $post;
the_post();

$current_term = get_the_terms($post->ID, TAXONOMY_DEAL);
$exclude_id = (!empty($current_term)) ? $current_term[0]->term_id : 0;
$deals = get_five_deal_home($exclude_id);
?>

<section class="great-deals">
    <div class="container">
        <!--======= TITTLE =========-->
        <div class="tittle left">
            <h1><?php the_title() ?></h1>
        </div>
        <div class="coupon">
            <ul class="row">
                <!--======= COUPEN DEALS =========-->
                <li class="col-sm-4">
                    <div class="coupon-inner deal_<?php echo check_index_deal($exclude_id) ?>">
                        <div class="top-tag"> <span class="eten"><span><?php echo $current_term[0]->name; ?></span></span></div>
                        <div class="c-img">
                            <img class="img-responsive" src="<?php echo get_field("file_name"); ?>" alt="">
                            <a class="head" href="<?php echo get_field("coupon_link"); ?>"><?php the_title() ?></a>
                            <?php echo get_time_remain(get_field("coupon_end_time"), get_field("coupon_end_date_time")) ?>
                            <div class="text-center"> <a href="<?php echo get_field("coupon_link"); ?>" class="btn"><?php echo $fivy_options["home_button_deal"] ?></a></div>
                            <div class="text-center"><div class="fb-like" data-href="<?php echo get_permalink() ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></div>
                        </div>

                    </div>
                </li>
                <li class="col-sm-7">
                    <div class="coupon-inner-detail">
                        <a class="head"><?php echo $fivy_options["detail_deal_about_deal"] ?></a>
                        <p><?php the_content() ?></p>
                        <div class="text-left"> <a href="<?php echo get_field("coupon_link"); ?>" class="btn"><?php echo $fivy_options["home_button_deal"] ?></a></div>
                    </div>
                </li>
            </ul>
        </div>

        <!--======= TITTLE =========-->
        <div class="tittle more-deal left">
            <h1><?php echo $fivy_options["detail_deal_other_deal"] ?></h1>
        </div>
        <div class="coupon coupon_other">
            <ul class="row">
                <!--======= COUPEN DEALS =========-->
                <?php
                $count_item = 1;
                $count = 1;
                foreach ($deals as $deal) {
                    if (empty($deal)) {
                        $count++;
                        continue;
                    }

                    if ($count_item === 3) {
                        ?>
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
                    <?php }
                        $count_item++;
                    ?>

                    <li class="col-sm-4">
                        <div class="coupon-inner deal_<?php echo $count++; ?>">
                            <div class="top-tag"> <span class="eten"><span><?php echo get_term_name_by_deal($deal->ID); ?></span></span></div>
                            <div class="c-img">
                                <img class="img-responsive" src="<?php echo get_field("file_name", $deal->ID); ?>" alt="">
                                <a class="head" href="<?php echo get_permalink($deal->ID) ?>"><?php echo $deal->post_title ?></a>
                                <?php echo get_time_remain(get_field("coupon_end_time", $deal->ID), get_field("coupon_end_date_time", $deal->ID)) ?>
                                <div class="text-center"> <a href="<?php echo get_permalink($deal->ID) ?>" class="btn"><?php echo $fivy_options["home_button_deal"] ?></a></div>
                                <div class="text-center">
                                    <div class="fb-like" data-href="<?php echo get_permalink($deal->ID) ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                                </div>  
                            </div>
                        </div>
                    </li>
                <?php  } ?>
            </ul>
        </div>
    </div>
</section>


<?php include('footer.php') ?>

<script type='text/javascript'>
    var max_heght_coupon = 0;
    jQuery(".great-deals .coupon_other ul > li .coupon-inner").each(function(){
        height = jQuery(this).outerHeight();
        if(height > max_heght_coupon){
            max_heght_coupon = height;
        }
    });
    
    jQuery(".great-deals .coupon_other  ul > li .coupon-inner").css("min-height", max_heght_coupon + 90 + "px");
</script>