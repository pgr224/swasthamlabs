<?php
/**
 * Layout Hooks:
 *
 * green_ink_sidebar_wrap // Opening content wrapper
 * green_ink_sidebar_wrap_close // Closing content wrapper
 * green_ink_sidebar_position // Position of the sidebar left | right
 * green_ink_sidebar_width // Sidebar width, number of columns
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Green Ink
 * @since 1.0.0
 *
 */


/**
 * -----------------------------------------------------------------------------
 * Sidebar Wrap Markup - green_ink_sidebar_wrap()
 * Be sure to add the excess of 16 to green_ink_content_wrap() as well
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_sidebar_wrap' ) )  
{

	function green_ink_sidebar_wrap() 
	{

	$columns = '';
	$columns = apply_filters('green_ink_set_sidebarwidth', $columns, 1);


	echo '<div id="sidebar" class="'.esc_attr($columns).' columns" role="complementary">';

	}
	add_action( 'green_ink_before_sidebar', 'green_ink_sidebar_wrap', 1 );

}


/**
 * -----------------------------------------------------------------------------
 * After Sidebar Markup
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_sidebar_wrap_close' ) ) 
{
	function green_ink_sidebar_wrap_close() 
	{
	   echo '</div><!-- #sidebar -->';
	}
	add_action( 'green_ink_after_sidebar', 'green_ink_sidebar_wrap_close');
}



/**
 * -----------------------------------------------------------------------------
 * Sidebar Positioning Utility (sidebar-left | sidebar-right)
 * Sets a body class for source ordered sidebar positioning
 *
 * @param  array        $class 
 * @return array
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_sidebar_position' ) )
{

	function green_ink_sidebar_position($class) 
	{
		$sidebar_position = green_ink_options('sidebar_position', 'right');
		$sidebar_position = ($sidebar_position == "right" ? "right" : "left");
		$class[] = 'sidebar-'.$sidebar_position;
		return $class;
	}
	add_filter('body_class','green_ink_sidebar_position');
}


/**
 * -----------------------------------------------------------------------------
 * Filterable utility function to set the sidebar width - green_ink_sidebar_width()
 * Specifies the column classes via conditional statements
 * See http://codex.wordpress.org/Conditional_Tags for a full list
 *
 * @return string
 * @since  1.0.0
 */

if ( !function_exists( 'green_ink_sidebar_width' ) ) 
{

	function green_ink_sidebar_width() 
	{
		global $post;
		$columns = green_ink_options('sidebar_width', 'five');

		// Single Posts
		if ( is_single() ) 
		{
			// Check for custom field of sidebars => false
			$post_wide = get_post_meta($post->ID, "sidebars", $single = true) ==  "false";

			// make sure no Post widgets are active
			if ( !is_active_sidebar('sidebar-1') || $post_wide )
				$columns = false;

		// Single Pages
		} 
		elseif ( is_page() ) 
		{
			// Pages: check for custom page template
			$page_sidebar = is_page_template('templates/page-sidebar.php');

			// make sure no Page widgets are active
			if ( !is_active_sidebar('sidebar-2') || !$page_sidebar )
				$columns = false;
			
		}

		return $columns;
	}
	
	add_filter('green_ink_set_sidebarwidth', 'green_ink_sidebar_width', 10, 1);

}

/**
 * -----------------------------------------------------------------------------
 * Call sidebar based on the post type
 *
 * @return string
 * @since  1.0.0
 */

if ( !function_exists( 'green_ink_sidebar_output' ) ) 
{

	function green_ink_sidebar_output() 
	{
		if( is_page() || is_home() ) {
			dynamic_sidebar( 'sidebar-2' );
		}
		else if( is_singular() && ! green_ink_is_wc_template() ) {
			dynamic_sidebar( 'sidebar-1' );
		}
		else if( green_ink_is_wc_template() ) {
			dynamic_sidebar( 'sidebar-3' );
		}
		else {
			dynamic_sidebar( 'sidebar-1' );
		}
	}
	add_action('green_ink_sidebar', 'green_ink_sidebar_output');
}