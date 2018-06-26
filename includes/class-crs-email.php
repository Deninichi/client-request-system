<?php

/**
 * The file that defines the emails from CRS plugin
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
class CRS_Email {

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
     * Send email
     *
     * @since    1.0.0
     *
     * @param    string   $email_type    Type of email
     * @param    string   $request_id    Request_id
     *
     */
    public static function crs_send_email( $email_type, $request_id ){

        $client_details = get_field( 'r_customer_info', $request_id );
        $to = $client_details['email'];

        switch ( $email_type ) {
            case 'request-quote-to-client':
                $subject = 'You have a quote request from Amazon Sellers Club';
                break;

            case 'request-quote-response':
                $subject = 'Our Agent has responded to your quote request';
                break;
        }

        ob_start();
        include plugin_dir_path( dirname( __FILE__ ) ) . 'templates/emails/' . $email_type . '.php';
        $message = ob_get_contents();
        ob_clean();

        $headers = array(
            'From: Mandy Payne <mandy@amazonsellersclub.com>',
            'content-type: text/html',
        );

        wp_mail( $to, $subject, $message, $headers );

    }

}