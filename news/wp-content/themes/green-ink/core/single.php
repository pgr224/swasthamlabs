<?php
/**
 *
 * Layout Hooks:
 *
 * green_ink_single_post_thumb // Blog post thumbnail
 * green_ink_single_post_content_open // Blog post cotnent opening tag
 * green_ink_single_post_content // Blog post content
 * green_ink_single_post_content_close // Blog post content closing tag
 * green_ink_single_post_author_box // Blog post author box
 * green_ink_single_post_utility // Blog post utility - tags, categories
 * green_ink_post_navs // Post navigation
 * green_ink_comment_form // Comment form
 * green_ink_related_posts_hook // Related posts section
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
 * Blog post thumbnail
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_single_post_thumb' ) ) 
{
	function green_ink_single_post_thumb()
	{
		echo '<div class="post-thumb">';
		do_action('green_ink_post_thumbnail');
		echo '</div>';
	}
	add_action( 'green_ink_single_post_markup', 'green_ink_single_post_thumb', 2 );
}

/**
 * 
 * Blog post content opening tag
 *
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_single_post_content_open' ) ) 
{
	function green_ink_single_post_content_open()
	{
		?>
			<div class="entry-content">
		<?php
	}
	add_action( 'green_ink_single_post_markup', 'green_ink_single_post_content_open', 3 );
}


/**
 * 
 * Blog post content
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_single_post_content' ) ) 
{
	function green_ink_single_post_content()
	{
		the_content( sprintf('%1$s %2$s', esc_html__( 'Continue reading', 'green-ink' ), '<span class="meta-nav">&rarr;</span>' ) );

		echo '<div class="clear"></div>';

		wp_link_pages( array( 'before' => '<div class="page-link">' . esc_html__( 'Pages:', 'green-ink' ), 'after' => '</div>' ) );
	}
	add_action( 'green_ink_single_post_markup', 'green_ink_single_post_content', 4 );
}


/**
 * 
 * Blog post content closing tag
 *
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_single_post_content_close' ) ) 
{
	function green_ink_single_post_content_close()
	{
		?>
			</div><!-- .entry-content -->
		<?php
	}
	add_action( 'green_ink_single_post_markup', 'green_ink_single_post_content_close', 5 );
}

/**
 * 
 * Blog post author box
 *
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_single_post_author_box' ) ) 
{
	function green_ink_single_post_author_box()
	{
		// If a user has filled out their description, show a bio on their entries  
		if ( get_the_author_meta( 'description' ) )
		{
			green_ink_get_part('author-box');
		}
	}
	add_action( 'green_ink_single_post_markup', 'green_ink_single_post_author_box', 6 );
}


/**
 * 
 * Blog post utility
 *
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_single_post_utility' ) ) 
{
	function green_ink_single_post_utility()
	{
		green_ink_get_part('utility');
	}
	add_action( 'green_ink_single_post_markup', 'green_ink_single_post_utility', 8 );
}

/**
 * 
 * Post navigation
 *
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_post_navs' ) ) 
{
	function green_ink_post_navs()
	{
		if( is_singular() )
		{
			do_action('green_ink_page_navi');
		}
	}
	add_action( 'green_ink_single_after', 'green_ink_post_navs', 1 );
}


/**
 * 
 * Comment Form
 *
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_comment_form' ) ) 
{
	function green_ink_comment_form()
	{
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() )
		{
			comments_template('', true);
		}
	}
	add_action( 'green_ink_single_after', 'green_ink_comment_form', 3 );
}
