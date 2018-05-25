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

# Layout Preferences

Green_Ink_Kirki::add_section( 'green_ink_layout', array(
	'title'       => esc_html__( 'Layout Preferences', 'green-ink' ),
	'priority'    => 35,
	'description' => esc_html__('Layout related options', 'green-ink'),
    'capability'  => 'edit_theme_options',
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings' => 'green_ink_options[layout]',
	'label'    => esc_html__( 'Website Layout', 'green-ink' ),
	'section'  => 'green_ink_layout',
	'type'     => 'radio',
	'choices'  => array(
		'960'  => esc_html__('960px', 'green-ink'),
		'1140' => esc_html__('1140px', 'green-ink'),
		'1200' => esc_html__('1200px', 'green-ink'),
		'full' => esc_html__('Full Width', 'green-ink')
	),
	'default'   => '960',
	'priority'  => 5
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings' => 'green_ink_options[sidebar_width]',
	'label'    => 'Sidebar Width:',
	'section'  => 'green_ink_layout',
	'type'     => 'select',
	'choices'  => array(
		'one'   => esc_html__('1 Column', 'green-ink'),
		'two'   => esc_html__('2 Columns', 'green-ink'),
		'three' => esc_html__('3 Columns', 'green-ink'),
		'four'  => esc_html__('4 Columns', 'green-ink'),
		'five'  => esc_html__('5 Columns', 'green-ink'),
		'six'   => esc_html__('6 Columns', 'green-ink'),
		'seven' => esc_html__('7 Columns', 'green-ink'),
		'eight' => esc_html__('8 Columns', 'green-ink')
    ),
	'default'    => 'five',
	'priority'   => 10
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings' => 'green_ink_options[content_width]',
	'label'    => esc_html__('Content Width:', 'green-ink'),
	'section'  => 'green_ink_layout',
	'type'     => 'select',
	'choices'  => array(
		'one'      => esc_html__('1 Column', 'green-ink'),
		'two'      => esc_html__('2 Columns', 'green-ink'),
		'three'    => esc_html__('3 Columns', 'green-ink'),
		'four'     => esc_html__('4 Columns', 'green-ink'),
		'five'     => esc_html__('5 Columns', 'green-ink'),
		'six'      => esc_html__('6 Columns', 'green-ink'),
		'seven'    => esc_html__('7 Columns', 'green-ink'),
		'eight'    => esc_html__('8 Columns', 'green-ink'),
		'nine'     => esc_html__('9 Columns', 'green-ink'),
		'ten'      => esc_html__('10 Columns', 'green-ink'),
		'eleven'   => esc_html__('11 Columns', 'green-ink'),
		'twelve'   => esc_html__('12 Columns', 'green-ink'),
		'thirteen' => esc_html__('13 Columns', 'green-ink')
    ),
	'default'    => 'eleven',
	'priority'    => 15
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings' => 'green_ink_options[sidebar_position]',
	'label'    => esc_html__('Sidebar Position:', 'green-ink'),
	'section'  => 'green_ink_layout',
	'type'     => 'select',
	'choices'  => array(
		'left'  => esc_html__('Left', 'green-ink'),
		'right' => esc_html__('Right', 'green-ink')
    ),
	'default'    => 'right',
	'priority'   => 20
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings'    => 'green_ink_options[post_layout]',
    'label'       => esc_html__( 'Post Layout', 'green-ink' ),
	'description' => esc_html__('Set the post layout - choose to display small featured image, or full size featured image.', 'green-ink'),
	'section'     => 'green_ink_layout',
	'type'        => 'radio-image',
	'choices'     => array(
        'layout-1' => get_template_directory_uri().'/assets/images/layout-1.jpg',
        'layout-2' => get_template_directory_uri().'/assets/images/layout-2.jpg'
    ),
	'default'    => 'layout-2',
	'priority'   => 25
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings'    => 'green_ink_options[bg_thumb]',
	'label'       => esc_html__('Use Featured Image as Title Background:', 'green-ink' ),
	'description' => esc_html__('You can use featured image of posts to be displayed as title background image, just like for pages.', 'green-ink'),
	'section'     => 'green_ink_layout',
	'type'        => 'select',
	'choices'     => array(
		'yes'     => esc_html__('Yes', 'green-ink' ),
		'no'      => esc_html__('No', 'green-ink' )
    ),
	'default'    => 'no',
	'priority'   => 30
) );

Green_Ink_Kirki::add_field( 'green_ink', array(
	'settings' => 'green_ink_options[crop_thumb]',
	'label'    => 'Crop Blog List Thumbnails:',
	'description' => esc_html__('After you change this setting install regenerate thumbnails plugin to re-crop the existing thumbnail to match applied size.', 'green-ink'),
	'section'  => 'green_ink_layout',
	'type'     => 'select',
	'choices'  => array(
		'yes'  => esc_html__('Hard Crop', 'green-ink' ),
		'no'   => esc_html__('Soft Crop', 'green-ink' ),
		'full' => esc_html__('Do Not Crop', 'green-ink' )
    ),
	'default'    => 'no',
	'priority'    => 35
) );