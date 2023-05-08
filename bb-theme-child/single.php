<?php

$uploads = wp_upload_dir();
$upload_path = $uploads['baseurl'];

// Cache number defined at top of functions.php
wp_enqueue_style( 'fl-builder-layout-' . RW_BEAVER_CACHE_NUM . '-css', $upload_path . '/bb-plugin/cache/' . RW_BEAVER_CACHE_NUM . '-layout.css' );

?>

<?php get_header(); ?>

<!--H1 Heading-->
<?php 
// Shortcode in /rw/rw-shared-shortcodes/rw-shared-shortcodes.php
?>

<!--Breadcrumbs-->
<?php
// Shortcode in /rw/rw-shared-shortcodes/rw-shared-shortcodes.php
echo do_shortcode("[rw-breadcrumbs-shortcode]");
?>

<div class="container">
	<div class="row">
		
		<?php FLTheme::sidebar( 'left' ); ?>
		
		<div class="fl-content <?php FLTheme::content_class(); ?>">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'single' ); ?>
			<?php endwhile;
endif; ?>
		</div>
		
		<?php FLTheme::sidebar( 'right' ); ?>
		
	</div>
</div>

<?php get_footer(); ?>
