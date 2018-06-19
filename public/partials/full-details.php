<?php

    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }

    $request_id = $_GET['requestId'];

?>

<div class="request-form amazonsellerclub-form">
    <h2><?php _e( 'Request #', 'crs' ); echo $request_id; ?></h2>
    <h3><?php _e( 'Request Details', 'crs' ) ?></h3>
    <?php include dirname(__FILE__) . '/request-details.php'; ?>

    <h3><?php _e( 'Agent Answer Details', 'crs' ) ?></h3>
    <?php include dirname(__FILE__) . '/respond-details.php'; ?>

</div>