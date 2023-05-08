<?php

$uploads = wp_upload_dir();
$upload_path = $uploads['baseurl'];

// Cache number defined at top of functions.php
wp_enqueue_style( 'fl-builder-layout-' . RW_BEAVER_CACHE_NUM . '-css', $upload_path . '/bb-plugin/cache/' . RW_BEAVER_CACHE_NUM . '-layout.css' );

?>

<?php 
acf_form_head(); // load ACF Form Processing
wp_deregister_style( 'wp-admin' );
get_header();
?>

<!--H1 Heading-->
<?php 
// Shortcode in /rw/rw-shared-shortcodes/rw-shared-shortcodes.php
echo do_shortcode("[rw-h1-full-width-row page_title='FSG Questionnaire']");
?>

<!--Breadcrumbs-->
<?php
// Shortcode in /rw/rw-shared-shortcodes/rw-shared-shortcodes.php
echo do_shortcode("[rw-breadcrumbs-shortcode]");
?>

<div class="container">
	<div class="row">
		
		<?php //FLTheme::sidebar( 'left' ); ?>
		
		<div class="fl-content <?php FLTheme::content_class(); ?>">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
				<?php
				$userid 					= get_field( "userid" );
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
				?>
				
				<?php
					echo "<pre>";
					print_r($post);
					echo "</pre>";
				?>
				
				<?php do_action( 'fl_before_post' ); ?>
				<article <?php post_class( 'fl-post' ); ?> id="fl-post-<?php the_ID(); ?>">
				
					<?php if ( FLTheme::show_post_header() ) : ?>
					<header class="fl-post-header">
						<h1 class="fl-post-title"><?php the_title(); ?></h1>
						<?php edit_post_link( _x( 'Edit', 'Edit page link text.', 'fl-automator' ) ); ?>
					</header><!-- .fl-post-header -->
					<?php endif; ?>
					<?php do_action( 'fl_before_post_content' ); ?>
					<div class="fl-post-content clearfix">
						<?php
						if ( ! ( is_user_logged_in() || current_user_can('publish_posts') ) ) {
						?>
							<p>You must be a registered author to post.</p>
						<?php
						} else {
						?>
						
						
							
							<p>References:</p>
							<ul>
								<li><a href="https://medium.com/techcompose/how-to-add-advanced-custom-fields-acf-to-a-frontend-form-2b89c8cfdcee" target="_blank">https://medium.com/techcompose/how-to-add-advanced-custom-fields-acf-to-a-frontend-form-2b89c8cfdcee</a></li>
								<li><a href="https://www.advancedcustomfields.com/resources/create-a-front-end-form/" target="_blank">https://www.advancedcustomfields.com/resources/create-a-front-end-form/</a></li>
								
								
								
							</ul>
							
							
							<ul>
								<li>Need to figure out 
									<ul>
										<li>User buys FSG</li>
										<li>FSG Menu Item shows in My Account</li>
										<li>Menu Item Links to a FSG Questionnaire Page (Not single-template)</li>
										<li>Page is restricted to only show content for current logged in user</li>
										<li><strong>FIXED:</strong> [post_author] is automatically assigned when the form is saved</li>
										<li>If customer has not yet completed questionnaire show New Form</li>
										<li>Would be nice to title the Questionnaire with Customer Name and ID or Order ID</li>
										<li>If customer has completed questionnaire, show Answers and Edit Button that loads Form</li>
										<li>On save changes show Green info bar that changes are saved</li>
										<li>Also show button the view the report - load page that puts together the report from answers</li>
									</ul>
								</li>
								<li>Need to restrict access to page to logged in users who purchased a Fashion and Style Guide</li>
							</ul>
							
							<?php
								
							$author_id = get_the_author_meta('ID');
							
							echo $author_id . "<br><br>";
								
								
						    if (isset($_GET['action'])) {
							    
						        if($_GET['action'] == 'edit') { ?>
						        
						            <div class="acf-edit-post">
						            <?php 
									    if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
									        echo "<div class='acf-edit-post'>";
									            acf_form (array(
									                'field_groups' => array(1518), // Same ID(s) used before
									                'form' => true,
									                'return' => '%post_url%',
									                'submit_value' => 'Save Changes',
									                'post_title' => true,
									                'post_content' => true,
									                'updated_message'		=> 'Saved!',
													'html_updated_message'	=> '<div id="message" class="updated"><p>%s</p></div>'
									            ));
									        echo "</div>";
									    }
									?>
						            </div>
						        
						        <?php } else if($_GET['action'] == 'add') { ?>
						    
							    	<h2>New Questionnaire</h2>
									<p>Need to assign current user id, customize layout, need to assign current user name to post title</p>
							
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
									acf_register_form(array(
										'id'					=> 'new-fsg-questionnaire',
										'post_id'				=> 'new_post',
										'new_post'				=> array(
											'post_type'			=> 'fsg_questionnaire',
											'post_status'		=> 'publish'
										),
										'post_title'			=> true,
										//'post_content'		=> true,
										//'uploader'			=> 'basic',
										//'return'				=> home_url('thank-your-for-submitting-your-recipe'),
										
										'field_groups' => array(1518), // Same ID(s) used before
										
										
										//'fields'				=> $fields,
										'submit_value'			=> 'Submit',
										'html_submit_button'	=> '<input type="submit"class="acf-button button button-primary button-large"value="%s"/>',
										'updated_message'		=> 'Saved!',
										'html_updated_message'	=> '<div id="message" class="updated"><p>%s</p></div>',
							    	));
									// Load the form
									acf_form('new-fsg-questionnaire');
									?>
								
								<?php } ?>

							<?php
							} else {
							?>
							
								<p><strong>Current User ID:</strong> <?php echo get_current_user_id(); ?></p>
								<p><strong>Head to floor:</strong> <?php echo $head_to_floor; ?></p>
								<p><strong>Bust to floor:</strong> <?php echo $bust_to_floor; ?></p>
								<p><strong>Hip to floor:</strong> <?php echo $hip_to_floor; ?></p>
								<p><strong>Kneecap to floor:</strong> <?php echo $kneecap_to_floor; ?></p>
								<p><strong>Full Bust Circumference:</strong> <?php echo $full_bust_circumference; ?></p>
								<p><strong>Bra Cup Size:</strong> <?php echo $bra_cup_size; ?></p>
								<p><strong>Full Hip Circumference:</strong> <?php echo $full_hip_circumference; ?></p>
								<p><strong>Waist Circumference:</strong> <?php echo $waist_circumference; ?></p>
								<p><strong>Wrist Circumference:</strong> <?php echo $wrist_circumference; ?></p>
								<p><strong>Ankle Circumference:</strong> <?php echo $ankle_circumference; ?></p>
								<p><strong>Neck Length:</strong> <?php echo $neck_length; ?></p>
								<p><strong>Neck Circumference:</strong> <?php echo $neck_circumference; ?></p>
								<p><strong>Shoulders:</strong> <?php echo $shoulders; ?></p>
								<p><strong>Prominent Features:</strong> <?php echo $prominent_features; ?></p>
								<p><strong>Face Shape:</strong> <?php echo $face_shape; ?></p>
								<p><strong>Weight (lbs):</strong> <?php echo $weight; ?></p>
								<p><strong>Age:</strong> <?php echo $age; ?></p>
								
								<?php
								/* Show the edit button to the post author only */
								$current_user = wp_get_current_user(); // Just in case it is not set anywhere else
								if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) { ?>
									<a class='post-edit-button fl-button' href="<?php echo get_permalink() ?>?action=edit">Edit Post</a>
								<?php } ?>
								
								<?php
								/* Show the edit button to the post author only */
								$current_user = wp_get_current_user(); // Just in case it is not set anywhere else
								if ( ( is_user_logged_in() ) ) { ?>
									<a class='post-add-button fl-button' href="<?php echo get_permalink() ?>?action=add">New Questionnaire</a>
								<?php } ?>
							
							<?php
						    }
							?>
							
							
							
							
							
							
						<?php } // End Else is_user_logged_in() ?>	
							
						
					</div><!-- .fl-post-content -->
					<?php do_action( 'fl_after_post_content' ); ?>
				
				</article>
				
				<?php //comments_template(); ?>
				<?php do_action( 'fl_after_post' ); ?>
				<!-- .fl-post -->

			<?php endwhile; endif; ?>
		</div>
		
		<?php //FLTheme::sidebar( 'right' ); ?>
		
	</div>
</div>

<?php get_footer(); ?>
