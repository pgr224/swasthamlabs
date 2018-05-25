<?php
/*
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */


/**
 * Return an array with the options for Theme Options > Typography and Color > Sidebars
 *
 * @package Yithemes
 * @author Andrea Frascaspata <andrea.frascapsata@yithemes.com>
 * @since 2.0.0
 * @return mixed array
 *
 */
return array(

     /* Typography and Color > widgets and sidebars */
    array(
        'type' => 'title',
        'name' => __( 'Sidebars', 'yit' ),
        'desc' => ''
    ),

    array(
        'id' => 'sidebar-title-font',
        'type' => 'typography',
        'name' => __( 'Sidebar title font', 'yit' ),
        'desc' => __( 'Choose the font type, size and color.', 'yit' ),
        'min' => 1,
        'max' => 80,
        'default_font_id' => 'typography-website-title',
        'std'   => array(
            'size'      => 14,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'bold',
            'color'     => '#434343',
            'align'     => 'left',
            'transform' => 'uppercase',
        ),
        'style' => array(
            'selectors'   => '',
            'properties'  => 'font-size,
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
        'name' => __( 'General Entry Title', 'yit' ),
        'desc' => ''
    ),

    array(
        'id' => 'widget-general-hentry-title',
        'type' => 'typography',
        'name' => __( 'Widget general entry title font', 'yit' ),
        'desc' => __( 'Choose the font type, size and color.', 'yit' ),
        'min' => 1,
        'max' => 80,
        'default_font_id' => 'typography-website-title',
        'std'   => array(
            'size'      => 14,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'regular',
            'color'     => '#686868',
            'align'     => 'left',
            'transform' => 'uppercase',
        ),
        'style' => array(
            'selectors'   => '',
            'properties'  => 'font-size,
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
        'name' => __( 'Teaser', 'yit' ),
        'desc' => ''
    ),
    array(
        'id' => 'widget-teaser-slogan-font',
        'type' => 'typography',
        'name' => __( 'Widget Teaser slogan font', 'yit' ),
        'desc' => __( 'Choose the font type, size and color.', 'yit' ),
        'min' => 1,
        'max' => 80,
        'default_font_id' => 'typography-website-title',
        'std'   => array(
            'size'      => 18,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'bold',
            'color'     => '#1f1f1f',
            'align'     => 'left',
            'transform' => 'uppercase',
        ),
        'style' => array(
            'selectors'   => '',
            'properties'  => 'font-size,
                              font-family,
                              font-weight,
                              color,
                              text-transform,
                              text-align'
        ),
        'disabled' => true

    ),

    array(
        'id' => 'widget-teaser-subslogan-font',
        'type' => 'typography',
        'name' => __( 'Widget Teaser subslogan font', 'yit' ),
        'desc' => __( 'Choose the font type, size and color.', 'yit' ),
        'min' => 1,
        'max' => 80,
        'default_font_id' => 'typography-website-title',
        'std'   => array(
            'size'      => 14,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '400',
            'color'     => '#474747',
            'align'     => 'left',
            'transform' => 'uppercase',
        ),
        'style' => array(
            'selectors'   => '',
            'properties'  => 'font-size,
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
        'name' => __( 'Contact form', 'yit' ),
        'desc' => ''
    ),
    array(
        'id' => 'shortcode-contact-form-label-font',
        'type' => 'typography',
        'name' => __( 'Contact form label font', 'yit' ),
        'desc' => __( 'Choose the font type, size and color.', 'yit' ),
        'min' => 1,
        'max' => 80,
        'default_font_id' => 'typography-website-title',
        'std'   => array(
            'size'      => 13,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '400',
            'color'     => '#a4a4a4',
            'align'     => 'left',
            'transform' => 'uppercase',
        ),
        'style' => array(
            'selectors'   => '',
            'properties'  => 'font-size,
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
        'name' => __( 'Toggle Menu', 'yit' ),
        'desc' => ''
    ),
    array(
        'id' => 'widget-toggle-menu-font',
        'type' => 'typography',
        'name' => __( 'Widget Toggle Menu font', 'yit' ),
        'desc' => __( 'Choose the font type, size and color.', 'yit' ),
        'min' => 1,
        'max' => 80,
        'default_font_id' => 'typography-website-title',
        'std'   => array(
            'size'      => 13,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '400',
            'color'     => '#a4a4a4',
            'align'     => 'left',
            'transform' => 'uppercase',
        ),
        'style' => array(
            'selectors'   => '',
            'properties'  => 'font-size,
                              font-family,
                              font-weight,
                              color,
                              text-transform,
                              text-align'
        ),
        'disabled' => true
    ),

    array(
        'id' => 'widget-toggle-submenu-font',
        'type' => 'typography',
        'name' => __( 'Widget Toggle Submenu font', 'yit' ),
        'desc' => __( 'Choose the font type, size and color.', 'yit' ),
        'min' => 1,
        'max' => 80,
        'default_font_id' => 'typography-website-title',
        'std'   => array(
            'size'      => 12,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '400',
            'color'     => '#a4a4a4',
            'align'     => 'left',
            'transform' => 'none',
        ),
        'style' => array(
            'selectors'   => '',
            'properties'  => 'font-size,
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
        'name' => __( 'Recent Posts', 'yit' ),
        'desc' => ''
    ),
    array(
        'id' => 'widget-recent-post-title-font',
        'type' => 'typography',
        'name' => __( 'Widget Recent Post title font', 'yit' ),
        'desc' => __( 'Choose the font type, size and color.', 'yit' ),
        'min' => 1,
        'max' => 80,
        'default_font_id' => 'typography-website-title',
        'std'   => array(
            'size'      => 12,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '500',
            'color'     => '#797979',
            'align'     => 'left',
            'transform' => 'uppercase',
        ),
        'style' => array(
            'selectors'   => '',
            'properties'  => 'font-size,
                              font-family,
                              font-weight,
                              color,
                              text-transform,
                              text-align'
        ),
        'disabled' => true
    ),
    array(
        'id' => 'widget-recent-post-date-background',
        'type' => 'colorpicker',
        'name' => __( 'Widget Recent Post Date Background', 'yit' ),
        'desc' => __( 'Choose the background color for the date.', 'yit' ),
        'std'            => array(
            'color' => '#acc327'
        ),
        'style'          => array(
            'selectors'  => '',
            'properties' => 'background-color'
        ),
        'disabled' => true
    ),
    array(
        'type' => 'title',
        'name' => __( 'Header Sidebar font', 'yit' ),
        'desc' => ''
    ),
    array(
        'id' => 'header-sidebar-font',
        'type' => 'typography',
        'name' => __( 'Widget Header Sidebar font', 'yit' ),
        'desc' => __( 'Choose the font type, size and color.', 'yit' ),
        'min' => 1,
        'max' => 80,
        'default_font_id' => 'typography-website-title',
        'std'   => array(
            'size'      => 11,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '400',
            'color'     => '#7d7d7d',
            'align'     => 'left',
            'transform' => 'uppercase',
        ),
        'style' => array(
            'selectors'   => '',
            'properties'  => 'font-size,
                              font-family,
                              font-weight,
                              color,
                              text-transform,
                              text-align'
        ),
        'disabled' => true
    ),

);