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


# Colors

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings' => 'green_ink_options[primary_color]',
	'label'    => esc_html__('Primary Brand Color', 'green-ink'),
	'section'  => 'colors',
	'type'     => 'color',
	'default'  => '#b2dd4c',
	'alpha'    => true,
	'transport' => 'postMessage',
	'js_vars' => array(
		array(
			'element'  => 'a#site-title',
			'function' => 'css',
			'property' => 'color'
		),
	),
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings' => 'green_ink_options[secondary_color]',
	'label'    => esc_html__('Secondary Brand Color', 'green-ink'),
	'section'  => 'colors',
	'type'     => 'color',
	'default'  => '',
	'alpha'    => true,
	'transport' => 'postMessage',
	'js_vars' => array(
		array(
			'element'  => 'span.site-desc',
			'function' => 'css',
			'property' => 'color'
		),
	),
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings' => 'green_ink_options[body_text_color]',
	'label'    => esc_html__('Body Text Color', 'green-ink'),
	'section'  => 'colors',
	'type'     => 'color',
	'default'  => '#747474',
	'alpha'    => true,
	'transport' => 'postMessage',
	'js_vars' => array(
		array(
			'element'  => 'body',
			'function' => 'css',
			'property' => 'color'
		),
	),
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings'  => 'green_ink_options[heading_color]',
	'label'     => esc_html__('Headings Color', 'green-ink'),
	'section'   => 'colors',
	'type'      => 'color',
	'default'   => '#333',
	'alpha'     => true,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'h1,h2,h3,h4,h5,h6',
			'function' => 'css',
			'property' => 'color'
		),
	),
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings' => 'green_ink_options[link_color]',
	'label'    => esc_html__('Link Color', 'green-ink'),
	'section'  => 'colors',
	'type'     => 'color',
	'default'  => '#b2dd4c',
	'alpha'    => true,
	'transport' => 'postMessage',
	'js_vars' => array(
		array(
			'element'  => 'a, a:visited, #sidebar a',
			'function' => 'css',
			'property' => 'color'
		),
	),
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings' => 'green_ink_options[link_hover_color]',
	'label'    => esc_html__('Link Hover Color', 'green-ink'),
	'section'  => 'colors',
	'type'     => 'color',
	'default'  => '#3376ea',
	'alpha'    => true,
	'transport' => 'postMessage',
	'js_vars' => array(
		array(
			'element'  => 'a:hover, #sidebar a:hover',
			'function' => 'css',
			'property' => 'color'
		),
	),
) );