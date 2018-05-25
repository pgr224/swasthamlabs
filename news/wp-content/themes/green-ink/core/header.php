<?php
/**
 * Layout Hooks:
 *
 * green_ink_wp_title // Handles the document title
 * green_ink_header_open // Opening header tag
 * green_ink_header_classes // Header Classes
 * green_ink_logo // Header logo
 * green_ink_main_menu // Navigation hook
 * green_ink_main_slider // Add main slider shortcode
 * green_ink_header_inner_close // Close inner cheader container
 * green_ink_header_title // Single post/page title
 * green_ink_header_close // Header closing tag
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Green Ink
 * @since 1.0.0
 *
 */

/*-----------------------------------------------------------------------------------*/
/* Filters wp_title to print a proper <title> tag based on content
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'green_ink_wp_title' ) ) {
	function green_ink_wp_title( $title ) {
		global $page, $paged;

		if ( is_feed() )
			return $title;

		$separator = '-';

		$site_description = get_bloginfo( 'description', 'display' );

		if ( is_front_page() ) {
			$title = get_bloginfo( 'name' ) . $separator . ' ' . get_bloginfo( 'description' );

		} elseif ( is_singular() || is_home() ) {
			$title = single_post_title('', false);

		} elseif ( is_category() ) {
			$title = single_cat_title('', false);

		} elseif ( is_tag() ) {
			$title = single_tag_title('', false);

		} elseif ( is_tax() ) {
			$title = single_term_title('', false);

		} elseif ( is_post_type_archive() ) {
			$title = post_type_archive_title('', false);

		} elseif ( is_author() ) {
			$title = green_ink_single_author_title();

		} elseif ( get_query_var( 'minute' ) && get_query_var( 'hour' ) ) {
			$title = green_ink_get_single_minute_hour_title();

		} elseif ( get_query_var( 'minute' ) ) {
			$title = green_ink_get_single_minute_title();

		} elseif ( get_query_var( 'hour' ) ) {
			$title = green_ink_get_single_hour_title();

		} elseif ( is_day() ) {
			$title = green_ink_get_single_day_title();

		} elseif ( get_query_var( 'w' ) ) {
			$title = green_ink_get_single_week_title();

		} elseif ( is_month() ) {
			$title = single_month_title( ' ', false );

		} elseif ( is_year() ) {
			$title = green_ink_get_single_year_title();

		} elseif ( is_archive() ) {
			$title = green_ink_get_single_archive_title();

		} elseif ( is_search() ) {
			$title = green_ink_get_search_title();

		} elseif ( is_404() ) {
			$title = green_ink_get_404_title();
		} //Endif();

		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $separator $site_description";
		}

		// If the current page is a paged page.
		if ( ( $page === get_query_var( 'paged' ) || $page === get_query_var( 'page' ) ) && $page > 1 ) {
			// Translators: 1 is the page title. 2 is the page number.
			$title = sprintf( __( '%1$s Page %2$s', 'green-ink' ), $title . $separator, number_format_i18n( absint( $page ) ) );
		}

		// Trim separator + space from beginning and end.
		$title = trim( strip_tags( $title ), "{$separator} " );

		return apply_filters( 'green_ink_child_wp_title', $title );
	}
}
add_filter( 'pre_get_document_title', 'green_ink_wp_title', 10, 1 );


/*-----------------------------------------------------------------------------------*/
// Preloader
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'green_ink_preloader' ) ) 
{

	function green_ink_preloader() 
	{
		$preloader = green_ink_options('preloader');
		$html = ''; 
		if( 'show' === $preloader || '' === $preloader ) {
			$html = '<div class="pf-gi-preloader-container">
					<div class="pf-gi-load-container">
						<ul class="cssload-flex-container">
							<li>
								<span class="cssload-loading cssload-one"></span>
								<span class="cssload-loading cssload-two"></span>
								<span class="cssload-loading-center"></span>
							</li>
						</ul>
					</div></div>';
		}

		$html = apply_filters('green_ink_preloader_output', $html);

		echo wp_kses($html, array(
			'div' => array(
				'id'     => true,
				'class'  => true
			),
			'span'  => array(
				'class'
			),
			'ul'  => true,
			'li'  => true
		));
	}
	add_action('green_ink_header', 'green_ink_preloader', 0 );
}



/*-----------------------------------------------------------------------------------*/
// Opening #header
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'green_ink_header_open' ) ) 
{

	function green_ink_header_open() 
	{
		$classes = array('sixteen', 'columns');
		$classes = apply_filters( 'green_ink_header_class', $classes );
		$classes = join( ' ', $classes );

		echo "<div id=\"wrap\" class=\"container\">";
	  	echo "<div id=\"header\" class=\"".esc_attr($classes)."\">\n<div class=\"inner\">\n";
	}
	add_action('green_ink_header','green_ink_header_open', 10);

}


