<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Green Ink WordPress Theme
 * @subpackage Green Ink
 * @author Pressfore - www.pressfore.com
 */

get_header();

do_action('green_ink_before_content');

if ( have_posts() ) while ( have_posts() ) {
   the_post(); 
   green_ink_get_content('single');
}

do_action('green_ink_after_content');

get_sidebar();
get_footer();
