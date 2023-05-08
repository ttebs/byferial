<?php

////////////////////////////////////////
//* RW Testimonials Custom Post Type *//
////////////////////////////////////////

function register_rw_testimonials_posttype() {
	$labels = array(
		'name' 				=> _x( 'Reviews', 'post type general name' ),
		'singular_name'		=> _x( 'Testimonial', 'post type singular name' ),
		'add_new' 			=> __( 'Add New' ),
		'add_new_item' 		=> __( 'Add New Testimonial' ),
		'edit_item' 			=> __( 'Edit Testimonial' ),
		'new_item' 			=> __( 'New Testimonial' ),
		'view_item' 			=> __( 'View Testimonial' ),
		'search_items' 		=> __( 'Search Testimonials' ),
		'not_found' 			=> __( 'No Testimonials found' ),
		'not_found_in_trash'	=> __( 'No Testimonials found in the trash' ),
		'parent_item_colon' 	=> __( '' ),
		'menu_name'			=> __( 'Testimonials' )
	);

	$taxonomies = array('rw_testimonial_category');

	$supports = array('title', 'editor', 'thumbnail','page-attributes');

	$post_type_args = array(
		'labels' 				=> $labels,
		'singular_label' 		=> __('Testimonial'),
		'public' 				=> true,
		'show_ui' 				=> true,
		'publicly_queryable'	=> true,
		'query_var'				=> true,
		'exclude_from_search'	=> false,
		'show_in_nav_menus'		=> false,
		'capability_type' 		=> 'post',
		'has_archive' 			=> true,
		'hierarchical' 			=> false,
		'rewrite' 				=> array('slug' => 'praise', 'with_front' => false ),
		'supports' 				=> $supports,
		'menu_position' 		=> 50,
		'menu_icon' 			=> 'dashicons-star-filled',
		'taxonomies'			=> $taxonomies
	 );
	 register_post_type('rw_testimonials',$post_type_args);
}
add_action('init', 'register_rw_testimonials_posttype');

/* Create Testimonials Category Taxonomy
-------------------------------------------------*/
function register_testimonial_category_tax() {
	$labels = array(
		'name'               => _x( 'Testimonial Categories', 'taxonomy general name' ),
		'singular_name'      => _x( 'Testimonial Category', 'taxonomy singular name' ),
		'add_new'            => _x( 'Add New Testimonial Category', 'Testimonial Category' ),
		'add_new_item'       => __( 'Add New Testimonial Category' ),
		'edit_item'          => __( 'Edit Testimonial Category' ),
		'new_item'           => __( 'New Testimonial Category' ),
		'view_item'          => __( 'View Testimonial Category' ),
		'search_items'       => __( 'Search Testimonial Categories' ),
		'not_found'          => __( 'No Testimonial Category found' ),
		'not_found_in_trash' => __( 'No Testimonial Category found in Trash' ),
	);
	
	$pages = array( 'rw_testimonials' );
	
	$args = array(
		'labels'            => $labels,
		'singular_label'    => __( 'Testimonial Category' ),
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'hierarchical'      => true,
		'query_var'         => true,
		'show_tagcloud'     => false,
		'show_in_nav_menus' => true,
		'rewrite'           => array( 'slug' => 'testimonial-category', 'with_front' => false )

	 );
	register_taxonomy( 'rw_testimonial_category', $pages, $args );
}
add_action( 'init', 'register_testimonial_category_tax' );





/* Add Extra Field to Taxonomy */
// https://section214.com/2016/01/adding-custom-meta-fields-to-taxonomies/
function rw_testimonials_taxonomy_add_meta_fields( $taxonomy ) {
    ?>
    <div class="form-field term-group">
        <label for="testimonial_source"><?php _e( 'Testimonial Source', 'rw-tesimonials' ); ?></label>
        <input type="text" id="testimonial_source" name="testimonial_source" />
    </div>
    <?php
}
add_action( 'rw_testimonial_category_add_form_fields', 'rw_testimonials_taxonomy_add_meta_fields', 10, 2 );


function rw_testimonials_taxonomy_edit_meta_fields( $term, $taxonomy ) {
    $testimonial_source = get_term_meta( $term->term_id, 'testimonial_source', true );
    ?>
    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label for="testimonial_source"><?php _e( 'Testimonial Source', 'rw-tesimonials' ); ?></label>
        </th>
        <td>
            <input type="text" id="testimonial_source" name="testimonial_source" value="<?php echo $testimonial_source; ?>" />
        </td>
    </tr>
    <?php
}
add_action( 'rw_testimonial_category_edit_form_fields', 'rw_testimonials_taxonomy_edit_meta_fields', 10, 2 );


function rw_testimonials_taxonomy_save_taxonomy_meta( $term_id, $tag_id ) {
    if( isset( $_POST['testimonial_source'] ) ) {
        update_term_meta( $term_id, 'testimonial_source', esc_attr( $_POST['testimonial_source'] ) );
    }
}
add_action( 'created_rw_testimonial_category', 'rw_testimonials_taxonomy_save_taxonomy_meta', 10, 2 );
add_action( 'edited_rw_testimonial_category', 'rw_testimonials_taxonomy_save_taxonomy_meta', 10, 2 );





?>