<?php
/**
 * Related Products
 *
 * @author        WooThemes
 * @package       WooCommerce/Templates
 * @version       1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

global $product, $woocommerce_loop;

if ( !is_product() || empty( $product ) || ! $product->exists() ) {
    return;
}

$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) == 0 ) {
    return;
}

$args = apply_filters( 'woocommerce_related_products_args', array(
    'post_type'           => 'product',
    'ignore_sticky_posts' => 1,
    'no_found_rows'       => 1,
    'posts_per_page'      => $posts_per_page,
    'orderby'             => $orderby,
    'post__in'            => $related,
    'post__not_in'        => array( $product->id )
) );

$products = new WP_Query( $args );

$columns = yit_get_option( 'shop-custom-num-column' ) == 'yes'  ? yit_get_option( 'shop-num-column' ) : 6;

//force grid view
$woocommerce_loop['view'] = 'grid';

if ( $products->have_posts() ) : ?>

<div class="clearfix yit_related_products related products">
    <div class="container">

    <?php if ( shortcode_exists( 'box_title' ) ) {
            echo do_shortcode("[box_title class='releated-products-title' title='". __('Related Products','yit') ."' font_size='20' font_alignment='center' border='none' font_color='#000000']");
        } else {
            echo "<h2>" . __( 'Related Products', 'yit' ) . "</h2>";
        }?>


    <?php woocommerce_product_loop_start(); ?>


    <?php while ( $products->have_posts() ) : $products->the_post(); ?>

        <?php wc_get_template( 'content-product.php', array('product_in_a_row' => $columns ) ); ?>

    <?php endwhile; // end of the loop. ?>


    <?php woocommerce_product_loop_end(); ?>

    </div>
</div>

<?php endif;

wp_reset_postdata();
