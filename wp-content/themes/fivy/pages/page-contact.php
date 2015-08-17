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
                        ?>
                        <!--======= CONTACT FORM =========-->
                        <div class="col-sm-6">
                            <div id="contact_message" class="success-msg"> <i class="fa fa-paper-plane-o"></i>Thank You. Your Message has been Submitted</div>
                            <form role="form" id="contact_form" method="post" onSubmit="return false">
                                <ul>
                                    <li>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                    </li>
                                    <li>
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                                    </li>
                                    <li>
                                        <input type="text" class="form-control" name="company" id="company" placeholder="Company">
                                    </li>
                                    <li>
                                        <input type="text" class="form-control" name="website" id="website" placeholder="Website">
                                    </li>
                                    <li>
                                        <textarea class="form-control" name="message" id="message" rows="5" placeholder="Message"></textarea>
                                    </li>
                                    <li>
                                        <button type="submit" value="submit" class="btn" id="btn_submit" onClick="proceed();">SEND MESSAGE</button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <?php
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
