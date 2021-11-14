<?php
/**
 * Main Template file
 * 
 * @package ASH_LOVES
 */
?>
<?php 
get_header(); 
$header_group_args = get_field('header_group');
$header_group_args['title'] = get_the_title();
$related_news_product_args = get_field('related_products');
$related_news_args = get_field('related_news');
?>
<main id="main" class="index single-post" role="main">
  <?php get_template_part( 'template-parts/header/header', null, $header_group_args ); ?>
  <!-- Start the Loop. -->
  <?php if ( have_posts() ) {
    while ( have_posts() ) {
      the_post(); ?>

      <div class="entry centered">
        <?php the_content(); ?>
      </div>

  <?php
    }
  } 
 ?>
  <?php get_template_part( 'template-parts/components/related', 'news-product', $related_news_product_args ); ?>
  <?php get_template_part( 'template-parts/components/related', 'news', $related_news_args ); ?>
</main>
<?php get_footer(); ?>