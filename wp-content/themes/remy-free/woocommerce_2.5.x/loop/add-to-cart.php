<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see         http://docs.woothemes.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $product;
$is_wishlist = function_exists( 'yith_wcwl_is_wishlist' ) && yith_wcwl_is_wishlist();

?>

<div class="product-buttons">

    <?php

    if ( ! $product->is_in_stock() ) : ?>
            <a href="<?php echo apply_filters( 'out_of_stock_add_to_cart_url', get_permalink( $product->id ) ); ?>" class="out-of-stock btn btn-alternative"><?php echo apply_filters( 'out_of_stock_add_to_cart_text', __( 'Out Of Stock', 'yit' ) ); ?></a>
        <?php

        else :

            $link = array(
                'url'      => $product->add_to_cart_url(),
                'label'    => $product->add_to_cart_text(),
                'class'    => isset( $class ) ? $class : '',
                'quantity' => isset( $quantity ) ? $quantity : 1
            );

            $handler = apply_filters( 'woocommerce_add_to_cart_handler', $product->product_type, $product );

            switch ( $handler ) {
                case "variable" :
                    $link['url']    = apply_filters( 'variable_add_to_cart_url', $link['url'] );
                    $link['label']  = apply_filters( 'variable_add_to_cart_text', $link['label'] );
                    $link['class']  = apply_filters( 'add_to_cart_class', $link['class'] );
                    break;
                case "grouped" :
                    $link['url']   = apply_filters( 'grouped_add_to_cart_url', $link['url'] );
                    $link['label'] = apply_filters( 'grouped_add_to_cart_text', $link['label'] );
                    break;
                case "external" :
                    $link['url']   = apply_filters( 'external_add_to_cart_url', $link['url'] );
                    $link['label'] = apply_filters( 'external_add_to_cart_text', $link['label'] );
                    break;
                default :
                    if ( $product->is_purchasable() ) {
                        $link['url']      = apply_filters( 'add_to_cart_url', $link['url'] );
                        $link['label']    = apply_filters( 'add_to_cart_text', $link['label'] );
                        $link['class']    = apply_filters( 'add_to_cart_class', $link['class'] );
                        $link['quantity'] = apply_filters( 'add_to_cart_quantity', $link['quantity'] );
                    }
                    else {
                        $link['url']   = apply_filters( 'not_purchasable_url', $link['url'] );
                        $link['label'] = apply_filters( 'not_purchasable_text', $link['label'] );
                    }
                    break;
            }
            
            echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="btn btn-alternative %s">%s</a>',
                    esc_url( $link['url'] ),
                    esc_attr( $link['quantity'] ),
                    esc_attr( $product->id ),
                    esc_attr( $product->get_sku() ),
                    esc_attr( $link['class'] ),
                    esc_html( $link['label'] )
                ),
            $product );

        endif;


    if ( ! $is_wishlist ) {

        $text = apply_filters( 'view_details_text', __( 'View Details', 'yit' ), $product );
        echo '<a href="' . apply_filters( 'yith_loop_view_details_permalink', get_permalink( $product->id ), $product ) . '" rel="nofollow" title="' . $text . '" class="btn btn-flat details">' . $text . '</a>';

    }

    ?>
</div>


