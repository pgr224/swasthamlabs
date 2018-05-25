<?php
/**
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

define( 'WC_LATEST_VERSION', '2.6' );

/* === HOOKS === */
function yit_woocommerce_hooks() {

    global $yith_woocompare;

    if ( ! defined( 'YIT_DEBUG' ) || ! YIT_DEBUG ) {
        $message = get_option( 'woocommerce_admin_notices', array() );
        $message = array_diff( $message, array( 'template_files' ) );
        update_option( 'woocommerce_admin_notices', $message );
    }

    add_action( 'yit_activated', 'yit_woocommerce_default_image_dimensions' );
    add_filter( 'woocommerce_enqueue_styles', 'yit_enqueue_wc_styles' );
    add_filter( 'woocommerce_template_path', 'yit_set_wc_template_path' );
    if( yit_is_old_ie() ) {
        add_action( 'wp_head', 'yit_add_wc_styles_to_assets', 0 );
    }
    add_action( 'wp_head', 'yit_size_images_style' );
    add_action( 'woocommerce_before_main_content', 'yit_shop_page_meta' );

    // Ajax search loading
    add_filter( 'yith_wcas_ajax_search_icon', 'yit_loading_search_icon' );

    // Use WC 2.0 variable price format, now include sale price strikeout
    add_filter( 'woocommerce_variable_sale_price_html', 'wc_wc20_variation_price_format', 10, 2 );
    add_filter( 'woocommerce_variable_price_html', 'wc_wc20_variation_price_format', 10, 2 );

    // Add to cart button text
    add_filter( 'add_to_cart_text', 'yit_add_to_cart_text' );

    // Custom Pagination
    add_filter( 'woocommerce_pagination_args', 'yit_pagination_shop_args' );


    /*============= SHOP PAGE ===============*/

    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

    add_filter( 'loop_shop_per_page', 'yit_products_per_page' );
    add_action( 'shop-page-meta', 'yit_wc_catalog_ordering' );

    add_action( 'woocommerce_after_shop_loop_item', 'yit_shop_rating', 1 );

    add_action( 'woocommerce_after_shop_loop_item', 'yit_shop_product_description', 18 );
    add_action( 'woocommerce_after_shop_loop_item', 'yit_shop_other_actions', 20 );


    /*======== SINGLE PRODUCT PAGE =========*/

    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
    add_action( 'yit_single_page_breadcrumb', 'woocommerce_breadcrumb', 20, 0 );


    /* remove standard compare button */
    if ( isset( $yith_woocompare ) ) {
        remove_action( 'woocommerce_single_product_summary', array( $yith_woocompare->obj, 'add_compare_link' ), 35 );
    }

    add_action( 'woocommerce_single_product_summary', 'yit_product_modal_window', 25 );

    if ( yit_get_option('shop-single-product-name') == 'no' ) remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
    if ( yit_get_option( 'shop-single-metas' ) == 'no' ) remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

    /* tabs */
    add_filter( 'woocommerce_product_tabs', 'yit_woocommerce_add_tabs' );


    /*============== CART ============*/

    remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
    add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );



    /* wc 2.4 */

    remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
    add_action( 'woocommerce_shop_loop_item_title' , 'yit_woocommerce_shop_title' );


    /*======== Support to YITH Plugins =========*/

    add_action( 'init', 'yit_plugins_support' );

    /* WooCommerce 2.6 */
    if( version_compare( WC()->version, '2.6', '>=' ) ) {
        add_filter( 'post_class', 'yit_wc_product_post_class', 30, 3 );
        add_filter( 'product_cat_class', 'yit_wc_product_product_cat_class', 30, 3 );

        /* Reviews */
        remove_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar', 10 );
        remove_action( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10 );
        remove_action( 'woocommerce_review_comment_text', 'woocommerce_review_display_comment_text', 10 );

        add_action( 'woocommerce_review_before', 'woocommerce_review_display_comment_text', 10 );
        add_action( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_gravatar', 10 );
        add_action( 'woocommerce_review_meta', 'woocommerce_review_display_rating', 10 );

        add_filter( 'woocommerce_output_related_products_args', 'yit_wc_output_related_products_args',10,1 );

        // remove unused template
        yit_wc_2_6_removed_unused_template() ;
    }
}
add_action( 'after_setup_theme', 'yit_woocommerce_hooks' );

