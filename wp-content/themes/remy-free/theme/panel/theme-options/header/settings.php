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
 * Return an array with the options for Theme Options > Header > Logo
 *
 * @package Yithemes
 * @author Andrea Grillo <andrea.grillo@yithemes.com>
 * @author Antonio La Rocca <antonio.larocca@yithemes.it>
 * @since 2.0.0
 * @return mixed array
 *
 */
return array(

    /* Header > Logo Settings */
    array(
        'type' => 'title',
        'name' => __( 'General', 'yit' ),
        'desc' => ''
    ),

    array(
        'id' => 'header-sticky',
        'type' => 'onoff',
        'name' => __('Header Sticky', 'yit'),
        'desc' => __('Want to use a sticky header?', 'yit' ),
        'std' => 'no',
        'disabled' => true
    ),

    /* Header > Logo Settings */
    array(
        'type' => 'title',
        'name' => __( 'Logo', 'yit' ),
        'desc' => ''
    ),



    array(
        'id' => 'header-custom-logo',
        'type' => 'onoff',
        'name' => __('Custom logo', 'yit'),
        'desc' => __('Want to use a custom image as logo?', 'yit' ),
        'std' => 'yes',
        'in_skin'        => true
    ),

    array(
        'id' => 'header-custom-logo-image',
        'type' => 'upload',
        'name' => __( 'Custom logo image', 'yit' ),
        'desc' => __( 'Select the custom image to use as logo', 'yit' ),
        'std' => YIT_THEME_ASSETS_URL . '/images/logo.png',
        'deps' => array(
            'ids' => 'header-custom-logo',
            'values' => 'yes'
         )
    ),

    array(
        'id' => 'header-logo-tagline',
        'type' => 'onoff',
        'name' => __('Logo Tagline', 'yit'),
        'desc' => __('Specify if you want the tagline to show below the logo. ', 'yit' ),
        'std' => 'yes'
    ),

    array(
        'id' => 'header-logo-tagline-mobile',
        'type' => 'onoff',
        'name' => __('Show logo Tagline in mobile', 'yit'),
        'desc' => __('Specify if you want the tagline to show below the logo on mobile devices. ', 'yit' ),
        'std' => 'no',
        'deps' => array(
            'ids' => 'header-logo-tagline',
            'values' => 'yes'
        )
    ),



);

