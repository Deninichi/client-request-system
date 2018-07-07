<?php

    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }

    $request_id = $_GET['requestId'];

?>

<h2 class="request-id"><?php _e( 'Request #', 'crs' ); echo $request_id; ?></h2>
<div class="full-details amazonsellerclub-form">
    <?php include dirname(__FILE__) . '/request-details.php'; ?>

    <?php include dirname(__FILE__) . '/respond-details.php'; ?>

</div>