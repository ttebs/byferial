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
	
	// Attributes
	$values = shortcode_atts(
		array(
		'category' => ''
		),
		$atts,
		'rw-testimonial-slider'
	);

	//echo $category;

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

			<!--
			<div class="titlebar">
				<div class="category-name">
					<h3>Reviews</h3>
				</div>
				<?php if ($category != '') { ?>
				<div class="view-all">
					<p><a href="<?php echo $testimonial_source; ?>" target="_blank">View All</a></p>
				</div>
				<?php } else { ?>
				<div class="view-all">
					<p><a href="https://www.acrytech.com/reviews/">View All</a></p>
				</div>
				<?php } ?>
			</div>
			-->

			<div class="woop-woop">
		 	
		 	<ul class="bxslider rw-testimonial-slider">

		 	<?php $post_count = 0; ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php $post_count++; ?>
				<?php $post_id = get_the_ID(); ?>
				<?php $terms = get_the_terms( get_the_ID(), 'testimonial-category' ); ?>
				<?php $meta = get_post_meta( get_the_ID() ); ?>
				<?php $content_check = get_the_content(); ?>

				<li class="rw_testimonial_slide_<?php echo $post_count; ?>">

					<?php // GET STARS
					 /*  
					$rw_rating = get_post_meta($post_id, 'ecpt_rating', true);

					$stars = '';
					$stars = '<i class="fa fa-star"></i>';
					$halfstar = '<i class="fa fa-star-half-o"></i>';
					$rstars = str_repeat($stars,intval($rw_rating));

					//build half stars
					$half = round($rw_rating-intval($rw_rating));
					$rstars .= str_repeat($halfstar,$half);

					if($empty_stars){
						$emptystar = '<i class="fa fa-star-o"></i>';

						if(5-intval($rw_rating) != 5){
							$estars = str_repeat($emptystar,5-round($rw_rating));
							$rstars .= $estars;
						} 
					}

					$stars = '<div class="rating-stars"><span class="value-title" title="'.$rw_rating.'"> </span> '.$rstars.' </div>';
					$stars .= '<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
							 <meta itemprop="worstRating" content = "1">
							 <meta itemprop="ratingValue" content = "'.$rw_rating.'">
							 <meta itemprop="bestRating" content="5">
						 </div>';
					*/
					?>

					<?php //echo $stars; ?>
					
					<?php if ($category == "") {

						$terms = get_the_terms( $post_id, 'rw_testimonial_category' );
						
						if ($terms) {
							foreach($terms as $term) {
								$testimonial_source_name = $term->name;
								$testimonial_source = get_term_meta( $term->term_id, 'testimonial_source', true );
							}
						}
						
					?>
					
					<!--
					<div class="rw-review-source">
						Source: <a href="<?php //echo $testimonial_source; ?>" target="_blank"><?php //echo $testimonial_source_name; ?></a>
					</div>
					-->
					
					<?php } // End if ($category == "") { ?>
					
					
					
					<h5><strong>Product Reviewed:</strong> <?php echo get_post_meta($post_id, 'ecpt_product_reviewed', true); ?></h5>

					<h4><?php echo get_post_meta($post_id, 'ecpt_heading', true); ?></h4>

					<?php the_content(); ?>
					
					<p><strong><?php the_title(); ?></strong><br>
					<?php echo get_post_meta($post_id, 'ecpt_reviewer_company', true); ?>
					
					<?php if (!empty(get_post_meta($post_id, 'ecpt_reviewer_company', true))) { ?><br>
					<?php echo get_post_meta($post_id, 'ecpt_reviewer_location', true); ?><?php } ?>
					
					<?php if (!empty(get_post_meta($post_id, 'ecpt_reviewer_website', true))) { ?><br>
					<?php echo get_post_meta($post_id, 'ecpt_reviewer_website', true); ?><?php } ?>
					</p>

				</li>

			<?php endwhile; ?>

			</ul>
			
			</div>

			<script>

				jQuery(document).ready(function(){
					jQuery('.rw-testimonial-slider').bxSlider({
						adaptiveHeight: true,
						mode: 'horizontal',
						pager: true,
						auto: true,
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
		
	$output = ob_get_clean();
	return $output;

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

				echo '<div class="rw-testimonial">';
                the_content();
                echo '</div>';
        
                echo '<div class="arrow-down"></div>';
					
				echo '<div class="rw-testimonial-author">';
                the_title();
                echo '</div>';

            endwhile;

		echo '</div> <!-- .rw-testimonial-wrapper -->'; 

    } // End if ($loop->posts)
    
    wp_reset_postdata();
		
	return ob_get_clean();

}

?>