<?php
/**
 *
 * Layout Hooks:
 *
 * green_ink_link_content // Modify link post format
 * green_ink_quote_content // Modify quote post format
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Green Ink
 * @since 1.0.0
 *
 */


/*-----------------------------------------------------------------------------------*/
/* Post Format compatibility
/*-----------------------------------------------------------------------------------*/

/* === Links === */
function green_ink_link_content( $content ) 
{

	if ( has_post_format( 'link' ) && ! post_password_required() && ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', $content ) ) {
		$content = make_clickable($content);
	}

	return $content;
}

if ( current_theme_supports( 'post-formats', 'link' ) ) {
	add_filter('the_content', 'green_ink_link_content', 9);
}


/* === Quotes === */
function green_ink_quote_content( $content ) 
{

	if ( has_post_format( 'quote' ) && ! post_password_required() ) {
		preg_match( '/<blockquote.*?>/', $content, $matches );

		if ( empty( $matches ) ) {
			$content = "<blockquote>{$content}</blockquote>";
		}
	}

	return $content;
}

if ( current_theme_supports( 'post-formats', 'quote' ) ) {
	add_filter('the_content', 'green_ink_quote_content');
}
