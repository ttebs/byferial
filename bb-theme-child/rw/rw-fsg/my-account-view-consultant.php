<?php
$rw_debug = "N";

// rw_consultant_access_check( $role_check="N", $membership_check="N", $client_check="N" )
$rw_access_check = rw_consultant_access_check('Y','N','N');

if ( current_user_can('administrator') && ($rw_debug == "Y") ) {
	echo "<pre>";
	echo "<p>";
	print_r($rw_access_check);
	echo "</p>";
	if ( get_query_var('view-client') !== "") {
		echo "<p><strong>Client Slug:</strong> " . get_query_var('view-client') . "</p>";
	}
	echo "<p><strong>Consultant ID:</strong> " . $consultant_id . "</p>";
	echo "</pre>";
}

?>

<?php if ($rw_access_check['has_access'] == "FALSE") { ?>

	<div class="alert alert-danger" role="alert">
		<?php 
		if ($rw_access_check['role_check'] == "FAIL") {
			echo '<p style="margin-bottom:0;">' . $rw_access_check['role_error'] . "</p>";
		}
		if ($rw_access_check['membership_check'] == "FAIL") {
			echo '<p style="margin-bottom:0;">' . $rw_access_check['membership_error'] . "</p>";
		}
		if ($rw_access_check['consultant_client_check'] == "FAIL") {
			echo '<p style="margin-bottom:0;">' . $rw_access_check['consultant_client_error'] . "</p>";
		}
		?>
	</div>

<?php } elseif ($rw_access_check['has_access'] == "TRUE") { ?>
	
	<?php
	$rw_consultant_slug = sanitize_text_field( urldecode( get_query_var('view-consultant') ) );
							
	if (isset($rw_consultant_slug) && $rw_consultant_slug != "") {

		// Get User Object from Slug
		// Note you have to use 'slug' and not 'user_nicename'
		$consultant = get_user_by( 'slug' , $rw_consultant_slug );
		
		//echo "<pre>";
		//print_r($consultant);
		//echo "</pre>";
	
	?>
	
		<div class="vtable">
			<div class="rw-tr">
				<div class="rw-th">Consultant:</div>
				<div class="rw-td"><?php echo $consultant->first_name; ?> <?php echo $consultant->last_name; ?></div>
			</div>
		</div>
		
		<p>
			<a href="<?php echo site_url( '/my-account/add-consultant-client/' . $consultant->user_nicename . '/', 'https' ); ?>" class="fl-button">Add New Client</a>
		</p>

		<div class="rw-div-table rw-consultant-client-list">
			<div class="rw-table-head">
				<div class="rw-row">
					<div class="rw-client-name">
						Client Name
					</div>
					<div class="rw-client-email">
						Email
					</div>
					<div class="rw-view">
						View FSG
					</div>
				</div>
			</div>
			<div class="rw-table-body">
			
				<?php
				global $wpdb;
				
				$loop = $wpdb->get_results( 
						$wpdb->prepare(
							"SELECT u.ID AS user_id, u.display_name, u.user_email, u.user_nicename " .
							"FROM $wpdb->users AS u " .
							"INNER JOIN {$wpdb->prefix}rw_consultant_client_lookup AS lookup ON u.ID = lookup.user_id " .
							"WHERE lookup.consultant_id = %d", $consultant->ID
						)
					);
			
				foreach( $loop as $key => $row) {
					// each column in your row will be accessible like this
					//$my_column = $row->column_name;}
				?>
		
				<div class="rw-row">
					<div class="rw-client-name">
						<a href="<?php echo home_url() . '/my-account/view-client/' . $row->user_nicename . '/'; ?>"><?php echo $row->display_name; ?></a>
					</div>
					<div class="rw-client-email">
						<?php echo $row->user_email; ?>
					</div>
					<div class="rw-view">
						<a href="<?php echo home_url() . '/consultant-client-fsg/client/' . $row->user_nicename . '/'; ?>">View FSG</a>
					</div>
				</div>
		
				<?php 
				} // End For Each
				?>
			
			</div>
		</div>

	<?php
	}
	
}
?>