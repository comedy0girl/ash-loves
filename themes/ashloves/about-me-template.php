<?php
/**
 * Template Name: About Me
 * 
 * @package ASH_LOVES
 */

get_header();
?>

<main id="main" class="site-main" role="main">
  <?php get_template_part( '/template-parts/header/header' ); ?> 
  <div class="centered">
    <?php the_content(); ?>
  </div>
  <!-- <?php get_template_part( '/template-parts/components/contact', 'form'); ?> -->
</main>

<?php
get_footer();