<?php
// Get Current User ID
$consultant_id = get_current_user_id();
// get_user_meta( int $user_id, string $key = '', bool $single = false );
$user_first_name = get_user_meta( $consultant_id, 'first_name', true );
$user_last_name = get_user_meta( $consultant_id, 'last_name', true );

$rw_debug = "N";

// rw_consultant_access_check( $role_check="N", $membership_check="N", $client_check="N" )
$rw_access_check = rw_consultant_access_check('Y','Y','N');

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

<?php if ( !in_array('directory-profile', $rw_access_check['member_permissions']) ) { ?>

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
	
	<?php
						
	/*
	// field group id 2525
	$fields = array(
		'field_611afef700cf9',	// consultant_name
		'field_611aff1500cfa',	// consultant_company
		'field_611aff2400cfb',	// consultant_city
		'field_611aff2c00cfc',	// consultant_state__province
		'field_611aff3e00cfd',	// consultant_country
		'field_611affac8e153',	// consultant_phone
		'field_611affb78e154',	// consultant_email
		'field_611affc28e155',	// consultant_website
		'field_611aff4a00cfe',	// consultant_profile_image
		'field_611c201ab894d',	// consultant_bio
	);
	*/

	// Load the form

	acf_form(
		array(
			'id' 					=> 'edit-consultant-profile-form',
			'field_groups' 			=> array(8469), // ID of the Consultant Directory form in ACF
			'form_attributes' 		=> array(
											'method' => 'POST',
											'action' => admin_url("admin-post.php"),
										),
			'html_before_fields' 	=> sprintf(
										'<input type="hidden" name="action" value="rw_save_directory_profile_form">
										<input type="hidden" name="user_id" value="user_%s">',
										$consultant_id
									),
			'post_id'				=> 'user_' . $consultant_id,
			'form' 					=> true,
			'uploader'				=> 'basic',
			'html_submit_button' 	=> '<button type="submit" class="acf-button button button-primary button-large" value="Update Profile">Update Profile</button>',
			'html_submit_spinner' 	=> '<span class="acf-spinner"></span>',
			'kses' 					=> true,
			'updated_message' 		=> __("Profile Updated", 'acf'),
			'html_updated_message'  => '<div id="message" class="updated alert alert-success" role="alert">%s</div>',
			
			'return'				=> home_url('/my-account/directory-profile/?updated=true'),

		)
	);
	
	
	
	

	?>
	
	
	

<?php } ?>