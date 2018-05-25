<?php
/**
 * Layout Hooks:
 *
 * green_ink_content_wrap // Opening content wrapper
 * green_ink_content_wrap_close // Closing content wrapper
 * green_ink_inner_wrapper_close // close wrapper inner
 * green_ink_content_width // Set content width
 * green_ink_display_thumbnail // Featured image size
 * green_ink_body_class_filter // Body classes
 * green_ink_post_class_filter // Post Classes
 * green_ink_post_layout // Apply post layout featured image
 * green_ink_custom_pagenav // Custom post navigation markup
 * green_ink_blog_navigation // Blog navigation
 * green_ink_deregister_styles // deregister pagenavi default styles
 * remove_more_jump_link // remove read more jump
 * green_ink_remove_wpautop // remove wpautop
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Green Ink
 * @since 1.0.0
 *
 */


/*-----------------------------------------------------------------------------------*/
// Content Wrap Markup - green_ink_content_wrap()
// Be sure to add the excess of 16 to green_ink_before_sidebar() as well
/*-----------------------------------------------------------------------------------*/


if ( !function_exists( 'green_ink_content_wrap' ) )  
{

	function green_ink_content_wrap() 
	{

		$columns = '';
		$columns = apply_filters('green_ink_set_colwidth', $columns, 1);

		echo '<div class="wrapper-inner clearfix">';
		echo '<div id="content" class="' . esc_attr($columns) . ' columns">';

	}
	add_action( 'green_ink_before_content', 'green_ink_content_wrap', 1 );

}


/*-----------------------------------------------------------------------------------*/
// After Content Wrap Markup - green_ink_content_wrap_close()
/*-----------------------------------------------------------------------------------*/


if (! function_exists('green_ink_content_wrap_close'))  
{

    function green_ink_content_wrap_close() 
    {
    	echo "\t\t</div><!-- /.columns (#content) -->\n";
    }
    add_action( 'green_ink_after_content', 'green_ink_content_wrap_close', 1 );

}

/*-----------------------------------------------------------------------------------*/
// Close wrap inner container - green_ink_inner_wrapper_close()
/*-----------------------------------------------------------------------------------*/


if (! function_exists('green_ink_inner_wrapper_close'))  
{

    function green_ink_inner_wrapper_close() 
    {
    	echo "\t\t</div><!-- /.wrapper-inner -->\n";
		echo '<a id="top"></a>';
    }
    add_action( 'green_ink_footer', 'green_ink_inner_wrapper_close', 9 );

}


