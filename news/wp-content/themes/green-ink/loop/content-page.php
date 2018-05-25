<?php
/**
 * The loop that displays a page.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-page.php.
 *
 * @package green ink WordPress Theme
 * @subpackage Green Ink
 * @author Pressfore - www.pressfore.com
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="entry-content">

				<?php the_content(); ?>

				<div class="clear"></div>

				<?php edit_post_link( esc_html__( 'Edit', 'green-ink' ), '<span class="edit-link">', '</span>' ); ?>

			</div><!-- .entry-content -->

		</article><!-- #post-## -->

		<?php 
			/**
			* After single template action
			*
			*/
			do_action( 'green_ink_single_after' );
		?>	

<?php endwhile; // end of the loop. ?>