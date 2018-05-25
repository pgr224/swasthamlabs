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

# Footer

Green_Ink_Kirki::add_section( 'green_ink_footer', array(
	'title'       => esc_html__( 'Footer', 'green-ink' ),
	'priority'    => 30,
	'description' => esc_html__( 'Footer Related Options', 'green-ink' ),
    'capability'  => 'edit_theme_options',
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings'   => 'green_ink_options[footer_bg_top]',
	'label'      => esc_html__( 'Footer Top Background Color', 'green-ink' ),
	'section'    => 'green_ink_footer',
	'type'       => 'color',
	'default'    => '#222',
	'alpha'      => true,
	'transport'  => 'postMessage',
	'js_vars' => array(
		array(
			'element'  => '#footer',
			'function' => 'css',
			'property' => 'background-color',
		),
	),
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings'   => 'green_ink_options[footer_bg_bottom]',
	'label'      => esc_html__( 'Footer Bottom Background Color', 'green-ink' ),
	'section'    => 'green_ink_footer',
	'type'       => 'color',
	'default'    => 'rgba(51,51,51,0.5)',
	'alpha'      => true,
	'transport'  => 'postMessage',
	'js_vars' => array(
		array(
			'element'  => '#footer #credits',
			'function' => 'css',
			'property' => 'background-color',
		),
	),
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings'   => 'green_ink_options[footer_text_color]',
	'label'      => esc_html__( 'Footer Text Color', 'green-ink' ),
	'section'    => 'green_ink_footer',
	'type'       => 'color',
	'default'    => '#e6e6e6',
	'alpha'      => true,
	'transport'  => 'postMessage',
	'js_vars' => array(
		array(
			'element'  => '#footer',
			'function' => 'css',
			'property' => 'color',
		),
	),
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings'    => 'green_ink_options[footer_btext_color]',
	'label'       => esc_html__( 'Footer Credits Text Color', 'green-ink' ),
	'section'     => 'green_ink_footer',
	'type'        => 'color',
	'default'     => '#eee',
	'alpha'       => true,
	'transport'   => 'postMessage',
	'js_vars' => array(
		array(
			'element'  => '#footer #credits',
			'function' => 'css',
			'property' => 'color',
		),
	),
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings'  => 'green_ink_options[footer_link_color]',
	'label'     => esc_html__( 'Footer Link Color', 'green-ink' ),
	'section'   => 'green_ink_footer',
	'type'      => 'color',
	'default'   => '#a7a7a7',
	'alpha'     => true,
	'transport' => 'postMessage',
	'js_vars' => array(
		array(
			'element'  => '#footer a',
			'function' => 'css',
			'property' => 'color',
		),
	),
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings'  => 'green_ink_options[footer_link_hover_color]',
	'label'     => esc_html__( 'Footer Link Hover Color', 'green-ink' ),
	'section'   => 'green_ink_footer',
	'type'      => 'color',
	'default'   => '#b2dd4c',
	'alpha'     => true,
	'transport' => 'postMessage',
	'js_vars' => array(
		array(
			'element'  => '#footer a:hover, #footer a:visited',
			'function' => 'css',
			'property' => 'color',
		),
	),
) );