<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
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
	exit;
}

global $woocommerce_loop;

$product_in_a_row = yit_get_option( 'shop-num-column' );

if ( isset( $product_in_a_row ) && $product_in_a_row > 0 ){

    $woocommerce_loop['columns']    = intval( $product_in_a_row );
}
else if ( YIT_Layout()->sidebars['layout'] == 'sidebar-double' ) {
    $woocommerce_loop['columns']    = '2';
}
elseif ( YIT_Layout()->sidebars['layout'] == 'sidebar-right' || YIT_Layout()->sidebars['layout'] == 'sidebar-left' ) {
    $woocommerce_loop['columns']    = '3';
}
else {
    $woocommerce_loop['columns']    = '4';
}


?>

<li <?php wc_product_cat_class( '', $category ) ?> >

    <?php
    /**
     * woocommerce_before_subcategory hook.
     *
     * @hooked woocommerce_template_loop_category_link_open - 10
     */
    do_action( 'woocommerce_before_subcategory', $category );
    ?>

    <a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>" class="product-category-link">

        <div class="category-thumb">

            <?php
            /**
             * woocommerce_before_subcategory_title hook
             *
             * @hooked woocommerce_subcategory_thumbnail - 10
             */
            do_action( 'woocommerce_before_subcategory_title', $category );
            ?>

        </div>

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

        <?php
        /**
         * woocommerce_after_subcategory_title hook
         */
        do_action( 'woocommerce_after_subcategory_title', $category );
        ?>

    </a>

    <?php do_action( 'woocommerce_after_subcategory', $category ); ?>

</li>