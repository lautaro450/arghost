<?php
/**
 * The template for displaying product widget entries
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product; ?>
<li>
    <div class="product-image">
        <a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>"><?php echo wp_kses_post($product->get_image()); ?></a>
        <?php if ( ! empty( $show_rating ) ) : ?>
		<?php echo wp_kses_post($product->get_rating_html()); ?>
	<?php endif; ?>
    </div>
    <div class="info-products">
        <a class="product-name" href="<?php echo esc_url( get_permalink( $product->id ) ); ?>"><?php echo wp_kses_post($product->get_title()); ?></a>
        <div class="price-box">
            <?php echo str_replace('amount','price-box',wc_price($product->get_display_price())); ?>
        </div>
    </div>
</li>