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

# Preloader

Green_Ink_Kirki::add_section( 'green_ink_preloader', array(
	'title'       => esc_html__( 'Preloader', 'green-ink' ),
	'priority'    => 18,
	'description' => esc_html__( 'Set Preloader settings', 'green-ink' ),
    'capability'  => 'edit_theme_options'
) );


Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings' => 'green_ink_options[preloader]',
	'label'    => esc_html__('Display Preloader:', 'green-ink'),
	'section'  => 'green_ink_preloader',
	'type'     => 'select',
	'choices'  => array(
		'show' => esc_html__('Show', 'green-ink'),
		'hide' => esc_html__('Hide', 'green-ink')
    ),
	'default'  => 'show',
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings' => 'green_ink_options[preloader_bg]',
	'label'    => esc_html__('Preloader Background', 'green-ink'),
	'section'  => 'green_ink_preloader',
	'type'     => 'color',
	'default'  => '#fff',
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings' => 'green_ink_options[preloader_cl]',
	'label'    => esc_html__('Preloader Parts Color', 'green-ink'),
	'section'  => 'green_ink_preloader',
	'type'     => 'color',
	'output' => array(
		array(
			'element'  => '.cssload-loading:after, .cssload-loading:before, .cssload-loading-center',
			'function' => 'css',
			'property' => 'background'
		),
	),
	'default'    => 'rgb(178,221,76)',
) );