<?php
include('header.php');
global $post;
the_post();
?>

<section class="scream">
    <div class="container">        
        <?php get_template_part('content', 'single'); ?>
    </div>
</section>
<?php include('footer.php') ?>
