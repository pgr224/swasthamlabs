<?php
/**
 * Theme Customizer
 * 
 *
 *
 * @package WordPress
 * @subpackage Green Ink
 * @since 1.0.0
 *
 */

# Woocommerce

if( class_exists( 'woocommerce' ) )
{
	$cart_icons = array(
    	'fa-shopping-cart' => get_template_directory_uri().'/assets/images/cart.png',
	);

	$cart_icons = apply_filters('green_ink_shopping_icons', $cart_icons);

	Green_Ink_Kirki::add_section( 'green_ink_woo', array(
		'title'       => esc_html__('Woocommerce', 'green-ink' ),
		'priority'    => 45,
		'description' => esc_html__('Woocommerce related options', 'green-ink'),
	    'capability'  => 'edit_theme_options',
	) );


	Green_Ink_Kirki::add_field( 'green_ink', array(
		'settings'    => 'green_ink_options[prod_bg_thumb]',
		'label'       => esc_html__( 'Use Product Featured Image as Title Background:', 'green-ink' ),
		'description' => esc_html__( 'You can use featured image of products to be displayed as title background image, just like for pages.', 'green-ink' ),
		'section'     => 'green_ink_woo',
		'type'        => 'select',
		'choices'     => array(
			'yes'     => esc_html__( 'Yes', 'green-ink' ),
			'no'      => esc_html__( 'No', 'green-ink' )
	    ),
		'default'    => 'no',
	) );

	Green_Ink_Kirki::add_field( 'green_ink', array(
		'settings'    => 'green_ink_options[shop_columns]',
		'label'       => esc_html__( 'Shop - Product List Columns', 'green-ink' ),
		'description' => esc_html__( 'You can choose the number of columns in which products on the shop page will be listed.', 'green-ink' ),
		'section'     => 'green_ink_woo',
		'type'        => 'select',
		'choices'     => array(
			'column-4'  => esc_html__( '4 Columns', 'green-ink' ),
			'column-3'  => esc_html__( '3 Columns', 'green-ink' )
	    ),
		'default'    => 'column-5',
	) );
}
