<?php
/**
 * The template for displaying attachments.
 *
 * @package green ink WordPress Theme
 * @subpackage Green Ink
 * @author Pressfore - www.pressfore.com
 */

get_header();
do_action('green_ink_before_content');

/* Run the loop to output the attachment.
 * If you want to overload this in a child theme then include a file
 * called loop-attachment.php and that will be used instead.
 */
green_ink_get_content('attachment');
do_action('green_ink_after_content');
// get_sidebar();
get_footer();
