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

        // New "Learning" post type
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

}