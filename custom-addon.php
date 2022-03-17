<?php 
/* Plugin Name: Custom Addon
 * Description: Custom Elementor Addon for this theme.
 * Plugin URI:  https://shweb.em
 * Version:     1.0.0
 * Author:      Sajjad
 * Author URI:  https://shweb.me
 * Text Domain: astra
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
define( 'CUSTOM_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'CUSTOM_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'CUSTOM_ASSETS', trailingslashit( CUSTOM_DIR_URL. 'assets' ) );
require CUSTOM_DIR_PATH . 'base.php';