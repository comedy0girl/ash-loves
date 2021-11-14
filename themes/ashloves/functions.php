<?php
/**
 * Theme Functions
 * 
 * @package ASH_LOVES
 */
if ( ! defined( 'ASH_LOVES_DIR_PATH' ) ) {
  define( 'ASH_LOVES_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( ! defined( 'ASH_LOVES_DIR_PATH_URI' ) ) {
  define( 'ASH_LOVES_DIR_PATH_URI', untrailingslashit( get_template_directory_uri() ) );
}

require_once ASH_LOVES_DIR_PATH . '/inc/global-functions/extended-functions.php';
require_once ASH_LOVES_DIR_PATH . '/vendor/autoload.php';

\Inc\ThemeSetup\AshLovesTheme::get_instance();


add_theme_support( 'post-thumbnails' );
	
add_post_type_support( 'page', 'excerpt' );
add_theme_support( 'title-tag' );

function register_my_menus() {
  register_nav_menus(
    array(
    	'mobile-menu' => __( 'Mobile Menu' )
    )
  );
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

//add categories to pages
function add_categories_to_pages() {
register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'add_categories_to_pages' );


/* Better way to add multiple widgets areas */
function widget_registration($name, $id, $description,$beforeWidget, $afterWidget, $beforeTitle, $afterTitle){
    register_sidebar( array(
        'name' => $name,
        'id' => $id,
        'description' => $description,
        'before_widget' => $beforeWidget,
        'after_widget' => $afterWidget,
        'before_title' => $beforeTitle,
        'after_title' => $afterTitle,
    ));
}
 
function multiple_widget_init(){
    widget_registration('Footer widget 1', 'footer-sidebar-1', '', '', '', '', '');
    widget_registration('Footer widget 2', 'footer-sidebar-2', '', '', '', '', '');
    widget_registration('Footer widget 3', 'footer-sidebar-3', '', '', '', '', '');
    widget_registration('Footer widget 4', 'footer-sidebar-4', '', '', '', '', '');
   
}
 
add_action('widgets_init', 'multiple_widget_init');



function shapeSpace_include_custom_jquery() {

  wp_deregister_script('jquery');
  wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);

}
add_action('wp_enqueue_scripts', 'shapeSpace_include_custom_jquery');