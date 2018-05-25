<?php
/**
 * Other actions (Compare, Wishlist)
 *
 * @author        WooThemes
 * @package       WooCommerce/Templates
 * @version       1.6.4
 */

$count_buttons = 4; //number of buttons to show

$wishlist = ( get_option( 'yith_wcwl_enabled' ) == 'yes' && shortcode_exists( 'yith_wcwl_add_to_wishlist' )  ) ? do_shortcode( '[yith_wcwl_add_to_wishlist use_button_style="no"]' ) : '';

$compare = ( shortcode_exists( 'yith_compare_button' ) ) ? do_shortcode( '[yith_compare_button type="link"]' ) : '';

$request_a_quote = yit_ywraq_print_button();

$buttons = array( $wishlist, $compare, $request_a_quote );

foreach ( array( 'wishlist', 'compare', 'request_a_quote' ) as $var ) {
    if ( empty( ${$var} ) ) {
        $count_buttons --;
    }
}


if( $count_buttons > 0 ) : ?>

    <div class="clearfix product-other-action buttons_<?php echo $count_buttons ?>" >
        <?php echo implode( "\n", $buttons ) ?>
    </div>

<?php endif;


