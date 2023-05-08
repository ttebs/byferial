<?php

$uploads = wp_upload_dir();
$upload_path = $uploads['baseurl'];

// Cache number defined at top of functions.php
wp_enqueue_style( 'fl-builder-layout-' . RW_BEAVER_CACHE_NUM . '-css', $upload_path . '/bb-plugin/cache/' . RW_BEAVER_CACHE_NUM . '-layout.css' );

?>

<?php get_header(); ?>


<div class="fl-page-content" itemprop="mainContentOfPage">
    
    <!--H1 Heading-->
    <?php 
    // Shortcode in /rw/rw-shared-shortcodes/rw-shared-shortcodes.php
    $rw_cat_title = single_cat_title( '', false );
    echo do_shortcode("[rw-h1-full-width-row page_title='Blog: " . $rw_cat_title . "']");
    ?>
    
    <!--Breadcrumbs-->
    <?php
    // Shortcode in /rw/rw-shared-shortcodes/rw-shared-shortcodes.php
    echo do_shortcode("[rw-breadcrumbs-shortcode]");
    ?>

    <!--The Content-->
<div class="fl-archive container">
<div class="row">
	
	<?php FLTheme::sidebar( 'left' ); ?>
	
	<div class="fl-content <?php FLTheme::content_class(); ?>">
	
		<div class="rw-masonry-grid-container">

			<?php
			if ( have_posts() ):
				while ( have_posts() ): the_post();
				//$format = get_post_format( $post_id );
			?>

			<article id="post-<?php the_ID(); ?>" class="col-xs-12">

				<div class="rw-post-content-wrapper">

					<!-- Blog Thumbnail -->
					<?php if (has_post_thumbnail(get_the_ID())) { ?>
					<div class="rw-post-image">

						<?php the_post_thumbnail('blog-archive'); // one-third ?>

						<div class="rw-overlay">
							<div class="rw-table-full">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="rw-overlay-item rw-table-cell">
									<div class="rw-overlay-item-container"><i class="fas fa-link"></i></div>
								</a>
							</div>
						</div>

					</div>
					<?php }  ?>
					
					<div class="rw-post-content">

						<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	
						<div class="entry-meta">
							<p><?php the_time('M jS, Y') ?></p>
						</div>
	
						<div class="rw-blog-excerpt">
							<?php the_excerpt(); ?>
						</div>
	
						<div class="rw-comments-cats-meta">
	
							<div class="sh-columns post-meta-comments">
								<span class="post-meta-categories">
									<?php echo get_the_category_list( ', ' ); ?>
								</span>
								<?php comments_popup_link( '<i class="far fa-comments"></i> 0', '<i class="far fa-comments"></i> 1', '<i class="far fa-comments"></i> %', 'post-meta-comments', '<i class="far fa-comments"></i> 0' ); ?>
							</div>
	
						</div>
					
					</div>

				</div>

			</article>

			<?php endwhile; ?>
		
			<?php
			else :
				?>
			<div>No Results</div>
			<?php
			endif;
			?>

		</div>
		<!-- .rw-masonry-grid-container -->
		
		<?php

		if ( function_exists( 'wp_pagenavi' ) ) {
			wp_pagenavi();
		} else {
			pagination_nav();
		}
		?>

    </div>
    <!-- .fl-content -->
    
    <?php FLTheme::sidebar( 'right' ); ?>
        
</div>
<!-- .row -->
</div>
<!-- .container -->

<script type="text/javascript">
    /*
    jQuery( window ).load( function () {
        var container = document.querySelector( '.rw-masonry-grid-container' );
        var msnry = new Masonry( container, {
            itemSelector: 'article',
            columnWidth: 'article',
        } );

    } );
    */
</script>

<?php get_footer(); ?>