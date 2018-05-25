<?php
/**
 * Template Name: Full Width Without Title
 * @package Green Ink WordPress Theme
 * @subpackage Green Ink
 * @author Pressfore - www.pressfore.com
*/

get_header();
do_action('green_ink_before_content');
green_ink_get_content('page');
do_action('green_ink_after_content');
get_footer();