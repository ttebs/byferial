<?php
// Get Current User ID
$consultant_id = get_current_user_id();
// get_user_meta( int $user_id, string $key = '', bool $single = false );
$user_first_name = get_user_meta( $consultant_id, 'first_name', true );
$user_last_name = get_user_meta( $consultant_id, 'last_name', true );

$rw_debug = "N";

// rw_consultant_access_check( $role_check="N", $membership_check="N", $client_check="N" )
$rw_access_check = rw_consultant_access_check('Y','Y','Y');

if ( ( current_user_can('administrator') || current_user_can('consultant') ) && ($rw_debug == "Y") ) {
	echo "<pre>";
	echo "<p>";
	print_r($rw_access_check);
	echo "</p>";
	if ( get_query_var('view-client') !== "") {
		echo "<p><strong>Client Slug:</strong> " . get_query_var('view-client') . "</p>";
	}
	echo "<p><strong>Current Logged In User ID:</strong> " . $consultant_id . "</p>";
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

	<?php
	$rw_client_slug = sanitize_text_field( urldecode( get_query_var('view-client') ) );
							
	if (isset($rw_client_slug) && $rw_client_slug != "") {
		
		// Check if client is a child of consultant

		if ($rw_access_check['consultant_client_check'] == "PASS") {
			
			// Get User Object from Slug
			// Note you have to use 'slug' and not 'user_nicename'
			$client = get_user_by( 'slug' , $rw_client_slug );
			
			//echo "<pre>";
			//print_r($client);
			//echo "</pre>";
			
			$consultant = get_user_by( 'id', get_consultant_by_client_id($client->ID) );
			
			//echo "<pre>";
			//print_r($consultant);
			//echo "</pre>";
					 
			?>

			<div class="vtable">
				<div class="rw-tr">
					<div class="rw-th">Consultant:</div>
					<div class="rw-td">
						<?php if (!empty($consultant)) { ?>
						<?php echo $consultant->first_name; ?> <?php echo $consultant->last_name; ?>
						<?php } else { ?>
							No Consultant
						<?php } ?>
					</div>
				</div>
			</div>
			
			<p><a href="<?php echo site_url( '/my-account/edit-client/' . $rw_client_slug . '/', 'https' ); ?>" class="fl-button">Edit Client</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url( '/consultant-client-fsg/client/' . $rw_client_slug . '/', 'https' ); ?>" class="fl-button">View FSG</a></p>
			
			<div class="vtable">
				<div class="rw-tr">
					<div class="rw-th">Client Name:</div>
					<div class="rw-td">
						<?php if (!empty($client->first_name)) { ?>
							<?php echo $client->first_name; ?> <?php echo $client->last_name; ?>
						<?php } else { ?>
							No Name
						<?php } ?>
						</div>
				</div>
				<div class="rw-tr">
					<div class="rw-th">Username:</div>
					<div class="rw-td"><?php echo $client->user_login; ?></div>
				</div>
				<div class="rw-tr">
					<div class="rw-th">Email:</div>
					<div class="rw-td"><?php echo $client->user_email; ?></div>
				</div>
			</div>

			<?php 
		
		} else {
		
			?>
			
			<p>Client Does Not Belong To Consultant</p>
			
			<?php
		
		}
		
	}

}
?>



