<?php
/**
 *
 * Layout Hooks:
 *
 * green_ink_menu_el_wrap // Add span around menu element text
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Green Ink
 * @since 1.0.0
 *
 */


/**
 * 
 * Add span around menu element text
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_menu_el_wrap' ) ) 
{
	function green_ink_menu_el_wrap($item_output, $item, $depth, $args)
	{
		$atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
		
        $attributes = '';
        foreach ( $atts as $attr => $value )
        {
            if ( ! empty( $value ) )
            {
                 $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                 $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        /** This filter is documented in wp-includes/post-template.php */
        $title        = $item->title;
	    $item_output  = $args->before;
	    $item_output .= '<a'. $attributes .'><span>';
	    $item_output .= $args->link_before . $title . $args->link_after;

        if( in_array( 'menu-item-has-children', $item->classes) )
        {
            $item_output .= '</span><span class="menu-arrow"></span></a>';
        }
	    else
        {
            $item_output .= '</span></a>';
        }

	    $item_output .= $args->after;

	    return $item_output;
	}
	add_filter( 'walker_nav_menu_start_el', 'green_ink_menu_el_wrap', 10, 4 );
}