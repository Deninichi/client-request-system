<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://deninichi.com
 * @since      1.0.0
 *
 * @package    CRS
 * @subpackage CRS/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    CRS
 * @subpackage CRS/includes
 * @author     Denis Nichik <crs@deninichi.com>
 */
class CRS_Deactivator {

	/**S
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
        flush_rewrite_rules();

        wp_clear_scheduled_hook( 'update_clients_limits' );
	}

}