/**
 * -----------------------------------------------------------------------------
 * Filterable utility function to set the content width - green_ink_content_width()
 * Specifies the column classes via conditional statements
 * See http://codex.wordpress.org/Conditional_Tags for a full list
 *
 * @return string
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_content_width' ) ) 
{
	function green_ink_content_width() 
	{
		global $post;
		$columns = green_ink_options('content_width', 'eleven'); 

		// Single Posts.
		if ( is_single() ) {
			$post_type = get_post_type();
			$post_wide = get_post_meta($post->ID, "sidebars", $single = true) ==  "false";

			// make sure no Post widgets are active
			if ( ! is_active_sidebar('sidebar-1') || $post_wide || 'wpf-portfolio' === $post_type ) {
				$columns = 'sixteen';
			}

			// wide attachement pages.
			if ( is_attachment() ) {
				$columns = 'sixteen';
			}

		// Single Pages.
		} elseif ( is_page() ) {
			$page_sidebar = is_page_template( array( 'templates/page-sidebar.php', 'templates/dynamic.php' ) ); 

			// make sure no Page widgets are active.
			if ( ! $page_sidebar ) {
				$columns = 'sixteen';
			}
		}

		return $columns;

	}
	// Create filter
	add_filter('green_ink_set_colwidth', 'green_ink_content_width', 10, 1);

}


/**
 * -----------------------------------------------------------------------------
 * Featured Images
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_display_thumbnail' ) ) {

	function green_ink_display_thumbnail() {
		$thumbnail = green_ink_get_thumbnail();
		echo wp_kses($thumbnail, array(
			'img' => array(
				'src'   => true,
				'class' => true,
				'alt'   => true
			)
		));
	}

	add_action('green_ink_post_thumbnail','green_ink_display_thumbnail');

}




/**
 * -----------------------------------------------------------------------------------
 * Filters the WordPress body class with a better set of classes
 *
 * @param  array        $classes
 * @param  string|array $class
 * @return array
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_body_class_filter' ) ) 
{
	function green_ink_body_class_filter( $classes, $class ) {

		$classes[] = 'pf-body';

		// Text direction.
		$classes[] = is_rtl() ? 'rtl' : 'ltr';

		// Check if the current theme is a parent or child theme.
		$classes[] = is_child_theme() ? 'child-theme' : 'parent-theme';

		// Layout
		$classes[] = 'layout-'.green_ink_options('layout', '960');

		if( is_home() || is_page_template('templates/dynamic.php') || is_author() || is_archive() || is_tag() ) {
			$classes[] = 'blog';
		}

		// Multisite check adds the 'multisite' class and the blog ID.
		if ( is_multisite() ) {
			$classes[] = 'multisite';
			$classes[] = 'blog-' . get_current_blog_id();
		}

		// Is the current user logged in.
		$classes[] = is_user_logged_in() ? 'logged-in' : 'logged-out';

		// Use the '.custom-background' class to integrate with the WP background feature.
		if ( get_background_image() || get_background_color() )
			$classes[] = 'custom-background';

		// Add the '.custom-header' class if the user is using a custom header.
		if ( get_header_image() || ( display_header_text() && get_header_textcolor() ) )
			$classes[] = 'custom-header';

		// Add the '.display-header-text' class if the user chose to display it.
		if ( display_header_text() )
			$classes[] = 'display-header-text';

		// Preloader.
		$preloader = green_ink_options('preloader');
		if( 'show' === $preloader || '' == $preloader )
			$classes[] = 'has-preloader';

		// Singular post (post_type) classes.
		if ( is_singular() ) {

			// Get the queried post object.
			$post = get_queried_object();

			// Post format.
			if ( current_theme_supports( 'post-formats' ) && post_type_supports( $post->post_type, 'post-formats' ) ) {
				$post_format = get_post_format( get_queried_object_id() );
				$classes[] = $post_format || is_wp_error( $post_format ) ? "{$post->post_type}-format-standard" : "{$post->post_type}-format-{$post_format}";
			}

			// Attachment mime types.
			if ( is_attachment() ) {
				foreach ( explode( '/', get_post_mime_type() ) as $type )
					$classes[] = "attachment-{$type}";
			}
		}

		// Add full width class if full width.
		// page is used.
		if( is_page_template('templates/page-full.php') ) $classes[] = 'full-width-template';

		// Add parent theme version.
		$theme = wp_get_theme();
		if(is_child_theme()) 
		{
			$parent  = $theme->parent();
			$version = $parent['Version'];
		} 
		else 
		{
			$version = $theme['Version'];
		}

		$classes[] = str_replace(' ', '-', $theme).'-'.$version;


		// Paged views.
		if ( is_paged() ) {
			$classes[] = 'paged';
			$classes[] = 'paged-' . intval( get_query_var( 'paged' ) );
		}

		// Singular post paged views using <!-- nextpage -->.
		elseif ( is_singular() && 1 < get_query_var( 'page' ) ) {
			$classes[] = 'paged';
			$classes[] = 'paged-' . intval( get_query_var( 'page' ) );
		}

		// Input class.
		if ( $class ) {
			$class   = is_array( $class ) ? $class : preg_split( '#\s+#', $class );
			$classes = array_merge( $classes, $class );
		}

		return array_map( 'esc_attr', $classes );
	}

	add_filter( 'body_class', 'green_ink_body_class_filter', 0, 2 );
}


/**
 * -----------------------------------------------------------------------------
 * Filters the WordPress post class with additional classes
 *
 * @param  array        $classes
 * @param  string|array $class
 * @param  int          $post_id
 * @return array
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_post_class_filter' ) ) 
{
	function green_ink_post_class_filter( $classes, $class, $post_id ) {

		if ( is_admin() )
			return $classes;

		$_classes    = array();
		$post        = get_post( $post_id );
		$post_type   = get_post_type();

		if ( post_type_supports( $post_type, 'post-formats' ) )
			$remove[] = 'post_format-post-format-' . get_post_format();

		// Post layout
		$_classes[] = green_ink_options('post_layout', 'layout-1');

		// Check for dynamic post on dynamic page template
		if( $post_type !== 'post' ) {
			$_classes[] = 'dynamic-post';
		}

		// Author class.
		$_classes[] = 'author-' . sanitize_html_class( get_the_author_meta( 'user_nicename' ), get_the_author_meta( 'ID' ) );

		// Password-protected posts.
		if ( post_password_required() )
			$_classes[] = 'protected';

		// Has excerpt.
		if ( post_type_supports( $post_type, 'excerpt' ) && has_excerpt() )
			$_classes[] = 'has-excerpt';

		// Has <!--more--> link.
		if ( ! is_singular() && false !== strpos( $post->post_content, '<!--more' ) )
			$_classes[] = 'has-more-link';

		// Has <!--nextpage--> links.
		if ( false !== strpos( $post->post_content, '<!--nextpage' ) )
			$_classes[] = 'has-pages';

		return array_map( 'esc_attr', array_unique( array_merge( $_classes, $classes ) ) );
	}

	add_filter( 'post_class', 'green_ink_post_class_filter', 0, 3 );
}


/**
 * -----------------------------------------------------------------------------
 * Post layout - apply image size depending from layout selected
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_post_layout' ) ) 
{
	function green_ink_post_layout($image_size) {
		$crop = green_ink_options('crop_thumb', 'no');

		if( ! is_page() && ! is_home() )
		{
			$layout = green_ink_options('post_layout', 'layout-1');
			$image_size = 'full';
			if( 'layout-2' == $layout ) $image_size = 'post-thumbnail';
		}
		
		if( ( is_home() || is_page_template('templates/dynamic.php') ) && 'full' == $crop )
		{
			$image_size = 'full';
		}

		return $image_size;
	}
	add_filter('green_ink_thumbnail_size','green_ink_post_layout');
}



/**
 * -----------------------------------------------------------------------------
 * Custom Page Navigation
 *
 * @since  1.0.0
 */
