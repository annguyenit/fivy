<?php
/* Template Name: Contact Template */

get_header(); ?>
<!--======= CONTACT =========-->
<section class="contact">
    <?php
    if (get_field('contact_show_map') && get_field('contact_show_map') == 'Yes') :?>
        <!--======= MAP =========-->
        <div id="map"></div>
    <?php endif; ?>
    <div class="container"> 

        <!--======= CONTACT INFORMATION =========-->
        <div class="contact-info">
            <div class="row">
                <?php
                // Start the loop.
                while ( have_posts() ) : the_post();
                        // Include the page content template.
                        get_template_part( 'content', 'contact_info' );
                        get_template_part( 'content', 'contact_form' );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                        //    comments_template();
                        endif;
                // End the loop.
                endwhile;
                ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer();
