<?php

?>
<?php get_template_part( '/template-parts/header/nav' ); ?>
<header class="mb-100">
	<section class="header"><?php
		echo get_the_post_thumbnail(); ?>
		<h1><?php the_title(); ?></h1>
	</section>
</header>
