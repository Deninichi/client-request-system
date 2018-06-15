<?php

    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }

    acf_form_head();
    $request_id = $_GET['requestId'];

    $customer_info = get_field( 'r_customer_info', $request_id );
    $products = get_field( 'r_products', $request_id );
    $images = get_field( 'r_images', $request_id );
    $file = get_field( 'r_file_attachment', $request_id );
?>

<div class="respond-form amazonsellerclub-form">
    <h2><?php _e( 'Request #', 'crs' ); echo $request_id; ?></h2>
    <table>
        <tbody>
            <tr>
                <td colspan="3"><strong><?php _e( 'Client Info', 'crs' ) ?></strong></td>
            </tr>
            <tr>
                <td><?php _e( 'Name', 'crs' ) ?></td>
                <td colspan="2"><?php echo $customer_info['name'] ?></td>
            </tr>
            <tr>
                <td><?php _e( 'Mailing Address', 'crs' ) ?></td>
                <td colspan="2"><?php echo $customer_info['mailing_address'] ?></td>
            </tr>
            <tr>
                <td><?php _e( 'Email', 'crs' ) ?></td>
                <td colspan="2"><?php echo $customer_info['email'] ?></td>
            </tr>
            <tr>
                <td><?php _e( 'Phone', 'crs' ) ?></td>
                <td colspan="2"><?php echo $customer_info['phone'] ?></td>
            </tr>
            <tr>
                <td colspan="3"><strong><?php _e( 'Products', 'crs' ) ?></strong></td>
            </tr>
            <?php foreach ( $products as $key => $product ): ?>
                <tr>
                    <td><?php _e( 'Product #', 'crs' ); echo $key+1; ?></td>
                    <td colspan="2"><?php echo $product['product_url'] ?></td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td><strong><?php _e( 'QTY Desired', 'crs' ) ?></strong></td>
                <td colspan="2"><?php the_field( 'r_order_qty', $request_id ) ?></td>
            </tr>
             <tr>
                <td colspan="3"><strong><?php _e( 'Images', 'crs' ) ?></strong></td>
            </tr>
            <tr>
                <td><img src="<?php echo $images['image_1']['sizes']['medium'] ?>" alt=""></td>
                <td><img src="<?php echo $images['image_2']['sizes']['medium'] ?>" alt=""></td>
                <td><img src="<?php echo $images['image_3']['sizes']['medium'] ?>" alt=""></td>
            </tr>
            <tr>
                <td colspan="3"><strong><?php _e( 'Notes to Agent', 'crs' ) ?></strong></td>
            </tr>
            <tr>
                <td colspan="3"><?php the_field( 'r_notes_to_agent', $request_id ) ?></td>
            </tr>
            <tr>
                <td><strong><?php _e( 'Attach Additional Files', 'crs' ) ?></strong></td>
                <td colspan="2"><a href="<?php echo $file['url'] ?>"><?php echo $file['filename'] ?></a></td>
            </tr>
        </tbody>
    </table>
    <br>
    <h3><?php echo __( 'PRODUCT PRICING', 'crs' ) ?></h3>
    <?php
        acf_form(array(
            'post_id'       => $request_id,
            'field_groups' => array( 1393 ),
            'form'               => true,
            'submit_value'      => __("Submit", $this->plugin_name ),
            'updated_message'    => __("Done", $this->plugin_name ),
        ));

    ?>
</div>