// USeful for opening cart in header
function yit_remove_add_to_cart_redirect() {
    return false;
}
add_filter( yit_get_add_to_cart_redirect_filter_name(), 'yit_remove_add_to_cart_redirect' );


    /**
     * Get add to cart redirect filter name
     *
     *
     * @return string
     * @since  2.0.0
     * @author Andrea Frascaspata <andrea.frascaspata@yithemes.com>
     */
    function yit_get_add_to_cart_redirect_filter_name(){

        $add_to_cart_redirect_filter = 'woocommerce_add_to_cart_redirect';

        //wc 2.2.x fix
        if ( version_compare( WC()->version, '2.3', '<' ) ) {
            $add_to_cart_redirect_filter = 'add_to_cart_redirect';
        }

        return  $add_to_cart_redirect_filter;
    }


/********
 * SIZES
 **********/

// shop small

if ( ! function_exists( 'yit_shop_catalog_w' ) ) : function yit_shop_catalog_w() {
    $size = wc_get_image_size( 'shop_catalog' );
    return $size['width'];
} endif;
if ( ! function_exists( 'yit_shop_catalog_h' ) ) : function yit_shop_catalog_h() {
    $size = wc_get_image_size( 'shop_catalog' );
    return $size['height'];
} endif;
if ( ! function_exists( 'yit_shop_catalog_c' ) ) : function yit_shop_catalog_c() {
    $size = wc_get_image_size( 'shop_catalog' );
    return $size['crop'];
} endif;

// shop thumbnail

if ( ! function_exists( 'yit_shop_thumbnail_w' ) ) : function yit_shop_thumbnail_w() {
    $size = wc_get_image_size( 'shop_thumbnail' );
    return $size['width'];
} endif;
if ( ! function_exists( 'yit_shop_thumbnail_h' ) ) : function yit_shop_thumbnail_h() {
    $size = wc_get_image_size( 'shop_thumbnail' );
    return $size['height'];
} endif;
if ( ! function_exists( 'yit_shop_thumbnail_c' ) ) : function yit_shop_thumbnail_c() {
    $size = wc_get_image_size( 'shop_thumbnail' );
    return $size['crop'];
} endif;

//shop large

if ( ! function_exists( 'yit_shop_single_w' ) ) : function yit_shop_single_w() {
    $size = wc_get_image_size( 'shop_single' );
    return $size['width'];
} endif;
if ( ! function_exists( 'yit_shop_single_h' ) ) : function yit_shop_single_h() {
    $size = wc_get_image_size( 'shop_single' );
    return $size['height'];
} endif;
if ( ! function_exists( 'yit_shop_single_c' ) ) : function yit_shop_single_c() {
    $size = wc_get_image_size( 'shop_single' );
    return $size['crop'];
} endif;



if ( ! function_exists( 'yit_add_to_cart_text' ) ) {
    /**
     * Set Add to Cart label from Theme Options
     *
     * @return string
     *
     * @since 1.0.0
     */
    function yit_add_to_cart_text() {
        global $product;

        if ( $product->product_type != 'external' ) {
            $text = __( 'Add to cart', 'yit' );
        }
        return $text;
    }
}

if ( ! function_exists( 'yit_enqueue_wc_styles' ) ) {
    /**
     * Remove Woocommerce Styles add custom Yit Woocommerce style
     *
     * @param $styles
     *
     * @return array list of style files
     * @since    2.0.0
     */
    function yit_enqueue_wc_styles( $styles ) {

        $path = 'woocommerce';
        $version = WC()->version;

        if ( version_compare( $version, WC_LATEST_VERSION, '<' ) ) {
            $path = 'woocommerce_' . substr( $version, 0, 3 ) . '.x';
        }

        /* 2.3 add select2 on cart page*/
        if ( version_compare( $version, '2.2', '>' ) ){
            if(is_cart()){
                wp_enqueue_script( 'select2' );
                wp_enqueue_style( 'select2', WC()->plugin_url() . '/assets/css/select2.css' );
            }
        }

        unset( $styles['woocommerce-general'], $styles['woocommerce-layout'], $styles['woocommerce-smallscreen'] );

        $styles ['yit-layout'] = array(
            'src'     => get_stylesheet_directory_uri() . '/' . $path . '/style.css',
            'deps'    => '',
            'version' => '1.0',
            'media'   => ''
        );
        return $styles;
    }
}

