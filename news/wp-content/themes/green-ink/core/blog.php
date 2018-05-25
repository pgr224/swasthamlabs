<?php
/**
 *
 * Layout Hooks:
 *
 * green_ink_post_list_open_tag / Blog list - post opening tag
 * green_ink_post_list_left / Blog list left entry 
 * green_ink_post_list_right_open // Blog list right entry opening tag
 * green_ink_post_list_title // Blog list title
 * green_ink_post_list_meta // Blog list meta
 * green_ink_post_list_excerpt // Blog list excerpt
 * green_ink_post_list_utility // Blog list utility - tags, categories
 * green_ink_post_list_right_close // Blog list right entry closing tag
 * green_ink_excerpt_length // Handles Exerpt length
 * green_ink_continue_reading_link // Continue reading modifycation
 * green_ink_auto_excerpt_more // Replaces [...] with elipsis in excerpts
 * green_ink_custom_excerpt_more // Adds pretty "continue reading" link
 * green_ink_post_list_close_tag / BLog list - post closing tag
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
 * Blog post opening tag
 *
 * This function will add opening
 * tag for the post
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_post_list_open_tag' ) )
{
	function green_ink_post_list_open_tag()
	{
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
	}
	add_action( 'green_ink_post_list_markup', 'green_ink_post_list_open_tag', 0 );
}

/**
 * 
 * Blog post left wrapper
 *
 * This function will add wrapper
 * for the post thumbnail
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_post_list_left' ) ) 
{
	function green_ink_post_list_left()
	{
		?>
		<div class="entry-left">
		<?php
			do_action('green_ink_post_thumbnail');
		?>
		</div>
		<?php
	}
	add_action( 'green_ink_post_list_markup', 'green_ink_post_list_left', 10 );
}

/**
 * 
 * Blog post right wrap opening 
 *
 * This function will add opening tag
 * for the right wrap which holds
 * Title, meta and excerpt
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_post_list_right_open' ) ) 
{
	function green_ink_post_list_right_open()
	{
		?>
		<div class="entry-right">
		<?php
	}
	add_action( 'green_ink_post_list_markup', 'green_ink_post_list_right_open', 20 );
}

/**
 * 
 * Blog post list title 
 *
 * This function will add post title
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_post_list_title' ) ) 
{
	function green_ink_post_list_title()
	{
		?>
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php printf( '%s %s', esc_attr__( 'Permalink to ', 'green-ink' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>
		<?php
	}
	add_action( 'green_ink_post_list_markup', 'green_ink_post_list_title', 30 );
}

/**
 * 
 * Blog post list meta
 *
 * This function will add posted on and by line
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_post_list_meta' ) ) 
{
	function green_ink_post_list_meta()
	{
		if( 'page' !== get_post_type() ): ?>
		<div class="entry-meta">
			<?php green_ink_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif;
	}
	add_action( 'green_ink_post_list_markup', 'green_ink_post_list_meta', 40 );
}

/**
 * 
 * Blog post list excerpt
 *
 * This function will add post excerpt
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_post_list_excerpt' ) ) 
{
	function green_ink_post_list_excerpt()
	{
		?>
		<div class="entry-summary">
			<?php
			the_excerpt();

			?>
		</div><!-- .entry-summary -->
		<?php
	}
	add_action( 'green_ink_post_list_markup', 'green_ink_post_list_excerpt', 50 );
}

/**
 * 
 * Blog post list utility
 *
 * This function will add post excerpt
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_post_list_utility' ) ) 
{
	function green_ink_post_list_utility()
	{
		green_ink_get_part('utility');
	}
	add_action( 'green_ink_post_list_markup', 'green_ink_post_list_utility', 80 );
}


/**
 * 
 * Blog post right wrap closing tag 
 *
 * This function will add closing tag
 * for the right wrap which holds
 * Title, meta and excerpt
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_post_list_right_close' ) ) 
{
	function green_ink_post_list_right_close()
	{
		?>
		</div>
		<?php
	}
	add_action( 'green_ink_post_list_markup', 'green_ink_post_list_right_close', 90 );
}

/**
 *
 * Blog post close tag
 *
 * This function will add closing
 * tag for the post
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_post_list_close_tag' ) )
{
	function green_ink_post_list_close_tag()
	{
		?>
		</article>
		<?php
	}
	add_action( 'green_ink_post_list_markup', 'green_ink_post_list_close_tag', 100 );
}

/*-----------------------------------------------------------------------------------*/
// Returns a "Continue Reading" link for excerpts
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'green_ink_continue_reading_link' ) ) 
{

	function green_ink_continue_reading_link() 
	{
		if ( has_excerpt() && ! is_attachment() && 'post' == get_post_type() ) {
			echo sprintf('<a href="%1$s" class="more-link">%2$s</a>',
					esc_url( get_permalink() ),
					esc_html__( 'Continue reading', 'green-ink' )
			);
		}
	}
	add_action( 'green_ink_post_list_markup', 'green_ink_continue_reading_link', 60 );
}


/*-----------------------------------------------------------------------------------*/
// Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis
//
// To override this in a child theme, remove the filter and add your own
// function tied to the excerpt_more filter hook.
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'green_ink_auto_excerpt_more' ) )
{

	function green_ink_auto_excerpt_more( $more )
	{
		return ' &hellip;';
	}
	add_filter( 'excerpt_more', 'green_ink_auto_excerpt_more' );

}