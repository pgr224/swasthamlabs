<?php
/**
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

return array(

    array(
        'name'         => 'WooCommerce',
        'slug' 		   => 'woocommerce',
        'required' 	   => false,
        'version'      => '2.4.6',
    ),

    array(
        'name'         => 'YITH Essential Kit for WooCommerce #1',
        'slug' 		   => 'yith-essential-kit-for-woocommerce-1',
        'required' 	   => false,
        'version'      => '1.0.9',
    ),

    defined( 'YITH_WACP_PREMIUM' ) ? array() : array(
        'name'   => 'YITH WooCommerce Added To Cart Popup',
        'slug'   => 'yith-woocommerce-added-to-cart-popup',
        'required'  => false,
        'version'   => '1.0.2'
    ),
    defined( 'YITH_YWSL_PREMIUM' ) ? array() : array(
        'name'   => 'YITH WooCommerce Social Login',
        'slug'   => 'yith-woocommerce-social-login',
        'required'  => false,
        'version'   => '1.0.5'
    ),

);