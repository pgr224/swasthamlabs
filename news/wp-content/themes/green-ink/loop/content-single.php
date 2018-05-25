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

	<?php 
		/**
		* Main hook that will add single post markup
		*
		*/
		do_action( 'green_ink_single_post_markup' );
	?>	

</article><!-- #post-## -->

<?php 
	/**
	* After single template action
	*
	*/
	do_action( 'green_ink_single_after' );
?>	
