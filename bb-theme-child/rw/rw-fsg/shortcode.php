<?php

/* Testimonial Slider Shortcode 
-----------------------------------------*/

add_shortcode( 'rw-testimonial-slider', 'rw_testimonial_shortcode' );
function rw_testimonial_shortcode( $atts ) {
	
	ob_start();
	
	$posts = 6;
	$orderby = 'rand';
	$order = 'DESC';
	$delay = 0;
	$category = "";
	$empty_stars = true;
	$show_arrows = 'Y';
	
	// Attributes
	$atts = shortcode_atts(
		array(
		'category' => '',
		'posts' => '',
		'show_arrows' => ''
		),
		$atts,
		'rw-testimonial-slider'
	);
	
	if ($atts['posts'] != "") {
		$posts = $atts['posts'];
	}
	
	if ($atts['category'] != "") {
		$category = $atts['category'];
	}
	
	if ($atts['show_arrows'] != "") {
		$show_arrows = $atts['show_arrows'];
	}

	if ($category != '') {
		if ( !is_numeric($category) ) { 

			$term = get_term_by('slug', $category, 'rw_testimonial_category');

			//print_r($term);

			if ($term) { 
				$categoryid = $term->term_id;
			} else {
				$categoryid = $category;
			}
		}
		if ( is_numeric($category) ){ 
			$categoryid = $category;
		}
		
		$testimonial_source = get_term_meta( $term->term_id, 'testimonial_source', true );
		$testimonial_source_name = $term->name;
		
	}
	
	
	
	if ($category != '') {
	
		$args = array( 
		'post_type' => 'rw_testimonials',
		'posts_per_page' => $posts, 
		'orderby'=>$orderby,
		'order'=>$order,
		'tax_query' => array(
				array(
					'taxonomy' => 'rw_testimonial_category',
					'field' => 'slug',
					'terms' => $category
				)
			)
		);
		
	} else {
		
		$args = array( 
		'post_type' => 'rw_testimonials',
		'posts_per_page' => $posts, 
		'orderby'=>$orderby,
		'order'=>$order
		);
		
	}
	
	
	//print_r($args);

	$loop = new WP_Query( $args );

	//echo "<pre>";
	//print_r($loop);
	//echo "</pre>";	
	
	if ($loop->posts) { ?>

		<div class="rw-testimonial-wrapper<?php if ($category != '') {echo " " . $term->slug;} ?>">
		 	
		 	<ul class="bxslider rw-testimonial-slider">

		 	<?php $post_count = 0; ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
				<?php
				$post_count++;
				$post_id = get_the_ID();
				$terms = get_the_terms( get_the_ID(), 'testimonial-category' );
				
				$rw_heading = get_field('rw_testimonials_heading');
				$rw_reviewer_company = get_field('rw_testimonials_company');
				$rw_reviewer_location = get_field('rw_testimonials_location');
				$rw_reviewer_position = get_field('rw_testimonials_position');
				$rw_rating = get_field('rw_testimonials_rating');
				?>

				<li class="rw_testimonial_slide_<?php echo $post_count; ?>">

					<?php
					if ($rw_rating != "") {
					
						// BUILD STARS
						$stars = '';
						$stars = '<i class="fa fa-star"></i>';
						$halfstar = '<i class="fa fa-star-half-o"></i>';
						$rstars = str_repeat($stars,intval($rw_rating));
	
						//build half stars
						$half = round($rw_rating - intval($rw_rating));
						$rstars .= str_repeat($halfstar,$half);
	
						if($empty_stars){
							$emptystar = '<i class="fa fa-star-o"></i>';
	
							if(5-intval($rw_rating) != 5){
								$estars = str_repeat($emptystar,5 - round($rw_rating));
								$rstars .= $estars;
							} 
						}
	
						$stars = '<div class="rating-stars"><span class="value-title" title="'.$rw_rating.'"> </span> '.$rstars.' </div>';
						
						// Schema - Don't Show Unless an Aggregate is being shown
						//$stars .= '<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
						//		 <meta itemprop="worstRating" content = "1">
						//		 <meta itemprop="ratingValue" content = "'.$rw_rating.'">
						//		 <meta itemprop="bestRating" content="5">
						//	 </div>';
							 
						echo $stars;
					
					}
					?>
					
					
					<?php if ($rw_heading != "") { ?>
						<h4><?php echo $rw_heading; ?></h4>
					<?php } ?>

					<?php the_content(); ?>
					
					<p class="rw-reviewer-info"><strong><?php the_title(); ?></strong>
					<?php if ($rw_reviewer_position != "") { ?><br>
					<?php echo $rw_reviewer_position; ?>
					<?php } ?>
					<?php if ($rw_reviewer_company != "") { ?><br>
					<?php echo $rw_reviewer_company; ?>
					<?php } ?>
					<?php if ($rw_reviewer_location != "") { ?><br>
					<?php echo $rw_reviewer_location; ?>
					<?php } ?>				
					<?php if ($category == "") {
						
						echo "<br>";

						$terms = get_the_terms( $post_id, 'rw_testimonial_category' );
						
						if ($terms) {
							foreach($terms as $term) {
								$testimonial_source_name = $term->name;
								$testimonial_source = get_term_meta( $term->term_id, 'testimonial_source', true );
							}
						}
						
					?>

						<strong>Source:</strong> <a href="<?php echo $testimonial_source; ?>" target="_blank"><?php echo $testimonial_source_name; ?></a>

					<?php } // End if ($category == "") { ?>
					</p>

				</li>

			<?php endwhile; ?>

			</ul>

			<script>

				jQuery(document).ready(function(){
					jQuery('.rw-testimonial-slider').bxSlider({
						adaptiveHeight: true,
						mode: 'fade',
						pager: true,
						auto: true,
						<?php if ($show_arrows == "N") { ?>
						controls: false,
						<?php } ?>
						nextText: '<i class="fa fa-angle-right"></i>',
						prevText: '<i class="fa fa-angle-left"></i>',
						autoStart: true,
						autoHover: true,
						autoDelay: <?php echo $delay; ?>,
						onSliderLoad: function(){
							jQuery(".rw-testimonial-slider").css("visibility", "visible");
						}
					});
					
				});

			</script>

		</div> <!-- .rw-testimonial-wrapper -->   

<?php } // End if ($loop->posts)

	wp_reset_postdata();

	return ob_get_clean();

}



