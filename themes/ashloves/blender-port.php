<?php
/**
 * Template Name: Blender Art Main Page
 * 
 * @package ASH_LOVES
 */

get_header();
?>

<main id="main" class="site-main" role="main">
    <?php get_template_part( '/template-parts/header/nav' ); ?>
    <div class="container page"><?php
        $loop = new WP_Query(
            array(
                'post_type' => 'blender',
                'posts_per_page' => -1 
            )
        ); ?>

        <div class="floating-div">
            <div>
                <?php the_content(); ?>
            </div>
        </div>
       
        <div class="grid">
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <?php
            $categories = get_the_category($args);
            $slugs = wp_list_pluck($categories, 'slug');
            $class_names = join(' ', $slugs);
            ?>

            <article class="blender-portfolio-item">
                <div class="port-inner">
                    <a href="<?php the_permalink(); ?>" class="js-item <?php if ($class_names) { echo ' ' . $class_names;} ?>">
                        <div class="single">
                            <img src="<?php the_post_thumbnail(); ?>">
                           
                            <div class="overlay">
                                 <h2><?php the_title(); ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
            </article>

   
            <?php endwhile; ?>
          </div>
    </div>
</main>

<?php
get_footer();