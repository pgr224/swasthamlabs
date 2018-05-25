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
$path = dirname(__FILE__).'/sections/**/options.php';

foreach( glob($path) as $file )
{
	load_template( $file );
}

# Check if there are additional options to add
green_ink_additional_options_hook();