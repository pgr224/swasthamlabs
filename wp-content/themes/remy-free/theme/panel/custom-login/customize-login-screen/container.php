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
 * Return an array with the options for Custom Login > Customize Login Screen > Container
 *
 * @package Yithemes
 * @author Antonio La Rocca <antonio.larocca@yithems.it>
 * @since 2.0.0
 * @return mixed array
 *
 */
return array(

    /* Custom Login > Costumize Login Screen > Container */
    array(
        'id' => 'container-width-custom-login',
        'type' => 'number',
        'name' => __( 'Width of the container', 'yit' ),
        'desc' => __( 'The width in pixels of the login container', 'yit' ),
        'min' => 320,
        'max' => 999,
        'std' => 337,
    ),

    array(
        'id' => 'container-min-height-custom-login',
        'type' => 'number',
        'name' => __( 'Min height of the container', 'yit' ),
        'desc' => __( 'The minimum height in pixels of the login container', 'yit' ),
        'min' => 300,
        'max' => 999,
        'std' => 437,
    ),

    array(
        'id' => 'container-color-custom-login',
        'type' => 'colorpicker',
        'name' => __( 'Container background color', 'yit' ),
        'desc' => __( 'The container background color', 'yit' ),
        'std' => array(
            'color' => '#ffffff'
        )
    ),

    array(
        'id' => 'container-labels-typograhpy-custom-login',
        'type' => 'typography',
        'name' => __( 'Labels Typography', 'yit' ),
        'desc' => __( 'Choose the font type, size and color for the labels.', 'yit' ),
        'min' => 1,
        'max' => 80,
        'default_font_id' => 'typography-website-paragraph',
        'std'   => array(
            'size'      => 13,
            'unit'      => 'px',
            'family'    => 'Roboto',
            'style'     => '400',
            'color'     => '#A4A4A4',
            'transform' => 'uppercase',
        ),
        'style' => array(
            'properties'  => 'font-size,
                              font-family,
                              font-weight,
                              color,
                              text-transform',
            'selectors' => '#loginform label'
        )
    ),

    array(
        'id' => 'container-labels-typograhpy-custom-login-p-font',
        'type' => 'typography',
        'name' => __( 'Typography for textarea, remember me', 'yit' ),
        'desc' => __( 'Choose the font type, size and color for the labels.', 'yit' ),
        'min' => 1,
        'max' => 80,
        'default_font_id' => 'typography-website-paragraph',
        'std'   => array(
            'size'      => 14,
            'unit'      => 'px',
            'family'    => 'Roboto',
            'style'     => 'regular',
            'color'     => '#A4A4A4',
        ),
        'style' => array(
            'properties'  => 'font-size,
                              font-family,
                              font-weight,
                              color',
            'selectors' => '#loginform .forgetmenot label,
            #loginform input[type="text"],
            #loginform input[type="password"]'
        )
    ),
    array(
        'id' => 'container-submit-typograhpy-custom-login',
        'type' => 'typography',
        'name' => __( 'Submit button typography', 'yit' ),
        'desc' => __( 'Choose the font type, size and color for the submit button.', 'yit' ),
        'min' => 1,
        'max' => 80,
        'default_font_id' => 'typography-website-paragraph',
        'std'   => array(
            'size'      => 14,
            'unit'      => 'px',
            'family'    => 'Roboto',
            'style'     => '400',
            'color'     => '#ffffff',
            'transform' => 'uppercase',
        ),
        'style' => array(
            'properties'  => 'font-size,
                              font-family,
                              font-weight,
                              color,
                              text-transform',
            'selectors' => '.login .button-primary'
        )
    ),

    array(
        'id' => 'container-submit-hover-custom-login',
        'type' => 'colorpicker',
        'name' => __( 'Submit button hover color', 'yit' ),
        'desc' => __( 'The submit button text hover color', 'yit' ),
        'std' => array(
            'color' => '#ffffff'
        )
    ),

    array(
        'id' => 'container-submit-color-custom-login',
        'type' => 'colorpicker',
        'variations' => array(
            'normal' => __( 'Normal', 'yit' ),
            'hover' => __( 'Hover', 'yit' )
        ),
        'name' => __( 'Submit button background color', 'yit' ),
        'desc' => __( 'Submit button background color ', 'yit' ),
        'std' => array(
            'color' => array(
                'normal' => '#acc327',
                'hover' => '#809314'
            ),
        ),
        'style' => array(
            'normal' => array(
                'selectors' => '.login .button-primary',
                'properties' => 'background-color'
            ),
            'hover' => array(
                'selectors' => '.login .button-primary:hover',
                'properties' => 'background-color'
            ),
        )
    ),

    array(
        'id' => 'container-submit-border-custom-login',
        'type' => 'colorpicker',
        'variations' => array(
            'normal' => __( 'Normal', 'yit' ),
            'hover' => __( 'Hover', 'yit' )
        ),
        'name' => __( 'Submit button border color', 'yit' ),
        'desc' => __( 'Submit button border color ', 'yit' ),
        'std' => array(
            'color' => array(
                'normal' => '#acc327',
                'hover' => '#809314'
            )
        ),
        'style' => array(
            'normal' => array(
                'selectors' => '.login .button-primary',
                'properties' => 'border-color'
            ),
            'hover' => array(
                'selectors' => '.login .button-primary:hover',
                'properties' => 'border-color'
            ),
        )
    ),

    array(
        'id' => 'container-links-typograhpy-custom-login',
        'type' => 'typography',
        'name' => __( 'Lost your password and Back links font', 'yit' ),
        'desc' => __( 'Choose the font type, size and color for Lost your password and Back links.', 'yit' ),
        'min' => 1,
        'max' => 80,
        'default_font_id' => 'typography-website-paragraph',
        'std'   => array(
            'size'      => 14,
            'unit'      => 'px',
            'family'    => 'Roboto',
            'style'     => 'bold',
            'color'     => '#686666',
            'transform' => 'none',
        ),
        'style' => array(
            'properties'  => 'font-size,
                              font-family,
                              font-weight,
                              color,
                              text-transform',
            'selectors' => '.login #nav a, .login #backtoblog a'
        )
    ),

    array(
        'id' => 'container-links-hover-custom-login',
        'type' => 'colorpicker',
        'name' => __( 'Links hover color', 'yit' ),
        'desc' => __( 'Link text hover color', 'yit' ),
        'std' => array(
            'color' => '#809314'
        )
    ),
);