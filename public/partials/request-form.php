<?php

    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }

    acf_form_head();

?>

<div class="request-form amazonsellerclub-form">
    <div class="request-limit"><strong>Limit: </strong><?php the_field( 'u_request_limit', 'user_' . get_current_user_id() ); ?></div>
    <?php
        acf_form(array(
            'post_id'       => 'new_request_post',
            'field_groups' => array( 1353 ),
            'form'               => true,
            'submit_value'      => __("Send Request", $this->plugin_name ),
            'updated_message'    => __("Done", $this->plugin_name ),
        ));

    ?>
</div>

