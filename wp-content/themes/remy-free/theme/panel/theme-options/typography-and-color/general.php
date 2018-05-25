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
 * Return an array with the options for Theme Options > Typography and Color > General Settings
 *
 * @package Yithemes
 * @author  Andrea Grillo <andrea.grillo@yithemes.com>
 * @author  Antonio La Rocca <antonio.larocca@yithemes.it>
 * @since   2.0.0
 * @return mixed array
 *
 */
return array(

    /* Typography and Color > General Settings */
    array(
        'type' => 'title',
        'name' => __( 'General Settings', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'         => 'typography-website-title',
        'type'       => 'typography',
        'name'       => __( 'Website title typography', 'yit' ),
        'desc'       => __( 'Select the font used in the theme for the titles', 'yit' ),
        'min'        => 1,
        'max'        => 80,
        'preview'    => false,
        'is_default' => true,
        'std'        => array(
            'family' => 'Roboto Slab',
        ),
        'style'      => array(
            'selectors'  => '',
            'properties' => 'font-family'
        ),
        'disabled' => true
    ),

    array(
        'id'         => 'typography-website-paragraph',
        'type'       => 'typography',
        'name'       => __( 'Website paragraph typography', 'yit' ),
        'desc'       => __( 'Select the font used in the theme for the paragraphs', 'yit' ),
        'min'        => 1,
        'max'        => 80,
        'preview'    => false,
        'is_default' => true,
        'std'        => array(
            'family' => 'Roboto Slab',
        ),
        'style'      => array(
            'selectors'  => '',
            'properties' => 'font-family'
        ),
        'disabled' => true
    ),

    array(
        'id'        => 'typography-website-title-highlight',
        'type'      => 'colorpicker',
        'name'      => __( 'Website title highlight color', 'yit' ),
        'desc'      => __( 'Select the color used in the theme for the highlighted titles', 'yit' ),
        'std'       => array(
            'color' => '#acc327'
        ),
        'style'     => array(
            'selectors'  => '',
            'properties' => 'color'
        ),
        'disabled' => true
    ),

    array(
        'id'              => 'typography-website-special-font',
        'type'            => 'typography',
        'name'            => __( 'Special font', 'yit' ),
        'desc'            => __( 'Select the type to use for the special font.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 12,
            'unit'      => 'px',
            'family'    => 'Roboto Slab',
            'style'     => 'regular',
            'color'     => '#3a3a39',
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
        'id'              => 'typography-website-quote-font',
        'type'            => 'typography',
        'name'            => __( 'Quote text', 'yit' ),
        'desc'            => __( 'Select the type to use for the quote text.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-paragraph',
        'std'             => array(
            'size'      => 16,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '400italic',
            'color'     => '#6c6c6c'
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                             font-family,
                             font-weight,
                             color'
        ),
        'disabled' => true
    ),

     array(
        'id'              => 'typography-website-quote-icon-font',
        'type'            => 'typography',
        'name'            => __( 'Quote icon', 'yit' ),
        'desc'            => __( 'Select the type to use for the quote icon.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-paragraph',
        'std'             => array(
            'size'      => 72,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'regular',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                             font-family,
                             font-weight'
        ),
         'disabled' => true
    ),
    array(
        'id'              => 'typography-website-quote-icon-color',
        'type'            => 'colorpicker',
        'name'            => __( 'Quote icon and Quote highlight border color', 'yit' ),
        'desc'            => __( 'Select the color to use for the quote icon and the highlight border.', 'yit' ),
        'std'             => array(
            'color'     => '#acc327',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'color, border-color'
        ),
        'disabled' => true
    ),
    array(
        'id'              => 'typography-website-quote-background',
        'type'            => 'colorpicker',
        'name'            => __( 'Quote text box background color', 'yit' ),
        'desc'            => __( 'Select the background color to use for the quotes.', 'yit' ),
        'std'             => array(
            'color'     => '#f5f5f5',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'background-color'
        ),
        'disabled' => true
    ),


    /* Typography and Color > Background colors */
    array(
        'type' => 'title',
        'name' => __( 'Background and Colors', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'   => 'background-style',
        'type' => 'bgpreview',
        'name' => __( 'Custom background', 'yit' ),
        'desc' => __( 'Select a background for the body of all pages.', 'yit' ),
        'std'  => array( 'image' => '', 'color' => '#ffffff' ),
         'style'   => array(
            'selectors'  => '',
            'properties' => 'background-color'
        ),
        'disabled' => true
    ),

    array(
        'id'    => 'background-custom-image',
        'type'  => 'upload',
        'name'  => __( 'Background custom image', 'yit' ),
        'desc'  => __( 'Select a custom image, if you have set "Custom" in the above option', 'yit' ),
        'std'   => '',
        'style' => array(
            'selectors'  => '',
            'properties' => 'background-image'
        ),
        'disabled' => true
    ),

    array(
        'id'      => 'background-repeat',
        'type'    => 'select',
        'options' => array(
            'repeat'    => __( 'Repeat', 'yit' ),
            'repeat-x'  => __( 'Repeat Horizontally', 'yit' ),
            'repeat-y'  => __( 'Repeat Vertically', 'yit' ),
            'no-repeat' => __( 'No Repeat', 'yit' )
        ),
        'name'    => __( 'Background repeat', 'yit' ),
        'desc'    => __( 'Select the repeat mode for the background image.', 'yit' ),
        'std'     => 'no-repeat',
        'style'   => array(
            'selectors'  => '',
            'properties' => 'background-repeat'
        ),
        'disabled' => true
    ),

    array(
        'id'      => 'background-position',
        'type'    => 'select',
        'options' => array(
            'center'        => __( 'Center', 'yit' ),
            'top left'      => __( 'Top Left', 'yit' ),
            'top center'    => __( 'Top Center', 'yit' ),
            'top right'     => __( 'Top Right', 'yit' ),
            'bottom left'   => __( 'Bottom Left', 'yit' ),
            'bottom center' => __( 'Bottom Center', 'yit' ),
            'bottom right'  => __( 'Bottom Right', 'yit' ),
        ),
        'name'    => __( 'Background position', 'yit' ),
        'desc'    => __( 'Select the position for the background image.', 'yit' ),
        'std'     => 'top left',
        'style'   => array(
            'selectors'  => '',
            'properties' => 'background-position'
        ),
        'disabled' => true
    ),

    array(
        'id'      => 'background-attachment',
        'type'    => 'select',
        'options' => array(
            'scroll' => __( 'Scroll', 'yit' ),
            'fixed'  => __( 'Fixed', 'yit' )
        ),
        'name'    => __( 'Background attachment', 'yit' ),
        'desc'    => __( 'Select the attachment for the background image.', 'yit' ),
        'std'     => 'scroll',
        'style'   => array(
            'selectors'  => '',
            'properties' => 'background-attachment'
        ),
        'disabled' => true
    ),

    array(
        'id'      => 'container-background-color',
        'type'    => 'colorpicker',
        'name'    => __( 'Background color for container in boxed layout', 'yit' ),
        'desc'    => __( 'Select a background color for the container of all pages in boxed layout.', 'yit' ),
        'std'     => array(
            'color' => '#ffffff'
        ),
        'style'   => array(
            'selectors'  => '',
            'properties' => 'background-color'
        ),
        'disabled' => true
    )
);

