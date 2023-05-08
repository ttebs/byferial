<?php
// Get Current User ID
$consultant_id = get_current_user_id();
// get_user_meta( int $user_id, string $key = '', bool $single = false );
$user_first_name = get_user_meta( $consultant_id, 'first_name', true );
$user_last_name = get_user_meta( $consultant_id, 'last_name', true );

$rw_debug = "N";

// rw_consultant_access_check( $role_check="N", $membership_check="N", $client_check="N" )
$rw_access_check = rw_consultant_access_check( "Y", "Y", "N", "N" );

if ( ( current_user_can('administrator') || current_user_can('consultant') ) && ($rw_debug == "Y") ) {
	echo "<pre>";
	echo "<p>";
	print_r($rw_access_check);
	echo "</p>";
	if ( get_query_var('view-client') !== "") {
		echo "<p><strong>Client Slug:</strong> " . get_query_var('view-client') . "</p>";
	}
	echo "<p><strong>Current Logged in User ID:</strong> " . $consultant_id . "</p>";
	echo "</pre>";
}

?>



<?php if ( !in_array('my-clients', $rw_access_check['member_permissions']) ) { ?>

	<div class="alert alert-danger" role="alert">
		<?php 
		if ($rw_access_check['role_check'] == "FAIL") {
			echo '<p style="margin-bottom:0;">' . $rw_access_check['role_error'] . "</p>";
		}
		if ($rw_access_check['membership_check'] == "FAIL") {
			echo '<p style="margin-bottom:0;">' . $rw_access_check['membership_error'] . "</p>";
		}
		if (isset($rw_access_check['consultant_client_check']) && $rw_access_check['consultant_client_check'] == "FAIL") {
			echo '<p style="margin-bottom:0;">' . $rw_access_check['consultant_client_error'] . "</p>";
		}
		
		echo '<p style="margin-bottom:0;">Your Membership Plan does not have access to this page.<br>Please upgrade your subscription.</p>';
		
		?>
	</div>

<?php } else { ?>
	
	<div class="vtable">
		<div class="rw-tr">
			<div class="rw-th">Consultant:</div>
			<div class="rw-td"><?php echo $user_first_name; ?> <?php echo $user_last_name; ?></div>
		</div>
	</div>
	
	<p>
		<a href="<?php echo site_url( '/my-account/add-client/', 'https' ); ?>" class="fl-button">Add New Client</a>
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
				<div class="rw-edit">
					Edit Client
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
						"WHERE lookup.consultant_id = %d", $consultant_id
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
				<div class="rw-edit">
					<a href="<?php echo home_url() . '/my-account/edit-client/' . $row->user_nicename . '/'; ?>">Edit Client</a>
				</div>
				<div class="rw-view">
					<a href="<?php echo home_url() . '/consultant-client-fsg/client/' . $row->user_nicename . '/'; ?>">View FSG</a>
				</div>
			</div>
			
			<?php } ?>
			
		</div>
	</div>

<?php } ?>