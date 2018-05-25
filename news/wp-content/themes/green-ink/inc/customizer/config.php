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

/**
 * green_ink_options
 * default option getter/setter
 * @param $name
 * @param $default
 */

Green_Ink_Kirki::add_config( 'green_ink', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'option',
) );

function green_ink_options($name, $default = false)
{
	$options = ( get_option( 'green_ink_options' ) ) ? get_option( 'green_ink_options' ) : null;
	// return the option if it exists
	if ( isset( $options[ $name ] ) ) {
		return apply_filters( 'green_ink_options_$name', $options[ $name ] );
	}
	// return default if nothing else
	return apply_filters( 'green_ink_options_$name', $default );
}

function green_ink_additional_options_hook()
{
	/**
	 * Hook for adding additional options
	 *
	 * @param 'green_ink_options'  our customizer options id
	 */
	$additional_options = apply_filters('green_ink_additional_options_hook', array(), 'green_ink_options');

	if( !empty( $additional_options ) ) {
		green_ink_additional_options($additional_options);
	}
}

function green_ink_additional_options($options)
{
	if( is_array( $options ) ) {

		foreach( $options as $option => $data ) {

			if( isset( $data['type'] ) ) {

				switch($data['type']) {
					case 'section':
						Green_Ink_Kirki::add_section( isset( $data['section'] ) ? $data['section'] : 'custom_section', array(
							'title'          => isset( $data['title'] ) ? $data['title'] : esc_html__( 'Title', 'green-ink' ),
							'description'    => isset( $data['description'] ) ? $data['description'] : esc_html__( 'Add custom CSS here', 'green-ink' ),
							'panel'          => isset( $data['panel'] ) ? $data['panel'] : '',
							'priority'       => isset( $data['priority'] ) ? $data['priority'] : 160,
							'capability'     => isset( $data['capability'] ) ? $data['capability'] : 'edit_theme_options',
							'theme_supports' => isset( $data['theme_supports'] ) ? $data['theme_supports'] : ''
						) );
					break;
					case 'panel':
						Green_Ink_Kirki::add_panel( isset( $data['panel'] ) ? $data['panel'] : 'panel_id', array(
							'priority'    => isset( $data['priority'] ) ? $data['priority'] : 10,
							'title'       => isset( $data['title'] ) ? $data['title'] : esc_html__( 'My Title', 'green-ink' ),
							'description' => isset( $data['description'] ) ? $data['description'] : esc_html__( 'My Description', 'green-ink' )
						) );
					break;
					default:
						Green_Ink_Kirki::add_field( 'green_ink', array(
							'settings' => isset( $data['settings'] ) ? $data['settings'] : 'my_setting',
							'label'    => isset( $data['label'] ) ? $data['label'] : '',
							'description' => isset( $data['description'] ) ? $data['description'] : '',
							'section'  => isset( $data['section'] ) ? $data['section'] : 'my_section',
							'type'     => isset( $data['type'] ) ? $data['type'] : 'text',
							'priority' => isset( $data['priority'] ) ? $data['priority'] : 10,
							'default'  => isset( $data['default'] ) ? $data['default'] : '',
							'choices'  => isset( $data['choices'] ) && is_array( $data['choices'] ) ? $data['choices'] : array(),
							'transport'=> isset( $data['transport'] ) ? $data['transport'] : '',
							'js_vars'  => isset( $data['js_vars'] ) && is_array( $data['js_vars'] ) ? $data['js_vars'] : array()
						) );
				}
			}
		}
	}
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function green_ink_customize_preview_js()
{
	wp_enqueue_script( 'green_ink_customizer', get_template_directory_uri() . '/assets/js/admin/customizer.js', array( 'jquery' ), null, true );
}

add_action( 'customize_preview_init', 'green_ink_customize_preview_js' );