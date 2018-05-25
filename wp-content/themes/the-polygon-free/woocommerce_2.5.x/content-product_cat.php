<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $woocommerce_loop;

// check if is mobile
$isMobile = YIT_Mobile()->isMobile();
$isPhone = $isMobile && ! YIT_Mobile()->isTablet();

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
    $woocommerce_loop['loop'] = 0;
}

$woocommerce_loop['li_class'] = array();

//standard li class
$woocommerce_loop['li_class'][] = 'product-category product';

$sidebar = YIT_Layout()->sidebars;

if ( $sidebar['layout'] == 'sidebar-double' ) {
    $woocommerce_loop['li_class'][] = 'col-sm-6 col-xs-6';
    $woocommerce_loop['columns']    = '2';
}
elseif ( $sidebar['layout'] == 'sidebar-right' || $sidebar['layout'] == 'sidebar-left' ) {
    $woocommerce_loop['li_class'][] = 'col-sm-4 col-xs-6';
    $woocommerce_loop['columns']    = '3';
}
else {
    $woocommerce_loop['li_class'][] = 'col-sm-3 col-xs-6';
    $woocommerce_loop['columns']    = '4';
}

//Set columns and class mobile phone
$row_mobile_value = yit_get_option( 'shop-products-per-row-mobile' );
$row_mobile = intval( ! empty( $row_mobile_value ) ? $row_mobile_value : 2 );

if( $isPhone ) {
    $woocommerce_loop['li_class'][]   = 'col-xxs-' . intval( 12 / $row_mobile );
    $woocommerce_loop['columns']      = $row_mobile;
}

// Increase loop count
$woocommerce_loop['loop'] ++;

// add class first/last
if ( ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] == 0 || $woocommerce_loop['columns'] == 1 ) {
    $woocommerce_loop['li_class'][] = 'first';
}
if ( $woocommerce_loop['loop'] % $woocommerce_loop['columns'] == 0 ) {
    $woocommerce_loop['li_class'][] = 'last';
}

?>

<li <?php wc_product_cat_class( $woocommerce_loop['li_class'], $category ); ?>>

    <?php do_action( 'woocommerce_before_subcategory', $category ); ?>

    <a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>" class="product-category-link">

        <div class="category-thumb">
            <?php
            /**
             * woocommerce_before_subcategory_title hook
             *
             * @hooked woocommerce_subcategory_thumbnail - 10
             */
            do_action( 'woocommerce_before_subcategory_title', $category ); ?>

        </div>

        <div class="category-meta">
            <div class="category-name">
                <?php
                /**
                 * woocommerce_shop_loop_subcategory_title hook.
                 *
                 * @hooked woocommerce_template_loop_category_title - 10
                 */
                do_action( 'woocommerce_shop_loop_subcategory_title', $category );
                ?>
            </div>
        </div>
        <?php
        /**
         * woocommerce_after_subcategory_title hook
         */
        do_action( 'woocommerce_after_subcategory_title', $category );
        ?>

    </a>

    <?php do_action( 'woocommerce_after_subcategory', $category ); ?>

</li>