<?php 
	$requests = get_posts( array(
			'post_type' => 'request',
			'requests-list' => -1
		)
	);
?>
<div class="requests-list">
	<table>
		<thead>
			<tr>
				<th><?php _e( 'Request ID', 'crs' ); ?></th>
				<th><?php _e( 'Client name', 'crs' ); ?></th>
				<th><?php _e( 'Client Email', 'crs' ); ?></th>
				<th><?php _e( 'Request Status', 'crs' ); ?></th>
				<th><?php _e( 'Actions', 'crs' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ( $requests as $request ): ?>
				<?php 
					$request_id = $request->ID;
					$client_details = get_field( 'r_customer_info', $request_id );
					$request_status = get_field( 'r_status', $request_id );
				?>
				<tr class="<?php echo $request_status; ?>" data-request-id="<?php echo $request->ID ?>" data-request-status="<?php echo $request_status ?>">
					<td><?php echo $request->ID ?></td>
					<td><?php echo $client_details['name']; ?></td>
					<td><?php echo $client_details['email']; ?></td>
					<td class="status"><?php echo $request_status ?></td>
					<td>
						<a class="request-view" href="?requestId=<?php echo $request->ID ?>">View</a> | 
						<?php if ( 'completed' !== $request_status ): ?>
							<a class="request-complete" href="#">Complete</a> | 
						<?php endif ?>
						<!-- <a class="request-remove" href="">Remove</a> -->
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>