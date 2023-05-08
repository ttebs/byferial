<?php

/* Add fl-builder class to body to Lightbox will work in content
---------------------------------------------------------------------- */

/*add_filter( 'body_class','my_body_classes' );
function my_body_classes( $classes ) {
 
    if ( is_shop() || is_product() ) {
     
        $classes[] = 'fl-builder';
         
    }
     
    return $classes;
     
}*/


/* Add Theme Support For Custom Image Sizes
---------------------------------------------------------------------- */
/*
add_theme_support( 'woocommerce', array(
    'thumbnail_image_width' => 230,
    'gallery_thumbnail_image_width' =>s120,
    'single_image_width' => 490,
) );

add_image_size( 'woocommerce_medium_product', 300, 300 ); // resize the image proportionally
add_image_size( 'woocommerce_full_product', 600, 600 ); // resize the image proportionally
*/

add_image_size( 'woocommerce_full_product', 600, 600 ); // resize the image proportionally

// define the woocommerce_product_single_add_to_cart_text callback 
function filter_woocommerce_product_single_add_to_cart_text( $var, $instance ) { 
    $var = "Add to Cart";
    return $var; 
};      
// add the filter 
add_filter( 'woocommerce_product_single_add_to_cart_text', 'filter_woocommerce_product_single_add_to_cart_text', 10, 2 ); 


// define the Shipping Label on Cart Page 
function custom_shipping_package_name( $name ) {
  return 'Shipping &amp; Handling';
}
add_filter( 'woocommerce_shipping_package_name', 'custom_shipping_package_name' );




/** Disable Ajax Call from WooCommerce on front page and posts*/
/* https://www.webnots.com/fix-slow-page-loading-with-woocommerce-wc-ajaxget_refreshed_fragments/ */
/*
add_action( 'wp_enqueue_scripts', 'dequeue_woocommerce_cart_fragments', 11);
function dequeue_woocommerce_cart_fragments() {
    if (is_front_page() || is_single() ) wp_dequeue_script('wc-cart-fragments');
}
*/
/*
add_action( 'woocommerce_before_main_content', 'rw_shop_page_text', 20 );
function rw_shop_page_text() {
  if( is_shop() ) {
    echo '<p>Whether you need a safe for your home or business, big or small, we have it. We are dealer direct for American Security, Hayman, Hollon, Surimax, High Security Safe, V-Line and more!</p>';
    echo '<div class="rw-notice"><p>Don’t know what safe would be your best option?<br>
    Give us a call or send us an email and we will gladly assist you!</div>';
  }
}
*/

/* ADD A WRAPPER TO THE IMAGE ON THE SHOP ARCHIVES
-------------------------------------------------------------------*/
/*
    // define the woocommerce_before_subcategory callback 
    function action_woocommerce_before_subcategory() { 
        ?>
            <div class="rw-woo-archive-cat-image-wrapper row-eq-height">
        <?php
    }
    add_action( 'woocommerce_before_subcategory', 'action_woocommerce_before_subcategory', 10, 2 );

    // define the woocommerce_before_subcategory_title callback 
    function action_woocommerce_before_subcategory_title() { 
        ?>
            </div>
        <?php
    }
    add_action( 'woocommerce_before_subcategory_title', 'action_woocommerce_before_subcategory_title', 10, 2 );
*/

/* ADD A WRAPPER TO THE IMAGE ON THE SHOP ARCHIVES WITH PRODUCTS
-------------------------------------------------------------------*/
/*
    // define the woocommerce_before_shop_loop_item callback 
    function action_woocommerce_before_shop_loop_item(  ) { 
        ?>
        <div class="rw-woo-archive-product-image-wrapper row-eq-height">
        <?php
    }
    add_action( 'woocommerce_before_shop_loop_item', 'action_woocommerce_before_shop_loop_item', 10, 0 );

    // define the woocommerce_before_shop_loop_item_title callback 
    function action_woocommerce_before_shop_loop_item_title(  ) { 
        ?>
        </div>
        <?php
    }
    add_action( 'woocommerce_before_shop_loop_item_title', 'action_woocommerce_before_shop_loop_item_title', 10, 0 );
*/

/* ADD YOU SAVE AMOUNT UNDER PRODUCT PRICE IF ON SALE
 * https ://axlmulat.com/woocommerce/woocommerce-tutorial-how-to-show-you-save-amount-from-product-sale-price/ 
-------------------------------------------------------------------*/
function you_save_echo_product() {
	global $product;

	// works for Simple and Variable type
	$regular_price 	= get_post_meta( $product->get_id(), '_regular_price', true ); // 36.32
	$sale_price 	= get_post_meta( $product->get_id(), '_sale_price', true ); // 24.99
		
	if( !empty($sale_price) ) {
	
		$saved_amount 		= $regular_price - $sale_price;
		$currency_symbol 	= get_woocommerce_currency_symbol();

		$percentage = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
		?>
			<p class="rw-you-save-price">You Save: <?php echo $currency_symbol .''. number_format($saved_amount, 2, '.', ''); ?></p>				
		<?php		
	}
		
}
add_action( 'woocommerce_single_product_summary', 'you_save_echo_product', 11 ); // hook number
add_action( 'woocommerce_after_shop_loop_item_title', 'you_save_echo_product', 15 ); // hook number

