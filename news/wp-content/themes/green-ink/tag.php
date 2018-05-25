<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 * @subpackage Green Ink
 * @since 1.0.0
 */

get_header();

do_action('green_ink_before_content');
?>

<?php
/* Run the loop for the tag archive to output the posts
 * If you want to overload this in a child theme then include a file
 * called loop-tag.php and that will be used instead.
 */
green_ink_get_content( 'tag' );

do_action('green_ink_after_content');

get_sidebar();

get_footer();