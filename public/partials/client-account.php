<?php
	$current_user_id = get_current_user_id();

	$requests = get_posts( array(
			'post_type' => 'request',
			'numberposts' => -1,
			'meta_query' => array(
				array(
					'key' => 'r_client_id',
					'value' => $current_user_id,
					'compare' 	=> '='
				)
			) 
		)
	);
?>

<div class="membership-home-content">
	
	<h2 class="yellow-heading"><?php _e( 'Quote Requests', 'crs' ); ?></h2>

	<div class="row align-items-start">
		<div class="col-12 col-md-2"></div>
		
		<div class="col-12 col-md-8">
			<div class="row d-none d-md-flex">
				<div class="col-2 heading"><?php _e( 'Request ID', 'crs' ); ?></div>
				<div class="col-3 heading"><?php _e( 'Client name', 'crs' ); ?></div>
				<div class="col-3 heading"><?php _e( 'Client Email', 'crs' ); ?></div>
				<div class="col-2 heading"><?php _e( 'Status', 'crs' ); ?></div>
				<div class="col-2 d-none d-lg-block heading"><?php _e( 'Actions', 'crs' ); ?></div>
			</div>

			<?php foreach ( $requests as $request ): ?>
				<?php 
					$request_id = $request->ID;
					$client_details = get_field( 'r_customer_info', $request_id );
					$request_status = get_field( 'r_status', $request_id );
				?>
				<div class="row box request <?php echo $request_status; ?>" data-request-id="<?php echo $request->ID ?>" data-request-status="<?php echo $request_status ?>">
					<div class="col-12 col-md-2">#<?php echo $request->ID ?></div>
					<div class="col-12 col-md-3"><?php echo $client_details['name']; ?></div>
					<div class="col-12 col-md-3"><?php echo $client_details['email']; ?></div>
					<div class="col-12 col-md-2 status"><?php echo $request_status ?></div>
					<div class="col-12 col-md-12 col-lg-2 actions">
						<a class="request-view" href="/quote-request/?requestId=<?php echo $request->ID ?>">View</a> 
					</div>
				</div>
			<?php endforeach ?>
		</div>

		<div id="sidebar" class="col-12 col-md-2">
			<ul>
				<li><a href="/account/">Account</a></li>
				<li><a href="/billing-information/">Billing Info</a></li>
				<li><a href="/invoice/">Invoices</a></li>
			</ul>
		</div>
	</div>
</div>