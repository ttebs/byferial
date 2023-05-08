<?php

$uploads = wp_upload_dir();
$upload_path = $uploads['baseurl'];

// Cache number defined at top of functions.php
wp_enqueue_style( 'fl-builder-layout-' . RW_BEAVER_CACHE_NUM . '-css', $upload_path . '/bb-plugin/cache/' . RW_BEAVER_CACHE_NUM . '-layout.css' );

wp_enqueue_script('isotope', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', array('jquery'), '3.0.6', true);
wp_enqueue_script('isotope_init', get_stylesheet_directory_uri() . '/rw/rw-testimonials/isotope_init.js', array('isotope'), '', true);

get_header();
?>
   
<!--H1 Heading-->
<?php 
// Shortcode in /rw/rw-shared-shortcodes/rw-shared-shortcodes.php
echo do_shortcode("[rw-h1-full-width-row page_title='Reviews']");
?>

<!--Breadcrumbs-->
<?php
// Shortcode in /rw/rw-shared-shortcodes/rw-shared-shortcodes.php
echo do_shortcode("[rw-breadcrumbs-shortcode]");
?>

<!--The Content-->
<div class="fl-archive container">
<div class="row">
	
	<?php //FLTheme::sidebar( 'left' ); ?>
	
	<div class="fl-content col-sm-12">
		
		<div class="fl-row fl-row-full-width fl-row-bg-none rw-full-width" data-node="rw-h1">
	        <div class="fl-row-content-wrap">
	            <div class="fl-row-content fl-row-fixed-width fl-node-content">
	                <div class="fl-col-group">
	                    <div class="fl-col col-xs-12">
	                        <div class="fl-col-content fl-node-content">
	    		                <div class="fl-module fl-module-rich-text">
	                                <div class="fl-module-content fl-node-content">
	                                    <div class="fl-rich-text">
	                                        <h2 style="text-align: center;">WHAT MY WONDERFUL CLIENTS HAVE TO SAY</h2>
	                                    </div>
	                               </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
									
		<?php $terms = get_terms( 'rw_testimonial_category', array(

			'orderby'		=> 'name',
			'order'		=> 'ASC',
			'hide_empty'	=> 1

		) );

		//echo "<pre>";
		//print_r($terms);
		//echo "</pre>";

		?>

		<?php if( sizeof($terms) == 0 ) { ?>

		<div class="filter-button-group">
			<button data-filter="*">Show All</button>
			<?php
				foreach ($terms as $term ) :
			?>
			<button data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?> (<?php echo $term->count; ?>)</button>
			<?php
				endforeach;
			?>
		</div>

		<?php } ?>
									
		<div class="rw-masonry-grid-container rw-remove-col-padding">

			<?php
			$args = array( 
				'post_type' 		=> 'rw_testimonials', 
				'posts_per_page' 	=> -1,
				'orderby' 			=> 'menu_order',
				'order' 			=> 'DESC',
			);

			$loop = new WP_Query( $args );

			if ( have_posts() ):

				while ( $loop->have_posts() ) : $loop->the_post();

					/* Get the Tax Terms that Each Item in the Loop Belongs to */

					$terms = get_the_terms( get_the_ID(), 'rw_testimonial_category' );

					$separator = ' ';
					$output = '';
					if ( ! empty( $terms ) ) {
						foreach( $terms as $term ) {
							$output .= $term->slug . $separator;
						}
					}

					/* Get CPT Variables */
					//$rw_date =	date('F j, Y', get_post_meta(get_the_ID(), 'ecpt_date', true));
					$rw_testimonials_heading = get_field('rw_testimonials_heading');
					$rw_testimonials_rating = get_field('rw_testimonials_rating');
					$rw_testimonials_position = get_field('rw_testimonials_position');
					$rw_testimonials_company = get_field('rw_testimonials_company');
					$rw_testimonials_location = get_field('rw_testimonials_location');
					$rw_video_testimonial_upload = get_field('video_testimonial_upload');
					$rw_youtube_embed_code = get_field('youtube_embed_code');

					$rw_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'thumbnail' );
					$rw_large_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );


				?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( $output . 'col-xs-12 col-sm-6 col-lg-6 element-item'  );?> data-category="<?php echo $output; ?>">

						<div class="rw-testimonial">
							
							
							<?php if( $rw_youtube_embed_code ): ?>
							
							<div class="rw-video-upload">
								
								<?php echo $rw_youtube_embed_code; ?>
								
							</div>
							
							<?php elseif( $rw_video_testimonial_upload ): ?>
							
							<div class="rw-video-upload">
								
								<?php
								
								$atts = array(
									'src' => $rw_video_testimonial_upload['url'],
									'autoplay' => 'off',
									'loop' => 'off'
								);
								
								
								?>
								
								<?php echo wp_video_shortcode( $atts ); ?>
								
								<?php //print_r($rw_video_testimonial_upload); ?>
								
							</div>
							
							<?php endif; ?>


							<h4><?php echo $rw_testimonials_heading; ?></h4>

							<?php

							$stars = '';
							$stars = '<i class="fas fa-star"></i>';
							$halfstar = '<i class="fas fa-star-half-alt"></i>';
							$rstars = str_repeat($stars,intval($rw_testimonials_rating));
							$empty_stars = true;

							//build half stars
							$half = round($rw_testimonials_rating - intval($rw_testimonials_rating));
							$rstars .= str_repeat($halfstar,$half);

							if($empty_stars){
								$emptystar = '<i class="far fa-star"></i>';

								if(5-intval($rw_testimonials_rating) != 5){
									$estars = str_repeat($emptystar,5-round($rw_testimonials_rating));
									$rstars .= $estars;
								} 
							}

							$stars = '<div class="rw-rating-stars"><span class="value-title" title="'.$rw_testimonials_rating.'"> </span> '.$rstars.' </div>';
							?>

							<?php echo $stars; ?>

							<div class="rw-review-content"><?php the_content(); ?></div>
							
							
							<?php if ( has_post_thumbnail() ) { ?>
							<div class="rw-review-image"> 
								<a href="<?php echo $rw_large_image[0]; ?>"><img src="<?php echo $rw_image[0]; ?>" width="<?php echo $rw_image[1]; ?>" height="<?php echo $rw_image[2]; ?>" alt="<?php the_title_attribute(); ?>"></a>
							</div>
							<?php } ?>
							

						</div>
						<div class="arrow-down"></div>
						<p class="rw-testimonial-author">
							<strong><?php the_title(); ?></strong>
							<?php if ($rw_testimonials_position !="") { ?><br><?php echo $rw_testimonials_position; ?><?php } ?>
							<?php if ($rw_testimonials_company !="") { ?><br><?php echo $rw_testimonials_company; ?><?php } ?>
							<?php if ($rw_testimonials_location !="") { ?><br><?php echo $rw_testimonials_location; ?><?php } ?>
							<br><strong>Source:</strong> 

						<?php
						$terms = get_the_terms( get_the_ID(), 'rw_testimonial_category' );
						
						echo "<pre>";
						print_r($terms);
						echo "</pre>";
						
						if ( !empty($terms) ) :

							$array_keys = array_keys($terms);
							$last_key = end($array_keys);
							reset($terms);
							
							foreach($terms as $term) {
								
						?>
							<a href="<?php echo get_term_meta( $term->term_id, 'testimonial_source', true ); ?>" target="_blank">
								<?php echo $term->name; ?>
							</a>
							<?php if ( key($term) != $last_key) { echo ", "; } ?> 

						<?php
							}
							
						endif;
						?>

						</p>

					</article> <!-- .et_pb_post -->

				<?php endwhile; ?>

			<?php else : ?>
				<p>Coming Soon....</p>
		<?php endif; ?>
			
		</div>
		<!-- .rw-masonry-grid-container -->
		
		<?php
		/*
		if ( function_exists( 'wp_pagenavi' ) ) {
			wp_pagenavi();
		} else {
			pagination_nav();
		}
		*/
		?>

	</div>
	<!-- .fl-content -->
	
	<?php //FLTheme::sidebar( 'right' ); ?>
					
</div>
<!-- .row -->
</div>
<!-- .container -->

<script type="text/javascript">
    jQuery( window ).load( function () {
        var container = document.querySelector( '.rw-masonry-grid-container' );
        var msnry = new Masonry( container, {
            itemSelector: 'article',
            columnWidth: 'article',
        } );

    } );
</script>


<?php get_footer(); ?>