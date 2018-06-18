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
class CRS_Request {

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
     * Register Request post type.
     *
     * @since    1.0.0
     *
     */
    public function register_request_post_type(){

        // New "Request" post type
        $labels = array(
            'name'               => _x( 'Requests', $this->plugin_name ),
            'singular_name'      => _x( 'Request', $this->plugin_name ),
            'menu_name'          => _x( 'Requests', $this->plugin_name ),
            'name_admin_bar'     => _x( 'Requests', $this->plugin_name ),
            'add_new'            => _x( 'Add New', $this->plugin_name ),
            'add_new_item'       => __( 'Add New Request', $this->plugin_name ),
            'new_item'           => __( 'New Request', $this->plugin_name ),
            'edit_item'          => __( 'Edit Request', $this->plugin_name ),
            'view_item'          => __( 'View Request', $this->plugin_name ),
            'all_items'          => __( 'All Requests', $this->plugin_name ),
            'search_items'       => __( 'Search Requests', $this->plugin_name ),
            'parent_item_colon'  => __( 'Parent Requests:', $this->plugin_name ),
            'not_found'          => __( 'No Requests found.', $this->plugin_name ),
            'not_found_in_trash' => __( 'No Requests found in Trash.', $this->plugin_name )
        );

        $args = array(
            'labels'             => $labels,
            'description'        => __( 'Clients requests', $this->plugin_name ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'requests' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'menu_icon'          => 'dashicons-testimonial',
            'supports'           => array( 'title' )
        );

        register_post_type( 'request', $args );

    }


    /**
     * Save new Request post from frontend form
     *
     * @since    1.0.0
     * @param    int    $post_id     New post ID
     */
    public function save_request_post( $post_id ){

        // var_dump($_POST['acf']);
        // wp_die();


        // check if this is to be a new post
        if( $post_id != 'new_request_post' ) {
            return $post_id;
        }

        if( empty( $_POST['acf'] ) ) {
            return $post_id;
        }

        // A new Request post parameters
        $post = array(
            'post_type'     => 'request',
            'post_status'   => 'publish',
            'post_title'    => $_POST['acf']['field_5b21050d31bc6'],
        );

        //insert the post
        $post_id = wp_insert_post( $post );

        // Update Request post title
        wp_update_post( array(
            'ID'          => $post_id,
            'post_title'  => '#' . $post_id . ' - ' . $_POST['acf']['field_5b21050d31bc6']
        ) );


        // Update Request data
        $customer_info = array(
            'name' => $_POST['acf']['field_5b21050d31bc6'],
            'mailing_address' => $_POST['acf']['field_5b21052231bc7'],
            'email' => $_POST['acf']['field_5b21053131bc8'],
            'phone' => $_POST['acf']['field_5b21053b31bc9'],
        );

        update_field( 'r_client_id', get_current_user_id(), $post_id );
        update_field( 'r_customer_info', $customer_info, $post_id );

        // Products repeater
        foreach ( $_POST['acf']['field_5b21059631bca'] as $key => $product ) {
            
            update_field( array('r_products', $key+1, 'product_url'), $product["field_5b22c4b629ad9"], $post_id );
        
        }

        //Product images
        $product_images = array(
            'image_1' => $_POST['acf']['field_5b22c4c429ada']['field_5b22c6355ac27'],
            'image_2' => $_POST['acf']['field_5b22c4c429ada']['field_5b22c6485ac28'],
            'image_3' => $_POST['acf']['field_5b22c4c429ada']['field_5b22c6515ac29'],
        );
        update_field( 'r_images', $product_images, $post_id );

        // update_field( 'r_order_qty', $_POST['acf']['field_5b2105b331bcb'], $post_id );
        // update_field( 'r_notes_to_agent', $_POST['acf']['field_5b2105e531bcc'], $post_id );
        // update_field( 'r_file_attachment', $_POST['acf']['field_5b2105fd31bcd'], $post_id );
        // update_field( 'r_notifications', $_POST['acf']['field_5b21061a31bce'], $post_id );


        // Save the fields to the post
        do_action( 'acf/save_post' , $post_id );

        $limit = get_field( 'u_request_limit', 'user_' . get_current_user_id() );
        update_field( 'u_request_limit', $limit - 1, 'user_' . get_current_user_id() );

        return $post_id;

    }

}