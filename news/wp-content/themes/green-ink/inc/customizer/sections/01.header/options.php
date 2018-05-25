<?php
/**
 * Theme Customizer
 * 
 *
 *
 * @package WordPress
 * @subpackage green ink
 * @since 1.0.0
 *
 */

# Header

Green_Ink_Kirki::add_section( 'green_ink_logotype', array(
	'title'       => __( 'Header', 'green-ink' ),
	'priority'    => 15,
	'description' => esc_html__('Header related options', 'green-ink'),
    'capability'  => 'edit_theme_options',
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings' => 'green_ink_options[logo_height]',
	'label'    => esc_html__( 'Logo Height', 'green-ink' ),
	'section'  => 'green_ink_logotype',
	'type'     => 'number',
	'default'  => 49,
	'transport' => 'postMessage',
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings' => 'green_ink_options[header_pos]',
	'label'    => esc_html__( 'Header Position', 'green-ink' ),
	'section'  => 'green_ink_logotype',
	'type'     => 'radio-buttonset',
	'transport' => 'postMessage',
	'choices'  => array(
		'header-over'   => esc_html__( 'Over Slider', 'green-ink' ),
		'standard'   	=> esc_html__( 'Above Slider', 'green-ink' )
    ),
	'default'  => 'header-over',
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings'  => 'green_ink_options[header_bg_color]',
	'label'     => esc_html__( 'Header Background Color', 'green-ink' ),
	'section'   => 'green_ink_logotype',
	'type'      => 'color',
	'transport' => 'postMessage',
	'default'   => 'rgba(0,0,0,0.7)',
	'js_vars'   => array(
		array(
			'element'  => '#header .inner',
			'function' => 'css',
			'property' => 'background'
		),
	),
	'alpha'     => true,
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings' => 'green_ink_options[menu_1st_color]',
	'label'    => esc_html__( 'Menu Elements Color', 'green-ink' ),
	'section'  => 'green_ink_logotype',
	'type'     => 'color',
	'transport' => 'postMessage',
	'default'  => '#f9fafa',
	'js_vars' => array(
		array(
			'element'  => '.main-navigation ul > li > a',
			'function' => 'css',
			'property' => 'color'
		),
	),
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings' => 'green_ink_options[menu_2nd_color]',
	'label'    => esc_html__( 'Submenu Elements Color', 'green-ink' ),
	'section'  => 'green_ink_logotype',
	'type'     => 'color',
	'transport' => 'postMessage',
	'default'  => '#333',
	'js_vars' => array(
		array(
			'element'  => 'body .main-navigation .sub-menu > li > a',
			'function' => 'css',
			'property' => 'color'
		),
	),
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings' => 'green_ink_options[menu_hcolor]',
	'label'    => esc_html__( 'Menu Elements Hover Color', 'green-ink' ),
	'section'  => 'green_ink_logotype',
	'type'     => 'color',
	'transport' => 'postMessage',
	'default'  => '#b2dd4c',
	'js_vars' => array(
		array(
			'element'  => 'body .main-navigation ul li:hover > a,
			.main-navigation #menu-menu li.focus > a, 
			.main-navigation #menu-menu li.current-menu-item > a',
			'function' => 'css',
			'property' => 'color'
		),
	),
) );