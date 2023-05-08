<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

?>

<!--Breadcrumbs-->
<?php
// Shortcode in /rw/rw-shared-shortcodes/rw-shared-shortcodes.php
echo do_shortcode("[rw-breadcrumbs-shortcode]");
?>

<!--H1 Heading-->
<?php

$page_title = woocommerce_page_title(false);
// Shortcode in /rw/rw-shared-shortcodes/rw-shared-shortcodes.php
echo do_shortcode("[rw-h1-full-width-row page_title='" . $page_title . "']");
?>

<!--The Content-->

<?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>

<?php
/**
 * Hook: woocommerce_archive_description.
 *
 * @hooked woocommerce_taxonomy_archive_description - 10
 * @hooked woocommerce_product_archive_description - 10
 */
do_action( 'woocommerce_archive_description' );
?>

<?php
if ( woocommerce_product_loop() ) {

    /**
     * Hook: woocommerce_before_shop_loop.
     *
     * @hooked wc_print_notices - 10
     * @hooked woocommerce_result_count - 20
     * @hooked woocommerce_catalog_ordering - 30
     */
    do_action( 'woocommerce_before_shop_loop' );

    /* RW CODE */
    // Get Current Tax ID
    $term_id = get_queried_object_id();
    
    /*
    echo "<pre>";
    print_r($current_term);
    echo "</pre>";
    */
    
    //if (sizeof($categories) > 0) {

        //foreach ($categories as $category) {

            //$current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            
            //$term_link = get_term_link( $category );
            
            //echo $category->count;
            
            /*
            if ($category->count > 0) {
                echo '<h2 class="title" style="width: 100%; clear: both;"><a href="' . esc_url( $term_link ) . '" rel="bookmark" title="' . $category->name . '">' . $category->name . '</a></h2>';
            }
            */
            
            $args = array(
                'post_type'     => 'product',
                'posts_per_page'=>  -1,
                'orderby'       => 'menu_order',
                'order'         => 'ASC',
                'post_status'   => 'publish',
                'tax_query' => array(
                    /*
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => $category->slug,
                    ),
                    */
                    array(
                        'taxonomy' => 'rw_woo_brands',
                        'field'    => 'term_id',
                        'terms'    => $term_id,
                    ),
                    
                ),
                'taxonomy' => $category->slug //passing the slug of the current category
            );
            
            $loop = new WP_Query ( $args );
            
            woocommerce_product_loop_start();

            if ( wc_get_loop_prop( 'total' ) ) {
                while ( $loop->have_posts() ) {
                    $loop->the_post();

                    /**
                     * Hook: woocommerce_shop_loop.
                     *
                     * @hooked WC_Structured_Data::generate_product_data() - 10
                     */
                    do_action( 'woocommerce_shop_loop' );

                    wc_get_template_part( 'content', 'product' );
                }
            }

            woocommerce_product_loop_end();
            
        //} // end foreach ($categories as $category) {
        
    //} // end if (sizeof($categories) > 0) {
            
            

    /**
     * Hook: woocommerce_after_shop_loop.
     *
     * @hooked woocommerce_pagination - 10
     */
    do_action( 'woocommerce_after_shop_loop' );
} else {
    /**
     * Hook: woocommerce_no_products_found.
     *
     * @hooked wc_no_products_found - 10
     */
    do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

?>
        
<?php
get_footer( 'shop' );