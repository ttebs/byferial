<?php

/* Single Fashion & Style Guide Display Shortcode 
----------------------------------------------------*/

add_shortcode( 'rw-consultant-directory', 'rw_consultant_directory_shortcode' );
function rw_consultant_directory_shortcode( $atts ) {
	
	ob_start();
		
	// Attributes
	$atts = shortcode_atts(
		array(),
		$atts,
		'rw-consultant-directory'
	);
	
	if ( get_query_var('consultant') && (get_query_var('consultant') !== "") ) {
	
		// If Consultant Querystring Variable Exists Show Detail Info
		
		$rw_consultant_slug = sanitize_text_field( urldecode( get_query_var('consultant') ) );	
		
		$consultant = get_user_by( 'slug' , $rw_consultant_slug );
		
		//echo "SLUG: " . $rw_consultant_slug;
		
		$consultant_name = get_field('consultant_name', 'user_' . $consultant->ID);
		$consultant_company = get_field('consultant_company', 'user_' . $consultant->ID);
		$consultant_city = get_field('consultant_city', 'user_' . $consultant->ID);
		$consultant_state__province = get_field('consultant_state__province', 'user_' . $consultant->ID);
		$consultant_country = get_field('consultant_country', 'user_' . $consultant->ID);
		$consultant_phone = get_field('consultant_phone', 'user_' . $consultant->ID);
		$consultant_email = get_field('consultant_email', 'user_' . $consultant->ID);
		$consultant_website = get_field('consultant_website', 'user_' . $consultant->ID);
		$consultant_profile_image = get_field('consultant_profile_image', 'user_' . $consultant->ID);
		$consultant_bio = get_field('consultant_bio', 'user_' . $consultant->ID);
		
		$memberships = wc_memberships_get_user_active_memberships( $consultant->ID );
		
		$membership_plan = $memberships[0]->plan->post->post_name;
		
		//echo "<pre>";
		//print_r($consultant_profile_image);
		//echo "</pre>";
		
		
		//[medium] => https://byferial.com/wp-content/uploads/2021/09/IMG_20210616_185610_126-348x348.jpg
        //    [medium-width] => 348
        //    [medium-height] => 348
		
		?>

		
		<p>&laquo; <a href="https://byferial.com/consultant-directory/">Back</a></p>
		
		<div class="rw-row rw-consultant-single">
			<div class="rw-col-8">
				<h2><?php echo $consultant_name; ?></h2>
				<p><?php if ($consultant_company != "") { ?><strong><?php echo $consultant_company; ?></strong><br><?php } ?>
				<?php if ($consultant_city != "") { ?><?php echo $consultant_city; ?>, <?php } ?><?php if ($consultant_state__province != "") { ?><?php echo $consultant_state__province; ?><br><?php } ?>
				<?php if ($consultant_country != "") { ?><?php echo $consultant_country; ?><?php } ?></p>
				
				<p><?php if ($consultant_phone != "") { ?><strong>Phone:</strong> <a href="tel:<?php echo $consultant_phone; ?>"><?php echo $consultant_phone; ?></a><br><?php } ?>
				<?php if ($consultant_email != "") { ?><strong>Email:</strong> <a href="mailto:<?php echo $consultant_email; ?>"><?php echo $consultant_email; ?></a><br><?php } ?>
				<?php if ($consultant_website != "") { ?><strong>Website:</strong> <a href="<?php echo $consultant_website; ?>"><?php echo $consultant_website; ?></a><?php } ?></p>
				
				<?php if ($consultant_bio != "") { ?>
				<?php echo $consultant_bio; ?>
				<?php } ?>
			</div>
			<div class="rw-col-4">
				<div class="rw-consultant-image">
					<?php if( !empty( $consultant_profile_image ) ): ?>
					<img src="<?php echo esc_url($consultant_profile_image['sizes']['medium']); ?>" alt="<?php echo esc_attr($consultant_profile_image['alt']); ?>" width="<?php echo $consultant_profile_image['sizes']['medium-width']; ?>" height="<?php echo $consultant_profile_image['sizes']['medium-height']; ?>" />
					<?php endif; ?>
				</div>
				<div class="rw-consultant-badge">
					<?php 
					switch ($membership_plan) {
						case "certified-master-image-coach":
							echo '<img class="size-thumbnail wp-image-9510" src="https://byferial.com/wp-content/uploads/2023/05/Certified-Master-Image-Coach-Logo.png" alt="empower member" width="150" height="150" />';
							break;
						case "certified-professional-image-consultant":
							echo '<img class="size-thumbnail wp-image-9510" src="https://byferial.com/wp-content/uploads/2023/05/Certified-Professional-Image-Consultant-Logo.png" alt="empower member" width="150" height="150" />';
							break;
						case "certified-image-consultant":
							echo '<img class="size-thumbnail wp-image-9510" src="https://byferial.com/wp-content/uploads/2023/05/Certified-4X4-Color-Consultant.png" alt="empower member" width="150" height="150" />';
							break;
						case "certified-4x4-color-consultant":
							echo '<img class="size-thumbnail wp-image-9510" src="https://byferial.com/wp-content/uploads/2023/05/4X4-Color-Consultant-Logo.png" alt="empower member" width="150" height="150" />';
							break;
						case "empower-member":
							echo '<img class="size-thumbnail wp-image-9510" src="https://byferial.com/wp-content/uploads/2023/03/Social-Member-Logo.png" alt="empower member" width="150" height="150" />';
							break;
						case "empower-consultant":
							echo '<img class="size-thumbnail wp-image-9508" src="https://byferial.com/wp-content/uploads/2023/02/Elite-Member-Logo.png" alt="empower consultant" width="150" height="150" />';
							break;
						case "empower-professional":
							echo '<img class="size-thumbnail wp-image-9511" src="https://byferial.com/wp-content/uploads/2023/02/Skilled-Member-Logo.png" alt="empower professional" width="150" height="150" />';
							break;
						case "empower-master":										
							echo '<img class="size-thumbnail wp-image-9509" src="https://byferial.com/wp-content/uploads/2023/03/Ambassador-Logo.png" alt="empower master" width="150" height="150" />';
							break;
							
					}
					?>
				</div>
			</div>
		</div>
		
		<?php

	} else {
		// filters form
		$directory_filters = get_directory_filters();
		$params_country = $_GET['filter_country'];
		$params_states = $_GET['filter_states'];

		if($params_country !== "United States") $params_states = "";
		?>
			<form action="" method="get" class="consultant-directory__form">
				<select name="filter_country" id="filter_country">
					<option value="">All countries</option>
		<?php
					foreach($directory_filters['country'] as $filter_country){
						$selected = "";
						if($params_country == $filter_country) $selected = "selected";
						?>
							<option value="<?php echo $filter_country; ?>" <?php echo $selected; ?>><?php echo $filter_country; ?></option>
						<?php
					}
		?>
				</select>
		<?php
			if($params_country == "United States"){
		?>
				<select name="filter_states" id="filter_states">
					<option value="">All States</option>
		<?php
					foreach($directory_filters['states'] as $filter_state){
						$selected = "";
						if($params_states == $filter_state) $selected = "selected";
						?>
							<option value="<?php echo $filter_state; ?>" <?php echo $selected; ?>><?php echo $filter_state; ?></option>
						<?php
					}
		?>
				</select>
		<?php
			}
		?>
				<input type="submit" value="Search">
			</form> 
		<?php
	
		// Replace 'My Membership' by your targeted membership name.
		$member_countries = get_active_member_countries();
	
		// Test raw output
		//echo '<pre>'; print_r( $member_countries ); echo '</pre>';
		
		
		?>
		
		<div id="accordion" class="rw-consultant-directory">
			
		<?php
			
		$i = 0;
		
			?>
	
			<div class="card">
					<div class="card-body">
					<?php
					
					// This function get_active_members_for_membership is in rw-fsg/create-consultant-client.php
					// It returns a list of members with status active or pending cancellation
					// $consultant_data = get_active_members_for_membership($country->meta_value);

					if($params_country) $consultant_data = get_active_members_for_membership($params_country);
					else $consultant_data = get_active_members_for_membership_default();
					
					/*
					if (current_user_can('administrator')) {
						
						echo "<pre>";
						print_r($consultant_data);
						echo "</pre>";
						
					}
					*/
					
					$consultants_order = array();
					$consultants_order_coach = array();
					$consultants_order_professional_image_consultant= array();
					$consultants_order_certified_image_consultant = array();
					$consultants_order_4x4 = array();
					$consultants_order_master = array();
					$consultants_order_professional = array();
					$consultants_order_consultant = array();
					$consultants_order_member = array();
					
					foreach ( $consultant_data as $consultant ) {
						
						// For each consultant get list of active memberships
						// This is a built in WC function and returns both active and pending cancellation
						$memberships = wc_memberships_get_user_active_memberships( $consultant->user_id );	
										
						
						$allowed_memberships = array( 'certified-master-image-coach','certified-professional-image-consultant','certified-image-consultant','certified-4x4-color-consultant','empower-member', 'empower-consultant', 'empower-professional', 'empower-master' );
						
						// Loop through all membership plans a customer has and
						// store as a variable only ones which match an allowed membership
						foreach ( $memberships as $membership ) {
							if ( in_array($membership->plan->slug, $allowed_memberships, true ) ) {
								
								$qualified_plan = $membership->plan->post->post_name;
								$membership_order = $membership->plan->post->menu_order;
							
							}
						}
						
						if (current_user_can('administrator')) {

							//echo "<pre>";
							//print_r($memberships);
							//echo $membership->plan->slug;
							//echo "</pre>";
							
						}
						// var_dump($qualified_plan);
						switch ($qualified_plan) {
							case 'certified-master-image-coach':
								$consultants_order_coach[$consultant->user_id] = array(
									'user_id' => $consultant->user_id,
									'consultant_name' => get_field('consultant_name', 'user_' . $consultant->user_id),
									'user_nicename' => $consultant->user_nicename,
									'membership_plan' => $qualified_plan,
									'membership_order' => $membership_order,
								);
								break;
							case 'certified-professional-image-consultant':
								$consultants_order_professional_image_consultant[$consultant->user_id] = array(
									'user_id' => $consultant->user_id,
									'consultant_name' => get_field('consultant_name', 'user_' . $consultant->user_id),
									'user_nicename' => $consultant->user_nicename,
									'membership_plan' => $qualified_plan,
									'membership_order' => $membership_order,
								);
								break;
							case 'certified-image-consultant':
								$consultants_order_certified_image_consultant[$consultant->user_id] = array(
									'user_id' => $consultant->user_id,
									'consultant_name' => get_field('consultant_name', 'user_' . $consultant->user_id),
									'user_nicename' => $consultant->user_nicename,
									'membership_plan' => $qualified_plan,
									'membership_order' => $membership_order,
								);
								break;
							case 'certified-4x4-color-consultant':
								$consultants_order_4x4[$consultant->user_id] = array(
									'user_id' => $consultant->user_id,
									'consultant_name' => get_field('consultant_name', 'user_' . $consultant->user_id),
									'user_nicename' => $consultant->user_nicename,
									'membership_plan' => $qualified_plan,
									'membership_order' => $membership_order,
								);
								break;
							case 'empower-master':
								$consultants_order_master[$consultant->user_id] = array(
									'user_id' => $consultant->user_id,
									'consultant_name' => get_field('consultant_name', 'user_' . $consultant->user_id),
									'user_nicename' => $consultant->user_nicename,
									'membership_plan' => $qualified_plan,
									'membership_order' => $membership_order,
								);
								break;
							case 'empower-professional':
								$consultants_order_professional[$consultant->user_id] = array(
									'user_id' => $consultant->user_id,
									'consultant_name' => get_field('consultant_name', 'user_' . $consultant->user_id),
									'user_nicename' => $consultant->user_nicename,
									'membership_plan' => $qualified_plan,
									'membership_order' => $membership_order,
								);
								break;
							case 'empower-consultant':
								$consultants_order_consultant[$consultant->user_id] = array(
									'user_id' => $consultant->user_id,
									'consultant_name' => get_field('consultant_name', 'user_' . $consultant->user_id),
									'user_nicename' => $consultant->user_nicename,
									'membership_plan' => $qualified_plan,
									'membership_order' => $membership_order,
								);
								break;
							case 'empower-member':
								$consultants_order_member[$consultant->user_id] = array(
									'user_id' => $consultant->user_id,
									'consultant_name' => get_field('consultant_name', 'user_' . $consultant->user_id),
									'user_nicename' => $consultant->user_nicename,
									'membership_plan' => $qualified_plan,
									'membership_order' => $membership_order,
								);
								break;
							default:
								break;
						}

						$consultants_order[$consultant->user_id] = array(
							'user_id' => $consultant->user_id,
							'consultant_name' => get_field('consultant_name', 'user_' . $consultant->user_id),
							'user_nicename' => $consultant->user_nicename,
							'membership_plan' => $qualified_plan,
							'membership_order' => $membership_order,
						);
						
					}

					uasort($consultants_order_coach, fn($a, $b) => $a['consultant_name'] <=> $b['consultant_name']);
					uasort($consultants_order_professional_image_consultant, fn($a, $b) => $a['consultant_name'] <=> $b['consultant_name']);
					uasort($consultants_order_certified_image_consultant, fn($a, $b) => $a['consultant_name'] <=> $b['consultant_name']);
					uasort($consultants_order_4x4, fn($a, $b) => $a['consultant_name'] <=> $b['consultant_name']);

					uasort($consultants_order_master, fn($a, $b) => $a['consultant_name'] <=> $b['consultant_name']);
					uasort($consultants_order_professional, fn($a, $b) => $a['consultant_name'] <=> $b['consultant_name']);
					uasort($consultants_order_consultant, fn($a, $b) => $a['consultant_name'] <=> $b['consultant_name']);
					uasort($consultants_order_member, fn($a, $b) => $a['consultant_name'] <=> $b['consultant_name']);

					$final_consultant_list = $consultants_order_coach + $consultants_order_professional_image_consultant + $consultants_order_certified_image_consultant + $consultants_order_4x4 + $consultants_order_master + $consultants_order_professional + $consultants_order_consultant + $consultants_order_member;

					// empower-consultant = 8459, empower-professional = 8460, empower-master = 8461";
			
					foreach ( $final_consultant_list as $consultant ) {
				
						// Only show consultants with empower memberships
						$allowed_memberships = array( 'certified-master-image-coach','certified-professional-image-consultant','certified-image-consultant','certified-4x4-color-consultant','empower-member', 'empower-consultant', 'empower-professional', 'empower-master' );
							
						if ( in_array($consultant['membership_plan'], $allowed_memberships, true ) ) {
				
							$show_my_listing = get_field('show_my_listing', 'user_' . $consultant['user_id']);
							$consultant_name = get_field('consultant_name', 'user_' . $consultant['user_id']);
							$consultant_company = get_field('consultant_company', 'user_' . $consultant['user_id']);
							$consultant_city = get_field('consultant_city', 'user_' . $consultant['user_id']);
							$consultant_state__province = get_field('consultant_state__province', 'user_' . $consultant['user_id']);
							$consultant_country = get_field('consultant_country', 'user_' . $consultant['user_id']);
							$consultant_phone = get_field('consultant_phone', 'user_' . $consultant['user_id']);
							$consultant_email = get_field('consultant_email', 'user_' . $consultant['user_id']);
							$consultant_website = get_field('consultant_website', 'user_' . $consultant['user_id']);
							$consultant_profile_image = get_field('consultant_profile_image', 'user_' . $consultant['user_id']);
							
							if($params_states && $params_states !== $consultant_state__province){
								continue;
							}

							//$current_membership = wc_memberships_get_user_active_memberships($consultant->user_id);
							if ($show_my_listing == "Yes") {
							?>
							
								<div class="rw-consultant-card">
									<div class="rw-consultant-card-header">
										<div class="rw-consultant-image">
											<a href="<?php echo site_url(); ?>/consultant-directory/<?php echo $consultant['user_nicename']; ?>/">
											<?php if( !empty( $consultant_profile_image ) ): ?>
												<img src="<?php echo esc_url($consultant_profile_image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($consultant_profile_image['alt']); ?>" width="<?php echo $consultant_profile_image['sizes']['thumbnail-width']; ?>" height="<?php echo $consultant_profile_image['sizes']['thumbnail-height']; ?>" />
											<?php else: ?>
												<img class="size-thumbnail wp-image-9513" src="https://byferial.com/wp-content/uploads/2020/07/no-consultant-image-150x150.png" alt="" width="150" height="150" />
											<?php endif; ?>
											</a>
										</div>
										<div class="rw-badge">
	
											<?php 
											switch ($consultant['membership_plan']) {
												case "certified-master-image-coach":
													echo '<img class="size-thumbnail wp-image-9510" src="https://byferial.com/wp-content/uploads/2023/05/Certified-Master-Image-Coach-Logo.png" alt="empower member" width="150" height="150" />';
													break;
												case "certified-professional-image-consultant":
													echo '<img class="size-thumbnail wp-image-9510" src="https://byferial.com/wp-content/uploads/2023/05/Certified-Professional-Image-Consultant-Logo.png" alt="empower member" width="150" height="150" />';
													break;
												case "certified-image-consultant":
													echo '<img class="size-thumbnail wp-image-9510" src="https://byferial.com/wp-content/uploads/2023/05/Certified-4X4-Color-Consultant.png" alt="empower member" width="150" height="150" />';
													break;
												case "certified-4x4-color-consultant":
													echo '<img class="size-thumbnail wp-image-9510" src="https://byferial.com/wp-content/uploads/2023/05/4X4-Color-Consultant-Logo.png" alt="empower member" width="150" height="150" />';
													break;
												case "empower-member":
													echo '<img class="size-thumbnail wp-image-9510" src="https://byferial.com/wp-content/uploads/2023/03/Social-Member-Logo.png" alt="empower member" width="150" height="150" />';
													break;
												case "empower-consultant":
													echo '<img class="size-thumbnail wp-image-9508" src="https://byferial.com/wp-content/uploads/2023/02/Elite-Member-Logo.png" alt="empower consultant" width="150" height="150" />';
													break;
												case "empower-professional":
													echo '<img class="size-thumbnail wp-image-9511" src="https://byferial.com/wp-content/uploads/2023/02/Skilled-Member-Logo.png" alt="empower professional" width="150" height="150" />';
													break;
												case "empower-master":										
													echo '<img class="size-thumbnail wp-image-9509" src="https://byferial.com/wp-content/uploads/2023/03/Ambassador-Logo.png" alt="empower master" width="150" height="150" />';
													break;
													
											}
											
											?>
											
										</div>
									</div>
									<div class="rw-consultant-contact">
										<p><a href="<?php echo site_url(); ?>/consultant-directory/<?php echo $consultant['user_nicename']; ?>/"><strong><?php echo $consultant_name; ?></strong></a><br>
										
										<?php if ($consultant_company != "") : echo '<strong>' . $consultant_company . '</strong><br>'; endif; ?>
										<?php if ($consultant_city != "") : echo $consultant_city . ', '; endif; ?>
										<?php if ($consultant_state__province != "") : echo $consultant_state__province . ', '; endif; ?>
										<?php if ($consultant_country != "") : echo $consultant_country . '<br>'; endif; ?>
										<?php if ($consultant_phone != "") : ?>
										<strong>Phone:</strong> <a href="tel:<?php echo $consultant_phone; ?>"><?php echo $consultant_phone; ?></a>
										<?php endif; ?>
										</p>
									</div>
									<div class="rw-bottom-row">
										<div class="rw-bottom-contacts">
											<?php if ($consultant_phone != "") : ?>
											<a class="rw-round-button" href="tel:<?php echo $consultant_phone; ?>"><i class="fas fa-phone"></i></a>
											<?php endif; ?>
											<?php if ($consultant_email != "") : ?>
											<a class="rw-round-button" href="mailto:<?php echo $consultant_email; ?>"><i class="fas fa-envelope"></i></a>
											<?php endif; ?>
											<?php if ($consultant_website != "") : ?>
											<a class="rw-round-button" href="<?php echo $consultant_website; ?>" target="_blank" rel="noopener"><i class="fas fa-link"></i></a>
											<?php endif; ?>
										</div>
										<div class="rw-bottom-button">
											<a href="<?php echo site_url(); ?>/consultant-directory/<?php echo $consultant['user_nicename']; ?>/" class="fl-button">View Bio</a>
										</div>
									</div>
	
								</div>
					
							<?php
							} // if ($show_my_listing == "Yes") {
								
						} //if ( array_intersect( $allowed_memberships, $consultant[membership_plan] ) ) {
					
					} // foreach ( $consultants_order as $consultant ) {
					?>
					</div><!--End .card-body -->
			</div><!--End .card -->
		
			<?php
			
			$i++;
			
			?>
		
		</div><!--End #accordion -->
	
		<?php
	
	}
	
	return ob_get_clean();

}

?>