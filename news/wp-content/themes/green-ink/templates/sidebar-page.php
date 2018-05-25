<?php
/**
 * The Sidebar containing the secondary Page widget area.
 *
 * @package Green Ink WordPress Theme
 * @subpackage Green Ink
 * @author Pressfore - www.pressfore.com
 */

if ( is_active_sidebar( 'sidebar-2' ) ) {

	do_action('green_ink_before_sidebar');

	dynamic_sidebar( 'sidebar-2' );

	do_action('green_ink_after_sidebar');

}
?>