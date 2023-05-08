<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;

$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

if ( ! $short_description ) {
	return;
}

/* RW EDIT: GET ACF FIELDS */

$cubic_capacity = get_field('cubic_capacity');
$interior_dimensions = get_field('interior_dimensions');
$interior_dimensions_2 = get_field('interior_dimensions_2');
$exterior_dimensions = get_field('exterior_dimensions');


?>
<div class="woocommerce-product-details__short-description">
	<?php echo $short_description; // WPCS: XSS ok. ?>
	<p>
		<?php if ($cubic_capacity != "") { ?>
		Cubic Capacity: <?php echo $cubic_capacity; ?><br>
		<?php } ?>
		<?php if ($exterior_dimensions != "") { ?>
		Exterior Dimensions: <?php echo $exterior_dimensions; ?><br>
		<?php } ?>
		<?php if ($interior_dimensions != "") { ?>
		Interior Dimensions: <?php echo $interior_dimensions; ?><br>
		<?php } ?>
		<?php if ($interior_dimensions_2 != "") { ?>
		Interior Dimensions 2: <?php echo $interior_dimensions_2; ?><br>
		<?php } ?>
	</p>
</div>
