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
 * Return an array with the options for Theme Options > Typography and Color > Header
 *
 * @package Yithemes
 * @author  Andrea Grillo <andrea.grillo@yithemes.com>
 * @author  Antonio La Rocca <antonio.larocca@yithemes.it>
 * @since   2.0.0
 * @return mixed array
 *
 */
return array(

    /* Typography and Color > General Custom Background */
    array(
        'type' => 'title',
        'name' => __( 'General Custom Background', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'    => 'header-background-color',
        'type'  => 'colorpicker',
        'name'  => __( 'Header background color', 'yit' ),
        'desc'  => __( 'Select the color to use as background on your header', 'yit' ),
        'std'   => array(
            'color'   => '#ffffff',
            'opacity' => 100,
        ),
        'style' => array(
            'selectors'  => '',
            'properties' => 'background-color'
        ),
        'disabled' => true
    ),

    array(
        'id'    => 'typography-header-background-image',
        'type'  => 'upload',
        'name'  => __( 'Header background image', 'yit' ),
        'desc'  => __( 'Select the image to use as background on your page header', 'yit' ),
        'std'   => '',
        'style' => array(
            'selectors'  => '',
            'properties' => 'background-image'
        ),
        'disabled' => true
    ),

    array(
        'id'      => 'typography-header-background-repeat',
        'type'    => 'select',
        'options' => array(
            'repeat'    => __( 'Repeat', 'yit' ),
            'repeat-x'  => __( 'Repeat Horizontally', 'yit' ),
            'repeat-y'  => __( 'Repeat Vertically', 'yit' ),
            'no-repeat' => __( 'No Repeat', 'yit' )
        ),
        'name'    => __( 'Background repeat', 'yit' ),
        'desc'    => __( 'Select the repeat mode for the background image of header.', 'yit' ),
        'std'     => 'no-repeat',
        'style'   => array(
            'selectors'  => '',
            'properties' => 'background-repeat'
        ),
        'disabled' => true
    ),

    array(
        'id'      => 'typography-header-background-position',
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
        'desc'    => __( 'Select the position for the background image of header.', 'yit' ),
        'std'     => 'top left',
        'style'   => array(
            'selectors'  => '',
            'properties' => 'background-position'
        ),
        'disabled' => true
    ),

    array(
        'id'      => 'typography-header-background-attachment',
        'type'    => 'select',
        'options' => array(
            'scroll' => __( 'Scroll', 'yit' ),
            'fixed'  => __( 'Fixed', 'yit' )
        ),
        'name'    => __( 'Background attachment', 'yit' ),
        'desc'    => __( 'Select the attachment for the background image of header.', 'yit' ),
        'std'     => 'scroll',
        'style'   => array(
            'selectors'  => '',
            'properties' => 'background-attachment'
        ),
        'disabled' => true
    ),

    array(
        'id'              => 'typography-header-logo-font',
        'type'            => 'typography',
        'name'            => __( 'Logo font', 'yit' ),
        'desc'            => __( 'Select the type to use for the logo font.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 48,
            'unit'      => 'px',
            'family'    => 'Open Sans',
            'style'     => '800',
            'color'     => '#ffffff',
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
        'id'              => 'typography-header-logo-highlight-font',
        'type'            => 'typography',
        'name'            => __( 'Logo font highlight', 'yit' ),
        'desc'            => __( 'Select the type to use for the logo font highlight.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 48,
            'unit'      => 'px',
            'family'    => 'Open Sans',
            'style'     => '800',
            'color'     => '#acc327',
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
        'id'              => 'typography-header-tagline-font',
        'type'            => 'typography',
        'name'            => __( 'Tagline font', 'yit' ),
        'desc'            => __( 'Select the type to use for the tagline below the logo.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 13,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'regular',
            'color'     => '#7c7c7c',
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
        'id'              => 'typography-header-tagline-highlight-font',
        'type'            => 'typography',
        'name'            => __( 'Tagline font highlight', 'yit' ),
        'desc'            => __( 'Select the type to use for the tagline highlight.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 13,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'regular',
            'color'     => '#acc327',
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

    /* Typography and Color > Header Row  */
    array(
        'type' => 'title',
        'name' => __( 'Header Row', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'              => 'typography-header-row-font',
        'type'            => 'typography',
        'name'            => __( 'Header Row font', 'yit' ),
        'desc'            => __( 'Select the font to use for the header row.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 13,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '500',
            'color'     => '#655442',
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
        'id'    => 'typography-header-row-background-color',
        'type'  => 'colorpicker',
        'name'  => __( 'Header Row background color', 'yit' ),
        'desc'  => __( 'Select the color to use as background on your header row', 'yit' ),
        'std'   => array(
            'color' => '#ece1c4'
        ),
        'style' => array(
            'selectors'  => '',
            'properties' => 'background-color'
        ),
        'disabled' => true
    ),

    array(
        'id'    => 'typography-header-row-border-top-color',
        'type'  => 'colorpicker',
        'name'  => __( 'Header Row border top color', 'yit' ),
        'desc'  => __( 'Select the color to use as border top on your header row', 'yit' ),
        'std'   => array(
            'color' => '#ece1c4'
        ),
        'style' => array(
            'selectors'  => '',
            'properties' => 'border-top-color'
        ),
        'disabled' => true
    ),

    array(
        'id'    => 'typography-header-row-border-bottom-color',
        'type'  => 'colorpicker',
        'name'  => __( 'Header Row border bottom color', 'yit' ),
        'desc'  => __( 'Select the color to use as border bottom on your header row', 'yit' ),
        'std'   => array(
            'color' => '#ece1c4'
        ),
        'style' => array(
            'selectors'  => '',
            'properties' => 'border-bottom-color'
        ),
        'disabled' => true
    ),

    /* Typography and Color > Header Sidebar center and right  */
    array(
        'type' => 'title',
        'name' => __( 'Header Sidebar Center and Header Sidebar Right', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'              => 'typography-header-sidebar',
        'type'            => 'typography',
        'name'            => __( 'Header Sidebar font', 'yit' ),
        'desc'            => __( 'Select the font to use for the header sidebar.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 11,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '500',
            'color'     => '#ffffff',
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
        'id'    => 'typography-header-sidebar-center-border-bottom-color',
        'type'  => 'colorpicker',
        'name'  => __( 'Header Sidebar Center border bottom color', 'yit' ),
        'desc'  => __( 'Select the color to use as border bottom on your header sidebar center', 'yit' ),
        'std'   => array(
            'color' => '#ece1c4'
        ),
        'style' => array(
            'selectors'  => '',
            'properties' => 'border-bottom-color'
        ),
        'disabled' => true
    ),

    /* Typography and Color > Slogan */
    array(
        'type' => 'title',
        'name' => __( 'Slogan', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'              => 'typography-header-slogan-font',
        'type'            => 'typography',
        'name'            => __( 'Slogan font', 'yit' ),
        'desc'            => __( 'Select the type to use for the slogan.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 80,
            'unit'      => 'px',
            'family'    => 'Roboto Slab',
            'style'     => 'regular',
            'color'     => '#434343',
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
        'id'              => 'typography-header-subslogan-font',
        'type'            => 'typography',
        'name'            => __( 'Sub Slogan font', 'yit' ),
        'desc'            => __( 'Select the type to use for the sub slogan.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-paragraph',
        'std'             => array(
            'size'      => 14,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'regular',
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
        'id'        => 'typography-slogan-highlight',
        'type'      => 'colorpicker',
        'name'      => __( 'Slogan title highlight', 'yit' ),
        'desc'      => __( 'Select the color to use for the highlight of titles', 'yit' ),
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
        'id'    => 'typography-slogan-background-color',
        'type'  => 'colorpicker',
        'name'  => __( 'Slogan background color', 'yit' ),
        'desc'  => __( 'Select the color to use as background on your slogans', 'yit' ),
        'std'   => array(
            'color' => '#ffffff'
        ),
        'style' => array(
            'selectors'  => '',
            'properties' => 'background-color'
        ),
        'disabled' => true
    ),


    /* Typography and Color > Topbar */
    array(
        'type' => 'title',
        'name' => __( 'Topbar', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'              => 'typography-topbar-font',
        'type'            => 'typography',
        'name'            => __( 'Topbar font', 'yit' ),
        'desc'            => __( 'Select the font to use for the topbar.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 11,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '500',
            'color'     => '#655442',
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
        'id'              => 'typography-topbar-highlight-font',
        'type'            => 'typography',
        'name'            => __( 'Topbar highlight font', 'yit' ),
        'desc'            => __( 'Select the font to use for the highlight text topbar.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 11,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '400',
            'color'     => '#acc327',
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
        'id'    => 'typography-topbar-background-color',
        'type'  => 'colorpicker',
        'name'  => __( 'Topbar background color', 'yit' ),
        'desc'  => __( 'Select the color to use as background on your page topbar', 'yit' ),
        'std'   => array(
            'color' => '#ece1c4'
        ),
        'style' => array(
            'selectors'  => '',
            'properties' => 'background-color'
        ),
        'disabled' => true
    ),

    array(
        'id'    => 'typography-topbar-border-bottom-color',
        'type'  => 'colorpicker',
        'name'  => __( 'Topbar border bottom color', 'yit' ),
        'desc'  => __( 'Select the color to use as border bottom on your topbar', 'yit' ),
        'std'   => array(
            'color' => '#ece1c4'
        ),
        'style' => array(
            'selectors'  => '',
            'properties' => 'border-color'
        ),
        'disabled' => true
    ),
    array(
        'id'         => 'topbar-link-color',
        'type'       => 'colorpicker',
        'variations' => array(
            'normal' => __( 'Links', 'yit' ),
            'hover'  => __( 'Links hover', 'yit' )
        ),
        'name'       => __( 'Links', 'yit' ),
        'desc'       => __( 'Select the type to use for the links in your page header.', 'yit' ),
        'std'        => array(
            'color' => array(
                'normal' => '#655442',
                'hover'  => '#acc327'
            )
        ),
        'style'      => array(
            'normal' => array(
                'selectors'  => '',
                'properties' => 'color'
            ),
            'hover'  => array(
                'selectors'  => '',
                'properties' => 'color'
            ),
        ),
        'disabled' => true
    ),


    array(
        'id'         => 'topbar-menu-link-color',
        'type'       => 'colorpicker',
        'variations' => array(
            'normal' => __( 'Links', 'yit' ),
            'hover'  => __( 'Links hover', 'yit' )
        ),
        'name'       => __( 'Topbar Menu Link color', 'yit' ),
        'desc'       => __( 'Select the colors to use for the links in topbar menu', 'yit' ),
        'std'        => array(
            'color' => array(
                'normal' => '#ffffff',
                'hover'  => '#acc327'
            )
        ),
        'style'      => array(
            'normal' => array(
                'selectors'  => '#topnav .nav',
                'properties' => 'color'
            ),
            'hover'  => array(
                'selectors'  => '',
                'properties' => 'color'
            ),
        ),
        'disabled' => true
    ),



    /* Typography and Color > Navigation */
    array(
        'type' => 'title',
        'name' => __( 'Navigation', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'              => 'typography-navigation-menu-font',
        'type'            => 'typography',
        'name'            => __( 'Navigation font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color for the navigation.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 13,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'regular',
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
        'id'         => 'typography-navigation-menu-link-color',
        'type'       => 'colorpicker',
        'variations' => array(
            'normal' => __( 'Links', 'yit' ),
            'hover'  => __( 'Links hover', 'yit' ),
            'background'  => __( 'Links hover background', 'yit' ),
        ),
        'name'       => __( 'Navigation Links Color', 'yit' ),
        'desc'       => __( 'Select the colors to use for the links in navigation menu', 'yit' ),
        'std'        => array(
            'color' => array(
                'normal' => '#7d7d7d',
                'hover'  => '#7d7d7d',
                'background' => '#ece1c4',
            )
        ),
        'style'      => array(
            'normal' => array(
                'selectors'  => '',
                'properties' => 'color'
            ),
            'hover'  => array(
                'selectors'  => '',
                'properties' => 'color'
            ),
            'background' => array(
                'selectors' => '#nav.nav > ul > li > a:hover',
                'properties' => 'background'
            )
        ),
        'disabled' => true
    ),



    /* Typography and Color > Sub Navigation */
    array(
        'type' => 'title',
        'name' => __( 'Sub Navigation', 'yit' ),
        'desc' => ''
    ),
    array(
        'id'    => 'typography-subnavigation-background-color',
        'type'  => 'colorpicker',
        'name'  => __( 'Sub Navigation background color', 'yit' ),
        'desc'  => __( 'Select the color to use as background on your subnavigation bar', 'yit' ),
        'std'   => array(
            'color' => '#ffffff'
        ),
        'style' => array(
            'selectors'  => '',
            'properties' => 'background-color'
        ),
        'disabled' => true
    ),


    array(
        'id'              => 'typography-subnavigation-menu-font',
        'type'            => 'typography',
        'name'            => __( 'Sub Navigation font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color for the subnavigation.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 13,
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
        'id'         => 'typography-subnavigation-menu-link-color',
        'type'       => 'colorpicker',
        'variations' => array(
            'normal' => __( 'Links', 'yit' ),
            'hover'  => __( 'Links hover', 'yit' ),
        ),
        'name'       => __( 'Subnavigation Links Color', 'yit' ),
        'desc'       => __( 'Select the colors to use for the links in submenu', 'yit' ),
        'std'        => array(
            'color' => array(
                'normal' => '#7d7d7d',
                'hover'  => '#acc327',
            )
        ),
        'style'      => array(
            'normal' => array(
                'selectors'  => '',
                'properties' => 'color'
            ),
            'hover'  => array(
                'selectors'  => '',
                'properties' => 'color'
            )
        ),
        'disabled' => true
    ),

    /* Typography and Color > Megamenu */
    array(
        'type' => 'title',
        'name' => __( 'Bigmenu', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'              => 'typography-big-menu-title-menu-font',
        'type'            => 'typography',
        'name'            => __( 'Sub Navigation Title Big Menu font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color for the title in subnavigation.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 13,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'bold',
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
        'id'              => 'typography-big-menu-subnavigation-menu-font',
        'type'            => 'typography',
        'name'            => __( 'Sub Navigation Big Menu font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color for the subnavigation.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 14,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '500',
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
        'id'         => 'typography-big-menu-link-color',
        'type'       => 'colorpicker',
        'variations' => array(
            'title-normal'   => __( 'Title', 'yit' ),
            'title-hover'    => __( 'Title hover', 'yit' ),
            'submenu-normal' => __( 'Submenu', 'yit' ),
            'submenu-hover'  => __( 'Submenu hover', 'yit' )
        ),
        'name'       => __( 'Bigmenu Links Color', 'yit' ),
        'desc'       => __( 'Select the colors to use for the links in bigmenu', 'yit' ),
        'std'        => array(
            'color' => array(
                'title-normal'   => '#809314',
                'title-hover'    => '#acc327',
                'submenu-normal' => '#7d7d7d',
                'submenu-hover'  => '#acc327'
            )
        ),
        'style'      => array(
            'title-normal'   => array(
                'selectors'  => '',
                'properties' => 'color'
            ),
            'title-hover'    => array(
                'selectors'  => '',
                'properties' => 'color'
            ),
            'submenu-normal' => array(
                'selectors'  => '',
                'properties' => 'color'
            ),
            'submenu-hover'  => array(
                'selectors'  => '',
                'properties' => 'color'
            ),
        ),
        'disabled' => true
    ),

    array(
        'type' => 'title',
        'name' => __( 'Mini Search Colors', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'         => 'mini-search-label-text',
        'type'       => 'typography',
        'name'       => __( 'Mini Search Font', 'yit' ),
        'desc'       => __( 'Choose the font type, size and color for the mini search', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 13,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'regular',
            'color'     => '#a4a4a4',
            'align'     => 'left',
            'transform' => 'uppercase'
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-weight,
                              text-transform,
                              color,
                              text-align'
        ),
        'disabled' => true
    ),

    array(
        'id'         => 'mini-search-text',
        'type'       => 'typography',
        'name'       => __( 'Mini Search Input Text Font', 'yit' ),
        'desc'       => __( 'Choose the font type, size and color for the text input of mini search', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-paragraph',
        'std'             => array(
            'size'      => 13,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'regular',
            'color'     => '#a4a4a4',
            'align'     => 'left',
            'transform' => 'none'
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-weight,
                              text-transform,
                              color,
                              text-align'
        ),
        'disabled' => true
    ),


    array(
        'id'         => 'mini-search-widget-button-colors',
        'type'       => 'colorpicker',
        'variations' => array(

            'border'     => __( 'Border', 'yit' ),
            'background' => __( 'Background', 'yit' ),
            'text-color' => __( 'Text Color', 'yit' ),
        ),
        'name'       => __( 'Mini Search Widget Button Colors', 'yit' ),
        'desc'       => __( 'Select the colors to use for the mini search widget button border and background', 'yit' ),
        'std'        => array(
            'color' => array(

                'border'     => '#acc327',
                'background' => '#acc327',
                'text-color' => '#ffffff',
            )
        ),
       'style'      => array(
           'text-color'     => array(
               'selectors'  => '',
               'properties' => 'color'
           ),
            'border'     => array(
                'selectors'  => '',
                'properties' => 'border-color'
            ),
            'background' => array(
                'selectors'  => '',
                'properties' => 'background-color'
            )
        ),
        'disabled' => true
    ),


);
