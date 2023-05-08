<?php

/*
Template Name: ACF Form
Template Post Type: post, page
*/

$uploads = wp_upload_dir();
$upload_path = $uploads['baseurl'];

if ( class_exists('ACF') ) {
	acf_form_head();
}

// Cache number defined at top of functions.php
wp_enqueue_style( 'fl-builder-layout-' . RW_BEAVER_CACHE_NUM . '-css', $upload_path . '/bb-plugin/cache/' . RW_BEAVER_CACHE_NUM . '-layout.css' );

get_header();
?>


<div class="fl-content-full container">
	<div class="row">
		<div class="fl-content col-md-12">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'content', 'page' );
				endwhile;
			endif;
			?>
		</div>
	</div>
	
</div>

<?php get_footer(); ?>
