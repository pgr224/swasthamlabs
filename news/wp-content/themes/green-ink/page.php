<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package Green Ink WordPress Theme
 * @subpackage Green Ink
 * @author Pressfore - www.pressfore.com
 */
// You can override via functions.php conditionals or define:
// $columns = 'four';

get_header();

do_action('green_ink_before_content');

green_ink_get_content('page');

do_action('green_ink_after_content');

get_footer();
