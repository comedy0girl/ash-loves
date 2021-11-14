<?php
/**
 * Enqueue theme assets
 * 
 * @package ASH_LOVES
 */

namespace Inc\ThemeSetup;

use Inc\Traits\Singleton;

class Assets {
  use Singleton;


  protected function __construct() {
    // load class.
    $this->setup_hooks();
  }
  
  protected function setup_hooks() {
    /**
     * Actions
     */
    add_action( 'wp_enqueue_scripts', [$this, 'replace_core_jquery_version'] );
    add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );
    add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts'] );
    add_action( 'wp_enqueue_scripts', [ $this, 'remove_block_css'] );
    
    // Disable editor on pages
    // add_action('init', [ $this, 'my_remove_editor_from_post_type' ]);

    // Remove Emoji Styles & Scripts
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
    remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
  }


  /**
   * Register the styles and then conditionally load them into certain pages
   */
  public function register_styles() {

    /**
     * Register the styles
     */
    wp_register_style( 'front-page-css', ASH_LOVES_DIR_PATH_URI . '/assets/build/css/frontPage.css', [], filemtime( ASH_LOVES_DIR_PATH . '/assets/build/css/frontPage.css' ), 'all' );
    wp_register_style( 'about-css', ASH_LOVES_DIR_PATH_URI . '/assets/build/css/about.css', [], filemtime( ASH_LOVES_DIR_PATH . '/assets/build/css/about.css' ), 'all' );
    wp_register_style( 'portfolio-css', ASH_LOVES_DIR_PATH_URI . '/assets/build/css/portfolio.css', [], filemtime( ASH_LOVES_DIR_PATH . '/assets/build/css/portfolio.css' ), 'all' );
     wp_register_style( 'singles-css', ASH_LOVES_DIR_PATH_URI . '/assets/build/css/singles.css', [], filemtime( ASH_LOVES_DIR_PATH . '/assets/build/css/singles.css' ), 'all' );
    
    
    
    /**
     * Conditionally load in the styles on pages
     */
    if ( is_front_page() ) {
      wp_enqueue_style( 'front-page-css' );
    } 
    elseif ( is_page_template('about-me-template.php') ) {
      wp_enqueue_style( 'about-css' );
    }
    elseif ( is_page_template('blender-port.php') ) {
      wp_enqueue_style( 'portfolio-css' );
    }
    elseif ( is_page_template('single-blender.php') ) {
      wp_enqueue_style( 'singles-css' );
    }
  }

  /**
   * Register the scripts and then conditionally load them into certain pages
   */
  public function register_scripts() {
    /**
     * Register the scripts
     */
    wp_register_script( 'front-page-js', ASH_LOVES_DIR_PATH_URI . '/assets/build/js/frontPage.js', [], filemtime( ASH_LOVES_DIR_PATH . '/assets/build/js/frontPage.js' ), 'all' );

    wp_register_script( 'about-js', ASH_LOVES_DIR_PATH_URI . '/assets/build/js/about.js', [], filemtime( ASH_LOVES_DIR_PATH . '/assets/build/js/about.js' ), 'all' );

    wp_register_script( 'portfolio-js', ASH_LOVES_DIR_PATH_URI . '/assets/build/js/portfolio.js', [], filemtime( ASH_LOVES_DIR_PATH . '/assets/build/js/portfolio.js' ), 'all' );

     wp_register_script( 'singles-js', ASH_LOVES_DIR_PATH_URI . '/assets/build/js/singles.js', [], filemtime( ASH_LOVES_DIR_PATH . '/assets/build/js/singles.js' ), 'all' );
    
    
    $site_data = [
      'root_url' => get_site_url(),
      'nonce' => wp_create_nonce('wp_rest')
    ];

    /**
    * Conditionally load in the styles on pages
    */
    if ( is_front_page() ) {
      wp_enqueue_script( 'front-page-js' );
    }
    elseif ( is_page_template('about-me-template.php') ) {
      wp_enqueue_script( 'about-js' );
    }
     
    elseif ( is_page_template('blender-port.php') ) {
      wp_enqueue_script( 'portfolio-js' );
    }
    elseif ( is_page_template('single-blender.php') ) {
      wp_enqueue_script( 'singles-js' );
    }

   
   
  }

  public function remove_block_css() {
    wp_dequeue_style( 'wp-block-library' ); // WordPress core
    wp_dequeue_style( 'wp-block-library-theme' ); // WordPress core
    wp_dequeue_style( 'wc-block-style' ); // WooCommerce
    wp_dequeue_style( 'storefront-gutenberg-blocks' ); // Storefront theme
  }

  /**
   * Disabling the Gutenberg editor all post types except post.
   *
   * @param bool   $can_edit  Whether to use the Gutenberg editor.
   * @param string $post_type Name of WordPress post type.
   * @return bool  $can_edit
   */
  public function gutenberg_can_edit_post_types( $can_edit, $post_type ) {
    $gutenberg_supported_types = array( 'news' );
    if ( ! in_array( $post_type, $gutenberg_supported_types, true ) ) {
      $can_edit = false;
    }
    return $can_edit;
  }

  public function my_remove_editor_from_post_type() {
      remove_post_type_support( 'page', 'editor' );
      remove_post_type_support( 'page', 'discussion' );
      remove_post_type_support( 'page', 'comments' );
  }

  function replace_core_jquery_version() {
    wp_deregister_script( 'jquery-core' );
    wp_register_script( 'jquery-core', ASH_LOVES_DIR_PATH_URI . '/assets/build/js/jquery.min.js', array(), '3.5.1', true );
  }
  
}