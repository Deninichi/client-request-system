<?php

/**
 *
 * @link              http://deninichi.com
 * @since             1.0.0
 * @package           CRS
 *
 * @wordpress-plugin
 * Plugin Name:       Client request system
 * Plugin URI:        http://deninichi.com/crs/
 * Description:       Allow clients to make requests and get answer from Agent about products and price.
 * Version:           1.0.0
 * Author:            Denis Nichik
 * Author URI:        http://deninichi.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       crs
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CRS_VERSION', '1.0.0' );

define( 'CRS_DIR', plugin_dir_url( __FILE__ ) );
define( 'CRS_PATH', plugin_dir_path( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-crs-activator.php
 */
function activate_crs() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-crs-activator.php';
	CRS_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-crs-deactivator.php
 */
function deactivate_crs() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-crs-deactivator.php';
	CRS_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_crs' );
register_deactivation_hook( __FILE__, 'deactivate_crs' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-crs.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_crs() {

	$plugin = new CRS();
	$plugin->run();

}
run_crs();
