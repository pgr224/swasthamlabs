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
		'id'             => 'theme-text-color',
		'type'           => 'colorpicker',
		'name'           => __( 'Main Text', 'yit' ),
		'desc'           => __( 'Set the color for the major of texts in the theme.', 'yit' ),
		'refresh_button' => true,
		'std'            => array(
			'color' => '#6d6c6c'
		),
		'style'          => array(
			'selectors'  => '',
			'properties' => 'color'
		),
        'disabled' => true
	),

	array(
		'id'             => 'theme-color-1',
		'type'           => 'colorpicker',
		'name'           => __( 'Shade 1', 'yit' ),
		'desc'           => __( 'Set the first shade of main color.', 'yit' ),
		'refresh_button' => true,
		'std'            => array(
			'color' => '#5b8000'
		),
		'style'          => array(
			array(
				'selectors'  => '',
				'properties' => 'color'
			),
			array(
				'selectors'  => '',
				'properties' => 'background-color'
			),
			array(
				'selectors'  => '',
				'properties' => 'border-top-color'
			),
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
            'color' => '#7caf00'
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
            'color' => '#8c8c8c'
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
            'color' => '#ffffff'
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
            'color' => '#dbd8d8'
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
            'color' => '#f2f2f2'
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
        'id'        => 'color-theme-star',
        'type'      => 'colorpicker',
        'variations' => array(
            'normal' => __( 'Empty', 'yit' ),
            'hover'  => __( 'Full', 'yit' )
        ),
        'name'      => __( 'General Stars Color', 'yit' ),
        'desc'      => __( 'Select the color used in the theme for the theme stars.', 'yit' ),
        'std'  => array(
            'color' => array(
                'normal' => '#b5b4b4',
                'hover'  => '#7caf00'
            )
        ),
        'style'     => array(
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
        'id'        => 'color-theme-share',
        'type'      => 'colorpicker',
        'variations' => array(
            'normal' => __( 'Normal', 'yit' ),
            'hover'  => __( 'Hover', 'yit' )
        ),
        'name'      => __( 'General Share & Social Login Color', 'yit' ),
        'desc'      => __( 'Select the color used in the theme for the share and social login.', 'yit' ),
        'std'  => array(
            'color' => array(
                'normal' => '#b1b1b1',
                'hover'  => '#4b4b4b'
            )
        ),
        'style'     => array(
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
);

