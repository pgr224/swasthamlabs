<?php
/*
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */
?>
<div class="error-404-container">

    <div class="error-404-image-text">
        <img class="error-404-image" src="<?php echo esc_url( YIT_THEME_ASSETS_URL . "/images/backgrounds/404_text.png" ) ?>" title="<?php _e( 'Error 404', 'yit' ); ?>" alt="404" />
    </div>
    <div class="error-404-search">
        <p class="error-404-text"><?php _e( 'IT SEEMS YOU ARE LOOKING FOR SOMETHING IS NOT HERE.', 'yit' ); ?></p>

        <a class="btn btn-large btn-ghost" href="<?php echo home_url() ?>"><?php _e('BACK TO HOME', 'yit'); ?></a>

    </div>

</div>
