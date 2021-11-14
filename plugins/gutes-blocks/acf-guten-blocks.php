<?php
/**
 * Plugin Name:       ACF Blocks for Gutes
 * Description:       Blocks for theme – build step required.
 * Requires at least: 5.8
 * Requires PHP:      7.3
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       guten-nature-tint
 *
 * @package           guten-nature-tint
 */

define( 'ACF_BLOCK_TEMPLATE_PATH', plugin_dir_path( __FILE__ ) . 'block-templates/' );
define( 'ACF_BUILD_PATH', plugin_dir_path( __FILE__ ) . 'build/' );

include_once( 'inc/class-acf-register-block.php' );
include_once( 'inc/functions.php' );