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

# Slider

Green_Ink_Kirki::add_section( 'green_ink_slider', array(
	'title'       => __( 'Slider', 'green-ink' ),
	'priority'    => 22,
	'description' => esc_html__('Add slider shortcode here', 'green-ink'),
    'capability'     => 'edit_theme_options',
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings' => 'green_ink_options[slider]',
	'label'    => esc_html__( 'Slider Shortcode', 'green-ink' ),
	'section'  => 'green_ink_slider',
	'type'     => 'text',
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings' => 'green_ink_options[slider_place]',
	'label'    => esc_html__( 'Show Slider on:', 'green-ink' ),
	'section'  => 'green_ink_slider',
	'type'     => 'radio-buttonset',
	'choices'  => array(
		'home'  => esc_html__('Homepage', 'green-ink'),
		'all'   => esc_html__('All pages', 'green-ink'),
	),
	'default'  => 'home'
) );