/* Single Testimonial Shortcode 
-----------------------------------------*/

add_shortcode( 'rw-testimonial-single', 'rw_testimonial_single_shortcode' );
function rw_testimonial_single_shortcode( $atts ) {
	
	// Attributes
	$atts = shortcode_atts(array(
		'review_id' => '',
        'rw_slug' => '',
		),
		$atts,
        'rw-testimonial-single'
	);
    
	//echo "ID: " . $atts['review_id'];

    $args = array( 
        'post_type' => 'rw_testimonials',
        'p'    => $atts['review_id'],
        'slug' => $atts['rw_slug'],
    );
    
    //echo "<pre>";
	//print_r($args);
    //echo "</pre>";
    
	$loop = new WP_Query( $args );

    //echo "<pre>";
	//print_r($loop);
	//echo "</pre>";
    
    ob_start();

	if ($loop->posts) {

		echo '<div class="rw-testimonial-wrapper">';

		 	$post_count = 0;
			while ( $loop->have_posts() ) : $loop->the_post();
				
                $post_count++;
				//$post_id = get_the_ID();
				//$terms = get_the_terms( get_the_ID(), 'testimonial-category' );
				//$meta = get_post_meta( get_the_ID() );
				//$content_check = get_the_content();
				
				$content = wpautop( $loop->post->post_content );
				
				echo '<h3 style="text-align: center;">Testimonial</h3>';

				echo '<div class="rw-testimonial">';
                //the_content();
                echo $content;
                echo '</div>';
        
                echo '<div class="arrow-down"></div>';
					
				echo '<div class="rw-testimonial-author">';
                the_title('<strong>', '</strong>');
                echo '</div>';

            endwhile;

		echo '</div> <!-- .rw-testimonial-wrapper -->'; 

    } // End if ($loop->posts)
    
    wp_reset_postdata();
		
	return ob_get_clean();

}

?>