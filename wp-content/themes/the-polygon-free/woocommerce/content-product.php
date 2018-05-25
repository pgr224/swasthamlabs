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
$isPhone = $isMobile && ! YIT_Mobile()->isTablet();

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$woocommerce_loop['shown_product'] = true;


// Set column
if ( ( is_shop() || is_product_category() ) && ! $isMobile && yit_get_option( 'shop-custom-num-column' ) == 'yes' ) {
    $column_value = apply_filters( 'loop_shop_columns', intval( yit_get_option( 'shop-num-column' ) ) );
    $woocommerce_loop['columns']    =  $column_value;
}
elseif ( isset( $product_in_a_row ) ){
    $woocommerce_loop['columns']    = intval( $product_in_a_row );
}
elseif( isset( $featured_widget ) ) {
    $woocommerce_loop['columns'] = '1';
}
else {

    $sidebar = YIT_Layout()->sidebars;

    if ( $sidebar['layout'] == 'sidebar-double' ) {
        $woocommerce_loop['columns']    = '3';
    }
    elseif ( $sidebar['layout'] == 'sidebar-right' || $sidebar['layout'] == 'sidebar-left' ) {
        $woocommerce_loop['columns']    = '4';
    }
    else {
        $woocommerce_loop['columns']    = '6';
    }
}

//Set columns and class mobile phone
$row_mobile_value = yit_get_option( 'shop-products-per-row-mobile' );
$row_mobile = intval( ! empty( $row_mobile_value ) ? $row_mobile_value : 2 );


if( $isPhone && ! isset( $featured_widget ) ) {
    $woocommerce_loop['columns']      = $row_mobile;
}

?>

<li <?php post_class(); ?> >

    <div class="clearfix product-wrapper border">

        <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

        <div class="thumb-wrapper">

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

        <?php if ( has_action('woocommerce_after_shop_loop_item_title') ) : ?>

            <div class="product-meta-wrapper clearfix">

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
                do_action( 'woocommerce_after_shop_loop_item_title' );
                ?>

            </div>

        <?php endif; ?>

        <div class="product_actions_container">

            <?php
            /**
             * woocommerce_after_shop_loop_item hook.
             *
             * @hooked woocommerce_template_loop_product_link_close - 5
             * @hooked woocommerce_template_loop_add_to_cart - 10
             */
            do_action( 'woocommerce_after_shop_loop_item' );
            ?>

        </div>

    </div>

</li>