if( ! function_exists( 'yit_add_wc_styles_to_assets' ) ){
    function yit_add_wc_styles_to_assets(){

        $path = 'woocommerce';
        $version = WC()->version;

        if ( version_compare( $version, WC_LATEST_VERSION, '<' ) ) {
            $path = 'woocommerce_' . substr( $version, 0, 3 ) . '.x';
        }

        $stylepicker_css = array(
            'src'     => get_stylesheet_directory_uri() . '/' . $path . '/style.css',
            'enqueue'   => true,
            'media'     => 'all'
        );

        if( function_exists( 'YIT_Asset' ) ){
            YIT_Asset()->set( 'style', 'yit-woocommerce', $stylepicker_css, 'after', 'theme-stylesheet' );
        }

    }
}

if ( ! function_exists( 'yit_set_wc_template_path' ) ) {
    /**
     * Return the folder of custom woocommerce templates
     *
     * @param $path
     *
     * @return string template folder
     *
     * @since    2.0.0
     */
    function yit_set_wc_template_path( $path ) {

        $version = WC()->version;

        if ( version_compare( $version, WC_LATEST_VERSION, '<' ) ) {
            $path = 'woocommerce_' . substr( $version, 0, 3 ) . '.x/';
        }

        return $path;
    }
}

function woocommerce_template_loop_product_thumbnail() {

    global $product, $woocommerce_loop;

    $i = 0;
    $attachments = array();

    $attachments[] = get_post_thumbnail_id();
    $attachments = array_merge( $attachments, $product->get_gallery_attachment_ids() );

    $original_size = wc_get_image_size( 'shop_catalog' );


    if ( isset( $woocommerce_loop['yit_is_slider'] ) && $woocommerce_loop['yit_is_slider'] == true ){
        $size = $original_size;
        $size['width'] = 288;
        $size['height'] = 337;
        YIT_Registry::get_instance()->image->set_size('shop_catalog', $size );
    }

    switch  ( $woocommerce_loop['products_layout'] ) {

        case 'flip':
            if( isset( $attachments[1] ) ) {
                echo '<a href="' . get_permalink() . '" class="thumb backface"><span class="face">' . woocommerce_get_product_thumbnail() . '</span>';
                echo '<span class="face back">';
                yit_image( "id=$attachments[1]&size=shop_catalog&class=image-hover" );
                echo '</span></a>';
            }
            else {
                echo '<a href="' . get_permalink() . '" class="thumb"><span class="face">' . woocommerce_get_product_thumbnail() . '</span></a>';
            }
            break;
    }

}

if ( ! function_exists( 'yit_shop_rating' ) ) {
    function yit_shop_rating() {
        global $product;
        echo '<div class="woocommerce-product-rating"><div class="star-rating"><span style="width:' . ( ( $product->get_average_rating() / 5 ) * 100 ) . '%"></span></div></div>';

    }
}


if( ! function_exists( 'yit_shop_other_action' ) ){

    function yit_shop_other_actions() {
        wc_get_template( 'loop/other-actions.php' );
    }
}

if ( ! function_exists( 'yit_get_current_cart_info' ) ) {
    /**
     * Remove Woocommerce Styles add custom Yit Woocommerce style
     *
     * @internal param $styles
     *
     * @return array list of style files
     * @since    2.0.0
     */
    function yit_get_current_cart_info() {

        $subtotal  = WC()->cart->get_cart_subtotal();
        $items     = count( WC()->cart->get_cart() );
        $cart_icon = YIT_THEME_ASSETS_URL . '/images/cart.png';

        return array(
            $items,
            $subtotal,
            $cart_icon,
            get_woocommerce_currency_symbol(),
        );
    }
}

