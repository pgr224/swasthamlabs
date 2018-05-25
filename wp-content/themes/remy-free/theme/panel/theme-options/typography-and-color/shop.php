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
            'size'      => 15,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'bold',
            'color'     => '#655442',
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
        'id'              => 'shop-page-product-category-font',
        'type'            => 'typography',
        'name'            => __( 'Product category font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 12,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '400',
            'color'     => '#858585',
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
            'size'      => 15,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'bold',
            'color'     => '#434343',
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
        'id'              => 'shop-page-product-other-actions',
        'type'            => 'typography',
        'name'            => __( 'Share Compare and Wishlist font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 10,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '400',
            'color'     => '#858585',
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
        'id'              => 'shop-page-layout-selector',
        'type'            => 'typography',
        'name'            => __( 'Page and Layout Selector font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 12,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'bold',
            'color'     => '#000000',
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
        'id'              => 'shop-notice-font',
        'type'            => 'typography',
        'name'            => __( 'Shop notice font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 14,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '400',
            'color'     => '#535353',
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
            'size'      => 18,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '700',
            'color'     => '#383838',
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
            'color'     => '#434343',
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
            'style'     => '800',
            'color'     => '#434343',
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
            'size'      => 13,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'bold',
            'color'     => '#b0b0b0',
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
        'id'    => 'shop-out-of-stock-color',
        'type'  => 'colorpicker',
        'name'  => __( 'Shop "Out of Stock" text color', 'yit' ),
        'desc'  => __( 'Select a text color for the "Out of Stock" label.', 'yit' ),
        'std'   => array(
            'color' => '#dd0000'
        ),
        'style' => array(
            'selectors'  => '',
            'properties' => 'color'
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
        'desc'            => __( 'Choose the font type, size and color.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 13,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '400',
            'color'     => '#a4a4a4',
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
        'name'            => __( 'Cart header label font', 'yit' ),
        'desc'            => __( 'Select the font to use for the label cart font.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 14,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'regular',
            'color'     => '#383838',
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
        'id'             => 'shop-cart-header-widget-alternative-text-colors',
        'type'           => 'colorpicker',
        'name'       => __( 'Cart Header Widget Alternative Text Color', 'yit' ),
        'desc'       => __( 'Select the colors to use for the alternative text color', 'yit' ),

        'std'            => array(
            'color' => '#a4a4a4'
        ),
        'style'          => array(
            'selectors'  => '',
            'properties' => 'color'
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
                'normal'     => '#383838',
                'hover' => '#809314',
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
        'name'       => __( 'Cart Header Widget Background Colors', 'yit' ),
        'desc'       => __( 'Select the colors to use for the header cart widget border and background', 'yit' ),
        'std'        => array(
            'color' => array(
                'border'     => '#dbdbdb',
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
    ),

    array(
        'id'         => 'shop-cart-header-widget-icon-background',
        'type'       => 'colorpicker',
        'variations' => array(
            'background' => __( 'Background', 'yit' ),
        ),
        'name'       => __( 'Cart Header Widget Icon Background color', 'yit' ),
        'desc'       => __( 'Select the background color to use for the header cart widget icon', 'yit' ),
        'std'        => array(
            'color' => array(
                'background' => '#acc327',
            )
        ),
        'style'      => array(
            'background' => array(
                'selectors'  => '',
                'properties' => 'background-color'
            )
        ),
        'disabled' => true
    ),

    /* Typography and Color > Shop > Shortcodes Settings */
    array(
        'type' => 'title',
        'name' => __( 'Shortcodes Settings', 'yit' ),
        'desc' => ''
    ),
    array(
        'id'             => 'shop-shortcodes-slider-arrows',
        'type'           => 'colorpicker',
        'name'       => __( 'Shop Product Slider Arrow Colors', 'yit' ),
        'desc'       => __( 'Select the colors to use for the arrow', 'yit' ),
        'variations' => array(
            'normal' => __( 'Normal arrows', 'yit' ),
            'hover'  => __( 'Hover arrows', 'yit' )
        ),

        'std'            => array(
            'color'  => array(
                'normal'=> '#b0b0b0',
                'hover' => '#424242'
            )
        ),
        'style'          => array(
            'normal' => array(
                        'selectors'  => '',
                        'properties' => 'color'
                        ),

            'hover' => array(
                        'selectors'  => '',
                        'properties' => 'color'
                        ),


        ),
        'disabled' => true
    )
);

