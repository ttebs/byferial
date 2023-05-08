<?php

/* Single Fashion & Style Guide Display Shortcode 
----------------------------------------------------*/

add_shortcode( 'fsg-single-consultant-client', 'rw_fsg_single_consultant_client_shortcode' );
function rw_fsg_single_consultant_client_shortcode( $atts ) {
	
	ob_start();
	
	// Attributes
	$atts = shortcode_atts(
		array(),
		$atts,
		'fsg-single-consultant-client'
	);
	
	$consultant_id = get_current_user_id();
	$consultant_first_name = get_user_meta( $consultant_id, 'first_name', true );
	$consultant_last_name = get_user_meta( $consultant_id, 'last_name', true );
	
	// rw_consultant_access_check( $role_check="N", $membership_check="N", $client_check="N" )
	$rw_access_check = rw_consultant_access_check('Y','Y','Y');
	
	$rw_debug = "Y";
	
	if ($rw_debug == "Y") {
				
		if ( current_user_can('administrator') || current_user_can('consultant') && ($rw_debug == "Y") ) {
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

	}
	
	echo "<p><strong>Consultant:</strong> " . $consultant_first_name . " " . $consultant_last_name . "</p>";
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
	<?php } ?>
	
	<?php 
	$rw_client_slug = sanitize_text_field( urldecode( get_query_var('client') ) );	
	$client = get_user_by( 'slug' , $rw_client_slug );
	
	// get_user_meta( int $user_id, string $key = '', bool $single = false )
	$user_first_name = $client->user_firstname;
	$user_last_name = $client->user_lastname;
	?>
	
	<p><strong>Client Name:</strong> <?php echo $client->user_firstname . " " . $client->user_lastname; ?></p>
	
	<?php
	//echo "<pre>";
	//print_r($client);
	//echo "</pre>";
	?>
	
	<?php
	// Display FSG from function_display_fsg.php (Mean we only have to edit it in one place
	// function rw_display_fsg($user_id, $debug) {
	echo rw_display_fsg($client->ID, 'Y');
	
	return ob_get_clean();

}

?>