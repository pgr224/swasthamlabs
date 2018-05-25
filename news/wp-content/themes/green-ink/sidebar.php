<?php
/**
 * The Sidebar containing the primary blog sidebar
 *
 * @package Green Ink WordPress Theme
 * @subpackage Green Ink
 * @author Pressfore - www.pressfore.com
 */

// hide sidebars with sidebars=false custom field.
if (is_singular() && get_post_meta($post->ID, "sidebars", $single = true) ==  "false") {
	return;
}

if ( is_active_sidebar( 'sidebar-1' ) ) {
	do_action('green_ink_before_sidebar');
	do_action('green_ink_sidebar');
	do_action('green_ink_after_sidebar');
}

?>