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
 * Return an array with the options for Theme Options > Typography and Color > Footer
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

    /* Typography and Color > Footer > General Settings */
    array(
        'type' => 'title',
        'name' => __( 'General Settings', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'         => 'footer-link-color',
        'type'       => 'colorpicker',
        'variations' => array(
            'normal' => __( 'Footer Link', 'yit' ),
            'hover'  => __( 'Footer Link hover', 'yit' )
        ),
        'name'       => __( 'Footer link color', 'yit' ),
        'desc'       => __( 'Select a text color for the link of the footer.', 'yit' ),
        'std'        => array(
            'color' => array(
                'normal' => '#b0b0b0',
                'hover'  => '#7caf00'
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


    array(
        'id'              => 'copyright-general-font',
        'type'            => 'typography',
        'name'            => __( 'Copyright general font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-paragraph',
        'std'             => array(
            'size'      => 12,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'regular',
            'color'     => '#b0b0b0',
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
        'id'         => 'copyright-link-color',
        'type'       => 'colorpicker',
        'variations' => array(
            'normal' => __( 'Link', 'yit' ),
            'hover'  => __( 'Link hover', 'yit' )
        ),
        'name'       => __( 'Copyright link color', 'yit' ),
        'desc'       => __( 'Select a text color for the link of the footer.', 'yit' ),
        'std'        => array(
            'color' => array(
                'normal' => '#b0b0b0',
                'hover'  => '#7caf00'
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

    array(
        'id'              => 'widget-title',
        'type'            => 'typography',
        'name'            => __( 'Widget title font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 14,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '700',
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

    /* Typography and Color > Content > Custom Background */
    array(
        'type' => 'title',
        'name' => __( 'Custom Background', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'    => 'footer-border-top-color',
        'type'  => 'colorpicker',
        'name'  => __( 'Footer border top color', 'yit' ),
        'desc'  => __( 'Select the color to use as top border on your page footer', 'yit' ),
        'std'   => array(
            'color' => '#191919'
        ),
        'style' => array(
            'selectors'  => '',
            'properties' => 'border-top-color'
        ),
        'disabled' => true
    ),

    array(
        'id'    => 'footer-background-color',
        'type'  => 'colorpicker',
        'name'  => __( 'Footer background color', 'yit' ),
        'desc'  => __( 'Select the color to use as background on your page footer', 'yit' ),
        'std'   => array(
            'color' => '#191919'
        ),
        'style' => array(
            'selectors'  => '',
            'properties' => 'background-color'
        ),
        'disabled' => true
    ),

    array(
        'id'    => 'footer-background-image',
        'type'  => 'upload',
        'name'  => __( 'Footer background image', 'yit' ),
        'desc'  => __( 'Select the image to use as background on your page footer', 'yit' ),
        'std'   => '',
        'style' => array(
            'selectors'  => '',
            'properties' => 'background-image'
        ),
        'disabled' => true
    ),

    array(
        'id'      => 'footer-background-repeat',
        'type'    => 'select',
        'options' => array(
            'repeat'    => __( 'Repeat', 'yit' ),
            'repeat-x'  => __( 'Repeat Horizontally', 'yit' ),
            'repeat-y'  => __( 'Repeat Vertically', 'yit' ),
            'no-repeat' => __( 'No Repeat', 'yit' )
        ),
        'name'    => __( 'Background repeat', 'yit' ),
        'desc'    => __( 'Select the repeat mode for the background image of footer.', 'yit' ),
        'std'     => 'no-repeat',
        'style'   => array(
            'selectors'  => '',
            'properties' => 'background-repeat'
        ),
        'disabled' => true
    ),

    array(
        'id'      => 'footer-background-position',
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
        'desc'    => __( 'Select the position for the background image of footer.', 'yit' ),
        'std'     => 'top left',
        'style'   => array(
            'selectors'  => '',
            'properties' => 'background-position'
        ),
        'disabled' => true
    ),

    array(
        'id'      => 'footer-background-attachment',
        'type'    => 'select',
        'options' => array(
            'scroll' => __( 'Scroll', 'yit' ),
            'fixed'  => __( 'Fixed', 'yit' )
        ),
        'name'    => __( 'Background attachment', 'yit' ),
        'desc'    => __( 'Select the attachment for the background image of footer.', 'yit' ),
        'std'     => 'scroll',
        'style'   => array(
            'selectors'  => '',
            'properties' => 'background-attachment'
        ),
        'disabled' => true
    ),

    array(
        'id'    => 'copyright-background-color',
        'type'  => 'colorpicker',
        'name'  => __( 'Copyright background color', 'yit' ),
        'desc'  => __( 'Select the color to use as background on your footer copyright ', 'yit' ),
        'std'   => array(
            'color' => '#191919'
        ),
        'style' => array(
            'selectors'  => '',
            'properties' => 'background-color'
        ),
        'disabled' => true
    ),

    array(
        'type' => 'title',
        'name' => __( 'Copyright Borders Color', 'yit' ),
        'desc' => ''
    ),
    array(
        'id'    => 'footer-border-color',
        'type'  => 'colorpicker',
        'name'  => __( 'Copyright border color', 'yit' ),
        'desc'  => __( 'Select the color to use for the footer borders', 'yit' ),
        'std'   => array(
            'color' => '#606060'
        ),
        'style' => array(
            'selectors'  => '',
            'properties' => 'border-color'
        ),
        'disabled' => true
    ),

    array(
        'type' => 'title',
        'name' => __( 'Back to Top', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'              => 'back-to-top-font',
        'type'            => 'typography',
        'name'            => __( 'Back to top Typography', 'yit' ),
        'desc'            => __( 'Select the font, color and size for back to top text.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 13,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '300',
            'color'     => '#ffffff',
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
        'id'         => 'back-to-top-bgcolor',
        'type'       => 'colorpicker',
        'variations' => array(
            'normal' => __( 'Background color', 'yit' ),
            'hover'  => __( 'Background color hover', 'yit' )
        ),
        'name'       => __( 'Back to Top Background Color', 'yit' ),
        'desc'       => __( 'Select the color to use for the background in back to top button.', 'yit' ),
        'std'        => array(
            'color' => array(
                'normal' => '#454545',
                'hover'  => '#9bdb00'
            )
        ),
        'style'      => array(
            'normal' => array(
                'selectors'  => '',
                'properties' => 'background-color'
            ),
            'hover'  => array(
                'selectors'  => '',
                'properties' => 'background-color'
            ),
        ),
        'disabled' => true
    ),

);

