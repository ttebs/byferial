<?php

/*
Template Name: My Account
Template Post Type: post, page
*/

$uploads = wp_upload_dir();
$upload_path = $uploads['baseurl'];

// Cache number defined at top of functions.php
wp_enqueue_style( 'fl-builder-layout-' . RW_BEAVER_CACHE_NUM . '-css', $upload_path . '/bb-plugin/cache/' . RW_BEAVER_CACHE_NUM . '-layout.css' );


if ( class_exists('ACF') ) {
	acf_form_head();
}

get_header();

// Shortcode in /rw/rw-shared-shortcodes/rw-shared-shortcodes.php
$the_title = get_the_title();
echo do_shortcode("[rw-h1-full-width-row page_title='" . $the_title . "']");

// Shortcode in /rw/rw-shared-shortcodes/rw-shared-shortcodes.php
echo do_shortcode("[rw-breadcrumbs-shortcode]");
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
