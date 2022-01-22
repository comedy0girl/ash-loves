<?php
/**
 * Template Name: Single Portfolio
 * 
 * @package ASH_LOVES
 */
?>
<?php get_header(); ?>

<main id="main" class="site-main" role="main">
    <?php get_template_part( '/template-parts/header/header' ); ?> 

    <div class="centered">
      <?php the_content(); ?>
    </div>
</main>
<?php get_footer(); ?>