if ( ! function_exists( 'green_ink_custom_pagenav' ) )
{

	function green_ink_custom_pagenav($args = array()) {

		echo '<div id="nav-below" class="navigation">';
			if ( function_exists( 'wp_pagenavi' ) ) {

				if (is_page() && !is_page_template('templates/dynamic.php')) {
					wp_pagenavi( array( 'type' => 'multipart' ) );
				}  elseif (is_single() && 'wpf-portfolio' == get_post_type() ) {
					previous_post_link( '<div class="nav-prev">%link</div>', esc_html__( 'Previous Portfolio', 'green-ink' ) );
					next_post_link( '<div class="nav-next">%link</div>', esc_html__( 'Next Portfolio', 'green-ink' ) );
				} elseif (is_single()) {
					previous_post_link( '<div class="nav-prev">%link</div>', esc_html__( 'Previous Post', 'green-ink' ) );
					next_post_link( '<div class="nav-next">%link</div>', esc_html__( 'Next Post', 'green-ink' ) );
				} else {
					wp_pagenavi($args);
				}

			} else {

				if (is_page()) {
					wp_link_pages( array( 'before' => '<div class="page-link">' . esc_html__( 'Pages:', 'green-ink' ), 'after' => '</div>' ) );
				} elseif (is_single() && 'wpf-portfolio' == get_post_type() ) {
					previous_post_link( '<div class="nav-prev">%link</div>', esc_html__( 'Previous Portfolio', 'green-ink' ) );
					next_post_link( '<div class="nav-next">%link</div>', esc_html__( 'Next Portfolio', 'green-ink' ) );
				} elseif (is_single()) {
					previous_post_link( '<div class="nav-prev">%link</div>', esc_html__( 'Previous Post', 'green-ink' ) );
					next_post_link( '<div class="nav-next">%link</div>', esc_html__( 'Next Post', 'green-ink' ) );
				} else {
					if( isset($args['query']) ) {
						$query = $args['query'];
						next_posts_link( sprintf( '<div class="nav-next">%s</div>', esc_html__( 'Older posts', 'green-ink' ) ), $query->max_num_pages );
					} else {
						next_posts_link( sprintf( '<div class="nav-next">%s</div>', esc_html__( 'Older posts', 'green-ink' ) ) );
					}
					previous_posts_link( sprintf( '<div class="nav-prev">%s</div>', esc_html__( 'Newer posts', 'green-ink' ) ) );
				}
			}
		echo '</div><!-- #nav-below -->';
	}

	add_action('green_ink_page_navi','green_ink_custom_pagenav');

}

if ( !function_exists( 'green_ink_blog_navigation' ) )
{
	function green_ink_blog_navigation()
	{
		/* Display navigation to next/previous pages when applicable */
		global $wp_query;
		$query = $wp_query;
		$args = array();

		$is_dynamic = is_page_template('templates/dynamic.php');

		if( isset($GLOBALS['green_ink_query']) ) {
			global $green_ink_query;
			$query = $green_ink_query;

			$args['type'] = $query->query['post_type'];
			$args['query'] = $query;
		}

		if ( ( $query->max_num_pages > 1 && $is_dynamic ) || ( $query->max_num_pages > 1 && !green_ink_is_wc_template() ) ) {
			do_action('green_ink_page_navi', $args);
		}
	}
}
add_action('green_ink_footer', 'green_ink_blog_navigation', 10);

/**
 * -----------------------------------------------------------------------------
 * Remove WP Pagenavi Styles
 * Theme Includes Native Supportters the WordPress post class with additional classes
 *
 * @since  1.0.0
 */
function green_ink_deregister_styles() 
{
	wp_deregister_style( 'wp-pagenavi' );
}

add_action( 'wp_print_styles', 'green_ink_deregister_styles', 100 );


/**
 * -----------------------------------------------------------------------------
 * Removes the page jump when read more is clicked through
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_remove_more_jump_link' ) )
{

	function green_ink_remove_more_jump_link($link)
	{
		$offset = strpos($link, '#more-');

		if ($offset) {
			$end = strpos($link, '"',$offset);
		}

		if ($end) {
			$link = substr_replace($link, '', $offset, $end-$offset);
		}

		return $link;
	}
	add_filter('the_content_more_link', 'green_ink_remove_more_jump_link');

}


/*-----------------------------------------------------------------------------------*/
/* Override default embeddable content width
/*-----------------------------------------------------------------------------------*/

if (!function_exists('green_ink_content_width'))  
{
	function green_ink_content_width() 
	{
		$content_width = 580;
	}
}