<?php
/**
 * 404 template
 * 
 * @package ASH_LOVES
 */
get_header();
$masthead_image = get_field( 'masthead_image' );
$header_args = [ "title" => '404', "image" => $masthead_image ];

?>
<div class="primary index cat">
  <main id="main" class="site-main mt-5" role="main">
    <?= get_template_part('template-parts/components/header', null, $header_args) ?>
    <div class="centered mb-100">
      <h1>404 Error</h1>
      <h3>We couldn't find the page you were looking for.</h3>
    </div>
  </main>
</div>
<?php
get_footer();