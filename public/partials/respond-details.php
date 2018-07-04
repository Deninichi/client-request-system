<?php

    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }

    $request_id = $_GET['requestId'];

    $product_pricing = get_field( 'r_product_pricing', $request_id );
    $agent_images = get_field( 'r_agent_images', $request_id );
    $notes_to_client = get_field( 'r_notes_to_client', $request_id );
?>

<table>
    <tbody>
        <tr>
            <td colspan="3"><strong><?php _e( 'Product Prices', 'crs' ) ?></strong></td>
        </tr>
        <?php foreach ( $product_pricing as $key => $factory ): ?>
            <?php $key = $key + 1 ?>
            <tr>
                <td colspan="3"><strong><?php _e( "Factory #$key", 'crs' ) ?></strong></td>
            </tr>
            <tr>
                <td><?php _e( "Factory price", 'crs' ); ?></td>
                <td><?php _e( 'FOB', 'crs' ); ?></td>
                <td><?php _e( 'Minimum Order Qty', 'crs' ); ?></td>
            </tr>
            <tr>
                <td><?php echo $factory['r_factory_price']; ?></td>
                <td><?php echo $factory['r_fob'][0]; ?></td>
                <td><?php echo $factory['r_minimum_order_qty']; ?></td>
            </tr>
            <tr>
                <td colspan="3"><strong><?php _e( "Cost for Samples", 'crs' ); ?></strong></td>
            </tr>
            <tr>
                <td><?php _e( "Price", 'crs' ); ?></td>
                <td><?php _e( "Packaging included", 'crs' ); ?></td>
                <td><?php _e( "Consolidate shipping?", 'crs' ); ?></td>
            </tr>
            <tr class="factory-end-row">
                <td><?php echo $factory['r_cost_for_samples']['r_shipping_price']; ?></td>
                <td><?php echo $factory['r_cost_for_samples']['r_packaging_included']; ?></td>
                <td><?php echo $factory['r_cost_for_samples']['r_consolidate_shipping'][0]; ?></td>
            </tr>
        <?php endforeach ?>
         <tr>
            <td colspan="3"><strong><?php _e( 'Agent Images', 'crs' ) ?></strong></td>
        </tr>
        <tr>
            <td><img src="<?php echo $agent_images['agent_image_1']['sizes']['medium'] ?>" alt=""></td>
            <td><img src="<?php echo $agent_images['agent_image_2']['sizes']['medium'] ?>" alt=""></td>
            <td><img src="<?php echo $agent_images['agent_image_3']['sizes']['medium'] ?>" alt=""></td>
        </tr>
        <tr>
            <td colspan="3"><strong><?php _e( 'Notes to Client', 'crs' ) ?></strong></td>
        </tr>
        <tr>
            <td colspan="3"><?php echo $notes_to_client ?></td>
        </tr>
    </tbody>
</table>