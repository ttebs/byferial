<?php
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
    
    $output = "";

	if ($loop->posts) {

		$output .= '<div class="rw-testimonial-wrapper">';
		
			$output .= 'Here';

		 	$post_count = 0;
			while ( $loop->have_posts() ) : $loop->the_post();
				
                $post_count++;
				//$post_id = get_the_ID();
				//$terms = get_the_terms( get_the_ID(), 'testimonial-category' );
				//$meta = get_post_meta( get_the_ID() );
				//$content_check = get_the_content();

				$output .= '<div class="rw-test">';
					
                $output .= the_content();
					
				$output .= '<p><strong>' . the_title() .  '</strong></p>';

				$output .= '</div>';

            endwhile;

		$output .= '</div> <!-- .rw-testimonial-wrapper -->'; 

    } // End if ($loop->posts)
		
	$output = ob_get_clean();
    
    return $output;

}

?>