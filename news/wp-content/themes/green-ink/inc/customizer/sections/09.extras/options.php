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

# Extras

Green_Ink_Kirki::add_section( 'green_ink_extras', array(
	'title'       => esc_html__( 'Extras', 'green-ink' ),
	'priority'    => 50,
	'description' => esc_html__('Use the fields below to add some simple text (such as a phone number or copyright) to the header and footer areas.', 'green-ink' ),
    'capability'  => 'edit_theme_options',
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings' => 'green_ink_options[footer_extras]',
	'label'    => esc_html__('Footer Extras Text', 'green-ink'),
	'section'  => 'green_ink_extras',
	'type'     => 'textarea',
	'default'  => sprintf(
		'%s <a href="%s" title="%s">%s</a>',
		esc_html__( 'Lovely WordPress Theme developed by', 'green-ink' ),
		esc_url( 'http://www.pressfore.com' ),
		esc_attr__( 'Pressfore WordPress Themes', 'green-ink' ),
		esc_html__( 'Pressfore', 'green-ink' )
	),
	'sanitize_callback' => 'wp_filter_post_kses',
	'transport' => 'postMessage',
	'js_vars' => array(
		array(
			'element'  => '#credits',
			'function' => 'html'
		),
	),
) );