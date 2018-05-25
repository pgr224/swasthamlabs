<?php
/**
 * Layout Hooks:
 *
 * green_ink_title_meta // Modify title meta display
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Green Ink
 * @since 1.0.0
 *
 */


/*-----------------------------------------------------------------------------------*/
/* Modify Title meta dispay - posted on, by author, etc.
/*-----------------------------------------------------------------------------------*/

if (!function_exists('green_ink_title_meta'))  
{
    function green_ink_title_meta() 
    {
    	$post_type = get_post_type();
    	$hide_title = apply_filters( 'green_ink_hide_title_post_types', array( 'wpf-portfolio' ) );
    	
		if( is_page() || in_array( $post_type, $hide_title ) ) {
			return false;
		}

		return true;
    }
    add_filter('green_ink_title_meta', 'green_ink_title_meta', 1);
}

