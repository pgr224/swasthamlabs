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
 * Return an array with the options for Theme Options > Typography and Color > Buttons
 *
 * @package Yithemes
 * @author  Andrea Grillo <andrea.grillo@yithemes.com>
 * @author  Antonio La Rocca <antonio.larocca@yithemes.it>
 * @since   2.0.0
 * @return mixed array
 *
 */
return array(

    /* Typography and Color > Buttons */

    array(
        'type' => 'title',
        'name' => __( 'Buttons Flat', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'              => 'button-font',
        'type'            => 'typography',
        'name'            => __( 'Buttons Typography', 'yit' ),
        'desc'            => __( 'Select the typography for buttons text.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 11,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '400',
            'transform' => 'uppercase',
        ),
        'style'             => array(
        'selectors'         =>  '',

            'properties' => 'font-size,
                              font-family,
                              font-weight,
                              text-transform'
        ),
        'disabled' => true
    ),

    array(
        'id'         => 'button-text-color',
        'type'       => 'colorpicker',
        'name'       => __( 'Buttons Text color', 'yit' ),
        'desc'       => __( 'Select the color of the text for the buttons of every page', 'yit' ),
        'variations' => array(
            'normal' => __( 'Text color', 'yit' ),
            'hover'  => __( 'Text hover color', 'yit' )
        ),
        'std'        => array(
            'color' => array(
                'normal' => '#ffffff',
                'hover'  => '#ffffff'
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
        'id'         => 'button-border-color',
        'type'       => 'colorpicker',
        'variations' => array(
            'normal' => __( 'Border color', 'yit' ),
            'hover'  => __( 'Border hover color', 'yit' )
        ),
        'name'       => __( 'Buttons border color', 'yit' ),
        'desc'       => __( 'Select a color for the buttons border of all pages.', 'yit' ),
        'std'        => array(
            'color' => array(
                'normal' => '#000000',
                'hover'  => '#434343'
            )
        ),
        'style'      => array(
            'normal' => array(
                'selectors'  => '',

                'properties' => 'border-color'
            ),
            'hover'  => array(
                'selectors'  => '',

                'properties' => 'border-color'
            )
        ),
        'disabled' => true
    ),

    array(
        'id'         => 'button-background-color',
        'type'       => 'colorpicker',
        'variations' => array(
            'normal' => __( 'Background color', 'yit' ),
            'hover'  => __( 'Background hover color', 'yit ' )
        ),
        'name'       => __( 'Buttons background color', 'yit' ),
        'desc'       => __( 'Select a color for the buttons background of all pages.', 'yit' ),
        'std'        => array(
            'color' => array(
                'normal' => '#000000',
                'hover'  => '#434343'
            )
        ),
        'style'      => array(
            'normal' => array(
                'selectors'  => '',

                'properties' => 'background-color, background'
            ),
            'hover'  => array(
                'selectors'  => '',

                'properties' => 'background-color, background'
            )
        ),
        'disabled' => true
    ),

    /* ========= Button Alternative =========== */

    array(
        'type' => 'title',
        'name' => __( 'Buttons Alternative', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'              => 'button-font-alternative',
        'type'            => 'typography',
        'name'            => __( 'Buttons Alternative Typography', 'yit' ),
        'desc'            => __( 'Select the typography for alternative buttons text.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 11,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '400',
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
        'id'         => 'button-hover-color-alternative',
        'type'       => 'colorpicker',
        'name'       => __( 'Buttons Alternative Text Color', 'yit' ),
        'desc'       => __( 'Select the color of the text for the alternative buttons of every page', 'yit' ),
        'variations' => array(
            'normal' => __( 'Text color', 'yit' ),
            'hover'  => __( 'Text hover color', 'yit ' )
        ),
        'std'        => array(
            'color' => array(
                'normal' => '#ffffff',
                'hover'  => '#ffffff'
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
        'id'         => 'button-border-color-alternative',
        'type'       => 'colorpicker',
        'variations' => array(
            'normal' => __( 'Border color', 'yit' ),
            'hover'  => __( 'Border hover color', 'yit' )
        ),
        'name'       => __( 'Buttons Alternative border color', 'yit' ),
        'desc'       => __( 'Select a color for the alternative buttons border of all pages.', 'yit' ),
        'std'        => array(
            'color' => array(
                'normal' => '#acc327',
                'hover'  => '#809314'
            )
        ),
        'style'      => array(
            'normal' => array(
                'selectors'  => '',

                'properties' => 'border-color'
            ),
            'hover'  => array(
                'selectors'  => '',

                'properties' => 'border-color'
            )
        ),
        'disabled' => true
    ),

    array(
        'id'         => 'button-background-color-alternative',
        'type'       => 'colorpicker',
        'variations' => array(
            'normal' => __( 'Background color', 'yit' ),
            'hover'  => __( 'Background hover color', 'yit ' )
        ),
        'name'       => __( 'Buttons Alternative background color', 'yit' ),
        'desc'       => __( 'Select a color for the alternative buttons background of all pages.', 'yit' ),
        'std'        => array(
            'color' => array(
                'normal' => '#acc327',
                'hover'  => '#809314'
            )
        ),
        'style'      => array(
            'normal' => array(
                'selectors'  => '',

                'properties' => 'background-color, background'
            ),
            'hover'  => array(
                'selectors'  => '',

                'properties' => 'background-color, background'
            )
        ),
        'disabled' => true
    ),

);

