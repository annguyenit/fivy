<?php
    global $fivy_options;
?>
<!--======= FOOTER =========-->
  <footer>
    <div class="container">
      <ul class="row">
        <li class="col-sm-4">
        <?php
            if (isset($fivy_options['footer-text-block-title'])) {
                echo '<h3>' . $fivy_options['footer-text-block-title'] . '</h3>';
            }
        ?>
        <?php
            if (isset($fivy_options['footer-text-block-content'])) {
                echo $fivy_options['footer-text-block-content'];
            }
        ?>
        </li>
        <li class="col-sm-4">
          <div class="fb-page" data-href="https://www.facebook.com/fivydeals" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/fivydeals"><a href="https://www.facebook.com/fivydeals">Fivy</a></blockquote></div></div>
        </li>
        <li class="col-sm-4">
          <div class="subcribe">
            <h3>MIS GEEN ENKELE DEAL!</h3>
            <?php
                echo do_shortcode($fivy_options['footer-text-block-form']);
            ?>
<!--            <input class="form-control" placeholder="Email Address" type="search">
            <button type="submit">AANMELDEN!</button>-->
          </div>
        </li>
      </ul>
    </div>
  </footer>
</div>
<div id="fb-root"></div>
<?php wp_footer(); ?>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery-1.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/wow.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery_002.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery_003.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/owl.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery_004.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/own-menu.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/main.js"></script>

<?php
// INIT MAP
if (get_field('contact_show_map') && get_field('contact_show_map') == 'Yes') {
    get_template_part( 'content', 'map_init' );
}
?>
</body>
</html>