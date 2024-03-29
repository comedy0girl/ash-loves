<?php
/**
 * Bootstraps the theme
 * 
 * @package ASH_LOVES
 */

namespace Inc\ThemeSetup;

use Inc\Traits\Singleton;

class AshLovesTheme {
  use Singleton;

  protected function __construct() {
    // load Classes.
    Assets::get_instance();
		// Menus::get_instance();

    $this->setup_hooks();
  }
  
  protected function setup_hooks() {
    /**
     * Actions
     */
		add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );
  }

  public function setup_theme() {

    /**
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
    add_theme_support( 'title-tag' );

    /**
		 * Custom logo.
		 *
		 * @see Adding custom logo
		 * @link https://developer.wordpress.org/themes/functionality/custom-logo/#adding-custom-logo-support-to-your-theme
		 */
    add_theme_support( 'custom-logo', [
      'header-text'   => [ 'site-title', 'site-description' ],
      'height'        => 132,
      'width'         => 132,
      'flex-height'   => true,
      'flex-width'    => true
    ] );
    
    /**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * Adding this will allow you to select the featured image on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
    add_theme_support( 'post-thumbnails' );

		/**
	 	* Register image sizes.
	 	*/
		add_image_size( 'featured-thumbnail', 350, 233, true );
    
    // Add theme support for selective refresh for widgets.
		/**
		 * WordPress 4.5 includes a new Customizer framework called selective refresh
		 *
		 * Selective refresh is a hybrid preview mechanism that has the performance benefit of not having to refresh the entire preview window.
		 *
		 * @link https://make.wordpress.org/core/2016/03/22/implementing-selective-refresh-support-for-widgets/
		 */
    add_theme_support( 'customize-selective-refresh-widgets' );
    
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
    
		/**
		 * Switch default core markup for search form, comment form, comment-list, gallery, caption, script and style
		 * to output valid HTML5.
		 */
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

		/**
		 * Some blocks in Gutenberg like tables, quotes, separator benefit from structural styles (margin, padding, border etc…)
		 * They are applied visually only in the editor (back-end) but not on the front-end to avoid the risk of conflicts with the styles wanted in the theme.
		 * If you want to display them on front to have a base to work with, in this case, you can add support for wp-block-styles, as done below.
		 * @see Theme Styles.
		 * @link https://make.wordpress.org/core/2018/06/05/whats-new-in-gutenberg-5th-june/, https://developer.wordpress.org/block-editor/developers/themes/theme-support/#default-block-styles
		 */
    add_theme_support( 'wp-block-styles' );
    
    /**
		 * Some blocks such as the image block have the possibility to define
		 * a “wide” or “full” alignment by adding the corresponding classname
		 * to the block’s wrapper ( alignwide or alignfull ). A theme can opt-in for this feature by calling
		 * add_theme_support( 'align-wide' ), like we have done below.
		 *
		 * @see Wide Alignment
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#wide-alignment
		 */
    add_theme_support( 'align-wide' );
    
    /**
		 * Loads the editor styles in the Gutenberg editor.
		 *
		 * Editor Styles allow you to provide the CSS used by WordPress’ Visual Editor so that it can match the frontend styling.
		 * If we don't add this, the editor styles will only load in the classic editor ( tiny mice )
		 */
		add_editor_style();
		
		/**
		 * Create Custom Image Sizes 
		 */
		add_image_size( 'header-small', 300, 150, false );
		add_image_size( 'half-full-width-large', 1000, 750, false );
		add_image_size( 'half-full-width-medium', 720, 510, false );
		add_image_size( 'half-full-width-small', 500, 355, false );
	}
}
