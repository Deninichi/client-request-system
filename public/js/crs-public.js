(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	 $(document).ready(function() {
	 	$('.requests-list .request-complete').click(function(event) {
		 	event.preventDefault();
		 	
		 	let request_id = $(this).closest('tr').data('request-id');
		 	console.log(request_id)

		 	$.post({
		 		url: ajax.url,
		 		data: {
		 			action: 'change_request_status',
		 			request_id: request_id,
		 			new_status: 'complete'
		 		},
			 	function(response) {
					console.log(response);
				}
		 	})

		 });

	 	if ( $('#acf-field_5b21052231bc7-field_5b30bbdbf658f').val() === 'united_states' ) {
	 		$('.acf-field-5b30b9d1f658c').show();
	 		$('.acf-field-5b30bbbaf658d').hide();
	 	} else {
	 		$('.acf-field-5b30b9d1f658c').hide();
	 		$('.acf-field-5b30bbbaf658d').show();
	 	}

	 	$('#acf-field_5b21052231bc7-field_5b30bbdbf658f').change(function(event) {
	 		if ( $(this).val() === 'united_states' ) {
		 		$('.acf-field-5b30b9d1f658c').show();
		 		$('.acf-field-5b30bbbaf658d').hide();
		 	} else {
		 		$('.acf-field-5b30b9d1f658c').hide();
		 		$('.acf-field-5b30bbbaf658d').show();
		 	}
	 	});

	 });


})( jQuery );
