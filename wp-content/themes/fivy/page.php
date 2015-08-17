<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="scream">
    <div class="container">
      <!--======= TITTLE =========-->
      <div class="tittle">
        <h1><?php echo get_the_title(); //page tilte filter?></h1>
      </div>
	  <?php the_content(); ?>
    </div>
</section>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();?>