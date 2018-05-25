<?php
/**
 * Layout Hooks:
 *
 * green_ink_footer // Create the footer action
 * green_ink_before_footer // footer opening tag
 * green_ink_footer_widgets // get footer sidebar
 * green_ink_footer_nav // Footer navigation
 * green_ink_footer_credits // Footer credits text
 * green_ink_after_footer // Footer closing tags
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Green Ink
 * @since 1.0.0
 *
 */


/*-----------------------------------------------------------------------------------*/
// Global hook for footer actions
/*-----------------------------------------------------------------------------------*/

function green_ink_footer() {
	do_action('green_ink_footer');
}
add_action('wp_footer', 'green_ink_footer',1);


/*-----------------------------------------------------------------------------------*/
/* Before Footer
/*-----------------------------------------------------------------------------------*/

if (!function_exists('green_ink_before_footer'))  {
    function green_ink_before_footer() {
			$footerwidgets = is_active_sidebar('footer-widget-area-1') + is_active_sidebar('footer-widget-area-2') + is_active_sidebar('footer-widget-area-3') + is_active_sidebar('footer-widget-area-4');
			$class = ($footerwidgets == '0' ? 'noborder' : 'normal');

			echo '<div class="clear"></div>';
			echo '<div id="footer" class="'.esc_attr($class).' sixteen columns">';
    }
    add_action('green_ink_footer', 'green_ink_before_footer',11);
}


/*-----------------------------------------------------------------------------------*/
// Footer Widgets
/*-----------------------------------------------------------------------------------*/

if (! function_exists('green_ink_footer_widgets'))  {
	function green_ink_footer_widgets() {
		green_ink_get_sidebar( 'footer' );
	}
	add_action('green_ink_footer', 'green_ink_footer_widgets',20);
}


/*-----------------------------------------------------------------------------------*/
// Footer Navigation
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'green_ink_footer_nav' ) ) {

	function green_ink_footer_nav() {

		$defaults = array(
			'theme_location' => 'footer',
			'container'      => 'div',
			'container_id'   => 'footermenu',
			'menu_class'     => 'menu',
			'echo'           => true,
			'fallback_cb'    => false,
			'after'          => '<span> | </span>',
			'depth'          => 1);

		wp_nav_menu($defaults);

		echo '<div class="clear"></div>'; 

	}
	add_action('green_ink_footer', 'green_ink_footer_nav',30);
}


/*-----------------------------------------------------------------------------------*/
/* Footer Credits
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'green_ink_footer_credits' ) ) 
{
	function green_ink_footer_credits() 
	{
		$default = sprintf('%1$s <a href="%2$s" title="%3$s">%4$s</a>',
				esc_html__('Lovely WordPress Theme developed by', 'green-ink'),
				esc_url('http://www.pressfore.com'),
				esc_attr__('Pressfore WordPress Themes', 'green-ink'),
				esc_html__('Pressfore','green-ink')
		);
		$footer_extras = '' != green_ink_options('footer_extras', $default) ? green_ink_options('footer_extras', $default) : $default;
 
		$extras  = '<div id="credits">';
		$extras .= wp_kses($footer_extras, array(
			'span'  => array(
				'class' => true
			),
			'a'   => array(
				'class' => true,
				'href'  => true,
				'title'	=> true
			),
			'i'      => true,
			'strong' => true
		));
		$extras .= "</div>";

		$extras = apply_filters( 'green_ink_author_credits', $extras );

		echo wp_kses($extras, array(
			'div'   => array(
				'id'  => true,
				'class' => true
			),
			'span'  => array(
					'class' => true
			),
			'a'   => array(
					'class' => true,
					'href'  => true,
					'title'	=> true
			),
			'i'      => true,
			'strong' => true
		) );
	}
	add_action('green_ink_footer', 'green_ink_footer_credits',40);
}


/*-----------------------------------------------------------------------------------*/
/* After Footer
/*-----------------------------------------------------------------------------------*/

if (!function_exists('green_ink_after_footer'))  {

    function green_ink_after_footer() {
			echo "</div><!--/#footer-->"."\n";
			echo "</div><!--/#wrap.container-->"."\n";
    }
	add_action('green_ink_footer', 'green_ink_after_footer',50);
}
