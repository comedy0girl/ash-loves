<?php
$data = $block['data'];
$title = $data['title'];
$background_image_id = $data['background_image'];


// pre_r($overlay_colour);
$template = array(
	array('core/heading', array(
		'level' => 1,
		'placeholder' => 'Title goes here',
	)),
	array( 'core/paragraph', array(
		'placeholder' => 'Sub heading goes here',
	) )
);
$allowed_blocks = array( 'core/heading', 'core/paragraph' );
?>

<header class="small-cover">
    
        <div class="background-image m">
            <?= nature_tint_get_full_width_picture_tag($background_image_id); ?>
        </div>
          <div class="nature-tint-cover_text">
          	<?php echo $title ?>
            <InnerBlocks
                template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>"
                allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks ) ); ?>"   
            />
            </div>
</header>