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
            'updated_message'    => __("Your Quote Request has been submitted. Please check the email listed above for replies from your Agent. Due to differences in time zone and holiday observances, please allow up to 72 hours for a response. Thank you!", $this->plugin_name ),
        ));

    ?>
</div>

<script>
    jQuery(document).ready(function($) {
        let fields = $('.acf-fields > .member-info');
        fields.slice(0, 4).wrapAll("<div class='gray-bg'></div>");
    });
</script>