<?php
/**
 * Register Block Class
 * 
 * @package ACF Guten Blocks
 */

class ACF_Register_Block {


    function __construct() {
        add_action('acf/init', [ $this, 'register_blocks' ]);
    }

    public function register_blocks() {
        if( function_exists('acf_register_block_type') ) {

             // Before and After slider
            acf_register_block_type([
              'name'              => 'Before and After',
              'title'             => __('Before and After'),
              'description'       => __('Chart with colors and links'),
              'render_template'   => ACF_BLOCK_TEMPLATE_PATH . 'before-after.php',
              'enqueue_style'     => plugin_dir_url( __DIR__ ) . '/build/css/beforeAfter.css',
              'category'          => 'cc-block',
              'mode' => 'edit'
            ]);


        }
    }




     // Register a cover block
    acf_register_block_type([
      'name'              => 'Short Cover',
      'title'             => __('Smaller Cover'),
      'description'       => __('A custom block for the cover section'),
      'render_template'   => ACF_BLOCK_TEMPLATE_PATH . 'cover-small.php',
      'enqueue_assets'    => function() {
        wp_enqueue_style( 'block-cover-css', plugin_dir_url( __DIR__ ) . '/build/css/cover.css', [],  filemtime( untrailingslashit( plugin_dir_path(__DIR__) ) . '/build/css/cover.css' ));
        wp_enqueue_script( 'block-cover-js', plugin_dir_url( __DIR__ ) . '/build/js/cover.js', [],  filemtime( untrailingslashit( plugin_dir_path(__DIR__) ) . '/build/js/cover.js' ) );
      },
      'supports'    => [
        'jsx'       => true,
      ],
      'category'          => 'Ash-blocks',
      'mode' => 'edit'
    ]);

           

}
new ACF_Register_Block();