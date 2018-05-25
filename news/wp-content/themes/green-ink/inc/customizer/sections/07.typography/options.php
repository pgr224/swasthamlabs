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

# Typography

Green_Ink_Kirki::add_section( 'green_ink_fonts', array(
	'title'       => esc_html__( 'Typography', 'green-ink' ),
	'priority'    => 40,
	'description' => esc_html__('Select Website Typography', 'green-ink' ),
    'capability'  => 'edit_theme_options',
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'type'        => 'typography',
	'settings'    => 'green_ink_options[header_font]',
	'label'       => esc_html__( 'Header Font', 'green-ink' ),
	'section'     => 'green_ink_fonts',
	'default'     => array(
		'font-family'    => 'Libre Franklin',
		'variant'        => '400',
		'font-size'      => '14px',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'text-transform' => 'capitalize',
		'text-align'     => 'right'
	),
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'type'        => 'typography',
	'settings'    => 'green_ink_options[main_font]',
	'label'       => esc_html__( 'Main Font', 'green-ink' ),
	'section'     => 'green_ink_fonts',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'subsets'        => array(),
	),
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'type'        => 'typography',
	'settings'    => 'green_ink_options[heading_font]',
	'label'       => esc_html__( 'Headings Font', 'green-ink' ),
	'section'     => 'green_ink_fonts',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'subsets'        => array(),
		'text-align'     => 'left'
	),
) );