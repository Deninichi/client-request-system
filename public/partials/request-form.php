<?php

    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }
?>

<div class="request-form amazonsellerclub-form">

    <?php
        acf_form(array(
            'post_id'       => 'new_request_post',
            'field_groups' => array( 1353 ),
            'fields'       => array(),
            'form'               => true,
            'submit_value'      => __("Send Request", $this->plugin_name ),
            'updated_message'    => __("Done", $this->plugin_name ),
        ));

    ?>
</div>

<script>
    jQuery(document).ready(function($) {
        let fields = $('.acf-fields > .member-info');
        fields.slice(0, 4).wrapAll("<div class='gray-bg'></div>");
    });
</script>