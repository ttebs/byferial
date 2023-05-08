<?php

//update_option( 'siteurl', 'https://www.radicalwebs.com' );
//update_option( 'home', 'https://www.radicalwebs.com' );

update_option( 'siteurl', 'http://localhost/byferial' );
update_option( 'home', 'http://localhost/byferial' );

// Defines
define( 'FL_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FL_CHILD_THEME_URL', get_stylesheet_directory_uri() );

define( 'RW_BEAVER_CACHE_NUM', '47' );

// Classes
require_once 'classes/class-fl-child-theme.php';

// Actions
add_action( 'wp_enqueue_scripts', 'FLChildTheme::enqueue_scripts', 1000 );

/* RW FUNCTIONS
=====================================*/

/* Load RW Functions and CPTs
-------------------------------------------------------------------------*/
require_once( get_stylesheet_directory() . '/rw/rw-functions.php');


//* Remove Really Simple Discovery
remove_action('wp_head', 'rsd_link');

//* Remove Windows Live Writer
remove_action('wp_head', 'wlwmanifest_link');

//* Remove WordPress Generator
remove_action('wp_head', 'wp_generator');

//* Remove Post Relational Links
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');

// remove Shortlink
// <link rel='shortlink' href='http://example.com/?p=25' />
remove_action('wp_head', 'wp_shortlink_wp_head', 10);

// remove HTTP header
// Link: <https://example.com/?p=25>; rel=shortlink
remove_action( 'template_redirect', 'wp_shortlink_header', 11);



/* remove comments from pages
-------------------------------------------------------------------------*/
add_action('init', 'remove_comment_support', 100);
function remove_comment_support() {
    remove_post_type_support( 'page', 'comments' );
}

/* Enable Shortcodes in Widgets
-------------------------------------------------------------------------*/
add_filter('widget_text','do_shortcode');

/* Change the Excerpt Read More Link from Hellip
-------------------------------------------------------------------------
// First need to remove the filter on the parent theme
function child_theme_setup() {
	// override parent theme's 'more' text for excerpts
    remove_filter( 'excerpt_more',          'FLTheme::excerpt_more' );
}
add_action( 'after_setup_theme', 'child_theme_setup' );

// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
    return '<p><a class="read-more" href="'. get_permalink($post->ID) . '">Read More</a></p>';
}
add_filter('excerpt_more', 'new_excerpt_more');
*/

/* Basic Blog Pagination Nav
-------------------------------------------------------------------------*/
function pagination_nav() {
    global $wp_query;
 
    if ( $wp_query->max_num_pages > 1 ) { ?>
        <nav class="pagination" role="navigation">
            <div class="nav-previous"><?php next_posts_link( '&larr; Older posts' ); ?></div>
            <div class="nav-next"><?php previous_posts_link( 'Newer posts &rarr;' ); ?></div>
        </nav>
<?php }
}

/* Add Span to Widget Category Count
-------------------------------------------------------------------------*/
add_filter( 'wp_list_categories', 'cat_count_span' );
function cat_count_span( $links ) {
    $links = str_replace( '</a> (', '</a> <span class="count">', $links );
    $links = str_replace( ')', '</span>', $links );
    return $links;
}

/* Display Gravity Forms Label Visibility Options
-------------------------------------------------------------------------*/
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

/* Prevent Paragraph Tags Being Added to Shortcodes
-------------------------------------------------------------------------*/
function rw_clean_shortcodes( $content ) {
    $array = array(
        '<p>[' => '[',
        ']</p>' => ']',
        ']<br />' => ']'
    );
    $content = strtr( $content, $array );
    return $content;
}
add_filter( 'the_content', 'rw_clean_shortcodes' );

/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options –> Reading
  // Return the number of products you wanna show per page.
  $cols = 20;
  return $cols;
}
/**
 * Rename product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

	$tabs['description']['title'] = __( 'Description' );		// Rename the description tab
	$tabs['zoom-meeting-details']['title'] = __( 'Additional Info' );				// Rename the reviews tab

	return $tabs;

}



/** 
  * Workaround for The Events Plugin Shortcodes to work with Beaver Builder
  *	https ://theeventscalendar.com/knowledgebase/k/using-shortcodes-with-beaver-builder/
  */

add_action( 'init', function() {
    add_shortcode( 'tribe_events', function( $atts ) {
        $shortcode = new Tribe__Events__Pro__Shortcodes__Tribe_Events( $atts );
        return $shortcode->output();
    } );
}, 100 );



