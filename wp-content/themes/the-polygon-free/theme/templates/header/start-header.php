<?php
/*
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$skin = apply_filters( 'yit-header-skin', yit_get_option('header-skin'));
?>

<!-- START HEADER -->
<header id="header" class="clearfix search-big<?php echo esc_attr( $skin ) ?><?php if ( 'yes' != yit_get_option('show-dropdown-indicators') ) echo ' no-indicators' ?>">