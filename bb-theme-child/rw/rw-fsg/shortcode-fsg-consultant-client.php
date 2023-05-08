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
	
	//wp_deregister_style( 'wp-admin' );
	
	// rw_consultant_access_check( $role_check="N", $membership_check="N", $client_check="N" )
	$rw_access_check = rw_consultant_access_check('Y','Y','Y');
	
	$rw_fsg_debug = "N";
	
	if ($rw_fsg_debug == "Y") {
		
		echo "<pre>";
		print_r($rw_access_check);
		echo "</pre>";
		
	}
	
	$consultant_id = get_current_user_id();
	$consultant_first_name = get_user_meta( $consultant_id, 'first_name', true );
	$consultant_last_name = get_user_meta( $consultant_id, 'last_name', true );
	
	$rw_client_slug = sanitize_text_field( urldecode( get_query_var('client') ) );	
	
	$client = get_user_by( 'slug' , $rw_client_slug );
	
	$consultant = get_user_by( 'id', get_consultant_by_client_id($client->ID) );
	
	//echo "<pre>";
	//print_r($client);
	//echo "</pre>";
	
	//echo "<pre>";
	//print_r($consultant);
	//echo "</pre>";
	?>
	
	<?php if ($rw_access_check['has_access'] == "FALSE") { ?>
	<div class="rw-fsg-section">
		<div class="rw-fixed-width">
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
		</div>
	</div>
	<?php } ?>
	
	<?php if ($rw_access_check['has_access'] == "TRUE") { ?>
	
		<div class="rw-fsg-section">
			<div class="rw-fixed-width">
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
					<div class="rw-tr">
						<div class="rw-th">Client Name:</div>
						<div class="rw-td">
							<?php if ($client->user_firstname != "") { ?>
								<?php echo $client->user_firstname . " " . $client->user_lastname; ?>
							<?php } else { ?>
								No Name Supplied
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php
		// get_user_meta( int $user_id, string $key = '', bool $single = false )
		$user_first_name = $client->user_firstname;
		$user_last_name = $client->user_lastname;
		
		//Get Current Page URL for use in buttons
		$obj_id = get_queried_object_id();
		$current_url = get_permalink( $obj_id ) . "client/" . $rw_client_slug . "/";
		
		// Get The Client Fashion and Style Guide
		// WP_Query arguments
		$args = array(
			'post_type'	=> array( 'fsg_questionnaire' ),
			'author'	=> $client->ID,
		);
		
		// The Query
		$user_answers = new WP_Query( $args );
		
		//echo "<pre>";
		//print_r($user_answers);
		//echo "</pre>";
		
		// The Loop
		if ( $user_answers->have_posts() ) {
			
			while ( $user_answers->have_posts() ) {
				
				// Questionnaire Record is available
				// This means the customer has filled in the questionnaire
				// Therefore show the guide with an Edit button at the top
				
				$user_answers->the_post();
				
				$debug_calcs = "N";
				
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
				//$shoulders = calculateShoulders($shoulders);
				
				if ($debug_calcs == "Y") {
					//Load FSG Single Display Shortcode
					include( get_stylesheet_directory() . '/rw/rw-fsg/calculations-debug.php');
				}
				
				
				if (isset($_GET['action'])) {
					
					if ($_GET['action'] == 'edit') { ?>
					
						<div class="rw-fsg-section">
							<div class="rw-fixed-width">
								<div class="acf-edit-post">
									<?php 
									if ( ( is_user_logged_in() && $client->ID == $user_answers->post->post_author ) ) {
										echo "<div class='acf-edit-post'>";
										acf_form (array(
											'id'					=> 'edit-consultant-client-fsg-questionnaire',
											'field_groups' 			=> array(8486), // Same ID(s) used before
											'form' 					=> true,
											'return' 				=> $current_url . '?updated=true',  //'return' => '%post_url%',
											'submit_value' 			=> 'Save Changes',
											'post_title'			=> false,
											'post_content'			=> false,
											'updated_message'		=> 'Saved!',
											'html_updated_message'	=> '<div id="message" class="updated"><p>%s</p></div>'
											));
										echo "</div>";
									}
									?>
								</div>
							</div>
						</div>
					
					<?php }
					
				} else {
					
					// Show the edit button to the post author only
					if ( ( is_user_logged_in() && ($client->ID == $user_answers->post->post_author) ) ) { ?>
						<div class="rw-fsg-section">
							<div class="rw-fixed-width">
								<p><a class='post-edit-button fl-button' href="<?php echo $current_url; ?>?action=edit">Edit Questionnaire</a></p>
							</div>
						</div>
					<?php }
					
					include ('display-fsg.php');
	
				}
					
			}
	
		} else { ?>
		
			<div class="rw-fsg-section">
				<div class="rw-fixed-width fsg-questionnaire">
					
					<h2>Questionnaire</h2>
			
					<div class="fl-col" style="width: 50%;">
						
						<?php
						
						/*
						$fields = array(
							'field_5f92f52fbb6ea',	// userid
							'field_5f92f68176b50',	// head_to_floor
							'field_5f92f6ae76b51',	// bust_to_floor
							'field_5f92f6b976b52',	// hip_to_floor
							'field_5f92f6c476b53',	// kneecap_to_floor
							'field_5f92f6ce76b54',	// full_bust_circumference
							'field_5f92f6db76b55',	// bra_cup_size
							'field_5f92f70176b56',	// full_hip_circumference
							'field_5f92f71076b57',	// waist_circumference
							'field_5f92f71976b58',	// wrist_circumference
							'field_5f92f72876b59',	// ankle_circumference
							'field_5f92f73276b5a',	// neck_length
							'field_5f92f75cd3bc9',	// neck_circumference
							'field_5f92f782d3bca',	// shoulders
							'field_5f92f7afd3bcb',	// prominent_features
							'field_5f92f8e0e202b',	// face_shape
							'field_5f92f923e202c',	// weight
							'field_5f92f93fe202d'	// age
						);
						*/
		
						// Load the form
						// Form registration is in create-questionnaire-cpt.php
		
						acf_form(array(
							'id'					=> 'consultant-client-fsg-questionnaire',
							'post_id'				=> 'new_post',
							'new_post'				=> array(
								'post_type'			=> 'fsg_questionnaire',
								'post_status'		=> 'publish',
								'post_title'		=> $user_first_name . ' ' . $user_last_name,
							),
							'post_title'			=> false,
							'post_content'			=> false,
							'post_author' 			=> $client->ID,
							//'uploader'			=> 'basic',
							'return'				=> home_url('/consultant-client-fsg/client/' . $client->user_nicename . '/?updated=true'),
							
							'field_groups' => array(8486), // Same ID(s) used before
							
							
							//'fields'				=> $fields,
							'submit_value'			=> 'Submit',
							'html_submit_button'	=> '<input type="submit"class="acf-button button button-primary button-large"value="%s"/>',
							'updated_message'		=> 'Saved!',
							'html_updated_message'	=> '<div id="message" class="updated"><p>%s</p></div>',
						));
					
						?>
						
					</div>
				
					<div class="fl-col fsg-measurement-guide" style="width: 50%; text-align: center">
						<img src="<?php echo site_url(); ?>/wp-content/uploads/2021/08/body.png" width="236" height="615" alt="">
					</div>
				
				</div>
				
			</div>
		
		<?php
		
			
		}
		
	}

	// Restore original Post Data
	wp_reset_postdata();
	
	return ob_get_clean();

}

?>