/*-----------------------------------------------------------------------------------*/
// Header classes
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'green_ink_header_classes' ) )
{
	function green_ink_header_classes($classes)
	{
		$position = green_ink_options('header_pos');

		if( '' == $position ) {
			$position = 'standard';
		}

		$classes[] = esc_attr($position);

		return $classes;
	}
	add_filter('green_ink_header_class', 'green_ink_header_classes' );
}



/*-----------------------------------------------------------------------------------*/
/* Header Logo
/*-----------------------------------------------------------------------------------*/


if ( !function_exists( 'green_ink_logo' ) ) 
{

	function green_ink_logo()
	{
		/*
		 * Output the modified logo markup
		 *
		 * We have already made the conditional check
		 * in filter if logo is present, and if not
		 * the site tag line is displayed, so there is
		 * no need to make an additional check before calling
		 * the custom logo function
		 */
		$logo = get_custom_logo();

		echo wp_kses( $logo, array(
			'div'  => array(
				'class' => true
			),
			'a' => array(
				'id'       => true,
				'class'    => true,
				'href'     => true,
				'title'    => true,
				'rel'      => true,
				'style'    => true,
				'itemprop' => true
			),
			'img'  => array(
				'src'      => true,
				'itemprop' => true,
				'width'    => true,
				'height'   => true
			),
			'span' => array(
				'class' => true
			)
		) );
	}
	add_action('green_ink_header','green_ink_logo', 20);

}


/*-----------------------------------------------------------------------------------*/
/* Navigation Hook (green_ink_main_menu)
/*-----------------------------------------------------------------------------------*/


if ( !function_exists( 'green_ink_main_menu' ) ) 
{

	function green_ink_main_menu() 
	{
		# Menu parameters
		$args = array( 
			'container_class' => 'menu-header clearfix', 
			'theme_location' => 'primary'
		);

		# Navigation classes
		$nav_class = array( 'main-navigation', 'row', 'sixteen', 'columns' );
		$nav_class = apply_filters( 'green_ink_navigation_class', $nav_class );
		$nav_class = implode( ' ', $nav_class );

		# Output
		echo '<div id="navigation" class="'.esc_attr($nav_class).'">';
		green_ink_get_menu($args);
		echo '</div><!--/#navigation-->';
	}

	add_action('green_ink_header','green_ink_main_menu', 30);

}



/*-----------------------------------------------------------------------------------*/
/* Add widget to the header
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'green_ink_header_widget' ) ) 
{

	function green_ink_header_widget() 
	{
		echo "<div class='header-area'>"."\n";
		echo '<div class="header-area-inner">';
		dynamic_sidebar('sidebar-header');
	}
	add_action('green_ink_header','green_ink_header_widget', 40);

}

/*-----------------------------------------------------------------------------------*/
/* Closes the header inner markup
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'green_ink_header_inner_close' ) ) 
{

	function green_ink_header_inner_close() 
	{
		echo '<span class="nav-collapse">
			   <b></b>
			   <b></b>
			   <b></b>
		</span>' . "\n";
		echo "</div>"."\n";
		echo "</div>"."\n";
		echo "</div>"."\n";
	}
	add_action('green_ink_header','green_ink_header_inner_close', 50);

}

/*-----------------------------------------------------------------------------------*/
// Append slider to the header
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'green_ink_main_slider' ) ) 
{

	function green_ink_main_slider() 
	{
		$shortcode = green_ink_options('slider');
		$show = green_ink_options('slider_place', 'home');

		if( 'home' == $show && ( !is_home() && !is_front_page() ) ) {
			$shortcode = '';
		}

		if( '' !== $shortcode && strstr( $shortcode, '[' ) ) {
			echo do_shortcode($shortcode);
		}

	}
	add_action('green_ink_header','green_ink_main_slider', 60);

}


/*-----------------------------------------------------------------------------------*/
/* Adds single title 
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'green_ink_header_title' ) ) 
{
	function green_ink_header_title()
	{
		if( !is_page_template('templates/page-full.php') )
			green_ink_get_part('title');
	}
	add_action('green_ink_header','green_ink_header_title', 70);
}

/*-----------------------------------------------------------------------------------*/
/* Closes the #header markup
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'green_ink_header_close' ) ) 
{

	function green_ink_header_close() 
	{
		echo "</div>"."\n";
		echo '<div class="clear"></div>'."\n";
		echo "<!--/#header-->"."\n";
	}
	add_action('green_ink_header','green_ink_header_close', 80);

}