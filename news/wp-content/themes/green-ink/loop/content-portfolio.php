<?php
/**
 * The loop that displays a single post.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package green ink WordPress Theme
 * @subpackage Green Ink
 * @author Pressfore - www.pressfore.com
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single'); ?>>

	<div class="entry-content">

	<?php do_action('green_ink_post_thumbnail'); ?>

	<?php the_content(); ?>

	<div class="clear"></div>

	<?php wp_link_pages( array( 'before' => '<div class="page-link">' . esc_html__( 'Pages:', 'green-ink' ), 'after' => '</div>' ) ); ?>

	</div><!-- .entry-content -->

	<?php green_ink_get_part('utility'); ?>

</article><!-- #post-## -->

<?php 
	/**
	* After single template action
	*
	*/
	do_action( 'green_ink_single_after' );
?>	