<?php

    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }

    $request_id = $_GET['requestId'];

?>

<h2 class="respond-form request-id"><?php _e( 'Request #', 'crs' ); echo $request_id; ?></h2>
<div class="respond-form amazonsellerclub-form content-block">
    
    <?php include( 'request-details.php' ); ?>

    <br>
    <h3><?php echo __( 'Product Price', 'crs' ) ?></h3>
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

