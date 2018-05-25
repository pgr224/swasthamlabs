<?php
/**
 *
 * Enabling support for WooCommerce
 *
 * @package Green Ink
 */

// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
}
?>
<?php
global $woo_options;

add_action( 'after_setup_theme', 'green_ink_woocommerce_support' );
function green_ink_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

// remove single product default wrapper.
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// remove breadcrumbs.
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

// Remove woocommerce page and single product title on single template.
add_filter('woocommerce_show_page_title','green_ink_wc_remove_title', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

// Add single product wrapper.
add_action( 'woocommerce_before_main_content', 'green_ink_content_wrap', 1 );
add_action( 'woocommerce_after_main_content', 'green_ink_content_wrap_close', 1 );

// Add column layout to shop.
add_filter( 'body_class', 'green_ink_shop_layout');

// Limit the number of products per page.
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );


if ( ! function_exists( 'green_ink_wc_remove_title' ) ) {
	/**
	 * Remove woocommerce page title
	 */
	function green_ink_wc_remove_title() {
		return false;
	}
}

if ( ! function_exists( 'green_ink_shop_layout' ) ) {
	/**
	 * Shop Layout
	 *
	 * Check for product column number
	 * and apply the proper class to the shop
	 *
	 * @param $classes
	 * @return array
	 */
	function green_ink_shop_layout( $classes ) {
		$columns = green_ink_options( 'shop_columns' ,'column-4' );

		if ( green_ink_is_wc_installed() && is_shop() ) {
			$classes[] = 'shop';
			$classes[] = esc_attr( $columns );
		}

		return $classes;
	}
}
