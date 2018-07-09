<?php

    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }

    $request_id = $_GET['requestId'];

    $customer_info = get_field( 'r_customer_info', $request_id );
    $products = get_field( 'r_products', $request_id );
    $images = get_field( 'r_images', $request_id );
    $file = get_field( 'r_file_attachment', $request_id );

    $address = '';
    foreach ( $customer_info['mailing_address'] as $key => $value ) {
        if ( ! empty( $value ) ) {
            if ( 'country' == $key ) {
                $address .= ucfirst($value);
            } else {
                $address .= $value . ', ';
            }
            
        }
    }

?>
<div id="request-details">
    <h3><?php _e( 'Request Details', 'crs' ) ?></h3>

    <div class="client-info">
        <div class="table-heading"><?php _e( "Client Info", 'crs' ) ?></div>
        <div class="row">
            <div class="col-12 col-md-3 heading"><?php _e( "Name", 'crs' ); ?></div>
            <div class="col-12 col-md-9"><?php echo $customer_info['name'] ?></div>
        </div>
        <div class="row">
            <div class="col-12 col-md-3 heading"><?php _e( "Mailing Address", 'crs' ); ?></div>
            <div class="col-12 col-md-9"><?php echo $address; ?></div>
        </div>
        <div class="row">
            <div class="col-12 col-md-3 heading"><?php _e( "Email", 'crs' ); ?></div>
            <div class="col-12 col-md-9"><?php echo $customer_info['email'] ?></div>
        </div>
        <div class="row">
            <div class="col-12 col-md-3 heading"><?php _e( "Phone", 'crs' ); ?></div>
            <div class="col-12 col-md-9"><?php echo $customer_info['phone'] ?></div>
        </div>
    </div>


    <div class="product">
        <h4 class="table-heading"><?php _e( 'Products', 'crs' ) ?></h4>
        <?php foreach ( $products as $key => $product ): ?>
            <div class="row box">
                <div class="col-12 col-md-3 heading"><?php _e( 'Product #', 'crs' ); echo $key+1; ?></div>
                <div  class="col-12 col-md-9"><?php echo $product['product_url'] ?></div>
            </div>
        <?php endforeach ?>
        <div class="row box">
            <div class="col-6 col-md-3 heading"><?php _e( 'QTY Desired', 'crs' ) ?></div>
            <div  class="col-6 col-md-9"><?php the_field( 'r_order_qty', $request_id ) ?></div>
        </div>
    </div>

    <div class="agent-images">
        <h4 class="table-heading"><?php _e( 'Images', 'crs' ) ?></h4>
        <div class="row">
            <div class="col-12 col-md-4"><img src="<?php echo $images['image_1']['sizes']['medium'] ?>" alt=""></div>
            <div class="col-12 col-md-4"><img src="<?php echo $images['image_2']['sizes']['medium'] ?>" alt=""></div>
            <div class="col-12 col-md-4"><img src="<?php echo $images['image_3']['sizes']['medium'] ?>" alt=""></div>
        </div>
    </div>

    <div class="row notes">
        <h4 class="col-12 table-heading"><?php _e( 'Notes to Agent', 'crs' ) ?></h4>
        <div class="col-12"><?php the_field( 'r_notes_to_agent', $request_id ) ?></div>
    </div>

    <div class="row files">
        <h4 class="col-12 table-heading"><?php _e( 'Additional Files', 'crs' ) ?></h4>
        <div class="col-12">
            <?php if ( '' != $file['url'] || null != $file['url'] ): ?>
                <div><a href="<?php echo $file['url'] ?>"><?php echo $file['filename'] ?></a></div>
            <?php else: ?>
                <div><?php _e( 'No attached Files', 'crs' ); ?></div>
            <?php endif; ?>
        </div>
    </div>

</div>