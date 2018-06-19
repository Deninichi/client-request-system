<?php

/**
 * The file that defines the Requests WP post type class
 *
 * @link       http://deninichi.com
 * @since      1.0.0
 *
 * @package    CRS
 * @subpackage CRS/includes
 */

/**
 * The Request post type plugin class.
 *
 * @since      1.0.0
 * @package    CRS
 * @subpackage CRS/includes
 * @author     Denis Nichik <crs@deninichi.com>
 */
class CRS_Client {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;


    public function __construct( $plugin_name ) {
        $this->plugin_name = $plugin_name;
    }


    /**
     * Update request limits for users
     *
     * @since    1.0.0
     *
     */
    public function update_clients_limits_callback(){

        $users = get_users();

        $today = date('d-m-Y', time() );
        $today_time = strtotime( $today );

        foreach( $users as $user ) {
            $match_date = date( "d-m-Y", strtotime( get_field( 'u_next_limit_update_date', 'user_' . $user->ID ) ) );
            $match_time = strtotime( $match_date );

            if( $today == $match_date ){
                update_field( 'u_next_limit_update_date', strtotime("+1 month"), 'user_' . $user->ID );
                update_field( 'u_request_limit', 10, 'user_' . $user->ID );
            }
        }

    }
    
    /**
     * Check if user has limit to make request.
     *
     * @since    1.0.0
     *
     * @param    string   $user_id     Current user ID
     *
     * @return   Boolean               Is user has limit to make request
     * 
     */
    public function has_client_limits( $user_id ){

        if ( 0 < get_field( 'u_request_limit', 'user_' . $user_id ) ) {
            return true;
        }

        return false;
    }

}