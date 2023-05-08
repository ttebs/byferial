<?php

//////////////////////////////////////////
//* FSG Questionnaire Custom Post Type *//
//////////////////////////////////////////

function register_fsg_content_blocks_posttype() {
	$labels = array(
		'name' 				=> _x( 'FSG Content Blocks', 'post type general name' ),
		'singular_name'		=> _x( 'FSG Content Block', 'post type singular name' ),
		'add_new' 			=> __( 'Add New' ),
		'add_new_item' 		=> __( 'Add New Content Block' ),
		'edit_item' 			=> __( 'Edit Content Block' ),
		'new_item' 			=> __( 'New Content Block' ),
		'view_item' 			=> __( 'View Content Block' ),
		'search_items' 		=> __( 'Search Content Blocks' ),
		'not_found' 			=> __( 'No Content Blocks found' ),
		'not_found_in_trash'	=> __( 'No Content Blocks found in the trash' ),
		'parent_item_colon' 	=> __( '' ),
		'menu_name'			=> __( 'FSG Content Blocks' )
	);

	$taxonomies = array();

	$supports = array('title', 'editor', 'revisions');

	$post_type_args = array(
		'labels' 				=> $labels,
		'singular_label' 		=> __('Review'),
		'public' 				=> true,
		'show_ui' 				=> true,
		'publicly_queryable'	=> true,
		'query_var'				=> true,
		'exclude_from_search'	=> true,
		'show_in_nav_menus'		=> false,
		'capability_type' 		=> 'post',
		'has_archive' 			=> true,
		'hierarchical' 			=> false,
		'rewrite' 				=> array('slug' => 'fsg-content-block', 'with_front' => false ),
		'supports' 				=> $supports,
		'menu_position' 		=> 50,
		'menu_icon' 			=> 'dashicons-star-filled',
		'taxonomies'			=> $taxonomies
	 );
	 register_post_type('fsg_content_blocks',$post_type_args);
}
add_action('init', 'register_fsg_content_blocks_posttype');

/* Create Content Blocks Category Taxonomy
-------------------------------------------------*/
function register_fsg_content_blocks_category_tax() {
	$labels = array(
		'name'               => _x( 'FSG Content Block Categories', 'taxonomy general name' ),
		'singular_name'      => _x( 'FSG Content Block Category', 'taxonomy singular name' ),
		'add_new'            => _x( 'Add New FSG Content Block Category', 'FSG Content Block Category' ),
		'add_new_item'       => __( 'Add New FSG Content Block Category' ),
		'edit_item'          => __( 'Edit FSG Content Block Category' ),
		'new_item'           => __( 'New FSG Content Block Category' ),
		'view_item'          => __( 'View FSG Content Block Category' ),
		'search_items'       => __( 'Search FSG Content Block Categories' ),
		'not_found'          => __( 'No FSG Content Block Category found' ),
		'not_found_in_trash' => __( 'No FSG Content Block Category found in Trash' ),
	);
	
	$pages = array( 'fsg_content_blocks' );
	
	$args = array(
		'labels'            => $labels,
		'singular_label'    => __( 'FSG Content Block Category' ),
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'hierarchical'      => true,
		'query_var'         => true,
		'show_tagcloud'     => false,
		'show_in_nav_menus' => false,
		'rewrite'           => array( 'slug' => 'fsg-content-block-category', 'with_front' => false )

	 );
	register_taxonomy( 'fsg_content_blocks_category', $pages, $args );
}
add_action( 'init', 'register_fsg_content_blocks_category_tax' );




// LOAD FSG SINGLE CONTENT BLOCKS FROM RW-FSG DIRECTORY
/*
function fsg_content_blocks_single_template( $template ) {
    global $post;

    if ( 'fsg_content_blocks' === $post->post_type && locate_template( array( 'single-fsg_content_blocks.php' ) ) !== $template ) {
        //return plugin_dir_path( __FILE__ ) . 'single-movie.php';
        return FL_CHILD_THEME_DIR . '/rw/rw-fsg/single-fsg_content_blocks.php';
    }

    return $template;
}
add_filter( 'single_template', 'fsg_content_blocks_single_template' );
*/



// $layouts - full-width, 2-col, 3-col, 4-col
function rw_get_fsg_content_block($content_block, $background="", $class="") {
	
	$output = '';
		
	$add_classes = "rw-fsg-section";
	
	if ($background != "") {
		$add_classes .= " " . $background;
	}
	
	if ($class != "") {
		$add_classes .= " " . $class;
	}
	
	if ($background != "") {
		
		$output .= '<div class="' . $add_classes . '">';
		$output .= '	<div class="rw-fixed-width">';
		//$output .= '		<h2>' . $content_block->post_title . '</h2>';
		$output .= '		<h2>' . $content_block->post_title . '</h2>';
		$output .= wpautop( apply_filters( 'the_content', $content_block->post_content, -1 ) );
		$output .= '	</div>';
		$output .= '</div>';
				
	} else {
		
		$output .= '<div class="' . $add_classes . '">';
		$output .= '	<div class="rw-fixed-width">';
		$output .= '		<h2>' . $content_block->post_title . '</h2>';
		$output .= wpautop( apply_filters( 'the_content', $content_block->post_content, -1 ) );
		$output .= '	</div>';
		$output .= '</div>';
		
	}

	return $output;
	
}

function rw_ouput_section_image($image, $overlay_class) {
	
	$output = '';

	$output .= '<div class="item ' . $overlay_class . '">';
	$output .= '	<div class="rw-image-wrap">';	
	$output .= '		<img src="' . esc_url($image['rw_image']['sizes']['medium']) . '" alt="' . esc_attr($image['rw_image']['alt']) . '" width="227" height="340" />';
	$output .= '	</div>';
	$output .= '	<p>' . esc_html($image['rw_name']) . '</p>';
	$output .= '</div>';

	return $output;

}


/*
function rw_display_fsg_section_gallery($fsg_content_block, $image_size="medium") {

	$content_block = get_page_by_path( $fsg_content_block, OBJECT, 'fsg_content_blocks' );
	$content_block_gallery = get_field('rw_section_gallery', $content_block->ID);
	$size = $image_size; // (thumbnail, medium, large, full or custom size)

	$output = '';
	
	$output .= '<div class="rw-fsg-section">';
	$output .= '	<div class="rw-fixed-width">';
	$output .= '		<div class="fsg-section-gallery fsg-col-3">';
	foreach( $content_block_gallery as $image ):
	$output .= '			<div class="item">';
	$output .= '				<img src="' . esc_url($image['sizes']['medium']) . '" alt="' . esc_attr($image['alt']) . '" width="184" height="216" />';
	$output .= '				<p>' . esc_html($image['caption']) . '</p>';
	$output .= '			</div>';
	endforeach;
	$output .= '		</div>';
	$output .= '	</div>';
	$output .= '</div>';

	return $output;

}
*/







?>