<?php
	
function fsg_values_shortcode($atts) {
	
	// Attributes
	$atts = shortcode_atts(
		array(
		'show' => '',
		),
		$atts,
		'fsg-values'
	);
	
	extract(shortcode_atts(array(
		'show' => '',
	), $atts));
	
	// Check to see if we are on the consultant client page by checking for the client $_GET variable
	// If we are set the current user info to the client id so we get the right info.
	// If not then set the client id to the current logged in user
	
	if (get_query_var('client') !== "") {
		
		$rw_client_slug = sanitize_text_field( urldecode( get_query_var('client') ) );	
		$client = get_user_by( 'slug' , $rw_client_slug );
		
		$current_user_id = $client->ID;
		$user_first_name = $client->user_firstname;
		$user_last_name = $client->user_lastname;
		
	} else {
		
		$current_user_id = get_current_user_id();
		$user_first_name = get_user_meta( $current_user_id, 'first_name', true );
		$user_last_name = get_user_meta( $current_user_id, 'last_name', true );

	}

	$args = array(
		'post_type'	=> array( 'fsg_questionnaire' ),
		'author'	=> $current_user_id,
	);
	
	// The Query
	$user_answers = new WP_Query( $args );
	
	// The Loop
	if ( $user_answers->have_posts() ) {
		
		while ( $user_answers->have_posts() ) {
			
			$user_answers->the_post();
			//$debug_calcs = "Y";
			
			$head_to_floor 				= get_field( "head_to_floor" );
			$bust_to_floor 				= get_field( "bust_to_floor" );
			$hip_to_floor 				= get_field( "hip_to_floor" );
			$kneecap_to_floor 			= get_field( "kneecap_to_floor" );
			$full_bust_circumference 	= get_field( "full_bust_circumference" );
			$bra_cup_size 				= get_field( "bra_cup_size" );
			$full_hip_circumference 	= get_field( "full_hip_circumference" );
			$waist_circumference 		= get_field( "waist_circumference" );
			$wrist_circumference 		= get_field( "wrist_circumference" );
			$ankle_circumference 		= get_field( "ankle_circumference" );
			$neck_length 				= get_field( "neck_length" );
			$neck_circumference 		= get_field( "neck_circumference" );
			$shoulders 					= get_field( "shoulders" );
			$prominent_features 		= get_field( "prominent_features" );
			$face_shape 				= get_field( "face_shape" );
			$weight 					= get_field( "weight" );
			$age 						= get_field( "age" );
			
			$vertical_body_type = calculateVerticalBodyType($head_to_floor, $bust_to_floor, $hip_to_floor, $kneecap_to_floor);
			$horizontal_body_shape = calculateHorizontalBodyShape($waist_circumference, $full_bust_circumference, $full_hip_circumference);
			$bust_size = calculateBustSize($bra_cup_size);
			$bone_structure = calculateBoneStructure($wrist_circumference, $ankle_circumference, $head_to_floor, $weight);
			$neck_length = calculateNeckLength($neck_length);
			$height = calculateHeight($head_to_floor);
			
			
		}
		
	}

	
	
	$output = '';
	
	switch (strtolower($atts['show'])) { 
		case 'first-name' :
			$output = $user_first_name;
			break;
		case 'last-name' :
			$output = $user_last_name;
			break;
		case 'head-to-floor' :
			$output = $head_to_floor;
			break;
		case 'bust-to-floor' :
			$output = $bust_to_floor;
			break;
		case 'hip-to-floor' :
			$output = $hip_to_floor;
			break;
		case 'kneecap-to-floor' :
			$output = $kneecap_to_floor;
			break;
		case 'full-bust-circumference' :
			$output = $full_bust_circumference;
			break;
		case 'bra-cup-size' :
			$output = $bra_cup_size;
			break;
		case 'full-hip-circumference' :
			$output = $full_hip_circumference;
			break;
		case 'waist-circumference' :
			$output = $waist_circumference;
			break;
		case 'wrist-circumference' :
			$output = $wrist_circumference;
			break;
		case 'ankle-circumference' :
			$output = $ankle_circumference;
			break;
		case 'neck-length' :
			$output = $neck_length;
			break;
		case 'neck-circumference' :
			$output = $neck_circumference;
			break;
		case 'shoulders' :
			$output = $shoulders;
			break;
		case 'prominent-features' :
			$output = "<ul>";
			foreach ( $prominent_features as $feature ) :
			$output .= "	<li>" . $feature . "</li>";
			endforeach;
			$output .= "</ul>";
			break;
		case 'face-shape' :
			$output = $face_shape;
			break;
		case 'weight' :
			$output = $weight;
			break;
		case 'age' :
			$output = $age;
			break;
		case 'vertical-body-type' :
			$output = $vertical_body_type['vertical_body_type'];
			break;
		case 'horizontal-body-shape' :
			$output = $horizontal_body_shape;
			break;
		case 'bone-structure' :
			$output = $bone_structure;
			break;
		case 'bust-size' :
			$output = $bust_size;
			break;
		default :
			$output = $atts['show'];
	}

	return $output;

}
add_shortcode( 'fsg-values', 'fsg_values_shortcode' );
	
?>