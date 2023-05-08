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
	
	//function rw_personal_fsg_access_check( $role_check="N", $fsg_questionnaire_check="N", $fsg_purchase_check="N" ) {
	$rw_access_check = rw_personal_fsg_access_check('Y','Y','Y');
	
	//echo "<pre>";
	//print_r($rw_access_check);
	//echo "</pre>";
	
	if ($rw_access_check['has_access'] == "FALSE") { ?>

		<div class="rw-fsg-section">
			<div class="rw-fixed-width">
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
			</div>
		</div>

	<?php 
	} elseif ($rw_access_check['has_access'] == "TRUE") {
		
		// Get Current User ID
		$current_user_id = get_current_user_id();
		$user_first_name = get_user_meta( $current_user_id, 'first_name', true );
		$user_last_name = get_user_meta( $current_user_id, 'last_name', true );
		
		//function rw_consultant_access_check( $role_check="N", $membership_check="N", $client_check="N", $fsg_purchase_check="N" ) {
		$consultant_access_check = rw_consultant_access_check('Y','N','N','N');
				
		// If User is a consultant do lookup by slug
		if ( $consultant_access_check['has_access'] == "TRUE" ) {
			
			$consultant_id = $current_user_id;
			
			//echo "Here";
			
		} else {
			
			// Lookup Consultant ID
			$consultant_id = get_consultant_by_client_id($current_user_id);
			
			// Get the Consultant Data by getting user by ID
			//$consultant = get_user_by( 'id' , $consultant_id );
			
			//echo "Here2";
			
		}

		$consultant_logo = get_field('consultant_logo', 'user_' . $consultant_id);
		
		//echo "<pre>";
		//print_r($consultant);
		//echo "</pre>";
		?>
		
		<div class="rw-fsg-section">
			<div class="rw-fixed-width">
				<h2>Consultant Info</h2>
				<div class="rw-2-cols">
					<div class="rw-col">
						<p><?php the_field('consultant_name', 'user_' . $consultant_id); ?><br>
						<?php the_field('consultant_company', 'user_' . $consultant_id); ?><br>
						<strong>Phone:</strong> <?php the_field('consultant_phone', 'user_' . $consultant_id); ?></p>
					</div>
					<div class="rw-col">
						<?php if( !empty( $consultant_logo ) ): ?>
						<p><img src="<?php echo esc_url($consultant_logo['sizes']['medium']); ?>" alt="<?php echo esc_attr($consultant_logo['alt']); ?>" width="<?php echo $consultant_logo['sizes']['medium-width']; ?>" height="<?php echo $consultant_logo['sizes']['medium-height']; ?>" /></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		
		<div class="rw-fsg-section">
			<div class="rw-fixed-width">
				<h2>Personal Fashion &amp; Style Guide for <?php echo $user_first_name; ?> <?php echo $user_last_name; ?></h2>
			</div>
		</div>
		
		<?php
		//Get Current Page URL for use in buttons
		$obj_id = get_queried_object_id();
		$current_url = get_permalink( $obj_id );
		
		// Get The Current Users Fashion and Style Guide
		// WP_Query arguments
		$args = array(
			'post_type'	=> array( 'fsg_questionnaire' ),
			'author'	=> $current_user_id,
		);
		
		// The Query
		$user_answers = new WP_Query( $args );
		
		//echo $user_answers->post->ID . "<br>";
		
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
					/* Load FSG Single Display Shortcode */
					include( get_stylesheet_directory() . '/rw/rw-fsg/calculations-debug.php');
				}
				
				$fsg_allow_editing = rw_restrict_customer_editing( $user_answers->post );	
								
				if (isset($_GET['action'])) {
					
					if ($_GET['action'] == 'edit') { 
						
						if ($fsg_allow_editing === "Y") {
						?>
					
							<div class="rw-fsg-section">
								<div class="rw-fixed-width">						
									<div class="acf-edit-post">
										<?php 
										if ( ( is_user_logged_in() && $current_user_id == $user_answers->post->post_author ) ) {
											echo "<div class='acf-edit-post'>";
											
											acf_form(array(
												'id'					=> 'edit-user-fsg-questionnaire',			
												'field_groups' 			=> array(8486),
												'post_id'				=> $user_answers->post->ID,
												'form' => true,
												'submit_value'			=> 'Update Questionnaire',
												'html_submit_button'	=> '<input type="submit"class="acf-button button button-primary button-large"value="%s"/>',
												'return' => $current_url . '?updated=true',  //'return' => '%post_url%',
											));
											
											
											
											/*
											acf_form (array(
												'post_id'				=> $user_answers->post->ID,
												'field_groups'			=> array(1518), // Same ID(s) used before
												'return'				=> $current_url . '?updated=true',  //'return' => '%post_url%',
												'submit_value'			=> 'Save Changes',
												'post_title'			=> false,
												'post_content'			=> false,
												'updated_message'		=> 'Saved!',
												'html_updated_message'	=> '<div id="message" class="updated"><p>%s</p></div>'
												));
											*/
											echo "</div>";
										}
										?>
									</div>
								</div>
							</div>
					
						<?php } else { ?>
							
							<div class="rw-fsg-section">
								<div class="rw-fixed-width">
									<div class="alert alert-danger" role="alert">
										<p style="margin-bottom:0;">It is not possible to edit your Fashion and Style Guide after 5 days from completion of the questionnaire</p>
									</div>
								</div>
							</div>
							
							
						<?php }
						
					}
					
				} else {
					
					/* Show the edit button to the post author only */
					
					//echo "<pre>";
					//print_r($user_answers->post);
					//echo "</pre>";
					
					if ( ( is_user_logged_in() && ($current_user_id == $user_answers->post->post_author) && ($fsg_allow_editing === "Y") ) ) { ?>
						
						<div class="rw-fsg-section">
							<div class="rw-fixed-width">
								<a class='post-edit-button fl-button' href="<?php echo $current_url; ?>?action=edit">Edit Questionnaire</a>
							</div>
						</div>
						
					<?php }
					
					// **************************** //
					// Need to Add a section here to look up a customers consultant name to be able to output Consultant Name, Company Name, Logo
					// **************************** //
					
					
					
					include ('display-fsg.php');
					
				}
					
			}
			
		} else { ?>
		
			<div class="rw-fsg-section">
				<div class="rw-fixed-width">
					<h2>Questionnaire</h2>
				</div>
			</div>
			
			<div class="fl-row fl-row-fixed-width fsg-questionnaire">
			
				<div class="fl-col" style="width: 50%;">
					
					<?php
						
					//acf_form_head() is loaded in the acf-form template file
					
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
						'id'					=> 'new-fsg-questionnaire',
						'post_id'				=> 'new_post',
						'new_post'				=> array(
							'post_type'			=> 'fsg_questionnaire',
							'post_status'		=> 'publish',
							'post_title'		=> $user_first_name . ' ' . $user_last_name,
						),
						'post_title'			=> false,
						'post_content'			=> false,
						//'uploader'			=> 'basic',
						'return'				=> home_url('/personal-fsg/?updated=true'),
						
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
		
		<?php
		}
		
		// Restore original Post Data
		wp_reset_postdata();
		
	} else {
	?>
		
		<div class="rw-fsg-section">
			<div class="rw-fixed-width">
				<div class="alert alert-danger" role="alert">
					<p style="margin-bottom:0;">You do not have access to this content. If you believe this to be an error please contact us.</p>
				</div>
			</div>
		</div>
	
	<?php
		
	}
		
	return ob_get_clean();

}

?>