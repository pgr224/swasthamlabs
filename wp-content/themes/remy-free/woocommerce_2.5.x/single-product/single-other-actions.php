<?php

if(is_quick_view()) return ;

global $product;

$actions = array();
$count = 3;

/* add compare */
if ( shortcode_exists( 'yith_compare_button' ) && get_option( 'yith_woocompare_compare_button_in_product_page' ) == 'yes' ) {
    $actions['compare']  = do_shortcode('[yith_compare_button type="link"]');
}
/* add wishlist */
if ( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) && get_option( 'yith_wcwl_enabled' ) == 'yes' ) {
    $actions['wishlist'] = do_shortcode('[yith_wcwl_add_to_wishlist]');
}

$request_a_quote = yit_ywraq_print_button();
if( !empty( $request_a_quote ) ) {
    $actions['request_a_quote'] = $request_a_quote;
}

foreach ( array( 'compare', 'wishlist' , 'request_a_quote' ) as $button ) {
    if ( is_product() && yit_get_option('shop-single-show-'.$button) == 'no' || empty( $actions[ $button ] ) ) {
        unset( $actions[ $button ] );
        $count--;
    }
}

if ( empty( $actions ) ) return;

?>

<div class="clearfix product-actions count-<?php echo $count ?>">
    <?php echo implode( array_values( $actions ), '' ); ?>
</div>

