<?php 
	$requests = get_posts( array(
			'post_type' => 'request',
			'requests-list' => -1
		)
	);
?>
<div class="requests-list">
	<div class="row d-none d-md-flex">
		<div class="col-2 heading"><?php _e( 'Request ID', 'crs' ); ?></div>
		<div class="col-3 heading"><?php _e( 'Client name', 'crs' ); ?></div>
		<div class="col-3 heading"><?php _e( 'Client Email', 'crs' ); ?></div>
		<div class="col-2 heading"><?php _e( 'Request Status', 'crs' ); ?></div>
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
				<a class="request-view" href="?requestId=<?php echo $request->ID ?>">View</a> 
				<?php if ( 'completed' !== $request_status ): ?>
					| <a class="request-complete" href="#">Complete</a>
				<?php endif ?>
				<!-- <a class="request-remove" href="">Remove</a> -->
			</div>
		</div>
	<?php endforeach ?>
</div>