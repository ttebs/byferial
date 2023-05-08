<?php

require_once( get_stylesheet_directory() . '/rw/rw-client-info/rw-client-info.php');

require_once( get_stylesheet_directory() . '/rw/rw-social/rw-beaver-social.php');

require_once( get_stylesheet_directory() . '/rw/rw-shared-shortcodes/rw-shared-shortcodes.php');

require_once( get_stylesheet_directory() . '/rw/rw-woocommerce.php');

/* Load RW Testimonials */
require_once( get_stylesheet_directory() . '/rw/rw-testimonials/create-cpt.php');

/* Load FSG Questionnaires */
require_once( get_stylesheet_directory() . '/rw/rw-fsg/create-questionnaire-cpt.php');

/* Load FSG Content Blocks */
require_once( get_stylesheet_directory() . '/rw/rw-fsg/create-content-blocks-cpt.php');

/* Load FSG Shortcodes */
require_once( get_stylesheet_directory() . '/rw/rw-fsg/calculations.php');
require_once( get_stylesheet_directory() . '/rw/rw-fsg/shortcode-fsg-single.php');
require_once( get_stylesheet_directory() . '/rw/rw-fsg/shortcode-fsg-consultant-client.php');
require_once( get_stylesheet_directory() . '/rw/rw-fsg/shortcode-fsg-questionnaire.php');
require_once( get_stylesheet_directory() . '/rw/rw-fsg/shortcode-fsg-values.php');
require_once( get_stylesheet_directory() . '/rw/rw-fsg/shortcode-membership-pricing.php');

/* Load FSG Consultant Client Code */
require_once( get_stylesheet_directory() . '/rw/rw-fsg/create-consultant-client.php');

/* Load FSG Consultant Client Code */
require_once( get_stylesheet_directory() . '/rw/rw-fsg/consultant-directory-filters.php');

/* Load Consultant Directory */
require_once( get_stylesheet_directory() . '/rw/rw-fsg/shortcode-consultant-directory.php');

add_action( 'wp_enqueue_scripts', 'rw_enqueue_assets2' );
function rw_enqueue_assets2() {
	
	//Add CSS Styles in classes/class-fl-child-theme.php
    
    wp_enqueue_script ( 'jquery-masonry');

}

/* Set Image Sizes
/* Default Sizes Set in Media Settings are:
/* Thumbnail: 150 x 150 (hard crop)
/* Medium: 348 x 348  (one-third)
/* Large: 1100 x 1100 (content-width)
------------------------------------------------*/
//add_image_size( 'full-page', 1140, 1140 ); // soft proportional crop mode
add_image_size( 'two-thirds', 726, 726 ); // soft proportional crop mode
add_image_size( 'half', 537, 537 ); // soft proportional crop mode (2 columns in left area)
add_image_size( 'one-quarter', 254, 254 ); // soft proportional crop mode (2 columns in left area)
add_image_size( 'blog-archive', 726, 250, true );


/**
 * Register Widget Areas.
 *

function rw_widgets_init() {

	register_sidebar(
		array(
			'id'            => 'header_right',
			'name'          => 'Header Right',
			'description'	=> __( 'Add Content to the right of the header', 'text_domain' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
	
	

}
add_action( 'widgets_init', 'rw_widgets_init' );
 */