if ( ! function_exists( 'yit_shop_product_description' ) ) {
    /**
     * Add short product description in shop
     *
     */
    function yit_shop_product_description() {

        global $product;

        $excerpt = $product->post->post_excerpt;


        if ( $excerpt != "" ) :
            echo '<div class="product-description"><p>';
            echo wp_trim_words( $excerpt );
            echo '</p></div>';
        endif;

    }
}


if ( ! function_exists( 'yit_add_to_cart_success_ajax' ) ) {

    function yit_add_to_cart_success_ajax( $datas ) {

        list( $cart_items, $cart_subtotal, $cart_icon, $cart_currency ) = yit_get_current_cart_info();

        $datas['.yit_cart_widget .cart_label .cart-items .yit-mini-cart-icon'] = '<span class="yit-mini-cart-icon"><span class="cart-items-number">' .  $cart_items  .' </span></span>';
        $datas['.yit_cart_widget .cart_label .cart-items .amount'] = '<span class="amount">' . $cart_subtotal . '</span>';
        return $datas;
    }

    add_filter( 'add_to_cart_fragments', 'yit_add_to_cart_success_ajax' );
}


if ( ! function_exists( 'yit_size_images_style' ) ) {

    function yit_size_images_style() {

        $content_width      = $GLOBALS['content_width'];
        $shop_catalog_w     = ( 100 * yit_shop_catalog_w() ) / $content_width;
        $info_product_width = 100 - $shop_catalog_w;
        ?>
        <style type="text/css">
            .woocommerce ul.products li.product.list .product-wrapper .thumb-wrapper {
                width: <?php echo $shop_catalog_w ?>%;
                height: auto;
            }
            .woocommerce ul.products li.product.list .product-wrapper .product-actions-wrapper,
            .woocommerce ul.products li.product.list .product-wrapper .product-meta,
            .woocommerce .products li.product.list .product-actions-wrapper .product-other-action {
                width: <?php echo $info_product_width -2?>%;
            }

        </style>
    <?php
    }
}

if ( ! function_exists( 'yit_products_per_page' ) ) {
    /*
     * Custom number of product per page
     */
    function yit_products_per_page() {

        $num_prod = ( isset( $_GET['products-per-page'] ) ) ? $_GET['products-per-page'] : yit_get_option( 'shop-products-per-page' ) ;

        if ( $num_prod == 'all' ) {
            $num_prod = wp_count_posts( 'product' )->publish;
        }

        return $num_prod;
    }
}

if ( ! function_exists( 'yit_shop_page_meta' ) ) {
    /*
     * Page meta for shop page
     */
    function yit_shop_page_meta() {
        if ( is_single() ) {
            return;
        }
        wc_get_template( '/global/page-meta.php' );
    }
}

if ( ! function_exists( 'yit_wc_catalog_ordering' ) ) {

    function yit_wc_catalog_ordering() {
        if ( ! is_single() && have_posts() ) {
            woocommerce_catalog_ordering();
        }
    }
}

if( ! function_exists( 'yit_single_product_other_actions' ) ) {
    /*
     * Add wishlist and compare to single product page
     */
    function yit_single_product_other_actions() {
        wc_get_template( 'single-product/single-other-actions.php' );
    }
}