/* Single Product Template Action Edits
-------------------------------------------------------------------*/
remove_action('woocommerce_single_product_summary','woocommerce_template_single_title', 5);


/*
 * Rename product data tabs
 -------------------------------------------------------------------
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

	$tabs['description']['title'] = __( 'Features' );		// Rename the description tab

	return $tabs;

}
*s


/* Add $5 Handling Fee to every order
//http :// www. endocreative. com/add-handling-fee-woocommerce-checkout/
----------------------------------------------------------------------
add_action( 'woocommerce_cart_calculate_fees','endo_handling_fee' );
function endo_handling_fee() {
     global $woocommerce;
 
     if ( is_admin() && ! defined( 'DOING_AJAX' ) )
          return;
 
     $fee = 5.00;
     $woocommerce->cart->add_fee( 'Handling', $fee, true, 'standard' );
}
*/




// Change number or products per row to 2
/*add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
    function loop_columns() {
        if ( is_product_category() ) {
            return 3;
        } else { // for other archive pages and shop page
            return 4;
        }
    }
}*/


// Remove Add to Cart Button on Shop Page
// Before Adding the New Action for Adding the Excerpt
// https ://gist.github.com/lukecav/0d114d897ab804612dc44fe831ad1e02
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

// define the woocommerce_after_shop_loop_item callback 
// Used to Add the ShortDecription and  Order page button
/*function action_woocommerce_after_shop_loop_item() {
    
    global $product;
    
    if ( has_excerpt() ) {
        echo '<div class="product-short-desc">' . the_excerpt() . '</div>';
    }

    echo '<div class="order-page"><a href="' . get_permalink() . '">Order Page</a></div>';

};    
// add the action 
add_action( 'woocommerce_after_shop_loop_item', 'action_woocommerce_after_shop_loop_item', 15, 0 );
*/





/* SHORTCODE TO ADD CART DETAILS TO HEADER
-------------------------------------------------------------------------------------*/
if ( ! function_exists( 'rw_show_cart_items' ) ) {
	
    function rw_show_cart_items( $args = array() ) {
		
        if ( ! class_exists( 'woocommerce' ) ) {
			return;
		}
		
		global $woocommerce;
		
		ob_start();
		
		?>
                
		<div class="header-cart">
			<a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="View your shopping cart"><i class="fas fa-shopping-cart"></i> <?php echo sprintf ( _n( '(%d)', '(%d)', $woocommerce->cart->cart_contents_count ), $woocommerce->cart->cart_contents_count ); ?> Total: <?php echo $woocommerce->cart->get_cart_total(); ?></a>
		</div>
		
		<?php
		
		$output = ob_get_clean();
	
		return $output;

	}
}
add_shortcode( 'rw-header-cart', 'rw_show_cart_items' );


/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {

	global $woocommerce;
	
	ob_start();

	?>
	<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
		
		<i class="fas fa-shopping-cart"></i> <?php echo sprintf ( _n( '(%d)', '(%d)', $woocommerce->cart->cart_contents_count ), $woocommerce->cart->cart_contents_count ); ?> Total: <?php echo $woocommerce->cart->get_cart_total(); ?></a>

	<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}





/*
// Add Title and Breadcrumbs Above Product on Single Product Page
function action_woocommerce_before_single_product( $wc_print_notices, $int ) { 
    
    echo "<p>Here</p>";
    
    
};
add_action( 'woocommerce_before_single_product', 'action_woocommerce_before_single_product', 10, 2 );
*/


/* Replace WooCommerce Breadcrumbs With Yoast Breadcrumbs
 * Credit: Unknown
 * Last Tested: Jan 25, 2018 using Yoast SEO 6.2 on WordPress 4.9.2
 * Theme: Non-WooThemes like Twenty Seventeen, Genesis
 */
// Remove WooCommerce Breadcrumbs

remove_action( 'init', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20 );
/*
add_action( 'woocommerce_before_main_content','my_yoast_breadcrumb', 20, 0 );
if (!function_exists('my_yoast_breadcrumb') ) {
  
    function my_yoast_breadcrumb() {
      
        ?>
        <!--H1 Heading-->
        <div class="fl-row fl-row-full-width h1-full-width-row">
            <div class="fl-row-content fl-row-fixed-width">
                <h1>Page Title</h1>
            </div>
        </div>

        <!--Breadcrumbs-->
        <div class="fl-row-content fl-row-full-width rw-breadcrumbs">
            <div class="fl-row-content fl-row-fixed-width">
                <?php echo do_shortcode("[wpseo_breadcrumb]"); ?>
            </div>
        </div>

    <?php

    }

}
*/

/* Single Product Page Customizations
--------------------------------------------------*/
// content-single-product.php
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

?>