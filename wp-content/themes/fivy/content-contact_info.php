<!--======= CONTACT =========-->
<div class="col-sm-6">
    <?php if (get_field('contact_descriptions_label')): ?>
        <h3><?php the_field('contact_descriptions_label'); ?></h3>
    <?php endif; ?>
    <?php if (get_field('contact_description')): ?>
        <?php the_field('contact_description'); ?>
    <?php endif; ?>
    
    <ul class="con-det">
        
        <!--======= ADDRESS =========-->
        <?php if (get_field('contact_location')):?>
        <li><i class="fa fa-map-marker"></i>
            <?php if (get_field('contact_location_label')): ?>
                <h6><?php the_field('contact_location_label'); ?></h6>
            <?php endif; ?>
            <?php the_field('contact_location'); ?>
        </li>
        <?php endif; ?>
        
        <!--======= EMAIL =========-->
        <?php if (get_field('contact_email')):?>
        <li><i class="fa fa-envelope"></i>
            <?php if (get_field('contact_email_label')): ?>
                <h6><?php the_field('contact_email_label'); ?></h6>
            <?php endif; ?>
            <p><?php the_field('contact_email'); ?></p>
        </li>
        <?php endif; ?>
        
        <!--======= ADDRESS =========-->
        <?php if (get_field('contact_phone')):?>
        <li><i class="fa fa-phone"></i>
            <?php if (get_field('contact_phone_label')): ?>
                <h6><?php the_field('contact_phone_label'); ?></h6>
            <?php endif; ?>
            <p><?php the_field('contact_phone'); ?></p>
        </li>
        <?php endif; ?>
    </ul>

    <!--======= SOCIAL ICON =========-->
    <ul class="social_icons">
        <?php if (get_field('contact_social_facebook')): ?>
        <li class="facebook"> <a target="_blank" href="<?php the_field('contact_social_facebook'); ?>"><i class="fa fa-facebook"></i> </a></li>
        <?php endif; ?>
        <?php if (get_field('contact_social_twitter')): ?>
        <li class="twitter"> <a target="_blank" href="<?php the_field('contact_social_twitter'); ?>"><i class="fa fa-twitter"></i> </a></li>
        <?php endif; ?>
        <?php if (get_field('contact_social_linkedin')): ?>
        <li class="linkedin"> <a target="_blank" href="<?php the_field('contact_social_linkedin'); ?>"><i class="fa fa-linkedin"></i> </a></li>
        <?php endif; ?>
        <?php if (get_field('contact_social_tumblr')): ?>
        <li class="tumblr"> <a target="_blank" href="<?php the_field('contact_social_tumblr'); ?>"><i class="fa fa-tumblr"></i> </a></li>
        <?php endif; ?>
        <?php if (get_field('contact_social_gg')): ?>
        <li class="googleplus"> <a target="_blank" href="<?php the_field('contact_social_gg'); ?>"><i class="fa fa-google-plus"></i> </a></li>
        <?php endif; ?>
        <?php if (get_field('contact_social_flickr')): ?>
        <li class="flicker"> <a target="_blank" href="<?php the_field('contact_social_flickr'); ?>"><i class="fa fa-flickr"></i> </a></li>
        <?php endif; ?>
        <?php if (get_field('contact_social_dribbble')): ?>
        <li class="dribbble"> <a target="_blank" href="<?php the_field('contact_social_dribbble'); ?>"><i class="fa fa-dribbble"></i> </a></li>
        <?php endif; ?>
        <?php if (get_field('contact_social_skype')): ?>
        <li class="skype"> <a target="_blank" href="<?php the_field('contact_social_skype'); ?>"><i class="fa fa-skype"></i> </a></li>
        <?php endif; ?>
        <?php if (get_field('contact_social_behance')): ?>
        <li class="behance"> <a target="_blank" href="<?php the_field('contact_social_behance'); ?>"><i class="fa fa-behance"></i> </a></li>
        <?php endif; ?>
        <?php if (get_field('contact_social_vimeo')): ?>
        <li class="vimeo"> <a target="_blank" href="<?php the_field('contact_social_vimeo'); ?>"><i class="fa fa-square"></i> </a></li>
        <?php endif; ?>
        <?php if (get_field('contact_social_youtube')): ?>
        <li class="youtube"> <a target="_blank" href="<?php the_field('contact_social_youtube'); ?>"><i class="fa fa-youtube"></i> </a></li>
        <?php endif; ?>
        <?php if (get_field('contact_social_instagram')): ?>
        <li class="instagram"> <a target="_blank" href="<?php the_field('contact_social_instagram'); ?>"><i class="fa fa-instagram"></i> </a></li>
        <?php endif; ?>
    </ul>
</div>