/* variation price format */
function wc_wc20_variation_price_format( $price, $product ) {
    // Main Price
    $prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
    $price  = $prices[0] !== $prices[1] ? sprintf( __( '<span class="from">From: </span>%1$s', 'yit' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
    // Sale Price
    $prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
    sort( $prices );
    $saleprice = $prices[0] !== $prices[1] ? sprintf( __( '<span class="from">From: </span>%1$s', 'yit' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );

    if ( $price !== $saleprice ) {
        $price = '<del>' . $saleprice . '</del> <ins>' . $price . '</ins>';
    }
    return $price;
}

if( ! function_exists( 'yit_remove_reviews_tab' ) ){

    function yit_remove_reviews_tab ( $tabs ) {

        unset( $tabs[ 'reviews' ] );
        return $tabs;
    }
}

/* CUSTOM TABS */

function yit_woocommerce_add_tabs( $tabs = array() ) {

    global $post;

    $custom_tabs = yit_get_post_meta( $post->ID, '_custom_tab' );

    if ( ! empty( $custom_tabs ) ) {
        foreach ( $custom_tabs as $tab ) {
            $tabs['custom' . $tab["position"]] = array(
                'title'      => $tab["name"],
                'priority'   => 30,
                'callback'   => 'yit_woocommerce_add_custom_panel',
                'custom_tab' => $tab
            );
        }
    }

    return $tabs;
}

function yit_woocommerce_add_custom_panel( $key, $tab ) {
    wc_get_template( 'single-product/tabs/custom.php', array( 'key' => $key, 'tab' => $tab ) );
}

/*******************
 * MY ACCOUNT
 *******************/

function yit_add_my_account_endpoint() {
    if ( function_exists( 'WC' ) ) {
        WC()->query->query_vars['recent-downloads'] = 'recent-downloads';
        WC()->query->query_vars['myaccount-wishlist']         = 'myaccount-wishlist';
    }
}
add_action( 'after_setup_theme', 'yit_add_my_account_endpoint' );

//redirect to current wishlist page after add-to-cart
if( ! function_exists( 'yit_wcwl_add_to_cart_redirect_url' ) ) {

    function yit_wcwl_add_to_cart_redirect_url( $link ){

        return wc_get_endpoint_url( 'myaccount-wishlist', '',  get_permalink( wc_get_page_id( 'myaccount' ) ) );
    }
}
if( wc_get_endpoint_url( 'myaccount-wishlist', '',  get_permalink( wc_get_page_id( 'myaccount' ) ) ) === wp_get_referer() ) {

    add_filter( 'yit_wcwl_add_to_cart_redirect_url', 'yit_wcwl_add_to_cart_redirect_url' );
}

if ( ! function_exists( 'yit_loading_search_icon' ) ) {

    function yit_loading_search_icon() {
        return '"' . YIT_THEME_ASSETS_URL . '/images/search.gif"';
    }
}

if ( ! function_exists( 'yit_product_modal_window' ) ){
    /**
     * Get template for modal in single product page
     */
    function yit_product_modal_window(){
        wc_get_template( 'single-product/modal-window.php');
    }
}

if ( ! function_exists( 'yit_pagination_shop_args' ) ) {
    /**
     * Custom pagination for shop page
     *
     * @return array
     * @since 1.0.0
     */
    function yit_pagination_shop_args(){

        global $wp_query;

        $args = array(
            'base'         => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
            'format'       => '',
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'total'        => $wp_query->max_num_pages,
            'type'         => 'list',
            'prev_next'    => true,
            'prev_text' => __('&lt;&lt;', 'yit'),
            'next_text' => __('&gt;&gt;', 'yit'),
            'end_size'     => 3,
            'mid_size'     => 3,
            'add_fragment' => '',
            'before_page_number' => '',
            'after_page_number' => ''
        );

        return $args;
    }
}


// SET LAYOUT FOR SHOP PAGE

function yit_sidebar_shop_page( $value, $key, $id ) {

    $new_layout = ( isset( $_GET['layout-shop'] ) ) ? $_GET['layout-shop'] : '';

    if( isset( $value['layout'] ) && $new_layout != '' && $key == 'sidebars' ) {

        $value['layout'] = $new_layout;

        if( $value['sidebar-left'] == -1 ){
            $value['sidebar-left'] = $value['sidebar-right'];
        }
        elseif( $value['sidebar-right'] == -1 ){
            $value['sidebar-right'] = $value['sidebar-left'];
        }
    }

    return $value;
}
add_filter( 'yit_get_option_layout', 'yit_sidebar_shop_page', 10, 3 );


if ( ! function_exists( 'yit_image_content_single_width' ) ) {
    /**
     * Set image and content width for single product image
     *
     * @return array
     * @since 1.0.0
     * @author Francesco Licando <francesco.licandro@yithemes.it>
     */
    function yit_image_content_single_width() {

        $img_size = wc_get_image_size( 'shop_single' );
        $sidebars = YIT_Layout()->sidebars;
        $mobile   = YIT_Mobile()->isMobile() ;

        $size = array();

        if( defined('DOING_AJAX') && DOING_AJAX && defined('YITH_WCQV') ){
            return $size;
        }

        if ( intval( $img_size['width'] ) < $GLOBALS['content_width'] ) {

            $size['image'] = ( intval( $img_size['width'] ) * 100 ) / $GLOBALS['content_width'];

        }
        else {
            $size['image'] = 100;
        }

        $size['content'] = 100 - ( $size['image'] );

        if ( $size['content'] < 20 ) {
            $size['content'] = 100;
        }

        return $size;

    }
}

function yit_remove_unused_wishlist_options( $options ){
    unset( $options['general_settings'][5] );

    return $options;
}
add_filter( 'yith_wcwl_tab_options', 'yit_remove_unused_wishlist_options' );


/* CHECK IF IS PRODUCT QUICK VIEW */

function is_quick_view() {
    return ( defined('DOING_AJAX') && DOING_AJAX && isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'yith_load_product_quick_view' ) ? true : false;
}

if( ! function_exists( 'yit_woocommerce_object' ) ) {

    function yit_woocommerce_object() {

        wp_localize_script( 'jquery', 'yit_woocommerce', array(
            'version' => WC()->version,
        ));

    }

}

function yit_check_single_product_layout() {
    add_action( 'woocommerce_single_product_summary', 'yit_single_product_other_actions', 35 );
}

add_action( 'yit_check_single_product_layout', 'yit_check_single_product_layout' );


if ( ! function_exists( 'yit_woocommerce_shop_title' ) ) {

    function yit_woocommerce_shop_title() {

        global $product;

        if ( yit_get_option( 'shop-product-title' ) == 'yes' ): ?>
            <h3 class="product-name">
                <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
            </h3>
            <div class="product-categories"><?php echo $product->get_categories(); ?></div>
        <?php endif;

    }

}

/***********************************************
 *  FOR WOOCOMMERCE 2.6
 ************************************************/
if( !function_exists('yit_wc_product_post_class') ){
    function yit_wc_product_post_class( $classes, $class = '', $post_id = '' ){
        global $woocommerce_loop;
        global $product;
        $product_in_a_row = yit_get_option( 'shop-num-column' );
        if (!$post_id || 'product' !== get_post_type($post_id)) {
            return $classes;
        }


        if ($product) {
            if ((!isset($woocommerce_loop['name']) || empty($woocommerce_loop['name'])) && !isset($woocommerce_loop['view'])) {
                return $classes;
            }

            // check if is mobile
            $isMobile = YIT_Mobile()->isMobile();
            
            // view
            if ( ! isset( $woocommerce_loop['view'] ) ) {
                $woocommerce_loop['view'] = yit_get_option( 'shop-view-type', 'grid' );
            }

            $classes[] = $woocommerce_loop['view'];

            // Set column
            if ( ( is_shop() || is_product_category() ) && ! $isMobile ) {

                $classes[] = 'col-sm-' . intval( 12/ intval( yit_get_option( 'shop-num-column' ) ) );

            } else if ( isset( $product_in_a_row ) && $product_in_a_row > 0 ) {

                $classes[] = 'col-sm-' . intval( 12 / intval( $product_in_a_row ) ) . ' col-xs-6';

            } else {

                $sidebar = YIT_Layout()->sidebars;

                if ( $sidebar['layout'] == 'sidebar-double' ) {
                    $classes[] = 'col-sm-6 col-xs-6';
                } elseif ( $sidebar['layout'] == 'sidebar-right' || $sidebar['layout'] == 'sidebar-left' ) {
                    $classes[] = 'col-sm-4 col-xs-6';
                } else {
                    $classes[] = 'col-sm-3 col-xs-6';
                }

            }

           

        }
        return $classes;

    }
}



if( !function_exists('yit_wc_product_product_cat_class') ){
    function yit_wc_product_product_cat_class( $li_class, $class, $category ){
        //standard li class
        $product_in_a_row = yit_get_option( 'shop-num-column' );
        $li_class[] = 'product-category product';
        if ( isset( $product_in_a_row ) && $product_in_a_row > 0 ){
            $li_class[] = 'col-sm-' . intval( 12 / intval( $product_in_a_row ) ) . ' col-xs-4';
        }
        else if ( YIT_Layout()->sidebars['layout'] == 'sidebar-double' ) {
            $li_class[] = 'col-sm-6';
        }
        elseif ( YIT_Layout()->sidebars['layout'] == 'sidebar-right' || YIT_Layout()->sidebars['layout'] == 'sidebar-left' ) {
            $li_class[] = 'col-sm-4';
        }
        else {
            $li_class[] = 'col-sm-3';
        }


        return $li_class;
    }
}

if( !function_exists( 'yit_wc_output_related_products_args' ) ){
    function yit_wc_output_related_products_args( $args ){
        $args['posts_per_page'] = -1;
        return $args;
    }
}

/**
 * @author Andre Frascaspata
 */
function yit_wc_2_6_removed_unused_template () {

    if( function_exists( 'yit_remove_unused_template' ) ) {

        $option = 'yit_wc_2_6_template_remove';

        $files = array( 'single-product/review.php','cart/cross-sells.php' );

        yit_remove_unused_template( 'woocommerce' , $option , $files );

    }

}

/*******************************************
 * END WOOCOMMERCE 2.6
 *******************************************/


if ( !function_exists( 'yit_plugins_support' ) ) {
    /**
     * YITH Plugins support
     *
     * @return string
     * @since 1.0
     */
    function yit_plugins_support() {

        /* === YITH WooCommerce Multi Vendor */
        if ( class_exists( 'YITH_Vendors_Frontend_Premium' ) && function_exists( 'YITH_Vendors' ) ) {
            $obj = YITH_Vendors()->frontend;
            remove_action( 'woocommerce_archive_description', array( $obj, 'add_store_page_header' ) );
            add_action( 'yith_before_shop_page_meta', array( $obj, 'add_store_page_header' ) );
            add_filter( 'yith_wpv_quick_info_button_class', 'yith_multi_vendor_button_class' );
            add_filter( 'yith_wpv_report_abuse_button_class', 'yith_multi_vendor_button_class' );
        }

        if ( !function_exists( 'yith_multi_vendor_quick_info_button_class' ) ) {

            /**
             * YITH Plugins support -> Multi Vendor widgets submit button
             *
             * @param string $class
             *
             * @return string
             * @since 1.0
             */
            function yith_multi_vendor_button_class( $class ) {
                return 'btn btn-alternative alignright';
            }
        }


        /* === YITH WooCommerce Advanced Review */

        if ( defined( 'YITH_YWAR_VERSION' ) ) {

            global $YWAR_AdvancedReview;

            remove_action( 'yith_advanced_reviews_before_reviews', array( $YWAR_AdvancedReview, 'load_reviews_summary' ) );

            add_action( 'yith_advanced_reviews_before_review_list', array( $YWAR_AdvancedReview, 'load_reviews_summary' ) );

        }

        if( defined('YITH_YWAR_PREMIUM') ) {

            add_filter( 'yith_advanced_reviews_loader_gif', 'yit_loading_search_icon' );

        }

        /* === YITH WooCommerce Product Countdown */

        if ( defined( 'YWPC_PREMIUM' ) ) {

            add_filter( 'ywpc_shortcode_div_loop_class', 'ywpc_div_loop_class' );
            add_filter( 'ywpc_widget_div_loop_class', 'ywpc_div_loop_class' );
            add_filter( 'ywpc_shortcode_ul_loop_class', 'ywpc_ul_loop_class' );
            add_filter( 'ywpc_widget_ul_loop_class', 'ywpc_ul_loop_class' );

            if ( !function_exists( 'ywpc_div_loop_class' ) ) {

                /**
                 * YITH Plugins support -> Product Countdown loop class
                 *
                 * @param string $class
                 *
                 * @return string
                 * @since 1.0
                 */
                function ywpc_div_loop_class( $class ) {
                    return 'row';
                }
            }

            if ( !function_exists( 'ywpc_ul_loop_class' ) ) {

                /**
                 * YITH Plugins support -> Product Countdown loop class
                 *
                 * @param string $class
                 *
                 * @return string
                 * @since 1.0
                 */
                function ywpc_ul_loop_class( $class ) {
                    return 'clearfix' . ( ( yit_get_option( 'shop-view-type' ) == 'masonry_item' ) ? 'masonry' : '' );
                }
            }

        }


        /* ==== YITH Request a quote support */

        if ( defined( 'YITH_YWRAQ_VERSION' ) ) {

            $yith_request_quote = YITH_Request_Quote();

            if ( method_exists( $yith_request_quote, 'add_button_shop' ) ) {
                remove_action( 'woocommerce_after_shop_loop_item', array( $yith_request_quote, 'add_button_shop' ), 15 );
            }

            if ( function_exists( 'YITH_YWRAQ_Frontend' ) ) {
                $yith_request_quote_frontend = YITH_YWRAQ_Frontend();

                remove_action( 'woocommerce_single_product_summary', array( $yith_request_quote_frontend, 'add_button_single_page' ), 35 );
            }

            add_filter( 'ywraq_product_in_list', 'yit_ywraq_change_product_in_list_message' );

            function yit_ywraq_change_product_in_list_message() {
                return __( 'In your quote list', 'yit' );
            }

            add_filter( 'ywraq_product_added_view_browse_list', 'yit_ywraq_product_added_view_browse_list_message' );

            function yit_ywraq_product_added_view_browse_list_message() {
                return __( 'view list', 'yit' );
            }

            function yit_ywraq_change_button_label() {
                return __( 'quote', 'yit' );
            }

        }

        function yit_ywraq_print_button() {

            if ( defined( 'YITH_YWRAQ_VERSION' ) ) {

                $yith_request_quote = YITH_Request_Quote();

                if ( method_exists( $yith_request_quote, 'add_button_shop' ) ) {
                    add_filter( 'ywraq_product_add_to_quote', 'yit_ywraq_change_button_label' );
                    ob_start();
                    $yith_request_quote->add_button_shop();
                    return ob_get_clean();
                }

            }
            return '';
        }

        function yit_ywraq_print_button_single_page() {

            if ( defined( 'YITH_YWRAQ_VERSION' ) ) {

                $yith_request_quote = YITH_YWRAQ_Frontend();

                if ( method_exists( $yith_request_quote, 'add_button_single_page' ) ) {
                    ob_start();
                    $yith_request_quote->add_button_single_page();
                    return ob_get_clean();
                }


            }
            return '';
        }


        /* === WPML === */

        function yit_wpml_endpoint_hack_for_after() {
            global $yit_wpml_hack_endpoint;
            $yit_wpml_hack_endpoint = WC()->query->query_vars;
            // add the options
            foreach ( $yit_wpml_hack_endpoint as $endpoint => $value ) {
                add_option( 'woocommerce_myaccount_' . $endpoint . '_endpoint', $value );
            }
        }

        add_action( 'after_setup_theme', 'yit_wpml_endpoint_hack_for_after', 11 );

        function yit_wpml_my_account_endpoint() {
            global $woocommerce_wpml, $yit_wpml_hack_endpoint;

            if ( !isset( $woocommerce_wpml->endpoints ) ) {
                return;
            }

            $endpoints = array(
                'recent-downloads',
                'myaccount-wishlist',
            );

            $wc_vars = WC()->query->query_vars;

            foreach ( $endpoints as $endpoint ) {
                if ( !isset( $yit_wpml_hack_endpoint[$endpoint] ) ) {
                    return;
                }

                $wc_vars_endpoint = isset( $wc_vars[ $endpoint ] ) ? $wc_vars[ $endpoint ] : $endpoint;

                WC()->query->query_vars[$endpoint] = $woocommerce_wpml->endpoints->get_endpoint_translation( $yit_wpml_hack_endpoint[$endpoint] , $wc_vars_endpoint );
            }

            unset( $yit_wpml_hack_endpoint );
        }

        add_action( 'init', 'yit_wpml_my_account_endpoint', 3 );


    }

}