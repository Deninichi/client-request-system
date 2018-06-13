<?php

    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }
?>

<div class="request-form">
    <?php
        acf_form(array(
            'post_id'       => 'new_request_post',
            'field_groups' => array( 1353 ),
            'form'               => true,
            'submit_value'      => 'Send Request',
            'updated_message'    => 'Done!'
        ));

    ?>
</div>

