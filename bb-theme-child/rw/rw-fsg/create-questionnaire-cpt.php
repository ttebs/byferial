<?php

//////////////////////////////////////////
//* FSG Questionnaire Custom Post Type *//
//////////////////////////////////////////

function register_fsg_questionnaire_posttype() {
	$labels = array(
		'name' 				=> _x( 'FSG Questionnaires', 'post type general name' ),
		'singular_name'		=> _x( 'FSG Questionnaire', 'post type singular name' ),
		'add_new' 			=> __( 'Add New' ),
		'add_new_item' 		=> __( 'Add New Questionnaire' ),
		'edit_item' 			=> __( 'Edit Questionnaire' ),
		'new_item' 			=> __( 'New Questionnaire' ),
		'view_item' 			=> __( 'View Questionnaire' ),
		'search_items' 		=> __( 'Search Questionnaires' ),
		'not_found' 			=> __( 'No Questionnaires found' ),
		'not_found_in_trash'	=> __( 'No Questionnaires found in the trash' ),
		'parent_item_colon' 	=> __( '' ),
		'menu_name'			=> __( 'FSG Questionnaires' )
	);

	$taxonomies = array();

	$supports = array('title', 'author');

	$post_type_args = array(
		'labels' 				=> $labels,
		'singular_label' 		=> __('Review'),
		'public' 				=> true,
		'show_ui' 				=> true,
		'publicly_queryable'	=> true,
		'query_var'				=> true,
		'exclude_from_search'	=> false,
		'show_in_nav_menus'		=> false,
		'capability_type' 		=> 'post',
		'has_archive' 			=> true,
		'hierarchical' 			=> false,
		'rewrite' 				=> array('slug' => 'fsg-questionnaire', 'with_front' => false ),
		'supports' 				=> $supports,
		'menu_position' 		=> 50,
		'menu_icon' 			=> 'dashicons-star-filled',
		'taxonomies'			=> $taxonomies
	 );
	 register_post_type('fsg_questionnaire',$post_type_args);
}
add_action('init', 'register_fsg_questionnaire_posttype');

//-----------------------------------------------------//
// LOAD FSG SINGLE QUESTIONNAIRE FROM RW-FSG DIRECTORY //
//-----------------------------------------------------//
 
function fsg_questionnaire_single_template( $template ) {
    global $post;

    if ( 'fsg_questionnaire' === $post->post_type && locate_template( array( 'single-fsg_questionnaire.php' ) ) !== $template ) {
        /*
         * This is a 'fsg_questionnaire' post
         * AND a 'single fsg questionnaire template' is not found on
         * theme or child theme directories, so load it
         * from our plugin directory.
         */
        //return plugin_dir_path( __FILE__ ) . 'single-movie.php';
        return FL_CHILD_THEME_DIR . '/rw/rw-fsg/single-fsg_questionnaire.php';
    }

    return $template;
}
add_filter( 'single_template', 'fsg_questionnaire_single_template' );

//-------------------------------------------------------//
// Make FSG Uneditable after 5 days for Retail Customers //
//-------------------------------------------------------//

function rw_restrict_customer_editing( $post ) {
	
	// Get Current User ID
	$current_user_id = get_current_user_id();
	
	$user_info = wp_get_current_user();
	$retrict_roles = array( 'customer' );
	
	$allow_editing = "Y";
	
	/*
	echo "<pre>";
	echo "<b>Post Date/Time:</b> " . $post->post_date . "<br>";
	echo "<b>Comp Value:</b>     " . strtotime( $post->post_date ) . "<br>";
	echo "<b>Test Value:</b>     " . strtotime( '-5 day' ) . "<br>";
	echo "<b>5 Days Ago:</b>     " . date('Y-m-d H:i:s', strtotime( '-5 day' )) . "<br>";
	echo "</pre>";
	*/
	
	if ( array_intersect( $retrict_roles, $user_info->roles ) ) {

		//if post is older than 30 days. Change it to meet your needs
		if( strtotime( $post->post_date ) < strtotime( '-5 day' ) ) {
			
			$allow_editing = "N";
			
		}

	}
		
	return $allow_editing;

}










?>