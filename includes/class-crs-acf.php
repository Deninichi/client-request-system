<?php

/**
 * The file that defines the ACF class
 *
 * @link       http://deninichi.com
 * @since      1.0.0
 *
 * @package    CRS
 * @subpackage CRS/includes
 */

/**
 * The ACF plugin class.
 *
 * @since      1.0.0
 * @package    CRS
 * @subpackage CRS/includes
 * @author     Denis Nichik <crs@deninichi.com>
 */
class CRS_ACF {

    public function crs_acf_settings_path( $path ){
        // update path
        $path = CRS_PATH . '/acf/';

        // return
        return $path;
    }


    public function crs_acf_settings_dir( $dir ) {

        // update path
        $dir = CRS_DIR . 'acf/';

        // return
        return $dir;
    }
}