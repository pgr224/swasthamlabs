<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// check if is mobile
$isMobile = YIT_Mobile()->isMobile();
$product_in_a_row = yit_get_option( 'shop-num-column' );

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$woocommerce_loop['shown_product'] = true;

// Set the products layout style

$woocommerce_loop['products_layout'] = 'flip';


//force flip layout in mobile
if( $isMobile ) {
    $woocommerce_loop['products_layout'] = 'flip';
}


// Set column
if ( ( is_shop() || is_product_category() ) && ! $isMobile ) {
    $woocommerce_loop['columns'] = intval( yit_get_option( 'shop-num-column' ) );

} else if ( isset( $product_in_a_row ) && $product_in_a_row > 0 ) {

    $woocommerce_loop['columns']    = intval( $product_in_a_row );

} else {

    $sidebar = YIT_Layout()->sidebars;

    if ( $sidebar['layout'] == 'sidebar-double' ) {
        $woocommerce_loop['columns']    = '2';
    } elseif ( $sidebar['layout'] == 'sidebar-right' || $sidebar['layout'] == 'sidebar-left' ) {
        $woocommerce_loop['columns']    = '3';
    } else {
        $woocommerce_loop['columns']    = '4';
    }

}


?>
<li <?php post_class(); ?> >


    <div class="clearfix product-wrapper <?php echo $woocommerce_loop['products_layout'] ?>">

        <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

        <div class="thumb-wrapper <?php echo $woocommerce_loop['products_layout'] ?>">

            <?php
            /**
             * woocommerce_before_shop_loop_item_title hook
             *
             * @hooked woocommerce_show_product_loop_sale_flash - 10
             * @hooked woocommerce_template_loop_product_thumbnail - 10
             */
            do_action( 'woocommerce_before_shop_loop_item_title' );
            ?>

        </div>

        <div class="product-meta">

            <?php

            /**
             * woocommerce_shop_loop_item_title hook
             *
             * @hooked woocommerce_template_loop_product_title - 10
             */
            do_action( 'woocommerce_shop_loop_item_title' );

            /**
             * woocommerce_after_shop_loop_item_title hook
             *
             * @hooked woocommerce_template_loop_rating - 5
             * @hooked woocommerce_template_loop_price - 10
             */
            do_action( 'woocommerce_after_shop_loop_item_title' ); ?>

        </div>


        <div class="product-actions-wrapper">
            <div class="product-actions">
                <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
            </div>
        </div>
        
    </div>

</li>
