<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://deninichi.com
 * @since      1.0.0
 *
 * @package    CRS
 * @subpackage CRS/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    CRS
 * @subpackage CRS/public
 * @author     Denis Nichik <crs@deninichi.com>
 */
class CRS_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/crs-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/crs-public.js', array( 'jquery' ), $this->version, false );

		wp_localize_script( $this->plugin_name, 'ajax', 
			array(
				'url' => admin_url('admin-ajax.php'),
				'nonce' => wp_create_nonce('crs-ajax-nonce')
			)
		);

	}

	public function render_request_form( $atts ){

		$user_id = get_current_user_id();

		if ( 'create-request-form' == $atts[0] ) {

			if ( isset( $_GET['requestId'] ) ) {

				if ( $user_id == get_field( 'r_client_id', $_GET['requestId'] ) ) {
					include dirname(__FILE__) . '/partials/full-details.php';
				} else {
					include dirname(__FILE__) . '/partials/error-no-access.php';
				}

			} else {

				//if( CRS_Client::has_client_limits( get_current_user_id() ) ){
					include dirname(__FILE__) . '/partials/request-form.php';
				//} else {
					//include dirname(__FILE__) . '/partials/error-no-limits.php';
				//}

			}
		} elseif( 'client-account' == $atts[0] ){

			if ( pmpro_hasMembershipLevel( 1 ) || current_user_can( 'manage_options' ) ) {
				include dirname(__FILE__) . '/partials/client-account.php';
			} else {
				include dirname(__FILE__) . '/partials/error-no-access.php';
			}

		} elseif( 'agent-form' == $atts[0] ) {

			if ( pmpro_hasMembershipLevel( 2 ) || current_user_can( 'manage_options' ) ) {

				if ( isset( $_GET['requestId'] ) ) {
					include dirname(__FILE__) . '/partials/respond-form.php';
				} else {
					include dirname(__FILE__) . '/partials/requests-list.php';
				}

			} else {
				include dirname(__FILE__) . '/partials/error-no-access.php';
			}

		}

	}

	function crs_add_body_classes($classes) {

		$page = explode( '/', $_SERVER['REQUEST_URI'] );

		switch ( $page[1] ) {
			case 'quote-request':

				if ( isset($_GET['requestId'] ) ) {
					$classes[] = 'single-request';
				}

				$classes[] = 'quote-request';
				$classes[] = 'crs-page';
				
				break;

			case 'respond-quote-request':
				
				if ( isset($_GET['requestId'] ) ) {
					$classes[] = 'single-responce';
				}

				$classes[] = 'respond-quote';
				$classes[] = 'crs-page';

				break;

			case 'membership-home':

				$classes[] = 'membership-home';
				$classes[] = 'crs-page';

				break;

			default:
				$classes[] = '';
				break;
		}
        
        return $classes;
	}

}
