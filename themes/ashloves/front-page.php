<?php
/**
 * Template Name: Front Page
 * 
 * @package ASH_LOVES
 */

get_header();
?>

<?php get_template_part( '/template-parts/header/nav' ); ?> 

<main id="main" class="site-main" role="main">

  <div class="home-header">
    <div class="tp-parallax-wrap">
      <div class="tp-caption squishy animate__animated animate__bounceInDown animate__delay-2s" id="squishy">
      </div>
    </div>
    <div class="titles">
      <h1 class="animate__rubberBand">Ash loves</h1>
    </div>
  </div>

  <section class="what-i-do">
    <h2>What I do</h2>
    <div class="boxes-inner"><?php

    // Check rows exists.
    if( have_rows('portfolio_boxes') ):

        // Loop through rows.
        while( have_rows('portfolio_boxes') ) : the_row(); 

      
          $post_object = get_sub_field('project_boxes'); ?>

<?php if( $post_object ): ?>
      <?php
          // override $post
          $post = $post_object;
          setup_postdata( $post );
      ?>
     
      <div class="boxey">
       <a href="<?php echo get_permalink( $post->ID ); ?>">
        <h2 class="shadow-stroke"><?php the_title(); ?>
         
        </h2>


         <div class="shadow"></div>
        </a>
      </div>
      

      <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

        <?php endif; ?>
  <?php endwhile; ?>

<?php endif; ?></div>

   
  </section>


  <section class="come-back-soon">
      <h2>Keep in touch!</h2>
  </section>



</main>

<?php
get_footer();