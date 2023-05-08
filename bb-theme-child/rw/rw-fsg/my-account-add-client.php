<?php
// Get Current User ID
$consultant_id = get_current_user_id();
// get_user_meta( int $user_id, string $key = '', bool $single = false );
$consultant_first_name = get_user_meta( $consultant_id, 'first_name', true );
$consultant_last_name = get_user_meta( $consultant_id, 'last_name', true );

$rw_debug = "N";

// rw_consultant_access_check( $role_check="N", $membership_check="N", $client_check="N" )
$rw_access_check = rw_consultant_access_check('Y','Y','N');

if ( ( current_user_can('administrator') || current_user_can('consultant') ) && ($rw_debug == "Y") ) {
	echo "<pre>";
	print_r($rw_access_check);
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
			echo '<p style="margin-bottom:0;">' . $rw_access_check['role_error'] . '</p>';
		}
		if ($rw_access_check['membership_check'] == "FAIL") {
			echo '<p style="margin-bottom:0;">' . $rw_access_check['membership_error'] . '</p>';
		}
		if (isset($rw_access_check['consultant_client_check']) && $rw_access_check['consultant_client_check'] == "FAIL") {
			echo '<p style="margin-bottom:0;">' . $rw_access_check['consultant_client_error'] . '</p>';
		}
		echo '<p style="margin-bottom:0;">Your membership plan does not have access to this page.<br>Please upgrade your subscription.</p>';
		?>
	</div>

<?php } else { ?>

	<?php
	if ( isset($_GET['email_exists']) && isset($_GET['user_email']) ){
	
		if ( ($_GET['email_exists'] == "Y") && ($_GET['user_email'] != "") ) {
			?>
			<div class="alert alert-danger" role="alert">
				<?php echo '<p style="margin-bottom:0;">The email ' . $_GET['user_email'] . ' already exists.</p>'; ?>
			</div>
			<?php
		}
		
	}
	?>

	<div class="vtable">
		<div class="rw-tr">
			<div class="rw-th">Consultant:</div>
			<div class="rw-td">
				<?php if ($consultant_id != "") { ?>
				<?php echo $consultant_first_name; ?> <?php echo $consultant_last_name; ?>
				<?php } else { ?>
					No Consultant
				<?php } ?>
			</div>
		</div>
	</div>
	
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
		'id'					=> 'new-client-registration',
		'post_id'				=> 'new_user',
		'field_groups' 			=> array(8509), // ID of the RW Client Registration form in ACF
		'submit_value'			=> 'Submit',
		'html_submit_button'	=> '<input type="submit"class="acf-button button button-primary button-large"value="%s"/>',
	));
	
	?>
	
<?php } ?>
