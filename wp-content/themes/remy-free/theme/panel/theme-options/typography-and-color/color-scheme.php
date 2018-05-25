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
 * @author  Antonino Scarfi' <antonino.scarfi@yithemes.com>
 * @since   2.0.0
 * @return  mixed array
 *
 */
return array(
    /* Typography and Color > General Settings */
    array(
        'type' => 'title',
        'name' => __( 'Main general color scheme', 'yit' ),
        'desc' => __( "Set the different colors shades for the main theme's color", 'yit' )
    ),

    array(
        'id'             => 'theme-color-1',
        'type'           => 'colorpicker',
        'name'           => __( 'Shade 1', 'yit' ),
        'desc'           => __( 'Set the first shade of main color.', 'yit' ),
        'refresh_button' => true,
        'std'            => array(
            'color' => '#809314'
        ),
        'style'          => array(
            'selectors'  => '',
            'properties' => 'color'
        ),
        'disabled' => true
    ),
    array(
        'id'             => 'theme-color-2',
        'type'           => 'colorpicker',
        'name'           => __( 'Shade 2', 'yit' ),
        'desc'           => __( 'Set the second shade of main color.', 'yit' ),
        'refresh_button' => true,
        'std'            => array(
            'color' => '#acc327'
        ),
        'style'          => array(
            'selectors'  => '',
            'properties' => 'color'
        ),
        'disabled' => true
    ),
    array(
        'id'             => 'theme-color-3',
        'type'           => 'colorpicker',
        'name'           => __( 'Shade 3', 'yit' ),
        'desc'           => __( 'Set the third shade of main color.', 'yit' ),
        'refresh_button' => true,
        'std'            => array(
            'color' => '#686868'
        ),
        'style'          => array(
            'selectors'  => '',
            'properties' => 'color'
        ),
        'disabled' => true
    ),
    array(
        'id'             => 'general-background-color',
        'type'           => 'colorpicker',
        'name'           => __( 'General Background Color', 'yit' ),
        'desc'           => __( 'Set the general background color.', 'yit' ),
        'refresh_button' => true,
        'std'            => array(
            'color' => '#6a6a6a'
        ),
        'style'          => array(
            'selectors'  => '',
            'properties' => 'background-color'
        ),
        'disabled' => true
    ),
    array(
        'id'    => 'color-website-border-style-1',
        'type'  => 'colorpicker',
        'name'  => __( 'General Border Color Style 1', 'yit' ),
        'desc'  => __( 'Select the color used in the theme for the border', 'yit' ),
        'std'   => array(
            'color' => '#e2e2e2'
        ),
        'style' => array(
            array(
                'selectors'  => '',
                'properties' => 'border-top-color'
            ),

            array(
                'selectors'  => '',
                'properties' => 'border-bottom-color'
            ),

            array(
                'selectors'  => '',
                'properties' => 'border-color'
            ),
            array(
                'selectors'  => '',
                'properties' => 'background-color'
            )
        ),
        'disabled' => true
    ),

    array(
        'id'    => 'color-website-border-style-2',
        'type'  => 'colorpicker',
        'name'  => __( 'General Border Color Style 2', 'yit' ),
        'desc'  => __( 'Select the color used in the theme for the border', 'yit' ),
        'std'   => array(
            'color' => '#acc327'
        ),
        'style' => array(
            array(
                'selectors'  => '',
                'properties' => 'border-top-color'
            ),

            array(
                'selectors'  => '',
                'properties' => 'border-bottom-color'
            ),

            array(
                'selectors'  => '',
                'properties' => 'border-color'
            ),
            array(
                'selectors'  => '',
                'properties' => 'background-color'
            )
        ),
        'disabled' => true
    ),



    array(
        'id'    => 'color-theme-icon',
        'type'  => 'colorpicker',
        'name'  => __( 'General Icons Color', 'yit' ),
        'desc'  => __( 'Select the color used in the theme for the theme icons', 'yit' ),
        'std'   => array(
            'color' => '#809314'
        ),
        'style' => array(
            array(
                'selectors'  => '',
                'properties' => 'color'
            ),
        ),
        'disabled' => true
    ),

    array(
        'id'        => 'color-theme-star',
        'type'      => 'colorpicker',
        'name'      => __( 'General Stars Color', 'yit' ),
        'desc'      => __( 'Select the color used in the theme for the theme stars.', 'yit' ),
        'std'       => array(
            'color' => '#fab000'
        ),
        'style'     => array(
            'selectors'  => '',
            'properties' => 'color'
        ),
        'disabled' => true
    ),

    array(
        'id'        => 'color-theme-star-empty',
        'type'      => 'colorpicker',
        'name'      => __( 'General Empty Stars Color', 'yit' ),
        'desc'      => __( 'Select the color used in the theme for the theme empty stars.', 'yit' ),
        'std'       => array(
            'color' => '#d4d4d4'
        ),
        'style'     => array(
            'selectors'  => '',
            'properties' => 'color'
        ),
        'disabled' => true
    ),
);

