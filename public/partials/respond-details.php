<?php

    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }

    $request_id = $_GET['requestId'];

    $product_pricing = get_field( 'r_product_pricing', $request_id );
    $agent_images = get_field( 'r_agent_images', $request_id );
    $notes_to_client = get_field( 'r_notes_to_client', $request_id );
?>

<div id="response-details">
    <h3><?php _e( 'Agent Answer Details', 'crs' ) ?></h3>
    
    <div class="row factories">
        <h4 class="col-12 table-heading"><?php _e( 'Product Prices', 'crs' ) ?></h4>
        <?php foreach ( $product_pricing as $key => $factory ): ?>
            <?php $key = $key + 1 ?>

            <div class="col-12 factory">
                <div class="heading"><?php _e( "Factory #$key", 'crs' ) ?></div>
                <div class="row">
                    <div class="col-4"><?php _e( "Factory price", 'crs' ); ?></div>
                    <div class="col-4"><?php _e( 'FOB', 'crs' ); ?></div>
                    <div class="col-4"><?php _e( 'Minimum Order Qty', 'crs' ); ?></div>
                </div>
                <div class="row">
                    <div class="col-4"><?php echo $factory['r_factory_price']; ?></div>
                    <div class="col-4"><?php echo $factory['r_fob'][0]; ?></div>
                    <div class="col-4"><?php echo $factory['r_minimum_order_qty']; ?></div>
                </div>

                <div class="heading"><?php _e( "Cost for Samples", 'crs' ); ?></div>
                <div class="row">
                    <div class="col-4"><?php _e( "Price", 'crs' ); ?></div>
                    <div class="col-4"><?php _e( 'Packaging included', 'crs' ); ?></div>
                    <div class="col-4"><?php _e( 'Consolidate shipping?', 'crs' ); ?></div>
                </div>
                <div class="row">
                    <div class="col-4"><?php echo $factory['r_cost_for_samples']['r_shipping_price']; ?></div>
                    <div class="col-4"><?php echo $factory['r_cost_for_samples']['r_packaging_included']; ?></div>
                    <div class="col-4"><?php echo $factory['r_cost_for_samples']['r_consolidate_shipping'][0]; ?></div>
                </div>
            </div>

        <?php endforeach ?>
    </div>

    <div class="agent-images">
        <h4 class="table-heading"><?php _e( 'Agent Images', 'crs' ) ?></h4>
        <div class="row">
            <div class="col-12 col-md-4"><img src="<?php echo $agent_images['agent_image_1']['sizes']['medium'] ?>" alt=""></div>
            <div class="col-12 col-md-4"><img src="<?php echo $agent_images['agent_image_2']['sizes']['medium'] ?>" alt=""></div>
            <div class="col-12 col-md-4"><img src="<?php echo $agent_images['agent_image_3']['sizes']['medium'] ?>" alt=""></div>
        </div>
    </div>

    <div class="row notes">
        <h4 class="col-12 table-heading"><?php _e( 'Notes to Client', 'crs' ) ?></h4>
        <div class="col-12"><?php echo $notes_to_client ?></div>
    </div>

</div>