<?php
// Get Current User ID
$current_user_id = get_current_user_id();
// get_user_meta( int $user_id, string $key = '', bool $single = false );
$user_first_name = get_user_meta( $current_user_id, 'first_name', true );
$user_last_name = get_user_meta( $current_user_id, 'last_name', true );

$rw_debug = "N";

// rw_consultant_access_check( $role_check="N", $membership_check="N", $client_check="N" )
$rw_access_check = rw_consultant_access_check('Y','Y','N');

if ( ( current_user_can('administrator') || current_user_can('consultant') ) && ($rw_debug == "Y") ) {
	echo "<pre>";
	echo "<p>";
	print_r($rw_access_check);
	echo "</p>";
	if ( get_query_var('add-consultant-client') !== "") {
		echo "<p><strong>Consultant Slug:</strong> " . get_query_var('add-consultant-client') . "</p>";
	}
	echo "<p><strong>Current Logged in User ID:</strong> " . $current_user_id . ": " . $user_first_name . " " .$user_last_name . "</p>";
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
	$rw_consultant_slug = sanitize_text_field( urldecode( get_query_var('add-consultant-client') ) );
							
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
				<div class="rw-td"><?php echo $consultant->ID; ?>: <?php echo $consultant->first_name; ?> <?php echo $consultant->last_name; ?></div>
			</div>
		</div>
		
		<h2>Enter Client Details</h2>

		<?php
		/*
		$fields = array(
			'field_60c4e079b20b3',	// user_login
			'field_60c4e106b20b4',	// email
			'field_60c4e13fb20b5',	// first_name
			'field_60c4e170b20b6',	// last_name
		);
		*/
		
		// Load the User Registration form
		acf_form(array(
			'id'					=> 'new-client-for-consultant-registration',
			'post_id'				=> 'new_user',	
			'field_groups' 			=> array(8509), // ID of the RW Client Registration form in ACF
			'html_before_fields' 	=> sprintf(
										'<input type="hidden" name="consultant_slug" value="%s">
										<input type="hidden" name="consultant_id" value="%s">',
										$rw_consultant_slug, $consultant->ID
									),
			'submit_value'			=> 'Submit',
			'html_submit_button'	=> '<input type="submit"class="acf-button button button-primary button-large"value="%s"/>',
		));
		
	}

}
?>