<?php
/**
 * Template Name: Projects Main
 * 
 * @package ASH_LOVES
 */

get_header();
?>

<main id="main" class="site-main" role="main">

<?php 
  $pages = get_pages(); 
  foreach ( $pages as $page ) { ?>
    <div class="split-slider">
      <div class="split-left">
        <div>
          <h2><?php echo $page->post_title; ?></h2>
          </div>
      </div>
      <div class="split-right">
        <?php $pageFeatured = get_the_post_thumbnail($page->ID); ?>
        <img src="<?= $pageFeatured ?>">
      </div>
    </div><?php 
  } ?>




</main>

<?php
get_footer();