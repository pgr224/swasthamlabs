<?php
/**
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

/**
 * Return an array with the options for Theme Options > Typography and Color > Shop
 *
 * @package Yithemes
 * @author  Andrea Grillo <andrea.grillo@yithemes.com>
 * @author  Antonio La Rocca <antonio.larocca@yithemes.it>
 * @author  Francesco Licandro <francesco.licandro@yithemes.it>
 * @since   2.0.0
 * @return mixed array
 *
 */
return array(

    /* Typography and Color > Shop > General Settings */
    array(
        'type' => 'title',
        'name' => __( 'General Settings', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'    => 'shop-general-background-section',
        'type'  => 'colorpicker',
        'name'  => __( 'General section background color', 'yit' ),
        'desc'  => __( 'Choose background color for shop section like cart totals or add to cart form.', 'yit' ),
        'std'   => array(
            'color' => '#fafafa'
        ),
        'style' => array(
            'selectors'     => '',
            'properties'    => 'background-color'
        ),
        'disabled' => true
    ),

    array(
        'id'    => 'shop-in-stock-color',
        'type'  => 'colorpicker',
        'name'  => __( 'Shop "Stock Quantity" text color', 'yit' ),
        'desc'  => __( 'Select a text color for the "Stock Quantity" label.', 'yit' ),
        'std'   => array(
            'color' => '#85ad74'
        ),
        'style' => array(
            'selectors'  => '',
            'properties' => 'color'
        ),
        'disabled' => true
    ),

    /* Typography and Color > Shop > Shop Page */
    array(
        'type' => 'title',
        'name' => __( 'Shop Page', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'              => 'shop-page-product-name-font',
        'type'            => 'typography',
        'name'            => __( 'Product title font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 13,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'bold',
            'color'     => '#2f2f2f',
            'align'     => 'center',
            'transform' => 'uppercase',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-weight,
                              color,
                              text-transform,
                              text-align'
        ),
        'disabled' => true
    ),

    array(
        'id'              => 'shop-page-product-categories-in-title-font',
        'type'            => 'typography',
        'name'            => __( 'Product categories font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 11,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'regular',
            'color'     => '#787878',
            'align'     => 'center',
            'transform' => 'uppercase',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-weight,
                              color,
                              text-transform,
                              text-align'
        ),
        'disabled' => true
    ),

    array(
        'id'              => 'shop-page-product-price-font',
        'type'            => 'typography',
        'name'            => __( 'Product price font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 14,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'bold',
            'color'     => '#2f2f2f',
            'align'     => 'center',
            'transform' => 'none',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-weight,
                              color,
                              text-transform,
                              text-align'
        ),
        'disabled' => true
    ),

    array(
        'id'              => 'shop-page-product-button-font',
        'type'            => 'typography',
        'name'            => __( 'Product "Add to cart" font', 'yit' ),
        'desc'            => __( 'Choose the font type and size.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 10,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '700',
            'align'     => 'center',
            'transform' => 'uppercase',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-weight,
                              text-transform,
                              text-align'
        ),
        'disabled' => true
    ),

    array(
        'id'              => 'shop-page-layout-selector',
        'type'            => 'typography',
        'name'            => __( 'Page and Layout Selector font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 11,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '600',
            'color'     => '#6d6c6c',
            'align'     => 'left',
            'transform' => 'uppercase',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-weight,
                              color,
                              text-transform,
                              text-align'
        ),
        'disabled' => true
    ),

    array(
        'id'              => 'shop-notice-font',
        'type'            => 'typography',
        'name'            => __( 'Woocommerce Notice font', 'yit' ),
        'desc'            => __( 'Choose the font type and size.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-paragraph',
        'std'             => array(
            'size'      => 13,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '600',
            'align'     => 'left',
            'transform' => 'none',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-weight,
                              text-transform,
                              text-align'
        ),
        'disabled' => true
    ),

    array(
        'id'    => 'shop-out-of-stock-color',
        'type'  => 'colorpicker',
        'name'  => __( 'Shop "Out of Stock" text color', 'yit' ),
        'desc'  => __( 'Select a text color for the "Out of Stock" label.', 'yit' ),
        'std'   => array(
            'color' => '#ff1800'
        ),
        'style' => array(
            'selectors'  => '',
            'properties' => 'color'
        ),
        'disabled' => true
    ),

    array(
        'id'    => 'shop-product-overlay-color',
        'type'  => 'colorpicker',
        'name'  => __( 'Product hover overlay background color', 'yit' ),
        'desc'  => __( 'Select the color to use as overlay on your product when other actions are enabled ( quick-view, wishlist, compare and similar ) ', 'yit' ),
        'std'   => array(
            'color'   => '#7caf00',
            'opacity' => 60,
        ),
        'style' => array(
            'selectors'  => '',
            'properties' => 'background-color'
        ),
        'disabled' => true
    ),

    /* Typography and Color > Shop > Product Detail Page */

    array(
        'type' => 'title',
        'name' => __( 'Single Product Page', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'              => 'shop-single-product-name-font',
        'type'            => 'typography',
        'name'            => __( 'Product name font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 25,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'bold',
            'color'     => '#222222',
            'align'     => 'left',
            'transform' => 'uppercase',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-weight,
                              color,
                              text-transform,
                              text-align'
        ),
        'disabled' => true
    ),

    array(
        'id'              => 'shop-single-product-price-font',
        'type'            => 'typography',
        'name'            => __( 'Product price font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 20,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'bold',
            'color'     => '#000000',
            'align'     => 'left',
            'transform' => 'none',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-weight,
                              color,
                              text-transform,
                              text-align'
        ),
        'disabled' => true
    ),

    array(
        'id'              => 'shop-single-product-label-font',
        'type'            => 'typography',
        'name'            => __( 'Product page label font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 14,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'bold',
            'color'     => '#000000',
            'align'     => 'left',
            'transform' => 'uppercase',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-weight,
                              color,
                              text-transform,
                              text-align'
        ),
        'disabled' => true
    ),

    array(
        'id'              => 'shop-single-product-tabs-font',
        'type'            => 'typography',
        'name'            => __( 'Product tabs title font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 12,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'regular',
            'color'     => '#898989',
            'align'     => 'center',
            'transform' => 'none',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-weight,
                              color,
                              text-transform,
                              text-align'
        ),
        'disabled' => true
    ),

    array(
        'id'    => 'product-tabs-active-color',
        'type'  => 'colorpicker',
        'name'  => __( 'Product tabs title active color', 'yit' ),
        'desc'  => __( 'Choose the color for the active tab title', 'yit' ),
        'std'   => array(
            'color' => '#434343'
        ),
        'style' => array(
            'selectors'  => '',
            'properties' => 'color'
        ),
        'disabled' => true
    ),

    array(
        'id'    => 'single-out-of-stock-color',
        'type'  => 'colorpicker',
        'name'  => __( 'Single Page "Out of Stock" text color', 'yit' ),
        'desc'  => __( 'Select a text color for the "Out of Stock" label.', 'yit' ),
        'std'   => array(
            'color' => '#6d6c6c'
        ),
        'style' => array(
            'selectors'  => '',
            'properties' => 'color'
        ),
        'disabled' => true
    ),

    array(
        'type' => 'title',
        'name' => __( 'Single Product Reviews', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'              => 'shop-single-product-reviews-title',
        'type'            => 'typography',
        'name'            => __( 'Product name font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 11,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'regular',
            'color'     => '#000000',
            'align'     => 'left',
            'transform' => 'uppercase',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-weight,
                              color,
                              text-transform,
                              text-align'
        ),
        'disabled' => true
    ),

    array(
        'id'              => 'shop-single-product-new-review-title',
        'type'            => 'typography',
        'name'            => __( 'Product name font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 18,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'bold',
            'color'     => '#7caf00',
            'align'     => 'center',
            'transform' => 'uppercase',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-weight,
                              color,
                              text-transform,
                              text-align'
        ),
        'disabled' => true
    ),


    /* Typography and Color > Shop > My-Account page */
    array(
        'type' => 'title',
        'name' => __( 'My Account Page', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'              => 'my-account-page-menu-font',
        'type'            => 'typography',
        'name'            => __( 'My Account sidebar menu font', 'yit' ),
        'desc'            => __( 'Choose the font type and size.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 12,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '400',
            'align'     => 'left',
            'transform' => 'uppercase',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-weight,
                              text-transform,
                              text-align'
        ),
        'disabled' => true
    ),

    array(
        'id'              => 'my-account-page-slogan-font',
        'type'            => 'typography',
        'name'            => __( 'My Account slogan font', 'yit' ),
        'desc'            => __( 'Choose the font type and size.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 25,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '700',
            'transform' => 'uppercase',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-weight,
                              text-transform'
        ),
        'disabled' => true
    ),

    array(
        'id'            => 'my-account-page-menu-color',
        'type'          => 'colorpicker',
        'variations'    => array(
            'normal' => __( 'Normal', 'yit' ),
            'hover'  => __( 'Hover', 'yit' )
        ),
        'name' => __( 'My Account sidebar menu color', 'yit' ),
        'desc' => __( 'Select the colors to use for the my account menu.', 'yit' ),
        'std'  => array(
            'color' => array(
                'normal' => '#9c9c9c',
                'hover'  => '#0e0d0d'
            )
        ),
        'style' => array(
            'normal' => array(
                'selectors'   => '',
                'properties'  => 'color'
            ),
            'hover' => array(
                'selectors'   => '',
                'properties'  => 'color'
            )
        ),
        'disabled' => true
    ),


    array(
        'id'              => 'my-account-content-title-font',
        'type'            => 'typography',
        'name'            => __( 'My Account content title font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 15,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '700',
            'color'     => '#6d6c6c',
            'align'     => 'left',
            'transform' => 'uppercase',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-weight,
                              color,
                              text-transform,
                              text-align'
        ),
        'disabled' => true
    ),


    array(
        'type' => 'title',
        'name' => __( 'Widget List Products', 'yit' ),
        'desc' => ''
    ),


    array(
        'id'              => 'shop-widget-price-font',
        'type'            => 'typography',
        'name'            => __( 'Widget Product price font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 14,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '400',
            'color'     => '#939393',
            'align'     => 'left',
            'transform' => 'none',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-weight,
                              color,
                              text-transform,
                              text-align'
        ),
        'disabled' => true
    ),

    array(
        'type' => 'title',
        'name' => __( 'Widget Single Product', 'yit' ),
        'desc' => ''
    ),


    array(
        'id'              => 'shop-widget-single-product-title',
        'type'            => 'typography',
        'name'            => __( 'Widget Single Product title font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 17,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'bold',
            'color'     => '#2f2f2f',
            'align'     => 'left',
            'transform' => 'uppercase',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-weight,
                              color,
                              text-transform,
                              text-align'
        ),
        'disabled' => true
    ),

    /* Typography and Color > Shop > General Settings */
    array(
        'type' => 'title',
        'name' => __( 'Cart Header Widget', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'              => 'shop-cart-header-widget-label-font',
        'type'            => 'typography',
        'name'            => __( 'Cart header title', 'yit' ),
        'desc'            => __( 'Select the font to use for the title before the products list.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 14,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '700',
            'color'     => '#7caf00',
            'align'     => 'left',
            'transform' => 'uppercase',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-weight,
                              color,
                              text-transform,
                              text-align'
        ),
        'disabled' => true
    ),

    array(
        'id'         => 'shop-cart-header-background-color',
        'type'       => 'colorpicker',
        'variations' => array(
            'icon-background'     => __( 'Icon Background', 'yit' ),
            'total-background' => __( 'Total Background', 'yit' ),
        ),
        'name'       => __( 'Mini Cart Header Widget Colors', 'yit' ),
        'desc'       => __( 'Select the colors to use for the header mini cart widget icon and total background', 'yit' ),
        'std'        => array(
            'color' => array(
                'icon-background'     => '#9bdb00',
                'total-background' => '#7caf00',
            )
        ),
        'style'      => array(
            'icon-background'     => array(
                'selectors'  => '',
                'properties' => 'background'
            ),
            'total-background' => array(
                'selectors'  => '',
                'properties' => 'background'
            )
        ),
        'disabled' => true
    ),

    array(
        'id'         => 'shop-cart-header-widget-link-colors',
        'type'       => 'colorpicker',
        'variations' => array(
            'normal'     => __( 'Link', 'yit' ),
            'hover' => __( 'Link hover', 'yit' ),
        ),
        'name'       => __( 'Cart Header Widget Link Color', 'yit' ),
        'desc'       => __( 'Select the colors to use for the header cart link', 'yit' ),
        'std'        => array(
            'color' => array(
                'normal'    => '#787878',
                'hover'     => '#5b8000',
            )
        ),
        'style'      => array(
            'normal'     => array(
                'selectors'  => '',
                'properties' => 'color'
            ),
            'hover' => array(
                'selectors'  => '',
                'properties' => 'color'
            )
        ),
        'disabled' => true
    ),

    array(
        'id'         => 'shop-cart-header-widget-colors',
        'type'       => 'colorpicker',
        'variations' => array(
            'border'     => __( 'Border', 'yit' ),
            'background' => __( 'Background', 'yit' ),
        ),
        'name'       => __( 'Cart Header Widget Colors', 'yit' ),
        'desc'       => __( 'Select the colors to use for the header cart widget border and background', 'yit' ),
        'std'        => array(
            'color' => array(
                'border'     => '#dbd8d8',
                'background' => '#ffffff',
            )
        ),
        'style'      => array(
            'border'     => array(
                'selectors'  => '',
                'properties' => 'border-color'
            ),
            'background' => array(
                'selectors'  => '',
                'properties' => 'background'
            )
        ),
        'disabled' => true
    )
);

