<?php
/**
 * General.
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Heading definition.
 */
$options[] = array( "name" => _x('Contact Form Appearance', 'theme-options', 'the7mk2'), "type" => "heading" );


	/**
	 * Contact form.
	 */
	$options[] = array(	"name" => _x('Contact form', 'theme-options', 'the7mk2'), "type" => "block_begin" );

		// text
		$options[] = array(
			"desc"		=> '',
			"name"		=> _x( ' Input height (in "px")', 'theme-options', 'the7mk2' ),
			"id"		=> "input_height",
			"std"		=> '38px', 
			"type"		=> "text",
			"sanitize"	=> 'dimensions'
		);
		// input
		$options[] = array(
			"name"		=> _x( 'Input border radius (px)', 'theme-options', 'the7mk2' ),
			"id"		=> 'input_border_radius',
			"std"		=> '0',
			"type"		=> 'text',
			"sanitize"	=> 'dimensions'
		);
		$options[] = array(
			"name"	=> _x( 'Input font color', 'theme-options', 'the7mk2' ),
			"id"	=> "input_color",
			"std"	=> "#787d85",
			"type"	=> "color",
		);
		$options[] = array(
			"name"	=> _x( 'Border color', 'theme-options', 'the7mk2' ),
			"id"	=> "input_border_color",
			"std"	=> "#adb0b6",
			"type"	=> "color",
		);
		// slider
		$options[] = array(
			"name"      => _x( 'Border opacity', 'theme-options', 'the7mk2' ),
			"id"        => "input_border_opacity",
			"std"       => 30, 
			"type"      => "slider"
		);
		// colorpicker
		$options[] = array(
			"name"	=> _x( 'Background color', 'theme-options', 'the7mk2' ),
			"id"	=> "input_bg_color",
			"std"	=> "#fcfcfc",
			"type"	=> "color"
		);
		// slider
		$options[] = array(
			"name"      => _x( 'Background opacity', 'theme-options', 'the7mk2' ),
			"id"        => "input_bg_opacity",
			"std"       => 100, 
			"type"      => "slider"
		);


	$options[] = array(	"type" => "block_end");

	

