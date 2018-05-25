<?php
/**
 * Main functions file
 *
 * @package green ink WordPress Theme
 * @subpackage Green Ink
 * @author Pressfore - www.pressfore.com
 * @since 1.0.0
 */

// Path Constants.
define( 'GREEN_INK_DIR', get_template_directory() );
define( 'GREEN_INK_CHILD_DIR', get_stylesheet_directory() );
if ( ! defined( 'GREEN_INK_DEV' ) ) {
    define( 'GREEN_INK_DEV', false );
}

// Includes.
load_template( GREEN_INK_DIR . '/inc/plugins/class-tgm-plugin-activation.php' );
load_template( GREEN_INK_DIR . '/inc/plugins/plugins.php' );
load_template( GREEN_INK_DIR . '/inc/classes/class-breadcrumbs.php' );
load_template( GREEN_INK_DIR . '/inc/template-tags.php' );
load_template( GREEN_INK_DIR . '/inc/welcome-screen/welcome-screen.php' );
load_template( GREEN_INK_DIR . '/inc/woocommerce.php' );

// Customizer.
load_template( GREEN_INK_CHILD_DIR . '/inc/customizer.php' );

// Third party plugins support.
load_template( GREEN_INK_DIR . '/inc/jetpack.php' );

// Core files.
load_template( GREEN_INK_DIR . '/core/admin.php' );
load_template( GREEN_INK_DIR . '/core/core.php' );
load_template( GREEN_INK_CHILD_DIR . '/core/header.php' );
load_template( GREEN_INK_CHILD_DIR . '/core/meta.php' );
load_template( GREEN_INK_CHILD_DIR . '/core/title.php' );
load_template( GREEN_INK_CHILD_DIR . '/core/content.php' );
load_template( GREEN_INK_CHILD_DIR . '/core/content-custom.php' );
load_template( GREEN_INK_CHILD_DIR . '/core/sidebar.php' );
load_template( GREEN_INK_CHILD_DIR . '/core/blog.php' );
load_template( GREEN_INK_CHILD_DIR . '/core/single.php' );
load_template( GREEN_INK_CHILD_DIR . '/core/footer.php' );
load_template( GREEN_INK_CHILD_DIR . '/core/custmizer-styles.php' );
load_template( GREEN_INK_CHILD_DIR . '/core/extra.php' );
load_template( GREEN_INK_CHILD_DIR . '/core/menu.php' );