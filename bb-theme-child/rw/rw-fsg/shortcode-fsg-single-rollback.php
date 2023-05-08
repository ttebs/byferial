<?php

/* Single Fashion & Style Guide Display Shortcode 
----------------------------------------------------*/

add_shortcode( 'fsg-single-display', 'rw_fsg_single_shortcode' );
function rw_fsg_single_shortcode( $atts ) {
	
	ob_start();
		
	// Attributes
	$atts = shortcode_atts(
		array(),
		$atts,
		'fsg-single-display'
	);
	
	$rw_debug = "N";
	
	//function rw_personal_fsg_access_check( $role_check="N", $fsg_questionnaire_check="N", $fsg_purchase_check="N" ) {
	$rw_access_check = rw_personal_fsg_access_check('Y','Y','Y');
	
	if ($rw_debug == "Y") {
		
		if ( current_user_can('administrator') || current_user_can('consultant') || current_user_can('customer') && ($rw_debug == "Y") ) {
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
	
	if ($rw_access_check['has_access'] == "FALSE") { ?>

		<div class="alert alert-danger" role="alert">
			<?php 
			if ($rw_access_check['role_check'] == "FAIL") {
				echo '<p style="margin-bottom:0;">' . $rw_access_check['role_check_error'] . "</p>";
			}
			if ($rw_access_check['fsg_questionnaire_check'] == "FAIL") {
				echo '<p style="margin-bottom:0;">' . $rw_access_check['fsg_questionnaire_check_error'] . "</p>";
			}
			if ($rw_access_check['fsg_purchase_check'] == "FAIL") {
				echo '<p style="margin-bottom:0;">' . $rw_access_check['fsg_purchase_check_error'] . "</p>";
			}
			?>
		</div>

	<?php 
	} elseif ($rw_access_check['has_access'] == "TRUE") {
		
		$user_id = get_current_user_id();
		
		// Display FSG from function_display_fsg.php (Mean we only have to edit it in one place
		echo rw_display_fsg($user_id, 'Y');
		
	} else {
		
		echo "<p>You do not have access to this content</p>";
		echo "<p>If you believe this to be an error please contact us</p>";
		
	}
		
	return ob_get_clean();

}

?>